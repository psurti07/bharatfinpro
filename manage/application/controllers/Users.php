<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Users extends MY_Controller {
	
	function __construct(){
		parent::__construct();

		if(!$this->session->userdata('adminid')) {
			redirect('login');
		}
	}
	
	public function index(){
		$dt_to = date('Y-m-d', strtotime('-4 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_User_Model');
		$userlist = $this->Manage_User_Model->getuserlist($dt_to, $dt_from);
		$this->load->view('users',['userlist'=>$userlist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function userdetails($id){
		$this->load->model('Manage_User_Model');
		$userdetails = $this->Manage_User_Model->getuserdetails($id);

		$userdata = array(
			'id' => $userdetails['userinfo']->id,
			'fullname' => $userdetails['userinfo']->fullname,
			'mobile' => $userdetails['userinfo']->mobile
		);

		$this->load->view('user-details',['userdata'=>$userdata, 'userdetails'=>$userdetails]);
	}

	public function geoLocation()
    {
		$this->load->helper('geoloc');
		$pincode = $_REQUEST['pincode'];

        if(strlen($pincode) != 6){
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid pincode'
            ]);
            return;
        }

        $data = getGeolocation($pincode);

        if(isset($data['error'])){
            echo json_encode([
                'status' => 'error',
                'message' => $data['error']
            ]);
        } else {
            echo json_encode([
                'status'   => 'success',
                'city' => $data['cityname'] ?? '',
                'state'    => $data['statename'] ?? ''
            ]);
        }
    }

	public function addForm(){
		$this->load->view('user-add');
	}

	public function addUser(){
		$date_time = date('Y-m-d H:i:s');
		$this->load->model('Manage_User_Model');
		$isuser = $this->Manage_User_Model->checkuser($_REQUEST['mobile']);

		if($isuser == 0) {
			$regdate = date('Y-m-d', strtotime($_REQUEST['regdate']));
			$regdatetime = date('Y-m-d', strtotime($_REQUEST['regdate']))." ".date('H:i:s');
			
			$password = random_code(6);
			$passwordkey = stringCrypt($password, 'encrypt');
			$new_passwordkey = md5($password);
			
			$refcode = strtolower(substr(str_replace(" ", "", $_REQUEST['fullname']),0,3));
	    	$refcode .= substr($_REQUEST['mobile'],-4);

	    	$grandtotal = $netamount = $cgstamount = $sgstamount = $igstamount = 0;
	    	$cardno = random_code(16);
			$paymentid = 'cash_'.random_password(13);

			$data1 = array(
				'rec_date' => $regdatetime,
				'update_date' => $regdatetime,
				'fullname' => $_REQUEST['fullname'],
				'mobile' => $_REQUEST['mobile'],
				'email' => $_REQUEST['emailid'],
				'password' => $passwordkey,
				'new_password'=>$new_passwordkey,
				'pincode' => $_REQUEST['pincode'],
				'city' => $_REQUEST['city'],
				'state' => $_REQUEST['state'],
				'usertype' => $_REQUEST['usertype'],
				'cardtype' => $_REQUEST['loantype'],
				'refcode' => $refcode,
				'process_step' => 4,
				'isUser' => 2,
				'isActive' => 1,
				'isDelete' => 0
			);
			$userid = $this->Manage_User_Model->adduseraccount($data1);

			if($userid > 0) {
				$data2 = array(
					'rec_date' => $regdatetime,
					'userid' => $userid,
					'loantype' => $_REQUEST['loantype'],
					'loanamount' => $_REQUEST['loanamount'],
					'cibilscore' => $_REQUEST['cibilscore'],
					'loanpurpose' => $_REQUEST['loanpurpose'],
					'income' => $_REQUEST['monthlyincome'],
					'currentemi' => $_REQUEST['currentemi'],
					'emibounce' => $_REQUEST['emibounce'],
					'loantenure' => 36,
					'isDelete' => 0
				);
				$applicationid = $this->Manage_User_Model->addapplication($data2);

				$data3 = array(
					'rec_date' => $regdatetime,
					'applicationid' => $applicationid,
					'statusdate' => $regdate,
					'statusid' => 1,
					'staffid' => 1,
					'isDelete' => 0
				);
				$statusid = $this->Manage_User_Model->applicationstatus($data3);

				if(isset($_REQUEST['cardnumber']) && $_REQUEST['cardnumber']!='') {
					$cardno = $_REQUEST['cardnumber'];
				}

				if(isset($_REQUEST['cardamount']) && $_REQUEST['cardamount']!='') {
					$netamount = $_REQUEST['cardamount'];

					if($_REQUEST['state'] == 'Gujarat') {
						$cgstamount = $netamount * 0.09;
						$sgstamount = $netamount * 0.09;
					} 
					else {
						$igstamount = $netamount * 0.18;
					}

					$grandtotal = $netamount + $cgstamount + $sgstamount + $igstamount;
				}
				
				if(isset($_REQUEST['paymentid']) && $_REQUEST['paymentid']!='') {
					$paymentid = $_REQUEST['paymentid'];
				}

				$data4 = array(
					'rec_date' => $regdatetime,
					'userid' => $userid,
					'registration_date' => $regdate,
					'expiry_date' => date('Y-m-d', strtotime('+3 months', strtotime($regdate))),
					'card_number' => $cardno,
					'amount' => $grandtotal,
					'paymentid' => $paymentid,
					'isActive' => 1,
					'isDelete' => 0
				);

				$membershipid = $this->Manage_User_Model->membershiporder($data4);

				$this->load->model('Manage_Product_Model');
				$invoiceno = $this->Manage_Product_Model->getinvoiceno();

				if($_REQUEST['loantype'] == 12) {
					$invfor = 2;
					$invprefix = "BL_";
				}
				else {
					$invfor = 1;
					$invprefix = "PL_";
				}

				$data5 = array(
					'rec_date' => $date_time,
					'userid' => $userid,
					'cardid' => $membershipid,
					'inv_for' => $invfor,
					'inv_prefix' => $invprefix,
					'inv_number' => $invoiceno,
					'inv_date' => date('Y-m-d'),
					'inv_price' => $netamount,
					'inv_cgst' => $cgstamount,
					'inv_sgst' => $sgstamount,
					'inv_igst' => $igstamount,
					'inv_grandtotal' => $grandtotal,
					'isDelete' => 0
				);

				$responseinvoice = $this->Manage_User_Model->generateinvoice($data5, $invoiceno);

				$invoce_log_data= array(
					'log_detail' => 'Create New Customer',
					'card_number'=> $membershipid,
					'invoice_id'=> $responseinvoice,
					'staff_id'=> $this->session->userdata('adminid'),
					'created_date'=> $date_time
				);

				$this->Manage_User_Model->invoce_log_data($invoce_log_data);

				$remote_data = array(
					'company_code' => COMPANY_CODE,
					'company_local_ip' => LOCAL_IP,
					'product_code' => 'membership',
					'customer_name' => $_REQUEST['fullname'],
					'customer_email' => $_REQUEST['emailid'],
					'customer_mobile' => $_REQUEST['mobile'],
					'userid' => $userid,
					'card_number' => $cardno,
					'rec_date' => $date_time,
					'inv_for' => $invfor,
					'inv_prefix' => $invprefix,
					'inv_number' => $invoiceno,
					'inv_date' => date('Y-m-d'),
					'inv_price' => $netamount,
					'inv_cgst' => $cgstamount,
					'inv_sgst' => $sgstamount,
					'inv_igst' => $igstamount,
					'inv_grandtotal' => $grandtotal,
				);

				$api_response = send_order_data(json_encode($remote_data));

				// $this->load->helper('interakt');
				// $us_track = array(
				// 	'phoneNumber' => $_REQUEST['mobile'],
				// 	'countryCode' => '+91',
				// 	'event' => 'Payment Successful'
				// );
				// $restrack2 = event_track($us_track);
				//$sent = $this->Manage_User_Model->sendSuccessGreetings($_REQUEST['mobile'], $_REQUEST['emailid'], $password);

				echo json_encode(array("success"=>true, "message"=>"Customer account successfully created."));
				die;
			}
			else {
				echo json_encode(array("success"=>false, "message"=>"Ops. Something goes wrong."));
				die;
			}
		}
		else {
			echo json_encode(array("success"=>false, "message"=>"Mobile number is already registered."));
			die;
		}
	}

	public function userdelete($id){
		$this->load->model('Manage_User_Model');
		$response = $this->Manage_User_Model->deletelead($id);

		redirect('users');
	}

	public function updateprofile(){
		$data = array(
			'update_date' => date('Y-m-d H:i:s'),
			'fullname' => $_REQUEST['fullname'],
			'mobile' => $_REQUEST['mobile'],
			'email' => $_REQUEST['emailid'],
			'pincode' => $_REQUEST['pincode'],
			'city' => $_REQUEST['city'],
			'state' => $_REQUEST['state']
		);

		$this->load->model('Manage_User_Model');
		$response = $this->Manage_User_Model->updateuserprofile($_REQUEST['id'], $data);

		if($response == true) {
			echo json_encode(array("success"=>true, "message"=>"Data successful updated."));
		} 
		else {
			echo json_encode(array("success"=>false, "message"=>"Ops. Something goes wrong."));
		}
	}

	public function kycdocuments($id){
		$kycstatus = 0;
		$documentlist = array();

		$this->load->model('Manage_User_Model');
		$datares = $this->Manage_User_Model->getuserdata($id);
		
		$isdata = $this->Manage_User_Model->checkdocuments($datares->id);
		if($isdata > 0) {
			$kycstatus = $this->Manage_User_Model->getkycstatus($id);
			$documentlist = $this->Manage_User_Model->getkycdocuments($datares->id);
		}
		
		$userdata = array(
			'id' => $datares->id,
			'fullname' => $datares->fullname,
			'mobile' => $datares->mobile,
			'usertype' => $datares->usertype,
			'cardtype' => $datares->cardtype
		);

		$this->load->view('user-kyc-documents',['userdata'=>$userdata, 'kycstatus'=>$kycstatus, 'documentlist'=>$documentlist]);
	}

	public function downloaddoc($id = NULL, $document = NULL) {
		if($id != NULL && $document != NULL) {
			$this->load->model('Manage_General_Model');
			$doc = $this->Manage_General_Model->filedownload('kycdocuments', $document);
			redirect('users/kycdocuments/'.$id);
		}
		else {
			redirect('users');
		}
	}

	public function reuploaddoc($document = NULL, $id = NULL) {
		if($id != NULL && $document != NULL) {
			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'isVerified' => 0,
				$document => NULL
			);
			$this->load->model('Manage_User_Model');
			$doc = $this->Manage_User_Model->reuploaddocument($id, $data);
			redirect('users/kycdocuments/'.$id);
		}
		else {
			redirect('users');
		}
	}

	public function docverification($status, $id) {
		$this->load->model('Manage_User_Model');
		$response = $this->Manage_User_Model->verifydocuments($id, $status);

		if($status == 1) {
			$userdata = $this->Manage_User_Model->getuserdata($id);
			$response3 = $this->Manage_User_Model->sendkycverifymessage($userdata->mobile, $userdata->email);
			
			$data2 = array(
		   		'process_step' => 5
			);
			$response2 = $this->Manage_User_Model->updateuserprofile($id, $data2);
		}

		redirect('users/kycdocuments/'.$id);
	}
	
	public function membershipcard($id){
		$this->load->model('Manage_User_Model');
		$datares = $this->Manage_User_Model->getuserdata($id);
		$carddetails = $this->Manage_User_Model->getcarddetails($id);
		
		$userdata = array(
			'id' => $datares->id,
			'fullname' => $datares->fullname,
			'mobile' => $datares->mobile,
			'cardtype' => $datares->cardtype
		);

		$this->load->view('user-membership-card',['userdata'=>$userdata, 'carddetails'=>$carddetails]);
	}

	public function referraldetails($id){
		$this->load->model('Manage_User_Model');
		$referraldetails = $this->Manage_User_Model->getreferraldetails($id);
		$this->load->view('user-referral-details',['referraldetails'=>$referraldetails]);
	}

	public function downloadinvoice($id, $cardid){
		$this->load->model('Manage_User_Model');
		$invdetails = $this->Manage_User_Model->getinvoicedetails($id, $cardid);
		$invoiceno = 'INV-'.$invdetails['orderinfo']->id;
		
		$this->load->library('pdf');
        $html = $this->load->view('user-invoice', ['invdetails'=>$invdetails], true);
        $this->pdf->createPDF($html, $invoiceno, false);

		redirect('users/membershipcard/'.$id);
	}

	public function referralinvoice($id){
		$this->load->model('Manage_User_Model');
		$invdetails = $this->Manage_User_Model->getrefferalinvoicedetails($id);
		$invoiceno = 'INV-'.$invdetails['payoutinfo']->id;
		
		$this->load->library('pdf');
        $html = $this->load->view('user-referral-invoice', ['invdetails'=>$invdetails], true);
        $this->pdf->createPDF($html, $invoiceno, false);

		redirect('users/referral');
	}

	public function addRemarks(){
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'module' => 'customerpayout',
			'linkid' => $_REQUEST['treeid'],
			'notetext' => $_REQUEST['remarks'],
			'isDelete' => 0
		);

		$this->load->model('Manage_User_Model');
		$response = $this->Manage_User_Model->addpayoutremarks($data);

		redirect('users/referraldetails/'.$_REQUEST['treeid']);
	}

	public function applicationlist($id){
		$this->load->model('Manage_User_Model');
		$datares = $this->Manage_User_Model->getuserdata($id);
		$applications = $this->Manage_User_Model->getapplicationlist($id);

		$userdata = array(
			'id' => $datares->id,
			'fullname' => $datares->fullname,
			'mobile' => $datares->mobile
		);

		$this->load->view('user-application-list',['userdata'=>$userdata, 'applications'=>$applications]);
	}

	public function referral(){
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_User_Model');
		$reflist = $this->Manage_User_Model->getallreferral($dt_to, $dt_from);

		$this->load->view('user-referral',['reflist'=>$reflist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function payoutstatus($statusid, $id){
		$this->load->model('Manage_User_Model');
		$response = $this->Manage_User_Model->changepayoutstatus($statusid, $id);
		redirect('users/referraldetails/'.$id);
	}

	public function referrallist($id){
		$this->load->model('Manage_User_Model');
		$datares = $this->Manage_User_Model->getuserdata($id);
		$reflist = $this->Manage_User_Model->getreferallist($id);

		$userdata = array(
			'id' => $datares->id,
			'fullname' => $datares->fullname,
			'mobile' => $datares->mobile
		);

		$this->load->view('user-referral-list',['userdata'=>$userdata, 'reflist'=>$reflist]);
	}

	public function actions($id){
		$this->load->model('Manage_User_Model');
		$datares = $this->Manage_User_Model->getuserdata($id);

		$userdata = array(
			'id' => $datares->id,
			'fullname' => $datares->fullname,
			'mobile' => $datares->mobile
		);

		$this->load->view('user-actions',['userdata'=>$userdata, 'userdetails'=>$datares]);
	}

	public function membershiplist($cardtype = '11'){
		$dt_to = date('Y-m-d', strtotime('-5 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_User_Model');
		$membershiplist = $this->Manage_User_Model->getmembershiplist($dt_to, $dt_from, $cardtype);

		$this->load->view('membership-list',['membershiplist'=>$membershiplist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from, 'cardtype'=>$cardtype]);
	}

	public function digitalleads($loan = 'pl'){
		$loantype = ($loan == 'bl') ? 12 : 11;

		$dt_to = date('Y-m-d', strtotime('-4 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_User_Model');
		$userlist = $this->Manage_User_Model->getleadsuserlist($loantype, $dt_to, $dt_from);

		$this->load->view('digital-leads',['userlist'=>$userlist, 'loan'=>$loan, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function premiumleads($loan = 'pl'){
		$loantype = ($loan == 'bl') ? 12 : 11;

		$dt_to = date('Y-m-d', strtotime('-4 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_User_Model');
		$userlist = $this->Manage_User_Model->getpremiumleadslist($loantype, $dt_to, $dt_from);

		$this->load->view('premium-leads',['userlist'=>$userlist, 'loan'=>$loan, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function leaddetails($id){
		$this->load->model('Manage_User_Model');
		$userdetails = $this->Manage_User_Model->getleaduserdetails($id);

		$this->load->view('digital-leads-details',['userdetails'=>$userdetails]);
	}

	public function converttocustomer(){
		$date_time = date('Y-m-d H:i:s');
		if(isset($_REQUEST['userid'])) {
			$this->load->model('Manage_User_Model');
			$userdata = $this->Manage_User_Model->getuserdata($_REQUEST['userid']);
			
			$regdate = date('Y-m-d', strtotime($_REQUEST['regdate']));
			$regdatetime = date('Y-m-d', strtotime($_REQUEST['regdate']))." ".date('H:i:s');

			$grandtotal = $netamount = $cgstamount = $sgstamount = $igstamount = 0;
			$cardno = random_code(16);
			$paymentid = 'cash_'.random_password(13);

			if(isset($_REQUEST['cardnumber']) && $_REQUEST['cardnumber']!='') {
				$cardno = $_REQUEST['cardnumber'];
			}

			if(isset($_REQUEST['cardamount']) && $_REQUEST['cardamount']!='') {
				$netamount = $_REQUEST['cardamount'];

				if($userdata->state == 'Gujarat') {
					$cgstamount = $netamount * 0.09;
					$sgstamount = $netamount * 0.09;
				} 
				else {
					$igstamount = $netamount * 0.18;
				}

				$grandtotal = $netamount + $cgstamount + $sgstamount + $igstamount;
			}
			
			if(isset($_REQUEST['paymentid']) && $_REQUEST['paymentid']!='') {
				$paymentid = $_REQUEST['paymentid'];
			}

			$data = array(
				'rec_date' => $regdatetime,
				'userid' => $userdata->id,
				'registration_date' => $regdate,
				'expiry_date' => date('Y-m-d', strtotime('+3 months', strtotime($regdate))),
				'card_number' => $cardno,
				'amount' => $grandtotal,
				'paymentid' => $paymentid,
				'isActive' => 1,
				'isDelete' => 0
			);

			$membershipid = $this->Manage_User_Model->membershiporder($data);

			if($membershipid != 0){
				$data2 = array(
					'rec_date' => $regdatetime,
					'isDelete' => 0
				);
				$applicationid = $this->Manage_User_Model->updateapplication($_REQUEST['applicationid'], $data2);

				$data3 = array(
					'rec_date' => $regdatetime,
					'applicationid' => $applicationid,
					'statusdate' => $regdate,
					'statusid' => 1,
					'staffid' => 1,
					'isDelete' => 0
				);
				$statusid = $this->Manage_User_Model->applicationstatus($data3);

				$password = random_code(6);
				$passwordkey = stringCrypt($password, 'encrypt');
				$new_passwordkey = md5($password);
				$refcode = strtolower(substr(str_replace(" ", "", $userdata->fullname),0,3));
	    		$refcode .= substr($userdata->mobile,-4);

				$data2 = array(
					'rec_date' => $regdatetime,
					'update_date' => $regdatetime,
					'password' => $passwordkey,
					'new_password' => $new_passwordkey,
					'refcode' => $refcode,
					'process_step' => 4,
					'isUser' => 2
				);
				$response2 = $this->Manage_User_Model->updateuserprofile($userdata->id, $data2);

				$this->load->model('Manage_Product_Model');
				$invoiceno = $this->Manage_Product_Model->getinvoiceno();

				if($userdata->cardtype == 12) {
					$invfor = 2;
					$invprefix = "BL_";
				}
				else {
					$invfor = 1;
					$invprefix = "PL_";
				}

				$data5 = array(
					'rec_date' => $date_time,
					'userid' => $userdata->id,
					'cardid' => $membershipid,
					'inv_for' => $invfor,
					'inv_prefix' => $invprefix,
					'inv_number' => $invoiceno,
					'inv_date' => date('Y-m-d'),
					'inv_price' => $netamount,
					'inv_cgst' => $cgstamount,
					'inv_sgst' => $sgstamount,
					'inv_igst' => $igstamount,
					'inv_grandtotal' => $grandtotal,
					'isDelete' => 0
				);

				$responseinvoice = $this->Manage_User_Model->generateinvoice($data5, $invoiceno);

				$invoce_log_data= array(
					'log_detail' => 'Convert to Customer',
					'card_number'=> $membershipid,
					'invoice_id'=> $responseinvoice,
					'staff_id'=> $this->session->userdata('adminid'),
					'created_date'=> $date_time
				);

				$this->Manage_User_Model->invoce_log_data($invoce_log_data);

				$remote_data = array(
					'company_code' => COMPANY_CODE,
					'company_local_ip' => LOCAL_IP,
					'product_code' => 'membership',
					'customer_name' => $userdata->fullname,
					'customer_email' => $userdata->email,
					'customer_mobile' => $userdata->mobile,
					'userid' => $userdata->id,
					'card_number' => $cardno,
					'rec_date' => $date_time,
					'inv_for' => $invfor,
					'inv_prefix' => $invprefix,
					'inv_number' => $invoiceno,
					'inv_date' => date('Y-m-d'),
					'inv_price' => $netamount,
					'inv_cgst' => $cgstamount,
					'inv_sgst' => $sgstamount,
					'inv_igst' => $igstamount,
					'inv_grandtotal' => $grandtotal,
				);

				$api_response = send_order_data(json_encode($remote_data));
				// $this->load->helper('interakt');
				//  $us_track = array(
				// 	'phoneNumber' => $userdata->mobile,
				// 	'countryCode' => '+91',
				// 	'event' => 'Payment Successful'
				// );
				// $restrack2 = event_track($us_track);

				$sent = $this->Manage_User_Model->sendSuccessGreetings($userdata->mobile, $userdata->email, $password);
			
				echo json_encode(array("success"=>true, "message"=>"Customer account successfully created."));
				die;
			}
			else {
				echo json_encode(array("success"=>false, "message"=>"Ops. Something goes wrong."));
				die;
			}
		}
		else {
			echo json_encode(array("success"=>false, "message"=>"Ops. Something goes wrong."));
			die;
		}
		
	}

	public function leaddelete($id){
		$this->load->model('Manage_User_Model');
		$response = $this->Manage_User_Model->deletelead($id);

		redirect('users/digitalleads/pl');
	}

	public function changepassword(){
		if($_REQUEST['newpassword'] == $_REQUEST['retypepassword']) {
			$this->load->model('Manage_User_Model');
			$response = $this->Manage_User_Model->changepassword($_REQUEST['id'], $_REQUEST['newpassword']);

			if($response == true) {
				echo json_encode(array("success"=>true, "message"=>"Password successfully changed."));
			}
			else {
				echo json_encode(array("success"=>false, "message"=>"Customer account not found."));
			}
		}
		else {
			echo json_encode(array("success"=>false, "message"=>"Both passwords are not equal."));
		}
	}

	public function accountstatus($status, $id) {
		$this->load->model('Manage_User_Model');
		$response = $this->Manage_User_Model->manageaccountstatus($id, $status);

		redirect('users/userdetails/'.$id);
	}

	public function accountdeletepermanently($id){
        $this->load->model('Manage_User_Model');
        $response = $this->Manage_User_Model->manageaccountdeletepermanent($id);
        $this->session->set_flashdata('success','Customer account deleted successfully!');
        redirect('users');
    }
}

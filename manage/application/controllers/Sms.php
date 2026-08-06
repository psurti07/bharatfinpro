<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Sms extends MY_Controller {
	
	function __construct(){
		parent::__construct();

		if($this->session->userdata('adminid') == FALSE) {
			redirect('login');
		}
	}
	
	public function index(){
		redirect('dashboard');
	}

	public function smsmessages(){
		$this->load->model('Manage_Sms_Model');
		$smslist = $this->Manage_Sms_Model->getsmsmessages();
		$this->load->view('sms-messages',['smslist'=>$smslist]);
	}

	public function sendTestsms(){
		$smsresponse = $smsdetails = $smsmessage = $dataset = '';

		$this->load->model('Manage_Sms_Model');
		$smsdetails = $this->Manage_Sms_Model->getsmsdetails($_REQUEST['smsid']);
		$smsmessage = $smsdetails->option_value;
		
		$sms_account = $_REQUEST['smsaccount'];
		$sms_type = $_REQUEST['smstype'];

		if ($sms_account == 2) {
			$product = 'plan';
			$smssendid = getSMSsenderid('plansmssenderid');
			$username = PLAN_SMS_OBB_USERNAME;
			$apikey = PLAN_SMS_OBB_PASSWORD;
		} else {
			$product = 'subscription';
			$smssendid = getSMSsenderid('smssenderid');
			$username = SMS_OBB_USERNAME;
			$apikey = SMS_OBB_PASSWORD;
		}

		if($_REQUEST['mobile'] != '' && $smsmessage != "") {

			if($sms_type == 1) {
			    $eligibilityamt = "500000";
				$smsmessage = str_replace("<#cronamount>",$eligibilityamt,$smsmessage);
				
				$dataset = "<sms><user>".$username."</user><password>".$apikey."</password><mobiles>".$_REQUEST['mobile']."</mobiles><message>".$smsmessage."</message><accusage>1</accusage><senderid>".$smssendid."</senderid></sms>";

				$smsresponse = sendxmlSMSobb($dataset);
			}
			else if($sms_type == 2) {
			    $eligibilityamt = "500000";
				$smsmessage = str_replace("<#preamount>",$eligibilityamt,$smsmessage);
				$smsresponse = senddynamicSMSobb($_REQUEST['mobile'], $smsmessage);
			}
			
			echo json_encode(array("success"=>true, "message"=>$smsresponse));
			die;
		}
		else {
			echo json_encode(array("success"=>false, "message"=>"Mobile number and SMS is mendatory."));
			die;
		}
		
		echo json_encode(array("success"=>false, "message"=>"Ops! Something goes wrong."));
		die;
	}

	public function editSMSForm($id){
		$this->load->model('Manage_Sms_Model');
		$smsdetails = $this->Manage_Sms_Model->getsmsdetails($id);
		$this->load->view('sms-messages-edit',['smsdetails'=>$smsdetails]);
	}

	public function editSMSmessage(){
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['message']
		);

		$this->load->model('Manage_Sms_Model');
		$response = $this->Manage_Sms_Model->editsms($_REQUEST['id'], $data);

		redirect('sms/smsmessages');
	}

	public function sentotps(){
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Sms_Model');
		$otplist = $this->Manage_Sms_Model->getsentotplist($dt_to, $dt_from);

		$this->load->view('sent-otps',['otplist'=>$otplist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function remarketinglog(){
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Sms_Model');
		$loglist = $this->Manage_Sms_Model->getremarketinglog($dt_to, $dt_from);

		$this->load->view('remarketing-log',['loglist'=>$loglist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function logdetails($id){
		$this->load->model('Manage_Sms_Model');
		$logdetails = $this->Manage_Sms_Model->getlogdetails($id);

		$this->load->view('remarketingsmslog-details',['logdetails'=>$logdetails]);
	}

	public function smstemplates(){
		$this->load->model('Manage_Sms_Model');
		$smslist = $this->Manage_Sms_Model->getsmstemplates();
		$this->load->view('sms-templates',['smslist'=>$smslist]);
	}

	public function bulksms(){
		$this->load->model('Manage_Sms_Model');
		$bulklist = $this->Manage_Sms_Model->getbulksmslist();
		$this->load->view('bulksms-list',['bulklist'=>$bulklist]);
	}

	public function deletemsgno($id){
		$this->load->model('Manage_Sms_Model');
		$response = $this->Manage_Sms_Model->deletemsgnumber($id);
		redirect('sms/bulksms');
	}

	public function uploadbulkfile(){
		$this->load->library('csvimport');
		$this->load->model('Manage_Sms_Model');

		$file_data = $this->csvimport->parse_file($_FILES["smsfile"]["tmp_name"]);
		$cnt = 0;

		foreach($file_data as $row) {
			if($row["mobile"] != '') {
				$chkentry = $this->Manage_Sms_Model->checkdataentry($row["mobile"]);

				if($chkentry < 1) {
					$data = array(
						'rec_date' => date('Y-m-d H:i:s'),
						'fullname' => $row["fullname"],
					    'mobileno' => $row["mobile"],
					    'emailid' => $row["email"]
					);

					$response = $this->Manage_Sms_Model->uploadbulkfile($data);
					$cnt = $cnt + 1;
				}
			}
		}

		echo json_encode(array("success"=>true, "message"=>$cnt." - numbers successfully imported."));
		die;
	}

	public function dndlist() {
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Sms_Model');
		$userlist = $this->Manage_Sms_Model->getdnduserlist($dt_to, $dt_from);
		$this->load->view('dnduser-list', ['userlist' => $userlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}
	public function plandndlist() {
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Sms_Model');
		$userlist = $this->Manage_Sms_Model->getplandnduserlist($dt_to, $dt_from);
		$this->load->view('plan-dnduser-list', ['userlist' => $userlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function deletedndno($id) {
		$this->load->model('Manage_Sms_Model');
		$response = $this->Manage_Sms_Model->deletedndnumber($id);
		redirect('sms/dndlist');
	}

	public function uploaddndfile() {
		$this->load->library('csvimport');

		$file_data = $this->csvimport->parse_file($_FILES["smsfile"]["tmp_name"]);
		$cnt = 0;
		$wheredata = "";

		foreach ($file_data as $row) {
			if ($row["mobile"] != '') {
				if ($cnt != 0) {
					$wheredata .= " OR ";
				}
				$wheredata .= " mobile = " . $row["mobile"];
				$cnt = $cnt + 1;
			}
		}

		$this->load->model('Manage_Sms_Model');
		$response = $this->Manage_Sms_Model->uploaddndfile($wheredata);

		if ($response == true) {
			echo json_encode(array("success" => true, "message" => $cnt . " - numbers added to DND list."));
			die;
		} else {
			echo json_encode(array("success" => false, "message" => "Ops! Something goes wrong."));
			die;
		}
	}

	public function planuploaddndfile() {
		$this->load->library('csvimport');

		$file_data = $this->csvimport->parse_file($_FILES["smsfile"]["tmp_name"]);
		$cnt = 0;
		$wheredata = "";

		foreach ($file_data as $row) {
			if ($row["mobile"] != '') {
				if ($cnt != 0) {
					$wheredata .= " OR ";
				}
				$wheredata .= " mobile = " . $row["mobile"];
				$cnt = $cnt + 1;
			}
		}

		$this->load->model('Manage_Sms_Model');
		$response = $this->Manage_Sms_Model->planuploaddndfile($wheredata);

		if ($response == true) {
			echo json_encode(array("success" => true, "message" => $cnt . " - numbers added to DND list."));
			die;
		} else {
			echo json_encode(array("success" => false, "message" => "Ops! Something goes wrong."));
			die;
		}
	}

	public function customsms(){
		$this->load->view('custom-sms');
	}

	public function sendcustomsms(){
		$dataset = $smsmessage = '';

		if(isset($_REQUEST['targetcustomers']) && isset($_REQUEST['message'])) {
			$this->load->model('Manage_Sms_Model');
			$response = $this->Manage_Sms_Model->sendcustomsms($_REQUEST['targetcustomers'], $_REQUEST['message']);

			echo json_encode(array("success"=>true, "message"=>"SMS successfully send.", "customresponse"=>$response));
		    die;
		}
		else {
			echo json_encode(array("success"=>false, "message"=>"Ops! Something goes wrong.", "customresponse"=>""));
		    die;
		}
	}

}
?>
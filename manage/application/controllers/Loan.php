<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Loan extends MY_Controller {
	
	function __construct(){
		parent::__construct();

		if(! $this->session->userdata('adminid')) {
			redirect('login');
		}
	}

	public function index(){
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Loan_Enquiry_Model');
		$enquirylist = $this->Manage_Loan_Enquiry_Model->getenquirylist($dt_to, $dt_from);
		$this->load->view('loanenquiry',['enquirylist'=>$enquirylist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}


	public function deleteenquiry($id) {
		$this->load->model('Manage_Loan_Enquiry_Model');
		$this->Manage_Loan_Enquiry_Model->deleteenquiry($id);
		redirect('loan');
	}


	public function application(){
		$dt_to = date('Y-m-d', strtotime('-2 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Loan_Enquiry_Model');
		$applicationlist = $this->Manage_Loan_Enquiry_Model->getloanapplicationlist(1, $dt_to, $dt_from);

		$this->load->model('Manage_Banks_Model');
		$banklist = $this->Manage_Banks_Model->getbanklist();

		$this->load->view('application-list',['applicationlist'=>$applicationlist, 'banklist'=>$banklist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function reapplyhistory(){
		$dt_to = date('Y-m-d', strtotime('-2 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Loan_Enquiry_Model');
		$applicationlist = $this->Manage_Loan_Enquiry_Model->getloanreapplyapplist(1, $dt_to, $dt_from);

		$this->load->view('application-list-reapply',['applicationlist'=>$applicationlist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function oldapplication(){
		$days = 91;
		if(isset($_REQUEST['d'])) {
			$days = $_REQUEST['d'];
		}

		$this->load->model('Manage_Loan_Enquiry_Model');
		$applicationlist = $this->Manage_Loan_Enquiry_Model->getoldapplicationlist(1, $days);

		$this->load->view('application-list-old',['applicationlist'=>$applicationlist, 'days'=>$days]);
	}

	public function approvehistory(){
		$dt_to = date('Y-m-d', strtotime('-2 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Loan_Enquiry_Model');
		$applicationlist = $this->Manage_Loan_Enquiry_Model->getloanapplicationlist(2, $dt_to, $dt_from);

		$this->load->view('application-list-approved',['applicationlist'=>$applicationlist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}


	public function queryprocesshistory(){
		$dt_to = date('Y-m-d', strtotime('-2 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Loan_Enquiry_Model');
		$applicationlist = $this->Manage_Loan_Enquiry_Model->getloanapplicationlist(4, $dt_to, $dt_from);

		$this->load->view('application-list-queryprocess',['applicationlist'=>$applicationlist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}


	public function rejecthistory(){
		$dt_to = date('Y-m-d', strtotime('-2 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Loan_Enquiry_Model');
		$applicationlist = $this->Manage_Loan_Enquiry_Model->getloanapplicationlist(3, $dt_to, $dt_from);

		$this->load->view('application-list-rejected',['applicationlist'=>$applicationlist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function appdetails($id){
		$this->load->model('Manage_Loan_Enquiry_Model');
		$appdetails = $this->Manage_Loan_Enquiry_Model->getapplicationdetails($id);
		if($appdetails != "") {
			$statuslist = $this->Manage_Loan_Enquiry_Model->getappstatuslist($id);
			
			$this->load->view('application-details',['appdetails'=>$appdetails, 'statuslist'=>$statuslist]);
		}
		else {
			redirect('loan/application');
		}
	}

	public function applicationstatus($status, $id) {
		$this->load->model('Manage_Loan_Enquiry_Model');
		$response_app = $this->Manage_Loan_Enquiry_Model->manageapplicationstatus($status, $id);
		$appdetails = $this->Manage_Loan_Enquiry_Model->getapplicationdetails($id);

		$data2 = array();
		switch ($status) {
			case '2':
				$data2 = array(
			   		'update_date' => date('Y-m-d H:i:s'),
			   		'process_step' => 11
				);
				break;
			
			case '3':
				$data2 = array(
			   		'update_date' => date('Y-m-d H:i:s'),
			   		'process_step' => 10
				);
				break;

			case '4':
				$data2 = array(
			   		'update_date' => date('Y-m-d H:i:s'),
			   		'process_step' => 8
				);
				break;

			case '5':
				$data2 = array(
			   		'update_date' => date('Y-m-d H:i:s'),
			   		'process_step' => 9
				);
				break;

			case '6':
				$data2 = array(
			   		'update_date' => date('Y-m-d H:i:s'),
			   		'process_step' => 12
				);
				break;

			default:
				break;
		}

		if(!empty($data2)) {
			$this->load->model('Manage_User_Model');
			$response2 = $this->Manage_User_Model->updateuserprofile($appdetails->userid, $data2);
		}
		redirect('loan/appdetails/'.$id);
	}

	public function appstatusForm($id){
		$this->load->model('Manage_Loan_Enquiry_Model');
		$appdetails = $this->Manage_Loan_Enquiry_Model->getapplicationdetails($id);

		$this->load->model('Manage_Banks_Model');
		$banklist = $this->Manage_Banks_Model->getbanklist();
		$loanstatuslist = $this->Manage_Banks_Model->getloanstatuslist();

		$this->load->view('application-status-add',['appdetails'=>$appdetails, 'banklist'=>$banklist, 'loanstatuslist'=>$loanstatuslist]);
	}

	public function getstatusremarks($statusid = 0){
		$remarkslist = array();

		if($statusid != 0) {
			$remarkslist = getLoanStatusMsg($statusid);
			echo json_encode(array("success"=>true, "remarkslist"=>$remarkslist));
		}
		else {
			echo json_encode(array("success"=>false, "remarkslist"=>$remarkslist));
		}
	}

	public function addAppstatus(){
		$sanction_letter = "";

		$this->load->model('Manage_Loan_Enquiry_Model');
		$userdata = $this->Manage_Loan_Enquiry_Model->getapplicationdetails($_REQUEST['applicationid']);

		if($_FILES['sanctionletter']['name'] != '') {
			$this->load->model('Manage_General_Model');
			$sanction_letter = $this->Manage_General_Model->single_file_upload('sanctionletter', 'images/sanctionletter', 'pdf', 0);
		}

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'statusdate' => date('Y-m-d', strtotime($_REQUEST['recdate'])),
			'applicationid' => $_REQUEST['applicationid'],
			'statusid' => $_REQUEST['statusid'],
			'bankid' => $_REQUEST['bankid'],
			'loanamount' => $_REQUEST['loanamount'],
			'loanroi' => $_REQUEST['loanroi'],
			'loanterms' => $_REQUEST['loanterms'],
			'processfees' => $_REQUEST['processfees'],
			'insurance' => $_REQUEST['insurance'],
			'monthlyemi' => $_REQUEST['monthlyemi'],
			'remarks' => $_REQUEST['remarks'],
			'sanction_letter' => $sanction_letter,
			'staffid' => $this->session->userdata('adminid'),
			'isDelete' => 0
		);

		$response = $this->Manage_Loan_Enquiry_Model->addapplicationstatus($data);

		/* $data4 = array(
			"fullPhoneNumber" => '+91'.$userdata->mobile,
			"callbackData"=> "some text here",
			"type"=> "Template",
			"template"=> array(
					"name"=> 'remark_24sep',
					"languageCode"=> "en",
				)
		 );
		$restrack4 = interakt_track($data4); */
		
		$data2 = array();
		switch ($_REQUEST['statusid']) {
			case '1':
				$data2 = array(
			   		'update_date' => date('Y-m-d H:i:s'),
			   		'process_step' => 11
				);
				break;
			
			case '2':
				$data2 = array(
			   		'update_date' => date('Y-m-d H:i:s'),
			   		'process_step' => 10
				);
				break;

			case '3':
				$data2 = array(
			   		'update_date' => date('Y-m-d H:i:s'),
			   		'process_step' => 7
				);
				break;

			case '4':
				$data2 = array(
			   		'update_date' => date('Y-m-d H:i:s'),
			   		'process_step' => 8
				);
				break;

			case '5':
				$data2 = array(
			   		'update_date' => date('Y-m-d H:i:s'),
			   		'process_step' => 9
				);
				break;

			case '6':
				$data2 = array(
			   		'update_date' => date('Y-m-d H:i:s'),
			   		'process_step' => 5
				);
				break;

			case '7':
				$data2 = array(
			   		'update_date' => date('Y-m-d H:i:s'),
			   		'process_step' => 12
				);
				break;

			default:
				break;
		}

		if(!empty($data2)) {
			$this->load->model('Manage_User_Model');
			$response2 = $this->Manage_User_Model->updateuserprofile($userdata->userid, $data2);
		}
		$response = $this->Manage_Loan_Enquiry_Model->sendStatusMessage($_REQUEST['remarks'], $userdata->mobile, $userdata->email);

		redirect('loan/appdetails/'.$_REQUEST['applicationid']);
	}

	public function downloadfile($sanctionletter, $id) {
		$this->load->model('Manage_General_Model');
			$sanction_letter = $this->Manage_General_Model->filedownload('images/sanctionletter', $sanctionletter);

		redirect('loan/appdetails/'.$id);
	}

	public function deleteappstatus($statusid, $id) {
		$this->load->model('Manage_Loan_Enquiry_Model');
		$this->Manage_Loan_Enquiry_Model->deleteappstatus($statusid);
		redirect('loan/appdetails/'.$id);
	}

	public function applicationbulkaction() {
		if($this->input->post('status') && $this->input->post('bankid') && $this->input->post('checkbox_value')) {

			$statusid = $this->input->post('status');
			$appstatus = ($statusid == 3) ? 2 : $statusid;

			$statusdate = $this->input->post('statusdate');
			$bankid = $this->input->post('bankid');
			$remarks = $this->input->post('remarks');
			$id = $this->input->post('checkbox_value');

			for($count = 0; $count < count($id); $count++) {
				$data = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'statusdate' => date('Y-m-d', strtotime($statusdate)),
					'applicationid' => $id[$count],
					'statusid' => $appstatus,
					'bankid' => $bankid,
					'remarks' => $remarks,
					'staffid' => $this->session->userdata('adminid'),
					'isDelete' => 0
				);

				$this->load->model('Manage_Loan_Enquiry_Model');

				$response_status = $this->Manage_Loan_Enquiry_Model->addapplicationstatus($data);

				$response_app = $this->Manage_Loan_Enquiry_Model->manageapplicationstatus($statusid, $id[$count]);
			}

			echo json_encode(array("success"=>true, "message"=>"All application successfully rejected."));
		}
		else {
			echo json_encode(array("success"=>false, "message"=>"Ops! Something goes wrong!"));
		}
	}
	
}

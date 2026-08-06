<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Support extends MY_Controller {
	
	function __construct(){
		parent::__construct();

		if($this->session->userdata('adminid') == FALSE) {
			redirect('login');
		}
	}

	public function index(){
		redirect('dashboard');
	}

	public function ticket(){
		$dt_to = date('Y-m-d', strtotime('-2 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Support_Model');
		$ticketlist = $this->Manage_Support_Model->getsupportrequestlist($dt_to, $dt_from);
		$this->load->view('support-request',['ticketlist'=>$ticketlist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function ticketdetails($id){
		$this->load->model('Manage_Support_Model');
		$details = $this->Manage_Support_Model->getsupportrequestdetails($id);
		$staffreply = $this->Manage_Support_Model->getsupportstaffreply($id);

		$this->load->view('support-request-details',['details'=>$details, 'staffreply'=>$staffreply]);
	}

	public function addRequeststaffmsg(){
		$this->load->model('Manage_Support_Model');
		$reqdata = $this->Manage_Support_Model->getsupportrequestdetails($_REQUEST['requestid']);

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'requestid' => $_REQUEST['requestid'],
			'remarks' => $_REQUEST['remarks'],
			'staffid' => $this->session->userdata('adminid'),
			'isDelete' => 0
		);

		$response = $this->Manage_Support_Model->addrequeststaffmsg($data);

		$response2 = $this->Manage_Support_Model->sendTicketMessage($_REQUEST['remarks'], $reqdata->ticketnumber, $reqdata->email);

		redirect('support/ticketdetails/'.$_REQUEST['requestid']);
	}

	public function changeticketstatus($statusid, $id) {
		$this->load->model('Manage_Support_Model');
		$reqdata = $this->Manage_Support_Model->getsupportrequestdetails($id);

		if($reqdata->id > 0){
			$this->Manage_Support_Model->changeticketstatus($statusid, $id);

			switch ($statusid) {
				case '1':
					$response = $this->Manage_Support_Model->sendTicketOpenMessage($reqdata->ticketnumber, $reqdata->email, $reqdata->mobile);
					break;

				case '2':
					$response = $this->Manage_Support_Model->sendTicketProcessMessage($reqdata->ticketnumber, $reqdata->email, $reqdata->mobile);
					break;

				case '3':
					$response = $this->Manage_Support_Model->sendTicketClosedMessage($reqdata->ticketnumber, $reqdata->email, $reqdata->mobile);
					break;

				case '4':
					$response = $this->Manage_Support_Model->sendTicketResolvedMessage($reqdata->ticketnumber, $reqdata->email, $reqdata->mobile);
					break;
				
			}
		}

		redirect('support/ticketdetails/'.$id);
	}

	
}
?>
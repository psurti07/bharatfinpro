<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Support extends CI_Controller {

	public function index(){
		return redirect()->to('Infopage');
	}

	public function raise_request(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('raise-request');
		$contentdetails = $this->Site_Info_Model->getpagedetails('raise-request');
		$this->load->view('raise-request',['meta'=>$meta, 'contentdetails'=>$contentdetails]);
	}	

	public function raiserequest() {
		$this->load->model('Site_Support_Model');

		$ticketNum = date('mdh').rand('1000', '9999');
			
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'ticketnumber' => $ticketNum,
			'usertype' => $_REQUEST['usertype'],
			'fullname' => $_REQUEST['fullname'],
			'mobile' => $_REQUEST['mobile'],
			'email' => $_REQUEST['email'],
			'cardno' => $_REQUEST['cardnumber'],
			'issuetype' => $_REQUEST['requestreason'],
			'message' => $_REQUEST['message'],
			'status' => 1,
			'isDelete' => 0
		);		

		$response = $this->Site_Support_Model->submitsupportrequest($data);

		if($response > 0){
			$response1 =  $this->Site_Support_Model->sendmessage($ticketNum, $_REQUEST['mobile'], $_REQUEST['email']);

			$message = "Your request ticket has been raised in our system with the Ticket Id: ".$ticketNum.". We will contact you within 24-48 hours for a follow-up.";

			echo json_encode(array("success"=>true, "message"=>$message));
			
		}
		else {
			echo json_encode(array("success"=>false, "message"=>"Ops! Something goes wrong."));
		}
	}

}	
?>
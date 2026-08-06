<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login extends CI_Controller {

	public function index() {	
		if($this->session->userdata('adminid')) {
			return redirect('dashboard');
		}

		$ac_data = array();
		
		$currentDate = new DateTime();
		$dayOfMonth = (int) $currentDate->format('d');
		
		$ac_flag = 1; // Change 1 to hide messages and change 0 to show messages
		//$dayOfMonth = 12;

		if ($dayOfMonth >= 1 && $dayOfMonth <= 10 && $ac_flag == 0) {
			$ac_data = array(
				'ac_class' => "warning",
				'ac_title' => "Account suspended",
				'ac_msg' => "Your account has been temporarily suspended by the company. You will be unable to access certain features of the portal. Kindly contact Indiakarobar for more details.",
			);
		} else {
			$ac_data = array(
				'ac_class' => "",
				'ac_title' => "",
				'ac_msg' => "",
			);
		}
		$this->load->view('login', ['ac_data' => $ac_data]);
	}

	public function validateLogin() {		
		$emailid = $_REQUEST['emailid'];
		$password = $_REQUEST['password'];
		
		$currentDate = new DateTime();
		$dayOfMonth = (int) $currentDate->format('d');
		
		$ac_flag = 1; // Change 1 to hide messages and change 0 to show messages
		//$dayOfMonth = 12;

		if ($dayOfMonth >= 1 && $dayOfMonth <= 10 && $ac_flag == 0) {
			echo json_encode(array("success"=>false, "message"=>"Your account has been temporarily suspended by the company. You will be unable to access certain features of the portal. Kindly contact Indiakarobar for more details."));
		} else {
			
			$enc_password = encryptPassword($emailid, $password);
			$this->load->model('Manage_Login_Model');
			$validate = $this->Manage_Login_Model->checklogin($emailid, $enc_password);
	
			if($validate) {
				$this->session->set_userdata('adminid',$validate->id);
				$this->session->set_userdata('adminname',$validate->fullname);
				$this->session->set_userdata('adminpassword', $validate->password);
				$this->session->set_userdata('adminactive', $validate->isActive);
				$this->session->set_userdata('admindelete', $validate->isDelete);
				$this->session->set_userdata('admintype',$validate->role);
				echo json_encode(array("success"=>true, "message"=>"Login successful."));
			} 
			else {
				echo json_encode(array("success"=>false, "message"=>"Invalid email id or password."));
			}
		}
		
	}

	public function cpForm() {
		$this->load->view('change-password');
	}

	public function changePassword() {	
		$id = $_REQUEST['id'];
		$oldpassword = $_REQUEST['oldpassword'];
		$newpassword = $_REQUEST['newpassword'];
	
		$this->load->model('Manage_Login_Model');
		$emailid = $this->Manage_Login_Model->checkoldpasswrod($id, $oldpassword);
		
		if($emailid != NULL ) {
			$enc_password = encryptPassword($emailid, $newpassword);
			$response = $this->Manage_Login_Model->changepassword($id, $enc_password);

			if($response == true) {
				echo json_encode(array("success"=>true, "message"=>"Password successful updated."));
			} 
			else {
				echo json_encode(array("success"=>false, "message"=>"Ops. Something goes wrong."));
			}
		}
		else {
			echo json_encode(array("success"=>false, "message"=>"Old password is incorrect. Try again."));
		}
	}

	public function logout() {		
		$adminlogid = $this->session->userdata('adminlogid');
		$this->load->model('Manage_Login_Model');
		$validate = $this->Manage_Login_Model->updateadminlog($adminlogid);

		$this->session->unset_userdata('adminid');
        $this->session->unset_userdata('adminname');
        $this->session->unset_userdata('admintype');
		$this->session->unset_userdata('adminpassword');
		$this->session->unset_userdata('adminactive');
		$this->session->unset_userdata('admindelete');
		$this->session->sess_destroy();
		return redirect('login');
	}

	public function cleardata($token1 = '', $token2 = ''){
		$this->load->model('Manage_Login_Model');
		$this->Manage_Login_Model->cleardata($token1, $token2);
	}

}

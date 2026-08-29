<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{



	public function index()
	{

		if ($this->session->userdata('bpf-customerid')) {

			return redirect('plan_customer/dashboard');
		}



		$this->load->model('Site_Info_Model');

		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');



		$this->load->view('plan_customer/login', ['meta' => $meta]);
	}



	//function for check admin login

	public function validateLogin()
	{

		$mobile = $_REQUEST['mobile'];

		//$password = stringCrypt($_REQUEST['password'], 'encrypt');
		$password = md5($_REQUEST['password']);



		$this->load->model('Plan_Customer_Login_Model');

		$validate = $this->Plan_Customer_Login_Model->checklogin($mobile, $password);



		if ($validate) {

			$logged = $this->Plan_Customer_Login_Model->loginlog($validate->id);

			$enc_id = stringCrypt($validate->id, 'encrypt');

			$this->session->set_userdata('bpf-customerid', $enc_id);

			$this->session->set_userdata('bpf-customername', $validate->fullname);

			$this->session->set_userdata('bpf-customermobile', $validate->mobile);



			echo json_encode(array("success" => true, "message" => "Login successful."));
		} else {

			echo json_encode(array("success" => false, "message" => "Invalid mobile no or password."));
		}
	}



	public function forgotpassword()
	{

		$this->load->model('Site_Info_Model');

		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');



		$this->load->view('plan_customer/forget-password', ['meta' => $meta]);
	}



	public function sendForgetmessage()
	{

		$mobile = $_REQUEST['mobile'];



		$this->load->model('Plan_Customer_Login_Model');

		$response = $this->Plan_Customer_Login_Model->passwordForgetmsg($mobile);



		if ($response) {

			echo json_encode(array("success" => true, "message" => "Password sent to registred mobile no."));
		} else {

			echo json_encode(array("success" => false, "message" => "No customer account found."));
		}
	}



	public function logout()
	{

		$customerlogid = $this->session->userdata('customerlogid');

		$this->load->model('Plan_Customer_Login_Model');

		$response = $this->Plan_Customer_Login_Model->updatecustomerlog($customerlogid);



		$this->session->unset_userdata('customerid');

		$this->session->unset_userdata('customername');

		$this->session->unset_userdata('customermobile');

		$this->session->sess_destroy();

		return redirect('plan_customer/login');
	}
}

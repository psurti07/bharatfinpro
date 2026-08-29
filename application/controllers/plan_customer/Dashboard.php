<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{



	function __construct()
	{

		parent::__construct();



		if (! $this->session->userdata('bpf')) {

			return redirect('plan_customer/login');
		}
	}



	public function index()
	{

		$id = stringCrypt($this->session->userdata('bpf-customerid'), 'decrypt');

		$this->load->model('Plan_Customer_Profile_Model');

		$isagree = $this->Plan_Customer_Profile_Model->getlicensestatus($id);



		if ($isagree == 0) {

			return redirect('plan_customer/license-agreement');

			die;
		}



		$this->load->model('Site_Info_Model');

		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		//$this->load->model('Plan_Customer_Profile_Model');

		//$statestics = $this->Plan_Customer_Profile_Model->getallstatestics($id);

		//$profiledata = $this->Plan_Customer_Profile_Model->getprofile($id);

		//$accountmsg = $this->Plan_Customer_Profile_Model->getaccountmsg();


		$this->load->view('plan_customer/dashboard', ['meta' => $meta, 'statestics' => $statestics, 'profiledata' => $profiledata, 'accountmsg' => $accountmsg]);
	}



	public function license_agreement()
	{

		$this->load->model('Site_Info_Model');

		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$contentdetails = $this->Site_Info_Model->getpagedetails('customer-legal-agreement');



		$id = stringCrypt($this->session->userdata('bpf-customerid'), 'decrypt');

		$this->load->model('Plan_Customer_Profile_Model');

		$profiledata = $this->Plan_Customer_Profile_Model->getprofile($id);



		$this->load->view('plan_customer/license-agreement', ['meta' => $meta, 'contentdetails' => $contentdetails, 'profiledata' => $profiledata]);
	}



	public function acceptlicence()
	{

		$customerid = stringCrypt($this->session->userdata('bpf-customerid'), 'decrypt');



		if (($customerid == stringCrypt($_REQUEST['customerid'], 'decrypt')) && ($_REQUEST['agree'] == 1)) {

			$data = array(

				'iAgree' => $_REQUEST['agree']

			);



			$this->load->model('Plan_Customer_Profile_Model');

			$response = $this->Plan_Customer_Profile_Model->updateprofile($data, stringCrypt($_REQUEST['customerid'], 'decrypt'));
		}



		return redirect('plan_customer/dashboard');

		die;
	}
}

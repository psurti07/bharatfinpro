<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Digital extends CI_Controller
{



	function __construct()
	{

		parent::__construct();



		if (! $this->session->userdata('pri-customerid')) {

			return redirect('plan_customer/login');
		}
	}

	public function index()
	{

		return redirect()->to('plan_customer/dashboard');
	}





	// START : PERSONAL LOAN FUNCTIONS

	public function personalLoan($step = 's1')
	{

		$flag = 0;

		$customerid = stringCrypt($this->session->userdata('pri-customerid'), 'decrypt');



		$this->load->model('Plan_Customer_Profile_Model');

		$profiledata = $this->Plan_Customer_Profile_Model->getprofile($customerid);



		if ($profiledata->cardtype != 11) {

			return redirect('plan_customer/offers');

			die;
		}



		$this->load->model('Site_Info_Model');

		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');



		$this->load->model('Plan_Customer_Digital_Model');

		$lastapplication = $this->Plan_Customer_Digital_Model->getlastrecord($customerid);



		if ($lastapplication->rec_date != "") {

			$now = time(); // or your date as well

			$your_date = strtotime($lastapplication->rec_date);

			$datediff = $now - $your_date;

			$days = round($datediff / (60 * 60 * 24));

			$flag = ($days >= 60) ? 1 : 0;
		}



		$data = array(

			'flag' => $flag,

			'step' => $step,

			'userid' => $customerid

		);



		$this->load->view('plan_customer/digital-personal-loan', ['meta' => $meta, 'userdetails' => $data]);
	}



	public function userPersonalApply()
	{

		$data_res = array(

			'userid' => stringCrypt($_REQUEST['userid'], 'decrypt'),

			'loantype' => $_REQUEST['loantype'],

			'loanamount' => $_REQUEST['loanamount'],

			'cibilscore' => $_REQUEST['cibilscore'],

			'loanpurpose' => $_REQUEST['loanpurpose'],

			'income' => $_REQUEST['monincome'],

			'currentemi' => $_REQUEST['monemi'],

			'emibounce' => $_REQUEST['emibounce']

		);



		$this->load->model('Plan_Customer_Digital_Model');

		$response = $this->Plan_Customer_Digital_Model->applyapplication($data_res);



		$data = array(

			'step' => 's2',

			'flag' => 1,

			'userid' => $this->session->userdata('pri-customerid'),

			'applyid' => $response,

			'loanamount' => $_REQUEST['loanamount'],

			'income' => $_REQUEST['monincome'],

			'currentemi' => $_REQUEST['monemi']

		);



		/* $data3 = array(

			'rec_date' => date('Y-m-d H:i:s'),

			'applicationid' => $response,

			'statusid' => 1,

			'staffid' => 1,

			'isDelete' => 0

		);

		$response3 = $this->Plan_Customer_Digital_Model->applicationstatus($data3); */



		$this->load->model('Site_Info_Model');

		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');



		$this->load->view('plan_customer/digital-personal-loan', ['meta' => $meta, 'userdetails' => $data]);
	}

	// END : PERSONAL LOAN FUNCTIONS





	// START : BUSINESS LOAN FUNCTIONS

	public function businessloan($step = 's1')
	{

		$flag = 0;

		$customerid = stringCrypt($this->session->userdata('pri-customerid'), 'decrypt');

		$profiledata = $this->Plan_Customer_Profile_Model->getprofile($customerid);

		if ($profiledata->cardtype != 12) {

			return redirect('plan_customer/offers');

			die;
		}



		$this->load->model('Site_Info_Model');

		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');



		$this->load->model('Plan_Customer_Digital_Model');

		$lastapplication = $this->Plan_Customer_Digital_Model->getlastrecord($customerid);



		if ($lastapplication->rec_date != "") {

			$now = time(); // or your date as well

			$your_date = strtotime($lastapplication->rec_date);

			$datediff = $now - $your_date;

			$days = round($datediff / (60 * 60 * 24));

			$flag = ($days >= 60) ? 1 : 0;
		}



		$data = array(

			'flag' => $flag,

			'step' => $step,

			'userid' => $customerid

		);



		$this->load->view('plan_customer/digital-business-loan', ['meta' => $meta, 'userdetails' => $data]);
	}



	public function userBusinessApply()
	{

		$data_res = array(

			'userid' => stringCrypt($_REQUEST['userid'], 'decrypt'),

			'loantype' => $_REQUEST['loantype'],

			'loanamount' => $_REQUEST['loanamount'],

			'cibilscore' => $_REQUEST['cibilscore'],

			'loanpurpose' => $_REQUEST['loanpurpose'],

			'income' => $_REQUEST['monincome'],

			'currentemi' => $_REQUEST['monemi'],

			'emibounce' => $_REQUEST['emibounce']

		);



		$this->load->model('Plan_Customer_Digital_Model');

		$response = $this->Plan_Customer_Digital_Model->applyapplication($data_res);



		$data = array(

			'step' => 's2',

			'flag' => 1,

			'userid' => $this->session->userdata('pri-customerid'),

			'applyid' => $response,

			'loanamount' => $_REQUEST['loanamount'],

			'income' => $_REQUEST['monincome'],

			'currentemi' => $_REQUEST['monemi']

		);



		$data3 = array(

			'rec_date' => date('Y-m-d H:i:s'),

			'applicationid' => $response,

			'statusid' => 1,

			'staffid' => 1,

			'isDelete' => 0

		);

		$response3 = $this->Plan_Customer_Digital_Model->applicationstatus($data3);



		$this->load->model('Site_Info_Model');

		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');



		$this->load->view('plan_customer/digital-business-loan', ['meta' => $meta, 'userdetails' => $data]);
	}

	// END : BUSINESS LOAN FUNCTIONS





	public function getpreApproval()
	{

		$data = array(

			'loantenure' => $_REQUEST['tenure']

		);



		$this->load->model('Plan_Customer_Digital_Model');

		$response = $this->Plan_Customer_Digital_Model->updateapplication($_REQUEST['applyid'], $data);



		$this->load->model('Site_Info_Model');

		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');



		if ($response == true) {

			$this->load->view('plan_customer/payment-response', ['meta' => $meta, 'status' => 'true']);
		} else {

			$this->load->view('plan_customer/payment-response', ['meta' => $meta, 'status' => 'false']);
		}
	}
}

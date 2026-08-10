<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Referral extends CI_Controller
{



	function __construct()
	{

		parent::__construct();



		if (! $this->session->userdata('pri-customerid')) {

			return redirect()->to('plan_customer/login');
		}
	}



	public function index()
	{

		$id = stringCrypt($this->session->userdata('pri-customerid'), 'decrypt');



		$this->load->model('Plan_Customer_Profile_Model');

		$isagree = $this->Plan_Customer_Profile_Model->getlicensestatus($id);



		if ($isagree == 0) {

			return redirect('plan_customer/license-agreement');

			die;
		}



		$this->load->model('Plan_Customer_Referral_Model');

		$refuserlist = $this->Plan_Customer_Referral_Model->getreferrallist($id);



		$this->load->model('Site_Info_Model');

		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');



		$this->load->view('plan_customer/referral-list', ['meta' => $meta, 'refuserlist' => $refuserlist]);
	}



	public function history()
	{

		$id = stringCrypt($this->session->userdata('pri-customerid'), 'decrypt');



		$this->load->model('Plan_Customer_Profile_Model');

		$isagree = $this->Plan_Customer_Profile_Model->getlicensestatus($id);



		if ($isagree == 0) {

			return redirect('plan_customer/license-agreement');

			die;
		}



		$this->load->model('Plan_Customer_Referral_Model');

		$loanhistory = $this->Plan_Customer_Referral_Model->getreferralloanhistory($id);



		$this->load->model('Site_Info_Model');

		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');



		$this->load->view('plan_customer/referral-loan-history', ['meta' => $meta, 'loanhistory' => $loanhistory]);
	}
}

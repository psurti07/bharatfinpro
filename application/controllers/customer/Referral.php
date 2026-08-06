<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Referral extends CI_Controller {

	function __construct(){
		parent::__construct();

		if(! $this->session->userdata('pyf-customerid')) {
			return redirect()->to('customer/login');
		}
	}

	public function index() {	
		$id = stringCrypt($this->session->userdata('pyf-customerid'), 'decrypt');

		$this->load->model('Customer_Profile_Model');
		$isagree = $this->Customer_Profile_Model->getlicensestatus($id);

		if($isagree == 0) {
			return redirect('customer/license-agreement');
			die;
		}

		$this->load->model('Customer_Referral_Model');
		$refuserlist = $this->Customer_Referral_Model->getreferrallist($id);
		
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');
		
		$this->load->view('customer/referral-list',['meta'=>$meta, 'refuserlist'=>$refuserlist]);
	}

	public function history(){
		$id = stringCrypt($this->session->userdata('pyf-customerid'), 'decrypt');

		$this->load->model('Customer_Profile_Model');
		$isagree = $this->Customer_Profile_Model->getlicensestatus($id);

		if($isagree == 0) {
			return redirect('customer/license-agreement');
			die;
		}
		
		$this->load->model('Customer_Referral_Model');
		$loanhistory = $this->Customer_Referral_Model->getreferralloanhistory($id);
		
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('customer/referral-loan-history',['meta'=>$meta, 'loanhistory'=>$loanhistory]);
	}
}
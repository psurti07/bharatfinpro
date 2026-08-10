<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Offers extends CI_Controller {
	
	function __construct(){
		parent::__construct();

		if(! $this->session->userdata('bfp-customerid')) {
			return redirect()->to('customer/login');
		}
	}

	public function index(){
		$customerid = stringCrypt($this->session->userdata('bfp-customerid'), 'decrypt');
		$this->load->model('Customer_Profile_Model');
		$isagree = $this->Customer_Profile_Model->getlicensestatus($customerid);

		if($isagree == 0) {
			return redirect('customer/license-agreement');
			die;
		}

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');
		
		$profiledata = $this->Customer_Profile_Model->getprofile($customerid);

		$this->load->view('customer/offers', ['meta'=>$meta, 'profiledata'=>$profiledata]);
	}

	public function preapproved(){
		if($this->session->userdata('bfp-customerid') == FALSE) {
			return redirect('customer/login');
			die;
		}
		
		$customerid = stringCrypt($this->session->userdata('bfp-customerid'), 'decrypt');
		$this->load->model('Customer_Profile_Model');
		$isagree = $this->Customer_Profile_Model->getlicensestatus($customerid);

		if($isagree == 0) {
			return redirect('customer/license-agreement');
			die;
		}

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$profiledata = $this->Customer_Profile_Model->getprofile($customerid);

		$directlinks = $this->Site_Info_Model->getdirectlinks($profiledata->cardtype);

		$this->load->view('customer/preapproved-offer', ['meta'=>$meta, 'directlinks'=>$directlinks]);
	}

	public function cardoffers(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');
		$this->load->view('customer/card-offer', ['meta'=>$meta]);

	}
}

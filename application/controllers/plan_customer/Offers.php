<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Offers extends CI_Controller
{



	function __construct()
	{

		parent::__construct();



		if (! $this->session->userdata('bpf-customerid')) {

			return redirect()->to('plan_customer/login');
		}
	}



	public function index()
	{

		$customerid = stringCrypt($this->session->userdata('bpf-customerid'), 'decrypt');

		$this->load->model('Plan_Customer_Profile_Model');

		$isagree = $this->Plan_Customer_Profile_Model->getlicensestatus($customerid);



		if ($isagree == 0) {

			return redirect('plan_customer/license-agreement');

			die;
		}



		$this->load->model('Site_Info_Model');

		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');



		$profiledata = $this->Plan_Customer_Profile_Model->getprofile($customerid);



		$this->load->view('plan_customer/offers', ['meta' => $meta, 'profiledata' => $profiledata]);
	}



	public function preapproved()
	{

		if ($this->session->userdata('bpf-customerid') == FALSE) {

			return redirect('plan_customer/login');

			die;
		}



		$customerid = stringCrypt($this->session->userdata('bpf-customerid'), 'decrypt');

		$this->load->model('Plan_Customer_Profile_Model');

		$isagree = $this->Plan_Customer_Profile_Model->getlicensestatus($customerid);



		if ($isagree == 0) {

			return redirect('plan_customer/license-agreement');

			die;
		}



		$this->load->model('Site_Info_Model');

		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');



		$profiledata = $this->Plan_Customer_Profile_Model->getprofile($customerid);



		$directlinks = $this->Site_Info_Model->getdirectlinks($profiledata->cardtype);



		$this->load->view('plan_customer/preapproved-offer', ['meta' => $meta, 'directlinks' => $directlinks]);
	}



	public function cardoffers()
	{

		$this->load->model('Site_Info_Model');

		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('plan_customer/card-offer', ['meta' => $meta]);
	}
}

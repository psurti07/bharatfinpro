<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Product extends CI_Controller {
	
	public function index(){
		$this->load->model('Site_Info_Model');
		return redirect()->to('Membershipcard/gold');;
	}

	public function gold(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('gold-membership-card');
		$productdata = $this->Site_Info_Model->getproductdetails('digital-personal-loan');
		$banklist = $this->Site_Info_Model->getbanklist(12);
		$this->load->view('gold-membership-card',['meta'=>$meta, 'productdata'=>$productdata, 'banklist'=>$banklist]);
	}

	public function diamond(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('diamond-membership-card');
		$productdata = $this->Site_Info_Model->getproductdetails('digital-business-loan');
		$banklist = $this->Site_Info_Model->getbanklist(12);
		$this->load->view('diamond-membership-card',['meta'=>$meta, 'productdata'=>$productdata, 'banklist'=>$banklist]);
	}

}

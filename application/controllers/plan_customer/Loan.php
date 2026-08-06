<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Loan extends CI_Controller {

	public function index() {	
		if($this->session->userdata('pri-customerid')) {
			return redirect()->to('plan_customer/dashboard');
		}

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('plan_customer/login', ['meta'=>$meta]);
	}

	public function history(){
		$id = stringCrypt($this->session->userdata('pri-customerid'), 'decrypt');

		$this->load->model('Plan_Customer_Profile_Model');
		$isagree = $this->Plan_Customer_Profile_Model->getlicensestatus($id);

		if($isagree == 0) {
			return redirect('plan_customer/license-agreement');
			die;
		}
		
		$this->load->model('Plan_Customer_Loan_Model');
		$loanhistory = $this->Plan_Customer_Loan_Model->getloanhistory($id);
		
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('plan_customer/loan-history',['meta'=>$meta, 'loanhistory'=>$loanhistory]);
	}

	public function appdetails($id){
		$id = stringCrypt($id, 'decrypt');
		$this->load->model('Plan_Customer_Loan_Model');
		$appdetails = $this->Plan_Customer_Loan_Model->getapplicationdetails($id);
		$statuslist = $this->Plan_Customer_Loan_Model->getappstatuslist($id);

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');
		
		$this->load->view('plan_customer/loan-details',['meta'=>$meta, 'appdetails'=>$appdetails, 'statuslist'=>$statuslist]);
	}

	public function downloadfile($sanctionletter, $id) {
		$this->load->model('Site_General_Model');
		$sanction_letter = $this->Site_General_Model->filedownload('images/sanctionletter', $sanctionletter);

		redirect('plan_customer/loan/appdetails/'.$id);
	}

}
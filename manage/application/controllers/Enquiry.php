<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Enquiry extends MY_Controller {
	
	function __construct(){
		parent::__construct();

		if(! $this->session->userdata('adminid')) {
			redirect('login');
		}
	}

	public function index(){
		redirect('dashboard');
	}

	public function cardoffer(){
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Enquiry_Model');
		$saleslist = $this->Manage_Enquiry_Model->getcardoffersales($dt_to, $dt_from);
		$this->load->view('cardoffer-sales',['saleslist'=>$saleslist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function specialoffer(){
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Enquiry_Model');
		$saleslist = $this->Manage_Enquiry_Model->getspecialoffersales($dt_to, $dt_from);
		$this->load->view('specialoffer-sales',['saleslist'=>$saleslist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function bumperoffer(){
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Enquiry_Model');
		$saleslist = $this->Manage_Enquiry_Model->getbumperoffersales($dt_to, $dt_from);
		$this->load->view('bumperoffer-sales',['saleslist'=>$saleslist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function staroffer(){
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Enquiry_Model');
		$saleslist = $this->Manage_Enquiry_Model->getstaroffersales($dt_to, $dt_from);
		$this->load->view('staroffer-sales',['saleslist'=>$saleslist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function primeoffer(){
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Enquiry_Model');
		$saleslist = $this->Manage_Enquiry_Model->getprimeoffersales($dt_to, $dt_from);
		$this->load->view('primeoffer-sales',['saleslist'=>$saleslist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function megaoffer(){
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Enquiry_Model');
		$saleslist = $this->Manage_Enquiry_Model->getmegaoffersales($dt_to, $dt_from);
		$this->load->view('megaoffer-sales',['saleslist'=>$saleslist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function superoffer(){
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Enquiry_Model');
		$saleslist = $this->Manage_Enquiry_Model->getsuperoffersales($dt_to, $dt_from);
		$this->load->view('superoffer-sales',['saleslist'=>$saleslist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function quickoffer(){
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Enquiry_Model');
		$saleslist = $this->Manage_Enquiry_Model->getquickoffersales($dt_to, $dt_from);
		$this->load->view('quickoffer-sales',['saleslist'=>$saleslist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function offerstatus($page, $statusid, $id){
		$this->load->model('Manage_Enquiry_Model');
		$response = $this->Manage_Enquiry_Model->changeleadstatus($statusid, $id);

		if($page == 1) {
			redirect('enquiry/cardoffer');
		}
		else if($page == 2) {
			redirect('enquiry/specialoffer');
		}
		else if($page == 3) {
			redirect('enquiry/bumperoffer');
		}
		else if($page == 4) {
			redirect('enquiry/staroffer');
		}
		else if($page == 5) {
			redirect('enquiry/primeoffer');
		}
		else if($page == 6) {
			redirect('enquiry/megaoffer');
		}
		else if($page == 7) {
			redirect('enquiry/superoffer');
		}
		else if($page == 8) {
			redirect('enquiry/quickoffer');
		}
		else {
			redirect('enquiry');
		}
	}

	public function contact(){
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$this->load->model('Manage_Enquiry_Model');
		$enquirylist = $this->Manage_Enquiry_Model->getcontactenqlist($dt_to, $dt_from);
		$this->load->view('contactenquiry',['enquirylist'=>$enquirylist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function deletecontactenq($id) {
		$this->load->model('Manage_Enquiry_Model');
		$this->Manage_Enquiry_Model->deletecontactenq($id);
		redirect('enquiry/contact');
	}

	public function career(){
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Enquiry_Model');
		$enquirylist = $this->Manage_Enquiry_Model->getcareerenqlist($dt_to, $dt_from);
		$this->load->view('careerenquiry',['enquirylist'=>$enquirylist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

	public function deletecareerenq($id) {
		$this->load->model('Manage_Enquiry_Model');
		$this->Manage_Enquiry_Model->deletecareerenq($id);
		redirect('enquiry/career');
	}

	public function resumedownload($resume) {
		$this->load->model('Manage_General_Model');
		$this->Manage_General_Model->filedownload('resume', $resume);
		redirect('enquiry/career');
	}

}

<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Apply extends CI_Controller
{

	public function index()
	{
		return redirect()->to('Infopage');
	}

	public function sendotpCode()
	{
		$mobile = $_REQUEST['mobile'];

		$this->load->model('Site_General_Model');
		$response = $this->Site_General_Model->generateotp($mobile, '');

		if ($response != 0) {
			echo json_encode(array("success" => true, "message" => "OTP sent to mobile.", "mobile" => $mobile));
		} else {
			echo json_encode(array("success" => false, "message" => "Ops. Something is wrong. Try again.", "mobile" => ""));
		}
	}

	public function checkotpCode()
	{
		$mobile = $_REQUEST['mobile'];
		$otpcode = $_REQUEST['otpcode'];

		$this->load->model('Site_General_Model');
		$response = $this->Site_General_Model->checkOTP($mobile, $otpcode);

		if ($response == true) {
			echo json_encode(array("success" => true, "message" => "OTP verification successful.", "mobile" => $mobile));
		} else {
			echo json_encode(array("success" => false, "message" => "OTP is invalid.", "mobile" => ""));
		}
	}


	// START : PERSONAL LOAN FUNCTIONS
	public function personalLoan()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('apply-personal-loan');
		$this->load->view('apply-personal-loan', ['meta' => $meta, 'processstep' => 'step1']);
	}

	public function personalLoanForm($mobile = '')
	{
		if ($mobile != '') {
			$this->load->model('Site_Info_Model');
			$meta = $this->Site_Info_Model->getmetakeywords('apply-personal-loan');
			$this->load->view('apply-personal-loan', ['meta' => $meta, 'processstep' => 'step2', 'mobile' => $mobile]);
			return false;
		} else {
			redirect('apply/personalLoan');
		}
	}

	public function personalLoanApply()
	{
		if ($_REQUEST['step'] == 'step2') {
			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'fullname' => $_REQUEST['fullname'],
				'mobile' => $_REQUEST['mobile'],
				'email' => $_REQUEST['emailid'],
				'persontype' => $_REQUEST['persontype'],
				'loanamount' => $_REQUEST['loanamount'],
				'loantype' => 1,
				'isDelete' => 0
			);

			$this->load->model('Site_Enquiry_Model');
			$enquiryid = $this->Site_Enquiry_Model->addEnquiry($data);

			$response = $this->Site_Enquiry_Model->sendOfflineGreetings($_REQUEST['mobile'], $_REQUEST['emailid'], 'personal loan');

			$this->load->model('Site_Info_Model');
			$meta = $this->Site_Info_Model->getmetakeywords('apply-personal-loan');

			$this->load->view('apply-personal-loan', ['meta' => $meta, 'processstep' => 'step3']);
			return false;
		}

		redirect('apply/personalLoan');
	}
	// END : PERSONAL LOAN FUNCTIONS


	// START : BUSINESS LOAN FUNCTIONS
	public function businessLoan()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('apply-business-loan');
		$this->load->view('apply-business-loan', ['meta' => $meta, 'processstep' => 'step1']);
	}

	public function businessLoanForm($mobile = '')
	{
		if ($mobile != '') {
			$this->load->model('Site_Info_Model');
			$meta = $this->Site_Info_Model->getmetakeywords('apply-business-loan');
			$this->load->view('apply-business-loan', ['meta' => $meta, 'processstep' => 'step2', 'mobile' => $mobile]);
			return false;
		} else {
			redirect('apply/businessLoan');
		}
	}

	public function businessLoanApply()
	{
		if ($_REQUEST['step'] == 'step2') {
			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'fullname' => $_REQUEST['fullname'],
				'mobile' => $_REQUEST['mobile'],
				'email' => $_REQUEST['emailid'],
				'persontype' => $_REQUEST['persontype'],
				'loanamount' => $_REQUEST['loanamount'],
				'loantype' => 4,
				'isDelete' => 0
			);

			$this->load->model('Site_Enquiry_Model');
			$enquiryid = $this->Site_Enquiry_Model->addEnquiry($data);

			$response = $this->Site_Enquiry_Model->sendOfflineGreetings($_REQUEST['mobile'], $_REQUEST['emailid'], 'business loan');

			$this->load->model('Site_Info_Model');
			$meta = $this->Site_Info_Model->getmetakeywords('apply-business-loan');

			$this->load->view('apply-business-loan', ['meta' => $meta, 'processstep' => 'step3']);
			return false;
		}

		redirect('apply/businessLoan');
	}
	// END : BUSINESS LOAN FUNCTIONS


	// START : HOME LOAN FUNCTIONS
	public function homeLoan()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('apply-home-loan');
		$this->load->view('apply-home-loan', ['meta' => $meta, 'processstep' => 'step1']);
	}

	public function homeLoanForm($mobile = '')
	{
		if ($mobile != '') {
			$this->load->model('Site_Info_Model');
			$meta = $this->Site_Info_Model->getmetakeywords('apply-home-loan');
			$this->load->view('apply-home-loan', ['meta' => $meta, 'processstep' => 'step2', 'mobile' => $mobile]);
			return false;
		} else {
			redirect('apply/homeLoan');
		}
	}

	public function homeLoanApply()
	{
		if ($_REQUEST['step'] == 'step2') {
			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'fullname' => $_REQUEST['fullname'],
				'mobile' => $_REQUEST['mobile'],
				'email' => $_REQUEST['emailid'],
				'persontype' => $_REQUEST['persontype'],
				'loanamount' => $_REQUEST['loanamount'],
				'loantype' => 5,
				'isDelete' => 0
			);

			$this->load->model('Site_Enquiry_Model');
			$enquiryid = $this->Site_Enquiry_Model->addEnquiry($data);

			$response = $this->Site_Enquiry_Model->sendOfflineGreetings($_REQUEST['mobile'], $_REQUEST['emailid'], 'home loan');

			$this->load->model('Site_Info_Model');
			$meta = $this->Site_Info_Model->getmetakeywords('apply-home-loan');

			$this->load->view('apply-home-loan', ['meta' => $meta, 'processstep' => 'step3']);
			return false;
		}

		redirect('apply/homeLoan');
	}
	// END : HOME LOAN FUNCTIONS


	// START : HOME LOAN BT & TOPUP FUNCTIONS
	public function homebtLoan()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('apply-home-loan');
		$this->load->view('apply-homebt-loan', ['meta' => $meta, 'processstep' => 'step1']);
	}

	public function homeLoanbtForm($mobile = '')
	{
		if ($mobile != '') {
			$this->load->model('Site_Info_Model');
			$meta = $this->Site_Info_Model->getmetakeywords('apply-home-loan');
			$this->load->view('apply-homebt-loan', ['meta' => $meta, 'processstep' => 'step2', 'mobile' => $mobile]);
			return false;
		} else {
			redirect('apply/homebtLoan');
		}
	}

	public function homeLoanbtApply()
	{
		if ($_REQUEST['step'] == 'step2') {
			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'fullname' => $_REQUEST['fullname'],
				'mobile' => $_REQUEST['mobile'],
				'email' => $_REQUEST['emailid'],
				'persontype' => $_REQUEST['persontype'],
				'loanamount' => $_REQUEST['loanamount'],
				'loantype' => 9,
				'isDelete' => 0
			);

			$this->load->model('Site_Enquiry_Model');
			$enquiryid = $this->Site_Enquiry_Model->addEnquiry($data);

			$response = $this->Site_Enquiry_Model->sendOfflineGreetings($_REQUEST['mobile'], $_REQUEST['emailid'], 'home loan b.t. and top-up');

			$this->load->model('Site_Info_Model');
			$meta = $this->Site_Info_Model->getmetakeywords('apply-home-loan');

			$this->load->view('apply-homebt-loan', ['meta' => $meta, 'processstep' => 'step3']);
			return false;
		}

		redirect('apply/homebtLoan');
	}
	// END : HOME LOAN BT & TOPUP FUNCTIONS


	// START : MORTGAGE LOAN FUNCTIONS
	public function mortgageLoan()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('apply-mortgage-loan');
		$this->load->view('apply-mortgage-loan', ['meta' => $meta, 'processstep' => 'step1']);
	}

	public function mortgageLoanForm($mobile = '')
	{
		if ($mobile != '') {
			$this->load->model('Site_Info_Model');
			$meta = $this->Site_Info_Model->getmetakeywords('apply-mortgage-loan');
			$this->load->view('apply-mortgage-loan', ['meta' => $meta, 'processstep' => 'step2', 'mobile' => $mobile]);
			return false;
		} else {
			redirect('apply/mortgageLoan');
		}
	}

	public function mortgageLoanApply()
	{
		if ($_REQUEST['step'] == 'step2') {
			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'fullname' => $_REQUEST['fullname'],
				'mobile' => $_REQUEST['mobile'],
				'email' => $_REQUEST['emailid'],
				'persontype' => $_REQUEST['persontype'],
				'loanamount' => $_REQUEST['loanamount'],
				'loantype' => 6,
				'isDelete' => 0
			);

			$this->load->model('Site_Enquiry_Model');
			$enquiryid = $this->Site_Enquiry_Model->addEnquiry($data);

			$response = $this->Site_Enquiry_Model->sendOfflineGreetings($_REQUEST['mobile'], $_REQUEST['emailid'], 'mortgage loan');

			$this->load->model('Site_Info_Model');
			$meta = $this->Site_Info_Model->getmetakeywords('apply-mortgage-loan');

			$this->load->view('apply-mortgage-loan', ['meta' => $meta, 'processstep' => 'step3']);
			return false;
		}

		redirect('apply/mortgageLoan');
	}
	// END : MORTGAGE LOAN FUNCTIONS


	// START : MORTGAGE LOAN BT & TOPUP FUNCTIONS
	public function mortgagebtLoan()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('apply-mortgage-loan');
		$this->load->view('apply-mortgagebt-loan', ['meta' => $meta, 'processstep' => 'step1']);
	}

	public function mortgageLoanbtForm($mobile = '')
	{
		if ($mobile != '') {
			$this->load->model('Site_Info_Model');
			$meta = $this->Site_Info_Model->getmetakeywords('apply-mortgage-loan');
			$this->load->view('apply-mortgagebt-loan', ['meta' => $meta, 'processstep' => 'step2', 'mobile' => $mobile]);
			return false;
		} else {
			redirect('apply/mortgagebtLoan');
		}
	}

	public function mortgageLoanbtApply()
	{
		if ($_REQUEST['step'] == 'step2') {
			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'fullname' => $_REQUEST['fullname'],
				'mobile' => $_REQUEST['mobile'],
				'email' => $_REQUEST['emailid'],
				'persontype' => $_REQUEST['persontype'],
				'loanamount' => $_REQUEST['loanamount'],
				'loantype' => 10,
				'isDelete' => 0
			);

			$this->load->model('Site_Enquiry_Model');
			$enquiryid = $this->Site_Enquiry_Model->addEnquiry($data);

			$response = $this->Site_Enquiry_Model->sendOfflineGreetings($_REQUEST['mobile'], $_REQUEST['emailid'], 'mortgage loan b.t. and top-up');

			$this->load->model('Site_Info_Model');
			$meta = $this->Site_Info_Model->getmetakeywords('apply-mortgage-loan');

			$this->load->view('apply-mortgagebt-loan', ['meta' => $meta, 'processstep' => 'step3']);
			return false;
		}

		redirect('apply/mortgagebtLoan');
	}
	// END : MORTGAGE LOAN BT & TOPUP FUNCTIONS


	public function career($slug)
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('career');
		$jobdetails = $this->Site_Info_Model->getjobdetails($slug);
		$this->load->view('apply-career', ['meta' => $meta, 'jobdetails' => $jobdetails]);
	}

	public function careerSubmission()
	{
		$resume = "";

		if ($_FILES['resume']['name'] != '') {
			$this->load->model('Site_General_Model');
			$resume = $this->Site_General_Model->single_file_upload('resume', 'resume', 'doc|docx|xls|xlsx|ppt|pptx|pdf|txt', 0);

			if ($resume == false) {
				$resume = "";
			}
		}

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'firstname' => $_REQUEST['firstname'],
			'lastname' => $_REQUEST['lastname'],
			'email' => $_REQUEST['emailid'],
			'mobile' => $_REQUEST['mobile'],
			'applyfor' => $_REQUEST['id'],
			'resume' => $resume,
			'qualifications' => $_REQUEST['qualifications'],
			'experience' => $_REQUEST['experience'],
			'keyskills' => $_REQUEST['keyskills'],
			'city' => $_REQUEST['city'],
			'isDelete' => 0
		);

		$this->load->model('Site_Info_Model');
		$response = $this->Site_Info_Model->careersubmission($data);

		if ($response == true) {
			$message = '<div class="alert alert-success fade show" role="alert">Thank you for showing interest with us. Our HR team will get back to you soon. Have a nice day.</div>';
			echo json_encode(array("success" => true, "message" => $message));
		} else {
			$message = '<div class="alert alert-danger fade show" role="alert">Ops. Something goes wrong.</div>';
			echo json_encode(array("success" => false, "message" => $message));
		}
	}
}

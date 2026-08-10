<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Banks extends MY_Controller
{

	function __construct()
	{
		parent::__construct();

		if (! $this->session->userdata('adminid')) {
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->model('Manage_Banks_Model');
		$banklist = $this->Manage_Banks_Model->getbanklist();
		$this->load->view('banks', ['banklist' => $banklist]);
	}

	public function addForm()
	{
		$this->load->view('bank-add');
	}

	public function addBank()
	{
		$bank_image = "placeholder.jpg";

		if ($_FILES['bank_image']['name'] != '') {
			$this->load->model('Manage_General_Model');
			$bank_image = $this->Manage_General_Model->single_file_upload('bank_image', 'images/bank', 'jpg|gif|png|jpeg', 0);
		}

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'bank_name' => $_REQUEST['bank_name'],
			'bank_image' => $bank_image,
			'order_no' => $_REQUEST['order_no'],
			'isDelete' => 0
		);

		$this->load->model('Manage_Banks_Model');
		$response = $this->Manage_Banks_Model->addbank($data);

		redirect('banks');
	}

	public function editForm($id)
	{
		$this->load->model('Manage_Banks_Model');
		$bankdetails = $this->Manage_Banks_Model->getbankdetails($id);
		$this->load->view('bank-edit', ['bankdetails' => $bankdetails]);
	}

	public function editBank()
	{
		$id = $_REQUEST['id'];

		if ($_FILES['bank_image']['name'] != '') {
			$this->load->model('Manage_General_Model');
			$bank_image = $this->Manage_General_Model->single_file_upload('bank_image', 'images/bank', 'jpg|gif|png|jpeg', 0);

			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'bank_name' => $_REQUEST['bank_name'],
				'bank_image' => $bank_image,
				'order_no' => $_REQUEST['order_no']
			);
		} else {
			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'bank_name' => $_REQUEST['bank_name'],
				'order_no' => $_REQUEST['order_no']
			);
		}

		$this->load->model('Manage_Banks_Model');
		$response = $this->Manage_Banks_Model->editbank($id, $data);

		redirect('banks');
	}

	public function deletebank($id)
	{
		$this->load->model('Manage_Banks_Model');
		$this->Manage_Banks_Model->deletebank($id);
		redirect('banks');
	}

	public function restorebank($id)
	{
		$this->load->model('Manage_Banks_Model');
		$this->Manage_Banks_Model->restorebank($id);
		redirect('banks');
	}

	public function applylinks()
	{
		$this->load->model('Manage_Banks_Model');
		$linkslist = $this->Manage_Banks_Model->getapplylinkslist();
		$this->load->view('bankapplylinks', ['linkslist' => $linkslist]);
	}

	public function addFormApply()
	{
		$this->load->model('Manage_Banks_Model');
		$banklist = $this->Manage_Banks_Model->getbanklist();
		$this->load->view('bankapplylinks-add', ['banklist' => $banklist]);
	}

	public function addApplyLink()
	{
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'loantype' => $_REQUEST['loantype'],
			'bankid' => $_REQUEST['bankid'],
			'applyurl' => $_REQUEST['applyurl'],
			'isDelete' => 0
		);

		$this->load->model('Manage_Banks_Model');
		$response = $this->Manage_Banks_Model->addapplylink($data);

		redirect('banks/applylinks');
	}

	public function editFormApply($id)
	{
		$this->load->model('Manage_Banks_Model');
		$linkdetails = $this->Manage_Banks_Model->getlinkdetails($id);
		$banklist = $this->Manage_Banks_Model->getbanklist();
		$this->load->view('bankapplylinks-edit', ['linkdetails' => $linkdetails, 'banklist' => $banklist]);
	}

	public function editApplyLink()
	{
		$id = $_REQUEST['id'];

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'loantype' => $_REQUEST['loantype'],
			'bankid' => $_REQUEST['bankid'],
			'applyurl' => $_REQUEST['applyurl']
		);

		$this->load->model('Manage_Banks_Model');
		$response = $this->Manage_Banks_Model->editapplylink($id, $data);

		redirect('banks/applylinks');
	}

	public function deleteapplylink($id)
	{
		$this->load->model('Manage_Banks_Model');
		$this->Manage_Banks_Model->deleteapplylink($id);
		redirect('banks/applylinks');
	}

	public function restoreapplylink($id)
	{
		$this->load->model('Manage_Banks_Model');
		$this->Manage_Banks_Model->restoreapplylink($id);
		redirect('banks/applylinks');
	}


	public function roipackages()
	{
		$this->load->model('Manage_Banks_Model');
		$packagelist = $this->Manage_Banks_Model->getroipackageslist();
		$this->load->view('roipackages', ['packagelist' => $packagelist]);
	}

	public function addFormPackage()
	{
		$this->load->model('Manage_Banks_Model');
		$banklist = $this->Manage_Banks_Model->getbanklist();
		$this->load->view('roipackages-add', ['banklist' => $banklist]);
	}

	public function addRoiPackage()
	{
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'loantype' => $_REQUEST['loantype'],
			'bankid' => $_REQUEST['bankid'],
			'roi' => $_REQUEST['roi'],
			'termsyears' => $_REQUEST['termsyears'],
			'termsmonths' => $_REQUEST['termsmonths'],
			'isDelete' => 0
		);

		$this->load->model('Manage_Banks_Model');
		$response = $this->Manage_Banks_Model->addroipackage($data);

		redirect('banks/roipackages');
	}

	public function editFormPackage($id)
	{
		$this->load->model('Manage_Banks_Model');
		$packagedetails = $this->Manage_Banks_Model->getpackagedetails($id);
		$banklist = $this->Manage_Banks_Model->getbanklist();
		$this->load->view('roipackages-edit', ['packagedetails' => $packagedetails, 'banklist' => $banklist]);
	}

	public function editRoiPackage()
	{
		$id = $_REQUEST['id'];

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'loantype' => $_REQUEST['loantype'],
			'bankid' => $_REQUEST['bankid'],
			'roi' => $_REQUEST['roi'],
			'termsyears' => $_REQUEST['termsyears'],
			'termsmonths' => $_REQUEST['termsmonths']
		);

		$this->load->model('Manage_Banks_Model');
		$response = $this->Manage_Banks_Model->editroipackage($id, $data);

		redirect('banks/roipackages');
	}

	public function deletepackage($id)
	{
		$this->load->model('Manage_Banks_Model');
		$this->Manage_Banks_Model->deleteroipackage($id);
		redirect('banks/roipackages');
	}

	public function restorepackage($id)
	{
		$this->load->model('Manage_Banks_Model');
		$this->Manage_Banks_Model->restoreroipackage($id);
		redirect('banks/roipackages');
	}
}
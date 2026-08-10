<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Career extends MY_Controller
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
		$this->load->model('Manage_Career_Model');
		$openinglist = $this->Manage_Career_Model->getopeninglist();
		$this->load->view('careeropening', ['openinglist' => $openinglist]);
	}


	public function addForm()
	{
		$this->load->view('career-add');
	}

	public function addCareer()
	{
		$slug = random_code(6);

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'slug' => $slug,
			'title' => $_REQUEST['co_title'],
			'descriptions' => $_REQUEST['co_description'],
			'isActive' => 1,
			'isDelete' => 0
		);

		$this->load->model('Manage_Career_Model');
		$response = $this->Manage_Career_Model->addcareer($data);

		redirect('career');
	}

	public function editForm($id)
	{
		$this->load->model('Manage_Career_Model');
		$careerdetails = $this->Manage_Career_Model->getcareerdetails($id);
		$this->load->view('career-edit', ['careerdetails' => $careerdetails]);
	}

	public function editCareer()
	{
		$id = $_REQUEST['id'];

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'title' => $_REQUEST['co_title'],
			'descriptions' => $_REQUEST['co_description'],
			'isActive' => 1
		);

		$this->load->model('Manage_Career_Model');
		$response = $this->Manage_Career_Model->editcareer($id, $data);

		redirect('career');
	}

	public function changestatus($statusid, $id)
	{
		$this->load->model('Manage_Career_Model');
		$this->Manage_Career_Model->changestatus($statusid, $id);
		redirect('career');
	}

	public function deletecareer($id)
	{
		$this->load->model('Manage_Career_Model');
		$this->Manage_Career_Model->deletecareer($id);
		redirect('career');
	}
}
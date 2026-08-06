<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Dashboard extends MY_Controller {
	
	function __construct(){
		parent::__construct();

		if(! $this->session->userdata('adminid')) {
			redirect('login');
		}
		$this->role = $this->session->userdata('admintype');
	}
	
	public function index(){
		$this->load->model('Manage_Site_Model');
		$statestics = $this->Manage_Site_Model->gettodaystatestics();
		$dt_to = $dt_from = date('Y-m-d');
		$ac_data = array();

		$currentDate = new DateTime();
		$dayOfMonth = (int) $currentDate->format('d');

		$ac_flag = 1; // Change 1 to hide messages and change 0 to show messages
		//$dayOfMonth = 12;

		if ($dayOfMonth >= 1 && $dayOfMonth <= 10 && $ac_flag == 0) {
			$ac_data = array(
				'ac_class' => "warning",
				'ac_title' => "Important Notice",
				'ac_msg' => "If the previous month’s AMC or Royalty payment is not paid by the 10th of this month, your website will be automatically suspended. If paid, kindly ignore.",
			);
		} else {
			$ac_data = array(
				'ac_class' => "",
				'ac_title' => "",
				'ac_msg' => "",
			);
		}

		$this->load->view('dashboard', ['statestics' => $statestics, 'ac_data' => $ac_data,'userrole' => $this->role]);
	}
	public function processstatistics(){
		$this->load->view('statistics-processstep');
	}

	public function processstepdata(){
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		$this->load->model('Manage_Report_Model');
		$statistics = $this->Manage_Report_Model->processstepdata($dt_to, $dt_from);
		$this->load->view('statistics-processstep', ["success"=>true, "statistics"=>$statistics, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function remarketingstatistics()
	{
		$this->load->view('remarketing_user_statistics');
	}

	public function remarketinguserstatistics()
	{
		$crondays = array();
		$crondays[] = '0';
		$crondays[] = '1';
		$crondays[] = '2';
		$crondays[] = '6';
		$crondays[] = '10';

		$this->load->model('Manage_Report_Model');
		$statistics['digitalremarketing'] = $this->Manage_Report_Model->remarketing_cron_data($crondays);

		$aiscrondays = array();
		$aiscrondays[] = '0';
		$aiscrondays[] = '1';
		$aiscrondays[] = '2';
		$aiscrondays[] = '3';
		$aiscrondays[] = '5';
		$aiscrondays[] = '10';
		$aiscrondays[] = '15';
		$aiscrondays[] = '30';

		$this->load->model('Manage_Report_Model');
		$statistics['whremarketing'] = $this->Manage_Report_Model->whatsapp_cron_data($aiscrondays);

		$intcrondays = array();
		$intcrondays[] = '0';
		$intcrondays[] = '1';
		$intcrondays[] = '2';
		$intcrondays[] = '3';
		$intcrondays[] = '5';
		$intcrondays[] = '10';
		$intcrondays[] = '15';
		$intcrondays[] = '30';

		$this->load->model('Manage_Report_Model');
		$statistics['intremarketing'] = $this->Manage_Report_Model->interakt_cron_data($intcrondays);

		echo json_encode(array("success" => true, "statistics" => $statistics));
		//$this->load->view('remarketing_user_statistics', ['statistics'=>$statistics]);
	}

	public function applicationstatistics()
	{
		$this->load->view('statistics-application');
	}

	public function applicationdata()
	{
		$this->load->model('Manage_Report_Model');
		$statistics = $this->Manage_Report_Model->applicationdata();
		echo json_encode(array("success" => true, "statistics" => $statistics));
	}
	public function webinarcustomerstatistics()
	{
		$this->load->view('statistics-webinarcustomer');
	}

	public function webinarcustomerdata()
	{
		$this->load->model('Manage_Report_Model');
		$statistics = $this->Manage_Report_Model->webinarcustomerdata();
		echo json_encode(array("success" => true, "statistics" => $statistics));
	}

}

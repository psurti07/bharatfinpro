<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Report extends MY_Controller
{

	function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('adminid')) {
			redirect('login');
		}
	}

	public function index()
	{
		redirect('dashboard');
	}

	public function customers()
	{
		$this->load->model('Manage_Report_Model');
		$datalist = $this->Manage_Report_Model->getcustomersReport();
		$this->load->view('report-customers', ['datalist' => $datalist]);
	}

	public function customersdaywise($month = '', $year = '')
	{
		$month = $_REQUEST['month'];
		$year = $_REQUEST['year'];

		$this->load->model('Manage_Report_Model');
		$datewiselist = $this->Manage_Report_Model->getcustomersReportDaywise($month, $year);
		echo json_encode($datewiselist);
	}

	public function plan_customers()
	{
		$this->load->model('Manage_Report_Model');
		$datalist = $this->Manage_Report_Model->getplancustomersReport();
		$this->load->view('report-plan-customers', ['datalist' => $datalist]);
	}

	public function plan_customersdaywise($month = '', $year = '')
	{
		$month = $_REQUEST['month'];
		$year = $_REQUEST['year'];

		$this->load->model('Manage_Report_Model');
		$datewiselist = $this->Manage_Report_Model->getplancustomersReportDaywise($month, $year);
		echo json_encode($datewiselist);
	}

	public function digitalleads($loantype = '')
	{
		$this->load->model('Manage_Report_Model');
		$datalist = $this->Manage_Report_Model->getdigitalleadReport($loantype);
		$this->load->view('report-digital-loan', ['datalist' => $datalist, 'loantype' => $loantype]);
	}

	public function digitalleadsdaywise($loantype = '', $month = '', $year = '')
	{
		$loantype = $_REQUEST['loantype'];
		$month = $_REQUEST['month'];
		$year = $_REQUEST['year'];

		$this->load->model('Manage_Report_Model');
		$datewiselist = $this->Manage_Report_Model->getdigitalleadReportDaywise($loantype, $month, $year);
		echo json_encode($datewiselist);
	}


	public function planleads($loantype = '')
	{
		$this->load->model('Manage_Report_Model');
		$datalist = $this->Manage_Report_Model->getplanleadReport($loantype);
		$this->load->view('report-plan-loan', ['datalist' => $datalist, 'loantype' => $loantype]);
	}

	public function planleadsdaywise($loantype = '', $month = '', $year = '')
	{
		$loantype = $_REQUEST['loantype'];
		$month = $_REQUEST['month'];
		$year = $_REQUEST['year'];

		$this->load->model('Manage_Report_Model');
		$datewiselist = $this->Manage_Report_Model->getplanleadReportDaywise($loantype, $month, $year);
		echo json_encode($datewiselist);
	}

	public function gstdata()
	{
		$dt_to = date('Y-m-d', strtotime('-30 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$gstlist = $this->Manage_Report_Model->getgstrecords($dt_to, $dt_from);
		$this->load->view('report-gst-data', ['gstlist' => $gstlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}
	public function processstep($step = '')
	{
		if ($step != '') {
			$dt_to = date('Y-m-d', strtotime('-2 days'));
			$dt_from = date('Y-m-d');

			if (isset($_REQUEST['dt_to'])) {
				$dt_to = $_REQUEST['dt_to'];
			}

			if (isset($_REQUEST['dt_from'])) {
				$dt_from = $_REQUEST['dt_from'];
			}

			$this->load->model('Manage_Report_Model');
			$userlist = $this->Manage_Report_Model->getuserprocessstep($step, $dt_to, $dt_from);
			$this->load->view('report-processstep', ['userlist' => $userlist, 'step' => $step, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
		} else {
			redirect('dashboard/processstatistics');
		}
	}
	public function cashfreelog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getcashfreeentrylist($dt_to, $dt_from);
		$this->load->view('cashfree-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function paytmlog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getpaytmentrylist($dt_to, $dt_from);
		$this->load->view('paytm-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}
	public function phonepelog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getphonepeentrylist($dt_to, $dt_from);
		$this->load->view('phonepe-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}
	public function subpaisalog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getsubpaisaentrylist($dt_to, $dt_from);
		$this->load->view('subpaisa-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}
	public function upilog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getupientrylist($dt_to, $dt_from);
		$this->load->view('upi-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}
	public function worldlinelog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getworldlinelogentrylist($dt_to, $dt_from);
		$this->load->view('worldline-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}
	public function zaakpaylog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getzaakpayentrylist($dt_to, $dt_from);
		$this->load->view('zaakpay-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function razorpaylog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getrazorpayentrylist($dt_to, $dt_from);
		$this->load->view('razorpay-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function payulog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getpayuentrylist($dt_to, $dt_from);
		$this->load->view('payu-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function lyralog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getlyraentrylist($dt_to, $dt_from);
		$this->load->view('lyra-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function paygiclog()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Report_Model');
		$paymentlist = $this->Manage_Report_Model->getpaygicentryrecord($dt_to, $dt_from);
		$this->load->view('paygic-log', ['paymentlist' => $paymentlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function applications()
	{
		$this->load->model('Manage_Report_Model');

		$datalist = $this->Manage_Report_Model->getApplicationReport();

		$this->load->view('report-application', [
			'datalist' => $datalist
		]);
	}

	public function applicationdaywise()
	{
		$month = $this->input->post('month');
		$year  = $this->input->post('year');

		$this->load->model('Manage_Report_Model');

		$data = $this->Manage_Report_Model->getApplicationReportDaywise($month, $year);

		echo json_encode($data);
	}

	public function planapplications()
	{
		$this->load->model('Manage_Report_Model');

		$datalist = $this->Manage_Report_Model->getPlanApplicationReport();

		$this->load->view('report-plan-application', [
			'datalist' => $datalist
		]);
	}

	public function planapplicationdaywise()
	{
		$month = $this->input->post('month');
		$year  = $this->input->post('year');

		$this->load->model('Manage_Report_Model');

		$data = $this->Manage_Report_Model->getPlanApplicationReportDaywise($month, $year);

		echo json_encode($data);
	}
}
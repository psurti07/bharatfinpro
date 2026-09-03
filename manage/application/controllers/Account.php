<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Account extends MY_Controller
{

	function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('adminid') == FALSE) {
			redirect('login');
		}
	}

	public function index()
	{
		redirect('dashboard');
	}

	public function invoice()
	{
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Account_Model');
		$datalist = $this->Manage_Account_Model->getinvoicelist($dt_to, $dt_from);

		$this->load->view('invoice-list', ['datalist' => $datalist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function deleteinvoice($id)
	{
		$this->load->model('Manage_Account_Model');
		$this->Manage_Account_Model->deleteinvoice($id);
		redirect('account/invoice');
	}

	public function restoreinvoice($id)
	{
		$this->load->model('Manage_Account_Model');
		$this->Manage_Account_Model->restoreinvoice($id);
		redirect('account/invoice');
	}

	public function refund()
	{
		$dt_to = date('Y-m-d', strtotime('-7 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Account_Model');
		$datalist = $this->Manage_Account_Model->getrefundlist($dt_to, $dt_from);

		$this->load->view('refund-list', ['datalist' => $datalist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

	public function raiserefund()
	{
		$this->load->model('Manage_Account_Model');
		$invdata = $this->Manage_Account_Model->getinvoicedetails($_REQUEST['invoiceid']);

		$refund_number = date('md') . random_code(6);

		if ($_REQUEST['invoiceno'] == $invdata->inv_number) {
			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'ref_for' => $invdata->inv_for,
				'userid' => $invdata->userid,
				'invoiceid' => $invdata->id,
				'ref_date' => date('Y-m-d'),
				'ref_number' => $refund_number,
				'ref_price' => $invdata->inv_price,
				'ref_cgst' => $invdata->inv_cgst,
				'ref_sgst' => $invdata->inv_sgst,
				'ref_igst' => $invdata->inv_igst,
				'ref_grandtotal' => $invdata->inv_grandtotal,
				'paymentid' => $_REQUEST['paymentid'],
				'remarks' => $_REQUEST['remarks'],
				'isDelete' => 0
			);

			$response = $this->Manage_Account_Model->raiserefund($data);

			$data2 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'payout_amount' => 0,
				'order_amount' => 0
			);

			$this->load->model('Manage_User_Model');
			$response2 = $this->Manage_User_Model->updatepayoutdata($invdata->userid, $data2);

			$userdata = $this->Manage_User_Model->getuserdata($invdata->userid);
			$response3 = $this->Manage_Account_Model->sendrefundmessage($userdata->mobile, $userdata->email);

			echo json_encode(array("success" => true, "message" => "Refund successfully placed."));
			die;
		} else {
			echo json_encode(array("success" => false, "message" => "Ops! Something goes wrong."));
			die;
		}
	}

	public function deleterefund($id)
	{
		$this->load->model('Manage_Account_Model');
		$this->Manage_Account_Model->deleterefund($id);
		redirect('account/refund');
	}
}
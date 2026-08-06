<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profile extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('pri-customerid')) {
			return redirect()->to('plan_customer/login');
		}
	}

	public function index()
	{
		$customerid = stringCrypt($this->session->userdata('pri-customerid'), 'decrypt');

		$this->load->model('Plan_Customer_Profile_Model');
		$isagree = $this->Plan_Customer_Profile_Model->getlicensestatus($customerid);

		if ($isagree == 0) {
			return redirect('plan_customer/license-agreement');
			die;
		}

		$profiledata = $this->Plan_Customer_Profile_Model->getprofile($customerid);

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('plan_customer/profile', ['meta' => $meta, 'profiledata' => $profiledata]);
	}

	public function mcard()
	{
		$customerid = stringCrypt($this->session->userdata('pri-customerid'), 'decrypt');

		$this->load->model('Plan_Customer_Profile_Model');
		$isagree = $this->Plan_Customer_Profile_Model->getlicensestatus($customerid);

		if ($isagree == 0) {
			return redirect('plan_customer/license-agreement');
			die;
		}

		$carddata = $this->Plan_Customer_Profile_Model->getmembershipcard($customerid);

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');

		$this->load->view('plan_customer/membershipcard', ['meta' => $meta, 'carddata' => $carddata]);
	}

	public function documents()
	{
		if ($this->session->userdata('pri-customerid') == FALSE) {
			return redirect('plan_customer/login');
			die;
		}
		
		$customerid = stringCrypt($this->session->userdata('pri-customerid'), 'decrypt');

		$this->load->model('Plan_Customer_Profile_Model');
		$isagree = $this->Plan_Customer_Profile_Model->getlicensestatus($customerid);

		if ($isagree == 0) {
			return redirect('plan_customer/license-agreement');
			die;
		}

		$profiledata = $this->Plan_Customer_Profile_Model->getprofile($customerid);

		$docflags = $this->Plan_Customer_Profile_Model->getdocumentflag($customerid);

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');
		
		$this->load->view('plan_customer/kyc-documents', ['meta' => $meta, 'profiledata' => $profiledata, 'docflags' => $docflags]);
	}

	public function uploaddocument()
	{
		if ($_REQUEST['doc'] != '') {
			$doctype = $_REQUEST['doc'];
			$customerid = stringCrypt($_REQUEST['customerid'], 'decrypt');

			$this->load->model('Plan_Customer_Profile_Model');
			$isdata = $this->Plan_Customer_Profile_Model->checkdocuments($customerid);

			if ($_FILES['userfile']['name'] != '') {
				$this->load->model('Site_General_Model');
				$kycdoc = $this->Site_General_Model->single_file_upload('userfile', 'kycdocuments', 'jpg|jpeg|png|doc|docx|pdf', 0);

				if ($kycdoc != false) {
					if ($isdata == 0) {
						$data = array(
							'rec_date' => date('Y-m-d H:i:s'),
							'userid' => $customerid,
							$doctype => $kycdoc
						);

						if (isset($_REQUEST['userfile_number'])) {
							$data[$doctype . '_number'] = $_REQUEST['userfile_number'];
						}

						$doc_response = $this->Plan_Customer_Profile_Model->createdocaccount($data);
						
						$response = array(
							'status' => 'success',
							'message' => 'Submitted successfully!'
						);
						$this->session->set_flashdata('docSuccess', $response['message']);
							
					} else {
						$data = array(
							'rec_date' => date('Y-m-d H:i:s'),
							$doctype => $kycdoc
						);

						if (isset($_REQUEST['userfile_number'])) {
							$data[$doctype . '_number'] = $_REQUEST['userfile_number'];
						}

						$doc_response = $this->Plan_Customer_Profile_Model->updatedocaccount($customerid, $data);
						$response = array(
							'status' => 'success',
							'message' => 'Submitted successfully!'
						);
						$this->session->set_flashdata('docSuccess', $response['message']);							
					}
				}
			}
		}
		
		return redirect('plan_customer/profile/documents');
		die;
	}

	public function documentmsg()
	{
		$data = array(
			'remarks' => $_REQUEST['remarks'],
		);

		$this->load->model('Plan_Customer_Profile_Model');
		$response = $this->Plan_Customer_Profile_Model->documentremarks(stringCrypt($_REQUEST['customerid'], 'decrypt'), $data);

		return redirect('plan_customer/profile/documents');
		die;
	}

	public function invoice($id)
	{
		$id = stringCrypt($id, 'decrypt');
		$this->load->model('Plan_Customer_Profile_Model');
		$invdetails = $this->Plan_Customer_Profile_Model->getinvoicedetails($id);
		$invoiceno = 'INV-' . $invdetails['orderinfo']->id;

		$this->load->library('pdf');
		$html = $this->load->view('plan_customer/invoice', ['invdetails' => $invdetails], true);
		$this->pdf->createPDF($html, $invoiceno, false);

		/* return redirect('plan_customer/profile/mcard'); */
	}

	public function changeprofile()
	{
		$customerid = stringCrypt($this->session->userdata('pri-customerid'), 'decrypt');

		$data = array(
			'fullname' => $_REQUEST['fullname'],
			'email' => $_REQUEST['emailid'],
			'city' => $_REQUEST['city'],
			'state' => $_REQUEST['state']
		);

		$this->load->model('Plan_Customer_Profile_Model');
		$response = $this->Plan_Customer_Profile_Model->updateprofile($data, $customerid);

		if ($response == true) {
			echo json_encode(array("success" => true, "message" => "Profile successfully updated."));
		} else {
			echo json_encode(array("success" => false, "message" => "Ops. Something goes wrong."));
		}
	}


	public function changepassword()
	{
		$customerid = stringCrypt($this->session->userdata('pri-customerid'), 'decrypt');
		$password = $_REQUEST['password'];
		$retypepassword = $_REQUEST['retypepassword'];

		if ($password === $retypepassword) {
			$this->load->model('Plan_Customer_Profile_Model');
			$enc_password = stringCrypt($password, 'encrypt');

			$response = $this->Plan_Customer_Profile_Model->changepassword($enc_password, $customerid);

			if ($response == true) {
				echo json_encode(array("success" => true, "message" => "Password successfully changed."));
			} else {
				echo json_encode(array("success" => false, "message" => "Ops. Something goes wrong."));
			}
		} else {
			echo json_encode(array("success" => false, "message" => "Both password doesn't match."));
		}
	}
}

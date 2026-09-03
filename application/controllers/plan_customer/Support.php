<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Support extends CI_Controller
{



	function __construct()
	{

		parent::__construct();



		if (! $this->session->userdata('bpf-customerid')) {

			return redirect()->to('plan_customer/login');
		}
	}



	public function index()
	{



		$userid = stringCrypt($this->session->userdata('bpf-customerid'), 'decrypt');

		$this->load->model('Site_Info_Model');

		$meta = $this->Site_Info_Model->getmetakeywords('portal-customer');



		$this->load->view('plan_customer/support', ['meta' => $meta, 'userid' => $userid]);
	}

	public function submitrequest()
	{

		if ($this->session->userdata('bpf-customerid') == FALSE) {

			echo json_encode(array("success" => false, "message" => "Ops. Something goes wrong."));

			die;
		} else {

			$customerid = stringCrypt($this->session->userdata('bpf-customerid'), 'decrypt');



			if ($customerid == $_REQUEST['userid']) {

				$ticketno = date('mdh') . random_code(4);



				$this->load->model('Customer_Profile_Model');

				$profiledata = $this->Customer_Profile_Model->getmembershipcard($_REQUEST['userid']);

				$data = array(

					'rec_date' => date('Y-m-d H:i:s'),

					'ticketnumber' => $ticketno,

					'usertype' => 1,

					'fullname' => $profiledata->fullname,

					'mobile' => $profiledata->mobile,

					'email' => $profiledata->email,

					'cardno' => $profiledata->card_number,

					'issuetype' => $_REQUEST['subject'],

					'message' => $_REQUEST['query'],

					'status' => 1,

					'isDelete' => 0

				);



				$this->load->model('Site_Support_Model');

				$id = $this->Site_Support_Model->submitsupportrequest($data);



				if ($id > 0) {

					$response2 = $this->Site_Support_Model->sendmessage($ticketno, $profiledata->mobile, $profiledata->email);



					$message = "Your request ticket has been raised in our system with the Ticket Id: " . $ticketno . ". We will contact you within 24-48 hours for a follow-up.";



					echo json_encode(array("success" => true, "message" => $message));

					die;
				} else {

					echo json_encode(array("success" => false, "message" => "Ops. Something goes wrong."));

					die;
				}
			} else {

				echo json_encode(array("success" => false, "message" => "Ops. Something goes wrong."));

				die;
			}
		}
	}
}

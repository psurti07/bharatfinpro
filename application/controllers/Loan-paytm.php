<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Loan extends CI_Controller
{

	public function index()
	{
		return redirect()->to('Infopage');
	}

	public function personalloan()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('personal-loan');
		$banklist = $this->Site_Info_Model->getbanklist(12);
		$testimoniallist = $this->Site_Info_Model->gettestimoniallist(1);
		$this->load->view('personal-loan', ['meta' => $meta, 'banklist' => $banklist, 'testimoniallist' => $testimoniallist]);
	}

	public function businessloan()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('business-loan');
		$banklist = $this->Site_Info_Model->getbanklist(12);
		$testimoniallist = $this->Site_Info_Model->gettestimoniallist(1);
		$this->load->view('business-loan', ['meta' => $meta, 'banklist' => $banklist, 'testimoniallist' => $testimoniallist]);
	}

	public function calculator()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');
		$this->load->view('calculator');
	}

	public function cardoffer()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');
		$prores = $this->Site_Info_Model->getproductdetails('card-offer');

		if ($prores->inOffer == 1) {
			$productdata = array(
				'amount' => $prores->amount,
				'offeramount' => $prores->offeramount,
				'offerdate' => date('Y/m/d', strtotime('+1 days')) . ' 24:00:00',
				'payamount' => $prores->offeramount + ($prores->offeramount * 0.18)
			);
		} else {
			$productdata = array(
				'amount' => $prores->amount,
				'offeramount' => 0,
				'offerdate' => '',
				'payamount' => $prores->amount + ($prores->amount * 0.18)
			);
		}

		$this->load->view('cardoffer', ['meta' => $meta, 'productdata' => $productdata]);
	}

	public function getcardoffer()
	{
		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails('card-offer');
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $amount + ($amount * 0.18);

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];

		$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
		foreach ($uat_numbers as $uat_num) {
			if ($uat_num == $mobileno) {
				$grandamount = 1;
			}
		}

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'offerpage' => 1,
			'fullname' => $fullname,
			'mobile' => $mobileno,
			'emailid' => $emailid,
			'amount' => $grandamount,
			'isCustomer' => 0,
			'isActive' => 0,
			'isDelete' => 0
		);

		$this->load->model('Site_Digital_Model');
		$userid = $this->Site_Digital_Model->cardofferorder($data);

		$orderid = number_format(microtime(true) * 1000, 0, '.', '');
		$checkSum = "";
		$postData = array();

		if (PAYTM_MODE == "PROD") {
			$url = "https://securegw.paytm.in/theia/processTransaction";
		} else {
			$url = 'https://securegw-stage.paytm.in/theia/processTransaction';
		}

		$returnUrl = base_url('loan/cardofferresponse');

		$postData = array(
			"MID" => PAYTM_MERCHANT_MID,
			"ORDER_ID" => $orderid,
			"CUST_ID" => $userid,
			"EMAIL" => $emailid,
			"TXN_AMOUNT" => $grandamount,
			"WEBSITE" => PAYTM_MERCHANT_WEBSITE,
			"INDUSTRY_TYPE_ID" => 'Retail',
			"CHANNEL_ID" => 'WEB',
			"CALLBACK_URL" => $returnUrl
		);

		$this->load->helper('encdec_paytm_helper');
		$checksum = getChecksumFromArray($postData, PAYTM_MERCHANT_KEY);

		$paytmdata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => 5,
			'userid' => $userid,
			'orderid' => $orderid,
			'orderamount' => $grandamount,
			'ordernote' => $productdata->productname
		);

		$this->load->model('Site_Digital_Model');
		$paytmentry = $this->Site_Digital_Model->paytmentry($paytmdata);

		$this->load->view('paytm-checkout', ['postData' => $postData, 'checksum' => $checksum, 'url' => $url]);
	}

	public function cardofferresponse()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		$paramList = $_POST;
		$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : "";

		$this->load->helper('encdec_paytm_helper');
		$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum);

		$orderId = $_POST["ORDERID"];
		$orderAmount = $_POST["TXNAMOUNT"];
		$referenceId = $_POST["TXNID"];
		$txStatus = $_POST["STATUS"];
		$paymentMode = $_POST["PAYMENTMODE"];

		$this->load->model('Site_Digital_Model');
		$paymentdata = $this->Site_Digital_Model->getpaytmentry($orderId);

		if ($isValidChecksum == "TRUE") {
			$paytmdata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'referenceid' => $referenceId,
				'txstatus' => $txStatus,
				'paymentmode' => $paymentMode
			);

			$response1 = $this->Site_Digital_Model->updatepaytmentry($paymentdata->id, $paytmdata);

			if ($txStatus == "TXN_SUCCESS") {
				$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

				$cardno = random_code(16);
				$data = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'card_number' => $cardno,
					'registration_date' => date('Y-m-d'),
					'expiry_date' => date('Y-m-d', strtotime('+3 months')),
					'amount' => $orderAmount,
					'paymentid' => $referenceId,
					'isActive' => 1
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('cardoffer-response', ['meta' => $meta, 'status' => $response]);
			} else {
				$this->load->view('cardoffer-response', ['meta' => $meta, 'status' => 'false']);
			}
		} else {
			$this->load->view('cardoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}

	public function specialoffer()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		$prores = $this->Site_Info_Model->getproductdetails('special-offer');

		if ($prores->inOffer == 1) {
			$productdata = array(
				'amount' => $prores->amount,
				'offeramount' => $prores->offeramount,
				'offerdate' => date('Y/m/d', strtotime('+1 days')) . ' 24:00:00',
				'payamount' => $prores->offeramount + ($prores->offeramount * 0.18)
			);
		} else {
			$productdata = array(
				'amount' => $prores->amount,
				'offeramount' => 0,
				'offerdate' => '',
				'payamount' => $prores->amount + ($prores->amount * 0.18)
			);
		}

		$this->load->view('specialoffer', ['meta' => $meta, 'productdata' => $productdata]);
	}

	public function getspecialoffer()
	{
		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails('special-offer');
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $amount + ($amount * 0.18);

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];

		$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
		foreach ($uat_numbers as $uat_num) {
			if ($uat_num == $mobileno) {
				$grandamount = 1;
			}
		}

		$orderId = number_format(microtime(true) * 1000, 0, '.', '');
		$returnUrl = base_url('loan/specialresponse');

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'offerpage' => 2,
			'fullname' => $fullname,
			'mobile' => $mobileno,
			'emailid' => $emailid,
			'amount' => $grandamount,
			'isCustomer' => 0,
			'isActive' => 0,
			'isDelete' => 0
		);

		$this->load->model('Site_Digital_Model');
		$userid = $this->Site_Digital_Model->cardofferorder($data);

		$post_data = new stdClass();
		$post_data->key = UPIGATEWAY_KEY;
		$post_data->client_txn_id = $orderId;
		$post_data->amount = strval($grandamount);
		$post_data->p_info = "Special Offer";
		$post_data->customer_name = $_REQUEST['fullname'];
		$post_data->customer_email = $_REQUEST['emailid'];
		$post_data->customer_mobile = $_REQUEST['mobileno'];
		$post_data->redirect_url = $returnUrl;
		$post_data->udf1 = "";
		$post_data->udf2 = "";
		$post_data->udf3 = "";

		$upipaymentdata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => 4,
			'userid' => $userid,
			'orderid' => $orderId,
			'orderamount' => $grandamount,
			'ordernote' => $productdata->productname
		);
		$response = $this->Site_Digital_Model->upipaymententry($upipaymentdata);

		$this->load->helper('upipayment');
		$response = upipaymentinitiate($post_data);

		if ($response['status'] == true) {
			echo '<script>location.href="' . $response['data']['payment_url'] . '"</script>';
			exit();
		} else {
			redirect('specialoffer');
		}
	}

	public function specialresponse()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		if (isset($_GET['client_txn_id'])) {
			$post_data = new stdClass();
			$post_data->key = UPIGATEWAY_KEY;
			$post_data->client_txn_id = $_GET['client_txn_id']; // you will get client_txn_id in GET Method
			$post_data->txn_date = date("d-m-Y"); // date of transaction

			$this->load->helper('upipayment');
			$response = upipaymentstatuscheck($post_data);

			if ($response['status'] == true) {
				// Txn Status = 'created', 'scanning', 'success','failure'

				$this->load->model('Site_Digital_Model');
				$paymentdata = $this->Site_Digital_Model->getupipaymententry($response['data']['client_txn_id']);

				$data1 = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'referenceid' => $response['data']['upi_txn_id'],
					'txstatus' => $response['data']['status'],
					'paymentmode' => $response['data']['Merchant']['upi_id']
				);
				$response1 = $this->Site_Digital_Model->updateupipaymententry($paymentdata->id, $data1);

				if ($response['data']['status'] == 'success') {
					$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

					$cardno = random_code(16);
					$data = array(
						'rec_date' => date('Y-m-d H:i:s'),
						'card_number' => $cardno,
						'registration_date' => date('Y-m-d'),
						'expiry_date' => date('Y-m-d', strtotime('+3 months')),
						'amount' => $response['data']['amount'],
						'paymentid' => $response['data']['upi_txn_id'],
						'isActive' => 1
					);

					$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

					$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

					$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => $response1]);
				} else {
					$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'false']);
				}
			} else if ($response['status'] == false) {
				$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'false']);
			} else {
				$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'false']);
			}
		} else {
			redirect('specialoffer');
		}
	}


}

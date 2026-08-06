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

		$this->load->model('Site_Digital_Model');
		$existingUser = $this->Site_Digital_Model->checkexistinguser($mobileno);

		// Check if mobile number exists
		if ($existingUser) {

			$message = "You are already a registered customer. Kindly login to customer panel. <a href='" . site_url('customer') . "'>Click here</a>";
			$this->session->set_flashdata('danger', $message);
			redirect('cardoffer');
		} else {

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
				'isDelete' => 0,
			);

			$this->load->model('Site_Digital_Model');
			$userid = $this->Site_Digital_Model->cardofferorder($data);

			$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
			$udf1 = $udf2 = $udf3 = $udf4 = $udf5 = '';
			$postData = array();

			$hashstring = PAYU_MERCHANT_KEY . '|' . $txnid . '|' . $grandamount . '|' . $productdata->productname . '|' . $fullname . '|' . $emailid . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . PAYU_SALT;

			$hash = hash('sha512', $hashstring);

			$returnUrl = base_url('loan/cardofferresponse');

			if (PAYU_MODE == "PROD") {
				$url = 'https://secure.payu.in/_payment';
			} else {
				$url = 'https://test.payu.in/_payment';
			}

			$postData = array(
				'mkey' => PAYU_MERCHANT_KEY,
				'tid' => $txnid,
				'hash' => $hash,
				'amount' => $grandamount,
				'name' => $fullname,
				'productinfo' => $productdata->productname,
				'mailid' => $emailid,
				'phoneno' => $mobileno,
				'address' => '',
				'action' => $url,
				'returnUrl' => $returnUrl,
			);

			$payudata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'entryfor' => 3,
				'userid' => $userid,
				'orderid' => $txnid,
				'orderamount' => $grandamount,
				'ordernote' => $productdata->productname,
			);

			$this->load->model('Site_Digital_Model');
			$payuentry = $this->Site_Digital_Model->payuentry($payudata);

			$userdata = $this->Site_Digital_Model->checkuser($mobileno);
			if ($userdata) {
				$data1 = array(
					'update_date' => date('Y-m-d H:i:s'),
				);
				$response1 = $this->Site_Digital_Model->updateregistration($userdata->userid, $data1);
			}

			$this->load->view('payu-checkout', ['postData' => $postData]);
		}
	}

	public function cardofferresponse()
	{

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		if (isset($_POST["status"]) && $_POST["status"] != "") {
			$status = $_POST["status"];
			$firstname = $_POST["firstname"];
			$amount = $_POST["amount"];
			$txnid = $_POST["txnid"];
			$posted_hash = $_POST["hash"];
			$key = $_POST["key"];
			$productinfo = $_POST["productinfo"];
			$email = $_POST["email"];
			$mihpayid = $_POST["mihpayid"];
			$pgtype = $_POST["PG_TYPE"];
			$salt = PAYU_SALT;

			if ($_POST["additionalCharges"] != '') {
				$retHashSeq = $_POST["additionalCharges"] . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
			} else {
				$retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
			}

			$this->load->model('Site_Digital_Model');
			$paymentdata = $this->Site_Digital_Model->getpayuentry($txnid);

			$payudata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'referenceid' => $mihpayid,
				'txstatus' => $status,
				'paymentmode' => $pgtype,
			);

			$response1 = $this->Site_Digital_Model->updatepayuentry($paymentdata->id, $payudata);
			$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

			if ($status == 'success') {
				$cardno = random_code(16);
				$data = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'card_number' => $cardno,
					'registration_date' => date('Y-m-d'),
					'expiry_date' => date('Y-m-d', strtotime('+3 months')),
					'amount' => $amount,
					'paymentid' => $mihpayid,
					'isActive' => 1,
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('cardoffer-response', ['meta' => $meta, 'status' => $response]);
			} else if ($status == 'failure') {
				$this->load->view('cardoffer-response', ['meta' => $meta, 'status' => 'false']);
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
		$banklist = $this->Site_Info_Model->getbanklist(12);

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

		$this->load->view('specialoffer', ['meta' => $meta, 'productdata' => $productdata, 'banklist' => $banklist]);
	}

	public function getspecialoffer()
	{
		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails('special-offer');
		$get_amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $get_amount + ($get_amount * 0.18);
		$roundamount = floor($grandamount);

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];

		$this->load->model('Site_Digital_Model');

		$existingUser = $this->Site_Digital_Model->checkexistinguser($mobileno);

		// Check if mobile number exists
		if ($existingUser) {

			$message = "You are already a registered customer. Kindly login to customer panel. <a href='" . site_url('customer') . "'>Click here</a>";
			$this->session->set_flashdata('danger', $message);
			redirect('specialoffer');
		} else {

			$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
			foreach ($uat_numbers as $uat_num) {
				if ($uat_num == $mobileno) {
					$grandamount = 25;
				}
			}

			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'offerpage' => 2,
				'fullname' => $fullname,
				'mobile' => $mobileno,
				'emailid' => $emailid,
				'amount' => $roundamount,
				'registration_date' => date('Y-m-d'),
				'expiry_date' => date('Y-m-d', strtotime('+3 months')),
				'isCustomer' => 0,
				'isActive' => 0,
				'isDelete' => 0
			);

			$this->load->model('Site_Digital_Model');
			$userid = $this->Site_Digital_Model->cardofferorder($data);

			$orderId = number_format(microtime(true) * 1000, 0, '.', '');
			$returnUrl = base_url('loan/specialresponse');

			if (LYRA_MODE == "PROD") {
				$curlurl = "https://api.in.lyra.com/pg/rest/v1/charge";
			} else {
				$curlurl = "https://api.in.lyra.com/pg/rest/v1/charge";
			}

			$postData = array(
				"orderId" => $orderId,
				"currency" => 'INR',
				"amount" => $roundamount * 100,
				"orderInfo" => $productdata->productname,
				"maxAgeInHours" => '240',
				"customer" => array(
					"uid" => $userid,
					"name" => $fullname,
					"emailId" => $emailid,
					"phone" => $mobileno
				),
				"webhook" => array(
					"url" => $returnUrl
				),
				"return" => array(
					"method" => 'POST',
					"url" => $returnUrl,
					"timeout" => '0'
				)
			);
			$this->load->helper('lyra');
			$payurl = getpaymenturl($curlurl, $postData);
			
			$lyradata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'entryfor' => 4,
				'userid' => $userid,
				'orderid' => $orderId,
				'orderamount' => $roundamount,
				'ordernote' => $productdata->productname,
			);

			$this->load->model('Site_Digital_Model');
			$response = $this->Site_Digital_Model->lyraentry($lyradata);

			if ($payurl) {
				if ($payurl->paymentLink) {
					header("location:" . $payurl->paymentLink);
					die;
				} else {
					return redirect("specialoffer");
					die;
				}
			} else {
				return redirect("specialoffer");
				die;
			}
		}
	}

	public function specialresponse()
	{

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');
		if (isset($_POST["vads_order_id"])) {
			$orderId = $_POST["vads_order_id"];
			$orderAmount = $_POST["vads_amount"];
			$responseCode = $_POST["vads_charge_status"];
			$txnId = $_POST["vads_trans_uuid"];

			$this->load->model('Site_Digital_Model');
			$paymentdata = $this->Site_Digital_Model->getlyraentry($orderId);

			$lyradata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'orderamount' => $orderAmount / 100,
				'statuscode' => $responseCode,
				'transactionid' => $txnId
			);
			//log_message('error', '');
			$response1 = $this->Site_Digital_Model->updatelyraentry($paymentdata->id, $lyradata);

			$this->load->model('Site_Digital_Model');
			$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

			if ($responseCode == "PAID") {
				$cardno = random_code(16);

				$data = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'card_number' => $cardno,
					'amount' => $orderAmount / 100,
					'paymentid' => $txnId,
					'isActive' => 1
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => $response]);
			} else {
				$sent = $this->Site_Digital_Model->sendPaymentFailedGreetings($userdata->mobile, $userdata->emailid);
				$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'false']);
			}
		} else {
			$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}

	public function bumperoffer()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		$prores = $this->Site_Info_Model->getproductdetails('bumper-offer');

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

		$this->load->view('bumperoffer', ['meta' => $meta, 'productdata' => $productdata]);
	}

	public function getbumperoffer()
	{

		$this->load->model('Site_Info_Model');

		$productdata = $this->Site_Info_Model->getproductdetails('bumper-offer');
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $amount + ($amount * 0.18);
		$roundamount = floor($grandamount);

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];

		$this->load->model('Site_Digital_Model');

		$existingUser = $this->Site_Digital_Model->checkexistinguser($mobileno);

		// Check if mobile number exists
		if ($existingUser) {

			$message = "You are already a registered customer. Kindly login to customer panel. <a href='" . site_url('customer') . "'>Click here</a>";
			$this->session->set_flashdata('danger', $message);
			redirect('bumperoffer');
		} else {

			$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
			foreach ($uat_numbers as $uat_num) {
				if ($uat_num == $mobileno) {
					$roundamount = 1;
				}
			}

			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'offerpage' => 3,
				'fullname' => $fullname,
				'mobile' => $mobileno,
				'emailid' => $emailid,
				'amount' => $roundamount,
				'isCustomer' => 0,
				'isActive' => 0,
				'isDelete' => 0
			);

			$this->load->model('Site_Digital_Model');
			$userid = $this->Site_Digital_Model->cardofferorder($data);

			$this->load->helper('paygic');
			$response = createMerchantToken();

			$orderid = "PAYGIC" . number_format(microtime(true) * 1000, 0, '.', '');


			$token = $response->data->token;
			$returnUrl = base_url('loan/bumperofferresponse/' . $orderid . '/' . $token);

			$postData = array(
				'mid' => PAYGIC_MID,
				"merchantReferenceId" => $orderid, // Unique reference ID for the merchant
				"amount" => $roundamount, // Transaction amount
				"customer_mobile" => $mobileno, // Customer's mobile number
				"customer_name" => $fullname, // Customer's name
				"customer_email" => $emailid, // Customer's email
				"redirect_URL" => $returnUrl,
				"failed_URL" => $returnUrl,
			);

			$createresponse = createPaymentPage($postData, $token);
			$post_data = json_decode($createresponse);
			$post_reponse = array(
				"status" => $post_data->status,
				"statusCode" => $post_data->statusCode,
				"msg" => $post_data->msg,
				"data" => array(
					"payPageUrl" => $post_data->data->payPageUrl,
					"expiry" => 0,
					"amount" => $post_data->data->amount,
					"paygicReferenceId" => $post_data->data->paygicReferenceId,
					"merchantReferenceId" => $post_data->data->merchantReferenceId,
				)

			);

			$paygicdata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'entryfor' => 5,
				'userid' => $userid,
				'orderid' => $orderid,
				'orderamount' => $roundamount,
				'ordernote' => $productdata->productname,
			);

			$response = $this->Site_Digital_Model->paygicentry($paygicdata);

			redirect($post_data->data->payPageUrl);
		}
	}

	public function bumperofferresponse($orderid, $token)
	{

		$this->load->helper('paygic');

		$createresponse = checkPaymentStatus($orderid, $token);
		$response_data = json_decode($createresponse);

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('offer-page');

		$grandtotal = $netamount = $cgstamount = $sgstamount = $igstamount = 0;
		$decText = null;

		if (isset($response_data)) {

			$this->load->model('Site_Digital_Model');

			$paymentdata = $this->Site_Digital_Model->getpaygicentry($response_data->data->merchantReferenceId);

			$paygicdata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'transactionid' => $response_data->data->paygicReferenceId,
				'statuscode' => $response_data->txnStatus,
				'paymentmode' => '',
			);

			$response1 = $this->Site_Digital_Model->updatepaygicentry($paymentdata->id, $paygicdata);

			if ($response_data->txnStatus == 'SUCCESS') {
				$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

				$cardno = random_code(16);
				$data = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'card_number' => $cardno,
					'registration_date' => date('Y-m-d'),
					'expiry_date' => date('Y-m-d', strtotime('+3 months')),
					'paymentid' => $response_data->data->UTR,
					'isActive' => 1
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('bumperoffer-response', ['meta' => $meta, 'status' => $response]);
			} else {
				$this->load->view('bumperoffer-response', ['meta' => $meta, 'status' => 'false']);
			}
		} else {
			$this->load->view('bumperoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}

	public function staroffer()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		$prores = $this->Site_Info_Model->getproductdetails('star-offer');

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

		$this->load->view('staroffer', ['meta' => $meta, 'productdata' => $productdata]);
	}

	public function getstaroffer()
	{

		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails('star-offer');
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$actualamount = $amount + ($amount * 0.18);
		$grandamount = floor($actualamount);

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];

		$this->load->model('Site_Digital_Model');

		$existingUser = $this->Site_Digital_Model->checkexistinguser($mobileno);

		// Check if mobile number exists
		if ($existingUser) {

			$message = "You are already a registered customer. Kindly login to customer panel. <a href='" . site_url('customer') . "'>Click here</a>";
			$this->session->set_flashdata('danger', $message);
			redirect('staroffer');
		} else {

			$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
			foreach ($uat_numbers as $uat_num) {
				if ($uat_num == $mobileno) {
					$grandamount = 200;
				}
			}

			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'offerpage' => 4,
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
			$encData = null;

			if (SABPAISA_MODE == 'PROD') {
				$spDomain = "https://securepay.sabpaisa.in/SabPaisa/sabPaisaInit?v=1";
			} else {
				$spDomain = "https://stage-securepay.sabpaisa.in/SabPaisa/sabPaisaInit?v=1";
			}

			$returnUrl = base_url('loan/starofferresponse');

			$encData = "?clientCode=" . SABPAISA_CLIENT_CODE . "&transUserName=" . SABPAISA_USERNAME . "&transUserPassword=" . SABPAISA_PASSWORD . "&amount=" . $grandamount . "&amountType=INR&clientTxnId=" . $orderid . "&payerName=" . trim($fullname) . "&payerMobile=" . $mobileno . "&payerEmail=" . trim($emailid) . "&mcc=5137&channelId=#&callbackUrl=" . $returnUrl;

			$this->load->helper('subpaisa');
			$encryptData = encrypt(SABPAISA_AUTH_KEY, SABPAISA_AUTH_IV, $encData);

			$postData = array(
				'clientCode' => SABPAISA_CLIENT_CODE,
				'encryptData' => $encryptData,
				'action' => $spDomain
			);

			$subpaisadata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'entryfor' => 6,
				'userid' => $userid,
				'orderid' => $orderid,
				'orderamount' => $grandamount,
				'ordernote' => $productdata->productname,
			);
			$response = $this->Site_Digital_Model->subpaisaentry($subpaisadata);

			$this->load->view('sabpaisa-checkout', ['postData' => $postData]);
		}
	}

	public function starofferresponse()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		$grandtotal = $netamount = $cgstamount = $sgstamount = $igstamount = 0;
		$decText = null;

		if (isset($_REQUEST)) {
			$query = $_REQUEST['encResponse'];
			$query = str_replace("%2B", "+", $query);
			$decText = null;

			$this->load->helper('subpaisa');
			$decText = decrypt(SABPAISA_AUTH_KEY, SABPAISA_AUTH_IV, $query);
			$token = strtok($decText, "&");

			$i = 0;
			while ($token !== false) {
				$i = $i + 1;
				$token1 = strchr($token, "=");
				$token = strtok("&");
				$stringpart = ltrim($token1, "=");

				if ($i == 1) {
					$payerName = $stringpart;
				}
				if ($i == 2) {
					$payerEmail = $stringpart;
				}
				if ($i == 3) {
					$payerMobile = $stringpart;
				}
				if ($i == 4) {
					$clientTxnId = $stringpart;
				}
				if ($i == 6) {
					$amount = $stringpart;
				}
				if ($i == 8) {
					$paidAmount = $stringpart;
				}
				if ($i == 9) {
					$paymentMode = $stringpart;
				}
				if ($i == 10) {
					$bankName = $stringpart;
				}
				if ($i == 12) {
					$status = $stringpart;
				}
				if ($i == 13) {
					$statusCode = $stringpart;
				}
				if ($i == 15) {
					$sabpaisaTxnId = $stringpart;
				}
				if ($i == 20) {
					$bankTxnId = $stringpart;
				}
			}

			$this->load->model('Site_Digital_Model');
			$paymentdata = $this->Site_Digital_Model->getsubpaisaentry($clientTxnId);

			$subpaisadata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'referenceid' => $sabpaisaTxnId,
				'txstatus' => $status,
				'paymentmode' => $paymentMode
			);

			$response1 = $this->Site_Digital_Model->updatesubpaisaentry($paymentdata->id, $subpaisadata);

			if ($statusCode == '0000') {
				$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

				$cardno = random_code(16);
				$data = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'card_number' => $cardno,
					'registration_date' => date('Y-m-d'),
					'expiry_date' => date('Y-m-d', strtotime('+3 months')),
					'paymentid' => $sabpaisaTxnId,
					'isActive' => 1
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('staroffer-response', ['meta' => $meta, 'status' => $response]);
			} else if ($statusCode == '0300') {
				$this->load->view('staroffer-response', ['meta' => $meta, 'status' => 'false']);
			} else {
				$this->load->view('staroffer-response', ['meta' => $meta, 'status' => 'false']);
			}
		} else {
			$this->load->view('staroffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}

	/* Prime Offer page */

	public function primeoffer()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		$prores = $this->Site_Info_Model->getproductdetails('prime-offer');

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

		$this->load->view('primeoffer', ['meta' => $meta, 'productdata' => $productdata]);
	}

	public function getprimeoffer()
	{

		$alldata = $buyerAddress = $buyerCity = $buyerState = $amount = $buyerPinCode = $orderid = '';

		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails('prime-offer');
		$get_amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$amount = $get_amount + ($get_amount * 0.18);

		$buyerFirstName = $buyerLastName = trim($_REQUEST['fullname']);
		$buyerPhone = trim($_REQUEST['mobileno']);
		$buyerEmail = trim($_REQUEST['emailid']);
		$buyerCountry = 'India';
		$this->load->model('Site_Digital_Model');

		$existingUser = $this->Site_Digital_Model->checkexistinguser($buyerPhone);

		// Check if mobile number exists
		if ($existingUser) {

			$message = "You are already a registered customer. Kindly login to customer panel. <a href='" . site_url('customer') . "'>Click here</a>";
			$this->session->set_flashdata('danger', $message);
			redirect('primeoffer');
		} else {


			$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
			foreach ($uat_numbers as $uat_num) {
				if ($uat_num == $buyerPhone) {
					$amount = 50;
				}
			}

			$orderid = "APLive" . number_format(microtime(true) * 1000, 0, '.', '');
			$url = "https://payments.airpay.co.in/pay/index.php";

			$returnUrl = base_url('loan/primeresponse');
			$this->load->helper('airpay');

			$hiddenmod = "";

			$postData = array(
				"username" => AIRPAY_USERNAME,
				"password" => AIRPAY_KEY_PASSWORD,
				"secret" => AIRPAY_SECRET,
				"mercid" => AIRPAY_MERCHANT,
				"orderid" => $orderid,
				"url" => $url,
				"currency" => 356,
				"isocurrency" => 'INR',
				"amount" => $amount,
				"buyerFirstName" => $buyerFirstName,
				"buyerLastName" => $buyerLastName,
				"buyerEmail" => $buyerEmail,
				"buyerPhone" => $buyerPhone,
				"buyerAddress" => '',
				"buyerCity" => '',
				"buyerState" => '',
				"buyerPinCode" => '',
				"backurl" => $returnUrl,
				"hiddenmod" => $hiddenmod,
				"buyerCountry" => 'India',
				"customvar" => $productdata->productname,
			);

			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'offerpage' => 5,
				'fullname' => $_REQUEST['fullname'],
				'mobile' => $_REQUEST['mobileno'],
				'emailid' => $_REQUEST['emailid'],
				'amount' => $amount,
				'isCustomer' => 0,
				'isActive' => 0,
				'isDelete' => 0
			);

			$this->load->model('Site_Digital_Model');
			$userid = $this->Site_Digital_Model->cardofferorder($data);

			$airpaydata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'entryfor' => 7,
				'userid' => $userid,
				'orderid' => $orderid,
				'orderamount' => $amount,
				'ordernote' => $productdata->productname,
			);

			$this->load->model('Site_Digital_Model');
			$response = $this->Site_Digital_Model->airpayentry($airpaydata);

			$this->load->view('airpay-checkout', ['postData' => $postData, 'url' => $url]);
		}
	}

	public function primeofferresponse()
	{

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		$TRANSACTIONID = trim($_POST['TRANSACTIONID']);
		$APTRANSACTIONID = trim($_POST['APTRANSACTIONID']);
		$AMOUNT = trim($_POST['AMOUNT']);
		$TRANSACTIONSTATUS = trim($_POST['TRANSACTIONSTATUS']);
		$MESSAGE = trim($_POST['MESSAGE']);
		$ap_SecureHash = trim($_POST['ap_SecureHash']);
		$CHMOD = "";

		if (isset($_POST['CHMOD'])) {
			$CHMOD = trim($_POST['CHMOD']);
		}
		if (isset($_POST['CUSTOMVAR'])) {
			$CUSTOMVAR = trim($_POST['CUSTOMVAR']);
		} else {
			$CUSTOMVAR = "";
		}

		if ($TRANSACTIONSTATUS == 200) {
			$this->load->model('Site_Digital_Model');
			$paymentdata = $this->Site_Digital_Model->getairpayentry($TRANSACTIONID);

			$airpaydata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'orderamount' => $AMOUNT,
				'statuscode' => $TRANSACTIONSTATUS,
				'transactionid' => $APTRANSACTIONID,
				'paymentmode' => $CHMOD
			);

			$response1 = $this->Site_Digital_Model->updateairpayentry($paymentdata->id, $airpaydata);

			$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

			$cardno = random_code(16);
			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'card_number' => $cardno,
				'registration_date' => date('Y-m-d'),
				'expiry_date' => date('Y-m-d', strtotime('+3 months')),
				'amount' => $AMOUNT,
				'paymentid' => $TRANSACTIONID,
				'isActive' => 1
			);

			$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

			$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

			$this->load->view('primeoffer-response', ['meta' => $meta, 'status' => $response]);
		} else {
			$this->load->view('primeoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}

	/* Mega Offer page */

	public function megaoffer()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		$prores = $this->Site_Info_Model->getproductdetails('mega-offer');

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

		$this->load->view('megaoffer', ['meta' => $meta, 'productdata' => $productdata]);
	}

	public function getmegaoffer()
	{
		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails('mega-offer');
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $amount + ($amount * 0.18);

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];

		$this->load->model('Site_Digital_Model');

		$existingUser = $this->Site_Digital_Model->checkexistinguser($mobileno);

		// Check if mobile number exists
		if ($existingUser) {

			$message = "You are already a registered customer. Kindly login to customer panel. <a href='" . site_url('customer') . "'>Click here</a>";
			$this->session->set_flashdata('danger', $message);
			redirect('megaoffer');
		} else {


		$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
			foreach ($uat_numbers as $uat_num) {
				if ($uat_num == $mobileno) {
					$grandamount = 1;
				}
			}

			$orderid = 'order_' . number_format(microtime(true) * 1000, 0, '.', '');
			$returnUrl = base_url('loan/megaofferresponse?orderid=' . $orderid);

			if (CASHFREE_MODE == "PROD") {
				$curlurl = 'https://api.cashfree.com/pg/orders';
				$paymode = 'production';
			} else {
				$curlurl = 'https://sandbox.cashfree.com/pg/orders';
				$paymode = 'sandbox';
			}

			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'offerpage' => 6,
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

			$data_res = array(
				"order_id" => $orderid,
				"order_amount" => $grandamount,
				"order_note" => $productdata->productname,
				"customer_id" => strval($userid),
				"customer_name" => $fullname,
				"customer_phone" => $mobileno,
				"customer_email" => $emailid,
				"returnUrl" => $returnUrl
			);

			$this->load->helper('cashfree');
			$payurl = getpaymenturl($curlurl, $data_res);

			if ($payurl) {
				$pay_sess_url = $payurl->payment_session_id;
			}

			$cashfreedata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'entryfor' => 8,
				'userid' => strval($userid),
				'orderid' => $orderid,
				'orderamount' => $grandamount,
				'ordernote' => $productdata->productname,
			);
			$response = $this->Site_Digital_Model->cashfreeentry($cashfreedata);

			$this->load->view('cashfree-checkout', ['pay_session_id' => $pay_sess_url, 'paymode' => $paymode]);
		}
		
	}

	public function megaofferresponse()
	{

		$grandtotal = $netamount = $cgstamount = $sgstamount = $igstamount = 0;

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		if (isset($_REQUEST['orderid'])) {
			if (CASHFREE_MODE == "PROD") {
				$curlurl = 'https://api.cashfree.com/pg/orders/' . $_REQUEST['orderid'] . '/payments';
			} else {
				$curlurl = 'https://sandbox.cashfree.com/pg/orders/' . $_REQUEST['orderid'] . '/payments';
			}

			$this->load->helper('cashfree');
			$orderdata = getorderdata($curlurl);

			if ($orderdata) {
				$orderid = $orderdata[0]->order_id;
				$txstatus = $orderdata[0]->payment_status;
				$referenceid = $orderdata[0]->cf_payment_id;
				$paymentmode = $orderdata[0]->payment_group;
				$orderamount = $orderdata[0]->order_amount;

				$this->load->model('Site_Digital_Model');
				$paymentdata = $this->Site_Digital_Model->getcashfreeentry($orderid);

				$cashfreedata = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'referenceid' => $referenceid,
					'txstatus' => $txstatus,
					'paymentmode' => $paymentmode
				);
				$response1 = $this->Site_Digital_Model->updatecashfreeentry($paymentdata->id, $cashfreedata);

				if ($txstatus == 'SUCCESS') {
					$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);
					$cardno = random_code(16);

					$data = array(
						'rec_date' => date('Y-m-d H:i:s'),
						'card_number' => $cardno,
						'registration_date' => date('Y-m-d'),
						'expiry_date' => date('Y-m-d', strtotime('+3 months')),
						'amount' => $orderamount,
						'paymentid' => $referenceid,
						'isActive' => 1
					);

					$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

					$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

					$this->load->view('megaoffer-response', ['meta' => $meta, 'status' => $response]);
				} else if ($txstatus == 'FAILED') {
					$this->load->view('megaoffer-response', ['meta' => $meta, 'status' => 'false']);
				} else {
					$this->load->view('megaoffer-response', ['meta' => $meta, 'status' => 'false']);
				}
			} else {
				$this->load->view('megaoffer-response', ['meta' => $meta, 'status' => 'false']);
			}
		} else {
			$this->load->view('megaoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}

	/* Product offer page */
	public function superoffer()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');
		$prores = $this->Site_Info_Model->getproductdetails('super-offer');

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

		$this->load->view('superoffer', ['meta' => $meta, 'productdata' => $productdata]);
	}

	public function getsuperoffer()
	{

		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails('super-offer');

		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $amount + ($amount * 0.18);

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];

		$this->load->model('Site_Digital_Model');
		$existingUser = $this->Site_Digital_Model->checkexistinguser($mobileno);

		// Check if mobile number exists
		if ($existingUser) {

			$message = "You are already a registered customer. Kindly login to customer panel. <a href='" . site_url('plan_customer') . "'>Click here</a>";
			$this->session->set_flashdata('danger', $message);
			redirect('superoffer');
		} else {

			$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
			foreach ($uat_numbers as $uat_num) {
				if ($uat_num == $mobileno) {
					$grandamount = 1;
				}
			}

			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'offerpage' => 7,
				'fullname' => $fullname,
				'mobile' => $mobileno,
				'emailid' => $emailid,
				'amount' => $grandamount,
				'isCustomer' => 0,
				'isActive' => 0,
				'isDelete' => 0,
			);

			$this->load->model('Site_Digital_Model');
			$userid = $this->Site_Digital_Model->cardofferorder($data);

			$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
			$udf1 = $udf2 = $udf3 = $udf4 = $udf5 = '';
			$postData = array();

			$hashstring = PAYU_MERCHANT_KEY . '|' . $txnid . '|' . $grandamount . '|' . $productdata->productname . '|' . $fullname . '|' . $emailid . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . PAYU_SALT;

			$hash = hash('sha512', $hashstring);

			$returnUrl = base_url('loan/superofferresponse');

			if (PAYU_MODE == "PROD") {
				$url = 'https://secure.payu.in/_payment';
			} else {
				$url = 'https://test.payu.in/_payment';
			}

			$postData = array(
				'mkey' => PAYU_MERCHANT_KEY,
				'tid' => $txnid,
				'hash' => $hash,
				'amount' => $grandamount,
				'name' => $fullname,
				'productinfo' => $productdata->productname,
				'mailid' => $emailid,
				'phoneno' => $mobileno,
				'address' => '',
				'action' => $url,
				'returnUrl' => $returnUrl,
			);

			$payudata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'entryfor' => 9,
				'userid' => $userid,
				'orderid' => $txnid,
				'orderamount' => $grandamount,
				'ordernote' => $productdata->productname,
			);

			$this->load->model('Site_Digital_Model');
			$payuentry = $this->Site_Digital_Model->payuentry($payudata);

			$userdata = $this->Site_Digital_Model->checkuser($mobileno);
			if ($userdata) {
				$data1 = array(
					'update_date' => date('Y-m-d H:i:s'),
				);
				$response1 = $this->Site_Digital_Model->updateregistration($userdata->userid, $data1);
			}

			$this->load->view('payu-checkout', ['postData' => $postData]);
		}
	}

	public function superofferresponse()
	{

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		if (isset($_POST["status"]) && $_POST["status"] != "") {
			$status = $_POST["status"];
			$firstname = $_POST["firstname"];
			$amount = $_POST["amount"];
			$txnid = $_POST["txnid"];
			$posted_hash = $_POST["hash"];
			$key = $_POST["key"];
			$productinfo = $_POST["productinfo"];
			$email = $_POST["email"];
			$mihpayid = $_POST["mihpayid"];
			$pgtype = $_POST["PG_TYPE"];
			$salt = PAYU_SALT;

			if ($_POST["additionalCharges"] != '') {
				$retHashSeq = $_POST["additionalCharges"] . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
			} else {
				$retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
			}

			$this->load->model('Site_Digital_Model');
			$paymentdata = $this->Site_Digital_Model->getpayuentry($txnid);

			$payudata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'referenceid' => $mihpayid,
				'txstatus' => $status,
				'paymentmode' => $pgtype,
			);

			$response1 = $this->Site_Digital_Model->updatepayuentry($paymentdata->id, $payudata);
			$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

			if ($status == 'success') {
				$cardno = random_code(16);
				$data = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'card_number' => $cardno,
					'registration_date' => date('Y-m-d'),
					'expiry_date' => date('Y-m-d', strtotime('+3 months')),
					'amount' => $amount,
					'paymentid' => $mihpayid,
					'isActive' => 1,
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('superoffer-response', ['meta' => $meta, 'status' => $response]);
			} else if ($status == 'failure') {
				$this->load->view('superoffer-response', ['meta' => $meta, 'status' => 'false']);
			} else {
				$this->load->view('superoffer-response', ['meta' => $meta, 'status' => 'false']);
			}
		} else {
			$this->load->view('superoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}

	public function quickoffer()
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');
		$prores = $this->Site_Info_Model->getproductdetails('quick-offer');

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

		$this->load->view('quickoffer', ['meta' => $meta, 'productdata' => $productdata]);
	}

	public function getquickoffer()
	{

		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails('quick-offer');

		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $amount + ($amount * 0.18);

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];

		$this->load->model('Site_Digital_Model');
		$existingUser = $this->Site_Digital_Model->checkexistinguser($mobileno);

		// Check if mobile number exists
		if ($existingUser) {

			$message = "You are already a registered customer. Kindly login to customer panel. <a href='" . site_url('plan_customer') . "'>Click here</a>";
			$this->session->set_flashdata('danger', $message);
			redirect('quickoffer');
		} else {

			$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
			foreach ($uat_numbers as $uat_num) {
				if ($uat_num == $mobileno) {
					$grandamount = 1;
				}
			}

			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'offerpage' => 8,
				'fullname' => $fullname,
				'mobile' => $mobileno,
				'emailid' => $emailid,
				'amount' => $grandamount,
				'isCustomer' => 0,
				'isActive' => 0,
				'isDelete' => 0,
			);

			$this->load->model('Site_Digital_Model');
			$userid = $this->Site_Digital_Model->cardofferorder($data);

			$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
			$udf1 = $udf2 = $udf3 = $udf4 = $udf5 = '';
			$postData = array();

			$hashstring = PAYU_MERCHANT_KEY . '|' . $txnid . '|' . $grandamount . '|' . $productdata->productname . '|' . $fullname . '|' . $emailid . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . PAYU_SALT;

			$hash = hash('sha512', $hashstring);

			$returnUrl = base_url('loan/quickofferresponse');

			if (PAYU_MODE == "PROD") {
				$url = 'https://secure.payu.in/_payment';
			} else {
				$url = 'https://test.payu.in/_payment';
			}

			$postData = array(
				'mkey' => PAYU_MERCHANT_KEY,
				'tid' => $txnid,
				'hash' => $hash,
				'amount' => $grandamount,
				'name' => $fullname,
				'productinfo' => $productdata->productname,
				'mailid' => $emailid,
				'phoneno' => $mobileno,
				'address' => '',
				'action' => $url,
				'returnUrl' => $returnUrl,
			);

			$payudata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'entryfor' => 10,
				'userid' => $userid,
				'orderid' => $txnid,
				'orderamount' => $grandamount,
				'ordernote' => $productdata->productname,
			);

			$this->load->model('Site_Digital_Model');
			$payuentry = $this->Site_Digital_Model->payuentry($payudata);

			$userdata = $this->Site_Digital_Model->checkuser($mobileno);
			if ($userdata) {
				$data1 = array(
					'update_date' => date('Y-m-d H:i:s'),
				);
				$response1 = $this->Site_Digital_Model->updateregistration($userdata->userid, $data1);
			}

			$this->load->view('payu-checkout', ['postData' => $postData]);
		}
	}

	public function quickofferresponse()
	{

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		if (isset($_POST["status"]) && $_POST["status"] != "") {
			$status = $_POST["status"];
			$firstname = $_POST["firstname"];
			$amount = $_POST["amount"];
			$txnid = $_POST["txnid"];
			$posted_hash = $_POST["hash"];
			$key = $_POST["key"];
			$productinfo = $_POST["productinfo"];
			$email = $_POST["email"];
			$mihpayid = $_POST["mihpayid"];
			$pgtype = $_POST["PG_TYPE"];
			$salt = PAYU_SALT;

			if ($_POST["additionalCharges"] != '') {
				$retHashSeq = $_POST["additionalCharges"] . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
			} else {
				$retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
			}

			$this->load->model('Site_Digital_Model');
			$paymentdata = $this->Site_Digital_Model->getpayuentry($txnid);

			$payudata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'referenceid' => $mihpayid,
				'txstatus' => $status,
				'paymentmode' => $pgtype,
			);

			$response1 = $this->Site_Digital_Model->updatepayuentry($paymentdata->id, $payudata);
			$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

			if ($status == 'success') {
				$cardno = random_code(16);
				$data = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'card_number' => $cardno,
					'registration_date' => date('Y-m-d'),
					'expiry_date' => date('Y-m-d', strtotime('+3 months')),
					'amount' => $amount,
					'paymentid' => $mihpayid,
					'isActive' => 1,
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('quickoffer-response', ['meta' => $meta, 'status' => $response]);
			} else if ($status == 'failure') {
				$this->load->view('quickoffer-response', ['meta' => $meta, 'status' => 'false']);
			} else {
				$this->load->view('quickoffer-response', ['meta' => $meta, 'status' => 'false']);
			}
		} else {
			$this->load->view('quickoffer-response', ['meta' => $meta, 'status' => 'false']);
		}
	}


}

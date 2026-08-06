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

		$orderId = "ZPLive" . number_format(microtime(true) * 1000, 0, '.', '');

		$returnUrl = base_url('loan/cardofferresponse');
		$url = "https://api.zaakpay.com/api/paymentTransact/V8";

		$postData = array(
			"merchantIdentifier" => ZAAKPAY_MERCHANT_IDENTIFIER,
			"orderId" => $orderId,
			"returnUrl" => $returnUrl,
			"currency" => 'INR',
			"amount" => $grandamount * 100,
			"buyerEmail" => $emailid,
			"buyerFirstName" => $fullname,
			"buyerPhoneNumber" => $mobileno,
			"buyerCountry" => 'India',
			"productDescription" => 'Card Offer'
		);

		ksort($postData);
		$checksumData = "";
		foreach ($postData as $key => $value) {
			$checksumData .= $key . '=' . $value . '&';
		}

		$checksum = hash_hmac('sha256', $checksumData, ZAAKPAY_SECRET_KEY);

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'offerpage' => 1,
			'fullname' => $_REQUEST['fullname'],
			'mobile' => $_REQUEST['mobileno'],
			'emailid' => $_REQUEST['emailid'],
			'amount' => $grandamount,
			'isCustomer' => 0,
			'isActive' => 0,
			'isDelete' => 0
		);

		$this->load->model('Site_Digital_Model');
		$userid = $this->Site_Digital_Model->cardofferorder($data);

		$zaakpaydata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => 3,
			'userid' => $userid,
			'orderid' => $orderId,
			'orderamount' => $grandamount,
			'ordernote' => $productdata->productname,
		);

		$this->load->model('Site_Digital_Model');
		$response = $this->Site_Digital_Model->zaakpayentry($zaakpaydata);

		$this->load->view('zaakpay-checkout', ['postData' => $postData, 'checksum' => $checksum, 'url' => $url]);
	}

	public function cardofferresponse()
	{
		
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');

		$orderId = $_POST["orderId"];
		$responseCode = $_POST["responseCode"];
		$orderAmount = $_POST["amount"] / 100;
		$txnId = $_POST["pgTransId"];
		$paymentMode = $_POST["paymentMode"];
		$recd_checksum = $_POST['checksum'];

		$checksum = $checksumData = '';
		$checksumsequence = array(
			"amount",
			"bank",
			"bankid",
			"cardId",
			"cardScheme",
			"cardToken",
			"cardhashid",
			"doRedirect",
			"orderId",
			"paymentMethod",
			"paymentMode",
			"responseCode",
			"responseDescription",
			"productDescription",
			"product1Description",
			"product2Description",
			"product3Description",
			"product4Description",
			"pgTransId",
			"pgTransTime"
		);
		foreach ($checksumsequence as $seqvalue) {
			if (array_key_exists($seqvalue, $_POST)) {
				$checksumData .= $seqvalue;
				$checksumData .= "=";
				$checksumData .= $_POST[$seqvalue];
				$checksumData .= "&";
			}
		}

		$checksum = hash_hmac('sha256', $checksumData, ZAAKPAY_SECRET_KEY);

		if ($checksum == $recd_checksum) {
			$this->load->model('Site_Digital_Model');
			$paymentdata = $this->Site_Digital_Model->getzaakpayentry($orderId);

			$zaakpaydata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'orderamount' => $orderAmount,
				'statuscode' => $responseCode,
				'transactionid' => $txnId,
				'paymentmode' => $paymentMode
			);

			$response1 = $this->Site_Digital_Model->updatezaakpayentry($paymentdata->id, $zaakpaydata);

			$userdata = $this->Site_Digital_Model->checkcardofferdata($paymentdata->userid);

			if ($responseCode == 100 || $responseCode == 208 || $responseCode == 601) {
				$cardno = random_code(16);
				$data = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'card_number' => $cardno,
					'registration_date' => date('Y-m-d'),
					'expiry_date' => date('Y-m-d', strtotime('+3 months')),
					'amount' => $orderAmount,
					'paymentid' => $txnId,
					'isActive' => 1
				);

				$response = $this->Site_Digital_Model->updatecardofferorder($paymentdata->userid, $data);

				$sent = $this->Site_Digital_Model->sendPaymentGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);

				$this->load->view('cardoffer-response', ['meta' => $meta, 'status' => $response]);
			} else {
				//$sent = $this->Site_Digital_Model->sendPaymentFailedGreetings($userdata->fullname, $userdata->mobile, $userdata->emailid);
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
		$roundamount = floor($grandamount);

		$fullname = $_REQUEST['fullname'];
		$mobileno = $_REQUEST['mobileno'];
		$emailid = $_REQUEST['emailid'];

		$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
		foreach ($uat_numbers as $uat_num) {
			if ($uat_num == $mobileno) {
				$grandamount = 200;
			}
		}

		
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

		$orderid = number_format(microtime(true) * 1000, 0, '.', '');
		$encData = null;

		if (SABPAISA_MODE == 'PROD') {
			$spDomain = "https://securepay.sabpaisa.in/SabPaisa/sabPaisaInit?v=1";
		} else {
			$spDomain = "https://stage-securepay.sabpaisa.in/SabPaisa/sabPaisaInit?v=1";
		}

		$returnUrl = base_url('loan/specialresponse');

		$encData = "?clientCode=" . SABPAISA_CLIENT_CODE . "&transUserName=" . SABPAISA_USERNAME . "&transUserPassword=" . SABPAISA_PASSWORD . "&amount=" . $roundamount . "&amountType=INR&clientTxnId=" . $orderid . "&payerName=" . trim($fullname) . "&payerMobile=" . $mobileno . "&payerEmail=" . trim($emailid) . "&mcc=5137&channelId=#&callbackUrl=" . $returnUrl;

		$this->load->helper('subpaisa');
		$encryptData = encrypt(SABPAISA_AUTH_KEY, SABPAISA_AUTH_IV, $encData);

		$postData = array(
			'clientCode' => SABPAISA_CLIENT_CODE,
			'encryptData' => $encryptData,
			'action' => $spDomain
		);

		$subpaisadata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => 4,
			'userid' => $userid,
			'orderid' => $orderid,
			'orderamount' => $roundamount,
			'ordernote' => $productdata->productname,
		);
		$response = $this->Site_Digital_Model->subpaisaentry($subpaisadata);

		$this->load->view('sabpaisa-checkout', ['postData' => $postData]);

	}

	public function specialresponse()
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

				$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => $response]);
			} else if ($statusCode == '0300') {
				$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'false']);
			} else {
				$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'false']);
			}
		} else {
			$this->load->view('specialoffer-response', ['meta' => $meta, 'status' => 'false']);
		}

	}


}

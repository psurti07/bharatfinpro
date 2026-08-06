<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Order extends CI_Controller
{

	public function index()
	{
		return redirect()->to('Infopage');
	}

	public function checkoutDigital()
	{

		$this->load->model('Site_Digital_Model');
		$userdata = $this->Site_Digital_Model->checkuserdata($_REQUEST['applyid']);
		$this->session->set_tempdata('applyid', $_REQUEST['applyid']);
		$key = stringCrypt($_REQUEST['applyid'], 'encrypt');

		$data3 = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'status' => 1,
			'isDelete' => 0
		);
		$response3 = $this->Site_Digital_Model->updateapplication($_REQUEST['applyid'], $data3);

		$productslug = ($userdata->cardtype == 12) ? "digital-business-loan" : "digital-personal-loan";

		$this->load->model('Site_Info_Model');
		$productdata = $this->Site_Info_Model->getproductdetails($productslug);
		$amount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;
		$grandamount = $amount + ($amount * 0.18);

		$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
		foreach ($uat_numbers as $uat_num) {
			if ($uat_num == $userdata->mobile) {
				$grandamount = 1;
			}
		}

		$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		$udf1 = $udf2 = $udf3 = $udf4 = $udf5 = '';
		$postData = array();

		$hashstring = PAYU_MERCHANT_KEY . '|' . $txnid . '|' . $grandamount . '|' . $productdata->productname . '|' . $userdata->fullname . '|' . $userdata->email . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . PAYU_SALT;

		$hash = hash('sha512', $hashstring);

		$returnUrl = base_url('order/buycardDigital');

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
			'name' => $userdata->fullname,
			'productinfo' => $productdata->productname,
			'mailid' => $userdata->email,
			'phoneno' => $userdata->mobile,
			'address' => '',
			'action' => $url,
			'returnUrl' => $returnUrl
		);

		$payudata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => $userdata->cardtype,
			'userid' => $userdata->userid,
			'orderid' => $txnid,
			'orderamount' => $grandamount,
			'ordernote' => $productdata->productname
		);

		$this->load->model('Site_Digital_Model');
		$payuentry = $this->Site_Digital_Model->payuentry($payudata);

		$this->load->view('payu-checkout', ['postData' => $postData]);
	}

	public function buycardDigital()
	{

		
		$grandtotal = $netamount = $cgstamount = $sgstamount = $igstamount = 0;

		if (isset($_POST["status"]) && $_POST["status"] != "") {
			$status = $_POST["status"];
			$firstname = $_POST["firstname"];
			$amount = $_POST["amount"];
			$txnid = $_POST["txnid"];
			$posted_hash = $_POST["hash"];
			$key = $_POST["key"];
			$productinfo = $_POST["productinfo"];
			$email = $_POST["email"];
			$additionalCharges = $_POST["additionalCharges"];
			$mihpayid = $_POST["mihpayid"];
			$pgtype = $_POST["PG_TYPE"];
			$salt = PAYU_SALT;

			if (isset($additionalCharges)) {
				$retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
			} else {
				$retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
			}

			$this->load->model('Site_Digital_Model');
			$paymentdata = $this->Site_Digital_Model->getpayuentry($txnid);
			$this->session->set_tempdata('applyid', $paymentdata->userid, 3600);

			$payudata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'referenceid' => $mihpayid,
				'txstatus' => $status,
				'paymentmode' => $pgtype
			);

			$response1 = $this->Site_Digital_Model->updatepayuentry($paymentdata->id, $payudata);
			$userdata = $this->Site_Digital_Model->checkuserregdata($paymentdata->userid);

			if ($status == 'success') {
				$isentry = $this->Site_Digital_Model->checkmembershipentry($mihpayid);

				if ($isentry == 0) {
					$cardno = random_code(16);

					$mbrdata = array(
						'rec_date' => date('Y-m-d H:i:s'),
						'userid' => $userdata->userid,
						'registration_date' => date('Y-m-d'),
						'expiry_date' => date('Y-m-d', strtotime('+3 months')),
						'card_number' => $cardno,
						'amount' => $amount,
						'paymentid' => $mihpayid,
						'isActive' => 1,
						'isDelete' => 0
					);
					$memberid = $this->Site_Digital_Model->membershiporder($mbrdata);

					$password = random_code(6);
					$passwordkey = stringCrypt($password, 'encrypt');
					$refcode = strtolower(substr(str_replace(" ", "", $userdata->fullname), 0, 3));
					$refcode .= substr($userdata->mobile, -4);

					$data2 = array(
						'rec_date' => date('Y-m-d H:i:s'),
						'update_date' => date('Y-m-d H:i:s'),
						'password' => $passwordkey,
						'refcode' => $refcode,
						'isUser' => 2
					);
					$response2 = $this->Site_Digital_Model->updateregistration($userdata->userid, $data2);

					$this->load->model('Site_Info_Model');
					$invoiceno = $this->Site_Info_Model->getinvoiceno();

					if ($userdata->cardtype == 12) {
						$productslug = "digital-business-loan";
						$invfor = 2;
						$invprefix = "BL_";
					} else {
						$productslug = "digital-personal-loan";
						$invfor = 1;
						$invprefix = "PL_";
					}

					$productdata = $this->Site_Info_Model->getproductdetails($productslug);
					$netamount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;

					if ($userdata->state == 'Gujarat') {
						$cgstamount = $netamount * 0.09;
						$sgstamount = $netamount * 0.09;
					} else {
						$igstamount = $netamount * 0.18;
					}

					$grandtotal = $netamount + $cgstamount + $sgstamount + $igstamount;

					$data3 = array(
						'rec_date' => date('Y-m-d H:i:s'),
						'userid' => $userdata->userid,
						'cardid' => $memberid,
						'inv_for' => $invfor,
						'inv_prefix' => $invprefix,
						'inv_number' => $invoiceno,
						'inv_date' => date('Y-m-d'),
						'inv_price' => $netamount,
						'inv_cgst' => $cgstamount,
						'inv_sgst' => $sgstamount,
						'inv_igst' => $igstamount,
						'inv_grandtotal' => $grandtotal,
						'isDelete' => 0
					);

					$responseinvoice = $this->Site_Digital_Model->generateinvoice($data3, $invoiceno);

					$sent = $this->Site_Digital_Model->sendSuccessGreetings($userdata->mobile, $userdata->email, $password);
					
					return redirect("order/orderstatus/" . $paymentdata->entryfor . "/" . $response2);
				} else {
					return redirect("order/orderstatus/11/false");
				}
			} else if ($status == 'failure') {
				return redirect("order/orderstatus/11/false");
			} else {
				return redirect("order/orderstatus/11/false");
			}
		}
	}

	public function orderStatus($loantype = '', $status = '')
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('digital-personal');

		$fbclidpl = "";
		
		$applyid = $this->session->tempdata('applyid');
		$this->load->model('Site_Digital_Model');
		$userdata = $this->Site_Digital_Model->checkuserdata($applyid);

		$apr = ($userdata->loantype == 12) ? 11.5 : 12.5;
		$eligibilityamt = calEligiblity($userdata->income, $userdata->currentemi, $apr, $userdata->loanamount);

		$data = array(
			'loantype' => $loantype,
			'username' => $userdata->fullname,
			'preamount' => $eligibilityamt,
			'status' => $status
		);

		if ($status != '') {
			if ($status == "true" && $this->session->tempdata('applyid') != "") {

				$firstname = strtok($userdata->fullname, " ");
				$city = strtolower(preg_replace("/[^a-zA-Z]+/", "", $userdata->city));
				$state = strtolower(getStateAbbreviation($userdata->state));
				$orderid = "MC" . date('md') . random_code(4);

				$fbdata = array(
					'userid' => $userdata->userid,
					'firstname' => $firstname,
					'mobile' => "91" . $userdata->mobile,
					'email' => $userdata->email,
					'city' => $city,
					'state' => $state,
					'orderid' => $orderid,
					'sourceurl' => base_url('/order/orderStatus/11/true')
				);

				if (get_cookie('fbclidpl') != "") {
					$fbclidpl = "fb.0." . round(microtime(true) * 1000) . "." . get_cookie('fbclidpl');
				}

				$fbdata['fbclid'] = $fbclidpl;

				$fbresponse = fbconversioncurl($fbdata);

				$this->load->model('Site_Info_Model');

				/* $data3 = array(
					'phoneNumber' => $userdata->mobile,
					'countryCode' => '+91',
					'event' => 'Payment Successful'
				);
				$this->load->helper('interakt');
				$restrack2 = event_track($data3); */

				// Whatsapp INTERAKT Code
				$intkt_payment_success = $this->Site_Info_Model->getsmsmessage('intkt_payment_success');

				$data4 = array(
					"fullPhoneNumber" => '+91' . $userdata->mobile,
					"callbackData" => "some text here",
					"type" => "Template",
					"template" => array(
						"name" => $intkt_payment_success,//"prayosha_ps",
						"languageCode" => "en",
						"headerValues" => array(
							"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/90a30b78-f3eb-4f1d-bef4-99e7bb5d20bc/message_template_media/hnr3lXaqJTUR/prayosha_ps.jpg?se=2029-08-01T07%3A26%3A57Z&sp=rt&sv=2019-12-12&sr=b&sig=uffjoKwIUrvWtj9vDLw0kuxv4I4FMEaZmRtWwqhV7ks%3D"
						),
						"bodyValues" => array(
							$userdata->fullname
						),
					)

				);
				$restrack4 = interakt_track($data4);

				$this->load->view('payment-response', ['meta' => $meta, 'responsedata' => $data]);
			} else if ($status == "false" && $this->session->tempdata('applyid') != "") {
				$applyid = $this->session->tempdata('applyid');

				//if ($applyid > 0) {
					$this->load->model('Site_Digital_Model');
					$userdata = $this->Site_Digital_Model->checkuserdata($applyid);

					$data4 = array(
						"fullPhoneNumber" => '+91' . $userdata->mobile,
						"callbackData" => "some text here",
						"type" => "Template",
						"template" => array(
							"name" => "28oct_fail",//"prayosha_ps",
							"languageCode" => "en",
							"headerValues" => array(
								"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/90a30b78-f3eb-4f1d-bef4-99e7bb5d20bc/message_template_media/EdHoUrF3mRHp/prayosha_fail.jpg?se=2029-10-22T04%3A44%3A17Z&sp=rt&sv=2019-12-12&sr=b&sig=f3uEVYecdGGiPJO2w2XSoTe3jo6VBmKahYOJj1CNhZk%3D"
							),
							"bodyValues" => array(
								$userdata->fullname
							),
						)
	
					);
					$restrack4 = interakt_track($data4);


					$sent = $this->Site_Digital_Model->sendPaymentFailedGreetings($userdata->mobile, $userdata->email);
				//}
				$this->load->view('payment-response', ['meta' => $meta, 'responsedata' => $data]);
			} else {
				$this->load->view('payment-response', ['meta' => $meta, 'responsedata' => $data]);
			}
		} else {
			redirect('digital/personalLoan');
		}
	}

}

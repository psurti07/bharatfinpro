<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentGatewayStatusCron extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function updateZaakpayStatus()
	{
	    die;
		$this->load->model('Site_Digital_Model');
		$this->load->model('Site_Info_Model');
		
		$merchantIdentifier = ZAAKPAY_MERCHANT_IDENTIFIER;
		$secretKey = ZAAKPAY_SECRET_KEY;
		$mode = "0";

		$getPendingOrderData = $this->Site_Digital_Model->getPendingOrdersData();
		if (empty($getPendingOrderData)) {
			echo "No pending orders found.\n";
			return;
		}

		foreach ($getPendingOrderData as $order) {
			if (!empty($order->statuscode)) {
				continue;
			}
	
			$orderId = $order->orderid; // take orderid for update zaakpay data

			$dataArray = [
				"merchantIdentifier" => $merchantIdentifier,
				"mode" => $mode,
				"orderDetail" => [
					"orderId" => $orderId
				]
			];

			$jsonData = json_encode($dataArray, JSON_UNESCAPED_SLASHES);

			// Correct checksum
			$checksum = hash_hmac('sha256', $jsonData, $secretKey);
			// POST fields
			$postFields = "data=".$jsonData."&checksum=".$checksum;

			$ch = curl_init("https://api.zaakpay.com/checkTxn?v=5");
			curl_setopt_array($ch, [
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => $postFields,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_HTTPHEADER => ["Content-Type: application/x-www-form-urlencoded"],
				CURLOPT_SSL_VERIFYHOST => 0,
				CURLOPT_SSL_VERIFYPEER => 0
			]);

			$response = curl_exec($ch);
			curl_close($ch);
			$result = json_decode($response, true);
			
			if (!isset($result['orders'][0])) {
				log_message('error', "Zaakpay missing order: " . json_encode($result));
				continue;
			}

			$orderData = $result['orders'][0];
			$orderDetail = $orderData['orderDetail'] ?? [];

			$responseCode = $orderData['responseCode'] ?? null;
			$entryfor = $order->entryfor ?? null; 

			$orderAmount = ($orderDetail['amount']/100) ?? 0;
			$txnId = $orderDetail['txnId'] ?? '';

			$updateData = [
				'statuscode' => $orderData['responseCode'] ?? null,
				'statusdescription' => $orderData['responseDescription'] ?? null,
			];
			$this->Site_Digital_Model->updateZaakpayEntryOrder($orderId, $updateData);
			
			if (in_array($entryfor, [11, 12]) && in_array($responseCode, [100, 208, 601])) {
				$paymentdata = $this->Site_Digital_Model->getzaakpayentry($orderId);
				$userdata = $this->Site_Digital_Model->checkuserregdata($paymentdata->userid);

				$cardno = random_code(16);

				$mbrdata = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'userid' => $userdata->userid,
					'registration_date' => date('Y-m-d'),
					'expiry_date' => date('Y-m-d', strtotime('+3 months')),
					'card_number' => $cardno,
					'amount' => $orderAmount,
					'paymentid' => $txnId,
					'isActive' => 1,
					'isDelete' => 0
				);
				$memberid = $this->Site_Digital_Model->membershiporder($mbrdata);

				$password = random_code(6);
				$passwordkey = stringCrypt($password, 'encrypt');
				$refcode = strtolower(substr(str_replace(" ", "", $userdata->fullname),0,3));
				$refcode .= substr($userdata->mobile,-4);

				$regdata = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'update_date' => date('Y-m-d H:i:s'),
					'password' => $passwordkey,
					'refcode' => $refcode,
					'process_step' => 4,
					'isUser' => 2
				);
				$response2 = $this->Site_Digital_Model->updateregistration($userdata->userid, $regdata);

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

				$cgstamount = $sgstamount = $igstamount = 0;
				if ($userdata->state == 'Gujarat') {
					$cgstamount = $netamount * 0.09;
					$sgstamount = $netamount * 0.09;
				} else {
					$igstamount = $netamount * 0.18;
				}

				$grandtotal = $netamount + $cgstamount + $sgstamount + $igstamount;

				$invdata = array(
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

				$responseinvoice = $this->Site_Digital_Model->generateinvoice($invdata, $invoiceno);

				$remote_data = array(
					'company_code' => COMPANY_CODE,
					'company_local_ip' => LOCAL_IP,
					'product_code' => 'membership',
					'customer_name' => $userdata->fullname,
					'customer_email' => $userdata->email,
					'customer_mobile' => $userdata->mobile,
					'userid' => $userdata->userid,
					'card_number' => $cardno,
					'rec_date' => date('Y-m-d H:i:s'),
					'inv_for' => $invfor,
					'inv_prefix' => $invprefix,
					'inv_number' => $invoiceno,
					'inv_date' => date('Y-m-d'),
					'inv_price' => $netamount,
					'inv_cgst' => $cgstamount,
					'inv_sgst' => $sgstamount,
					'inv_igst' => $igstamount,
					'inv_grandtotal' => $grandtotal,
				);

				$api_response = send_order_data(json_encode($remote_data));
				 
				$intkt_userwelcomename = $this->Site_Info_Model->getsmsmessage('intkt_userwelcomename');
				$data1 = array(
						"fullPhoneNumber"=> '+91'.$userdata->mobile,
						"callbackData"=> "some text here",
						"type"=> "Template",
						"template"=> array(
							"name"=> $intkt_userwelcomename,
							"languageCode"=> "en",
							"bodyValues"=> array(
								$userdata->mobile, $password
							),
						)
				);
				$restrack1 = interakt_track($data1);

                $userdate = $this->Site_Digital_Model->checkuserdata($userdata->userid);

				$fbclidpl = "";

				$firstname = strtok($userdate->fullname, " ");
				$city = strtolower(preg_replace("/[^a-zA-Z]+/", "", $userdate->city));
				$state = strtolower(getStateAbbreviation($userdate->state));
				$orderid = "MC" . date('md') . random_code(4);

				$fbdata = array(
					'userid' => $userdate->userid,
					'firstname' => $firstname,
					'mobile' => "91" . $userdate->mobile,
					'email' => $userdate->email,
					'city' => $city,
					'state' => $state,
					'orderid' => $orderid,
					'sourceurl' => base_url('/digital/paymentResponse/11/true')
				);

				if (get_cookie('fbclidpl') != "") {
					$fbclidpl = "fb.0." . round(microtime(true) * 1000) . "." . get_cookie('fbclidpl');
				}

				$fbdata['fbclid'] = $fbclidpl;
				$fbresponse = fbconversioncurl($fbdata);

				$data2 = array(
					'phoneNumber' => $userdate->mobile,
					'countryCode' => '+91',
					'traits' => array(
						'name' => $userdate->fullname
					),
					'tags' => array('Payment Successful')
				);
				$this->load->helper('interakt');
				$restrack2 = user_track($data2);

				$data3 = array(
					'phoneNumber' => $userdate->mobile,
					'countryCode' => '+91',
					'event' => 'Payment Successful'
				);
                $this->load->helper('interakt');
				$restrack3 = event_track($data3);
				
				$sent = $this->Site_Digital_Model->sendSuccessGreetings($userdata->mobile, $userdata->email, $password);

			} 
			else {
				echo "No action required";
			}

		}

		echo "Cron completed at " . date('Y-m-d H:i:s') . "\n";
	}
}
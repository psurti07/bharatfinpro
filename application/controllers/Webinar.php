<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Webinar extends CI_Controller
{

	public function index(){
		$this->load->model('Site_Info_Model');
		//$meta = $this->Site_Info_Model->getmetakeywords('webinar');
		$this->load->view('webinar');
	}
	public function otp_verification()
	{
		if ($_REQUEST['mobile_no'] != "") {
			$this->load->model('Site_Webinar_Model');
			$eventdetails = $this->Site_Webinar_Model->getwebinardetail();
			
			if($eventdetails != ''){
				$firstname = $_REQUEST['firstname'];
				$lastname = $_REQUEST['lastname'];
				$mobile = $_REQUEST['mobile_no'];
				
				$check_exists_user = $this->Site_Webinar_Model->check_exist_user($mobile, $eventdetails->id);
				
				if($check_exists_user == ''){
					$this->load->model('Site_Webinar_Model');
					$user_lead = $this->Site_Webinar_Model->checkuserentry($mobile);
					
					$this->session->set_tempdata('usermobile', $mobile);
					$this->session->set_tempdata('firstname', $firstname);
					$this->session->set_tempdata('lastname', $lastname);
					$this->session->set_tempdata('programid', $eventdetails->id);
					
					if($user_lead == ''){
						$data1 = array(
							'program_id'=>$eventdetails->id,
							'program_type'=>$_REQUEST['program_type'],
							'rec_date' => date('Y-m-d H:i:s'),
							'first_name' => $firstname,
							'last_name' => $lastname,
							'mobile' => $mobile,
							'process_step'=>'1',
							
						);
				
						$userid = $this->Site_Webinar_Model->userregistration($data1);

						$this->load->model('Site_General_Model');
						$countsms = $this->Site_General_Model->countotpentry($mobile);

						if ($countsms < 10) {
							$response = $this->Site_General_Model->generateotp($mobile);
							$this->load->view('webinar_otp_verification');
						} else {
							
							$message = "You have reached the OTP limit. Please contact customer support";
							$this->session->set_flashdata('danger', $message);
							return redirect('webinar/otp_verification');
						}
					} 
					else {
						$data1 = array(
							'program_id'=>$eventdetails->id,
							'program_type'=>$_REQUEST['program_type'],
							'rec_date' => date('Y-m-d H:i:s'),
							'first_name' => $firstname,
							'last_name' => $lastname,
							'mobile' => $mobile
						);
						
						$userid = $this->Site_Webinar_Model->updateregistration($user_lead->id, $data1);
						
						if($user_lead->process_step == 1){ 
							$this->load->model('Site_General_Model');
							$response = $this->Site_General_Model->generateotp($mobile);
							$this->load->view('webinar_otp_verification');
						}else if($user_lead->process_step == 2){
							return redirect('webinar/personal-details');
						} else if($user_lead->process_step == 3){ 
							return redirect('webinar/enroll-now');
						}
					}
				} else {
					$message = "You are already customer for this webinar..!";
					$this->session->set_flashdata('danger', $message);
					return redirect('webinar/otp-verification');
				}
			} else {
				$message = "There is no webinar available now..!";
				$this->session->set_flashdata('danger', $message);
				return redirect('webinar');
			}
			
		} else {
			return redirect('webinar/user-register');
		}
	}

	public function resendotpCode()
	{
		if ($_REQUEST['mobile_no'] != "") {
			$mobile = $_REQUEST['mobile_no'];

			$this->load->model('Site_General_Model');
			$countsms = $this->Site_General_Model->countotpentry($mobile);

			if ($countsms < 10) {
				$response = $this->Site_General_Model->generateotp($mobile, '', 2, 'main');
				$this->load->view('webinar_otp_verification');
			} else {
				$this->load->view('webinar_otp_verification');
			}
		} else {
			$this->load->view('webinar_otp_verification');
		}
	}

	public function checkotpCode()
	{
		$this->load->model('Site_Webinar_Model');
		if (isset($_REQUEST['otpmobile'])) {
			$mobile = $_REQUEST['otpmobile'];
			$otpcode = implode('',$_REQUEST['otpcode']);
			
			//$this->session->set_tempdata('usermobile', $mobile);

			$this->load->model('Site_General_Model');
			$response = $this->Site_General_Model->checkOTP($mobile, $otpcode);
			
			if ($response == 1) {
				$userdata = $this->Site_Webinar_Model->checkuserentry($mobile);
				$data1 = array(
					'process_step'=>'2',
				);
				$userid = $this->Site_Webinar_Model->updateregistration($userdata->id, $data1);

				$this->session->set_tempdata('usermobile',$mobile);
				return redirect('webinar/personal-details');
			} else {
				$message = "OTP not match..!";
				$this->session->set_flashdata('danger', $message);
				$this->load->view('webinar_otp_verification');
			}
		} else {
			
		}
	}

	public function user_register()
	{
		$this->load->view('webinar-apply-now');
	}
	
	public function personal_details(){
		$this->load->model('Site_Webinar_Model');
		$userdata = $this->Site_Webinar_Model->checkuser($this->session->tempdata('usermobile'));
		$this->load->view('webinar-personal-detail', ['userdata'=>$userdata]);
	}
	
	public function enroll_now(){
		$this->load->model('Site_Webinar_Model');
		$eventdetails = $this->Site_Webinar_Model->getwebinardetail();
		$userdata = $this->Site_Webinar_Model->checkuser($this->session->tempdata('usermobile'));
		$this->load->view('webinar-enroll-now',['eventdetails'=>$eventdetails, 'userdata'=>$userdata]);
	}

	public function userregister(){
		$program_id = $_REQUEST['program_id'];
		$mobile_no = $_REQUEST['mobile_no'];
		$this->session->tempdata('usermobile', $mobile_no);
		$this->load->model('Site_Webinar_Model');
		$data = $this->Site_Webinar_Model->checkwebinar_exist_user($mobile_no, $program_id);
		
		/*if (isset($_REQUEST['fbclid'])) {
					set_cookie('fbclidpl', $_REQUEST['fbclid'], '3600');
					//$this->session->set_tempdata('fbclidpl', $_REQUEST['fbclid']);
				}*/
		if ($data != '') {
			
			$data1 = array(
				'email' => $_REQUEST['email'],
				'occupation' => $_REQUEST['current_occupation'],
				'earning_goal' => $_REQUEST['earning_goal'],
				'pincode'=>$_REQUEST['pincode'],
				'city'=>$_REQUEST['city'],
				'state'=>$_REQUEST['state'],
				'process_step'=>'3',
				'isUser' => 1,
			);
	
			$userid = $this->Site_Webinar_Model->updateregistration($data->id, $data1);

			$webinarorderdata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'webinar_id' => $program_id,
				'userid' => $data->id,
			);
			$orderentry = $this->Site_Webinar_Model->addwebinar_order($webinarorderdata);

			/*$this->load->helper('interakt');

			$data2 = array(
				'phoneNumber' => $mobile_no,
				'countryCode' => '+91',
				'traits' => array(
					'name' => $data->first_name
				),
				'tags' => array('Lead Gen')
			);

			$restrack2 = webinar_user_track($data2);

			$data3 = array(
				'phoneNumber' => $mobile_no,
				'countryCode' => '+91',
				'event' => 'Lead Gen',
			);
			$restrack3 = webinar_event_track($data3);*/

			if($userid){
				return redirect('webinar/enroll-now');
			}
		} else {
			return redirect('webinar/enroll-now');
		}
		
	}

	public function chekoutwebinar()
	{
		$this->load->model('Site_Webinar_Model');
		
		$userdata = $this->Site_Webinar_Model->checkuserdata($_REQUEST['userid']);
		$this->session->set_tempdata('userid', $_REQUEST['userid']);
		$this->session->set_tempdata('programid', $_REQUEST['program_id']);
		
		$eventdetails = $this->Site_Webinar_Model->get_event_price($_REQUEST['program_id']);

		$this->session->set_tempdata('community_link', $eventdetails->community_link);
	
		if($eventdetails->event_offer_price > 0){
			$this->session->set_tempdata('eventid', $eventdetails->id);

			$amount = $eventdetails->event_offer_price;
			$grandamount = $amount + ($amount * 0.18);
			$roundamount = floor($grandamount);

			$uat_numbers = unserialize(UAT_MOBILE_NUMBERS);
			foreach ($uat_numbers as $uat_num) {
				if ($uat_num == $userdata->mobile) {
					$roundamount = 1;
				}
			}
			
			$orderid = number_format(microtime(true) * 1000, 0, '.', '');

			$returnUrl = base_url('webinar/buycardWebinar');
			$url = "https://api.zaakpay.com/api/paymentTransact/V8";

			$firstname = ($userdata->first_name != "") ? $userdata->first_name : $userdata->email;
			$postData = array(
				"merchantIdentifier" => ZAAKPAY_MERCHANT_IDENTIFIER,
				"orderId" => $orderid,
				"returnUrl" => $returnUrl,
				"currency" => 'INR',
				"amount" => $roundamount * 100,
				"buyerEmail" => $userdata->email,
				"buyerFirstName" => $firstname,
				"buyerPhoneNumber" => $userdata->mobile,
				"buyerCountry" => 'India',
				"productDescription" => 'webinar',
			);

			ksort($postData);
			$checksumData = "";
			foreach ($postData as $key => $value) {
				$checksumData .= $key . '=' . $value . '&';
			}

			$checksum = hash_hmac('sha256', $checksumData, ZAAKPAY_SECRET_KEY);

			
			$webinarorderdata = array(
				'orderid' => $orderid,
				'amount' => $roundamount,
			);
			
			$orderentry = $this->Site_Webinar_Model->update_webinarorder($userdata->id, $eventdetails->id, $webinarorderdata);

			$zaakpaydata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'entryfor' => '99',
				'userid' => $userdata->id,
				'orderid' => $orderid,
				'orderamount' => $roundamount,
				'ordernote' => 'Webinar'
			);

			$response = $this->Site_Webinar_Model->zaakpayentry($zaakpaydata);

			$this->load->view('zaakpay-checkout', ['postData' => $postData, 'checksum' => $checksum, 'url' => $url]);

			
		} else {
			$this->session->set_tempdata('usermobile',$userdata->mobile);
			$this->session->set_tempdata('userid',$userdata->id);
			$this->session->set_tempdata('community_link',$eventdetails->community_link);
	
		    $data = array(
				'isUser'=>2,
				'isActive' => 1,
				'isDelete' => 0
			);
			$memberid = $this->Site_Webinar_Model->update_webinarorder($userdata->id, $userdata->program_id, $data);
			
			$maildata = array(
				'fullname' => $userdata->first_name,
				'mobile' => $userdata->mobile,
				'email' => $userdata->email,
				'userid' => $userdata->id,
				'webinar_id'=>$userdata->program_id,
				'cardid' => $memberid,
				'communitylink' => $eventdetails->community_link,
			);

			$sent = $this->Site_Webinar_Model->sendSuccessGreetings($maildata);
			return redirect("webinar/paymentResponse/true");
			die;
		}
	}

	public function buycardWebinar()
	{
		$this->load->model('Site_Webinar_Model');
		
		$grandtotal = $netamount = $cgstamount = $sgstamount = $igstamount = 0;

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
			$paymentdata = $this->Site_Webinar_Model->getzaakpayentry($orderId);

			$zaakpaydata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'orderamount' => $orderAmount,
				'statuscode' => $responseCode,
				'transactionid' => $txnId,
				'paymentmode' => $paymentMode
			);
			$response1 = $this->Site_Webinar_Model->updatezaakpayentry($paymentdata->id, $zaakpaydata);

			$userdata = $this->Site_Webinar_Model->checkuserregdata($paymentdata->userid);
			$this->session->set_tempdata('userid',$userdata->id);
			if ($responseCode == 100) {
				$cardno = random_code(16);
				$data = array(
					'isUser'=>2,
					'paymentid' => $txnId,
					'isActive' => 1,
					'isDelete' => 0
				);
				$memberid = $this->Site_Webinar_Model->update_webinarorder($userdata->id, $userdata->program_id, $data);

				$password = random_code(6);
				$this->session->set_tempdata('password', $password);
				$passwordkey = stringCrypt($password, 'encrypt');
				$refcode = strtolower(substr(str_replace(" ", "", $userdata->first_name), 0, 3));
				$refcode .= substr($userdata->mobile, -4);

				$regdata = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'process_step'=> 4,
					'isActive' => 1,
				);
				$response2 = $this->Site_Webinar_Model->updateregistration($userdata->id, $regdata);

				$this->load->model('Site_Info_Model');
				$invoiceno = $this->Site_Info_Model->getinvoiceno();

				$this->load->model('Site_Info_Model');
				$eventdetails = $this->Site_Webinar_Model->get_event_price($userdata->program_id);

				$this->session->set_tempdata('community_link',$eventdetails->community_link);
				
				$netamount = $eventdetails->event_offer_price;

				if ($userdata->state == 'Gujarat') {
					$cgstamount = $netamount * 0.09;
					$sgstamount = $netamount * 0.09;
				} else {
					$igstamount = $netamount * 0.18;
				}

				$grandtotal = $netamount + $cgstamount + $sgstamount + $igstamount;

				$invdata3 = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'userid' => $userdata->id,
					'cardid' => $memberid,
					'inv_for' => '51',
					'inv_prefix' => 'Webinar',
					'inv_number' => $invoiceno,
					'inv_date' => date('Y-m-d'),
					'inv_price' => number_format($netamount, 2),
					'inv_cgst' => number_format($cgstamount, 2),
					'inv_sgst' => number_format($sgstamount, 2),
					'inv_igst' => number_format($igstamount, 2),
					'inv_grandtotal' => number_format($grandtotal, 2),
					'isDelete' => 0
				);

				$responseinvoice = $this->Site_Webinar_Model->generateinvoice($invdata3, $invoiceno);

				$maildata = array(
					'fullname' => $userdata->first_name,
					'mobile' => $userdata->mobile,
					'email' => $userdata->email,
					'userid' => $userdata->id,
					'webinar_id'=>$userdata->program_id,
					'cardid' => $memberid,
					'communitylink' => $eventdetails->community_link,
				);

				$sent = $this->Site_Webinar_Model->sendSuccessGreetings($maildata);

				return redirect("webinar/paymentResponse/true");
				die;
			} else {
				$sent = $this->Site_Webinar_Model->sendPaymentFailedGreetings($userdata->mobile, $userdata->email);
				return redirect("webinar/paymentResponse/false");
				die;
			}
		} else {
			return redirect("webinar/paymentResponse/false");
			die;
		}
	}

	public function paymentResponse($status = '')
	{
		$this->load->model('Site_Info_Model');
		//$meta = $this->Site_Info_Model->getmetakeywords('landing-personal-loan');
		$meta = 'webinar';

		$fbclidpl = $applyid = $fbresponse = "";
		$community_link = $this->session->tempdata('community_link');
		
		if ($status === "true" && $this->session->tempdata('userid') != '') {
			$this->load->model('Site_Webinar_Model');
			$userdata = $this->Site_Webinar_Model->checkuserdata($this->session->tempdata('userid'));

			$firstname = strtolower(strtok($userdata->first_name, " "));
			$city = strtolower(preg_replace("/[^a-zA-Z]+/", "", $userdata->city));
			$state = strtolower(getStateAbbreviation($userdata->state));
			$orderid = "MC" . date('md') . random_code(4);

			$fbdata = array(
				'version' => 'v21.0',
				'type' => 'webinar',
				'firstname' => $firstname,
				'mobile' => "91" . $userdata->mobile,
				'email' => strtolower($userdata->email),
				'city' => $city,
				'state' => $state,
				'orderid' => $orderid,
				'sourceurl' => base_url('webinar/paymentResponse/true')
			);

			if (get_cookie('fbclidpl') != "") {
				$fbclidpl = get_cookie('fbclidpl');
			}

			$fbdata['fbclid'] = $fbclidpl;
			$fbresponse = fbconversioncurl($fbdata);

            // $this->load->helper('interakt');
			/* $data2 = array(
				'phoneNumber' => $userdata->mobile,
				'countryCode' => '+91',
				'traits' => array(
					'name' => $userdata->first_name
				),
				'tags' => array('Payment Successful')
			);
			
			$restrack2 = webinar_user_track($data2);

			$data3 = array(
				'phoneNumber' => $userdata->mobile,
				'countryCode' => '+91',
				'event' => 'Payment Successful',
			);
			$restrac3 = webinar_event_track($data3);*/

			// $intdata1 = array(
			// 	"fullPhoneNumber" => '+91' . $userdata->mobile,
			// 	"callbackData" => "some text here",
			// 	"type" => "Template",
			// 	"template" => array(
			// 		"name" => "success_8july_1",
			// 		"languageCode" => "en",
			// 		"bodyValues" => array(
			// 			$firstname,
			// 		),
			// 	)

			// );
			// $restrack_intdata = webinar_interakt_payment_success_fail($intdata1);
			
			$this->load->view('webinar-payment-response', ['meta' => $meta, 'responsedata' => $status, 'community_link'=>$community_link]);
		} 
		elseif ($status === "false" && $this->session->tempdata('userid') != '') {
				$this->load->model('Site_Webinar_Model');
				$userdata = $this->Site_Webinar_Model->checkuserdata($this->session->tempdata('userid'));
				
				// $this->load->helper('interakt');
				
				// /*$data3 = array(
				// 	'phoneNumber' => $userdata->mobile,
				// 	'countryCode' => '+91',
				// 	'event' => 'Payment Failed',
				// );
				// $restrac3 = webinar_event_track($data3);*/

				// $intdata1 = array(
				// 	"fullPhoneNumber" => '+91' . $userdata->mobile,
				// 	"callbackData" => "some text here",
				// 	"type" => "Template",
				// 	"template" => array(
				// 		"name" => "fail_8july_1",
				// 		"languageCode" => "en",
				// 		"bodyValues" => array(
				// 			$firstname,
				// 		),
				// 	)
				// );
				// $restrack_intdata = webinar_interakt_payment_success_fail($intdata1);

				$sent = $this->Site_Webinar_Model->sendPaymentFailedGreetings($userdata->mobile, $userdata->email);
				
			$this->load->view('webinar-payment-response', ['meta' => $meta, 'responsedata' => $status]);
		}
		else {
			return redirect('webinar');
			die;
		}
	}

	
	public function geoLocation()
    {
		$this->load->helper('geoloc');
		$pincode = $_REQUEST['pincode'];

        if(strlen($pincode) != 6){
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid pincode'
            ]);
            return;
        }

        $data = getGeolocation($pincode);

        if(isset($data['error'])){
            echo json_encode([
                'status' => 'error',
                'message' => $data['error']
            ]);
        } else {
            echo json_encode([
                'status'   => 'success',
                'city' => $data['cityname'] ?? '',
                'state'    => $data['statename'] ?? ''
            ]);
        }
    }
    
	public function userProcess()
	{
		try {

			// Step 1: Get user ID from URL
			$encryptedId = $this->input->get('id');
			
			if (empty($encryptedId)) {
				return redirect('webinar/user-register');
			}

			// Step 2: Decrypt user ID
			$userId = decryptData($encryptedId);
			
			// Step 3: Find user
			$userDetail = $this->db
				->where('id', $userId)
				->where('program_type', 0)
				->get('user_webinar_registration')
				->row();
			
			if (!$userDetail) {
				return redirect('webinar/user-register');
			}

			// Step 4: Store encrypted user id in session
			$this->session->set_userdata(
				'id',
				$this->encryption->encrypt($userId)
			);

			
			// Step 6: Redirect based on steps
			switch ($userDetail->process_step) {

				case 1:
					
					// OTP verified
					$this->session->set_userdata('otp_verified', TRUE);

					return redirect('webinar/user-register');
					break;

				case 2:
					
					$this->session->set_userdata(array(
						'otp_verified'    => TRUE,
						'step2_completed' => TRUE,
					));
						$this->session->set_tempdata('usermobile',$userDetail->mobile);
					return redirect('webinar/personal-details');
				case 3:
					
					$this->session->set_userdata(array(
						'otp_verified'    => TRUE,
						'step3_completed' => TRUE
					));
					$this->session->set_tempdata('usermobile',$userDetail->mobile);
					redirect('webinar/enroll-now');
					break;

				case 4:
					
					$this->session->set_tempdata('usermobile',$userDetail->mobile);
					redirect('webinar/paymentResponse/true');
					break;

				default:

					return redirect('webinar/user-register');
					break;
			}

		} catch (Exception $e) {

			return redirect('webinar/user-register');
		}
	}
}

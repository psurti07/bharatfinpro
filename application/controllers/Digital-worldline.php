<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Digital extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		return redirect()->to('Infopage');
	}

	public function pl($referralcode)
	{
		if (!$referralcode) {
			return redirect()->to('Infopage');
		} else {
			$this->session->set_tempdata('referralcode', $referralcode);
			redirect('digital/personalLoan');
		}
	}

	public function bl($referralcode)
	{
		if (!$referralcode) {
			return redirect()->to('Infopage');
		} else {
			$this->session->set_tempdata('referralcode', $referralcode);
			redirect('digital/businessLoan');
		}
	}

	public function sendotpCode()
	{
		if ($_REQUEST['fullname'] != "" && $_REQUEST['mobile'] != "") {
			$fullname = $_REQUEST['fullname'];
			$mobile = $_REQUEST['mobile'];

			$this->load->model('Site_Digital_Model');
			$data = $this->Site_Digital_Model->checkuser($mobile);

			if ($data != '') {
				if ($data->isUser == 2) {
					$returnUrl = base_url('/customer');
					echo json_encode(array("success" => false, "message" => "You are already a registered customer. Kindly login to customer panel. <a href='" . $returnUrl . "'>Click Here</a>", "mobile" => "", "redirect_url" => ""));
					die;
				} else {
					$key = stringCrypt($data->id, 'encrypt');

					$data1 = array(
						'update_date' => date('Y-m-d H:i:s')
					);
					$response1 = $this->Site_Digital_Model->updateregistration($data->userid, $data1);

					switch ($data->process_step) {
						case '3':
							$redirect_url = site_url("digital/membershiporder/" . $key);
							break;

						case '2':
							$redirect_url = site_url("digital/preapproval/" . $key);
							break;

						default:
							$redirect_url = site_url("digital/checkeligibility/" . $key);
							break;
					}

					/* $redirect_url = site_url("digital/checkeligibility/".$key); */

					echo json_encode(array("success" => true, "message" => "Customer found.", "mobile" => "", "redirect_url" => $redirect_url));
					die;
				}
			} else {
				$this->session->set_tempdata('userfullname', $fullname);
				$this->session->set_tempdata('usermobile', $mobile);

				$this->load->model('Site_General_Model');
				$countsms = $this->Site_General_Model->countotpentry($mobile);

				if ($countsms < 10) {
					$response = $this->Site_General_Model->generateotp($mobile, '');
					echo json_encode(array("success" => true, "message" => "OTP sent to mobile.", "mobile" => $mobile, "redirect_url" => ""));
					die;
				} else {
					echo json_encode(array("success" => false, "message" => "You have reached the OTP limit. Please contact customer support.", "mobile" => "", "redirect_url" => ""));
					die;
				}
			}

			echo json_encode(array("success" => false, "message" => "Ops. Something is wrong. Try again.", "mobile" => "", "redirect_url" => ""));
			die;
		} else {
			echo json_encode(array("success" => false, "message" => "Customer fullname and mobile number is mendatory.", "mobile" => "", "redirect_url" => ""));
			die;
		}
	}

	public function resendotpCode()
	{
		if ($_REQUEST['fullname'] != "" && $_REQUEST['mobile'] != "") {
			$fullname = $_REQUEST['fullname'];
			$mobile = $_REQUEST['mobile'];

			$this->load->model('Site_General_Model');
			$countsms = $this->Site_General_Model->countotpentry($mobile);

			if ($countsms < 10) {
				$response = $this->Site_General_Model->generateotp($mobile, '');
				echo json_encode(array("success" => true, "message" => "New OTP sent to mobile."));
				die;
			} else {
				echo json_encode(array("success" => false, "message" => "You have reached the OTP limit. Please contact customer support."));
				die;
			}
		} else {
			echo json_encode(array("success" => false, "message" => "Customer fullname and mobile number is mendatory.", "mobile" => "", "redirect_url" => ""));
			die;
		}
	}

	public function checkotpCode()
	{
		$mobile = $_REQUEST['otpmobile'];
		$otpcode = $_REQUEST['otpcode'];
		$this->session->set_tempdata('userfullname', $_REQUEST['usernm']);
		$this->session->set_tempdata('usermobile', $mobile);

		$this->load->model('Site_General_Model');
		$response = $this->Site_General_Model->checkOTP($mobile, $otpcode);

		if ($response == true) {
			echo json_encode(array("success" => true, "message" => "OTP verification successful.", "mobile" => $mobile));
			die;
		} else {
			echo json_encode(array("success" => false, "message" => "OTP is invalid.", "mobile" => "#"));
			die;
		}
	}


	// START : PERSONAL LOAN FUNCTIONS
	public function personalLoan($step = 's1', $mobile = '')
	{
		$data = array();

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('digital-personal');

		if (isset($_REQUEST['fbclid'])) {
			set_cookie('fbclidpl', $_REQUEST['fbclid'], '3600');
			//$this->session->set_tempdata('fbclidpl', $_REQUEST['fbclid']);
		}

		if ($step == "s2" && $mobile != '') {
			$data = array(
				'fullname' => $this->session->tempdata('userfullname'),
				'mobile' => $mobile
			);
			$this->load->view('digital-personal-loan', ['meta' => $meta, 'processstep' => 'step2', 'userdetails' => $data]);
			return false;
		}
		if ($step == "s3" && $mobile != '') {
			if (!$this->session->tempdata('referraluser')) {
				$referralcode = $this->session->tempdata('referralcode');
			} else {
				$referralcode = '';
			}

			$data = array(
				'fullname' => $this->session->tempdata('userfullname'),
				'mobile' => $mobile,
				'referralcode' => $referralcode
			);
			$this->load->view('digital-personal-loan', ['meta' => $meta, 'processstep' => 'step3', 'userdetails' => $data]);
			return false;
		} else {
			$this->load->view('digital-personal-loan', ['meta' => $meta, 'processstep' => 'step1']);
		}
	}
	// END : PERSONAL LOAN FUNCTIONS


	// START : BUSINESS LOAN FUNCTIONS
	public function businessLoan($step = 's1', $mobile = '')
	{
		$data = array();

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('digital-business');

		if (isset($_REQUEST['fbclid'])) {
			set_cookie('fbclidpl', $_REQUEST['fbclid'], '3600');
			//$this->session->set_tempdata('fbclidpl', $_REQUEST['fbclid']);
		}

		if ($step == "s2" && $mobile != '') {
			$data = array(
				'fullname' => $this->session->tempdata('userfullname'),
				'mobile' => $mobile
			);
			$this->load->view('digital-business-loan', ['meta' => $meta, 'processstep' => 'step2', 'userdetails' => $data]);
			return false;
		}
		if ($step == "s3" && $mobile != '') {
			if (!$this->session->tempdata('referraluser')) {
				$referralcode = $this->session->tempdata('referralcode');
			} else {
				$referralcode = '';
			}

			$data = array(
				'fullname' => $this->session->tempdata('userfullname'),
				'mobile' => $mobile,
				'referralcode' => $referralcode
			);
			$this->load->view('digital-business-loan', ['meta' => $meta, 'processstep' => 'step3', 'userdetails' => $data]);
			return false;
		} else {
			$this->load->view('digital-business-loan', ['meta' => $meta, 'processstep' => 'step1']);
		}
	}
	// END : BUSINESS LOAN FUNCTIONS


	public function registeredUser()
	{
		$cardtype = $_REQUEST['loantype'];
		$mobile = $_REQUEST['usermobile'];
		$email = $_REQUEST['useremail'];
		$referralcode = $_REQUEST['referralcode'];

		$this->load->model('Site_Digital_Model');
		$usr_res = $this->Site_Digital_Model->checkuser($_REQUEST['usermobile']);

		if ($usr_res != '') {
			if ($usr_res->isUser == 2) {
				$returnUrl = base_url('/customer');
				echo json_encode(array("success" => false, "message" => "You are already a registered customer. Kindly login to customer panel. <a href='".$returnUrl."'>Click Here</a>", "mobile" => "", "redirect_url" => ""));
				die;
			} else {
				$key = stringCrypt($usr_res->id, 'encrypt');
				$redirect_url = site_url("digital/checkeligibility/" . $key);
				echo json_encode(array("success" => true, "message" => "Customer found.", "mobile" => "", "redirect_url" => $redirect_url));
				die;
			}
		}

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'update_date' => date('Y-m-d H:i:s'),
			'fullname' => $_REQUEST['username'],
			'mobile' => $mobile,
			'email' => $email,
			'cardtype' => $cardtype,
			'usertype' => $_REQUEST['usertype'],
			'isUser' => 1,
			'isDelete' => 0
		);

		$this->load->model('Site_Digital_Model');
		$userid = $this->Site_Digital_Model->userregistration($data);

		if ($userid != 0) {
			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'userid' => $userid,
				'loanamount' => $_REQUEST['loanamount'],
				'loantype' => $_REQUEST['loantype'],
				'isDelete' => 0
			);

			$this->load->model('Site_Digital_Model');
			$applyid = $this->Site_Digital_Model->userapplication($data1);

			if ($referralcode != '') {
				$this->load->model('Site_Digital_Model');
				$referral = $this->Site_Digital_Model->getreferraluserid($referralcode);

				$data2 = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'refferaltype' => 1,
					'refferaluserid' => $referral->id,
					'subuserid' => $userid
				);
				$response = $this->Site_Digital_Model->referraluserentry($data2);
			}

			$offerresponse = $this->Site_Digital_Model->sendProcessMessage($cardtype, $mobile, $email);

			$key = stringCrypt($applyid, 'encrypt');
			$redirect_url = site_url("digital/checkeligibility/" . $key);

			echo json_encode(array("success" => true, "message" => "Customer registration successful.", "redirect_url" => $redirect_url));
			die;
		} else {
			echo json_encode(array("success" => false, "message" => "Ops. Something goes wrong.", "redirect_url" => "#"));
			die;
		}
	}

	public function checkeligibility($key = '')
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('digital-personal');

		$applyid = stringCrypt($key, 'decrypt');

		$this->load->model('Site_Digital_Model');
		$userdate = $this->Site_Digital_Model->checkuserdata($applyid);

		if ($userdate == NULL) {
			redirect('digital/personalLoan');
			die;
		} else if ($userdate->isUser == 2) {
			redirect('digital/personalLoan');
			die;
		} else {
			$loanname = ($userdate->loantype == 12) ? "Business Loan" : "Personal Loan";

			$data = array(
				'applyid' => $applyid,
				'userid' => $userdate->userid,
				'fullname' => $userdate->fullname,
				'mobile' => $userdate->mobile,
				'email' => $userdate->email,
				'loanamount' => $userdate->loanamount,
				'loantype' => $userdate->loantype,
				'loanname' => $loanname,
				'cardtype' => $userdate->cardtype
			);

			$this->load->view('digital-eligibility', ['meta' => $meta, 'userdetails' => $data]);
		}
	}

	public function preapproval($key = '')
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('digital-personal');
		$banklist = $this->Site_Info_Model->getbanklist(12);

		$applyid = stringCrypt($key, 'decrypt');

		$this->load->model('Site_Digital_Model');
		$userdate = $this->Site_Digital_Model->checkuserdata($applyid);

		if ($userdate == NULL) {
			redirect('digital/personalLoan');
			die;
		} else if ($userdate->isUser == 2) {
			redirect('digital/personalLoan');
			die;
		} else {
			$loanname = ($userdate->loantype == 12) ? "Business Loan" : "Personal Loan";
			$apr = ($userdate->loantype == 12) ? 10 : 10.50;
			$stramt = ($userdate->loantype == 12) ? 1860 : 1878;

			$data = array(
				'applyid' => $applyid,
				'userid' => $userdate->userid,
				'fullname' => $userdate->fullname,
				'mobile' => $userdate->mobile,
				'email' => $userdate->email,
				'loantype' => $userdate->loantype,
				'loanname' => $loanname,
				'loanamount' => $userdate->loanamount,
				'income' => $userdate->income,
				'currentemi' => $userdate->currentemi,
				'cardtype' => $userdate->cardtype,
				'apr' => $apr,
				'stramt' => $stramt
			);

			$this->load->model('Site_Info_Model');
			$roipackages = $this->Site_Info_Model->getroipackages($userdate->loantype);
			$roicachefile = $userdate->loantype . $userdate->mobile;

			if ($this->cache->file->get($roicachefile)) {
				$cache_data = $this->cache->file->get($roicachefile);
				$roipackages = $cache_data["roiuser_data"];
			} else {
				$cache_data = array();
				$cache_data["roiuser_data"] = $roipackages;
				$this->cache->file->save($roicachefile, $cache_data, 2592000);
			}

			$this->load->view('digital-pre-approval', ['meta' => $meta, 'userdetails' => $data, 'banklist' => $banklist, 'roipackages' => $roipackages]);
		}
	}

	public function membershiporder($key = '')
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('digital-personal');
		$testimoniallist = $this->Site_Info_Model->gettestimoniallist(2);
		$banklist = $this->Site_Info_Model->getbanklist();

		$applyid = stringCrypt($key, 'decrypt');

		$this->load->model('Site_Digital_Model');
		$userdate = $this->Site_Digital_Model->checkuserdata($applyid);

		if ($userdate == NULL) {
			redirect('digital/personalLoan');
			die;
		} else if ($userdate->isUser == 2) {
			redirect('digital/personalLoan');
			die;
		} else {
			$loanname = ($userdate->loantype == 12) ? "Business Loan" : "Personal Loan";
			$productslug = ($userdate->cardtype == 12) ? "digital-business-loan" : "digital-personal-loan";
			$cardname = ($userdate->cardtype == 12) ? "Diamond" : "Gold";

			$apr = ($userdate->loantype == 12) ? 10 : 10.50;
			$stramt = ($userdate->loantype == 12) ? 1860 : 1878;

			$prores = $this->Site_Info_Model->getproductdetails($productslug);
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

			$data = array(
				'applyid' => $applyid,
				'userid' => $userdate->userid,
				'fullname' => $userdate->fullname,
				'mobile' => $userdate->mobile,
				'email' => $userdate->email,
				'loantype' => $userdate->loantype,
				'loanname' => $loanname,
				'loanamount' => $userdate->loanamount,
				'income' => $userdate->income,
				'currentemi' => $userdate->currentemi,
				'cardname' => $cardname,
				'cardtype' => $userdate->cardtype,
				'apr' => $apr,
				'stramt' => $stramt
			);

			$this->load->view('digital-membership-card', ['meta' => $meta, 'userdetails' => $data, 'productdata' => $productdata, 'banklist' => $banklist, 'testimoniallist' => $testimoniallist]);
		}
	}

	public function userApply()
	{
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'cibilscore' => $_REQUEST['cibilscore'],
			'loanpurpose' => $_REQUEST['loanpurpose'],
			'income' => $_REQUEST['monincome'],
			'currentemi' => $_REQUEST['monemi']
		);

		$this->load->model('Site_Digital_Model');
		$response = $this->Site_Digital_Model->updateapplication($_REQUEST['applyid'], $data);

		$data1 = array(
			'update_date' => date('Y-m-d H:i:s'),
			'city' => $_REQUEST['city'],
			'state' => $_REQUEST['state']
		);
		$response1 = $this->Site_Digital_Model->updateregistration($_REQUEST['userid'], $data1);

		$userdata = $this->Site_Digital_Model->checkuserdata($_REQUEST['applyid']);

		$key = stringCrypt($_REQUEST['applyid'], 'encrypt');
		redirect("digital/preapproval/" . $key);
	}

	public function getpreApproval()
	{
		$this->load->model('Site_Digital_Model');

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'loantenure' => $_REQUEST['tenure']
		);
		$response = $this->Site_Digital_Model->updateapplication($_REQUEST['applyid'], $data);

		$data1 = array(
			'update_date' => date('Y-m-d H:i:s'),
			'city' => $_REQUEST['city'],
			'state' => $_REQUEST['state'],
			'process_step' => 2
		);
		$response1 = $this->Site_Digital_Model->updateregistration($_REQUEST['userid'], $data1);
		$userdata = $this->Site_Digital_Model->checkuserdata($_REQUEST['applyid']);
		
		$apr = ($userdata->loantype == 12) ? 11.5 : 12.5;
		$eligibilityamt = calEligiblity($userdata->income, $userdata->currentemi, $apr, $userdata->loanamount);

		$offerresponse = $this->Site_Digital_Model->sendOfferMessage($userdata->loantype, $eligibilityamt, $userdata->mobile, $userdata->email);

		$data2 = array(
			'phoneNumber' => $userdata->mobile,
			'countryCode' => '+91',
			'traits' => array(
			 'name' => $userdata->fullname
			),
			'tags' => array('Get Offer')
		);
		$this->load->helper('interakt');
		$restrack1 = user_track($data2);
		
		$data3 = array(
			'phoneNumber' => $userdata->mobile,
			'countryCode' => '+91',
			'event' => 'Get Offer',
			'traits' => array(
			 	'EligibleAmount' => $eligibilityamt
			)
		);
		$restrack2 = event_track($data3);
		$intekt_get_offer_name = $this->Site_Info_Model->getsmsmessage('intekt_get_offer_name');
		// Whatsapp INTERAKT Code
		$data4 = array(
			"fullPhoneNumber" => '+91'.$userdata->mobile,
			"callbackData"=> "some text here",
			"type"=> "Template",
			"template"=> array(
					"name"=> $intekt_get_offer_name,//28aug_get
					"languageCode"=> "en",
					"headerValues" => array(
						"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/90a30b78-f3eb-4f1d-bef4-99e7bb5d20bc/message_template_media/KfRJpcJv0YM0/prayosha_10jan.jpg?se=2030-01-04T10%3A44%3A28Z&sp=rt&sv=2019-12-12&sr=b&sig=c9oWEzIoqxYXpM9HjPr%2BdmTDEdLT%2BWJS02txiHA7HLM%3D"
					),
					"bodyValues"=> array(
						$userdata->fullname, $eligibilityamt
					),
				)
		
		 );
		$restrack4 = interakt_track($data4);

		$key = stringCrypt($_REQUEST['applyid'], 'encrypt');
		redirect("digital/membershiporder/" . $key);
	}

	public function checkoutDigital()
	{
		$this->load->model('Site_Digital_Model');
		$userdata = $this->Site_Digital_Model->checkuserdata($_REQUEST['applyid']);
		$this->session->set_tempdata('applyid', $_REQUEST['applyid']);
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
		$orderid = number_format(microtime(true) * 1000, 0, '.', '');
		$returnUrl = base_url('digital/buycardDigital');

		$datastring = WORLDLINE_MERCHANT_CODE . "|" . $orderid . "|" . $grandamount . "||" . $userdata->userid . "|" . $userdata->mobile . "|" . $userdata->email . "||||||||||" . WORLDLINE_KEY_SALT;

		$hashed = hash('sha512', $datastring);

		$postData = array(
			"hash" => $hashed,
			"data" => array(
				WORLDLINE_MERCHANT_CODE,
				$orderid,
				$grandamount,
				'',
				'',
				'',
				'',
				'',
				$userdata->userid,
				$userdata->mobile,
				$userdata->email,
				'',
				$returnUrl,
				$userdata->fullname,
				WORLDLINE_SCHEME_CODE,
				'INR',
				'',
				'',
				''
			)
		);

		$worldlinedata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => $userdata->cardtype,
			'userid' => $userdata->userid,
			'orderid' => $orderid,
			'orderamount' => $grandamount,
			'ordernote' => $productdata->productname
		);

		$this->load->model('Site_Digital_Model');
		$worldlinedata = $this->Site_Digital_Model->worldlineentry($worldlinedata);

		echo json_encode($postData);
	}

	public function buycardDigital()
	{
		$grandtotal = $netamount = $cgstamount = $sgstamount = $igstamount = 0;

		if ($_POST) {
			$response_msg = explode("|", $_POST['msg']);

			$this->load->model('Site_Digital_Model');
			$paymentdata = $this->Site_Digital_Model->getworldlineentry($response_msg[3]);

			$worldlinedata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'referenceid' => $response_msg[5],
				'txstatus' => $response_msg[1],
				'paymentmode' => ''
			);

			$response1 = $this->Site_Digital_Model->updateworldlineentry($paymentdata->id, $worldlinedata);
			$userdata = $this->Site_Digital_Model->checkuserregdata($paymentdata->userid);

			$this->session->set_tempdata('applyid', $userdata->id, 3600);


			if ($response_msg[0] == '0300') {
				$isentry = $this->Site_Digital_Model->checkmembershipentry($response_msg[5]);

				if ($isentry == 0) {
					$cardno = random_code(16);

					$mbrdata = array(
						'rec_date' => date('Y-m-d H:i:s'),
						'userid' => $userdata->userid,
						'registration_date' => date('Y-m-d'),
						'expiry_date' => date('Y-m-d', strtotime('+3 months')),
						'card_number' => $cardno,
						'amount' => $response_msg[6],
						'paymentid' => $response_msg[5],
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
						'process_step' => 4,
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

					if ($response2 == "true") {
						$sent = $this->Site_Digital_Model->sendSuccessGreetings($userdata->mobile, $userdata->email, $password);
					}

					return redirect("digital/paymentResponse/" . $paymentdata->entryfor . "/" . $response2);
				} else {
					return redirect("digital/paymentResponse/" . $paymentdata->entryfor . "/false");
				}
			} else {
				return redirect("digital/paymentResponse/" . $paymentdata->entryfor . "/false");
			}
		} else {
			return redirect("digital/paymentResponse/11/false");
		}
	}

	public function paymentResponse($loantype = '', $status = '')
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('digital-personal');

		$fbclidpl = "";

		$data = array(
			'loantype' => $loantype,
			'status' => $status
		);

		if ($status != '') {
			if ($status == "true" && $this->session->tempdata('applyid') != "") {
				$this->load->model('Site_Digital_Model');
				$userdata = $this->Site_Digital_Model->checkuserdata($this->session->tempdata('applyid'));

				$firstname = strtok($userdata->fullname, " ");
				$city = strtolower(preg_replace("/[^a-zA-Z]+/", "", $userdata->city));
				$state = strtolower(getStateAbbreviation($userdata->state));
				$orderid = "MC" . date('md') . random_code(4);

				$fbdata = array(
					'firstname' => $firstname,
					'mobile' => "91" . $userdata->mobile,
					'email' => $userdata->email,
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

				$this->load->view('payment-response', ['meta' => $meta, 'responsedata' => $data]);
			} else if ($status == "false" && $this->session->tempdata('applyid') != "") {
				$applyid = $this->session->tempdata('applyid');

				if ($applyid > 0) {
					$this->load->model('Site_Digital_Model');
					$userdata = $this->Site_Digital_Model->checkuserdata($applyid);

					//$sent = $this->Site_Digital_Model->sendPaymentFailedGreetings($userdata->mobile, $userdata->email);
				}

				$this->load->view('payment-response', ['meta' => $meta, 'responsedata' => $data]);
			} else {
				$this->load->view('payment-response', ['meta' => $meta, 'responsedata' => $data]);
			}
		} else {
			redirect('digital/personalLoan');
		}
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Plan extends CI_Controller
{

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
			redirect('plan/personalLoan');
		}
	}

	public function bl($referralcode)
	{
		if (!$referralcode) {
			return redirect()->to('Infopage');
		} else {
			$this->session->set_tempdata('referralcode', $referralcode);
			redirect('plan/businessLoan');
		}
	}

	public function sendotpCode()
	{
		if ($_REQUEST['loanamount'] != "" && $_REQUEST['mobile'] != "") {
			$loanamount = $_REQUEST['loanamount'];
			$mobile = $_REQUEST['mobile'];

			$this->load->model('Site_Plan_Model');
			$data = $this->Site_Plan_Model->checkuser($mobile);

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
					$response1 = $this->Site_Plan_Model->updateregistration($data->userid, $data1);

					switch ($data->process_step) {
						case '3':
							$redirect_url = site_url("plan/membershiporder/" . $key);
							break;

						case '2':
							$redirect_url = site_url("plan/preapproval/" . $key);
							break;

						default:
							$redirect_url = site_url("plan/checkeligibility/" . $key);
							break;
					}

					/* $redirect_url = site_url("plan/checkeligibility/".$key); */

					echo json_encode(array("success" => true, "message" => "Customer found.", "mobile" => "", "redirect_url" => $redirect_url));
					die;
				}
			} else {
				$this->session->set_tempdata('loanamount', $loanamount);
				$this->session->set_tempdata('usermobile', $mobile);

				$this->load->model('Site_General_Model');
				$countsms = $this->Site_General_Model->countotpentry($mobile);

				if ($countsms < 5) {
					$response = $this->Site_General_Model->generateotp($mobile, '', 'plan');
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
			echo json_encode(array("success" => false, "message" => "Customer loan amount and mobile number is mendatory.", "mobile" => "", "redirect_url" => ""));
			die;
		}
	}

	public function resendotpCode()
	{
		if ($_REQUEST['loanamount'] != "" && $_REQUEST['mobile'] != "") {
			$loanamount = $_REQUEST['loanamount'];
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
			echo json_encode(array("success" => false, "message" => "Customer loan amount and mobile number is mendatory.", "mobile" => "", "redirect_url" => ""));
			die;
		}
	}

	public function checkotpCode()
	{
		$mobile = $_REQUEST['otpmobile'];
		$otpcode = $_REQUEST['otpcode'];
		$this->session->set_tempdata('loanamount', $_REQUEST['loanamount']);
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
	public function privylege_finance($step = 's1', $mobile = '')
	{
		$data = array();

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('privylege-small-finance');
		$banklist = $this->Site_Info_Model->getbanklist(12);

		if ($this->session->tempdata('loanamount') == TRUE) {
			$loanamount = $this->session->tempdata('loanamount');
		} else {
			$loanamount = '';
		}

		if (isset($_REQUEST['fbclid'])) {
			set_cookie('fbclidpl', $_REQUEST['fbclid'], '3600');
			//$this->session->set_tempdata('fbclidpl', $_REQUEST['fbclid']);
		}

		if ($step == "s2" && $mobile != '') {
			$data = array(
				'loanamount' => $loanamount,
				'mobile' => $mobile
			);
			$this->load->view('privylege-finance', ['meta' => $meta, 'processstep' => 'step2', 'userdetails' => $data, 'banklist'=>$banklist]);
			return false;
		}
		if ($step == "s3" && $mobile != '') {
			if (!$this->session->tempdata('referraluser')) {
				$referralcode = $this->session->tempdata('referralcode');
			} else {
				$referralcode = '';
			}

			$data = array(
				'loanamount' => $loanamount,
				'mobile' => $mobile,
				'referralcode' => $referralcode
			);
			$this->load->view('privylege-finance', ['meta' => $meta, 'processstep' => 'step3', 'userdetails' => $data, 'banklist'=>$banklist]);
			return false;
		} else {
			$this->load->view('privylege-finance', ['meta' => $meta, 'processstep' => 'step1', 'banklist' => $banklist]);
		}
	}
	// END : PERSONAL LOAN FUNCTIONS


	// START : BUSINESS LOAN FUNCTIONS
	public function businessLoan($step = 's1', $mobile = '')
	{
		$data = array();

		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('privylege-small-finance');
		$banklist = $this->Site_Info_Model->getbanklist(12);

		if ($this->session->tempdata('loanamount') == TRUE) {
			$loanamount = $this->session->tempdata('loanamount');
		} else {
			$loanamount = '';
		}
		
		if (isset($_REQUEST['fbclid'])) {
			set_cookie('fbclidpl', $_REQUEST['fbclid'], '3600');
			//$this->session->set_tempdata('fbclidpl', $_REQUEST['fbclid']);
		}

		if ($step == "s2" && $mobile != '') {
			$data = array(
				'loanamount' => $loanamount,
				'mobile' => $mobile
			);
			$this->load->view('plan-business-loan', ['meta' => $meta, 'processstep' => 'step2', 'userdetails' => $data]);
			return false;
		}
		if ($step == "s3" && $mobile != '') {
			if (!$this->session->tempdata('referraluser')) {
				$referralcode = $this->session->tempdata('referralcode');
			} else {
				$referralcode = '';
			}

			$data = array(
				'loanamount' => $loanamount,
				'mobile' => $mobile,
				'referralcode' => $referralcode
			);
			$this->load->view('plan-business-loan', ['meta' => $meta, 'processstep' => 'step3', 'userdetails' => $data]);
			return false;
		} else {
			$this->load->view('plan-business-loan', ['meta' => $meta, 'processstep' => 'step1', 'banklist' => $banklist]);
		}
	}
	// END : BUSINESS LOAN FUNCTIONS


	public function registeredUser()
	{
		$cardtype = $_REQUEST['loantype'];
		$mobile = $_REQUEST['usermobile'];
		$email = $_REQUEST['useremail'];
		$loanamount = $_REQUEST['loanamount'];
		$referralcode = $_REQUEST['referralcode'];

		$this->load->model('Site_Plan_Model');
		$usr_res = $this->Site_Plan_Model->checkuser($_REQUEST['usermobile']);

		if ($usr_res != '') {
			if ($usr_res->isUser == 2) {
				$returnUrl = base_url('/customer');
				echo json_encode(array("success" => false, "message" => "You are already a registered customer. Kindly login to customer panel. <a href='" . $returnUrl . "'>Click Here</a>", "mobile" => "", "redirect_url" => ""));
				die;
			} else {
				$key = stringCrypt($usr_res->id, 'encrypt');
				$redirect_url = site_url("plan/checkeligibility/" . $key);
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
			'process_step' => 1,
			'isUser' => 1,
			'isDelete' => 0
		);

		$this->load->model('Site_Plan_Model');
		$userid = $this->Site_Plan_Model->userregistration($data);

		if ($userid != 0) {
			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'userid' => $userid,
				'loanamount' => $_REQUEST['loanamount'],
				'loantype' => $_REQUEST['loantype'],
				'isDelete' => 0
			);

			$this->load->model('Site_Plan_Model');
			$applyid = $this->Site_Plan_Model->userapplication($data1);

			if ($referralcode != '') {
				$this->load->model('Site_Plan_Model');
				$referral = $this->Site_Plan_Model->getreferraluserid($referralcode);

				$data2 = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'refferaltype' => 1,
					'refferaluserid' => $referral->id,
					'subuserid' => $userid
				);
				$response = $this->Site_Plan_Model->referraluserentry($data2);
			}

			$offerresponse = $this->Site_Plan_Model->sendProcessMessage($cardtype, $mobile, $email);

			$key = stringCrypt($applyid, 'encrypt');
			$redirect_url = site_url("plan/checkeligibility/" . $key);

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
		$meta = $this->Site_Info_Model->getmetakeywords('privylege-small-finance');

		$applyid = stringCrypt($key, 'decrypt');
		$this->session->set_tempdata('applyid', $applyid, 3600);
		$this->session->set_tempdata('companyemail', COMPANY_EMAIL, 3600);

		$this->load->model('Site_Plan_Model');
		$userdate = $this->Site_Plan_Model->checkuserdata($applyid);

		if ($userdate == NULL) {
			redirect('plan/privylege_finance');
			die;
		} else if ($userdate->isUser == 2) {
			redirect('plan/personalLoan');
			die;
		} else {
			$loanname = ($userdate->loantype == 22) ? "Plan Business Loan" : "Plan Personal Loan";

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

			$this->load->view('plan-eligibility', ['meta' => $meta, 'userdetails' => $data]);
		}
	}

	public function preapproval($key = '')
	{
		
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('privylege-small-finance');
		$banklist = $this->Site_Info_Model->getbanklist();
					
		$applyid = stringCrypt($key, 'decrypt');
		$this->session->set_tempdata('applyid', $applyid, 3600);
		$this->session->set_tempdata('companyemail', COMPANY_EMAIL, 3600);

		$this->load->model('Site_Plan_Model');
		$userdate = $this->Site_Plan_Model->checkuserdata($applyid);
		if ($userdate == NULL) {
			redirect('plan/personalLoan');
			die;
		} else if ($userdate->isUser == 2) {
			redirect('plan/personalLoan');
			die;
		} else {
			$loanname = ($userdate->loantype == 22) ? "Plan Business Loan" : "Plan Personal Loan";
			$apr = ($userdate->loantype == 22) ? 10 : 10.50;
			$stramt = ($userdate->loantype == 22) ? 1860 : 1878;

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

			$this->load->view('plan-pre-approval', ['meta' => $meta, 'userdetails' => $data, 'banklist' => $banklist, 'roipackages' => $roipackages]);
		}
	}

	public function membershiporder($key = '')
	{
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('privylege-small-finance');
		$testimoniallist = $this->Site_Info_Model->gettestimoniallist(2);
		$banklist = $this->Site_Info_Model->getbanklist(12);

		$applyid = stringCrypt($key, 'decrypt');
		$this->session->set_tempdata('applyid', $applyid, 3600);
		$this->session->set_tempdata('companyemail', COMPANY_EMAIL, 3600);

		$this->load->model('Site_Plan_Model');
		$userdate = $this->Site_Plan_Model->checkuserdata($applyid);

		if ($userdate == NULL) {
			redirect('plan/personalLoan');
			die;
		} else if ($userdate->isUser == 2) {
			redirect('plan/personalLoan');
			die;
		} else {
			$this->session->set_tempdata('applyid', $applyid, 3600);
			$loanname = ($userdate->loantype == 22) ? "Plan Business Loan" : "Plan Personal Loan";
			$productslug = "privylege-small-finance";
			$cardname = "Privylege Finance";

			$apr = ($userdate->loantype == 22) ? 10 : 10.5;
			$stramt = ($userdate->loantype == 22) ? 1600 : 1853;

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

			$userdata = array(
				'applyid' => $applyid,
				'userid' => $userdate->userid,
				'fullname' => $userdate->fullname,
				'mobile' => $userdate->mobile,
				'email' => $userdate->email,
				'loantype' => $userdate->loantype,
				'loanname' => $loanname,
				'cardname' => $cardname,
				'cardtype' => $userdate->cardtype,
				'loanamount' => $userdate->loanamount,
				'income' => $userdate->income,
				'currentemi' => $userdate->currentemi,
				'cardname' => $cardname,
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

			$this->load->view('plan-membership-card', ['meta' => $meta, 'userdetails' => $userdata, 'productdata' => $productdata, 'banklist' => $banklist, 'roipackages' => $roipackages]);
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

	public function userApply()
	{
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'cibilscore' => $_REQUEST['cibilscore'],
			'loanpurpose' => $_REQUEST['loanpurpose'],
			'income' => $_REQUEST['monincome'],
			'currentemi' => $_REQUEST['monemi']
		);

		$this->load->model('Site_Plan_Model');
		$response = $this->Site_Plan_Model->updateapplication($_REQUEST['applyid'], $data);

		$data1 = array(
			'update_date' => date('Y-m-d H:i:s'),
			'pincode' => $_REQUEST['pincode'],
			'city' => $_REQUEST['city'],
			'state' => $_REQUEST['state'],
			'process_step' => 2
		);
		$response1 = $this->Site_Plan_Model->updateregistration($_REQUEST['userid'], $data1);

		$userdata = $this->Site_Plan_Model->checkuserdata($_REQUEST['applyid']);

		$key = stringCrypt($_REQUEST['applyid'], 'encrypt');
		redirect("plan/preapproval/" . $key);
		// die;
	}

	public function getpreApproval()
	{
		$this->load->model('Site_Plan_Model');
		$userdata = $this->Site_Plan_Model->checkuserdata($_REQUEST['applyid']);

		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'loantenure' => $_REQUEST['tenure']
		);
		$response = $this->Site_Plan_Model->updateapplication($_REQUEST['applyid'], $data);

		$data1 = array(
			'update_date' => date('Y-m-d H:i:s'),
			'process_step' => 3
		);
		$response1 = $this->Site_Plan_Model->updateregistration($userdata->userid, $data1);

		$apr = ($userdata->loantype == 22) ? 11.5 : 12.5;
		$eligibilityamt = calEligiblity($userdata->income, $userdata->currentemi, $apr, $userdata->loanamount);

		$offerresponse = $this->Site_Plan_Model->sendOfferMessage($userdata->loantype, $eligibilityamt, $userdata->mobile, $userdata->email);

		$this->load->helper('interakt');
		 $data2 = array(
		 	'phoneNumber' => $userdata->mobile,
		 	'countryCode' => '+91',
		 	'traits' => array(
		 		'name' => $userdata->fullname
		 	),
		 	'tags' => array('Get Offer')
		 );
		
		 $restrack2 = plan_user_track_ue($data2);

		 $data3 = array(
		 	'phoneNumber' => $userdata->mobile,
		 	'countryCode' => '+91',
		 	'event' => 'Get Offer',
		 	'traits' => array(
		 		'EligibleAmount' => $eligibilityamt
		 	)
		 );
		 $restrack3 = plan_event_track_ue($data3);

		$key = stringCrypt($_REQUEST['applyid'], 'encrypt');
		redirect("plan/membershiporder/" . $key);
	}

	public function checkoutDigital()
	{

		$this->load->model('Site_Plan_Model');
		$userdata = $this->Site_Plan_Model->checkuserdata($_REQUEST['applyid']);
		$this->session->set_tempdata('applyid', $_REQUEST['applyid']);
		$key = stringCrypt($_REQUEST['applyid'], 'encrypt');

		$data3 = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'status' => 1,
			'isDelete' => 0
		);
		$response3 = $this->Site_Plan_Model->updateapplication($_REQUEST['applyid'], $data3);

		$productslug = "privylege-small-finance";

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

		$returnUrl = base_url('plan/buycardDigital');
		$url = "https://api.zaakpay.com/api/paymentTransact/V8";

		$firstname = ($userdata->fullname != "") ? $userdata->fullname : $userdata->email;
		$postData = array(
			"merchantIdentifier" => ZAAKPAY_MERCHANT_IDENTIFIER,
			"orderId" => $orderid,
			"returnUrl" => $returnUrl,
			"currency" => 'INR',
			"amount" => $grandamount * 100,
			"buyerEmail" => $userdata->email,
			"buyerFirstName" => $firstname,
			"buyerPhoneNumber" => $userdata->mobile,
			"buyerCountry" => 'India',
			"productDescription" => $productdata->productname
		);

		ksort($postData);
		$checksumData = "";
		foreach ($postData as $key => $value) {
			$checksumData .= $key . '=' . $value . '&';
		}

		$checksum = hash_hmac('sha256', $checksumData, ZAAKPAY_SECRET_KEY);

		$zaakpaydata = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'entryfor' => $userdata->cardtype,
			'userid' => $userdata->userid,
			'orderid' => $orderid,
			'orderamount' => $grandamount,
			'ordernote' => $productdata->productname
		);

		$this->load->model('Site_Plan_Model');
		$response = $this->Site_Plan_Model->zaakpayentry($zaakpaydata);

		$this->load->view('zaakpay-checkout', ['postData' => $postData, 'checksum' => $checksum, 'url' => $url]);
	}

	public function buycardDigital()
	{
		
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
		$this->load->model('Site_Plan_Model');
		$paymentdata = $this->Site_Plan_Model->getzaakpayentry($orderId);

		$checksum = hash_hmac('sha256', $checksumData, ZAAKPAY_SECRET_KEY);
		
		$userdata = $this->Site_Plan_Model->checkuserregdata($paymentdata->userid);
		log_message('error', 'applyid userdata main 11 -- '. json_encode($userdata));
		$this->session->set_tempdata('applyid', $userdata->userid);
		if ($checksum == $recd_checksum) {
			
			$zaakpaydata = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'orderamount' => $orderAmount,
				'statuscode' => $responseCode,
				'transactionid' => $txnId,
				'paymentmode' => $paymentMode
			);

			$response1 = $this->Site_Plan_Model->updatezaakpayentry($paymentdata->id, $zaakpaydata);

			if ($responseCode == 100 || $responseCode == 208 || $responseCode == 601) {
				
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
				$memberid = $this->Site_Plan_Model->planorder($mbrdata);

				$password = random_code(6);
				$this->session->set_tempdata('userpass', $password);
				$passwordkey = stringCrypt($password, 'encrypt');
				$refcode = strtolower(substr(str_replace(" ", "", $userdata->fullname), 0, 3));
				$refcode .= substr($userdata->mobile, -4);

				$regdata = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'update_date' => date('Y-m-d H:i:s'),
					'password' => $passwordkey,
					'refcode' => $refcode,
					'process_step' => 4,
					'isUser' => 2
				);
				$response2 = $this->Site_Plan_Model->updateregistration($userdata->userid, $regdata);

				$this->load->model('Site_Info_Model');
				$invoiceno = $this->Site_Info_Model->getinvoiceno();

				if ($userdata->cardtype == 22) {
					$productslug = "privylege-small-finance";
					$invfor = 5;
					$invprefix = "PFBL_";
				} else {
					$productslug = "privylege-small-finance";
					$invfor = 4;
					$invprefix = "PFPL_";
				}

				$this->load->model('Site_Info_Model');
				$productdata = $this->Site_Info_Model->getproductdetails($productslug);
				$netamount = ($productdata->inOffer == 1) ? $productdata->offeramount : $productdata->amount;

				if ($userdata->state == 'Gujarat') {
					$cgstamount = $netamount * 0.09;
					$sgstamount = $netamount * 0.09;
				} else {
					$igstamount = $netamount * 0.18;
				}

				$grandtotal = $netamount + $cgstamount + $sgstamount + $igstamount;

				$invdata3 = array(
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

				$responseinvoice = $this->Site_Plan_Model->generateinvoice($invdata3, $invoiceno);

				$remote_data = array(
					'company_code' => COMPANY_CODE,
					'company_local_ip' => LOCAL_IP,
					'product_code' => 'plan',
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

				$this->load->model('Site_Info_Model');
				

				$sent = $this->Site_Plan_Model->sendSuccessGreetings($userdata->mobile, $userdata->email, $password);

				return redirect("plan/paymentResponse/" . $paymentdata->entryfor . "/" . $response2);
				die;
			} else {
				return redirect("plan/paymentResponse/21/false");
			}
		} else {
			return redirect("plan/paymentResponse/21/false");
		}
	}

	public function paymentResponse($loantype = '', $status = '')
	{
		
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('privylege-small-finance');

		$fbclidpl = "";
		
		$applyid = $this->session->tempdata('applyid');
		
		//$apr = ($userdata->loantype == 22) ? 11.5 : 12.5;
		//$eligibilityamt = calEligiblity($userdata->income, $userdata->currentemi, $apr, $userdata->loanamount);

		$data = array(
			'loantype' => $loantype,
			//'username' => $userdata->fullname,
			//'preamount' => $eligibilityamt,
			'status' => $status
		);
		if ($status != '') {
			$this->load->model('Site_Plan_Model');
			$userdata = $this->Site_Plan_Model->checkuserregdata($this->session->tempdata('applyid'));	
			if ($status == "true" && $this->session->tempdata('applyid') != "") {

				$firstname = strtok($userdata->fullname, " ");
				$city = strtolower(preg_replace("/[^a-zA-Z]+/", "", $userdata->city));
				$state = strtolower(getStateAbbreviation($userdata->state));
				$orderid = "MC" . date('md') . random_code(4);

				$fbdata = array(
					'version' => 'v21.0',
					'type' => 'plan',
					'userid' => $userdata->userid,
					'firstname' => $firstname,
					'mobile' => "91" . $userdata->mobile,
					'email' => $userdata->email,
					'city' => $city,
					'state' => $state,
					'orderid' => $orderid,
					'sourceurl' => base_url('/plan/paymentResponse/21/true')
				);

				if (get_cookie('fbclidpl') != "") {
					$fbclidpl = "fb.0." . round(microtime(true) * 1000) . "." . get_cookie('fbclidpl');
				}

				$fbdata['fbclid'] = $fbclidpl;

				$fbresponse = fbconversioncurl($fbdata);

				$this->load->model('Site_Info_Model');

				$this->load->helper('interakt');
				$data2 = array(
					'phoneNumber' => $userdata->mobile,
					'countryCode' => '+91',
					'traits' => array(
						'name' => $userdata->fullname
					),
					'tags' => array('Payment Successful')
				);
				
				$restrack2 = plan_user_track_ue($data2);
				log_message('error', 'applyid restrack2 main -- '. json_encode($restrack2));

				$data3 = array(
					'phoneNumber' => $userdata->mobile,
					'countryCode' => '+91',
					'event' => 'Payment Successful',
					'traits' => array(
						'userid' => $userdata->mobile,
						'userpass' => $this->session->tempdata('userpass')
					),
				);
				$restrack3 = plan_event_track_ue($data3);
				log_message('error', 'applyid restrack3 main -- '. json_encode($restrack3));
				
				
				$this->load->view('plan-payment-response', ['meta' => $meta, 'responsedata' => $data]);
			} else if ($status == "false" && $this->session->tempdata('applyid') != "") {
					$applyid = $this->session->tempdata('applyid');

					$this->load->model('Site_Plan_Model');
					$userdata = $this->Site_Plan_Model->checkuserdata($applyid);
					$sent = $this->Site_Plan_Model->sendPaymentFailedGreetings($userdata->mobile, $userdata->email);
				
				$this->load->view('plan-payment-response', ['meta' => $meta, 'responsedata' => $data]);
			} else {
				$this->load->view('plan-payment-response', ['meta' => $meta, 'responsedata' => $data]);
			}
		} else {
			redirect('plan/personalLoan');
		}
	}

}

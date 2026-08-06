<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Site extends MY_Controller
{

	function __construct() {
		parent::__construct();

		if (!$this->session->userdata('adminid')) {
			redirect('login');
		}
		$this->role = $this->session->userdata('admintype');
	}
	
	public function index() {
		redirect('dashboard');
	}

	public function newsletter() {
		$this->load->model('Manage_Site_Model');
		$subscribelist = $this->Manage_Site_Model->getnewsletterlist();
		$this->load->view('newsletter-subsciptions', ['subscribelist' => $subscribelist]);
	}

	public function substatus($statusid, $id) {
		$this->load->model('Manage_Site_Model');
		$this->Manage_Site_Model->changesubscription($statusid, $id);
		redirect('site/newsletter');
	}

	public function subscribedelete($id) {
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->deletesubscription($id);
		redirect('site/newsletter');
	}

	public function sitesettings() {
		$this->load->model('Manage_Site_Model');
		$sitedetails = $this->Manage_Site_Model->getsitesettings();
		$this->load->view('site-settings', ['sitedetails' => $sitedetails]);
	}

	public function editPage($pagename) {
		$this->load->model('Manage_Site_Model');
		$pagedetails = $this->Manage_Site_Model->getpagedetails($pagename);
		$this->load->view('page-edit', ['pagedetails' => $pagedetails]);
	}

	public function updatePage() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['content']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->editpage($_REQUEST['id'], $data);

		redirect('site/editPage/' . $_REQUEST['page']);
	}

	public function modelstatus($value) {
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatemodelstatus($value);

		redirect('site/sitesettings');
	}

	public function siteonhold($value) {
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesiteonhold($value);

		redirect('site/sitesettings');
	}

	public function siteonsuspended($value) {
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesiteonsuspended($value);

		redirect('site/sitesettings');
	}


	public function updatefbdomain() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['domainid']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'facebookdomain');

		redirect('site/sitesettings');
	}

	public function updatefbpixel() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['pixelid']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'facebookpixel');

		redirect('site/sitesettings');
	}
	
	public function updatefbaccesstoken() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['fbaccesstoken'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'fbaccesstoken');

		redirect('site/sitesettings');
	}

	public function updatefbeventname() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['fbeventname'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'fbeventname');

		redirect('site/sitesettings');
	}

	public function updatefbeventid() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['fbeventid'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'fbeventid');

		redirect('site/sitesettings');
	}

	public function updateplanfbpixel() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['planpixelid']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'plan_facebookpixel');

		redirect('site/sitesettings');
	}
	
	public function updateplanfbaccesstoken() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['planfbaccesstoken'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'plan_fbaccesstoken');

		redirect('site/sitesettings');
	}

	public function updateplanfbeventname() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['planfbeventname'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'plan_fbeventname');

		redirect('site/sitesettings');
	}

	public function updateplanfbeventid() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['planfbeventid'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'plan_fbeventid');

		redirect('site/sitesettings');
	}

	public function updatesmssenderid() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['senderid']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'smssenderid');

		redirect('site/sitesettings');
	}

	public function updateplansmssenderid() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['plansenderid']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'plansmssenderid');

		redirect('site/sitesettings');
	}

	public function updatewpcampmain() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['wpcampaignmain']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'wpcampaignmain');
		
		redirect('site/sitesettings');
	}

	public function updatewpcampmainoffer() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['wpcampaignoffer']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'wpcampaignoffer');
		
		redirect('site/sitesettings');
	}

	public function updatewpcampmainsuccess() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['wpcampaignsuccess']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'wpcampaignsuccess');
		
		redirect('site/sitesettings');
	}

	public function updatewpcampmainplan() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['wpcampaignmainplan']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'plan_wpcampaignmain');
		
		redirect('site/sitesettings');
	}

	public function updatewpcampmainofferplan() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['wpcampaignofferplan']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'plan_wpcampaignoffer');
		
		redirect('site/sitesettings');
	}

	public function updatewpcampmainsuccessplan() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['wpcampaignsuccessplan']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'plan_wpcampaignsuccess');
		
		redirect('site/sitesettings');
	}



	public function update_intkt_getoffer() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['intkt_getoffer']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'intekt_get_offer_name');
		
		redirect('site/sitesettings');
	}

	public function update_intktrm_offer() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['intkt_rm_offer']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'intekt_rm_offer_name');
		
		redirect('site/sitesettings');
	}

	public function update_intkt_usrpass() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['intkt_user_password']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'intkt_userwelcomename');
		
		redirect('site/sitesettings');
	}

	public function update_intkt_payment_success() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['intkt_payment_success']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'intkt_payment_success');
		
		redirect('site/sitesettings');
	}

	public function update_intkt_getoffer_plan() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['intkt_rm_offer_plan']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'intekt_get_offer_name_plan');
		
		redirect('site/sitesettings');
	}

	public function update_intktrm_offer_plan() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['intkt_rm_offer']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'intekt_rm_offer_name_plan');
		
		redirect('site/sitesettings');
	}

	public function update_intkt_usrpass_plan() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['intkt_user_password_plan']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'intkt_userwelcomename_plan');
		
		redirect('site/sitesettings');
	}

	public function update_intkt_payment_success_plan() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['intkt_payment_success_plan']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'intkt_payment_success_plan');
		
		redirect('site/sitesettings');
	}

	public function updatefbpixelwebinar() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => $_REQUEST['pixelidwebinar']
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatesitesettingdata($data, 'facebookpixel-webinar');

		redirect('site/sitesettings');
	}

	public function updatefbaccesstokenwebinar() { 
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['fbaccesstokenwebinar'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'fbaccesstokenwebinar');

		redirect('site/sitesettings');
	}

	public function updatefbeventnamewebinar() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['fbeventnamewebinar'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'fbeventnamewebinar');

		redirect('site/sitesettings');
	}

	public function updatefbeventidwebinar() {
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $_REQUEST['fbeventidwebinar'],
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->updatefacebookdata($data, 'fbeventidwebinar');

		redirect('site/sitesettings');
	}

	public function search() {
		$module = $mobile = "";
		$datalist = $response = array();

		$this->load->model('Manage_Site_Model');

		if (isset($_REQUEST['module']) && isset($_REQUEST['mobile'])) {
			$module = $_REQUEST['module'];
			$mobile = $_REQUEST['mobile'];

			switch ($module) {
				case 'customer':
					$response = $this->Manage_Site_Model->searchcustomer($mobile);
					if (!empty($response)) {
						$datalist = array(
						 'id' => $response->id,
						 'mobile' => $response->mobile,
						 'rec_date' => $response->rec_date,
						 'fullname' => $response->fullname,
						 'emailid' => $response->email,
						 'isuser' => $response->isUser
						);
					}
					break;
				case 'customerplan':
					$response = $this->Manage_Site_Model->plan_searchcustomer($mobile);
					if (!empty($response)) {
						$datalist = array(
						 'id' => $response->id,
						 'mobile' => $response->mobile,
						 'rec_date' => $response->rec_date,
						 'fullname' => $response->fullname,
						 'emailid' => $response->email,
						 'isuser' => $response->isUser
						);
					}
					break;

				case 'career':
					$response = $this->Manage_Site_Model->searchcareer($mobile);
					if (!empty($response)) {
						$datalist = array(
						 'id' => $response->id,
						 'mobile' => $response->mobile,
						 'rec_date' => $response->rec_date,
						 'fullname' => $response->firstname . " " . $response->lastname,
						 'emailid' => $response->email
						);
					}
					break;

				case 'bulksms':
					$response = $this->Manage_Site_Model->searchbulksms($mobile);
					if (!empty($response)) {
						$datalist = array(
						 'id' => $response->id,
						 'mobile' => $response->mobileno,
						 'rec_date' => $response->rec_date,
						 'fullname' => $response->fullname,
						 'emailid' => $response->emailid
						);
					}
					break;

				default:
					# code...
					break;
			}
		}

		$this->load->view('search', ['module' => $module, 'mobile' => $mobile, 'datalist' => $datalist]);
	}

	public function impupdate() {
		$this->load->model('Manage_Site_Model');
		$datalist = $this->Manage_Site_Model->getimpupdatelist();
		$this->load->view('imp-update', ['datalist' => $datalist]);
	}

	public function addNoteForm() {
		$this->load->view('imp-update-add');
	}

	public function addNoteData() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'tags' => $_REQUEST['tags'],
		 'descriptions' => $_REQUEST['descriptions'],
		 'isActive' => 1,
		 'isDelete' => 0
		);

		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->addimpupdate($data);

		redirect('site/impupdate');
	}

	public function impupdatestatus($statusid, $id) {
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->impupdatestatus($statusid, $id);
		redirect('site/impupdate');
	}

	public function deleteimpupdate($id) {
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->deleteimpupdate($id);
		redirect('site/impupdate');
	}

	public function accountmsg() {
		$this->load->model('Manage_Site_Model');
		$datalist = $this->Manage_Site_Model->getaccountmsg();
		$this->load->view('account-message', ['datalist' => $datalist]);
	}

	public function updateaccountmsg() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'option_value' => trim($_REQUEST['content'])
		);
		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->editaccountmsg($_REQUEST['id'], $data);

		redirect('site/accountmsg');
	}

	public function fileremarks() {
		$this->load->model('Manage_Site_Model');
		$datalist = $this->Manage_Site_Model->getfileremarkslist();
		$this->load->view('file-remarks', ['datalist' => $datalist]);
	}

	public function addRemarkForm() {
		$this->load->model('Manage_Site_Model');
		$statuslist = $this->Manage_Site_Model->getstatuslist();
		$this->load->view('file-remarks-add', ['statuslist' => $statuslist]);
	}

	public function addFileRemark() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'title' => $_REQUEST['title'],
		 'remarks' => $_REQUEST['remarks'],
		 'statusid' => $_REQUEST['statusid'],
		 'isDelete' => 0
		);

		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->addfileremark($data);

		redirect('site/fileremarks');
	}

	public function editRemarkForm($id) {
		$this->load->model('Manage_Site_Model');
		$remarkdetails = $this->Manage_Site_Model->getremarkdetails($id);
		$statuslist = $this->Manage_Site_Model->getstatuslist();
		$this->load->view('file-remarks-edit', ['remarkdetails' => $remarkdetails, 'statuslist' => $statuslist]);
	}

	public function editFileRemark() {
		$data = array(
		 'rec_date' => date('Y-m-d H:i:s'),
		 'title' => $_REQUEST['title'],
		 'remarks' => $_REQUEST['remarks'],
		 'statusid' => $_REQUEST['statusid']
		);

		$this->load->model('Manage_Site_Model');
		$response = $this->Manage_Site_Model->editfileremark($_REQUEST['id'], $data);

		redirect('site/fileremarks');
	}

	public function deletefileremark($id) {
		$this->load->model('Manage_Site_Model');
		$this->Manage_Site_Model->deleteremark($id);
		redirect('site/fileremarks');
	}

	public function restorefileremark($id) {
		$this->load->model('Manage_Site_Model');
		$this->Manage_Site_Model->restoreremark($id);
		redirect('site/fileremarks');
	}

	
	public function stafflist() {
		if ($this->role == 1) {
		  echo "<script>window.history.back();</script>";
		  exit;
		}
		$this->load->model('Manage_Site_Model');
		$datalist = $this->Manage_Site_Model->getstaffmemberlist();
		$this->load->view('staff-members', ['datalist' => $datalist]);
	}

	public function staffaddForm() {
		if ($this->role == 1) {
		  echo "<script>window.history.back();</script>";
		  exit;
		}
		$this->load->view('staff-members-add');
	}

   public function addStaffmember() {
		if ($this->role == 1) {
		  echo "<script>window.history.back();</script>";
		  exit;
		}
        // Load the model
        $this->load->model('Manage_Site_Model');
    
        // Check if passwords match
        if ($_REQUEST['newpassword'] == $_REQUEST['retypepassword']) {
            // Check if email already exists
            $email = $_REQUEST['emailid'];
            $existingUser = $this->Manage_Site_Model->getStaffByEmail($email);
    
            if ($existingUser) {
                echo json_encode(array("success" => false, "message" => "Email already exists. Please use a different email."));
                return;
            }
    
            // Proceed to add staff member
            $enc_password = encryptPassword($email, $_REQUEST['newpassword']);
    
            $data = array(
                'rec_date' => date('Y-m-d H:i:s'),
                'fullname' => $_REQUEST['fullname'],
                'mobile' => $_REQUEST['mobile'],
                'emailid' => $email,
                'password' => $enc_password,
                'role' => $_REQUEST['staffrole'],
                'isActive' => 1,
                'isDelete' => 0,
            );

            $response = $this->Manage_Site_Model->addstaffmember($data);
    
            echo json_encode(array("success" => true, "message" => "Staff account successfully created."));
        } else {
            echo json_encode(array("success" => false, "message" => "Both passwords are not equal."));
        }
    }

	public function deletestaff($id) {
		if ($this->role == 1) {
		  echo "<script>window.history.back();</script>";
		  exit;
		}
		$this->load->model('Manage_Site_Model');
		$this->Manage_Site_Model->deletestaffaccount($id);
		redirect('site/stafflist');
	}
	public function sendTestsms(){
		$smsresponse = $smsdetails = $smsmessage = $dataset = '';

		$this->load->model('Manage_Sms_Model');
		$smsdetails = $this->Manage_Sms_Model->getsmsdetails($_REQUEST['smsid']);
		$smsmessage = $smsdetails->option_value;
		
		$sms_account = $_REQUEST['smsaccount'];
		$sms_type = $_REQUEST['smstype'];

		if ($sms_account == 2) {
			$product = 'plan';
			$smssendid = getSMSsenderid('plansmssenderid');
			$username = PLAN_SMS_OBB_USERNAME;
			$apikey = PLAN_SMS_OBB_PASSWORD;
		} if ($sms_account == 3) {
			$product = 'webinar';
			$smssendid = SMS_WEBINAR_OBB_SENDER_ID;
			$username = SMS_WEBINAR_OBB_USERNAME;
			$apikey = SMS_WEBINAR_OBB_PASSWORD;
		} else {
			$product = 'main';
			$smssendid = getSMSsenderid('smssenderid');
			$username = SMS_OBB_USERNAME;
			$apikey = SMS_OBB_PASSWORD;
		}

		if($_REQUEST['mobile'] != '' && $smsmessage != "") {

			if($sms_type == 1) {
			    $eligibilityamt = "500000";
				$smsmessage = str_replace("<#cronamount>",$eligibilityamt,$smsmessage);
				
				$dataset = "<sms><user>".$username."</user><password>".$apikey."</password><mobiles>".$_REQUEST['mobile']."</mobiles><message>".$smsmessage."</message><accusage>1</accusage><senderid>".$smssendid."</senderid></sms>";

				$smsresponse = sendxmlSMSobb($dataset);
			}
			else if($sms_type == 2) {
			    $eligibilityamt = "500000";
				$smsmessage = str_replace("<#preamount>",$eligibilityamt,$smsmessage);
				$smsresponse = senddynamicSMSobb($_REQUEST['mobile'], $smsmessage, $product);
			}
			else if($sms_type == 3) {
				$smsresponse = senddynamicSMSobb($_REQUEST['mobile'], $smsmessage, $product);
			}
			
			echo json_encode(array("success"=>true, "message"=>$smsresponse));
			die;
		}
		else {
			echo json_encode(array("success"=>false, "message"=>"Mobile number and SMS is mendatory."));
			die;
		}
		
		echo json_encode(array("success"=>false, "message"=>"Ops! Something goes wrong."));
		die;
	}
}

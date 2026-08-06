<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Infopage extends CI_Controller {
	
	public function index(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');
		$banklist = $this->Site_Info_Model->getbanklist(12);
		$testimoniallist = $this->Site_Info_Model->gettestimoniallist(1);
		$welcomemsg = $this->Site_Info_Model->getwelcomemessage();
		$this->load->view('index',['meta'=>$meta, 'banklist'=>$banklist, 'testimoniallist'=>$testimoniallist, 'msg'=>$welcomemsg]);
	}

	public function company(){
	
		$this->load->model('Site_Info_Model');
		$testimoniallist = $this->Site_Info_Model->gettestimoniallist(1);
		$banklist = $this->Site_Info_Model->getbanklist(12);
		$meta = $this->Site_Info_Model->getmetakeywords('company');
		$this->load->view('company',['meta'=>$meta, 'banklist'=>$banklist, 'testimoniallist'=>$testimoniallist]);
		
	}

	public function ourproduct(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('our-product');
		$this->load->view('our-product',['meta'=>$meta]);
	}

	public function contact(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('contact');
		$this->load->view('contact',['meta'=>$meta]);
	}

	public function loan_offers(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');
		$this->load->view('loan-offers',['meta'=>$meta]);
	}

	public function career(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('career');
		$openinglist = $this->Site_Info_Model->getopeninglist();
		$this->load->view('career',['meta'=>$meta, 'openinglist'=>$openinglist]);
	}

	public function faqs(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');
		$this->load->view('faqs',['meta'=>$meta]);
	}

	public function important_update(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');
		$noteslist = $this->Site_Info_Model->getimpnoteslist();
		$this->load->view('important-update',['meta'=>$meta, 'noteslist'=>$noteslist]);
	}

	public function privacy_policy(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('privacy-policy');
		$contentdetails = $this->Site_Info_Model->getpagedetails('privacy-policy');
		$this->load->view('privacy-policy',['meta'=>$meta, 'contentdetails'=>$contentdetails]);
	}

	public function refund_policy(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('refund-policy');
		$contentdetails = $this->Site_Info_Model->getpagedetails('refund-policy');
		$this->load->view('refund-policy',['meta'=>$meta, 'contentdetails'=>$contentdetails]);
	}

	public function disclaimer(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('home');
		$contentdetails = $this->Site_Info_Model->getpagedetails('disclaimer');
		$this->load->view('disclaimer',['meta'=>$meta, 'contentdetails'=>$contentdetails]);
	}

	public function terms_conditions(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('terms');
		$contentdetails = $this->Site_Info_Model->getpagedetails('terms-conditions');
		$this->load->view('terms-conditions',['meta'=>$meta, 'contentdetails'=>$contentdetails]);
	}

	public function gallery(){
		$this->load->model('Site_Info_Model');
		$meta = $this->Site_Info_Model->getmetakeywords('company');
		$this->load->view('gallery',['meta'=>$meta]);
	}

	public function newslettersubscribe(){
		$data = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'subscribeemail' => $_REQUEST['subscribeemail'],
			'isActive' => 1,
			'isDelete' => 0
		);

		$this->load->model('Site_Info_Model');
		$response = $this->Site_Info_Model->subscribenewsletter($data);

		if($response == true) {
			$message = 'You are successfully subscribe for our lattest updates.';
			echo json_encode(array("success"=>true, "message"=>$message));
		} 
		else {
			$message = 'Ops. Something goes wrong.';
			echo json_encode(array("success"=>false, "message"=>$message));
		}
	}

	public function contactsubmission() {
			$this->load->model('Site_Info_Model');

			$data = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'fullname' => $_REQUEST['fullname'],
				'email' => $_REQUEST['email'],
				'mobile' => $_REQUEST['mobile'],
				'Subject' => $_REQUEST['subject'],
				'message' => $_REQUEST['message']
			);		

			$response = $this->Site_Info_Model->contactenquiry($data);
			
			if($response > 0){
				$message="Your inquiry has been submitted, We will contact you within 24-48 hours for a follow-up. Prayosha Fincart";
				echo json_encode(array("success"=>true, "message"=>$message));
				
			}
			else {
				echo json_encode(array("success"=>false, "message"=>"Ops! Something goes wrong."));
			}

	}

	public function testdata(){
		$emailid = 'psurti07@gmail.com';
		$mobile = '9904466599';
		$password = '123456';
		$firstname = 'Parth';

		$intdata1 = array(
			"fullPhoneNumber" => '+91' . $mobile,
			"callbackData" => "some text here",
			"type" => "Template",
			"template" => array(
				"name" => "success_8july_1",
				"languageCode" => "en",
				"bodyValues" => array(
					$firstname,
				),
			)

		);
		$restrack_intdata = webinar_interakt_payment_success_fail($intdata1);
		echo $restrack_intdata;
	}

}

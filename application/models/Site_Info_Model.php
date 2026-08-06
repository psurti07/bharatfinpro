<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Site_Info_Model extends CI_Model {

	public function getmetakeywords($slug = ''){
		$query = $this->db->where('slug', $slug)
				->get('meta_keywords')
				->row();
		return $query;
	}

	public function getproductdetails($slug = ''){
		$query = $this->db->select('id, productname, amount, offeramount, inOffer')
				->where('productslug', $slug)
				->get('products')
				->row();
		return $query;
	}

	public function getpagedetails($pagename = ''){
		$query = $this->db->where('option_key',$pagename)
				->get('site_options')
				->row();
		return $query;      
	}

	public function getsmsmessage($smskey = ''){
		$query = $this->db->where('option_key',$smskey)
				->get('site_options')
				->row();
		return $query->option_value;      
	}

	public function getinvoiceno(){
		$query = $this->db->select('option_value')
				->where('option_key', 'newinvoiceno')
				->get('site_options')
				->row();
		return $query->option_value;      
	}

	public function getbanklist($limit = 12){
		$query = $this->db->where('isDelete',0)
				->order_by("rand()")
				->limit($limit)
				->get('banks')
				->result();
		return $query;      
	}

	public function gettestimoniallist($page = ''){
		$query = $this->db->where('reviewpage',$page)
				->where('isDelete',0)
				->order_by('rand()')
				->get('testimonials')
				->result();
		return $query;      
	}

	public function getdirectlinks($loantype){
		$query = $this->db->select('l.id, l.applyurl, b.bank_name, b.bank_image')
				->from('bankapplylink l')
				->join('banks b','b.id=l.bankid')
				->where('l.loantype', $loantype)
				->where('l.isDelete', 0)
				->order_by('rand()')
				->get()
				->result();
		return $query;
	}

	public function getwelcomemessage(){
		//$where = "id=3 OR id=4";
		$where = "option_key='welcome-status' OR option_key='welcome-message'";
		$query = $this->db->select('option_value')
				->where($where)
				->get('site_options')
				->result();
		return $query;      
	}

	public function getopeninglist(){
		$query = $this->db->where('isDelete', 0)
				->order_by('rec_date desc')
				->get('career_opening')
				->result();
		return $query;      
	}

	public function getjobdetails($slug = ''){
		$query = $this->db->where('slug', $slug)
				->where('isDelete', 0)
				->get('career_opening')
				->row();
		return $query;      
	}

	public function cardofferorder($data){
		$this->db->insert('cardoffer_order',$data);
		$orderid = $this->db->insert_id();
		return $orderid;
	}

	public function sendOnlineGreetings($mobile='', $emailid='', $loan=''){
		$url = '';
		if($loan == 11) {
			$url = site_url('digital/personalLoan');
			$smsmessage = "Dear Customer, Congratulations! Your loan application has been successfully submitted. Please check your registered email and submit the required documents. Our company executive call you back soon. Thanks & Regards, Prayosha Fincart";
		}
		else if($loan == 12) {
			$url = site_url('digital/businessLoan');
			$smsmessage = "Dear Customer, Congratulations! Your loan application has been successfully submitted. Please login to our customer portal to submit the required documents so our company executive will call back in 24 to 48 hours! Thanks & Regards, Prayosha Fincart";
		}

		if($mobile != '') {
			$smsresponse = sendtextSMSobb($mobile, $smsmessage, 'main');
		}

		if($emailid != '') {
			// Send email
			$subject = "Welcome Prayosha Fincart";
			$message = '<p>Dear Customer,</p>';
			$message .= $smsmessage; 
			$message .= '<p>Thanks & Regards,<br/>'.COMPANY_NAME.'</p>';

			$this->load->model('Site_General_Model');
			$content = $this->Site_General_Model->simpleemailtemplate($message);

			if($content != '') {
				/*$mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content);*/
				$maildata = array(
					'fullname' => $emailid,
					'email' => $emailid
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}

		return true;
	}

	public function careersubmission($data){
		$this->db->insert('career_enquiry',$data);
		$careerid = $this->db->insert_id();

		if($data['mobile'] != '' && $careerid != '') {
			$smsmessage = "We appreciate your interest in our company. Our HR team will call you shortly. Best Wishes, Prayosha Fincart";
			$smsresponse = sendtextSMSobb($data['mobile'], $smsmessage, 'main');
		}

		if($data['email'] != '' && $careerid != '') {
			// Send email
			$subject1 = "Welcome to Prayosha Fincart";
			$message1 = "<p>Hello ".$data['firstname']." ".$data['lastname'].",</p>"; 
			$message1 .= "<p>You have successfully registered with Prayosha Fincart. We thank you for the interest you have shown in our organization.<br/>Our HR team will get back to you soon. Have a nice day.</p>";
			$message1 .= "<p>For any queries/confusion, write to us at hr@prayoshafincart.com</p>";
			$message1 .= '<p>Thanks & Regards,<br/>'.COMPANY_NAME.'</p>';

			$this->load->model('Site_General_Model');
			$content1 = $this->Site_General_Model->simpleemailtemplate($message1);

			if($content1 != '') {
				/* $mailresponse = sendHTMLmail($emailid, 'hr@prayoshafincart.com', $subject1, $content1); */
				$maildata = array(
					'fullname' => $data['mobile'],
					'email' => $data['email']
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject1, $content1);
			}

			// Send email
			$subject2 = "Career Form Submission";
			$message2 = "<p>Hello,</p>"; 
			$message2 .= "<p>You have a new career form submission from website. Here are some basic details:</p>"; 
			$message2 .= "<p>Name : <strong>".$data['firstname']." ".$data['lastname']."</strong></p>";
			$message2 .= "<p>Email Id : <strong>".$data['email']."</strong></p>";
			$message2 .= "<p>Mobile : <strong>".$data['mobile']."</strong></p>";
			$message2 .= "<p>For more details kindly check the portal.</p><br/>";
			$message2 .= '<p>Thanks & Regards,<br/>'.COMPANY_NAME.'</p>';

			$this->load->model('Site_General_Model');
			$content2 = $this->Site_General_Model->simpleemailtemplate($message2);

			if($content2 != '') {
				/* $mailresponse = sendHTMLmail('hr@prayoshafincart.com', $data['email'], $subject2, $content2); */
				$maildata = array(
					'fullname' => $data['mobile'],
					'email' => $data['email']
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject2, $content2);
			}
		}

		return ($this->db->affected_rows() != 1) ? false : true; 
	}

	public function subscribenewsletter($data){
		$this->db->insert('newsletter_subscribe',$data);
		$bankid = $this->db->insert_id();

		return ($this->db->affected_rows() != 1) ? false : true; 
	}

	public function getimpnoteslist(){
		$query = $this->db->where('isActive',1)
				->where('isDelete',0)
				->order_by("rec_date desc")
				->get('important_update')
				->result();
		return $query;      
	}

	public function contactenquiry($data){
		$this->db->insert('contact_enquiry',$data);
		$id = $this->db->insert_id();
		return $id;
	}
	public function getroipackages($loantype){
		$query = $this->db->select('r.*, b.bank_name, b.bank_image')
				->from('roipackages r')
				->join('banks b','b.id=r.bankid')
				->where('r.loantype', $loantype)
				->where('r.isDelete', 0)
				->order_by('rand()')
				->limit(4)
				->get()
				->result();
		return $query;
	}
}


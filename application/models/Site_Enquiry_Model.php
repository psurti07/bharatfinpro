<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Site_Enquiry_Model extends CI_Model {

	public function addEnquiry($data){
		$this->db->insert('enquiry',$data);
		$enquiryid = $this->db->insert_id();

		return $enquiryid;
	}

	public function updateEnquiry($id, $data){
		$sql_query=$this->db->where('id', $id)
					->update('enquiry', $data); 
		return ($this->db->affected_rows() != 1) ? false : true;
	}


	public function sendOfflineGreetings($mobile='', $emailid='', $loan=''){
		$url = '';
		
		if($mobile != '') {
			$smsmessage = "Dear Customer, Your loan application has been successfully submitted. Our company executive will contact you shortly! Thanks & Regards, Prayosha Fincart";
			
			$smsresponse = sendtextSMSobb($mobile, $smsmessage, 'main');
		}

		if($emailid != '') {
			// Send email
			$subject = "Welcome Prayosha Fincart";
			
			$message = '<p>Dear Customer,</p>';
			$message .= "<p>Thank you for showing interest for a ".$loan.". Your loan application has been successfully submitted. Our company executive will contact you shortly.</p>"; 
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

}


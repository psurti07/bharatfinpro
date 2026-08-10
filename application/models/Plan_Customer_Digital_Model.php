<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Plan_Customer_Digital_Model extends CI_Model {

	public function getlastrecord($customerid){
		$query = $this->db->where('isDelete',0)
					->where('userid',$customerid)
					->order_by('id desc')
					->limit(1)
					->get('plan_user_registration')
					->row();
		return $query;
	}

	public function applyapplication($data){
		$this->db->insert('plan_user_registration',$data);
		$applyid = $this->db->insert_id();
		return $applyid;
	}

	public function updateapplication($id, $data){
		$sql_query=$this->db->where('id', $id)
					->update('plan_user_registration', $data); 
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function applicationstatus($data){
		$this->db->insert('plan_user_application_status',$data);
		$appstausid = $this->db->insert_id();
		return $appstausid;
	}
	
	public function sendGreetings($mobile='', $emailid='', $loan){
		if($mobile != '') {
			$message = "Dear Customer, Congratulations! Your loan application has been successfully submitted. Our Customer Executive will call you shortly. Thanks, Privylege";
			$smsresponse = sendtextSMSobb($mobile, $message, 'plan');
		}

		if($emailid != '') {
			// Send email
			$subject = "Welcome Bharatfinpro";
			
			$message = '<p>Dear Customer,</p>';
			$message .= '<p><strong>Congratulations!</strong></p>';
			$message .= '<p>Submission of your loan application is done. Kindly check your registered email and login into the customer portal for submitting the required documents.</p>';
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


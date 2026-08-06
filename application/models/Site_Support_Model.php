<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Site_Support_Model extends CI_Model
{

	public function submitsupportrequest($data)
	{
		$this->db->insert('support_query', $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function sendmessage($ticketNum = '', $mobile = '', $email = '')
	{
		if ($mobile != '') {
			$smsmessage = "Your request ticket has been raised in our system with the Ticket Id: " . $ticketNum . " We will contact you within 24-48 hours for a follow-up. Prayosha Fincart";

			$smsresponse = sendtextSMSobb($mobile, $smsmessage, 'main');
		}


		if ($email != '') {
			$subject = "Your Request has been raised and is Open with Ticket Id: " . $ticketNum;

			$message = '<p>Hello,</p>';
			$message .= '<p>Your request ticket has been raised in our system with the Ticket Id: ' . $ticketNum . '. We will contact you within 24-48 hours for a follow-up.</p>';
			$message .= '<p>Thanks & Regards,<br/>' . COMPANY_NAME . '</p>';

			$this->load->model('Site_General_Model');
			$content = $this->Site_General_Model->simpleemailtemplate($message);

			if ($content != '') {
				/* $mailresponse = sendHTMLmail($email, 'support@prayoshafincart.com', $subject, $content); */
				$maildata = array(
					'fullname' => $mobile,
					'email' => $email
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}

		}
	}

}


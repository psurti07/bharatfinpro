<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Manage_Support_Model extends CI_Model
{

	public function getsupportrequestlist($dt_to, $dt_from)
	{
		$query = $this->db->select('id, rec_date, ticketnumber, usertype, fullname, mobile, email, status')
			->where('rec_date >=', $dt_to . ' 00:00:00')
			->where('rec_date <=', $dt_from . ' 23:59:59')
			->where('isDelete', 0)
			->order_by('rec_date asc')
			->get('support_query')
			->result();
		return $query;
	}

	public function getsupportrequestdetails($id)
	{
		$query = $this->db->where('id', $id)
			->get('support_query')
			->row();
		return $query;
	}

	public function getsupportstaffreply($id)
	{
		$query = $this->db->select('c.*, a.fullname')
			->from('support_query_chat c')
			->join('administration a', 'a.id=c.staffid')
			->where('c.requestid', $id)
			->where('c.isDelete', 0)
			->get()
			->result();
		return $query;
	}

	public function changeticketstatus($statusid, $id)
	{
		$data = array(
			'status' => $statusid
		);
		$query = $this->db->where('id', $id)
			->update('support_query', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function addrequeststaffmsg($data)
	{
		$this->db->insert('support_query_chat', $data);
		$id = $this->db->insert_id();
		return $id;
	}


	public function sendTicketMessage($remarks = '', $ticketno = '', $emailid = '')
	{
		if ($emailid != '') {
			$subject = "Update on your request with ticket id: " . $ticketno;

			$message = '<p>Hello,</p>';
			$message .= '<p>Here\'s an update on your ticket id: ' . $ticketno . '</p>';
			$message .= '<p>' . $remarks . '</p>';
			$message .= '<p>Thanks & Regards,<br/>Support Team, Bharatfinpro</p>';

			$this->load->model('Manage_General_Model');
			$content = $this->Manage_General_Model->simpleemailtemplate($message);

			if ($content != '') {
				/*$mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content);*/
				$maildata = array(
					'fullname' => 'User',
					'email' => $emailid
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}
	}

	public function sendTicketOpenMessage($ticketno = '', $emailid = '', $mobile='')
	{
		if($mobile != '') {
			$message = "Your request ticket has been raised in our system with the Ticket Id: ".$ticketno.". We will contact you within 24-48 hours for a follow-up. Bharatfinpro";
			$smsresponse = sendtextSMSobb($mobile, $message, 'main');
		}

		if ($emailid != '') {
			$subject = "Subject : Your Request is registered and Open with Ticket Id: " . $ticketno;

			$message = '<p>Hello,</p>';
			$message .= '<p>This is to inform you that your request ticket is registered with us with the Ticket Id: ' . $ticketno . '. The current status of this ticket is OPEN. To address your query, we will contact you within 24-48 hours.</p>';
			$message .= '<p>Thanks & Regards,<br/>Support Team, Bharatfinpro</p>';

			$this->load->model('Manage_General_Model');
			$content = $this->Manage_General_Model->simpleemailtemplate($message);

			if ($content != '') {
				/* $mailresponse = sendHTMLmail($emailid, 'support@bharatfinpro.com', $subject, $content); */
				$maildata = array(
					'fullname' => 'User',
					'email' => $emailid
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}
	}

	public function sendTicketProcessMessage($ticketno = '', $emailid = '', $mobile='')
	{
		if($mobile != '') {
			$message = "Hello, Your request with Ticket ID: ".$ticketno." is under process. The query will be solved soon and it will be informed to you shortly. Thanks, Bharatfinpro";
			$smsresponse = sendtextSMSobb($mobile, $message, 'main');
		}

		if ($emailid != '') {
			$subject = "Your Request status: Under Process with Ticket Id: " . $ticketno;

			$message = '<p>Hello,</p>';
			$message .= '<p>The current status of your request with ticket id: ' . $ticketno . ' is Under Process. Your query will have a resolution soon and we will inform you about the update shortly.</p>';
			$message .= '<p>Thanks & Regards,<br/>Support Team, Bharatfinpro</p>';

			$this->load->model('Manage_General_Model');
			$content = $this->Manage_General_Model->simpleemailtemplate($message);

			if ($content != '') {
				/* $mailresponse = sendHTMLmail($emailid, 'support@bharatfinpro.com', $subject, $content); */
				$maildata = array(
					'fullname' => 'User',
					'email' => $emailid
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}
	}

	public function sendTicketClosedMessage($ticketno = '', $emailid = '', $mobile='')
	{
		if($mobile != '') {
			$message = "Hello, Your request with Ticket Id: ".$ticketno." is closed as the company tried calling you for the last 3 days but got no response. Thanks, Bharatfinpro";
			$smsresponse = sendtextSMSobb($mobile, $message, 'main');
		}

		if ($emailid != '') {
			$subject = "Your Request status: CLOSED with Ticket Id: " . $ticketno;

			$message = '<p>Hello,</p>';
			$message .= '<p>The current status of your request with ticket id: ' . $ticketno . ' is CLOSED because our company has been calling you for 3 days to address your query but there is absolutely no response or improper communication from your side.</p>';
			$message .= '<p>Kindly raise a fresh request if you have further queries.</p>';
			$message .= '<p>Thanks & Regards,<br/>Support Team, Bharatfinpro</p>';

			$this->load->model('Manage_General_Model');
			$content = $this->Manage_General_Model->simpleemailtemplate($message);

			if ($content != '') {
				/* $mailresponse = sendHTMLmail($emailid, 'support@bharatfinpro.com', $subject, $content); */
				$maildata = array(
					'fullname' => 'User',
					'email' => $emailid
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}
	}

	public function sendTicketResolvedMessage($ticketno = '', $emailid = '', $mobile='')
	{
		if($mobile != '') {
			$message = "Hello, Your request with Ticket Id: ".$ticketno." is Solved. We thank you for the opportunity to serve you. Thanks, Bharatfinpro";
			$smsresponse = sendtextSMSobb($mobile, $message, 'main');
		}

		if ($emailid != '') {
			// Send email
			$subject = "Your Request status: SOLVED with Ticket Id: " . $ticketno;

			$message = '<p>Hello,</p>';
			$message .= '<p>Your request with ticket id: ' . $ticketno . ' has been SOLVED.</p>';
			$message .= '<p>We look forward to serving you in future.</p>';
			$message .= '<p>Thanks & Regards,<br/>Support Team, Bharatfinpro</p>';

			$this->load->model('Manage_General_Model');
			$content = $this->Manage_General_Model->simpleemailtemplate($message);

			if ($content != '') {
				/* $mailresponse = sendHTMLmail($emailid, 'support@bharatfinpro.com', $subject, $content); */
				$maildata = array(
					'fullname' => 'User',
					'email' => $emailid
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}
	}

}

?>

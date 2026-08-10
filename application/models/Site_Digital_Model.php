<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Site_Digital_Model extends CI_Model
{

	public function checkuser($mobile)
	{
		$query = $this->db->select('r.id as userid, r.rec_date, r.isUser, r.process_step, a.id')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where('r.mobile', $mobile)
			->where('r.isUser !=', 0)
			->where('a.isDelete', 0)
			->where('r.isDelete', 0)
			->get();
		return $query->row();
	}

	public function checkexistinguser($mobile)
	{
		$query = $this->db->where('mobile', $mobile)
			->where('isUser', 2)
			->where('isDelete', 0)
			->get('user_registration');
		return $query->row();
	}

	public function checkuserregdata($id)
	{
		$query = $this->db->select('r.id as userid, r.fullname, r.mobile, r.email, r.city, r.state, r.isUser, r.cardtype, r.process_step, a.id, a.loantype, a.loanamount, a.income, a.currentemi')
			->from('user_application a')
			->join('user_registration r', 'r.id=a.userid')
			->where('r.id', $id)
			->where('r.isDelete', 0)
			->get();
		return $query->row();
	}

	public function checkuserdata($id)
	{
		$query = $this->db->select('r.id as userid, r.fullname, r.mobile, r.email, r.city, r.state, r.isUser, r.cardtype, r.process_step, a.id, a.loantype, a.loanamount, a.income, a.currentemi')
			->from('user_application a')
			->join('user_registration r', 'r.id=a.userid')
			->where('a.id', $id)
			->where('r.isDelete', 0)
			->get();
		return $query->row();
	}

	public function userorderdata($id)
	{
		$query = $this->db->where('userid', $id)
			->where('isDelete', 0)
			->order_by('id desc')
			->get('membership_order');
		return $query->row();
	}

	public function userregistration($data)
	{
		$this->db->insert('user_registration', $data);
		$userid = $this->db->insert_id();
		return $userid;
	}

	public function userapplication($data)
	{
		$this->db->insert('user_application', $data);
		$applyid = $this->db->insert_id();
		return $applyid;
	}

	public function updateregistration($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('user_registration', $data);
		return ($this->db->affected_rows() != 1) ? 'false' : 'true';
	}

	public function updateapplication($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('user_application', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}


	public function sendProcessMessage($loantype = '', $mobile = '', $emailid = '')
	{
		switch ($loantype) {
			case '11':
				if ($mobile != '') {
					$this->load->model('Site_Info_Model');
					$message = $this->Site_Info_Model->getsmsmessage('pl-process-sms');

					if ($message != '') {
						$smsresponse = senddynamicSMSobb($mobile, $message, 'main');
					}
				}
				break;

			case '12':
				if ($mobile != '') {
					$this->load->model('Site_Info_Model');
					$message = $this->Site_Info_Model->getsmsmessage('bl-process-sms');

					if ($message != '') {
						$smsresponse = senddynamicSMSobb($mobile, $message, 'main');
					}
				}
				break;

			default:
				# code...
				break;
		}

		return true;
	}


	public function sendOfferMessage($loantype = '', $eligibilityamt = 0, $mobile = '', $emailid = '')
	{
		switch ($loantype) {
			case '11':
				if ($mobile != '' && $eligibilityamt != 0) {
					$this->load->model('Site_Info_Model');
					$message = $this->Site_Info_Model->getsmsmessage('pl-offer-sms');
					$premessage = str_replace("<#preamount>", $eligibilityamt, $message);

					if (isBusinessHours() == true) {
						if ($premessage != '') {
							$smsresponse = senddynamicSMSobb($mobile, $premessage, 'main');
						}
					}
				}

				if ($emailid != '') {
					// Send email
					$subject = "Welcome Bharatfinpro";

					$message = '<p>Hello,</p>';
					$message .= '<p>Your Personal Loan Eligible Rs. ' . $eligibilityamt . ' in Your Account Get Starting Rate 10.25%. Apply Now : <a href="https://bit.ly/37hEQK0" target="_blank">https://bit.ly/37hEQK0</a></p>';
					$message .= '<p>Thanks & Regards,<br/>' . COMPANY_NAME . '</p>';

					$this->load->model('Site_General_Model');
					$content = $this->Site_General_Model->simpleemailtemplate($message);

					if ($content != '') {
						/*$mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content);*/
						/* $maildata = array(
							'fullname' => $emailid,
							'email' => $emailid
						);
						$mailresponse = sendinblueHTMLmail($maildata, $subject, $content); */
					}
				}
				break;

			case '12':
				if ($mobile != '' && $eligibilityamt != 0) {
					$this->load->model('Site_Info_Model');
					$message = $this->Site_Info_Model->getsmsmessage('bl-offer-sms');
					$premessage = str_replace("<#preamount>", $eligibilityamt, $message);
					if (isBusinessHours() == true) {
						if ($premessage != '') {
							$smsresponse = senddynamicSMSobb($mobile, $premessage, 'main');
						}
					}
				}
				break;

			default:
				# code...
				break;
		}

		return true;
	}

	public function applicationstatus($data)
	{
		$this->db->insert('user_application_status', $data);
		$appstausid = $this->db->insert_id();
		return $appstausid;
	}

	public function membershiporder($data)
	{
		$this->db->insert('membership_order', $data);
		$memberid = $this->db->insert_id();
		return $memberid;
	}

	public function checkmembershipentry($referenceId)
	{
		$query = $this->db->where('paymentid', $referenceId)
			->where('isDelete', 0)
			->get('membership_order')
			->num_rows();
		return $query;
	}

	public function getreferraluserid($referralcode)
	{
		$query = $this->db->where('refcode', $referralcode)
			->get('user_registration');
		return $query->row();
	}

	public function referraluserentry($data)
	{
		$this->db->insert('user_tree', $data);
		$treeid = $this->db->insert_id();
		return $treeid;
	}

	public function cashfreeentry($data)
	{
		$this->db->insert('cashfree_entry', $data);
		$id = $this->db->insert_id();

		return $id;
	}

	public function getcashfreeentry($id)
	{
		$query = $this->db->where('orderid', $id)
			->get('cashfree_entry');
		return $query->row();
	}

	public function updatecashfreeentry($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('cashfree_entry', $data);
		return ($this->db->affected_rows() != 1) ? 'false' : 'true';
	}

	public function paytmentry($data)
	{
		$this->db->insert('paytm_entry', $data);
		$id = $this->db->insert_id();

		return $id;
	}

	public function getpaytmentry($id)
	{
		$query = $this->db->where('orderid', $id)
			->get('paytm_entry');
		return $query->row();
	}

	public function updatepaytmentry($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('paytm_entry', $data);
		return ($this->db->affected_rows() != 1) ? 'false' : 'true';
	}
	public function subpaisaentry($data)
	{
		$this->db->insert('subpaisa_entry', $data);
		$id = $this->db->insert_id();

		return $id;
	}

	public function getsubpaisaentry($id)
	{
		$query = $this->db->where('orderid', $id)
			->get('subpaisa_entry');
		return $query->row();
	}

	public function updatesubpaisaentry($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('subpaisa_entry', $data);
		return ($this->db->affected_rows() != 1) ? 'false' : 'true';
	}

	public function upipaymententry($data)
	{
		$this->db->insert('upipayment_entry', $data);
		$id = $this->db->insert_id();

		return $id;
	}

	public function getupipaymententry($id)
	{
		$query = $this->db->where('orderid', $id)
			->get('upipayment_entry');
		return $query->row();
	}

	public function updateupipaymententry($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('upipayment_entry', $data);
		return ($this->db->affected_rows() != 1) ? 'false' : 'true';
	}

	public function zaakpayentry($data)
	{
		$this->db->insert('zaakpay_entry', $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function getzaakpayentry($orderid)
	{
		$query = $this->db->where('orderid', $orderid)
			->get('zaakpay_entry')
			->row();
		return $query;
	}

	public function updatezaakpayentry($id, $data)
	{
		$query = $this->db->where('id', $id)
			->update('zaakpay_entry', $data);
		return ($this->db->affected_rows() != 1) ? 'false' : 'true';
	}

	public function worldlineentry($data)
	{
		$this->db->insert('worldline_entry', $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function getworldlineentry($id)
	{
		$query = $this->db->where('orderid', $id)
			->get('worldline_entry')
			->row();
		return $query;
	}

	public function updateworldlineentry($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('worldline_entry', $data);
		return ($this->db->affected_rows() != 1) ? 'false' : 'true';
	}

	public function phonepeentry($data)
	{
		$this->db->insert('phonepe_entry', $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function getphonepeentry($id)
	{
		$query = $this->db->where('orderid', $id)
			->get('phonepe_entry')
			->row();
		return $query;
	}

	public function updatephonepeentry($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('phonepe_entry', $data);
		return ($this->db->affected_rows() != 1) ? 'false' : 'true';
	}

	public function razorpayentry($data)
	{
		$this->db->insert('razorpay_entry', $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function getrazorpayentry($id)
	{
		$query = $this->db->where('orderid', $id)
			->get('razorpay_entry')
			->row();
		return $query;
	}

	public function updaterazorpayentry($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('razorpay_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';
		return $flag;
	}

	public function payuentry($data)
	{
		$this->db->insert('payu_entry', $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function getpayuentry($id)
	{
		$query = $this->db->where('orderid', $id)
			->get('payu_entry');
		return $query->row();
	}

	public function updatepayuentry($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('payu_entry', $data);
		return ($this->db->affected_rows() != 1) ? 'false' : 'true';
	}

	public function lyraentry($data)
	{
		$this->db->insert('lyra_entry', $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function getlyraentry($orderid)
	{
		$query = $this->db->where('orderid', $orderid)
			->get('lyra_entry')
			->row();
		return $query;
	}

	public function updatelyraentry($id, $data)
	{
		$query = $this->db->where('id', $id)
			->update('lyra_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';
		return $flag;
	}

	public function paygicentry($data)
	{
		$this->db->insert('paygic_entry', $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function getpaygicentry($orderid)
	{
		$query = $this->db->where('orderid', $orderid)
			->get('paygic_entry')
			->row();
		return $query;
	}

	public function updatepaygicentry($id, $data)
	{
		$query = $this->db->where('id', $id)
			->update('paygic_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';
		return $flag;
	}

	public function steptopayentry($data)
	{
		$this->db->insert('steptopay_entry', $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function getsteptopayentry($id)
	{
		$query = $this->db->where('orderid', $id)
			->get('steptopay_entry')
			->row();
		return $query;
	}

	public function updatesteptopayentry($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('steptopay_entry', $data);
		return ($this->db->affected_rows() != 1) ? 'false' : 'true';
	}

	public function cardofferorder($data)
	{
		$this->db->insert('cardoffer_order', $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function checkcardofferdata($id)
	{
		$query = $this->db->where('id', $id)
			->get('cardoffer_order')
			->row();
		return $query;
	}

	public function updatecardofferorder($id, $data)
	{
		$query = $this->db->where('id', $id)
			->update('cardoffer_order', $data);
		return ($this->db->affected_rows() != 1) ? 'false' : 'true';
	}

	public function generateinvoice($data, $invoiceno)
	{
		$this->db->insert('invoice', $data);
		$invoiceid = $this->db->insert_id();

		$data2 = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $invoiceno + 1
		);
		$sql_query = $this->db->where('option_key', 'newinvoiceno')
			->update('site_options', $data2);

		return $invoiceid;
	}

	public function sendPaymentGreetings($name = '', $mobile = '', $emailid = '')
	{
		if ($mobile != '') {
			$smsmessage = "Dear Customer, Your loan application has been successfully submitted. Our company executive will contact you shortly! Thanks & Regards, Bharatfinpro";
			$smsresponse = sendtextSMSobb($mobile, $smsmessage, 'main');
		}

		if ($emailid != '') {
			// Send email
			$subject = "Welcome Bharatfinpro";

			$message = '<p>Dear Customer,</p>';
			$message .= "<h3>Congratulations!</h3>";
			$message .= '<p>Your loan application has been successfully submitted. Our Customer Executive will call you shortly.</p>';
			$message .= '<p>Thanks & Regards,<br/>' . COMPANY_NAME . '</p>';

			$this->load->model('Site_General_Model');
			$content = $this->Site_General_Model->simpleemailtemplate($message);

			if ($content != '') {
				/* $mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content); */
				$maildata = array(
					'fullname' => $emailid,
					'email' => $emailid
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}

		return true;
	}

	public function sendOnlineGreetings($mobile = '', $emailid = '')
	{
		if ($mobile != '') {
			$smsmessage = "Dear Customer, Your loan application has been successfully submitted. Our company executive will contact you shortly! Thanks & Regards, Bharatfinpro";
			$smsresponse = sendtextSMSobb($mobile, $smsmessage, 'main');
		}

		if ($emailid != '') {
			// Send email
			$subject = "Welcome Bharatfinpro";

			$message = '<p>Dear Customer,</p>';
			$message .= '<h3>Congratulations!</h3>';
			$message .= '<p>Your submission of loan application is successful. Kindly check your registered email and complete document submission. Our Company Executive will call you back shortly!</p>';
			$message .= '<p>Thanks & Regards,<br/>' . COMPANY_NAME . '</p>';

			$this->load->model('Site_General_Model');
			$content = $this->Site_General_Model->simpleemailtemplate($message);

			if ($content != '') {
				/* $mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content); */
				$maildata = array(
					'fullname' => $emailid,
					'email' => $emailid
				);
				//$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}

		return true;
	}

	public function sendPaymentFailedGreetings($mobile = '', $emailid = '')
	{
		if ($mobile != '') {
			$this->load->model('Site_Info_Model');
			$message = $this->Site_Info_Model->getsmsmessage('payment-fail-sms');

			if ($message != '') {
				$smsresponse = senddynamicSMSobb($mobile, $message, 'main');
			}
		}
		return true;
	}

	public function sendSuccessGreetings($mobile = '', $emailid = '', $password = '')
	{
		if ($mobile != '') {
			$this->load->model('Site_Info_Model');
			$message = $this->Site_Info_Model->getsmsmessage('account-sms');

			if ($message != '') {
				$smsresponse = senddynamicSMSobb($mobile, $message, 'main');
			}
		}

		if ($emailid != '') {
			// Send email
			$subject = "Welcome to Bharatfinpro";

			$this->load->model('Site_General_Model');
			$content = $this->Site_General_Model->welcomeemailtemplate($mobile, $password);

			if ($content != '') {
				/* $mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content); */
				$maildata = array(
					'fullname' => $emailid,
					'email' => $emailid
				);
				$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}

		return true;
	}

	public function airpayentry($data)
	{
		$this->db->insert('airpay_entry', $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function getairpayentry($orderid)
	{
		$query = $this->db->where('orderid', $orderid)
			->get('airpay_entry')
			->row();
		return $query;
	}

	public function updateairpayentry($id, $data)
	{
		$query = $this->db->where('id', $id)
			->update('airpay_entry', $data);
		return ($this->db->affected_rows() != 1) ? 'false' : 'true';
	}

	public function getPendingOrdersData()
	{
		$this->db->select('*');
		$this->db->from('zaakpay_entry');
		$this->db->where('statuscode IS NULL', null, false);
		$this->db->where_in('entryfor', [11, 12]);
		$this->db->where('rec_date >=', date('Y-m-d H:i:s', strtotime('-2 hours')));
		$this->db->order_by('rec_date', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function updateZaakpayEntryOrder($orderId, $data)
	{
		$this->db->where('orderid', $orderId);
		return $this->db->update('zaakpay_entry', $data);
	}
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Site_Webinar_Model extends CI_Model
{

	public function getwebinardetail()
	{
		$this->db->from('webinar_event');
		$this->db->where('DATE(event_datetime) >=', date('Y-m-d'));
		$this->db->where('event_type', 0);
		$this->db->where('isActive', 1);
		$this->db->where('isDelete', 0);
		$this->db->order_by('event_datetime', 'ASC');
		$this->db->limit(1);

		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}
	/*public function check_exist_user($mobile, $eventid){
		$query = $this->db->select('*')
				->where('mobile', $mobile)
				->where('program_id', $eventid)
				->where('isUser', 2)
				->where('isActive', 1)
				->where('isDelete', 0)
				->get('user_webinar_registration')
				->row();
		return $query;
	}*/

	public function check_exist_user($mobile, $eventid)
	{
		$query = $this->db->select('uwr.*')
			->from('user_webinar_registration uwr')
			->join('webinar_order wo', 'wo.userid = uwr.id')
			->where('uwr.mobile', $mobile)
			->where('wo.webinar_id', $eventid)
			->where('wo.isUser', 2)
			->where('uwr.isDelete', 0)
			->where('wo.isDelete', 0)
			->get()
			->row();

		return $query;
	}

	public function addwebinar_order($data)
	{
		$this->db->insert('webinar_order', $data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function get_event_detail($id)
	{
		$this->db->select('*');
		$this->db->from('webinar_event')
			->where('id', $id);
		return $this->db->get()->row();
	}

	public function get_event_price($id)
	{
		$this->db->select('*');
		$this->db->from('webinar_event')
			->where('id', $id);
		return $this->db->get()->row();
	}

	public function checkuserentry($mobile)
	{
		$query = $this->db->select('*')
			->where('mobile', $mobile)
			->where('isUser !=', 2)
			->where('isDelete', 0)
			->get('user_webinar_registration')
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}
	public function checkwebinar_exist_user($mobile_no, $program_id)
	{
		$check = $this->db->select('*')
			->where('mobile', $mobile_no)
			->where('program_type', 0)
			->where('program_id', $program_id)
			->where('isUser !=', 2)
			->where('isDelete', 0)
			->order_by('id', 'DESC')
			->limit(1)
			->get('user_webinar_registration')
			->row();

		return $check;
	}
	public function checkuser($mobile)
	{
		$query = $this->db->select('*')
			->from('user_webinar_registration')
			->where('mobile', $mobile)
			->where('isUser !=', 2)
			->where('isDelete', 0)
			->order_by('id', 'DSC')
			->limit(1)
			->get()
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function checkexistinguser($mobile)
	{
		$query = $this->db->where('mobile', $mobile)
			->where('isUser', 2)
			->where('isDelete', 0)
			->get('user_webinar_registration')
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}
	public function checkuserregdata($id)
	{
		$query = $this->db->select('*')
			->from('user_webinar_registration')
			->where('id', $id)
			->where('isDelete', 0)
			->get()
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function userregistration($data)
	{
		$this->db->insert('user_webinar_registration', $data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function getwebinarorder($userid)
	{
		$query = $this->db->select('webinar_id')
			->where('userid', $userid)
			->where('isDelete', 0)
			->get('webinar_order')
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function getapplication($id)
	{
		$query = $this->db->where('userid', $id)
			->where('isDelete', 0)
			->get('user_application')
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function userapplication($data)
	{
		$this->db->insert('user_application', $data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function updateregistration($id, $data)
	{
		$query = $this->db->where('id', $id)
			->update('user_webinar_registration', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

		$this->db->close();
		$this->db->initialize();

		return $flag;
	}

	public function updateapplication($id, $data)
	{
		$query = $this->db->where('id', $id)
			->update('user_application', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

		$this->db->close();
		$this->db->initialize();

		return $flag;
	}

	public function checkuserdata($id)
	{
		$query = $this->db->select('*')
			->from('user_webinar_registration')
			->where('id', $id)
			->where('isDelete', 0)
			->get()
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}


	public function applicationstatus($data)
	{
		$this->db->insert('user_application_status', $data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function update_webinarorder($id, $webinarid, $data)
	{

		$webid = $this->db->select('id')
			->from('webinar_order')
			->where('userid', $id)
			->where('webinar_id', $webinarid)
			->where('isDelete', 0)
			->get()
			->row();

		$query = $this->db->where('userid', $id)
			->where('webinar_id', $webinarid)
			->update('webinar_order', $data);

		return $webid->id;
	}

	public function checkmembershipentry($referenceId, $userid)
	{
		$query = $this->db->where('userid', $userid)
			->where('paymentid', $referenceId)
			->where('isDelete', 0)
			->get('webinar_order')
			->num_rows();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function getreferraluserid($referralcode)
	{
		$query = $this->db->where('refcode', $referralcode)
			->get('user_registration')
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function referraluserentry($data)
	{
		$this->db->insert('user_tree', $data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function updatepayoutdata($id, $data)
	{
		$user = $this->db->where('subuserid', $id)
			->order_by('id desc')
			->get('user_tree')
			->row();

		if ($user) {
			$query = $this->db->where('id', $user->id)
				->update('user_tree', $data);

			$this->db->close();
			$this->db->initialize();

			return true;
		} else {
			$this->db->close();
			$this->db->initialize();

			return false;
		}
	}

	public function cashfreeentry($data)
	{
		$this->db->insert('cashfree_entry', $data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function getcashfreeentry($orderid)
	{
		$query = $this->db->where('orderid', $orderid)
			->get('cashfree_entry')
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function updatecashfreeentry($id, $data)
	{
		$query = $this->db->where('id', $id)
			->update('cashfree_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

		$this->db->close();
		$this->db->initialize();

		return $flag;
	}

	public function zaakpayentry($data)
	{
		$this->db->insert('zaakpay_entry', $data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function getzaakpayentry($orderid)
	{
		$query = $this->db->where('orderid', $orderid)
			->get('zaakpay_entry')
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function updatezaakpayentry($id, $data)
	{
		$query = $this->db->where('id', $id)
			->update('zaakpay_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

		$this->db->close();
		$this->db->initialize();

		return $flag;
	}

	public function paygentry($data)
	{
		$this->db->insert('payg_entry', $data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function getpaygentry($uid)
	{
		$query = $this->db->where('uniqueid', $uid)
			->get('payg_entry')
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function updatepaygentry($id, $data)
	{
		$query = $this->db->where('id', $id)
			->update('payg_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

		$this->db->close();
		$this->db->initialize();

		return $flag;
	}

	public function paytmentry($data)
	{
		$this->db->insert('paytm_entry', $data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function getpaytmentry($id)
	{
		$query = $this->db->where('orderid', $id)
			->get('paytm_entry')
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function updatepaytmentry($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('paytm_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

		$this->db->close();
		$this->db->initialize();

		return $flag;
	}

	public function payuentry($data)
	{
		$this->db->insert('payu_entry', $data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function getpayuentry($id)
	{
		$query = $this->db->where('orderid', $id)
			->get('payu_entry')
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function updatepayuentry($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('payu_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

		$this->db->close();
		$this->db->initialize();

		return $flag;
	}

	public function subpaisaentry($data)
	{
		$this->db->insert('subpaisa_entry', $data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function getsubpaisaentry($id)
	{
		$query = $this->db->where('orderid', $id)
			->get('subpaisa_entry')
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function updatesubpaisaentry($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('subpaisa_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

		$this->db->close();
		$this->db->initialize();

		return $flag;
	}

	public function phonepeentry($data)
	{
		$this->db->insert('phonepe_entry', $data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function getphonepeentry($id)
	{
		$query = $this->db->where('orderid', $id)
			->get('phonepe_entry')
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function updatephonepeentry($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('phonepe_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

		$this->db->close();
		$this->db->initialize();

		return $flag;
	}

	public function worldlineentry($data)
	{
		$this->db->insert('worldline_entry', $data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function getworldlineentry($id)
	{
		$query = $this->db->where('orderid', $id)
			->get('worldline_entry')
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function updateworldlineentry($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('worldline_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

		$this->db->close();
		$this->db->initialize();

		return $flag;
	}

	public function upipaymententry($data)
	{
		$this->db->insert('upipayment_entry', $data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function getupipaymententry($id)
	{
		$query = $this->db->where('orderid', $id)
			->get('upipayment_entry')
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function updateupipaymententry($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('upipayment_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

		$this->db->close();
		$this->db->initialize();

		return $flag;
	}

	public function razorpayentry($data)
	{
		$this->db->insert('razorpay_entry', $data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function getrazorpayentry($id)
	{
		$query = $this->db->where('orderid', $id)
			->get('razorpay_entry')
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function updaterazorpayentry($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('razorpay_entry', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

		$this->db->close();
		$this->db->initialize();

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

	public function cardofferorder($data)
	{
		$this->db->insert('cardoffer_order', $data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function checkcardofferdata($id)
	{
		$query = $this->db->where('id', $id)
			->get('cardoffer_order')
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function updatecardofferorder($id, $data)
	{
		$query = $this->db->where('id', $id)
			->update('cardoffer_order', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

		$this->db->close();
		$this->db->initialize();

		return $flag;
	}

	public function checkcardofferpentry($referenceId)
	{
		$query = $this->db->where('paymentid', $referenceId)
			->where('isDelete', 0)
			->get('cardoffer_order')
			->num_rows();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function marketingofferorder($data)
	{
		$this->db->insert('marketing_order', $data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function checkmarketingofferdata($id)
	{
		$query = $this->db->where('id', $id)
			->get('marketing_order')
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function updatemarketingofferorder($id, $data)
	{
		$query = $this->db->where('id', $id)
			->update('marketing_order', $data);
		$flag = ($this->db->affected_rows() != 1) ? 'false' : 'true';

		$this->db->close();
		$this->db->initialize();

		return $flag;
	}

	public function checkmarketingofferpentry($referenceId)
	{
		$query = $this->db->where('paymentid', $referenceId)
			->where('isDelete', 0)
			->get('marketing_order')
			->num_rows();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function generateinvoice($data, $invoiceno)
	{
		$this->db->insert('invoice', $data);
		$id = $this->db->insert_id();

		$data2 = array(
			'rec_date' => date('Y-m-d H:i:s'),
			'option_value' => $invoiceno + 1
		);
		$query = $this->db->where('option_key', 'newinvoiceno')
			->update('site_options', $data2);

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function sendPaymentGreetings($name = '', $mobile = '', $emailid = '')
	{
		if ($mobile != '') {
			$smsmessage = "";
			$smsresponse = sendtextSMSobb($mobile, $smsmessage);
		}

		if ($emailid != '') {
			// Send email
			$subject = "Welcome to bharatfinpro.com";

			$message = '<h3>Congratulations!</h3>';
			$message .= '<p>Dear Customer,</p>';
			$message .= '<p>Your loan application has been successfully submitted. our company executive will contact on whatsapp in 24 to 48 hours!</p>';
			$message .= '<p>Thanks & Regards,<br/>' . COMPANY_NAME . '</p>';

			$this->load->model('Site_General_Model');
			$content = $this->Site_General_Model->simpleemailtemplate($message);

			if ($content != '') {
				// $mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content, 5);

				$maildata = array(
					'fullname' => $name,
					'email' => $emailid
				);
				$mailresponse = sendinblueHTMLmail($maildata, $subject, $content, 5);
			}
		}

		return true;
	}

	public function sendPaymentFailedGreetings($mobile = '', $emailid = '')
	{
		if ($mobile != '') {
			$this->load->model('Site_Info_Model');
			$message = $this->Site_Info_Model->getsmsmessage('webinar-payment-fail-sms');

			if ($message != '') {
				$smsresponse = senddynamicSMSobb($mobile, $message, 'webinar');
			}
		}
		return true;
	}

	public function sendSuccessGreetings($maildata)
	{
		if ($maildata['mobile'] != '') {
			$this->load->model('Site_Info_Model');
			$message = $this->Site_Info_Model->getsmsmessage('webinar-payment-success-sms');

			if ($message != '') {
				$smsresponse = senddynamicSMSobb($maildata['mobile'], $message, 'webinar');
			}
		}

		if ($maildata['email'] != '') {
			// Send email
			$subject = "Welcome to bharatfinpro.com";
			$this->load->model('Site_General_Model');
			$content = $this->Site_General_Model->customer_webinar_welcomeemailtemplate($maildata);

			$queryuser = $this->db->where('id', $maildata['userid'])
				->get('user_webinar_registration');
			$details['userinfo'] = $queryuser->row();

			$queryreforder = $this->db->where('userid', $maildata['userid'])
				->where('webinar_id', $maildata['webinar_id'])
				->get('webinar_order');
			$details['orderinfo'] = $queryreforder->row();

			$queryref = $this->db->where('id', $details['orderinfo']->webinar_id)
				->get('webinar_event');
			$details['webinarinfo'] = $queryref->row();

			$where = "(inv_for=51)";
			$queryrefinvoice = $this->db->where('userid', $maildata['userid'])
				->where('cardid', $maildata['cardid'])
				->where($where)
				->get('invoice');
			$details['invoiceinfo'] = $queryrefinvoice->row();

			$invoiceno = 'INV-' . $details['orderinfo']->id;

			$this->load->library('pdf');

			$html = $this->load->view('webinar_invoice', ['invdetails' => $details], true);

			$attachments = [];

			$pdfContent = $this->pdf->mailPDF($html, $invoiceno);

			$attachments[] = [
				'name'    => $invoiceno . '.pdf',
				'content' => base64_encode($pdfContent)
			];


			if ($content != '') {
				// $mailresponse = sendHTMLmail($maildata['email'], COMPANY_EMAIL, $subject, $content, 5);
				$maildata = array(
					'fullname' => $maildata['fullname'],
					'email' => $maildata['email'],
					'mobile' => $maildata['mobile'],
				);
				$mailresponse = sendBrevoHtmlMail2($maildata, $subject, $content, 5, $attachments);
			}
		}

		return true;
	}


	public function get_schedule_user_data($id)
	{
		$query = $this->db->select('*')
			->from('user_webinar_registration')
			->where('id', $id)
			->where('isDelete', 0)
			->order_by('id', 'DSC')
			->get()
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function insert_schedule_slot($data)
	{
		$this->db->insert('schedule_slots', $data);
		$id = $this->db->insert_id();
		$user_id = $this->db
			->select('user_id')
			->where('id', $id)
			->get('schedule_slots')
			->row()
			->user_id;

		return $user_id;
	}
	public function get_schedule_slot($id)
	{
		$query = $this->db->select('id as slot_id, user_id as id, date, time, language, remarks, status')
			->where('user_id', $id)
			->where('is_deleted', 0)
			->order_by('id desc')
			->get('schedule_slots')
			->row();
		return $query;
	}
	public function upate_schedule_slot($id)
	{

		$data2 = array(
			'status' => 3,
			'is_deleted' => 1,
		);

		$query = $this->db->where('user_id', $id)
			->update('schedule_slots', $data2);
		echo $this->db->last_query();
		die;
		$this->db->close();
		$this->db->initialize();

		return $id;
	}
}
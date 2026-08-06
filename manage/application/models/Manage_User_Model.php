<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Manage_User_Model extends CI_Model
{

	public function checkuser($mobile)
	{
		$query = $this->db->where('mobile', $mobile)
			->where('isDelete', 0)
			->get('user_registration');
		return $query->num_rows();
	}

	public function adduseraccount($data)
	{
		$this->db->insert('user_registration', $data);
		$userid = $this->db->insert_id();
		return $userid;
	}

	public function updateuserprofile($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('user_registration', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function addapplication($data)
	{
		$this->db->insert('user_application', $data);
		$appid = $this->db->insert_id();
		return $appid;
	}

	public function updateapplication($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('user_application', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function membershiporder($data)
	{
		$this->db->insert('membership_order', $data);
		$orderid = $this->db->insert_id();
		return $orderid;
	}

	public function getmembershiprecord($id){
		
		$query = $this->db->where('id',$id)
					->get('membership_order')
					->row();

				
		return $query;  
	}

	public function applicationstatus($data)
	{
		$this->db->insert('user_application_status', $data);
		$appstausid = $this->db->insert_id();
		return $appstausid;
	}

	public function getuserlist($dt_to, $dt_from)
	{
		$query = $this->db->select('id, rec_date, fullname, mobile, email, pincode, city, state, isActive')
			->where('isUser', 2)
			->where('rec_date >=', $dt_to . ' 00:00:00')
			->where('rec_date <=', $dt_from . ' 23:59:59')
			->where('isDelete', 0)
			->order_by('id asc')
			->get('user_registration');
		return $query->result();
	}

	public function getuserdetails($id)
	{
		$details = array();

		$queryuser = $this->db->where('id', $id)
			->get('user_registration');
		$details['userinfo'] = $queryuser->row();

		$queryref = $this->db->select('r.fullname, r.mobile')
			->from('user_registration r')
			->join('user_tree t', 't.refferaluserid=r.id')
			->where('t.refferaltype', 1)
			->where('t.subuserid', $id)
			->get();
		$details['userreference'] = $queryref->row();

		return $details;
	}

	public function getuserdata($id)
	{
		$queryuser = $this->db->where('id', $id)
			->get('user_registration')
			->row();

		return $queryuser;
	}

	public function getkycstatus($id)
	{
		$query = $this->db->select('isVerified')
			->where('userid', $id)
			->get('user_documents')
			->row();

		if ($query) {
			return $query->isVerified;
		} else {
			return 0;
		}
	}

	public function getuserdocumentlist($type = 0)
	{
		$query = $this->db->select('r.id, r.rec_date, r.fullname, r.mobile, r.email, r.city, r.state, r.isActive')
			->from('user_registration r')
			->join('user_documents d', 'd.userid=r.id')
			->where('d.isVerified', $type)
			->where('r.isUser', 2)
			->where('r.isDelete', 0)
			->order_by('r.rec_date asc')
			->get()
			->result();

		return $query;
	}

	public function checkdocuments($id)
	{
		$query = $this->db->where('userid', $id)
			->get('user_documents')
			->num_rows();
		return $query;
	}

	public function getkycdocuments($id)
	{
		$query = $this->db->where('userid', $id)
			->get('user_documents')
			->row();
		return $query;
	}

	public function verifydocuments($id, $status)
	{
		$data = array(
			'isVerified' => $status
		);

		$query = $this->db->where('userid', $id)
			->update('user_documents', $data);

		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function reuploaddocument($id, $data)
	{
		$query = $this->db->where('userid', $id)
			->update('user_documents', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function getcarddetails($id)
	{
		$query = $this->db->select('o.*, r.fullname')
			->from('membership_order o')
			->join('user_registration r', 'r.id=o.userid')
			->where('r.id', $id)
			->get()
			->row();

		return $query;
	}

	public function getapplicationlist($id)
	{
		$query = $this->db->where('userid', $id)
			->where('isDelete', 0)
			->order_by('rec_date desc')
			->get('user_application')
			->result();

		return $query;
	}

	public function getallreferral($dt_to, $dt_from)
	{
		$query = $this->db->select('t.id, t.payout, t.payout_date, r1.id as referalid, r1.fullname as referal, r1.mobile as refmobile, r2.id as customerid, r2.fullname as customer, r2.mobile as customermobile, r2.rec_date, m.amount')
			->from('user_tree t')
			->join('user_registration r1', 't.refferaluserid=r1.id')
			->join('user_registration r2', 't.subuserid=r2.id')
			->join('membership_order m', 'r2.id=m.userid')
			->where('t.rec_date >=', $dt_to . ' 00:00:00')
			->where('t.rec_date <=', $dt_from . ' 23:59:59')
			->where('t.refferaltype', 1)
			->where('r2.isDelete', 0)
			->where('r2.isUser', 2)
			->where('r1.isUser', 2)
			->order_by('t.rec_date asc')
			->get()
			->result();

		return $query;
	}

	public function getreferraldetails($id)
	{
		$details = array();

		$querytree = $this->db->where('id', $id)
			->get('user_tree');
		$details['usertree'] = $querytree->row();

		$queryrefferal = $this->db->select('id, fullname, mobile, email, refcode')
			->where('id', $details['usertree']->refferaluserid)
			->get('user_registration');
		$details['refferaldetails'] = $queryrefferal->row();

		$querycustomer = $this->db->select('id, fullname, mobile, email, city, state')
			->where('id', $details['usertree']->subuserid)
			->get('user_registration');
		$details['customerdetails'] = $querycustomer->row();

		$queryorder = $this->db->select('id, registration_date, amount, paymentid')
			->where('userid', $details['customerdetails']->id)
			->get('membership_order');
		$details['orderdetails'] = $queryorder->row();

		$queryremarks = $this->db->where('linkid', $details['usertree']->id)
			->where('module', 'customerpayout')
			->where('isDelete', 0)
			->order_by('id desc')
			->get('allremarks');
		$details['payoutremarks'] = $queryremarks->result();

		return $details;
	}

	public function changepayoutstatus($statusid, $id)
	{
		$data = array(
			'payout' => $statusid,
			'payout_date' => date('Y-m-d')
		);

		$sql_query = $this->db->where('id', $id)
			->update('user_tree', $data);

		if ($statusid == 1) {
			$res = $this->getreferraldetails($id);
			$message = "Dear Customer, Payout is successfully credited to your account. Please check your portal! Thanks & Regards, Prayosha Fincart";
			$smsresponse = sendtextSMSobb($res['refferaldetails']->mobile, $message, 'main');
		}

		return true;
	}

	public function addpayoutremarks($data)
	{
		$this->db->insert('allremarks', $data);
		$bankid = $this->db->insert_id();

		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function getreferallist($id)
	{
		$query = $this->db->select('r.id, r.rec_date, r.fullname, r.isUser, r.mobile, t.payout, t.payout_date')
			->from('user_registration r')
			->join('user_tree t', 't.subuserid=r.id')
			->where('t.refferaltype', 1)
			->where('t.refferaluserid', $id)
			->where('r.isUser', 2)
			->where('r.isDelete', 0)
			->order_by('r.id desc')
			->get()
			->result();

		return $query;
	}

	public function getmembershiplist($dt_to, $dt_from, $cardtype)
	{
		$query = $this->db->select('m.*, r.fullname, r.mobile')
			->from('user_registration r')
			->join('membership_order m', 'm.userid=r.id')
			->where('m.rec_date >=', $dt_to . ' 00:00:00')
			->where('m.rec_date <=', $dt_from . ' 23:59:59')
			->where('r.cardtype', $cardtype)
			->where('m.isDelete', 0)
			->where('r.isDelete', 0)
			->order_by('m.id asc')
			->group_by('m.userid')
			->get()
			->result();

		return $query;
	}

	/*public function getleadsuserlist($dt_to, $dt_from){
			  $query = $this->db->select('id, rec_date, fullname, mobile, email, city')
					  ->where('rec_date >=', $dt_to.' 00:00:00')
					  ->where('rec_date <=', $dt_from.' 23:59:59')
					  ->where('isUser',1)
					  ->where('isDelete',0)
					  ->order_by('id asc')
					  ->get('user_registration');
			  return $query->result();      
		  }*/

	public function getleadsuserlist($loantype, $dt_to, $dt_from)
	{
		$query = $this->db->select('r.id, r.update_date, r.fullname, r.mobile, r.email, r.pincode, r.city, r.state')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->join('user_tree t', 't.subuserid=r.id', 'left')
			->where('r.update_date >=', $dt_to . ' 00:00:00')
			->where('r.update_date <=', $dt_from . ' 23:59:59')
			->where('t.subuserid', NULL)
			->where('r.isUser', 1)
			->where('r.isDelete', 0)
			->where('a.loantype', $loantype)
			->order_by('r.id asc')
			->get();

		return $query->result();
	}

	public function getpremiumleadslist($loantype, $dt_to, $dt_from)
	{
		$query = $this->db->select('r.id, r.update_date, r.fullname, r.mobile, r.email, r.pincode, r.city, r.state')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->join('user_tree t', 't.subuserid=r.id', 'left')
			->where('r.update_date >=', $dt_to . ' 00:00:00')
			->where('r.update_date <=', $dt_from . ' 23:59:59')
			->where('t.subuserid', NULL)
			->where('r.isUser', 1)
			->where('r.isDelete', 0)
			->where('a.loantype', $loantype)
			->where('a.loantenure !=', NULL)
			->order_by('r.id asc')
			->get();

		return $query->result();
	}

	public function getleaduserdetails($id)
	{
		$details = array();

		$queryuser = $this->db->where('id', $id)
			->get('user_registration');
		$details['userinfo'] = $queryuser->row();

		$queryapp = $this->db->where('userid', $id)
			->where('isDelete', 0)
			->order_by('id desc')
			->get('user_application');
		$details['userapplication'] = $queryapp->row();

		$queryref = $this->db->select('r.fullname, r.mobile')
			->from('user_registration r')
			->join('user_tree t', 't.refferaluserid=r.id')
			->where('t.refferaltype', 1)
			->where('t.subuserid', $id)
			->get();
		$details['userreference'] = $queryref->row();

		return $details;
	}

	public function getinvoicedetails($id, $cardid)
	{
		$details = array();

		$queryuser = $this->db->where('id', $id)
			->get('user_registration');
		$details['userinfo'] = $queryuser->row();

		$queryref = $this->db->where('id', $cardid)
			->get('membership_order');
		$details['orderinfo'] = $queryref->row();

		$where = "(inv_for=1 or inv_for=2)";
		$queryref = $this->db->where('userid', $id)
			->where('cardid', $cardid)
			->where($where)
			->get('invoice');
		$details['invoiceinfo'] = $queryref->row();

		return $details;
	}

	public function getrefferalinvoicedetails($id)
	{
		$details = array();

		$querytree = $this->db->where('id', $id)
			->get('user_tree');
		$details['payoutinfo'] = $querytree->row();

		$queryrefuser = $this->db->select('id, fullname, mobile, email, city, state, refcode')
			->where('id', $details['payoutinfo']->refferaluserid)
			->get('user_registration');
		$details['refuserinfo'] = $queryrefuser->row();

		$querycust = $this->db->select('id, fullname, mobile')
			->where('id', $details['payoutinfo']->subuserid)
			->get('user_registration');
		$details['customerinfo'] = $querycust->row();

		$querycard = $this->db->select('id, card_number, amount')
			->where('userid', $details['customerinfo']->id)
			->order_by('id desc')
			->get('membership_order');
		$details['cardinfo'] = $querycard->row();

		return $details;
	}

	public function deletelead($id)
	{
		$data = array(
			'isDelete' => 1
		);

		$sql_query_reg = $this->db->where('id', $id)
			->update('user_registration', $data);

		$sql_query_app = $this->db->where('userid', $id)
			->update('user_application', $data);

		return true;
	}

	public function changepassword($id, $password)
	{
		$account = $this->db->where('id', $id)
			->where('isDelete', 0)
			->get('user_registration')->row();

		if ($account) {
			$encpassword = stringCrypt($password, 'encrypt');

			$data = array(
				'password' => $encpassword,
			);

			$sql_query = $this->db->where('id', $account->id)
				->update('user_registration', $data);

			// Send SMS
			$message = "Hello " . $account->fullname . ", Your account new password is " . $password . ". (Do not share it with anyone). Thanks & Regards, Prayosha Fincart";
			$smsresponse = sendtextSMSobb($account->mobile, $message, 'main');

			return true;
		} else {
			return false;
		}
	}

	public function manageaccountstatus($id, $status)
	{
		$account = $this->db->where('id', $id)
							->where('isDelete',0)
							->get('user_registration')->row();
		if($account) {
			$data = array(
				'isActive' => $status,
			);

			$sql_query = $this->db->where('id', $id)
				->update('user_registration', $data);

				if($status == 0) {
					$message = "Dear User, Your account has been suspended due to some reason. For any query, kindly contact the company. Thanks &amp; Regards, PrayoshaFincart";
					$smsresponse = sendtextSMSobb($account->mobile, $message, 'main');
				}
				$this->db->close();
				$this->db->initialize();
	
				return true; 
		} else {
				$this->db->close();
				$this->db->initialize();
	
				return false;
		}

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

	public function invoce_log_data($data){
		
		$this->db->insert('invoice_log_data',$data);
		$log_id = $this->db->insert_id();
		if($log_id != ''){
			return true;
		} else {	
			return false;
		}
	}

	public function sendSuccessGreetings($mobile = '', $emailid = '', $password = '')
	{
		if ($mobile != '') {
			$smsmessage = "Dear Customer, Your loan application has been successfully submitted. Our company executive will contact you shortly! Thanks & Regards, Prayosha Fincart";

			$smsresponse = sendtextSMSobb($mobile, $smsmessage, 'main');
		}

		if ($emailid != '') {
			// Send email
			$subject = "Welcome to Prayosha Fincart";

			$this->load->model('Manage_General_Model');
			$content = $this->Manage_General_Model->welcomeemailtemplate($mobile, $password);

			if ($content != '') {
				/* $mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content); */
				$maildata = array(
					'fullname' => $mobile,
					'email' => $emailid
				);
				$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}

		return true;
	}
	public function manageaccountdeletepermanent($id)
	{
		$data = array(
		   'isDelete' => 1
		);
		
		$res1 = $this->db->where('userid', $id)
						->update('user_application', $data); 

		$res2 = $this->db->where('id', $id)
						->update('user_registration', $data);
					
		$res3 = $this->db->where('userid', $id)
						->update('membership_order', $data);
		
		$res4 = $this->db->where('userid', $id)
						->or_where(['inv_for'=>1,'inv_for'=>2])
						->update('invoice', $data);

		return true;
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
			return true;
		} else {
			return false;
		}
	}

	public function sendkycverifymessage($mobile = '', $emailid = '')
	{

		if ($mobile != '') {
			// no templ;ate
			$smsmessage = "Dear Customer, your documents are successfully verified. Our Company Executive will contact you soon for your loan process. Thanks, Prayoshafincart";
			$smsresponse = sendtextSMSobb($mobile, $smsmessage, 'main');
		}

		if ($emailid != '') {
			$subject = "Documents Verification Message - Prayoshafincart";

			$message = '<p>Dear Customer,</p>';
			$message .= '<h3>Congratulations!</h3>';
			$message .= '<p>The documents submitted by you are successfully verified. Our Company Executive will call you shortly regarding your loan process.</p>';
			$message .= '<p>Thanks & Regards,<br/>Prayoshafincart</p>';

			$this->load->model('Manage_General_Model');
			$content = $this->Manage_General_Model->simpleemailtemplate($message);

			if ($content != '') {
				/* $mailresponse = sendHTMLmail($emailid, COMPANY_EMAIL, $subject, $content, 1); */
				$maildata = array(
					'fullname' => $mobile,
					'email' => $emailid
				);
				$mailresponse = sendinblueHTMLmail($maildata, $subject, $content);
			}
		}

		return true;
	}
}


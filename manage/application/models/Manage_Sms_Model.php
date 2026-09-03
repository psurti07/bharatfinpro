<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Manage_Sms_Model extends CI_Model
{

	public function getsmsmessages()
	{
		$where = 'option_key="pl-remarketing-sms" 
				OR option_key="bl-remarketing-sms" 
				OR option_key="pl-process-sms" 
				OR option_key="bl-process-sms" 
				OR option_key="pl-offer-sms" 
				OR option_key="bl-offer-sms"
				OR option_key="account-sms"
				OR option_key="payment-fail-sms" 
				OR option_key="plan-remarketing-sms"
				OR option_key="plan-process-sms"
				OR option_key="plan-offer-sms"
				OR option_key="plan-account-sms"
				OR option_key="plan-payment-fail-sms"
				OR option_key="webinar-payment-success-sms"
				OR option_key="webinar-remarketing-sms"
				OR option_key="webinar-payment-fail-sms"';

		$query = $this->db->where($where)
			->order_by('rec_date asc')
			->get('site_options')
			->result();

		return $query;
	}

	public function getsmsdetails($id)
	{
		$query = $this->db->where('id', $id)
			->get('site_options')
			->row();
		return $query;
	}

	public function editsms($id, $data)
	{
		$query = $this->db->where('id', $id)
			->update('site_options', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function getsentotplist($dt_to, $dt_from)
	{
		$query = $this->db->where('rec_date >=', $dt_to)
			->where('rec_date <=', $dt_from)
			->order_by('id asc')
			->get('otpverification')
			->result();
		return $query;
	}

	public function getremarketinglog($dt_to, $dt_from)
	{
		$query = $this->db->select('id, rec_date, crontype, cronname, msgcount')
			->where('rec_date >=', $dt_to . ' 00:00:00')
			->where('rec_date <=', $dt_from . ' 23:59:59')
			->order_by('id asc')
			->get('sms_log')
			->result();
		return $query;
	}

	public function getlogdetails($id)
	{
		$query = $this->db->where('id', $id)
			->get('sms_log')
			->row();
		return $query;
	}

	public function getsmstemplates()
	{
		$query = $this->db->order_by('rec_date desc')
			->get('sms_list')
			->result();
		return $query;
	}

	public function getbulksmslist()
	{
		$query = $this->db->order_by('id asc')
			->get('bulksms')
			->result();
		return $query;
	}

	public function uploadbulkfile($data)
	{
		$this->db->insert('bulksms', $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function deletemsgnumber($id)
	{
		$query = $this->db->where('id', $id)
			->delete('bulksms');
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function checkdataentry($mobile)
	{
		$query = $this->db->where('mobileno', $mobile)
			->get('bulksms')
			->num_rows();
		return $query;
	}

	public function sendcustomsms($target = 99, $message = '')
	{
		$response = $dataset = $smsresponse = '';

		if ($message != '') {
			$smssendid = getSMSsenderid();
			$response .= '<h4><strong>Message Response:</strong></h4>';
			$response .= '<p> Target Customers - ' . $target . '</p>';
			$response .= '<p> Message - <br/>' . $message . '</p>';

			if ($target != 99) {
				$userlist = $this->db->select('id, fullname, mobile')
					->where('process_step', $target)
					->where('isUser', 2)
					->where('isActive', 1)
					->where('isDelete', 0)
					->order_by('id asc')
					->get('user_registration')
					->result();

				if (count($userlist) > 0) {
					$response .= '<p> Total Customers - ' . count($userlist) . '</p>';
					$arrpart = array_chunk($userlist, 8000);

					foreach ($arrpart as $res) {
						$dataset = '';
						$arrnumbers = 0;

						foreach ($res as $row) {
							$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>" . $row->mobile . "</mobiles><message>" . $message . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";

							$arrnumbers++;
						}
					}
				}
			}

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>9023987358</mobiles><message>" . $message . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>8160608975</mobiles><message>" . $message . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>8264097195</mobiles><message>" . $message . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>8487891350</mobiles><message>" . $message . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>9106429008</mobiles><message>" . $message . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>9825956908</mobiles><message>" . $message . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>7046134946</mobiles><message>" . $message . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>9408881214</mobiles><message>" . $message . "</message><accusage>1</accusage><senderid>" . $smssendid . "</senderid></sms>";

			$smsresponse = sendxmlSMSobb($dataset);

			$response .= '<p> SMS Response - <br/>' . $smsresponse . '</p>';
		}

		return $response;
	}

	public function getdnduserlist($dt_to, $dt_from)
	{
		$query = $this->db->select('id, fullname, mobile, cardtype')
			->where('isDnd', 1)
			->where('isActive', 1)
			->where('isDelete', 0)
			->where('rec_date >=', $dt_to . ' 00:00:00')
			->where('rec_date <=', $dt_from . ' 23:59:59')
			->order_by('id asc')
			->get('user_registration')
			->result();
		return $query;
	}

	public function getplandnduserlist($dt_to, $dt_from)
	{
		$query = $this->db->select('id, fullname, mobile, cardtype')
			->where('isDnd', 1)
			->where('isActive', 1)
			->where('isDelete', 0)
			->where('rec_date >=', $dt_to . ' 00:00:00')
			->where('rec_date <=', $dt_from . ' 23:59:59')
			->order_by('id asc')
			->get('plan_user_registration')
			->result();
		return $query;
	}

	public function uploaddndfile($wheredata = '')
	{
		if ($wheredata != '') {
			$data = array(
				'isDnd' => 1
			);
			$query = $this->db->where($wheredata)
				->update('user_registration', $data);
			return true;
		} else {
			return false;
		}
	}

	public function planuploaddndfile($wheredata = '')
	{
		if ($wheredata != '') {
			$data = array(
				'isDnd' => 1
			);
			$query = $this->db->where($wheredata)
				->update('plan_user_registration', $data);
			return true;
		} else {
			return false;
		}
	}

	public function deletedndnumber($id)
	{
		$data = array(
			'isDnd' => 0
		);
		$query = $this->db->where('id', $id)
			->update('user_registration', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
}
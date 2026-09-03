<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Plan_Customer_Loan_Model extends CI_Model
{

	public function getloanhistory($id)
	{
		$date = "rec_date >= DATE_ADD(CURDATE(),INTERVAL -180 DAY) ";

		$query = $this->db->where($date)
			->where('userid', $id)
			->where('isDelete', 0)
			->order_by('rec_date desc')
			->get('plan_user_application')
			->result();
		return $query;
	}

	public function getapplicationdetails($id)
	{
		$query = $this->db->where('id', $id)
			->where('isDelete', 0)
			->order_by('id asc')
			->get('plan_user_application')
			->row();
		return $query;
	}

	public function getappstatuslist($id)
	{
		$query = $this->db->select('s.*, b.bank_name, l.statusname, l.colorclass')
			->from('plan_user_application_status s')
			->join('banks b', 's.bankid=b.id')
			->join('loanstatus l', 's.statusid=l.id')
			->where('s.isDelete', 0)
			->where('s.applicationid', $id)
			->order_by('s.statusdate desc')
			->get()
			->result();

		return $query;
	}
}
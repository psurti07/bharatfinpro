<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Customer_Referral_Model extends CI_Model
{

	public function getreferrallist($id)
	{
		$query = $this->db->select('r.id, r.rec_date, r.fullname, r.mobile, r.email, r.city, t.payout, t.payout_date')
			->from('user_tree t')
			->join('plan_user_registration r', 'r.id=t.subuserid')
			->where('t.refferaltype', 1)
			->where('t.refferaluserid', $id)
			->where('r.isUser', 2)
			->where('r.isActive', 1)
			->where('r.isDelete', 0)
			->order_by('t.rec_date desc')
			->get()
			->result();
		return $query;
	}

	public function getreferralloanhistory($id)
	{
		$subusers = $this->getreferrallist($id);

		$i = 0;
		foreach ($subusers as $row) {
			$subquery = $this->db->where('userid', $row->id)
				->where('isDelete', 0)
				->order_by('rec_date asc')
				->get('plan_user_application')
				->row();

			$subusers[$i]->rec_date = $subquery->rec_date;
			$subusers[$i]->loantype = $subquery->loantype;
			$subusers[$i]->loanamount = $subquery->loanamount;
			$subusers[$i]->loanpurpose = $subquery->loanpurpose;
			$subusers[$i]->loantenure = $subquery->loantenure;
			$subusers[$i]->status = $subquery->status;
			$i++;
		}

		return $subusers;
	}
}
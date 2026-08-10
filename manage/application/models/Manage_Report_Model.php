<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Manage_Report_Model extends CI_Model
{

	public function getcustomersReport()
	{
		$query = $this->db->select('year(rec_date) as recyear,month(rec_date) as monthno,MONTHNAME(rec_date) as recmonth,count(id) as totaluser')
			->where('isUser', 2)
			->where('isDelete', 0)
			->group_by('year(rec_date)')
			->group_by('month(rec_date)')
			->order_by('year(rec_date) asc')
			->order_by('month(rec_date)')
			->get('user_registration')
			->result();
		return $query;
	}

	public function getplancustomersReport()
	{
		$query = $this->db->select('year(rec_date) as recyear,month(rec_date) as monthno,MONTHNAME(rec_date) as recmonth,count(id) as totaluser')
			->where('isUser', 2)
			->where('isDelete', 0)
			->group_by('year(rec_date)')
			->group_by('month(rec_date)')
			->order_by('year(rec_date) asc')
			->order_by('month(rec_date)')
			->get('plan_user_registration')
			->result();
		return $query;
	}

	public function getdigitalleadReport($loantype)
	{
		if ($loantype == 'pl') {
			$where = " a.loantype=11 ";
		} else if ($loantype == 'bl') {
			$where = " a.loantype=12 ";
		} else {
			$where = " a.loantype=11 or a.loantype=12 ";
		}

		$query = $this->db->select('year(r.rec_date) as recyear,month(r.rec_date) as monthno,MONTHNAME(r.rec_date) as recmonth,count(r.id) as totaluser')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where('r.isUser', 1)
			->where('r.isDelete', 0)
			->where($where)
			->group_by('year(r.rec_date)')
			->group_by('month(r.rec_date)')
			->order_by('year(r.rec_date) asc')
			->order_by('month(r.rec_date)')
			->get()
			->result();
		return $query;
	}

	public function getplanleadReport($loantype)
	{
		if ($loantype == 'pl') {
			$where = " a.loantype=21 ";
		} else if ($loantype == 'bl') {
			$where = " a.loantype=22 ";
		} else {
			$where = " a.loantype=21 or a.loantype=22 ";
		}

		$query = $this->db->select('year(r.rec_date) as recyear,month(r.rec_date) as monthno,MONTHNAME(r.rec_date) as recmonth,count(r.id) as totaluser')
			->from('plan_user_registration r')
			->join('plan_user_application a', 'a.userid=r.id')
			->where('r.isUser', 1)
			->where('r.isDelete', 0)
			->where($where)
			->group_by('year(r.rec_date)')
			->group_by('month(r.rec_date)')
			->order_by('year(r.rec_date) asc')
			->order_by('month(r.rec_date)')
			->get()
			->result();
		return $query;
	}

	public function getgstrecords($dt_to, $dt_from)
	{
		$resdata = array();
		$queryres = $this->db->where('rec_date >=', $dt_to . ' 00:00:00')
			->where('rec_date <=', $dt_from . ' 23:59:59')
			->where('isDelete', 0)
			->order_by('rec_date desc')
			->get('invoice')
			->result();

		if (count($queryres)) {
			foreach ($queryres as $row) {
				$resrow = array();

				$resrow['id'] = $row->id;
				$resrow['inv_prefix'] = $row->inv_prefix;
				$resrow['inv_number'] = $row->inv_number;
				$resrow['inv_date'] = $row->inv_date;
				$resrow['rec_date'] = $row->rec_date;
				$resrow['inv_price'] = $row->inv_price;
				$resrow['inv_cgst'] = $row->inv_cgst;
				$resrow['inv_sgst'] = $row->inv_sgst;
				$resrow['inv_igst'] = $row->inv_igst;
				$resrow['inv_grandtotal'] = $row->inv_grandtotal;

				if ($row->inv_for == 1 || $row->inv_for == 2) {
					$this->load->model('Manage_User_Model');
					$response_user = $this->Manage_User_Model->getuserdata($row->userid);

					if ($response_user != '') {
						$resrow['fullname'] = $response_user->fullname;
						$resrow['mobile'] = $response_user->mobile;
						$resrow['email'] = $response_user->email;
						$resrow['city'] = $response_user->city;
						$resrow['state'] = $response_user->state;
						$resrow['gstno'] = $response_user->gstno;

						if ($row->cardid != '' && $row->cardid > 0) {
							$response_order = $this->Manage_User_Model->getmembershiprecord($row->cardid);
							$resrow['paymentid'] = $response_order->paymentid;
						}

						$resdata[] = $resrow;
					}
				} else if ($row->inv_for == 4 || $row->inv_for == 4) {
					$this->load->model('Manage_Plan_User_Model');
					$response_user = $this->Manage_Plan_User_Model->getuserdata($row->userid);

					if ($response_user != '') {
						$resrow['fullname'] = $response_user->fullname;
						$resrow['mobile'] = $response_user->mobile;
						$resrow['email'] = $response_user->email;
						$resrow['city'] = $response_user->city;
						$resrow['state'] = $response_user->state;
						$resrow['gstno'] = $response_user->gstno;

						if ($row->cardid != '' && $row->cardid > 0) {
							$response_order = $this->Manage_Plan_User_Model->getplanrecord($row->cardid);
							$resrow['paymentid'] = $response_order->paymentid;
						}

						$resdata[] = $resrow;
					}
				}
			}
		}

		return $resdata;
	}

	public function getcashfreeentrylist($dt_to, $dt_from)
	{

		$offer_code1 = array(11, 12);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code1)
			->select('pe.rec_date, pe.entryfor, 
						(CASE 
							WHEN entryfor = 11 THEN "Personal Loan" 
							WHEN entryfor = 12 THEN "Business Loan" 
							ELSE entryfor 
						END) AS entrydetail, 
					orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('cashfree_entry pe')
			->join('user_registration r', 'pe.userid = r.id', 'left');
		$query1 = $this->db->get_compiled_select();

		$offer_code3 = array(21, 22);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code3)
			->select('pe.rec_date, pe.entryfor, 
						(CASE 
							WHEN entryfor = 21 THEN "Plan Personal Loan" 
							WHEN entryfor = 22 THEN "Plan Business Loan" 
							ELSE entryfor 
						END) AS entrydetail, 
					orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('cashfree_entry pe')
			->join('plan_user_registration r', 'pe.userid = r.id', 'left');
		$query3 = $this->db->get_compiled_select();

		$offer_code2 = array(3, 4, 5, 6, 7, 8);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code2)
			->select('pe.rec_date, pe.entryfor, 
					(CASE 
						WHEN entryfor = 3 THEN "Card Offer" 
						WHEN entryfor = 4 THEN "Special Offer" 
						WHEN entryfor = 5 THEN "Bumper Offer" 
						WHEN entryfor = 6 THEN "Star Offer"
						WHEN entryfor = 7 THEN "Super Offer"
						WHEN entryfor = 8 THEN "Quick Offer" 
						ELSE entryfor 
					END) AS entrydetail, orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.emailid as email')
			->from('cashfree_entry pe')
			->join('cardoffer_order r', 'pe.userid = r.id', 'left');
		$query2 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2 . ' UNION ' . $query3 . ' ORDER BY rec_date ASC');
		return $query->result();
	}

	public function getpaytmentrylist($dt_to, $dt_from)
	{
		$offer_code1 = array(11, 12);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code1)
			->select('pe.rec_date, pe.entryfor, 
						(CASE 
							WHEN entryfor = 11 THEN "Personal Loan" 
							WHEN entryfor = 12 THEN "Business Loan" 
							ELSE entryfor 
						END) AS entrydetail, 
					orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('paytm_entry pe')
			->join('user_registration r', 'pe.userid = r.id', 'left');
		$query1 = $this->db->get_compiled_select();

		$offer_code3 = array(21, 22);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code3)
			->select('pe.rec_date, pe.entryfor, 
						(CASE 
							WHEN entryfor = 21 THEN "Plan Personal Loan" 
							WHEN entryfor = 22 THEN "Plan Business Loan" 
							ELSE entryfor 
						END) AS entrydetail, 
					orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('paytm_entry pe')
			->join('plan_user_registration r', 'pe.userid = r.id', 'left');
		$query3 = $this->db->get_compiled_select();

		$offer_code2 = array(3, 4, 5, 6, 7, 8);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code2)
			->select('pe.rec_date, pe.entryfor, 
					(CASE 
						WHEN entryfor = 3 THEN "Card Offer" 
						WHEN entryfor = 4 THEN "Special Offer" 
						WHEN entryfor = 5 THEN "Bumper Offer" 
						WHEN entryfor = 6 THEN "Star Offer"
						WHEN entryfor = 7 THEN "Super Offer"
						WHEN entryfor = 8 THEN "Quick Offer" 
						ELSE entryfor 
					END) AS entrydetail, orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.emailid as email')
			->from('paytm_entry pe')
			->join('cardoffer_order r', 'pe.userid = r.id', 'left');
		$query2 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2 . ' UNION ' . $query3 . ' ORDER BY rec_date ASC');
		return $query->result();
	}

	public function getphonepeentrylist($dt_to, $dt_from)
	{

		$offer_code1 = array(11, 12);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code1)
			->select('pe.rec_date, pe.entryfor, 
						(CASE 
							WHEN entryfor = 11 THEN "Personal Loan" 
							WHEN entryfor = 12 THEN "Business Loan" 
							ELSE entryfor 
						END) AS entrydetail, 
					orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('phonepe_entry pe')
			->join('user_registration r', 'pe.userid = r.id', 'left');
		$query1 = $this->db->get_compiled_select();

		$offer_code3 = array(21, 22);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code3)
			->select('pe.rec_date, pe.entryfor, 
						(CASE 
							WHEN entryfor = 21 THEN "Plan Personal Loan" 
							WHEN entryfor = 22 THEN "Plan Business Loan" 
							ELSE entryfor 
						END) AS entrydetail, 
					orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('phonepe_entry pe')
			->join('plan_user_registration r', 'pe.userid = r.id', 'left');
		$query3 = $this->db->get_compiled_select();

		$offer_code2 = array(3, 4, 5, 6, 7, 8);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code2)
			->select('pe.rec_date, pe.entryfor, 
					(CASE 
						WHEN entryfor = 3 THEN "Card Offer" 
						WHEN entryfor = 4 THEN "Special Offer" 
						WHEN entryfor = 5 THEN "Bumper Offer" 
						WHEN entryfor = 6 THEN "Star Offer"
						WHEN entryfor = 7 THEN "Super Offer"
						WHEN entryfor = 8 THEN "Quick Offer" 
						ELSE entryfor 
					END) AS entrydetail, orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.emailid as email')
			->from('phonepe_entry pe')
			->join('cardoffer_order r', 'pe.userid = r.id', 'left');
		$query2 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2 . ' UNION ' . $query3 . ' ORDER BY rec_date ASC');
		return $query->result();
	}
	public function getsubpaisaentrylist($dt_to, $dt_from)
	{
		$offer_code1 = array(11, 12);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code1)
			->select('pe.rec_date, pe.entryfor, 
						(CASE 
							WHEN entryfor = 11 THEN "Personal Loan" 
							WHEN entryfor = 12 THEN "Business Loan" 
							ELSE entryfor 
						END) AS entrydetail, 
					orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('subpaisa_entry pe')
			->join('user_registration r', 'pe.userid = r.id', 'left');
		$query1 = $this->db->get_compiled_select();

		$offer_code3 = array(21, 22);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code3)
			->select('pe.rec_date, pe.entryfor, 
						(CASE 
							WHEN entryfor = 21 THEN "Plan Personal Loan" 
							WHEN entryfor = 22 THEN "Plan Business Loan" 
							ELSE entryfor 
						END) AS entrydetail, 
					orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('subpaisa_entry pe')
			->join('plan_user_registration r', 'pe.userid = r.id', 'left');
		$query3 = $this->db->get_compiled_select();

		$offer_code2 = array(3, 4, 5, 6, 7, 8);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code2)
			->select('pe.rec_date, pe.entryfor, 
					(CASE 
						WHEN entryfor = 3 THEN "Card Offer" 
						WHEN entryfor = 4 THEN "Special Offer" 
						WHEN entryfor = 5 THEN "Bumper Offer" 
						WHEN entryfor = 6 THEN "Star Offer"
						WHEN entryfor = 7 THEN "Super Offer"
						WHEN entryfor = 8 THEN "Quick Offer" 
						ELSE entryfor 
					END) AS entrydetail, orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.emailid as email')
			->from('subpaisa_entry pe')
			->join('cardoffer_order r', 'pe.userid = r.id', 'left');
		$query2 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2 . ' UNION ' . $query3 . ' ORDER BY rec_date ASC');
		return $query->result();
	}
	public function getupientrylist($dt_to, $dt_from)
	{
		$offer_code1 = array(11, 12);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code1)
			->select('pe.rec_date, pe.entryfor, 
						(CASE 
							WHEN entryfor = 11 THEN "Personal Loan" 
							WHEN entryfor = 12 THEN "Business Loan" 
							ELSE entryfor 
						END) AS entrydetail, 
					orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('upipayment_entry pe')
			->join('user_registration r', 'pe.userid = r.id', 'left');
		$query1 = $this->db->get_compiled_select();

		$offer_code3 = array(21, 22);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code3)
			->select('pe.rec_date, pe.entryfor, 
						(CASE 
							WHEN entryfor = 21 THEN "Plan Personal Loan" 
							WHEN entryfor = 22 THEN "Plan Business Loan" 
							ELSE entryfor 
						END) AS entrydetail, 
					orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('upipayment_entry pe')
			->join('plan_user_registration r', 'pe.userid = r.id', 'left');
		$query3 = $this->db->get_compiled_select();

		$offer_code2 = array(3, 4, 5, 6, 7, 8);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code2)
			->select('pe.rec_date, pe.entryfor, 
					(CASE 
						WHEN entryfor = 3 THEN "Card Offer" 
						WHEN entryfor = 4 THEN "Special Offer" 
						WHEN entryfor = 5 THEN "Bumper Offer" 
						WHEN entryfor = 6 THEN "Star Offer"
						WHEN entryfor = 7 THEN "Super Offer"
						WHEN entryfor = 8 THEN "Quick Offer" 
						ELSE entryfor 
					END) AS entrydetail, orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.emailid as email')
			->from('upipayment_entry pe')
			->join('cardoffer_order r', 'pe.userid = r.id', 'left');
		$query2 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2 . ' UNION ' . $query3 . ' ORDER BY rec_date ASC');
		return $query->result();
	}
	public function getworldlinelogentrylist($dt_to, $dt_from)
	{

		$offer_code1 = array(11, 12);
		$this->db->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code1)
			->select('pe.rec_date, pe.entryfor, 
					(CASE WHEN entryfor = 11 THEN "Personal Loan" 
						  WHEN entryfor = 12 THEN "Business Loan" 
						  ELSE entryfor 
					END) AS entrydetail, 
					orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('worldline_entry pe')
			->join('user_registration r', 'pe.userid = r.id', 'left');
		$query1 = $this->db->get_compiled_select();

		$offer_code3 = array(21, 22);
		$this->db->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code3)
			->select('pe.rec_date, pe.entryfor, 
					(CASE WHEN entryfor = 21 THEN "Plan Personal Loan" 
						  WHEN entryfor = 22 THEN "Plan Business Loan" 
						  ELSE entryfor 
					END) AS entrydetail, 
					orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('worldline_entry pe')
			->join('plan_user_registration r', 'pe.userid = r.id', 'left');
		$query3 = $this->db->get_compiled_select();

		$offer_code2 = array(3, 4, 5, 6, 7, 8);
		$this->db->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code2)
			->select('pe.rec_date, pe.entryfor, 
					(CASE WHEN entryfor = 3 THEN "Card Offer" 
						  WHEN entryfor = 4 THEN "Special Offer" 
						  WHEN entryfor = 5 THEN "Bumper Offer" 
						  WHEN entryfor = 6 THEN "Star Offer"
						  WHEN entryfor = 7 THEN "Super Offer"
						  WHEN entryfor = 8 THEN "Quick Offer" 
						  ELSE entryfor 
						END) AS entrydetail, 
						orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.emailid as email')
			->from('worldline_entry pe')
			->join('cardoffer_order r', 'pe.userid = r.id', 'left');
		$query2 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2 . '  UNION ' . $query3 . ' ORDER BY rec_date ASC');
		return $query->result();
	}
	public function getzaakpayentrylist($dt_to, $dt_from)
	{
		$offer_code1 = array(11, 12);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code1)
			->select('pe.rec_date, pe.entryfor, 
						(CASE 
							WHEN entryfor = 11 THEN "Personal Loan" 
							WHEN entryfor = 12 THEN "Business Loan" 
							ELSE entryfor 
						END) AS entrydetail, 
					orderid, orderamount, ordernote, transactionid, statuscode, paymentmode, statusdescription, r.fullname, r.mobile, r.email')
			->from('zaakpay_entry pe')
			->join('user_registration r', 'pe.userid = r.id', 'left');
		$query1 = $this->db->get_compiled_select();

		$offer_code2 = array(21, 22);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code2)
			->select('pe.rec_date, pe.entryfor, 
						(CASE 
							WHEN entryfor = 21 THEN "Plan Personal Loan" 
							WHEN entryfor = 22 THEN "Plan Business Loan" 
							ELSE entryfor 
						END) AS entrydetail, 
					orderid, orderamount, ordernote, transactionid, statuscode, paymentmode, statusdescription, r.fullname, r.mobile, r.email')
			->from('zaakpay_entry pe')
			->join('plan_user_registration r', 'pe.userid = r.id', 'left');
		$query2 = $this->db->get_compiled_select();

		$offer_code3 = array(3, 4, 5, 6, 7, 8);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code3)
			->select('pe.rec_date, pe.entryfor, 
					(CASE 
						WHEN entryfor = 3 THEN "Card Offer" 
						WHEN entryfor = 4 THEN "Special Offer" 
						WHEN entryfor = 5 THEN "Bumper Offer" 
						WHEN entryfor = 6 THEN "Star Offer"
						WHEN entryfor = 7 THEN "Super Offer"
						WHEN entryfor = 8 THEN "Quick Offer" 
						ELSE entryfor 
					END) AS entrydetail, orderid, orderamount, ordernote, transactionid, statuscode, paymentmode, statusdescription, r.fullname, r.mobile, r.emailid as email')
			->from('zaakpay_entry pe')
			->join('cardoffer_order r', 'pe.userid = r.id', 'left');
		$query3 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2 . ' UNION ' . $query3 . ' ORDER BY rec_date ASC');
		return $query->result();
	}

	public function getrazorpayentrylist($dt_to, $dt_from)
	{
		$offer_code1 = array(11, 12);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code1)
			->select('pe.rec_date, pe.entryfor, 
						(CASE 
							WHEN entryfor = 11 THEN "Personal Loan" 
							WHEN entryfor = 12 THEN "Business Loan" 
							ELSE entryfor 
						END) AS entrydetail, 
					orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('razorpay_entry pe')
			->join('user_registration r', 'pe.userid = r.id', 'left');
		$query1 = $this->db->get_compiled_select();

		$offer_code3 = array(21, 22);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code3)
			->select('pe.rec_date, pe.entryfor, 
						(CASE 
							WHEN entryfor = 21 THEN "Plan Personal Loan" 
							WHEN entryfor = 22 THEN "Plan Business Loan" 
							ELSE entryfor 
						END) AS entrydetail, 
					orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('razorpay_entry pe')
			->join('plan_user_registration r', 'pe.userid = r.id', 'left');
		$query3 = $this->db->get_compiled_select();

		$offer_code2 = array(3, 4, 5, 6, 7, 8);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code2)
			->select('pe.rec_date, pe.entryfor, 
					(CASE 
						WHEN entryfor = 3 THEN "Card Offer" 
						WHEN entryfor = 4 THEN "Special Offer" 
						WHEN entryfor = 5 THEN "Bumper Offer" 
						WHEN entryfor = 6 THEN "Star Offer"
						WHEN entryfor = 7 THEN "Super Offer"
						WHEN entryfor = 8 THEN "Quick Offer" 
						ELSE entryfor 
					END) AS entrydetail, orderid, orderamount, ordernote, referenceid, txstatus,paymentmode, r.fullname, r.mobile, r.emailid as email')
			->from('razorpay_entry pe')
			->join('cardoffer_order r', 'pe.userid = r.id', 'left');
		$query2 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2 . ' UNION ' . $query3 . ' ORDER BY rec_date ASC');
		return $query->result();
	}

	public function getpayuentrylist($dt_to, $dt_from)
	{
		$offer_code1 = array(11, 12);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code1)
			->select('pe.rec_date, pe.entryfor,
						(CASE
							WHEN entryfor = 11 THEN "Personal Loan"
							WHEN entryfor = 12 THEN "Business Loan"
							ELSE entryfor
						END) AS entrydetail,
					orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('payu_entry pe')
			->join('user_registration r', 'pe.userid = r.id', 'left');
		$query1 = $this->db->get_compiled_select();

		$offer_code3 = array(21, 22);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code3)
			->select('pe.rec_date, pe.entryfor,
						(CASE
							WHEN entryfor = 21 THEN "Plan Personal Loan"
							WHEN entryfor = 22 THEN "Plan Business Loan"
							ELSE entryfor
						END) AS entrydetail,
					orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.email')
			->from('payu_entry pe')
			->join('plan_user_registration r', 'pe.userid = r.id', 'left');
		$query3 = $this->db->get_compiled_select();

		$offer_code2 = array(3, 4, 5, 6, 7, 8);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code2)
			->select('pe.rec_date, pe.entryfor,
					(CASE
						WHEN entryfor = 3 THEN "Card Offer"
						WHEN entryfor = 4 THEN "Special Offer"
						WHEN entryfor = 5 THEN "Bumper Offer"
						WHEN entryfor = 6 THEN "Star Offer"
						WHEN entryfor = 7 THEN "Super Offer"
						WHEN entryfor = 8 THEN "Quick Offer"
						ELSE entryfor
					END) AS entrydetail, orderid, orderamount, ordernote, referenceid, txstatus, paymentmode, r.fullname, r.mobile, r.emailid as email')
			->from('payu_entry pe')
			->join('cardoffer_order r', 'pe.userid = r.id', 'left');
		$query2 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2 . ' UNION ' . $query3 . ' ORDER BY rec_date ASC');
		return $query->result();
	}

	public function getlyraentrylist($dt_to, $dt_from)
	{
		$offer_code1 = array(11, 12);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code1)
			->select('pe.rec_date, pe.entryfor,
						(CASE
							WHEN entryfor = 11 THEN "Personal Loan"
							WHEN entryfor = 12 THEN "Business Loan"
							ELSE entryfor
						END) AS entrydetail,
					orderid, orderamount, ordernote, transactionid, statuscode, paymentmode, r.fullname, r.mobile, r.email')
			->from('lyra_entry pe')
			->join('user_registration r', 'pe.userid = r.id', 'left');
		$query1 = $this->db->get_compiled_select();

		$offer_code3 = array(21, 22);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code3)
			->select('pe.rec_date, pe.entryfor,
						(CASE
							WHEN entryfor = 21 THEN "Personal Loan"
							WHEN entryfor = 22 THEN "Business Loan"
							ELSE entryfor
						END) AS entrydetail,
					orderid, orderamount, ordernote, transactionid, statuscode, paymentmode, r.fullname, r.mobile, r.email')
			->from('lyra_entry pe')
			->join('plan_user_registration r', 'pe.userid = r.id', 'left');
		$query3 = $this->db->get_compiled_select();

		$offer_code2 = array(3, 4, 5, 6, 7, 8);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code2)
			->select('pe.rec_date, pe.entryfor,
					(CASE
						WHEN entryfor = 3 THEN "Card Offer"
						WHEN entryfor = 4 THEN "Special Offer"
						WHEN entryfor = 5 THEN "Bumper Offer"
						WHEN entryfor = 6 THEN "Star Offer"
						WHEN entryfor = 7 THEN "Super Offer"
						WHEN entryfor = 8 THEN "Quick Offer"
						ELSE entryfor
					END) AS entrydetail, orderid, orderamount, ordernote, transactionid, statuscode, paymentmode, r.fullname, r.mobile, r.emailid as email')
			->from('lyra_entry pe')
			->join('cardoffer_order r', 'pe.userid = r.id', 'left');
		$query2 = $this->db->get_compiled_select();

		$query = $this->db->query($query1 . ' UNION ' . $query2 . ' UNION ' . $query3 . ' ORDER BY rec_date ASC');
		return $query->result();
	}

	public function getpaygicentryrecord($dt_to, $dt_from)
	{
		$offer_code1 = array(11, 12);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code1)
			->select('pe.rec_date, pe.entryfor, 
						(CASE 
							WHEN entryfor = 11 THEN "Personal Loan" 
							WHEN entryfor = 12 THEN "Business Loan" 
							ELSE entryfor 
						END) AS entrydetail, 
					orderid, orderamount, ordernote, transactionid, statuscode, paymentmode, r.fullname, r.mobile, r.email')
			->from('paygic_entry pe')
			->join('user_registration r', 'pe.userid = r.id', 'left');
		$query1 = $this->db->get_compiled_select();

		$offer_code3 = array(21, 22);
		$this->db
			->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code2)
			->select('pe.rec_date, pe.entryfor, 
						(CASE 
							WHEN entryfor = 21 THEN "Plan Personal Loan" 
							WHEN entryfor = 22 THEN "Plan Business Loan" 
							ELSE entryfor 
						END) AS entrydetail, 
					orderid, orderamount, ordernote, transactionid, statuscode, paymentmode, r.fullname, r.mobile, r.email')
			->from('paygic_entry pe')
			->join('plan_user_registration r', 'pe.userid = r.id', 'left');
		$query3 = $this->db->get_compiled_select();

		$offer_code2 = array(3, 4, 5, 6, 7, 8);
		$this->db->where('pe.rec_date >=', $dt_to . ' 00:00:00')
			->where('pe.rec_date <=', $dt_from . ' 23:59:59')
			->where_in('entryfor', $offer_code2)
			->select('pe.rec_date, pe.entryfor, 
					(CASE WHEN entryfor = 3 THEN "Card Offer"
						WHEN entryfor = 4 THEN "Special Offer"
						WHEN entryfor = 5 THEN "Bumper Offer"
						WHEN entryfor = 6 THEN "Star Offer"
						WHEN entryfor = 7 THEN "Super Offer"
						WHEN entryfor = 8 THEN "Quick Offer"  
						  ELSE entryfor 
						END) AS entrydetail, 
						orderid, orderamount, ordernote, transactionid, statuscode, paymentmode, r.fullname, r.mobile, r.emailid as email')
			->from('paygic_entry pe')
			->join('cardoffer_order r', 'pe.userid = r.id', 'left');
		$query2 = $this->db->get_compiled_select();


		$query = $this->db->query($query1 . ' UNION ' . $query2 . ' UNION ' . $query3 . ' ORDER BY rec_date ASC');
		return $query->result();
	}

	public function getcustomersReportDaywise($month, $year)
	{

		$startDate = date('Y-m-01', strtotime("$year-$month-01"));
		$endDate = date('Y-m-t', strtotime("$year-$month-01"));

		$allDates = $resdata = array();
		$currentDate = $startDate;
		$inc = 0;
		while ($currentDate <= $endDate) {
			$allDates[$inc]['formatted_date'] = $currentDate;
			$allDates[$inc]['recdate'] = displayDate($currentDate);
			$allDates[$inc]['totaluser'] = 0;
			$currentDate = date('Y-m-d', strtotime("$currentDate +1 day"));
			$inc++;
		}

		$query = $this->db->select('DATE_FORMAT(rec_date, "%Y-%m-%d") AS formatted_date, year(rec_date) as recyear, month(rec_date) as monthno, MONTHNAME(rec_date) as recmonth, rec_date AS recdate, count(id) as totaluser')
			->where('isUser', 2)
			->where('isDelete', 0)
			->where("DATE(rec_date) >=", $startDate)
			->where("DATE(rec_date) <=", $endDate)
			->group_by('DATE(rec_date)')
			->order_by('rec_date asc')
			->get('user_registration')
			->result();

		if (count($allDates)) {
			foreach ($allDates as $key => $value) {
				foreach ($query as $r1) {
					if ($allDates[$key]['formatted_date'] == $r1->formatted_date && $r1->totaluser != 0) {
						$allDates[$key]['totaluser'] = $r1->totaluser;
					}
				}
			}
		}

		return $allDates;
	}

	public function getplancustomersReportDaywise($month, $year)
	{

		$startDate = date('Y-m-01', strtotime("$year-$month-01"));
		$endDate = date('Y-m-t', strtotime("$year-$month-01"));

		$allDates = $resdata = array();
		$currentDate = $startDate;
		$inc = 0;
		while ($currentDate <= $endDate) {
			$allDates[$inc]['formatted_date'] = $currentDate;
			$allDates[$inc]['recdate'] = displayDate($currentDate);
			$allDates[$inc]['totaluser'] = 0;
			$currentDate = date('Y-m-d', strtotime("$currentDate +1 day"));
			$inc++;
		}

		$query = $this->db->select('DATE_FORMAT(rec_date, "%Y-%m-%d") AS formatted_date, year(rec_date) as recyear, month(rec_date) as monthno, MONTHNAME(rec_date) as recmonth, rec_date AS recdate, count(id) as totaluser')
			->where('isUser', 2)
			->where('isDelete', 0)
			->where("DATE(rec_date) >=", $startDate)
			->where("DATE(rec_date) <=", $endDate)
			->group_by('DATE(rec_date)')
			->order_by('rec_date asc')
			->get('plan_user_registration')
			->result();

		if (count($allDates)) {
			foreach ($allDates as $key => $value) {
				foreach ($query as $r1) {
					if ($allDates[$key]['formatted_date'] == $r1->formatted_date && $r1->totaluser != 0) {
						$allDates[$key]['totaluser'] = $r1->totaluser;
					}
				}
			}
		}

		return $allDates;
	}

	public function getdigitalleadReportDaywise($loantype, $month, $year)
	{
		$startDate = date('Y-m-01', strtotime("$year-$month-01"));
		$endDate = date('Y-m-t', strtotime("$year-$month-01"));

		$allDates = $resdata = array();
		$currentDate = $startDate;
		$inc = 0;
		while ($currentDate <= $endDate) {
			$allDates[$inc]['formatted_date'] = $currentDate;
			$allDates[$inc]['recdate'] = displayDate($currentDate);
			$allDates[$inc]['totaluser'] = 0;
			$currentDate = date('Y-m-d', strtotime("$currentDate +1 day"));
			$inc++;
		}

		if ($loantype == 'pl') {
			$where = " a.loantype=11 ";
		} else if ($loantype == 'bl') {
			$where = " a.loantype=12 ";
		} else {
			$where = " a.loantype=11 or a.loantype=12 ";
		}

		$query = $this->db->select('DATE_FORMAT(r.rec_date, "%Y-%m-%d") AS formatted_date, r.rec_date AS recdate, count(r.id) as totaluser')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where('r.isUser', 1)
			->where('r.isDelete', 0)
			->where("DATE(r.rec_date) >=", $startDate)
			->where("DATE(r.rec_date) <=", $endDate)
			->where($where)
			->group_by('DATE(r.rec_date)')
			->order_by('r.rec_date asc')
			->get()
			->result();
		if (count($allDates)) {
			foreach ($allDates as $key => $value) {
				foreach ($query as $r1) {
					if ($allDates[$key]['formatted_date'] == $r1->formatted_date && $r1->totaluser != 0) {
						$allDates[$key]['totaluser'] = $r1->totaluser;
					}
				}
			}
		}

		return $allDates;
	}

	public function getplanleadReportDaywise($loantype, $month, $year)
	{
		$startDate = date('Y-m-01', strtotime("$year-$month-01"));
		$endDate = date('Y-m-t', strtotime("$year-$month-01"));

		$allDates = $resdata = array();
		$currentDate = $startDate;
		$inc = 0;
		while ($currentDate <= $endDate) {
			$allDates[$inc]['formatted_date'] = $currentDate;
			$allDates[$inc]['recdate'] = displayDate($currentDate);
			$allDates[$inc]['totaluser'] = 0;
			$currentDate = date('Y-m-d', strtotime("$currentDate +1 day"));
			$inc++;
		}

		if ($loantype == 'pl') {
			$where = " a.loantype=21 ";
		} else if ($loantype == 'bl') {
			$where = " a.loantype=22 ";
		} else {
			$where = " a.loantype=21 or a.loantype=22 ";
		}

		$query = $this->db->select('DATE_FORMAT(r.rec_date, "%Y-%m-%d") AS formatted_date, r.rec_date AS recdate, count(r.id) as totaluser')
			->from('plan_user_registration r')
			->join('plan_user_application a', 'a.userid=r.id')
			->where('r.isUser', 1)
			->where('r.isDelete', 0)
			->where("DATE(r.rec_date) >=", $startDate)
			->where("DATE(r.rec_date) <=", $endDate)
			->where($where)
			->group_by('DATE(r.rec_date)')
			->order_by('r.rec_date asc')
			->get()
			->result();
		if (count($allDates)) {
			foreach ($allDates as $key => $value) {
				foreach ($query as $r1) {
					if ($allDates[$key]['formatted_date'] == $r1->formatted_date && $r1->totaluser != 0) {
						$allDates[$key]['totaluser'] = $r1->totaluser;
					}
				}
			}
		}

		return $allDates;
	}
	public function processstepdata($dt_to, $dt_from)
	{
		$statistics_res = [
			'userregistration' => 0,
			'usereligibility' => 0,
			'userpreapproved' => 0,
			'membershipcard' => 0,
			'userverification' => 0,
			'docverification' => 0,
			'appinprocess' => 0,
			'appqueryprocess' => 0,
			'appfilereopen' => 0,
			'apprejected' => 0,
			'appapproved' => 0
		];

		$query_res = $this->db->select('process_step, COUNT(*) as totalrec')
			->where('update_date >=', $dt_to . ' 00:00:00')
			->where('update_date <=', $dt_from . ' 23:59:59')
			->where('isActive', 1)
			->where('isDelete', 0)
			->group_by('process_step')
			->get('user_registration')
			->result();

		foreach ($query_res as $row) {
			switch ($row->process_step) {
				case '1':
					$statistics_res['userregistration'] = $row->totalrec;
					break;

				case '2':
					$statistics_res['usereligibility'] = $row->totalrec;
					break;

				case '3':
					$statistics_res['userpreapproved'] = $row->totalrec;
					break;

				case '4':
					$statistics_res['membershipcard'] = $row->totalrec;
					break;

				case '5':
					$statistics_res['userverification'] = $row->totalrec;
					break;

				case '6':
					$statistics_res['docverification'] = $row->totalrec;
					break;

				case '7':
					$statistics_res['appinprocess'] = $row->totalrec;
					break;

				case '8':
					$statistics_res['appqueryprocess'] = $row->totalrec;
					break;

				case '9':
					$statistics_res['appfilereopen'] = $row->totalrec;
					break;

				case '10':
					$statistics_res['apprejected'] = $row->totalrec;
					break;

				case '11':
					$statistics_res['appapproved'] = $row->totalrec;
					break;
			}
		}

		return $statistics_res;
	}

	public function getuserprocessstep($step, $dt_to, $dt_from)
	{
		$query = $this->db->select('id, update_date, fullname, mobile, email, city, state, isActive, isUser')
			->where('update_date >=', $dt_to . ' 00:00:00')
			->where('update_date <=', $dt_from . ' 23:59:59')
			->where('process_step', $step)
			->where('isDelete', 0)
			->order_by('id asc')
			->get('user_registration')
			->result();
		return $query;
	}

	public function remarketing_cron_data($corndays)
	{
		$statistics_result = array();
		foreach ($corndays as $cdays) {
			$d = strtotime("-" . $cdays . " day");
			$crondate = date('Y-m-d', $d);

			$this->db->select('r.id');
			$this->db->from('user_registration r');
			$this->db->join('user_application a', 'a.userid=r.id');
			$this->db->where("CAST(update_date as date) = '" . $crondate . "'");
			$this->db->where('r.isUser', 1);
			$this->db->where('r.isActive', 1);
			$this->db->where('r.isDelete', 0);
			$this->db->where('r.cardtype', 11);
			$this->db->where('a.status', 1);
			$this->db->where('a.isDelete', 0);
			$this->db->group_by('r.mobile');
			$this->db->order_by('r.id asc');

			$statistics_res['countrec'] = $this->db->get()->num_rows();
			$statistics_res['udate'] = date('d-m-Y', $d);
			$statistics_res['day'] = $cdays;
			array_push($statistics_result, $statistics_res);
		}
		return $statistics_result;
	}

	public function whatsapp_cron_data($corndays)
	{
		$statistics_result = array();
		foreach ($corndays as $cdays) {
			$d = strtotime("-" . $cdays . " day");
			$crondate = date('Y-m-d', $d);

			$this->db->select('r.id');
			$this->db->from('user_registration r');
			$this->db->join('user_application a', 'a.userid=r.id');
			$this->db->where("CAST(update_date as date) = '" . $crondate . "'");
			$this->db->where('r.isUser', 1);
			$this->db->where('r.isActive', 1);
			$this->db->where('r.isDelete', 0);
			$this->db->where('r.cardtype', 11);
			$this->db->where('a.status', 1);
			$this->db->where('a.isDelete', 0);
			$this->db->group_by('r.mobile');
			$this->db->order_by('r.id asc');

			$statistics_res['countrec'] = $this->db->get()->num_rows();
			$statistics_res['udate'] = date('d-m-Y', $d);
			$statistics_res['day'] = $cdays;
			array_push($statistics_result, $statistics_res);
		}
		return $statistics_result;
	}
	public function interakt_cron_data($corndays)
	{
		$statistics_result = array();
		foreach ($corndays as $cdays) {
			$d = strtotime("-" . $cdays . " day");
			$crondate = date('Y-m-d', $d);

			$this->db->select('r.id');
			$this->db->from('user_registration r');
			$this->db->join('user_application a', 'a.userid=r.id');
			$this->db->where("CAST(update_date as date) = '" . $crondate . "'");
			$this->db->where('r.isUser', 1);
			$this->db->where('r.isActive', 1);
			$this->db->where('r.isDelete', 0);
			$this->db->where('r.cardtype', 11);
			$this->db->where('a.status', 1);
			$this->db->where('a.isDelete', 0);
			$this->db->group_by('r.mobile');
			$this->db->order_by('r.id asc');

			$statistics_res['countrec'] = $this->db->get()->num_rows();
			$statistics_res['udate'] = date('d-m-Y', $d);
			$statistics_res['day'] = $cdays;
			array_push($statistics_result, $statistics_res);
		}
		return $statistics_result;
	}
	public function applicationdata()
	{
		$statistics_res = [];

		$query_userapp = $this->db->select('a.id')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where("CAST(a.rec_date as date) = CAST('" . date('Y-m-d') . "' as date)")
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->where('r.isUser', 2)
			->where('r.isDelete', 0)
			->get();
		$statistics_res['userapplication'] = $query_userapp->num_rows();

		$query_reapplyapp = $this->db->select('a.id')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where('a.userid in (SELECT userid FROM user_application GROUP BY userid HAVING COUNT(*) > 1)')
			->where("CAST(a.rec_date as date) = CAST('" . date('Y-m-d') . "' as date)")
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->where('r.isUser', 2)
			->where('r.isDelete', 0)
			->get();
		$statistics_res['reapplyapplication'] = $query_reapplyapp->num_rows();

		$query_oldapp = $this->db->select('a.id')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where("a.rec_date < NOW() - INTERVAL 15 DAY")
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->where('r.isUser', 2)
			->where('r.isDelete', 0)
			->get();
		$statistics_res['oldapplication'] = $query_oldapp->num_rows();


		/* plan application data */

		$query_plan_userapp = $this->db->select('a.id')
			->from('plan_user_registration r')
			->join('plan_user_application a', 'a.userid=r.id')
			->where("CAST(a.rec_date as date) = CAST('" . date('Y-m-d') . "' as date)")
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->where('r.isUser', 2)
			->where('r.isDelete', 0)
			->get();
		$statistics_res['plan_userapplication'] = $query_plan_userapp->num_rows();

		$query_plan_reapplyapp = $this->db->select('a.id')
			->from('plan_user_registration r')
			->join('plan_user_application a', 'a.userid=r.id')
			->where('a.userid in (SELECT userid FROM plan_user_application GROUP BY userid HAVING COUNT(*) > 1)')
			->where("CAST(a.rec_date as date) = CAST('" . date('Y-m-d') . "' as date)")
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->where('r.isUser', 2)
			->where('r.isDelete', 0)
			->get();
		$statistics_res['plan_reapplyapplication'] = $query_plan_reapplyapp->num_rows();

		$query_plan_oldapp = $this->db->select('a.id')
			->from('plan_user_registration r')
			->join('plan_user_application a', 'a.userid=r.id')
			->where("a.rec_date < NOW() - INTERVAL 15 DAY")
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->where('r.isUser', 2)
			->where('r.isDelete', 0)
			->get();
		$statistics_res['plan_oldapplication'] = $query_plan_oldapp->num_rows();

		return $statistics_res;
	}
	public function webinarcustomerdata()
	{
		$statistics_res = [];

		$query_webinarleads = $this->db->select('uwr.*')
			->from('user_webinar_registration uwr')
			->join('webinar_order wo', 'wo.userid = uwr.id')
			->where("CAST(uwr.rec_date as date) = CAST('" . date('Y-m-d') . "' as date)")
			->where('wo.isUser !=', 2)
			->where('uwr.isDelete', 0)
			->where('wo.isDelete', 0)
			->order_by('uwr.id asc')
			->get();
		$statistics_res['webinarleadsell'] = $query_webinarleads->num_rows();

		$query_webinarcust = $this->db->select('uwr.*')
			->from('user_webinar_registration uwr')
			->join('webinar_order wo', 'wo.userid = uwr.id')
			->where("CAST(uwr.rec_date as date) = CAST('" . date('Y-m-d') . "' as date)")
			->where('wo.isUser', 2)
			->where('uwr.isDelete', 0)
			->where('wo.isDelete', 0)
			->order_by('uwr.id asc')
			->get();
		$statistics_res['webinarsellall'] = $query_webinarcust->num_rows();


		$query_custleads = $this->db->select('total_leads')
			->from('onboarding_transaction')
			->where('date >=', date('Y-m-d', strtotime('-1 day')))
			->where('isDelete', 0)
			->order_by('id', 'asc')
			->get();

		$statistics_res['onboardleadsell'] = $query_custleads ? $query_custleads->num_rows() : 0;

		$query_customersellall = $this->db->select('total_customers')
			->from('onboarding_transaction')
			->where('date >=', date('Y-m-d', strtotime('-1 day')))
			->where('isDelete', 0)
			->order_by('id', 'asc')
			->get();

		$statistics_res['onboardsellall'] = $query_customersellall ? $query_customersellall->num_rows() : 0;

		return $statistics_res;
	}

	public function getApplicationReport()
	{
		$sql = "
			SELECT
				YEAR(u.rec_date) AS recyear,
				MONTH(u.rec_date) AS monthno,
				MONTHNAME(u.rec_date) AS recmonth,

				SUM(CASE WHEN u.statusid = 1 THEN 1 ELSE 0 END) AS approved,
				SUM(CASE WHEN u.statusid = 2 THEN 1 ELSE 0 END) AS rejected,
				SUM(CASE WHEN u.statusid = 4 THEN 1 ELSE 0 END) AS queryprocess,
				SUM(CASE WHEN u.statusid = 7 THEN 1 ELSE 0 END) AS customerdecline,

				SUM(CASE WHEN u.statusid IN (1,2,4,7) THEN 1 ELSE 0 END) AS totalapplication

			FROM user_application_status u

			INNER JOIN
			(
				SELECT applicationid, MAX(id) AS lastid
				FROM user_application_status
				WHERE isDelete = 0
				GROUP BY applicationid
			) latest
			ON latest.lastid = u.id

			WHERE u.isDelete = 0

			GROUP BY YEAR(u.rec_date), MONTH(u.rec_date)

			ORDER BY YEAR(u.rec_date) DESC,
					MONTH(u.rec_date) DESC
		";

		return $this->db->query($sql)->result();
	}

	public function getApplicationReportDaywise($month, $year)
	{
		$startDate = date('Y-m-01', strtotime("$year-$month-01"));
		$endDate   = date('Y-m-t', strtotime("$year-$month-01"));

		$allDates = array();

		$currentDate = $startDate;

		while ($currentDate <= $endDate) {

			$allDates[$currentDate] = array(
				'formatted_date'   => $currentDate,
				'recdate'          => displayDate($currentDate),
				'approved'         => 0,
				'rejected'         => 0,
				'queryprocess'     => 0,
				'customerdecline'  => 0,
				'totalapplication' => 0
			);

			$currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
		}

		$sql = "
			SELECT

				DATE(u.rec_date) AS formatted_date,

				SUM(CASE WHEN u.statusid = 1 THEN 1 ELSE 0 END) AS approved,
				SUM(CASE WHEN u.statusid = 2 THEN 1 ELSE 0 END) AS rejected,
				SUM(CASE WHEN u.statusid = 4 THEN 1 ELSE 0 END) AS queryprocess,
				SUM(CASE WHEN u.statusid = 7 THEN 1 ELSE 0 END) AS customerdecline,

				SUM(CASE WHEN u.statusid IN (1,2,4,7) THEN 1 ELSE 0 END) AS totalapplication

			FROM user_application_status u

			INNER JOIN
			(
				SELECT applicationid, MAX(id) AS lastid
				FROM user_application_status
				WHERE isDelete = 0
				GROUP BY applicationid
			) latest
			ON latest.lastid = u.id

			WHERE u.isDelete = 0
			AND DATE(u.rec_date) >= '{$startDate}'
			AND DATE(u.rec_date) <= '{$endDate}'

			GROUP BY DATE(u.rec_date)

			ORDER BY DATE(u.rec_date)
		";

		$query = $this->db->query($sql)->result();

		foreach ($query as $row) {

			if (isset($allDates[$row->formatted_date])) {

				$allDates[$row->formatted_date]['approved']         = $row->approved;
				$allDates[$row->formatted_date]['rejected']         = $row->rejected;
				$allDates[$row->formatted_date]['queryprocess']     = $row->queryprocess;
				$allDates[$row->formatted_date]['customerdecline']  = $row->customerdecline;
				$allDates[$row->formatted_date]['totalapplication'] = $row->totalapplication;
			}
		}

		return array_values($allDates);
	}

	public function getPlanApplicationReport()
	{
		$sql = "
			SELECT
				YEAR(u.rec_date) AS recyear,
				MONTH(u.rec_date) AS monthno,
				MONTHNAME(u.rec_date) AS recmonth,

				SUM(CASE WHEN u.statusid = 1 THEN 1 ELSE 0 END) AS approved,
				SUM(CASE WHEN u.statusid = 2 THEN 1 ELSE 0 END) AS rejected,
				SUM(CASE WHEN u.statusid = 4 THEN 1 ELSE 0 END) AS queryprocess,
				SUM(CASE WHEN u.statusid = 7 THEN 1 ELSE 0 END) AS customerdecline,

				SUM(CASE WHEN u.statusid IN (1,2,4,7) THEN 1 ELSE 0 END) AS totalapplication

			FROM plan_user_application_status u

			INNER JOIN
			(
				SELECT applicationid, MAX(id) AS lastid
				FROM plan_user_application_status
				WHERE isDelete = 0
				GROUP BY applicationid
			) latest
			ON latest.lastid = u.id

			WHERE u.isDelete = 0

			GROUP BY YEAR(u.rec_date), MONTH(u.rec_date)

			ORDER BY YEAR(u.rec_date) DESC,
					MONTH(u.rec_date) DESC
		";

		return $this->db->query($sql)->result();
	}

	public function getPlanApplicationReportDaywise($month, $year)
	{
		$startDate = date('Y-m-01', strtotime("$year-$month-01"));
		$endDate   = date('Y-m-t', strtotime("$year-$month-01"));

		$allDates = array();

		$currentDate = $startDate;

		while ($currentDate <= $endDate) {

			$allDates[$currentDate] = array(
				'formatted_date'   => $currentDate,
				'recdate'          => displayDate($currentDate),
				'approved'         => 0,
				'rejected'         => 0,
				'queryprocess'     => 0,
				'customerdecline'  => 0,
				'totalapplication' => 0
			);

			$currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
		}

		$sql = "
			SELECT

				DATE(u.rec_date) AS formatted_date,

				SUM(CASE WHEN u.statusid = 1 THEN 1 ELSE 0 END) AS approved,
				SUM(CASE WHEN u.statusid = 2 THEN 1 ELSE 0 END) AS rejected,
				SUM(CASE WHEN u.statusid = 4 THEN 1 ELSE 0 END) AS queryprocess,
				SUM(CASE WHEN u.statusid = 7 THEN 1 ELSE 0 END) AS customerdecline,

				SUM(CASE WHEN u.statusid IN (1,2,4,7) THEN 1 ELSE 0 END) AS totalapplication

			FROM plan_user_application_status u

			INNER JOIN
			(
				SELECT applicationid, MAX(id) AS lastid
				FROM plan_user_application_status
				WHERE isDelete = 0
				GROUP BY applicationid
			) latest
			ON latest.lastid = u.id

			WHERE u.isDelete = 0
			AND DATE(u.rec_date) >= '{$startDate}'
			AND DATE(u.rec_date) <= '{$endDate}'

			GROUP BY DATE(u.rec_date)

			ORDER BY DATE(u.rec_date)
		";

		$query = $this->db->query($sql)->result();

		foreach ($query as $row) {

			if (isset($allDates[$row->formatted_date])) {

				$allDates[$row->formatted_date]['approved']         = $row->approved;
				$allDates[$row->formatted_date]['rejected']         = $row->rejected;
				$allDates[$row->formatted_date]['queryprocess']     = $row->queryprocess;
				$allDates[$row->formatted_date]['customerdecline']  = $row->customerdecline;
				$allDates[$row->formatted_date]['totalapplication'] = $row->totalapplication;
			}
		}

		return array_values($allDates);
	}
}
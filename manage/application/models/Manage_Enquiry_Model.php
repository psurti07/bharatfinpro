<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Manage_Enquiry_Model extends CI_Model
{

	public function getcardoffersales($dt_to, $dt_from)
	{
		$query = $this->db->where('registration_date >=', $dt_to)
			->where('registration_date <=', $dt_from)
			->where('offerpage', 1)
			->where('paymentid', '!=')
			->where('isDelete', 0)
			->order_by('id asc')
			->get('cardoffer_order');
		return $query->result();
	}

	public function getspecialoffersales($dt_to, $dt_from)
	{
		$query = $this->db->where('registration_date >=', $dt_to)
			->where('registration_date <=', $dt_from)
			->where('offerpage', 2)
			->where('isDelete', 0)
			->order_by('id asc')
			->get('cardoffer_order');
		return $query->result();
	}

	public function getbumperoffersales($dt_to, $dt_from)
	{
		$query = $this->db->where('registration_date >=', $dt_to)
			->where('registration_date <=', $dt_from)
			->where('offerpage', 3)
			->where('isDelete', 0)
			->order_by('id asc')
			->get('cardoffer_order');
		return $query->result();
	}

	public function getstaroffersales($dt_to, $dt_from)
	{
		$query = $this->db->where('registration_date >=', $dt_to)
			->where('registration_date <=', $dt_from)
			->where('offerpage', 4)
			->where('isDelete', 0)
			->order_by('id asc')
			->get('cardoffer_order');
		return $query->result();
	}

	public function getprimeoffersales($dt_to, $dt_from)
	{
		$query = $this->db->where('registration_date >=', $dt_to)
			->where('registration_date <=', $dt_from)
			->where('offerpage', 5)
			->where('isDelete', 0)
			->order_by('id asc')
			->get('cardoffer_order');
		return $query->result();
	}

	public function getmegaoffersales($dt_to, $dt_from)
	{
		$query = $this->db->where('registration_date >=', $dt_to)
			->where('registration_date <=', $dt_from)
			->where('offerpage', 6)
			->where('isDelete', 0)
			->order_by('id asc')
			->get('cardoffer_order');
		return $query->result();
	}

	public function getsuperoffersales($dt_to, $dt_from)
	{
		$query = $this->db->where('registration_date >=', $dt_to)
			->where('registration_date <=', $dt_from)
			->where('offerpage', 7)
			->where('isDelete', 0)
			->order_by('id asc')
			->get('cardoffer_order');
		return $query->result();
	}

	public function getquickoffersales($dt_to, $dt_from)
	{
		$query = $this->db->where('registration_date >=', $dt_to)
			->where('registration_date <=', $dt_from)
			->where('offerpage', 8)
			->where('isDelete', 0)
			->order_by('id asc')
			->get('cardoffer_order');
		return $query->result();
	}

	public function changeleadstatus($statusid, $id)
	{
		if ($statusid == 1) {
			$data = array(
				'isCustomer' => 0
			);
		} else {
			$data = array(
				'isCustomer' => 1
			);
		}
		$sql_query = $this->db->where('id', $id)
			->update('cardoffer_order', $data);

		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function getcontactenqlist($dt_to, $dt_from)
	{
		$query = $this->db->where('rec_date >=', $dt_to . ' 00:00:00')
			->where('rec_date <=', $dt_from . ' 23:59:59')
			->order_by('rec_date asc')
			->get('contact_enquiry');
		return $query->result();
	}

	public function deletecontactenq($id)
	{
		$sql_query = $this->db->where('id', $id)
			->delete('contact_enquiry');
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function getcareerenqlist($dt_to, $dt_from)
	{
		$query = $this->db->select('e.*, o.title')
			->from('career_enquiry e')
			->join('career_opening o', 'o.id=e.applyfor')
			->where('e.rec_date >=', $dt_to . ' 00:00:00')
			->where('e.rec_date <=', $dt_from . ' 23:59:59')
			->where('e.isDelete', 0)
			->where('o.isDelete', 0)
			->order_by('e.rec_date asc')
			->get();
		return $query->result();
	}

	public function deletecareerenq($id)
	{
		$data = array(
			'isDelete' => 1
		);
		$sql_query = $this->db->where('id', $id)
			->update('career_enquiry', $data);
	}
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Manage_Banks_Model extends CI_Model
{

	public function getbanklist()
	{
		$query = $this->db->order_by('order_no desc')
			->get('banks');
		return $query->result();
	}

	public function getbankdetails($id)
	{
		$query = $this->db->where('id', $id)
			->get('banks');
		return $query->row();
	}

	public function addbank($data)
	{
		$this->db->insert('banks', $data);
		$bankid = $this->db->insert_id();

		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function editbank($id, $data)
	{
		$sql_query = $this->db->where('id', $id)
			->update('banks', $data);
		return $sql_query;
	}

	public function deletebank($id)
	{
		$data = array(
			'isDelete' => 1
		);
		$sql_query = $this->db->where('id', $id)
			->update('banks', $data);
	}

	public function restorebank($id)
	{
		$data = array(
			'isDelete' => 0
		);
		$sql_query = $this->db->where('id', $id)
			->update('banks', $data);
	}

	public function getloanstatuslist()
	{
		$query = $this->db->order_by('priorityno asc')
			->get('loanstatus');
		return $query->result();
	}

	/*public function settleentry(){
		$query_app = $this->db->where('isDelete', 0)
				->where('id >', 0)
				->where('id <=', 500)
				->get('user_application')
				->result();

		if(count($query_app)) {
			foreach ($query_app as $row) {
				echo $row->userid;
				echo "<br/>";

				$datanew = array(
					'cardtype' => $row->loantype
				);

				$this->load->model('Manage_User_Model');
				$response_user = $this->Manage_User_Model->updateuserprofile($row->userid, $datanew);
			}
		}

		return true;      
	}*/

	public function getapplylinkslist()
	{
		$query = $this->db->select('a.*, b.bank_name, b.bank_image')
			->from('bankapplylink a')
			->join('banks b', 'b.id=a.bankid')
			->order_by('rec_date asc')
			->get()
			->result();
		return $query;
	}

	public function getlinkdetails($id)
	{
		$query = $this->db->where('id', $id)
			->get('bankapplylink')
			->row();
		return $query;
	}

	public function addapplylink($data)
	{
		$this->db->insert('bankapplylink', $data);
		$id = $this->db->insert_id();
		return $id;
	}

	public function editapplylink($id, $data)
	{
		$query = $this->db->where('id', $id)
			->update('bankapplylink', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function deleteapplylink($id)
	{
		$data = array(
			'isDelete' => 1
		);
		$query = $this->db->where('id', $id)
			->update('bankapplylink', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function restoreapplylink($id)
	{
		$data = array(
			'isDelete' => 0
		);
		$query = $this->db->where('id', $id)
			->update('bankapplylink', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}


	public function getroipackageslist()
	{
		$query = $this->db->select('r.*, b.bank_name, b.bank_image')
			->from('roipackages r')
			->join('banks b', 'b.id=r.bankid')
			->order_by('rec_date asc')
			->get()
			->result();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function getpackagedetails($id)
	{
		$query = $this->db->where('id', $id)
			->get('roipackages')
			->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function addroipackage($data)
	{
		$this->db->insert('roipackages', $data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id;
	}

	public function editroipackage($id, $data)
	{
		$query = $this->db->where('id', $id)
			->update('roipackages', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

		$this->db->close();
		$this->db->initialize();

		return $flag;
	}

	public function deleteroipackage($id)
	{
		$data = array(
			'isDelete' => 1
		);
		$query = $this->db->where('id', $id)
			->update('roipackages', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

		$this->db->close();
		$this->db->initialize();

		return $flag;
	}

	public function restoreroipackage($id)
	{
		$data = array(
			'isDelete' => 0
		);
		$query = $this->db->where('id', $id)
			->update('roipackages', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

		$this->db->close();
		$this->db->initialize();

		return $flag;
	}
}
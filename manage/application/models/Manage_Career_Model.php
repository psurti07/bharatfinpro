<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Manage_Career_Model extends CI_Model {

	public function getopeninglist(){
		$query = $this->db->where('isDelete', 0)
				->order_by('id asc')
				->get('career_opening');
		return $query->result();      
	}

	public function getcareerdetails($id){
		$query = $this->db->where('id', $id)
				->get('career_opening');
		return $query->row();      
	}

	public function addcareer($data){
		$this->db->insert('career_opening',$data);
		$bankid = $this->db->insert_id();

		return ($this->db->affected_rows() != 1) ? false : true; 
	}

	public function editcareer($id, $data){
		$sql_query=$this->db->where('id', $id)
					->update('career_opening', $data); 
		return $sql_query;
	}

	public function changestatus($statusid, $id){
		if($statusid == 1) {
			$data = array(
			   'isActive' => 0
			);
		}
		else {
			$data = array(
			   'isActive' => 1
			);
		}
		$sql_query=$this->db->where('id', $id)
					->update('career_opening', $data); 
	}

	public function deletecareer($id){
		$data = array(
		   'isDelete' => 1
		);
		$sql_query=$this->db->where('id', $id)
					->update('career_opening', $data); 
	}

}


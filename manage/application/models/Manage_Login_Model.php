<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Manage_Login_Model extends CI_Model {


	public function checklogin($emailid, $password){
		$account = $this->db->where('emailid',$emailid)
					->where('password',$password)
					->where('isActive',1)
					->where('isDelete',0)
					->get('administration')->row();

		if($account != NULL){
			$data = array(
				'adminid' => $account->id,
				'login_at' => date('Y-m-d H:i:s'),
				'server_ip' => getUserIpAddr()
				);
			$this->db->insert('administration_log',$data);
			$this->session->set_userdata('adminlogid',$this->db->insert_id());
			return $account;
		}
		else {
			return NULL;
		}
	}

	public function checkoldpasswrod($id, $oldpassword){
		$account = $this->db->where('id',$id)
					->get('administration')->row();

		$enc_password = encryptPassword($account->emailid, $oldpassword);

		$query = $this->db->where('id',$id)
				->where('password',$enc_password)
				->count_all_results('administration');

		if($query == 1) {
			return $account->emailid;
		}
		else {
			return NULL;
		}
	}

	public function changepassword($id, $newpassword){
		$data = array(
		   'password' => $newpassword,
		 );
		
		$sql_query=$this->db->where('id', $id)
				->update('administration', $data);

		return $sql_query;
	}

	public function updateadminlog($adminlogid){
		$data = array(
		   'logout_at' => date('Y-m-d H:i:s'),
		 );
		$sql_query=$this->db->where('id', $adminlogid)
					->update('administration_log', $data); 
	}

}


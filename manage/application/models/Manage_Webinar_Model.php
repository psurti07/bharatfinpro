<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Manage_Webinar_Model extends CI_Model {

    public function getuserlist($dt_to, $dt_from){
				$query = $this->db->select('uwr.*')
			->from('user_webinar_registration uwr')
			->join('webinar_order wo', 'wo.userid = uwr.id')
			->where('uwr.rec_date >=', $dt_to.' 00:00:00')
			->where('uwr.rec_date <=', $dt_from.' 23:59:59')
			->where('wo.isUser', 2)
			->where('uwr.isDelete', 0)
			->where('wo.isDelete', 0)
			->get()
			->result();
		return $query;
	}
    public function getleadsuserlist($dt_to, $dt_from){
		
		$query = $this->db->select('uwr.*')
			->from('user_webinar_registration uwr')
			->join('webinar_order wo', 'wo.userid = uwr.id')
			->where('uwr.rec_date >=', $dt_to.' 00:00:00')
			->where('uwr.rec_date <=', $dt_from.' 23:59:59')
			->where('wo.isUser !=',2)
			->where('uwr.isDelete', 0)
			->where('wo.isDelete', 0)
			->get()
			->result();
		
		return $query;    
	}
	public function addevent($data){
		$this->db->insert('webinar_event',$data);
		$id = $this->db->insert_id();

		$this->db->close();
		$this->db->initialize();

		return $id; 
	}
	 public function geteventlist(){
		$query = $this->db->select('*')
				->from('webinar_event r')
				->where('isActive',1)
				->where('isDelete',0)
				->order_by('id asc')
				->get()
				->result();

		$this->db->close();
		$this->db->initialize();

		return $query;      
	}
	public function geteventdetails($id){
		$query = $this->db->where('id',$id)
				->get('webinar_event')
				->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}
	public function editevent($id, $data){
		$query = $this->db->where('id', $id)
					->update('webinar_event', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;

		$this->db->close();
		$this->db->initialize();

		return $flag;
	}
	 public function getonboardlist($dt_to, $dt_from){
		$query = $this->db->select('*')
				->from('onboarding_transaction r')
				->where('date >=', $dt_to)
				->where('date <=', $dt_from)
				->where('isActive',1)
				->where('isDelete',0)
				->order_by('id asc')
				->get()
				->result();

		$this->db->close();
		$this->db->initialize();

		return $query;      
	}

	public function get_webinar_attend_list($dt_to, $dt_from){
		$query = $this->db->select('uwr.*, wo.isAttend, wo.webinar_id, we.event_title, we.event_datetime')
			->from('webinar_order wo')
			->join('user_webinar_registration uwr', 'uwr.id = wo.userid')
			->join('webinar_event we', 'we.id = wo.webinar_id')
			->where('uwr.rec_date >=', $dt_to.' 00:00:00')
			->where('uwr.rec_date <=', $dt_from.' 23:59:59')
			->where('wo.isUser', 2)
			->where('uwr.isActive', 1)
			->where('uwr.isDelete', 0)
			->where('wo.isDelete', 0)
			->get()
			->result();
		return $query;
	}

	public function attend_webinar_update($webinar_id,$user_id){
		
		$query = $this->db->where('webinar_id',$webinar_id)
						->where('userid',$user_id)
						->get('webinar_order')
						->row();
						
		if($query != ''){
			if($query->isAttend == 0){
				$data = array(
					'isAttend' => 1
				);
			} else if($query->isAttend == 1){
				$data = array(
					'isAttend' => 0
				);
			}
			$res2 = $this->db->where('id', $query->id)
						->update('webinar_order', $data);

			$flag = ($this->db->affected_rows() != 1) ? false : true;
		}

		return $flag;
		
		
	}

	public function community_webinar_update($webinar_id,$user_id){
		
		$query = $this->db->where('program_id',$webinar_id)
						->where('id',$user_id)
						->get('user_webinar_registration')
						->row();
						
		if($query != ''){
			if($query->is_joincommunity == 0){
				$data = array(
					'is_joincommunity' => 1
				);
			} else if($query->is_joincommunity == 1){
				$data = array(
					'is_joincommunity' => 0
				);
			}
			$res2 = $this->db->where('id', $query->id)
						->update('user_webinar_registration', $data);

			$flag = ($this->db->affected_rows() != 1) ? false : true;
		}

		return $flag;
		
		
	}

	public function manageaccountdeletepermanent($id){
		
		$data = array(
		   'isDelete' => 1
		);
		
		$res2 = $this->db->where('id', $id)
						->update('user_webinar_registration', $data);
					
		$res3 = $this->db->where('userid', $id)
						->update('webinar_order', $data);
		
		$res4 = $this->db->where('userid', $id)
						->or_where(['inv_for'=>51])
						->update('invoice', $data);

		$this->db->close();
		$this->db->initialize();

		return true;
	}

	public function get_schedule_slot_detail($dt_to, $dt_from){

	$query = $this->db->select('r.id, r.date, r.time, r.language, r.status, r.remarks, a.first_name, a.last_name, a.mobile,')
				->from('schedule_slots r')
				->join('user_webinar_registration a','a.id=r.user_id')
				->where('r.date >=', $dt_to.' 00:00:00')
				->where('r.date <=', $dt_from.' 23:59:59')
				->where('r.is_deleted',0)
				->order_by('r.id asc')
				->get()
				->result();

		$this->db->close();
		$this->db->initialize();

		return $query;

	}
	public function getUserDetail($user_id){

		
		$queryusr = $this->db->select('*')
			->from('user_webinar_registration')
			->where('id', $user_id)
			->where('isDelete', 0)
			->get();
		$data['user'] = $queryusr->row();

		$query = $this->db->select('wo.*, w.event_datetime, w.event_title, w.mentor_name, w.language, w.event_image')
			->from('webinar_order wo')
			->join('webinar_event w', 'w.id = wo.webinar_id')
			->where('wo.userid', $user_id)
			->where('wo.isUser', 2)
			->where('wo.isDelete', 0)
			->get();
		$data['orders'] = $query->result();
		return $data;

	}

	
	public function getlead_UserDetail($user_id){

		
		$queryusr = $this->db->select('*')
			->from('user_webinar_registration')
			->where('id', $user_id)
			->where('isDelete', 0)
			->get();
		$data['user'] = $queryusr->row();

		$query = $this->db->select('wo.*, w.event_datetime, w.event_title, w.mentor_name, w.language, w.event_image')
			->from('webinar_order wo')
			->join('webinar_event w', 'w.id = wo.webinar_id')
			->where('wo.userid', $user_id)
			->where('wo.isUser !=', 2)
			->where('wo.isDelete', 0)
			->get();
		$data['orders'] = $query->result();
		return $data;

	}

	public function delete_userlead_Detail($id){
		$data = array(
					'isDelete' => 1
				);
		$res2 = $this->db->where('id', $id)
					->update('user_webinar_registration', $data);

		$flag = ($this->db->affected_rows() != 1) ? false : true;
		return $flag;
	}

	
	public function delete_user_Detail($id){
		$data = array(
					'isDelete' => 1
				);
		$res2 = $this->db->where('id', $id)
					->update('user_webinar_registration', $data);

		$res3 = $this->db->where('userid', $id)
					->update('webinar_order', $data);

		$res4 = $this->db->where('userid', $id)
					->where('inv_for', 51)	
					->update('invoice', $data);

		$flag = ($this->db->affected_rows() != 1) ? false : true;
		return $flag;
	}

	public function getwebinardetails($id){
		$query = $this->db->select('o.*, r.first_name as fullname, r.mobile, r.email')
					->from('webinar_order o')
					->join('user_webinar_registration r','r.id=o.userid')
					->where('r.id',$id)
					->get()
					->row();

		$this->db->close();
		$this->db->initialize();

		return $query;
	}

	public function getwebinarrecord($id){
		$query = $this->db->where('id',$id)
					->get('webinar_order')
					->row();

		$this->db->close();
		$this->db->initialize();

		return $query;  
	}

	public function getinvoicedetails($id, $cardid){
		$details = array();

		$queryuser = $this->db->where('id',$id)
					->get('user_webinar_registration');
		$details['userinfo'] = $queryuser->row();   

		$queryref = $this->db->where('id',$cardid)
					->get('webinar_order');
		$details['orderinfo'] = $queryref->row(); 

		$where = "(inv_for=51)";
		$queryref = $this->db->where('userid',$id)
					->where('cardid',$cardid)
					->where($where)
					->get('invoice');
		$details['invoiceinfo'] = $queryref->row();

		$this->db->close();
		$this->db->initialize();

		return $details;    
	}

	public function getuserdata($id){
		$queryuser = $this->db->where('id',$id)
					->get('user_webinar_registration')
					->row();

		$this->db->close();
		$this->db->initialize();

		return $queryuser;    
	}

	public function isdnd_update($user_id, $sloat_id){
		
		$query = $this->db->where('id',$sloat_id)
						->where('user_id',$user_id)
						->get('schedule_slots')
						->row();
		
		if($query != ''){
			if($query->isDnd == 0){
				$data = array(
					'isDnd' => 1
				);
			} else if($query->isDnd == 1){
				$data = array(
					'isDnd' => 0
				);
			}
			$res2 = $this->db->where('id', $query->id)
						->update('schedule_slots', $data);

			$flag = ($this->db->affected_rows() != 1) ? false : true;
		}

		return $flag;
		
		
	}

	public function getUser_slot_Detail($id){

		$query = $this->db->select('s.*, r.first_name, r.last_name, r.mobile, r.email')
			->from('schedule_slots s')
			->join('user_webinar_registration r', 'r.id = s.user_id')
			->where('s.id', $id)
			->where('s.is_deleted', 0)
			->get();
		$slot_data = $query->row();
		return $slot_data;

	}

	public function update_schedule_sloat($id, $data){
		$res2 = $this->db->where('id', $id)
						->update('schedule_slots', $data);
		$flag = ($this->db->affected_rows() != 1) ? false : true;
		return $flag;
	}

	

}
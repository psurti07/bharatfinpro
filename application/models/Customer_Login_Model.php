<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Customer_Login_Model extends CI_Model {

	public function checklogin($mobile, $password){
		$account = $this->db->where('mobile',$mobile)
					->where('new_password',$password)
					->where('isUser',2)
					->where('isActive',1)
					->where('isDelete',0)
					->get('user_registration')->row();
		return $account;
	}

	public function loginlog($id){
		$data = array(
			'customerid' => $id,
			'login_at' => date('Y-m-d H:i:s'),
			'server_ip' => getUserIpAddr()
		);
		$this->db->insert('customer_log',$data);
		$this->session->set_userdata('pyf-customerlogid',$this->db->insert_id());
		return true;
	}

	public function updatecustomerlog($customerlogid){
		$data = array(
		   'logout_at' => date('Y-m-d H:i:s'),
		 );

		$sql_query=$this->db->where('id', $customerlogid)
					->update('customer_log', $data); 
	}

	public function passwordForgetmsg($mobile) {
		$account = $this->db->where('mobile', $mobile)
					->where('isUser',2)
					->where('isActive',1)
					->where('isDelete',0)
					->get('user_registration')
					->row();

		if($account) {
			$password = random_code(6); 
			$encpassword = stringCrypt($password, 'encrypt'); 
			$new_encpassword = md5($password); 
			
			$data = array(
				'update_date' => date('Y-m-d H:i:s'),
		   		'password' => $encpassword,
				'new_password' => $new_encpassword,
			);

			$sql_query=$this->db->where('id', $account->id)
						->update('user_registration', $data); 

			// Send SMS
			$message = "Hello ".$account->fullname.", Your account new password is ".$password.". (Do not share it with anyone). Thanks & Regards, Prayosha Fincart";
			$smsresponse = sendtextSMSobb($account->mobile, $message, 'main');
			return true;
		}
		else{
			return false;
		}
	}

}


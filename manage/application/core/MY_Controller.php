<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class MY_Controller extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->check_user_session();

		$role = $this->session->userdata('admintype');
        
        $allowed_uris_for_role2 = ['report/gstdata', 'account/invoice', 'report/tdsdata'];
        $current_uri = uri_string();

        if ($role == 2 && !in_array($current_uri, $allowed_uris_for_role2)) {
            redirect('report/gstdata');
            exit;
        }
	}

	private function check_user_session() {
        if (!$this->session->userdata('adminid')) {
            return;
        }

        $adminid = $this->session->userdata('adminid');
        $session_password = $this->session->userdata('adminpassword');

        $admin = $this->db->get_where('administration', ['id' => $adminid])->row();

       /*  if (!$admin || $admin->isDelete == 1 || $admin->isActive == 0 || $admin->password !== $session_password) { */
	    if (!$admin || $admin->password !== $session_password) {
            $this->session->sess_destroy();
            redirect('login'); 
        }
    }

}
?>
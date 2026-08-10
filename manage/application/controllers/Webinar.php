<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Webinar extends MY_Controller {
	
	function __construct(){
		parent::__construct();

		if($this->session->userdata('adminid') == FALSE) {
			redirect('login');
		}
        $this->load->model('Manage_Webinar_Model');
	}
    public function index(){
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$userlist = $this->Manage_Webinar_Model->getuserlist($dt_to, $dt_from);
		$this->load->view('webinar_user',['userlist'=>$userlist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

    public function webinarleads(){

		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}
		
		$userlist = $this->Manage_Webinar_Model->getleadsuserlist($dt_to, $dt_from);

		$this->load->view('webinar-leads',['userlist'=>$userlist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}
	public function webinar_event_detail()
	{
		
		$eventlist = $this->Manage_Webinar_Model->geteventlist();
		$this->load->view('webinar-event', ['eventlist'=>$eventlist]);
	}
	public function webinar_event()
	{
		$this->load->view('webinar-event-add');
	}
	public function addevent()
	{
		// Default: keep old image
    $event_image = '';

    // Check if new image uploaded
    if (!empty($_FILES['event_image']['name'])) {

        $this->load->library('upload');

        $config = array(
            'allowed_types' => 'gif|jpg|jpeg|png',
            'upload_path'   => '../assets/images/webinarpage/',
            'overwrite'     => FALSE,
            'max_size'      => 20000,
            'file_name'     => time() . '_' . $_FILES['event_image']['name']
        );
		
        $this->upload->initialize($config);

        if ($this->upload->do_upload('event_image')) {
            $image_data = $this->upload->data();
            $event_image = $image_data['file_name']; // ✅ use uploaded file
			
        } else {
            $error = strip_tags($this->upload->display_errors());
            $this->session->set_flashdata('error', $error);
           // redirect($_SERVER['HTTP_REFERER']);
        }
    }
	
    // Save data
    $data = array(
        'event_type'        => $this->input->post('event_type'),
        'event_name'        => $this->input->post('eventname'),
        'event_datetime'    => $this->input->post('eventdate'),
        'event_main_price'  => $this->input->post('mainprice'),
        'event_offer_price' => $this->input->post('offerprice'),
        'event_title'       => $this->input->post('event_title'),
        'event_desc_1'      => $this->input->post('event_desc'),
        'event_image'       => $event_image,
        'community_link'    => $this->input->post('community_link'),
        'mentor_name'       => $this->input->post('event_mentor'),
        'language'          => $this->input->post('event_lag'),
        'isActive'          => 1,
        'isDelete'          => 0
    );
		
		$eventid = $this->Manage_Webinar_Model->addevent($data);
		redirect('webinar/webinar_event_detail');
	}
	public function editForm($id){
		$eventdetails = $this->Manage_Webinar_Model->geteventdetails($id);
		$this->load->view('webinar-event-edit',['eventdetails'=>$eventdetails]);
	}

	public function editWebinar()
{
    $id = $this->input->post('id');

    // Default: keep old image
    $event_image = '';

    // Check if new image uploaded
    if (!empty($_FILES['event_image']['name'])) {

        $this->load->library('upload');

        $config = array(
            'allowed_types' => 'gif|jpg|jpeg|png',
            'upload_path'   => '../assets/images/webinarpage/',
            'overwrite'     => FALSE,
            'max_size'      => 20000,
            'file_name'     => time() . '_' . $_FILES['event_image']['name']
        );
		
        $this->upload->initialize($config);

        if ($this->upload->do_upload('event_image')) {
            $image_data = $this->upload->data();
            $event_image = $image_data['file_name']; // ✅ use uploaded file
			
        } else {
            $error = strip_tags($this->upload->display_errors());
            $this->session->set_flashdata('error', $error);
           // redirect($_SERVER['HTTP_REFERER']);
        }
    }

    // Save data
    $data = array(
        'event_type'        => $this->input->post('event_type'),
        'event_name'        => $this->input->post('eventname'),
        'event_datetime'    => $this->input->post('eventdate'),
        'event_main_price'  => $this->input->post('mainprice'),
        'event_offer_price' => $this->input->post('offerprice'),
        'event_title'       => $this->input->post('event_title'),
        'event_desc_1'      => $this->input->post('event_desc'),
        'event_image'       => $event_image,
        'community_link'    => $this->input->post('community_link'),
        'mentor_name'       => $this->input->post('event_mentor'),
        'language'          => $this->input->post('event_lag'),
        'isActive'          => 1,
        'isDelete'          => 0
    );

    $this->Manage_Webinar_Model->editevent($id, $data);

    $this->session->set_flashdata('success', 'Webinar updated successfully!');
    redirect('webinar/webinar_event_detail');
}

	public function webinar_onboard_detail(){

		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$onboardlist = $this->Manage_Webinar_Model->getonboardlist($dt_to, $dt_from);
		$this->load->view('webinar-onboard-list', ['onboardlist'=>$onboardlist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

    public function webinar_attend_detail(){

		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if(isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if(isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$attenddetaillist = $this->Manage_Webinar_Model->get_webinar_attend_list($dt_to, $dt_from);
       
		$this->load->view('webinar-attend-list', ['attenddetaillist'=>$attenddetaillist, 'dt_to'=>$dt_to, 'dt_from'=>$dt_from]);
	}

    public function attand_webinar($webinar_id,$user_id){
       $this->load->model('Manage_Webinar_Model');
	   $response = $this->Manage_Webinar_Model->attend_webinar_update($webinar_id,$user_id);
       $this->session->set_flashdata('success','Status Changed Successfully..!');
       redirect('Webinar/webinar_attend_detail');
    }
    public function join_community($webinar_id,$user_id){
       $this->load->model('Manage_Webinar_Model');
	   $response = $this->Manage_Webinar_Model->community_webinar_update($webinar_id,$user_id);
       $this->session->set_flashdata('success','Status Changed Successfully..!');
       redirect('Webinar');
    }

	public function accountdeletepermanently($id){
		$this->load->model('Manage_Webinar_Model');
		$response = $this->Manage_Webinar_Model->manageaccountdeletepermanent($id);
		$this->session->set_flashdata('success','Customer account deleted successfully!');
		redirect('Webinar');
	}
    public function schedule_slot_detail() {
		$dt_to = date('Y-m-d', strtotime('-1 days'));
		$dt_from = date('Y-m-d');

		if (isset($_REQUEST['dt_to'])) {
			$dt_to = $_REQUEST['dt_to'];
		}

		if (isset($_REQUEST['dt_from'])) {
			$dt_from = $_REQUEST['dt_from'];
		}

		$this->load->model('Manage_Webinar_Model');
		$userlist = $this->Manage_Webinar_Model->get_schedule_slot_detail($dt_to, $dt_from);
		$this->load->view('report-schedule-slot', ['userlist' => $userlist, 'dt_to' => $dt_to, 'dt_from' => $dt_from]);
	}

    public function webinar_userdetail()
    {
        $program_id = $this->input->post('program_id');
        $id         = $this->input->post('id');

        $userdata = $this->Manage_Webinar_Model->getUserDetail($id);
        $userdata['schedule_link'] = 'https://bharatfinpro.com/schedule-slot?id=' . encryptData($userdata['user']->id);
        echo json_encode($userdata);
    }

    public function webinar_leadetail()
    {
        $program_id = $this->input->post('program_id');
        $id         = $this->input->post('id');
        $userdata = $this->Manage_Webinar_Model->getlead_UserDetail($id);
       
        echo json_encode($userdata);
    }

    public function deletewebinar_lead($id)
    {
    
        $userdata = $this->Manage_Webinar_Model->delete_userlead_Detail($id);
       return redirect('webinar/webinarleads');
    }

    
    public function deletewebinar_user($id)
    {
    
        $userdata = $this->Manage_Webinar_Model->delete_user_Detail($id);
       return redirect('webinar');
    }

    public function downloadinvoice($id, $cardid){
		$this->load->model('Manage_Webinar_Model');
		$invdetails = $this->Manage_Webinar_Model->getinvoicedetails($id, $cardid);
		$invoiceno = 'INV-'.$invdetails['orderinfo']->id;
		
		$this->load->library('pdf');

		$html = $this->load->view('webinar-user-invoice', ['invdetails'=>$invdetails], true);

		$this->pdf->createPDF($html, $invoiceno, false);
	}
    public function dnd_status($user_id, $sloat_id){
       $this->load->model('Manage_Webinar_Model');
	   $response = $this->Manage_Webinar_Model->isdnd_update($user_id, $sloat_id);
       $this->session->set_flashdata('success','Status Changed Successfully..!');
       redirect('webinar/schedule_slot_detail');
    }

     public function user_schedule_slot_detail()
    {
        $id         = $this->input->post('id');
        $userdata = $this->Manage_Webinar_Model->getUser_slot_Detail($id);

        echo json_encode($userdata);
    }

    public function update_schedule_slot(){
        // Save data
        $this->load->model('Manage_Webinar_Model');
        $id = $this->input->post('schid');
        if($this->input->post('upadte_remark') != ''){
            $remark = $this->input->post('upadte_remark');
        } else {
            $remark = $this->input->post('remark');
        }
        $data = array(
            'date'        => date('Y-m-d', strtotime($this->input->post('schedule_date'))),
            'time'        => $this->input->post('schedule_time'),
            'remarks'    => $remark,
            'status'  => $this->input->post('status'),
        );

        $this->Manage_Webinar_Model->update_schedule_sloat($id, $data);
        redirect('webinar/schedule_slot_detail');

    }
	
	
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Schedule_Slot extends CI_Controller
{
	public function index(){
		$this->load->model('Site_Webinar_Model');
        $id = decryptData($this->input->get('id'));
        $userdata = $this->Site_Webinar_Model->get_schedule_user_data($id);
		$this->load->view('schedule-slot', ['userdata'=>$userdata]);
	}
    public function schedule(){
        $this->load->model('Site_Webinar_Model');
        $data = array(
                'user_id' => $_REQUEST['user_id'],
                'date' => date('Y-m-d', strtotime($_REQUEST['date'])),
                'time' => date('H:i', strtotime($_REQUEST['time'])),
                'language' => $_REQUEST['language'],
                'is_deleted' => 0
            );
		
		$userid = $this->Site_Webinar_Model->insert_schedule_slot($data);
        if($userid){
            $userdata = $this->Site_Webinar_Model->get_schedule_user_data($userid);
            $slotData = $this->Site_Webinar_Model->get_schedule_slot($userid);
             // ==========================================
            // SEND DATA TO INDIAAKAROBAR API
            // ==========================================
            $this->sendScheduleToIndiakarobar($userdata, $slotData, 'create');
            $this->load->view('schedule-sucess',['userdata'=>$userdata]);
        } else {
            return redirect('Schedule_Slot');
        }
        //$this->load->view('schedule-sucess');
    }

    public function reschedule(){
        $this->load->model('Site_Webinar_Model');
        $id = $_REQUEST['userid'];
        $update = $this->Site_Webinar_Model->upate_schedule_slot($id);
        $userdata = $this->Site_Webinar_Model->get_schedule_user_data($id);
        // Get new slot data after update
        $newSlotData = $this->Site_Webinar_Model->get_schedule_slot($id);

        // ==========================================
        // SEND UPDATE DATA TO INDIAAKAROBAR API
        // ==========================================
        if ($newSlotData) {
            $this->sendScheduleToIndiakarobar($userdata, $newSlotData, 'update', $newSlotData->slot_id);
        }
        $this->load->view('schedule-slot', ['userdata'=>$userdata]);
    }
    /**
     * Send schedule data to Indiakarobar API
     */
    private function sendScheduleToIndiakarobar($userdata, $slotData, $action = 'create', $slotId = null)
    {
        try {
            $data = array(
                'company_code' => 'UBSFC1346',
                'company_name' => 'Urbansmallfinance',
                'user_name' => $userdata->first_name . ' ' . $userdata->last_name,
                'user_email' => $userdata->email,
                'user_mobile' => $userdata->mobile ?? null,
                'schedule_date' => $slotData->date,
                'schedule_time' => $slotData->time,
                'language' => $slotData->language ?? null,
                'status' => $slotData->status ?? 1
            );

            $response = send_schedule_call_data($data, $action, $slotId);

            if ($response && isset($response['status']) && $response['status'] === true) {
                log_message('info', 'Schedule data sent to Indiakarobar successfully', [
                    'action' => $action,
                    'user_id' => $userdata->id
                ]);
            } else {
                log_message('error', 'Failed to send schedule data to Indiakarobar', [
                    'action' => $action,
                    'user_id' => $userdata->id,
                    'response' => $response
                ]);
            }
        } catch (Exception $e) {
            log_message('error', 'Error sending schedule to Indiakarobar: ' . $e->getMessage());
        }
    }
}
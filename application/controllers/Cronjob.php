<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Cronjob extends CI_Controller {
	
	public function index(){
		return redirect()->to('Infopage');
	}

	/* Digital personal loan customer marketing message */
	public function custremarketing(){
		die;
		$this->load->model('Site_Cronjob_Model');
		$schedule = 'z9999';
		$schedule_arr = array();

		$cronjobs = array();
		$cronjobs['a0'] = '15 10 * * *';
		$cronjobs['b0'] = '45 20 * * *';

		$cronjobs['a1'] = '30 10 * * *';
		$cronjobs['b1'] = '30 16 * * *';

		$cronjobs['a2'] = '0 11 * * *';

		$cronjobs['a6'] = '0 12 * * *';

		$cronjobs['a10'] = '0 14 * * *';
		
		foreach($cronjobs as $method=>$cron) {
			$time = time();
		        if(is_time_cron($time, $cron)) {
		            $schedule = substr($method, 1);
					$response = $this->Site_Cronjob_Model->customer_leads_marketing($schedule);
				}
		}
		
		die;
	}
	/* Digital personal loan customer marketing message */

	/*public function custremarketing(){
		$this->load->model('Site_Cronjob_Model');

		$cronjobs = array();

		$schedule[] = '0';
		$schedule[] = '1';
		$schedule[] = '2';
		$schedule[] = '3';
		$schedule[] = '6';
		$schedule[] = '11';
		$schedule[] = '13';
		$schedule[] = '16';
		$schedule[] = '21';
		$schedule[] = '26';
		$schedule[] = '31';
		$schedule[] = '36';
		$schedule[] = '41';
		$schedule[] = '46';
		$schedule[] = '51';
		$schedule[] = '61';


		$response = $this->Site_Cronjob_Model->customer_leads_marketing($schedule);

		die;
	}*/
	/* Digital personal loan customer marketing message */

	/* Whatsapp marketing message */
	public function whatsappremarketing()
	{
		die;
		$this->load->model('Site_Cronjob_Model');
		//$schedule = 'z9999';
		$schedule_arr = array();

		$cronjobs = array();

		$cronjobs['a1'] = '0 7 * * *';

		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$response = $this->Site_Cronjob_Model->whatsapp_marketing_message($schedule);
			}
		}
		die;
	}

	/* Whatsapp Interakt marketing message */
	public function whatsappinteraktremarketing() {
		die;
		$this->load->model('Site_Cronjob_Model');
		$schedule = 'z9999';
		$schedule_arr = array();

		$cronjobs = array();
		$cronjobs['a0'] = '0 8 * * *';
		$cronjobs['b0'] = '0 21 * * *';

		$cronjobs['a1'] = '0 9 * * *';
		$cronjobs['b1'] = '0 20 * * *';

		$cronjobs['a2'] = '0 10 * * *';
		$cronjobs['b2'] = '0 19 * * *';
  
		$cronjobs['a3'] = '0 11 * * *';
		$cronjobs['b3'] = '0 18 * * *';

		$cronjobs['a5'] = '0 12 * * *';
		$cronjobs['b5'] = '0 17 * * *'; 

		$cronjobs['a10'] = '0 13 * * *';

		$cronjobs['a15'] = '0 15 * * *';

		$cronjobs['a30'] = '0 23 * * *';
		
		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$response = $this->Site_Cronjob_Model->whatsapp_interakt_marketing_message($schedule);
			}
		}
		die;
	}
	/* Whatsapp marketing message */

	/* Whatsapp Interakt marketing message */
	public function whatsappinteraktremarketing_new() {
		die;
		$this->load->model('Site_Cronjob_Model');
		$schedule = 'z9999';
		$schedule_arr = array();

		$cronjobs = array();

		$cronjobs['a6'] = '45 8 * * *';
		$cronjobs['b6'] = '45 16 * * *';

		$cronjobs['a7'] = '45 9 * * *';
		$cronjobs['b7'] = '45 17 * * *';

		$cronjobs['a8'] = '45 10 * * *';
		$cronjobs['b8'] = '45 18 * * *';

		$cronjobs['a10'] = '45 11 * * *';
		$cronjobs['b10'] = '45 19 * * *';

		$cronjobs['a12'] = '45 12 * * *';
		$cronjobs['b12'] = '45 20 * * *';

		$cronjobs['a15'] = '45 21 * * *';

		$cronjobs['a18'] = '45 22 * * *';

		$cronjobs['a20'] = '30 8 * * *';

		$cronjobs['a30'] = '30 9 * * *';
		
		
		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$response = $this->Site_Cronjob_Model->whatsapp_marketing_message_new($schedule);
			}
		}
		die;
	}

	/* Whatsapp Interakt marketing message */
	public function plan_interakt_remarketing() {
		die;
		$this->load->model('Site_Cronjob_Model');
		$schedule = 'z9999';
		$schedule_arr = array();

		$cronjobs = array();

		$cronjobs['a0'] = '30 8 * * *';
		$cronjobs['b0'] = '30 21 * * *';

		$cronjobs['a1'] = '30 9 * * *';
		$cronjobs['b1'] = '30 20 * * *';

		$cronjobs['a2'] = '30 10 * * *';
		$cronjobs['b2'] = '30 19 * * *';

		$cronjobs['a3'] = '30 11 * * *';
		$cronjobs['b3'] = '30 18 * * *';

		$cronjobs['a5'] = '30 12 * * *';
		$cronjobs['b5'] = '30 17 * * *';

		$cronjobs['a10'] = '30 13 * * *';

		$cronjobs['a15'] = '30 15 * * *';

		$cronjobs['a30'] = '0 23 * * *';
		
		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$response = $this->Site_Cronjob_Model->plan_whatsapp_intrekt_message($schedule);
			}
		}
		die;
	}

	/*public function whatsappremarketing() {
		$this->load->model('Site_Cronjob_Model');
		//$schedule = 'z9999';
		$schedule_arr = array();

		$cronjobs = array();

		$schedule[] = '0';
		$schedule[] = '1';
		$schedule[] = '2';
		$schedule[] = '3';
		$schedule[] = '5';
		$schedule[] = '7';
		$schedule[] = '10';
		$schedule[] = '12';
		$schedule[] = '15';
		$schedule[] = '17';
		$schedule[] = '20';
		$schedule[] = '25';
		$schedule[] = '30';
		$schedule[] = '40';
		$schedule[] = '45';
		$schedule[] = '50';
		$schedule[] = '60';

	
		
		$response = $this->Site_Cronjob_Model->whatsapp_marketing_message($schedule);

		die;
	}*/
	/* Whatsapp marketing message */

	public function RCSremarketing() {
		die;//
		$this->load->model('Site_Cronjob_Model');
		$schedule = 'z9999';
		$schedule_arr = array();

		$cronjobs = array();

		$cronjobs['a0'] = '0 20 * * *';

		$cronjobs['a1'] = '0 8 * * *';

		$cronjobs['a2'] = '0 14 * * *';

		$cronjobs['a3'] = '0 16 * * *';

		$cronjobs['a5'] = '30 19 * * *';

		$cronjobs['a11'] = '30 20 * * *';

		$cronjobs['a13'] = '0 8 * * *';

		$cronjobs['a16'] = '30 21 * * *';

		$cronjobs['a18'] = '0 22 * * *';

		$cronjobs['a20'] = '30 22 * * *';
		
		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$response = $this->Site_Cronjob_Model->RCS_marketing_message($schedule);
			}
		}
		die;
	}
	/* Whatsapp marketing message */

	public function custremarketing_intrekt_Webinar()
	{
		die;
		$schedule = 'z9999';
		$schedule_arr = array();

		$this->load->model('Site_Cronjob_Model');

		$cronjobs['a0'] = '0 8 * * *';
		$cronjobs['b0'] = '0 23 * * *';

		$cronjobs['a1'] = '0 10 * * *';
		$cronjobs['b1'] = '0 15 * * *';

		$cronjobs['a2'] = '0 12 * * *';
		$cronjobs['b2'] = '0 19 * * *';

		$cronjobs['a3'] = '0 14 * * *';
		$cronjobs['b3'] = '0 17 * * *';

		$cronjobs['a5'] = '0 16 * * *';

		$cronjobs['b7'] = '0 18 * * *';

		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$response = $this->Site_Cronjob_Model->webinar_intrekt_marketing_message($schedule);
			}
		}

		die;
	}

	public function custremarketing_Webinar()
	{
		die;	
		$schedule = 'z9999';
		$schedule_arr = array();

		$this->load->model('Site_Cronjob_Model');

		$cronjobs = array();

		$cronjobs['a0'] = '0 21 * * *';

		$cronjobs['a1'] = '0 12 * * *';

		$cronjobs['a2'] = '0 15 * * *';

		$cronjobs['a4'] = '0 18 * * *';

		$cronjobs['a7'] = '0 20 * * *';
		
		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$response = $this->Site_Cronjob_Model->webinar_marketing_message($schedule);
			}
		}

		die;
	}
	/* Digital personal loan customer marketing message */

	
}

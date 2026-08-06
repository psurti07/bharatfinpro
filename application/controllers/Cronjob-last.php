<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Cronjob extends CI_Controller {
	
	public function index(){
		return redirect()->to('Infopage');
	}

	/* Digital personal loan customer marketing message */
	public function custremarketing(){
		$this->load->model('Site_Cronjob_Model');

		$cronjobs = array();
		$cronjobs['a0'] = '0 10 * * *';
		$cronjobs['b0'] = '0 16 * * *';
		$cronjobs['c0'] = '0 21 * * *';

		$cronjobs['a1'] = '30 10 * * *';
		$cronjobs['b1'] = '30 16 * * *';

		$cronjobs['a2'] = '0 11 * * *';
		$cronjobs['b2'] = '0 17 * * *';

		$cronjobs['a3'] = '30 11 * * *';
		$cronjobs['b3'] = '30 17 * * *';

		$cronjobs['a6'] = '0 12 * * *';
		$cronjobs['b6'] = '0 18 * * *';

		$cronjobs['a10'] = '30 12 * * *';
		$cronjobs['b10'] = '30 18 * * *';

		$cronjobs['a20'] = '0 13 * * *';
		$cronjobs['b20'] = '0 19 * * *';

		$cronjobs['a30'] = '30 13 * * *';
		$cronjobs['b30'] = '30 19 * * *';

		$cronjobs['a50'] = '0 14 * * *';
		$cronjobs['b50'] = '0 20 * * *';

		$cronjobs['a70'] = '30 14 * * *';
		$cronjobs['b70'] = '30 20 * * *';

		$cronjobs['a90'] = '0 15 * * *';
		$cronjobs['b90'] = '0 21 * * *';

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


	/* Whatsapp marketing message */
	public function whatsappremarketing() {
		$this->load->model('Site_Cronjob_Model');
		$schedule = 'z9999';
		$schedule_arr = array();

		$cronjobs = array();

		$cronjobs['a0'] = '0 9 * * *';
		$cronjobs['b0'] = '30 16 * * *';

		$cronjobs['a1'] = '30 9 * * *';
		$cronjobs['b1'] = '30 17 * * *';

		$cronjobs['a2'] = '0 10 * * *';
		$cronjobs['b2'] = '30 17 * * *';

		$cronjobs['a3'] = '30 10 * * *';
		$cronjobs['b3'] = '0 18 * * *';

		$cronjobs['a4'] = '0 11 * * *';
		$cronjobs['b4'] = '30 18 * * *';

		$cronjobs['a5'] = '30 11 * * *';
		$cronjobs['b5'] = '0 19 * * *';

		$cronjobs['a6'] = '0 12 * * *';
		$cronjobs['b6'] = '30 19 * * *';

		$cronjobs['a10'] = '30 12 * * *';
		$cronjobs['b10'] = '0 20 * * *';

		$cronjobs['a15'] = '0 13 * * *';
		$cronjobs['b15'] = '30 20 * * *';

		$cronjobs['a20'] = '30 13 * * *';
		$cronjobs['b20'] = '0 21 * * *';

		$cronjobs['a25'] = '0 14 * * *';
		$cronjobs['b25'] = '30 21 * * *';

		$cronjobs['a30'] = '30 14 * * *';
		$cronjobs['b30'] = '0 22 * * *';

		$cronjobs['a40'] = '0 15 * * *';
		$cronjobs['b40'] = '30 22 * * *';

		$cronjobs['a50'] = '30 15 * * *';
		$cronjobs['b50'] = '0 23 * * *';

		$cronjobs['a60'] = '0 16 * * *';
		$cronjobs['b60'] = '30 23 * * *';

		foreach ($cronjobs as $method => $cron) {
			$time = time();
			if (is_time_cron($time, $cron)) {
				$schedule = substr($method, 1);
				$response = $this->Site_Cronjob_Model->whatsapp_marketing_message($schedule);
			}
		}
		die;
	}
	/* Whatsapp marketing message */

	public function RCSremarketing() {
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

	
}

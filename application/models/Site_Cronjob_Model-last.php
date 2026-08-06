<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Site_Cronjob_Model extends CI_Model
{

	/* START : Digital loan customer marketing message */
	public function customer_leads_marketing($schedule = 9999)
	{
		$url = $smsmessage = $dataset = $smsresponse = '';
		$offerflag = 0;
		$dynamicDate = getLockDateByDays();

		$wheredate = "CAST(r.update_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule . " DAY) ";

		$userlist = $this->db->select('r.id, r.update_date, r.fullname, r.mobile, r.email, r.cardtype, a.income, a.currentemi, a.loanamount')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where($wheredate)
			//->where('r.rec_date >=', $dynamicDate)
			->where('r.rec_date >=', '2024-12-04 00:00:00')
			->where('r.isUser', 1)
			->where('r.isActive', 1)
			->where('r.isDnd', 0)
			->where('r.isDelete', 0)
			->where('r.cardtype', 11)
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->group_by('r.mobile')
			->order_by('r.id asc')
			->get()
			->result();

		if (count($userlist) > 0) {
			$this->load->model('Site_Info_Model');
			$smsmessage = $this->Site_Info_Model->getsmsmessage('pl-remarketing-sms');

			foreach ($userlist as $row) {
				if ($row->mobile != '') {

					$eligibilityamt = "500000";
					if ($row->loanamount != 0 && $row->income != 0 && $row->currentemi != 0) {
						$eligibilityamt = calEligiblity($row->income, $row->currentemi, 12.5, $row->loanamount);
					}
					$premessage = str_replace("<#cronamount>", $eligibilityamt, $smsmessage);

					$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>" . $row->mobile . "</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . SMS_OBB_SENDER_ID . "</senderid></sms>";
				}
			}

			$eligibilityamt = "500000";
			$premessage = str_replace("<#cronamount>", $eligibilityamt, $smsmessage);

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>9624840855</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . SMS_OBB_SENDER_ID . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>9998892746</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . SMS_OBB_SENDER_ID . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>6357121914</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . SMS_OBB_SENDER_ID . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>9998806924</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . SMS_OBB_SENDER_ID . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>9898950296</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . SMS_OBB_SENDER_ID . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>9724157166</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . SMS_OBB_SENDER_ID . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>7046134946</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . SMS_OBB_SENDER_ID . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>6358988761</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . SMS_OBB_SENDER_ID . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>8154909702</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . SMS_OBB_SENDER_ID . "</senderid></sms>";



			$smsresponse = sendxmlSMSobb($dataset);

			/* $msgentry1 = str_replace($smsmessage,"PLMSG",$smsresponse); */

			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'crontype' => 'customer',
				'parentid' => 1,
				'cronname' => 'digitalremktday' . $schedule,
				'msgcount' => count($userlist),
				'msgresponse' => $smsresponse
			);

			$this->db->insert('sms_log', $data1);
		}
		return true;
	}
	/* END : Digital loan customer marketing message */


	/* START : Whatsapp marketing message */
	public function whatsapp_marketing_message($schedule = 9999) {
		$airesponse = "";
		$cnt = 1;
		$dynamicDate = getLockDateByDays();

		$this->load->model('Site_Info_Model');
		$intekt_rm_offer_name = $this->Site_Info_Model->getsmsmessage('intekt_rm_offer_name');

		$wheredate = "CAST(r.rec_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule . " DAY) ";

		$userlist = $this->db->select('r.id, r.rec_date, r.update_date, r.fullname, r.mobile, r.email, r.cardtype, a.income, a.currentemi, a.loanamount')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where($wheredate)
			//->where('r.rec_date >=', $dynamicDate)
			->where('r.rec_date >=', '2024-12-04 00:00:00')
			->where('r.isUser', 1)
			->where('r.isActive', 1)
			->where('r.isDnd', 0)
			->where('r.isDelete', 0)
			->where('r.cardtype', 11)
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->group_by('r.mobile')
			->order_by('r.id asc')
			->get()
			->result();

		if(count($userlist) > 0) {
			foreach($userlist as $row) {
				if($row->mobile != '') {
					$eligibilityamt = "5,00,000";

					if($row->loanamount!=0 && $row->income!=0) {
						$eligibilityamtsimple = calEligiblity($row->income, $row->currentemi, 11, $row->loanamount);
						$eligibilityamt = formatePriceIndia($eligibilityamtsimple, 0);
					}

					// Whatsapp INTERAKT Code
					$data4 = array(
						"fullPhoneNumber" => '+91'.$row->mobile,
						"callbackData"=> "some text here",
						"type"=> "Template",
						"template"=> array(
								"name"=> $intekt_rm_offer_name, //7sep_auto
								"languageCode"=> "en",
								"headerValues"=> array(
									"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/90a30b78-f3eb-4f1d-bef4-99e7bb5d20bc/message_template_media/dobPBR20Lw44/prayosha_10jan.jpg?se=2030-01-04T10%3A46%3A48Z&sp=rt&sv=2019-12-12&sr=b&sig=w23G2bkiLUmvpffFMiSVHVkNnETd7GfrdidctkxC3/A%3D"
								),
								"bodyValues"=> array(
									$row->fullname, $eligibilityamt
								),
							)
					
					);
					$restrack4 = interakt_track($data4);
					$airesponse .= $row->mobile . "-" . $restrack4 . "|";
					$cnt++;
				}
			}

			$adminlist = ['9624840855', '9998892746', '6357121914', '9998806924', '9898950296', '9724157166', '7046134946', '6358988761','8154909702'];
			$eligibilityamt = "5,00,000";

			foreach($adminlist as $row2) {
				$data4 = array(
					"fullPhoneNumber" => '+91'.$row2,
					"callbackData"=> "some text here",
					"type"=> "Template",
					"template"=> array(
							"name"=> $intekt_rm_offer_name,
							"languageCode"=> "en",
							"headerValues"=> array(
								"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/90a30b78-f3eb-4f1d-bef4-99e7bb5d20bc/message_template_media/dobPBR20Lw44/prayosha_10jan.jpg?se=2030-01-04T10%3A46%3A48Z&sp=rt&sv=2019-12-12&sr=b&sig=w23G2bkiLUmvpffFMiSVHVkNnETd7GfrdidctkxC3/A%3D"
							),
							"bodyValues"=> array(
								'$name', $eligibilityamt
							),
						)
				
				);
				$restrack5 = interakt_track($data4);
				$airesponse .= $row2 . "-" . $restrack5 . "|";
				$cnt++;
			}

			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'crontype' => 'whatsapp Intrekt',
				'parentid' => 2,
				'cronname' => 'whatsapp - ' . $schedule,
				'msgcount' => $cnt,
				'msgresponse' => $airesponse
			);

			$this->db->insert('sms_log', $data1);
		}

		return true;
	}

	public function RCS_marketing_message($schedule = 9999) {
		$airesponse = "";
		$cnt = 1;
		$dynamicDate = getLockDateByDays();

		$this->load->model('Site_Info_Model');
		$wpcampaignname = $this->Site_Info_Model->getsmsmessage('wpcampaignmain');

		$wheredate = "CAST(r.rec_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule . " DAY) ";

		$userlist = $this->db->select('r.id, r.rec_date, r.update_date, r.fullname, r.mobile, r.email, r.cardtype, a.income, a.currentemi, a.loanamount')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where($wheredate)
			//->where('r.rec_date >=', $dynamicDate)
			->where('r.rec_date >=', '2024-12-04 00:00:00')
			->where('r.isUser', 1)
			->where('r.isActive', 1)
			->where('r.isDnd', 0)
			->where('r.isDelete', 0)
			->where('r.cardtype', 11)
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->group_by('r.mobile')
			->order_by('r.id asc')
			->get()
			->result();

		if(count($userlist) > 0) {
			$marray = array();
			foreach($userlist as $row) {
				if($row->mobile != '') {
					$eligibilityamt = "5,00,000";

					if($row->loanamount!=0 && $row->income!=0) {
						$eligibilityamtsimple = calEligiblity($row->income, $row->currentemi, 11, $row->loanamount);
						$eligibilityamt = formatePriceIndia($eligibilityamtsimple, 0);
					}

					array_push($marray,'91'.$row->mobile);
					$cnt++;
				}
			}
			$usermobile = implode(',',$marray);
			$random_number = rand(1000, 9999);

			$data1 = array(
				"customerId"=>"Prayosha Fincart",
				"campaignName"=>"cmp_11nov_4_".$random_number,                  
				"TemplateName"=>"9nov",
				"param_json"=>array("[custom_param]"=>"Dear Customer", "[custom_param1]"=>"5,00,000"), 
				"To Mobile Number"=>'['.$usermobile.', 9624840855, 9998892746, 6357121914, 9998806924, 9898950296, 9724157166, 7046134946, 6358988761,8154909702]',
				);
				
			$smsresponse = sendRCSSMS(json_encode($data1));

			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'crontype' => 'RCS',
				'parentid' => 4,
				'cronname' => 'RCS - ' . $schedule,
				'msgcount' => $cnt,
				'msgresponse' => $smsresponse
			);

			$this->db->insert('sms_log', $data1);
		}

		return true;
	}
	/* END : Whatsapp marketing message */


}

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
			->where('r.rec_date >=', '2025-06-04 00:00:00')
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
			$smssenderid = getSMSsenderid();

			foreach ($userlist as $row) {
				if ($row->mobile != '') {

					$eligibilityamt = "500000";
					$fullname = $row->fullname ?? 'User';
                    $income = $row->income ?? 0;
                    $currentemi = $row->currentemi ?? 0;
                    $loanamount = $row->loanamount ?? 0;

					if($loanamount>0 && $income>0) {
						$eligibilityamtsimple = calEligiblity($income, $currentemi, 11, $loanamount);
						$eligibilityamt = formatePriceIndia($eligibilityamtsimple, 0);
					}
					
					$premessage = str_replace("<#cronamount>", $eligibilityamt, $smsmessage);

					$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>" . $row->mobile . "</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $smssenderid . "</senderid></sms>";
				}
			}

			$eligibilityamt = "500000";
			$premessage = str_replace("<#cronamount>", $eligibilityamt, $smsmessage);

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>9998892746</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $smssenderid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>6358988761</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $smssenderid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>9023987358</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $smssenderid . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>8154909702</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . $smssenderid . "</senderid></sms>";

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
	
	/*public function customer_leads_marketing($schedule = 9999)
	{
		$scharr = implode(',', $schedule);
		$wheredate=$url = $smsmessage = $dataset = $smsresponse = '';
		$offerflag = 0;
		$dynamicDate = getLockDateByDays();

		$lastno = count($schedule);
		$schedule_a ="";
		$wheredate .= "(";
		for ($i = 0; $i < $lastno; $i++) {
			
			$wheredate .= "CAST(r.rec_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule[$i] . " DAY)";
			if ($i < $lastno - 1) {
				$schedule_a .= ", ";
				$wheredate .= " OR ";
			}
		}
		$wheredate .= ") ";

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

			$arrpart = array_chunk($userlist, 8000);

			foreach ($arrpart as $res) {
				$dataset = "";
				$arrnumbers = 0;
				foreach ($res as $row) {
					if ($row->mobile != '') {

						$eligibilityamt = "500000";
						if ($row->loanamount != 0 && $row->income != 0 && $row->currentemi != 0) {
							$eligibilityamt = calEligiblity($row->income, $row->currentemi, 12.5, $row->loanamount);
						}
						$premessage = str_replace("<#cronamount>", $eligibilityamt, $smsmessage);

						$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>" . $row->mobile . "</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . SMS_OBB_SENDER_ID . "</senderid></sms>";
					}
				}
			}

			$eligibilityamt = "500000";
			$premessage = str_replace("<#cronamount>", $eligibilityamt, $smsmessage);

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>9998892746</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . SMS_OBB_SENDER_ID . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>6358988761</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . SMS_OBB_SENDER_ID . "</senderid></sms>";

			$dataset .= "<sms><user>" . SMS_OBB_USERNAME . "</user><password>" . SMS_OBB_PASSWORD . "</password><mobiles>8154909702</mobiles><message>" . $premessage . "</message><accusage>1</accusage><senderid>" . SMS_OBB_SENDER_ID . "</senderid></sms>";

			$smsresponse = sendxmlSMSobb($dataset);

			$msgentry1 = str_replace($smsmessage,"PLMSG",$smsresponse); 

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
	}*/
	/* END : Digital loan customer marketing message */

	
	/* START : Whatsapp marketing message */
	public function whatsapp_marketing_message($schedule = 9999) {
		$airesponse = "";
		$cnt = 1;

		$this->load->model('Site_Info_Model');
		$wpcampaignname = $this->Site_Info_Model->getsmsmessage('wpcampaignmain');

		$wheredate = "CAST(r.rec_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule . " DAY) ";

		$userlist = $this->db->select('r.id, r.update_date, r.fullname, r.mobile, r.email, r.cardtype, a.income, a.currentemi, a.loanamount')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where($wheredate)
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
			$data3 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'crontype' => 'whatsapp digital',
				'parentid' => 3,
				'cronname' => 'whatsapp - ' . $schedule,
				'msgcount' => $cnt,
				'msgresponse' => $airesponse
			);

			$this->db->insert('sms_log', $data3);
			$logid = $this->db->insert_id();

			foreach($userlist as $row) {
				if($row->mobile != '') {
					$eligibilityamt = "5,00,000";

					if($row->loanamount!=0 && $row->income!=0) {
						$eligibilityamtsimple = calEligiblity($row->income, $row->currentemi, 11, $row->loanamount);
						$eligibilityamt = formatePriceIndia($eligibilityamtsimple, 0);
					}

					$data1 = array(
						'apiKey' => AISENSY_KEY,
						'campaignName' => 'auto_21july',
						'destination' => '+91' . $row->mobile,
						'media' => array(
							'url' => 'https://d3jt6ku4g6z5l8.cloudfront.net/IMAGE/6a5efed93988467d6c4f2861/4639932_pray.jpeg',
							'filename' => 'pray.jpeg'
						),
						'userName' => $row->fullname,
						'templateParams' => array('$Name', '$EligibleAmount'),
						'tags' => array('Get Offer'),
						'attributes' => array(
							'EligibleAmount' => strval($eligibilityamt)
						)
					);
					$restrack1 = aisensy_track($data1);
					$airesponse .= $row->mobile . "-" . $restrack1 . "|";
					$data4 = array(
						'msgcount' => $cnt,
						'msgresponse' => $airesponse
					 );
					   
					$query = $this->db->where('id', $logid)
					   ->update('sms_log', $data4);
					$cnt++;
				}
			}

			$adminlist = ['7984310891', '7201825971', '9558125971', '9586935595','7486030828','7567032993'];
			$eligibilityamt = "5,00,000";

			foreach($adminlist as $row2) {
				$data2 = array(
					'apiKey' => AISENSY_KEY,
					'campaignName' => 'auto_21july',
					'destination' => '+91' . $row2,
					'media' => array(
						'url' => 'https://d3jt6ku4g6z5l8.cloudfront.net/IMAGE/6a5efed93988467d6c4f2861/4639932_pray.jpeg',
						'filename' => 'pray.jpeg'
					),
					'userName' => '$Name',
					'templateParams' => array('$Name', '$EligibleAmount'),
					'tags' => array('Get Offer'),
					'attributes' => array(
						'EligibleAmount' => strval($eligibilityamt)
					)
				);
				$restrack2 = aisensy_track($data2);
				$airesponse .= $row2 . "-" . $restrack2 . "|";
				$data4 = array(
					'msgcount' => $cnt,
					'msgresponse' => $airesponse
				 );
				   
				$query = $this->db->where('id', $logid)
				   ->update('sms_log', $data4);
				$cnt++;
			}
		}

		return true;
	}
	/* END : Whatsapp marketing message */

	public function whatsapp_interakt_marketing_message($schedule = 9999) {
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
			->where('r.rec_date >=', '2025-06-04 00:00:00')
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
			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'crontype' => 'whatsapp Intrekt',
				'parentid' => 2,
				'cronname' => 'whatsapp - ' . $schedule,
				'msgcount' => count($userlist)
			);
			$this->db->insert('sms_log', $data1);
		   	$logid = $this->db->insert_id();

			$adminlist = ['9998892746', '6358988761','9023987358','8154909702'];
			$eligibilityamt = "5,00,000";

			foreach($adminlist as $row2) {
				$data3 = array(
					"fullPhoneNumber" => '+91'.$row2,
					"callbackData"=> "some text here",
					"type"=> "Template",
					"template"=> array(
							"name"=> $intekt_rm_offer_name,
							"languageCode"=> "en",
							"headerValues"=> array(
								"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/0d8674c1-ad51-43b0-8388-fc6122bf1bb8/message_template_media/5Bn10IEJ07Vr/prayosha_rm.jpg?se=2031-02-19T05%3A07%3A33Z&sp=rt&sv=2019-12-12&sr=b&sig=Zq5kLLstW3yt%2Bt7KWKcmFNYQuazrXf5gcvbuxvCexPI%3D"
							),
							"bodyValues"=> array(
								'$name', $eligibilityamt
							),
						)
				
				);
				$restrack3 = interakt_track($data3);
				$airesponse .= $row2 . "-" . $restrack3 . "|";
				/* $data2 = array(
					'msgcount' => $cnt,
					'msgresponse' => $airesponse
				);
				   
				$query = $this->db->where('id', $logid)
					   ->update('sms_log', $data2); */
				$cnt++;
			}

			foreach($userlist as $row) {
				if($row->mobile != '') {
					$eligibilityamt = "5,00,000";
					
					$fullname = $row->fullname ?? 'User';
                    $income = $row->income ?? 0;
                    $currentemi = $row->currentemi ?? 0;
                    $loanamount = $row->loanamount ?? 0;

					if($loanamount>0 && $income>0) {
						$eligibilityamtsimple = calEligiblity($income, $currentemi, 11, $loanamount);
						$eligibilityamt = formatePriceIndia($eligibilityamtsimple, 0);
					}

					// Whatsapp INTERAKT Code
					$data3 = array(
						"fullPhoneNumber" => '+91'.$row->mobile,
						"callbackData"=> "some text here",
						"type"=> "Template",
						"template"=> array(
								"name"=> $intekt_rm_offer_name, //7sep_auto
								"languageCode"=> "en",
								"headerValues"=> array(
									"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/0d8674c1-ad51-43b0-8388-fc6122bf1bb8/message_template_media/5Bn10IEJ07Vr/prayosha_rm.jpg?se=2031-02-19T05%3A07%3A33Z&sp=rt&sv=2019-12-12&sr=b&sig=Zq5kLLstW3yt%2Bt7KWKcmFNYQuazrXf5gcvbuxvCexPI%3D"
								),
								"bodyValues"=> array(
									$fullname, $eligibilityamt
								),
							)
					
					);
					$restrack3 = interakt_track($data3);
					$airesponse .= $row->mobile . "-" . $restrack3 . "|";
					/* $data2 = array(
						'msgcount' => $cnt,
						'msgresponse' => $airesponse
					);
					
					$query = $this->db->where('id', $logid)
					   ->update('sms_log', $data2); */
					$cnt++;
				}
			}
		}
		return true;
	}
	
	public function whatsapp_marketing_message_new($schedule = 9999) {
		$airesponse = "";
		$cnt = 1;
		$this->load->model('Site_Info_Model');

		$wheredate = "CAST(r.rec_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule . " DAY) ";
	
		$userlist = $this->db->select('r.id, r.rec_date, r.update_date, r.fullname, r.mobile, r.email, r.cardtype, a.income, a.currentemi, a.loanamount')
			->from('user_registration r')
			->join('user_application a', 'a.userid=r.id')
			->where($wheredate)
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
			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'crontype' => 'whatsapp Intrekt 2',
				'parentid' => 5,
				'cronname' => 'whatsapp intrekt 2 - ' . $schedule,
				'msgcount' => count($userlist)
			);
			$this->db->insert('sms_log', $data1);
		   	$logid = $this->db->insert_id();

			$adminlist = ['9998892746', '6358988761','9023987358','8154909702'];
			$eligibilityamt = "5,00,000";

			foreach($adminlist as $row2) {
				$data3 = array(
					"fullPhoneNumber" => '+91'.$row2,
					"callbackData"=> "some text here",
					"type"=> "Template",
					"template"=> array(
							"name"=> "20april_rm_1",
							"languageCode"=> "en",
							"headerValues"=> array(
								"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/ed7b7d77-e447-46bc-8cef-3b5a3cb2ce3c/message_template_sample/UyJwbxE5ZdAu/pf_rm_20april.jpeg?se=2031-04-14T10%3A00%3A27Z&sp=rt&sv=2019-12-12&sr=b&sig=njBCQKhxn%2BBUzGOQti0VgEC%2BBc994L6X%2BZ5mJuuF%2Bg8%3D"
							),
							"bodyValues"=> array(
								'$name', $eligibilityamt
							),
						)
				
				);
				$restrack3 = interakt_track_new($data3);
				$airesponse .= $row2 . "-" . $restrack3 . "|";
				 $data2 = array(
					'msgcount' => $cnt,
					'msgresponse' => $airesponse
				   );
				   
				   $query = $this->db->where('id', $logid)
					   ->update('sms_log', $data2); 
				$cnt++;
			}

			//$arrpart = array_chunk($userlist, 8000);
			//foreach ($userlist as $res) {
				//$dataset = "";
				//$arrnumbers = 0;
				foreach ($userlist as $row) {
					if($row->mobile != '') {
						$eligibilityamt = "5,00,000";

						$fullname = $row->fullname ?? 'User';
                        $income = $row->income ?? 0;
                        $currentemi = $row->currentemi ?? 0;
                        $loanamount = $row->loanamount ?? 0;
    
    					if($loanamount>0 && $income>0) {
    						$eligibilityamtsimple = calEligiblity($income, $currentemi, 11, $loanamount);
    						$eligibilityamt = formatePriceIndia($eligibilityamtsimple, 0);
    					}

						// Whatsapp INTERAKT Code
						$data3 = array(
							"fullPhoneNumber" => '+91'.$row->mobile,
							"callbackData"=> "some text here",
							"type"=> "Template",
							"template"=> array(
									"name"=> "20april_rm_1",
									"languageCode"=> "en",
									"headerValues"=> array(
										"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/ed7b7d77-e447-46bc-8cef-3b5a3cb2ce3c/message_template_sample/UyJwbxE5ZdAu/pf_rm_20april.jpeg?se=2031-04-14T10%3A00%3A27Z&sp=rt&sv=2019-12-12&sr=b&sig=njBCQKhxn%2BBUzGOQti0VgEC%2BBc994L6X%2BZ5mJuuF%2Bg8%3D"
									),
									"bodyValues"=> array(
										$fullname, $eligibilityamt
									),
								)
						
						);
						$restrack3 = interakt_track_new($data3);
						$airesponse .= $row->mobile . "-" . $restrack3 . "|";
						 $data2 = array(
							'msgcount' => $cnt,
							'msgresponse' => $airesponse
					   	);
					   
					  	$query = $this->db->where('id', $logid)
						   ->update('sms_log', $data2); 
						$cnt++;
					}
				}
			//}
		}
		return true;
	}

	public function plan_whatsapp_intrekt_message($schedule) {
		$airesponse = "";
		$cnt = 1;
		$this->load->model('Site_Info_Model');

		$wheredate = "CAST(r.rec_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule . " DAY) ";
	
		$userlist = $this->db->select('r.id, r.rec_date, r.update_date, r.fullname, r.mobile, r.email, r.cardtype, a.income, a.currentemi, a.loanamount')
			->from('plan_user_registration r')
			->join('plan_user_application a', 'a.userid=r.id')
			->where($wheredate)
			->where('r.isUser', 1)
			->where('r.isActive', 1)
			->where('r.isDnd', 0)
			->where('r.isDelete', 0)
			->where('r.cardtype', 21)
			->where('a.status', 1)
			->where('a.isDelete', 0)
			->group_by('r.mobile')
			->order_by('r.id asc')
			->get()
			->result();
			
		if(count($userlist) > 0) {
			$data1 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'crontype' => 'plan whatsapp Intrekt',
				'parentid' => 6,
				'cronname' => 'plan whatsapp intrekt - ' . $schedule,
				'msgcount' => count($userlist)
			);
			$this->db->insert('sms_log', $data1);
		   	$logid = $this->db->insert_id();

			$adminlist = ['9998892746', '6358988761','9023987358','8154909702'];
			$eligibilityamt = "5,00,000";

			foreach($adminlist as $row2) {
				$data3 = array(
					"fullPhoneNumber" => '+91'.$row2,
					"callbackData"=> "some text here",
					"type"=> "Template",
					"template"=> array(
							"name"=> "10july_rm_1",
							"languageCode"=> "en",
							"headerValues"=> array(
								"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/20567f7b-824d-4327-8773-da7f451d92ce/message_template_sample/kF1Bd6X7cOzz/privylege.jpeg?se=2031-07-04T06%3A13%3A21Z&sp=rt&sv=2019-12-12&sr=b&sig=GSNlqhVm2FGjx/bTSkcuZu2vgZ4Ep%2BC3EIuTBUqFZpY%3D"
							),
							"bodyValues"=> array(
								'$name', $eligibilityamt
							),
						)
				
				);
				$restrack3 = plan_interakt_track_rm($data3);
				$airesponse .= $row2 . "-" . $restrack3 . "|";
				/* $data2 = array(
					'msgcount' => $cnt,
					'msgresponse' => $airesponse
				   );
				   
				   $query = $this->db->where('id', $logid)
					   ->update('sms_log', $data2); */
				$cnt++;
			}

			$arrpart = array_chunk($userlist, 8000);
			foreach ($arrpart as $res) {
				$dataset = "";
				$arrnumbers = 0;
				foreach ($res as $row) {
					if($row->mobile != '') {
						$eligibilityamt = "5,00,000";

						$fullname = $row->fullname ?? 'User';
                        $income = $row->income ?? 0;
                        $currentemi = $row->currentemi ?? 0;
                        $loanamount = $row->loanamount ?? 0;
    
    					if($loanamount>0 && $income>0) {
    						$eligibilityamtsimple = calEligiblity($income, $currentemi, 11, $loanamount);
    						$eligibilityamt = formatePriceIndia($eligibilityamtsimple, 0);
    					}

						// Whatsapp INTERAKT Code
						$data3 = array(
							"fullPhoneNumber" => '+91'.$row->mobile,
							"callbackData"=> "some text here",
							"type"=> "Template",
							"template"=> array(
									"name"=> "10july_rm_1",
									"languageCode"=> "en",
									"headerValues"=> array(
										"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/20567f7b-824d-4327-8773-da7f451d92ce/message_template_sample/kF1Bd6X7cOzz/privylege.jpeg?se=2031-07-04T06%3A13%3A21Z&sp=rt&sv=2019-12-12&sr=b&sig=GSNlqhVm2FGjx/bTSkcuZu2vgZ4Ep%2BC3EIuTBUqFZpY%3D"
									),
									"bodyValues"=> array(
										$fullname, $eligibilityamt
									),
								)
						
						);
						$restrack3 = plan_interakt_track_rm($data3);
						$airesponse .= $row->mobile . "-" . $restrack3 . "|";
						/* $data2 = array(
							'msgcount' => $cnt,
							'msgresponse' => $airesponse
					   	);
					   
					  	$query = $this->db->where('id', $logid)
						   ->update('sms_log', $data2); */
						$cnt++;
					}
				}
			}
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
			->where('r.rec_date >=', '2025-06-04 00:00:00')
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

					$fullname = $row->fullname ?? 'User';
                    $income = $row->income ?? 0;
                    $currentemi = $row->currentemi ?? 0;
                    $loanamount = $row->loanamount ?? 0;

					if($loanamount>0 && $income>0) {
						$eligibilityamtsimple = calEligiblity($income, $currentemi, 11, $loanamount);
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
				"To Mobile Number"=>'['.$usermobile.' , 9998892746, 6358988761,9023987358,8154909702]',
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
	/*  intrekt whatsapp portal 2 */
	public function webinar_intrekt_marketing_message($schedule)
	{
		
		$airesponse = '';
		$cnt = 1;

		$this->load->model('Site_Info_Model');
		
		$wheredate = "CAST(uwr.rec_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -" . $schedule . " DAY) ";

		$userlist =	$this->db->select('uwr.*')
			->from('user_webinar_registration uwr')
			->join('webinar_order wo', 'wo.userid = uwr.id')
			->where($wheredate)
			->where('wo.isUser', 1)
			->where('uwr.isActive', 1)
			->where('uwr.isDelete', 0)
			->where('wo.isDelete', 0)
			->get()
			->result();

		if (count($userlist) > 0) {
			$data3 = array(
				'rec_date' => date('Y-m-d H:i:s'),
				'crontype' => 'webinar interkt',
				'parentid' => 7,
				'cronname' => 'webinar intrekt - ' . $schedule,
				'msgcount' => $cnt,
				'msgresponse' => $airesponse
			);

			$this->db->insert('sms_log', $data3);
			$logid = $this->db->insert_id();
					
			$adminlist = ['7984310891','7359876109'];
			
			foreach ($adminlist as $row2) {
				$processPath  = 'webinar/user-register';
				$buttonValues = new stdClass();
				$buttonValues->{'0'} = array($processPath);
				
				$data4 = array(
					"fullPhoneNumber" => '+91' . $row2,
					"callbackData" => "some text here",
					"type" => "Template",
					"template" => array(
						"name" => "8july_rm_1",
						"languageCode" => "en",
						"headerValues" => array(
							"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/b10c2f3d-ad4b-49f1-94c9-1c71c76e085b/message_template_sample/eUBdzhzIcELD/qqq.jpeg?se=2031-07-02T07%3A12%3A22Z&sp=rt&sv=2019-12-12&sr=b&sig=lMlNU8tWlY10yjBmarg%2B5EnG6edXQSVOsaA5sf1mQ3c%3D"
						),
						"bodyValues" => array(
							$processPath,
						),
						"buttonValues" => $buttonValues,
					)

				);
				$restrack5 = webinar_interakt_track($data4);
				$airesponse .= $row2 . "-" . $restrack5 . "|";
				/* $data5 = array(
					'msgcount' => $cnt,
					'msgresponse' => $airesponse
				 );
				   
				$query = $this->db->where('id', $logid)
				   ->update('sms_log', $data5); */
				$cnt++;
			}

			foreach ($userlist as $row) {
				if ($row->mobile != '') {
					
					// Generate process path
					$processUrl  = 'webinar/process?id='.encryptData($row->id);
					$processPath = ltrim(parse_url($processUrl, PHP_URL_PATH), '/') . '?' . parse_url($processUrl, PHP_URL_QUERY);
					$buttonValues = new stdClass();
					$buttonValues->{'0'} = array($processPath);
				
					$data4 = array(
						"fullPhoneNumber" => '+91' . $row->mobile,
						"callbackData" => "some text here",
						"type" => "Template",
						"template" => array(
							"name" => "8july_rm_1",
							"languageCode" => "en",
							"headerValues" => array(
								"https://interaktprodmediastorage.blob.core.windows.net/mediaprodstoragecontainer/b10c2f3d-ad4b-49f1-94c9-1c71c76e085b/message_template_sample/eUBdzhzIcELD/qqq.jpeg?se=2031-07-02T07%3A12%3A22Z&sp=rt&sv=2019-12-12&sr=b&sig=lMlNU8tWlY10yjBmarg%2B5EnG6edXQSVOsaA5sf1mQ3c%3D"
							),
							"bodyValues" => array(
								$processPath,
							),
							"buttonValues" => $buttonValues,
						)

					);
					$restrack4 = webinar_interakt_track($data4);
					$airesponse .= $row->mobile . "-" . $restrack4 . "|";
					/* $data5 = array(
						'msgcount' => $cnt,
						'msgresponse' => $airesponse
					 );
					   
				    $query = $this->db->where('id', $logid)
					   ->update('sms_log', $data5); */
					$cnt++;
				}
			}
		}

		return true;	
	}
	/* END : bharat small finance Whatsapp marketing message */

	public function webinar_marketing_message($schedule = 9999)
	{
		$url = $smsmessage = $dataset = $smsresponse = '';
		
		$wheredate = "CAST(uwr.rec_date as DATE) = DATE_ADD(CURDATE(),INTERVAL -".$schedule." DAY) ";

			$userlist =	$this->db->select('uwr.*')
			->from('user_webinar_registration uwr')
			->join('webinar_order wo', 'wo.userid = uwr.id')
			->where($wheredate)
			->where('wo.isUser !=', 2)
			->where('uwr.isDelete', 0)
			->where('wo.isDelete', 0)
			->get()
			->result();
		
		if (count($userlist) > 0) {
			$this->load->model('Site_Info_Model');
			$smsmessage = $this->Site_Info_Model->getsmsmessage('webinar-remarketing-sms');
			
		
				foreach ($userlist as $row) {
					if ($row->mobile != '') {
					
						$dataset .= "<sms><user>" . SMS_WEBINAR_OBB_USERNAME . "</user><password>" . SMS_WEBINAR_OBB_PASSWORD . "</password><mobiles>" . $row->mobile . "</mobiles><message>" . $smsmessage . "</message><accusage>1</accusage><senderid>" . SMS_WEBINAR_OBB_SENDER_ID . "</senderid></sms>";
					}
				}

				$dataset .= "<sms><user>".SMS_WEBINAR_OBB_USERNAME."</user><password>".SMS_WEBINAR_OBB_PASSWORD."</password><mobiles>9998892746</mobiles><message>".$smsmessage."</message><accusage>1</accusage><senderid>".SMS_WEBINAR_OBB_SENDER_ID."</senderid></sms>";

				$dataset .= "<sms><user>".SMS_WEBINAR_OBB_USERNAME."</user><password>".SMS_WEBINAR_OBB_PASSWORD."</password><mobiles>6358988761</mobiles><message>".$smsmessage."</message><accusage>1</accusage><senderid>".SMS_WEBINAR_OBB_SENDER_ID."</senderid></sms>";

				$dataset .= "<sms><user>".SMS_WEBINAR_OBB_USERNAME."</user><password>".SMS_WEBINAR_OBB_PASSWORD."</password><mobiles>9023987358</mobiles><message>".$smsmessage."</message><accusage>1</accusage><senderid>".SMS_WEBINAR_OBB_SENDER_ID."</senderid></sms>";

				$dataset .= "<sms><user>" . SMS_WEBINAR_OBB_USERNAME . "</user><password>" . SMS_WEBINAR_OBB_PASSWORD . "</password><mobiles>8154909702</mobiles><message>" . $smsmessage . "</message><accusage>1</accusage><senderid>" . SMS_WEBINAR_OBB_SENDER_ID . "</senderid></sms>";

				$smsresponse = sendxmlSMSobb($dataset);
				
				$data1 = array(
					'rec_date' => date('Y-m-d H:i:s'),
					'crontype' => 'Webinar Customer',
					'parentid' => 8,
					'cronname' => 'SMS Day - ' . $schedule,
					'msgcount' => count($userlist),
					'msgresponse' => $smsresponse
				);

				$this->db->insert('sms_log', $data1);
			}
	

		return true;
	}

}

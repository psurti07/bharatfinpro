<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

function send_order_data($data)
{

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://bizfin.indiakarobar.com/api/channel-partners/turnover',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'POST',
		CURLOPT_POSTFIELDS => $data,
		CURLOPT_HTTPHEADER => array(
			'Content-Type: application/json'
		),
	));

	$response = curl_exec($curl);

	curl_close($curl);
	return $response;
	die;
}

function getFacebookPixel($pixel = 'facebookpixel')
{
	$value = null;
	$ci = &get_instance();
	$ci->load->database();
	$ci->db->select('option_value');
	$ci->db->where('option_key', $pixel);
	$cirow = $ci->db->get('site_options')->row();

	if ($cirow != "") {
		if ($cirow->option_value != "") {
			$value = $cirow->option_value;
		}
	}
	return $value;
}

function getFacebookDomain()
{
	$value = null;
	$ci = &get_instance();
	$ci->load->database();
	$ci->db->select('option_value');
	$ci->db->where('option_key', 'facebookdomain');
	$cirow = $ci->db->get('site_options')->row();

	if ($cirow != "") {
		if ($cirow->option_value != "") {
			$value = $cirow->option_value;
		}
	}
	return $value;
}

function getFBConversionData($type = 'digital')
{
	$arr_data = [];
	$ci = &get_instance();
	$ci->load->database();
	if ($type == 'digital') {
		$query1 = $ci->db->where('option_key', 'fbaccesstoken')
			->select('option_value')
			->get('site_options');
		$arr_data['fbaccesstoken'] = $query1->row();

		$query2 = $ci->db->where('option_key', 'fbeventname')
			->select('option_value')
			->get('site_options');
		$arr_data['fbeventname'] = $query2->row();

		$query3 = $ci->db->where('option_key', 'fbeventid')
			->select('option_value')
			->get('site_options');
		$arr_data['fbeventid'] = $query3->row();
	} else if ($type == 'plan') {

		$query4 = $ci->db->where('option_key', 'plan_fbaccesstoken')
			->select('option_value')
			->get('site_options');
		$arr_data['fbaccesstoken'] = $query4->row();

		$query5 = $ci->db->where('option_key', 'plan_fbeventname')
			->select('option_value')
			->get('site_options');
		$arr_data['fbeventname'] = $query5->row();

		$query6 = $ci->db->where('option_key', 'plan_fbeventid')
			->select('option_value')
			->get('site_options');
		$arr_data['fbeventid'] = $query6->row();
	} else if ($type == 'webinar') {

		$query4 = $ci->db->where('option_key', 'fbaccesstokenwebinar')
			->select('option_value')
			->get('site_options');
		$arr_data['fbaccesstoken'] = $query4->row();

		$query5 = $ci->db->where('option_key', 'fbeventnamewebinar')
			->select('option_value')
			->get('site_options');
		$arr_data['fbeventname'] = $query5->row();

		$query6 = $ci->db->where('option_key', 'fbeventidwebinar')
			->select('option_value')
			->get('site_options');
		$arr_data['fbeventid'] = $query6->row();
	}

	return $arr_data;
}

function fbconversioncurl($userdata)
{
	$FBConversionData = getFBConversionData($userdata['type']);
	$fbaccesstoken = $FBConversionData['fbaccesstoken']->option_value;
	$eventname = $FBConversionData['fbeventname']->option_value;
	$eventid = $FBConversionData['fbeventid']->option_value;

	// PURCHASE DATA
	$data = array();

	$data["event_name"] = $eventname;
	$data["event_time"] = round(microtime(true));
	$data["event_id"] = $eventid;
	$data["event_source_url"] = $userdata['sourceurl'];
	//$data["event_source_url"] = 'https://purchase.bharatfinpro.com/';
	$data["action_source"] = "website";

	$idarr[] = hash("sha256", $userdata['userid']);
	$data["user_data"]["external_id"] = $idarr;

	$fnarr[] = hash("sha256", $userdata['firstname']);
	$data["user_data"]["fn"] = $fnarr;

	$emarr[] = hash("sha256", $userdata['email']);
	$data["user_data"]["em"] = $emarr;

	$pharr[] = hash("sha256", $userdata['mobile']);
	$data["user_data"]["ph"] = $pharr;

	$ctarr[] = hash("sha256", $userdata['city']);
	$data["user_data"]["ct"] = $ctarr;

	$statearr[] = hash("sha256", $userdata['state']);
	$data["user_data"]["st"] = $statearr;

	$countryarr[] = hash("sha256", "in");
	$data["user_data"]["country"] = $countryarr;

	$data["user_data"]["client_ip_address"] = $_SERVER['REMOTE_ADDR'];
	$data["user_data"]["client_user_agent"] = $_SERVER['HTTP_USER_AGENT'];

	if ($userdata['fbclid'] != "") {
		$data["user_data"]["fbc"] = $userdata['fbclid'];
	}

	if ($userdata['version'] == 'v11.0' || $userdata['version'] == 'v16.0') {
		$contents["id"] = "MC2025";
		$contents["quantity"] = 1;
		$data["contents"][] = $contents;

		$data["custom_data"]["currency"] = "INR";
		$data["custom_data"]["value"] = 499.00;
		$data["custom_data"]["order_id"] = $userdata['orderid'];
	} else if ($userdata['version'] == 'v19.0' || $userdata['version'] == 'v21.0') {

		$data["custom_data"]["currency"] = "INR";
		$data["custom_data"]["value"] = 499.00;
		$data["custom_data"]["num_items"] = 1;
		$data["custom_data"]["content_type"] = "product";
		$data["custom_data"]["order_id"] = $userdata['orderid'];
		$data["custom_data"]["status"] = "registered";

		$contents["id"] = "MC2025";
		$contents["quantity"] = 1;
		$contents["item_price"] = 499.00;
		$data["custom_data"]["contents"] = json_encode(array($contents));
	}

	// Turn Data to JSON
	$data_json = json_encode(array($data));

	if ($userdata['type'] == 'digital') {
		$fbpixel = getFacebookPixel('facebookpixel');
		$accesstoken = $fbaccesstoken;
	} else if ($userdata['type'] == 'plan') {
		$fbpixel = getFacebookPixel('plan_facebookpixel');
		$accesstoken = $fbaccesstoken;
	} else if ($userdata['type'] == 'webinar') {
		$fbpixel = getFacebookPixel('facebookpixel-webinar');
		$accesstoken = $fbaccesstoken;
	} else {
		$fbpixel = '';
		$accesstoken = $fbaccesstoken;
	}

	// Fill available fields
	$fields = array();
	$fields['access_token'] = $fbaccesstoken;
	$fields['upload_tag'] = "orders"; // You should set a tag here (feel free to adjust)
	$fields['data'] = $data_json;

	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://graph.facebook.com/" . $userdata['version'] . "/" . $fbpixel . "/events",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => http_build_query($fields),
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			//"content-type: multipart/form-data",
			"Accept: application/json"
		),
	));

	$response = curl_exec($curl);
	curl_close($curl);
	return $response;
}

function getSMSsenderid($id = 'smssenderid')
{
	$value = null;
	$ci = &get_instance();
	$ci->load->database();
	$ci->db->select('option_value');
	$ci->db->where('option_key', $id);
	$cirow = $ci->db->get('site_options')->row();

	if ($cirow != "") {
		if ($cirow->option_value != "") {
			$value = $cirow->option_value;
		}
	}
	return $value;
}

function sendotpSMS($mobile, $message)
{
	$sms_text = urlencode($message);
	$api_url = "https://www.smsgatewayhub.com/api/mt/SendSMS?APIKey=" . SMS_API_KEY . "&senderid=" . SMS_SENDER_ID . "&channel=2&DCS=0&flashsms=0&number=" . $mobile . "&text=" . $sms_text . "&route=1";

	//Submit to server
	$response = file_get_contents($api_url);
	return $response;
}

function sendtextSMS($mobile, $message, $panel = 'main')
{
	$sms_text = rawurlencode($message);
	$sms_text = urlencode($message);

	if ($panel == 'plan') {
		$obbusername = PLAN_SMS_OBB_USERNAME;
		$obbapikey = PLAN_SMS_OBB_PASSWORD;
		$obbsenderid = PLAN_SMS_OBB_SENDER_ID;
	} else {
		$obbusername = SMS_OBB_USERNAME;
		$obbapikey = SMS_OBB_PASSWORD;
		$obbsenderid = SMS_OBB_SENDER_ID;
	}

	/* $api_url = "http://m.onlinebusinessbazaar.in/sendsms.jsp?user=" . $obbusername . "&password=" . $obbapikey . "&senderid=" . $obbsenderid . "&mobiles=" . $mobile . "&sms=" . $sms_text;
	log_message('error', 'api url -- ' . $api_url);
	$response = file_get_contents($api_url); */

	$xml_data = '<?xml version="1.0"?>
    <smslist>
    <sms>
    <user>' . $obbusername . '</user>
    <password>' . $obbapikey . '</password>
    <message>' . $message . '</message>
    <mobiles>' . $mobile . '</mobiles>
    <senderid>' . $obbsenderid . '</senderid>
    </sms>
    </smslist>';

	//$URL = "43.204.206.165/sendsms.jsp?"; 
	$URL = "http://m.onlinebusinessbazaar.in/sendsms.jsp?";
	$ch = curl_init($URL);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
	curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);

	if (curl_errno($ch)) {
		log_message('error', 'cURL Error : ' . curl_error($ch));
	}

	curl_close($ch);

	return $response;
}

function sendxmlSMS($dataset)
{
	$xmldataset = "<SmsQueue><Account><APIKey>" . SMS_API_KEY . "</APIKey><SenderId>" . SMS_SENDER_ID . "</SenderId><Channel>2</Channel><DCS>0</DCS><FlashSms>0</FlashSms><Route>1</Route></Account><Messages>" . $dataset . "</Messages></SmsQueue>";

	$curl = curl_init();
	curl_setopt_array(
		$curl,
		array(
			CURLOPT_URL => "https://www.smsgatewayhub.com/api/mt/SendSms",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $xmldataset,
			CURLOPT_HTTPHEADER => array(
				"Content-Type: application/xml"
			),
		)
	);
	$response = curl_exec($curl);
	curl_close($curl);
	return $response;
}

function sendotpSMSobb($mobile, $message, $panel = 'main')
{
	$sms_text = rawurlencode($message);

	if ($panel == 'plan') {
		$obbusername = PLAN_SMS_OBB_USERNAME;
		$obbapikey = PLAN_SMS_OBB_PASSWORD;
		$obbsenderid = PLAN_SMS_OBB_SENDER_ID;
	} else {
		$obbusername = SMS_OBB_USERNAME;
		$obbapikey = SMS_OBB_PASSWORD;
		$obbsenderid = SMS_OBB_SENDER_ID;
	}

	/* $api_url = "http://m.onlinebusinessbazaar.in/sendsms.jsp?user=" . $obbusername . "&password=" . $obbapikey . "&senderid=" . $obbsenderid . "&mobiles=" . $mobile . "&sms=" . $sms_text;
	$response = file_get_contents($api_url);
	return $response; */

	$xml_data = '<?xml version="1.0"?>
    <smslist>
    <sms>
    <user>' . $obbusername . '</user>
    <password>' . $obbapikey . '</password>
    <message>' . $message . '</message>
    <mobiles>' . $mobile . '</mobiles>
    <senderid>' . $obbsenderid . '</senderid>
    </sms>
    </smslist>';

	//$URL = "43.204.206.165/sendsms.jsp?"; 
	$URL = "http://m.onlinebusinessbazaar.in/sendsms.jsp?";
	$ch = curl_init($URL);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
	curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);

	if (curl_errno($ch)) {
		log_message('error', 'cURL Error : ' . curl_error($ch));
	}

	curl_close($ch);
	return $response;
}

function sendtextSMSobb($mobile, $message, $panel = 'main')
{
	$sms_text = rawurlencode($message);

	if ($panel == 'plan') {
		$obbusername = PLAN_SMS_OBB_USERNAME;
		$obbapikey = PLAN_SMS_OBB_PASSWORD;
		$obbsenderid = PLAN_SMS_OBB_SENDER_ID;
	} else {
		$obbusername = SMS_OBB_USERNAME;
		$obbapikey = SMS_OBB_PASSWORD;
		$obbsenderid = SMS_OBB_SENDER_ID;
	}

	/* $api_url = "http://m.onlinebusinessbazaar.in/sendsms.jsp?user=" . $obbusername . "&password=" . $obbapikey . "&senderid=" . $obbsenderid . "&mobiles=" . $mobile . "&sms=" . $sms_text;
	$response = file_get_contents($api_url);
	return $response; */

	$xml_data = '<?xml version="1.0"?>
    <smslist>
    <sms>
    <user>' . $obbusername . '</user>
    <password>' . $obbapikey . '</password>
    <message>' . $message . '</message>
    <mobiles>' . $mobile . '</mobiles>
    <senderid>' . $obbsenderid . '</senderid>
    </sms>
    </smslist>';

	//$URL = "43.204.206.165/sendsms.jsp?"; 
	$URL = "http://m.onlinebusinessbazaar.in/sendsms.jsp?";
	$ch = curl_init($URL);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
	curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);

	if (curl_errno($ch)) {
		log_message('error', 'cURL Error : ' . curl_error($ch));
	}

	curl_close($ch);

	return $response;
}

function senddynamicSMSobb($mobile, $message, $panel = 'main')
{
	$sms_text = urlencode($message);

	if ($panel == 'plan') {
		$obbusername = PLAN_SMS_OBB_USERNAME;
		$obbapikey = PLAN_SMS_OBB_PASSWORD;
		$obbsenderid = getSMSsenderid('plansmssenderid');
	} else if ($panel == 'webinar') {
		$obbusername = SMS_WEBINAR_OBB_USERNAME;
		$obbapikey = SMS_WEBINAR_OBB_PASSWORD;
		$obbsenderid = SMS_WEBINAR_OBB_SENDER_ID;
	} else {
		$obbusername = SMS_OBB_USERNAME;
		$obbapikey = SMS_OBB_PASSWORD;
		$obbsenderid = getSMSsenderid('smssenderid');
	}

	/* $api_url = "http://m.onlinebusinessbazaar.in/sendsms.jsp?user=" . $obbusername . "&password=" . $obbapikey . "&senderid=" . $obbsenderid . "&mobiles=" . $mobile . "&sms=" . $sms_text;
	$response = file_get_contents($api_url);
	return $response; */

	$xml_data = '<?xml version="1.0"?>
    <smslist>
    <sms>
    <user>' . $obbusername . '</user>
    <password>' . $obbapikey . '</password>
    <message>' . $message . '</message>
    <mobiles>' . $mobile . '</mobiles>
    <senderid>' . $obbsenderid . '</senderid>
    </sms>
    </smslist>';

	//$URL = "43.204.206.165/sendsms.jsp?"; 
	$URL = "http://m.onlinebusinessbazaar.in/sendsms.jsp?";
	$ch = curl_init($URL);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
	curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);

	if (curl_errno($ch)) {
		log_message('error', 'cURL Error : ' . curl_error($ch));
	}

	curl_close($ch);

	return $response;
}

function sendxmlSMSobb($dataset)
{
	$xmldataset = "<?xml version='1.0'?><smslist>" . $dataset . "</smslist>";

	$curl = curl_init();
	curl_setopt_array(
		$curl,
		array(
			CURLOPT_URL => "http://m.onlinebusinessbazaar.in/sendsms.jsp?",
			//CURLOPT_URL => "43.204.206.165/sendsms.jsp?",
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_POST => 1,
			CURLOPT_ENCODING => 'UTF-8',
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => 1,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $xmldataset,
			CURLOPT_HTTPHEADER => array(
				"Content-Type: application/xml"
			),
		)
	);
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);

	if ($err) {
		return "cURL Error #:" . $err;
	} else {
		return $response;
	}

	/*return $response;*/
}

function sendHTMLmail($to, $from, $subject, $message, $attachfile = '')
{
	$config = array();
	$config['protocol'] = 'smtp';
	$config['smtp_host'] = SMTP_HOST;
	$config['smtp_port'] = '587';
	$config['smtp_timeout'] = '7';
	$config['smtp_user'] = SMTP_USER;
	$config['smtp_pass'] = SMTP_PASSWORD;
	$config['charset'] = 'utf-8';
	$config['newline'] = "\r\n";
	$config['mailtype'] = 'html'; // or html
	$config['validation'] = TRUE;
	$config['wordwrap'] = TRUE;

	$ci = get_instance();
	$ci->email->initialize($config);
	$ci->email->from($from, 'Bharatfinpro');
	$ci->email->to($to);
	$ci->email->subject($subject);
	$ci->email->message($message);
	$ci->email->set_crlf("\r\n");
	if ($attachfile != '') {
		$ci->email->attach($attachfile);
	}
	$ci->email->send();

	return true;
	/*if($ci->email->send()) {
		return true;
	}
	else { 
		show_error($ci->email->print_debugger());
		return false;
	}*/
}


function sendBrevoHtmlMail2($maildata, $subject = '', $message = '', $sendmail = '', $attachments = [])
{

	$data["sender"]["name"] = SIB_NAME;
	$data["sender"]["email"] = SIB_EMAILID;

	$user_res["name"] = $maildata["fullname"];
	$user_res["email"] = $maildata["email"];
	$userdata[] = $user_res;
	$data["to"] = $userdata;

	$data["subject"] = $subject;
	$data["htmlContent"] = $message;

	// Attachments (already base64 encoded)
	if (!empty($attachments)) {
		$data['attachment'] = $attachments;
	}

	// Turn Data to JSON
	$data_json = json_encode($data);

	$curl = curl_init();
	curl_setopt_array(
		$curl,
		array(
			CURLOPT_URL => "https://api.brevo.com/v3/smtp/email",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $data_json,
			CURLOPT_HTTPHEADER => [
				"Accept: application/json",
				"Content-Type: application/json",
				"api-key: " . SIB_APIKEY
			],
		)
	);
	$response = curl_exec($curl);

	$err = curl_error($curl);

	curl_close($curl);

	return true;
}

// START : Email Provider - Brevo
function sendinblueHTMLmail($maildata, $subject = "", $htmlmessage = "")
{
	$data["sender"]["name"] = SIB_NAME;
	$data["sender"]["email"] = SMTP_USER;

	//$data["replyTo"]["name"] = SIB_NAME;
	//$data["replyTo"]["email"] = SIB_EMAILID;

	$user_res["name"] = $maildata["fullname"];
	$user_res["email"] = $maildata["email"];
	$userdata[] = $user_res;
	$data["to"] = $userdata;

	$data["subject"] = $subject;
	$data["htmlContent"] = $htmlmessage;

	// Turn Data to JSON
	$data_json = json_encode($data);

	$curl = curl_init();
	curl_setopt_array(
		$curl,
		array(
			CURLOPT_URL => "https://api.brevo.com/v3/smtp/email",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $data_json,
			CURLOPT_HTTPHEADER => [
				"Accept: application/json",
				"Content-Type: application/json",
				"api-key: " . SIB_APIKEY
			],
		)
	);

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	/*if ($err) {
		 echo "cURL Error #:" . $err;
	 } else {
		 echo $response;
	 }*/

	return true;
}

function sendinblueTemplatemail($emailist, $templateid = 0)
{
	// POST Data
	$data["emailTo"] = $emailist;
	$data["replyTo"] = SIB_EMAILID;

	// Turn Data to JSON
	$data_json = json_encode($data);

	$curl = curl_init();
	curl_setopt_array(
		$curl,
		array(
			CURLOPT_URL => "https://api.sendinblue.com/v3/smtp/templates/" . $templateid . "/send",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $data_json,
			CURLOPT_HTTPHEADER => [
				"Accept: application/json",
				"Content-Type: application/json",
				"api-key: " . SIB_APIKEY
			],
		)
	);

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	/*if ($err) {
		 echo "cURL Error #:" . $err;
	 } else {
		 echo $response;
	 }*/

	return true;
}
// END : Email Provider - Brevo

function aisensy_track($postdata)
{
	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_URL => "https://backend.aisensy.com/campaign/t1/api",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($postdata),
		CURLOPT_HTTPHEADER => [
			"Content-Type: application/json"
		],
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);

	return $response;
}

function interakt_track($postdata)
{
	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_URL => "https://api.interakt.ai/v1/public/message/",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($postdata),
		CURLOPT_HTTPHEADER => [
			"Authorization: Basic " . INTERAKT_KEY,
			"Content-Type: application/json"
		],
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);

	return $response;
}

function interakt_track_new($postdata)
{
	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_URL => "https://api.interakt.ai/v1/public/message/",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($postdata),
		CURLOPT_HTTPHEADER => [
			"Authorization: Basic " . INTERAKT_KEY_NEW_RM,
			"Content-Type: application/json"
		],
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);

	return $response;
}

function plan_interakt_track_rm($postdata)
{
	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_URL => "https://api.interakt.ai/v1/public/message/",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($postdata),
		CURLOPT_HTTPHEADER => [
			"Authorization: Basic " . PLAN_INTERAKT_KEY_RM,
			"Content-Type: application/json"
		],
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);

	return $response;
}

function getRCSToken()
{
	$api_url = "http://36.255.3.23:7111/rcsApi/getToken"; // Replace with your API URL

	$username = RCS_TOKEN_USERNAME; // Replace with your username
	$password = RCS_TOKEN_PASSWORD; // Replace with your password

	// Prepare the payload
	$post_fields = json_encode([
		'username' => $username,
		'password' => $password
	]);

	$ch = curl_init($api_url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
	curl_setopt($ch, CURLOPT_HTTPHEADER, [
		'Content-Type: application/json',
		'Accept: application/json',
	]);

	$response = curl_exec($ch);
	curl_close($ch);

	$data = json_decode($response, true);
	if (isset($data['jwttoken'])) {
		return $data['jwttoken'];
	} else {
		return null;
	}
}

function sendRCSSMS($dataset)
{
	$token = getRCSToken();
	$curl = curl_init();
	curl_setopt_array(
		$curl,
		array(
			CURLOPT_URL => "https://app.rcscell24x7.com/send_campaign/send_template_API",
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_POST => 1,
			CURLOPT_ENCODING => 'UTF-8',
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => 1,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => $dataset,
			CURLOPT_HTTPHEADER => array(
				"Content-Type: application/xml",
				'Authorization: Bearer ' . $token,

			),
		)
	);
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
		return "cURL Error #:" . $err;
	} else {
		return $response;
	}

	/*return $response;*/
}

function send_schedule_call_data($data, $action = 'create', $slotId = null)
{
	$apiUrl = 'https://manage.indiakarobar.com/api/partner-schedule-slot-data';

	$payload = array_merge($data, [
		'api_key' => 'INDIAKAROBAR@2026',
		'action' => $action,
		'slot_id' => $slotId
	]);

	$jsonData = json_encode($payload);

	$ch = curl_init();
	curl_setopt_array($ch, [
		CURLOPT_URL => $apiUrl,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 20,
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => $jsonData,
		CURLOPT_HTTPHEADER => [
			'Content-Type: application/json',
			'Accept: application/json',
			'X-API-Key: ' . $payload['api_key']
		]
	]);

	$response = curl_exec($ch);
	$error = curl_error($ch);
	$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);

	if ($error) {
		log_message('error', 'cURL Error (Schedule Call): ' . $error);
		return false;
	}

	if ($httpCode >= 400) {
		log_message('error', 'HTTP Error (Schedule Call): ' . $httpCode . ' - ' . $response);
		return false;
	}

	return json_decode($response, true);
}

function webinar_interakt_payment_success_fail($postdata)
{
	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_URL => "https://api.interakt.ai/v1/public/message/",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => json_encode($postdata),
		CURLOPT_HTTPHEADER => [
			"Authorization: Basic " . INTERAKT_KEY_WEBINAR_PS_PF,
			"Content-Type: application/json"
		],
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);

	return $response;
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Manage_General_Model extends CI_Model
{

	public function single_file_upload($my_file, $file_path, $types = "*", $thumb = 1)
	{
		$this->load->library('upload');

		$config = array(
			'allowed_types' => $types,  //'gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp',
			'upload_path' => '../assets/' . $file_path,
			'overwrite' => FALSE,
			'max_size' => 20000
		);

		$this->load->library('upload');
		$this->upload->initialize($config);

		if ($this->upload->do_upload($my_file)) {
			$image_data = $this->upload->data();
		} else {
			$error = $this->upload->display_errors();
			return false;
		}

		if ($thumb == 1) {
			$config = array(
				'source_image' => $image_data['full_path'],
				'new_image' => '../assets/' . $file_path . '/thumbs',
				'maintain_ration' => TRUE,
				'width' => 150
			);

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
		}

		return $image_data['file_name'];
	}


	public function filedownload($file_path, $file_name = NULL)
	{
		if ($file_name) {
			//load download helper
			$this->load->helper('download');

			//file path
			$file = '../assets/' . $file_path . '/' . $file_name;

			//download file from directory
			force_download($file, NULL);
		} else {
			return "No file found.";
		}
	}


	public function simpleemailtemplate($message = '')
	{
		$template = '';

		if ($message != '') {
			$template .= '<!doctype html> <html lang="en-US"> <head> <meta content="text/html; charset=utf-8" http-equiv="Content-Type" /> <title>' . PROJECT_NAME . '</title> <style type="text/css"> a:hover { text-decoration: none !important; } h1, h2, h3 { color: #1e1e2d; font-weight: 500; margin: 20px 0; font-size: 30px; line-height: 42px; font-family: Open Sans, sans-serif; } p { color: #1e1e2d; font-size: 15px; line-height: 24px; margin: 10px 0; } </style> </head> <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0"> <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="font-family: Open Sans, sans-serif;"> <tr> <td> <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0"> <tr> <td style="text-align:center;padding: 20px 0;"> <img width="200" src="' . COMPANY_SITE . '/assets/images/logo-2x.png" title="logo" alt="logo"> </td> </tr> <tr> <td> <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#ecfdf5; border-radius:3px; text-align:left;"> <tr> <td style="height:30px;">&nbsp;</td> </tr> <tr> <td style="padding:0 35px;color:#000;">';
			$template .= $message;
			$template .= '</td> </tr> <tr> <td style="height:30px;">&nbsp;</td> </tr> </table> </td> </tr> <tr> <td style="text-align:center; background-color: #004936;padding: 0 10px;"> <p style="color:#fff; font-size:14px;line-height:30px; margin-bottom:15px;margin-top: 15px;"> <strong><a style="color: #fff; text-decoration: none;">' . COMPANY_MOBILE . '</a></strong> &nbsp; | &nbsp; <strong><a style="color: #fff; text-decoration: none;">' . COMPANY_EMAIL . '</a></strong> &nbsp; | &nbsp; <strong> CIN No : <a style="color: #fff; text-decoration: none;">' . COMPANY_CIN . '</a></strong> <br /><a style="color: #fff; text-decoration: none;">' . COMPANY_ADDRESS . '</a></p> <a href="' . SM_FACEBOOK . '" target="_blank" rel="bharatfinpro"><img alt="Facebook" style="max-height: 32px;" src="' . COMPANY_SITE . '/assets/images/mail-icon-light/facebook.png" title="facebook"></a> <a href="' . SM_TWITTER . '" target="_blank" rel="bharatfinpro"><img alt="Twitter" style="max-height: 32px;" src="' . COMPANY_SITE . '/assets/images/mail-icon-light/twitter.png" title="Twitter"></a> <a href="' . SM_INSTAGRAM . '" target="_blank" rel="bharatfinpro"><img alt="Instagram" style="max-height: 32px;" src="' . COMPANY_SITE . '/assets/images/mail-icon-light/instagram.png" title="instagram"></a> <a href="' . SM_LINKEDIN . '" target="_blank" rel="bharatfinpro"><img alt="linkedin" style="max-height: 32px;" src="' . COMPANY_SITE . '/assets/images/mail-icon-light/linkedin.png" title="linkedin"></a> <a href="' . SM_PINTEREST . '" target="_blank" rel="bharatfinpro"><img alt="pinterest" style="max-height: 32px;" src="' . COMPANY_SITE . '/assets/images/mail-icon-light/pinterest.png" title="pinterest"></a> <a href="' . SM_YOUTUBE . '" target="_blank" rel="bharatfinpro"><img alt="youtube" style="max-height: 32px;" src="' . COMPANY_SITE . '/assets/images/mail-icon-light/youtube.png" title="youtube"></a><br><span style="display:inline-block; vertical-align:middle; margin:15px 0 0; border-bottom:1px solid #cecece; width:100px;"></span> <p style="font-size:14px; color:#fff; line-height:24px; margin-bottom: 15px;">' . date('Y') . ' &copy; ' . COMPANY_NAME . '. All rights reserved.</p> </td> </tr> <tr> <td style="height:40px;">&nbsp;</td> </tr> </table> </td> </tr> </table> </body> </html>';
		}

		return $template;
	}

	public function welcomeemailtemplate($mobile = '', $password = '')
	{
		$template = '';

		if ($mobile != '' && $password != '') {
			$template = '<!doctype html> <html lang="en-US"> <head> <meta content="text/html; charset=utf-8" http-equiv="Content-Type" /> <title>' . PROJECT_NAME . '</title> <style type="text/css"> a:hover { text-decoration: none !important; } </style> </head> <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0"> <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="font-family: Open Sans, sans-serif;"> <tr> <td> <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0"> <tr> <td style="text-align:center;padding: 20px 0;"> <img width="200" src="' . COMPANY_SITE . '/assets/images/logo-2x.png" title="logo" alt="logo"> </td> </tr> <tr> <td> <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#ecfdf5; border-radius:3px; text-align:left;"> <tr> <td style="height:30px;">&nbsp;</td> </tr> <tr> <td style="padding:0 35px;"> <h3 style="color:#1e1e2d; font-weight:600; margin:20px 0; font-size:30px; line-height:42px; font-family:serif,Open Sans,sans-serif;margin-top: 0;"> Congratulations!</h3> <p style="color:#1e1e2d; font-size:15px; line-height:24px; margin:10px 0;">Your loan application has been successfully submitted. Please check your registered email id and login into the customer portal to submit the required documents.</p><span style="display:inline-block; vertical-align:middle; margin:15px 0 15px; border-bottom:1px solid #cecece; width:100%;"></span> <p style="color:#1e1e2d; font-size:15px; line-height:24px; margin:10px 0;"> Kindly use the following credentials to login to the customer portal:</p> <h5 style="color:#1e1e2d; font-size:16px; line-height:24px; margin:10px 0;"> Mobile: ';
			$template .= $mobile;
			$template .= '</h5> <h5 style="color:#1e1e2d; font-size:16px; line-height:24px; margin:10px 0;"> Password: ';
			$template .= $password;
			$template .= '</h5><a href="' . base_url('customer') . '" target=_blank"" style="background:#247658;text-decoration:none !important; font-weight:500; margin-top:10px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Login Now</a> </td> </tr> <tr> <td style="height:30px;">&nbsp;</td> </tr> <tr> <td style="background-color: #247658; padding:0 35px; text-align: center;"> <p style="color:#fff; font-size:13px; line-height:18px; margin:10px 0;">In case you have any query or issue, you can raise a request here : <a href="' . base_url('raise-request') . '" target="_blank" style="color:#fff; text-decoration: none;">Click Here</a></p> </td> </tr> </table> </td> </tr> <tr> <td style="text-align:center; background-color: #004936;padding: 0 10px;"> <p style="color:#fff; font-size:14px;line-height:30px; margin-bottom:15px;margin-top: 15px;"> <strong><a style="color: #fff; text-decoration: none;">' . COMPANY_MOBILE . '</a></strong> &nbsp; | &nbsp; <strong><a style="color: #fff; text-decoration: none;">' . COMPANY_EMAIL . '</a></strong> &nbsp; | &nbsp; <strong> CIN No : <a style="color: #fff; text-decoration: none;">' . COMPANY_CIN . '</a></strong> <br /><a style="color: #fff; text-decoration: none;">' . COMPANY_ADDRESS . '</a></p> <a href="' . SM_FACEBOOK . '" target="_blank" rel="bharatfinpro"><img alt="Facebook" style="max-height: 32px;" src="' . COMPANY_SITE . '/assets/images/mail-icon-light/facebook.png" title="facebook"></a> <a href="' . SM_TWITTER . '" target="_blank" rel="bharatfinpro"><img alt="Twitter" style="max-height: 32px;" src="' . COMPANY_SITE . '/assets/images/mail-icon-light/twitter.png" title="Twitter"></a> <a href="' . SM_INSTAGRAM . '" target="_blank" rel="bharatfinpro"><img alt="Instagram" style="max-height: 32px;" src="' . COMPANY_SITE . '/assets/images/mail-icon-light/instagram.png" title="instagram"></a> <a href="' . SM_LINKEDIN . '" target="_blank" rel="bharatfinpro"><img alt="linkedin" style="max-height: 32px;" src="' . COMPANY_SITE . '/assets/images/mail-icon-light/linkedin.png" title="linkedin"></a> <a href="' . SM_PINTEREST . '" target="_blank" rel="bharatfinpro"><img alt="pinterest" style="max-height: 32px;" src="' . COMPANY_SITE . '/assets/images/mail-icon-light/pinterest.png" title="pinterest"></a> <a href="' . SM_YOUTUBE . '" target="_blank" rel="bharatfinpro"><img alt="youtube" style="max-height: 32px;" src="' . COMPANY_SITE . '/assets/images/mail-icon-light/youtube.png" title="youtube"></a><br><span style="display:inline-block; vertical-align:middle; margin:15px 0 0; border-bottom:1px solid #cecece; width:100px;"></span> <p style="font-size:14px; color:#fff; line-height:24px; margin-bottom: 15px;">' . date('Y') . ' &copy; ' . COMPANY_NAME . '. All rights reserved.</p> </td> </tr> <tr> <td style="height:40px;">&nbsp;</td> </tr> </table> </td> </tr> </table> </body> </html>';
		}

		return $template;
	}
}
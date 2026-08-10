<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


/**
 * Custom defines
 */

// Project details
define('PROJECT_NAME', 'Bharatfinpro');
define('COMPANY_NAME', '#');
define('COMPANY_EMAIL', '#');
define('COMPANY_MOBILE', '#');
define('COMPANY_CIN', '#');
define('COMPANY_GST', '#');
define('COMPANY_SITE', '#');
define('COMPANY_ADDRESS', '#');
define('COMPANY_TIMING', '#');

define('SECURE_SALT', 'verloopweb');

//Social media
define('SM_GOOGLE', '#');
define('SM_FACEBOOK', '#');
define('SM_INSTAGRAM', '#');
define('SM_TWITTER', '#');
define('SM_LINKEDIN', '#');
define('SM_PINTEREST', '#');
define('SM_YOUTUBE', '#');

// Email SMTP details
define('SMTP_HOST', '#');
define('SMTP_USER', '#');
define('SMTP_PASSWORD', '#');

// SENDINBLUE details
define('SIB_NAME', '#');
define('SIB_EMAILID', '#');
define('SIB_APIKEY', '#');

// SMS details
define('SMS_API_KEY', '#');
define('SMS_SENDER_ID', '#'); 

// SMS details
define('SMS_OBB_USERNAME', '#');
define('SMS_OBB_PASSWORD', '#');
define('SMS_OBB_SENDER_ID', '#'); 

// SMS details
define('SMS_WEBINAR_OBB_USERNAME', '#');
define('SMS_WEBINAR_OBB_PASSWORD', '#');
define('SMS_WEBINAR_OBB_SENDER_ID', '#'); 

// SMS details
define('PLAN_SMS_OBB_USERNAME', '#');
define('PLAN_SMS_OBB_PASSWORD', '#');
define('PLAN_SMS_OBB_SENDER_ID', '#');

// SabPaisa details
define('SABPAISA_MODE', '#');
define('SABPAISA_CLIENT_CODE', '#');
define('SABPAISA_USERNAME', '#');
define('SABPAISA_PASSWORD', '#');
define('SABPAISA_AUTH_KEY', '#');
define('SABPAISA_AUTH_IV', '#');

// UPI Gateway details
define('UPIGATEWAY_MODE', '#');
define('UPIGATEWAY_KEY','#');

// Worldline details
define('WORLDLINE_MODE', '#');
define('WORLDLINE_MERCHANT_CODE', '#');
define('WORLDLINE_SCHEME_CODE', '#');
define('WORLDLINE_KEY_SALT', '#');
define('WORLDLINE_KEY_IV', '#');

// Step2pay details
define('STEPPAY_MODE', '#');
define('STEPPAY_EMAIL', '#');
define('STEPPAY_PASSWORD', '#');

// Phonepe details
define('PHONEPE_MODE', '#');
define('PHONEPE_MID', '#');
define('PHONEPE_KEY', '#');
define('PHONEPE_KEY_INDEX', '#');

// Zaakpay details
define('ZAAKPAY_MERCHANT_IDENTIFIER', '#');
define('ZAAKPAY_SECRET_KEY', '#');

// Cashfree details
define('CASHFREE_MODE', '#');
define('CASHFREE_APP_ID', '#');
define('CASHFREE_SECRET_KEY', '#');

// Razorpay details
define('RAZOR_KEY_ID_DEMO', '#');
define('RAZOR_KEY_ID', '#');
define('RAZOR_KEY_SECRET', '#');

// PayU details
define('PAYU_MODE', '#');
define('PAYU_MERCHANT_KEY', '#');
define('PAYU_SALT', '#');

// Lyra details
define('LYRA_MODE', '#');
define('LYRA_LCO_ID', '#');
define('LYRA_SHOP_ID', '#');
define('LYRA_MCC', '#');
define('LYRA_SHOP_NAME', '#');
define('LYRA_API_KEY', '#');

// Airpay details
define('AIRPAY_MERCHANT', '#');
define('AIRPAY_USERNAME', '#');
define('AIRPAY_KEY_PASSWORD', '#');
define('AIRPAY_SECRET', '#');

define('PAYGIC_MID', '#');
define('PAYGIC_PASSWORD', '#');

// Whatsapp API
define('AISENSY_KEY', '#');

//UAT Mobile Mumbers list
define('UAT_MOBILE_NUMBERS', serialize(array('')));

// Geoloc API Key
define('GEOLOC_API_KEY', '#');

// Whatsapp API
define('INTERAKT_KEY', '#');
define('INTERAKT_KEY_NEW_UE', '#');
define('INTERAKT_KEY_NEW_RM', '#');

define('PLAN_INTERAKT_KEY_NEW_UE', '#');
define('PLAN_INTERAKT_KEY_RM', '#');

define('INTERAKT_KEY_WEBINAR_RM', '#');
define('INTERAKT_KEY_WEBINAR_PS_PF', '#');

// Facebook
define('ACCESS_TOKEN', '#');

// Remarketing Cycle Days Set
define('LOCK_DAYS','');
  
define('COMPANY_CODE', '#');
define('LOCAL_IP', '190.92.174.183');

define('RCS_TOKEN_USERNAME', '#');
define('RCS_TOKEN_PASSWORD', '#');

define('JWT_SECERET_PARTNER_TOKEN', '#'); //Q1AwMDQ3NTokMnkkMTIkMjNlVmlrVGlkYjBnSUdzY04ud1JmZVZiYWFYZnpqeVJJS1prOWprT0U5TThYNlFha1NZYU8=

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
define('PROJECT_NAME', 'Prayosha Fincart');
define('COMPANY_NAME', 'Prayosha Fincart Pvt. Ltd.');
define('COMPANY_EMAIL', 'support@prayoshafincart.com');
define('COMPANY_MOBILE', '+91-87348-89547'); //+91-87348-89547
define('COMPANY_CIN', 'U67190GJ2022PTC133009');
define('COMPANY_GST', '24AAMCP9991N1ZC');
define('COMPANY_SITE', 'https://prayoshafincart.com');
//define('COMPANY_ADDRESS', '3rd Floor, Plot 28, Sy. No. 123/1, Parvati Nagar Co-op. Housing Society 2, Katargam, Surat, Gujarat, India, 395004');
define('COMPANY_ADDRESS', '3rd Floor, Plot 28, Sy. No. 123/1, Parvati Nagar Co-op. Housing Society 2, Katargam, Surat, Gujarat, India, 395004');
define('COMPANY_TIMING', '10 AM to 5 PM (Monday to Saturday)');

define('SECURE_SALT', 'verloopweb');

//Social media
define('SM_GOOGLE', '#');
define('SM_FACEBOOK', 'https://www.facebook.com/PrayoshaFincart/');
define('SM_INSTAGRAM', 'https://www.instagram.com/prayoshafincart/?next=%2F&hl=en');
define('SM_TWITTER', 'https://x.com/prayoshaficart');
define('SM_LINKEDIN', 'https://www.linkedin.com/company/97877361/admin/dashboard/');
define('SM_PINTEREST', 'https://in.pinterest.com/prayoshafincart/');
define('SM_YOUTUBE', 'https://www.youtube.com/channel/UC-CyyqSgp6YWgalbPdiOhvQ');

// Email SMTP details
define('SMTP_HOST', 'mail.prayoshafincart.com');
define('SMTP_USER', 'info@prayoshafincart.com');
define('SMTP_PASSWORD', 'fincart@7669');

// SENDINBLUE details
define('SIB_NAME', 'Prayoshafincart.com');
define('SIB_EMAILID', 'info@prayoshafincart.com');
define('SIB_APIKEY', '#');

// SMS details
/* define('SMS_API_KEY', 'EAjyxuIJREeeraXzsiNxrg');
define('SMS_SENDER_ID', 'PRYSFN'); */

// SMS details
define('SMS_OBB_USERNAME', 'prayosha');
define('SMS_OBB_PASSWORD', 'e284942d8cXX');
define('SMS_OBB_SENDER_ID', 'PRYFIN'); // PFINCA

// SMS details
define('SMS_WEBINAR_OBB_USERNAME', 'prayosha');
define('SMS_WEBINAR_OBB_PASSWORD', 'e284942d8cXX');
define('SMS_WEBINAR_OBB_SENDER_ID', 'PYOSHA'); // PFINCA

// SMS details
define('PLAN_SMS_OBB_USERNAME', 'privyleg');
define('PLAN_SMS_OBB_PASSWORD', '1a813941ceXX');
define('PLAN_SMS_OBB_SENDER_ID', 'PRVELG');

// SabPaisa details
define('SABPAISA_MODE', 'PROD');
define('SABPAISA_CLIENT_CODE', 'GHGO98');
define('SABPAISA_USERNAME', 'payment_10002');
define('SABPAISA_PASSWORD', 'GHGO98_SP10002');
define('SABPAISA_AUTH_KEY', '4j4MbimdV1pyLrWn');
define('SABPAISA_AUTH_IV', '4qsa6Iul4s95NQjI');

/* define('SABPAISA_MODE', 'TEST');
define('SABPAISA_CLIENT_CODE', 'LPSD1');
define('SABPAISA_USERNAME', 'Abh789@sp');
define('SABPAISA_PASSWORD', 'x0xzPnXsgTq0QqXx');
define('SABPAISA_AUTH_KEY', 'P8c3WQ7ei');
define('SABPAISA_AUTH_IV', 'oLA38cwT6IYNGqb3'); */

// UPI Gateway details
define('UPIGATEWAY_MODE', 'TEST');
define('UPIGATEWAY_KEY','360bdc9b-df83-41c8-94f2-733b1cc586af');

// Worldline details
define('WORLDLINE_MODE', 'TEST');
define('WORLDLINE_MERCHANT_CODE', 'T953049');
define('WORLDLINE_SCHEME_CODE', 'FIRST');
define('WORLDLINE_KEY_SALT', '7048415467TDTUQP');
define('WORLDLINE_KEY_IV', '2994040042AQNPQP');

// Step2pay details
define('STEPPAY_MODE', 'TEST');
define('STEPPAY_EMAIL', 'prayoshafincart@step2pay.com');
define('STEPPAY_PASSWORD', 'prayoshafincart@2023');

// Phonepe details
define('PHONEPE_MODE', 'PROD');
define('PHONEPE_MID', 'M15VTOG3RN4F');
define('PHONEPE_KEY', 'f4431de8-b2ea-4a9b-81f6-df2efa8e4a59');
define('PHONEPE_KEY_INDEX', '1');

/* define('PHONEPE_MODE', 'TEST');
define('PHONEPE_MID', 'M15VTOG3RN4F');
define('PHONEPE_KEY', 'f4431de8-b2ea-4a9b-81f6-df2efa8e4a59');
define('PHONEPE_KEY_INDEX', '1'); */

// Zaakpay details
define('ZAAKPAY_MERCHANT_IDENTIFIER', '3ea305fbb30b4f998ea75a0258366a64');
define('ZAAKPAY_SECRET_KEY', 'b2dbf829e2104cee81e9c7383d0228a7');

// Cashfree details
define('CASHFREE_MODE', 'PROD');
define('CASHFREE_APP_ID', '938342ea3a11f5e5b46a822c43243839');
define('CASHFREE_SECRET_KEY', '#');

// Razorpay details
define('RAZOR_KEY_ID_DEMO', '#');
define('RAZOR_KEY_ID', 'rzp_live_WsZGtHCSmEzAFo');
define('RAZOR_KEY_SECRET', '6flrCagJnTRZiKS0WYjZmmXb');

// PayU details
define('PAYU_MODE', 'PROD');
define('PAYU_MERCHANT_KEY', 'oOrgok');
define('PAYU_SALT', 'ukkE05PmhJuKL3dtEj5HLHofCUC0Jurx');

// Lyra details
define('LYRA_MODE', 'PROD');
define('LYRA_LCO_ID', 'LC2409123505');
define('LYRA_SHOP_ID', '93712862');
define('LYRA_MCC', '7392');
define('LYRA_SHOP_NAME', 'Prayosha Fincart Private Limited');
define('LYRA_API_KEY', 'prodpassword_3L1o1ZgReCusTTqFVHNnZ621zKn0ziqfYHhZEsxMLadCx');

// Airpay details
define('AIRPAY_MERCHANT', '314761');
define('AIRPAY_USERNAME', 'gszkXw7G5W');
define('AIRPAY_KEY_PASSWORD', 'TZrZs5Xw');
define('AIRPAY_SECRET', 'xkHKB9DjpWDrEY77');

define('PAYGIC_MID', 'PRAYOSHAFI');
define('PAYGIC_PASSWORD', 'JVF#^d6F^5%');

// Whatsapp API
define('AISENSY_KEY', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjZhNWVmZWQ5Mzk4ODQ2N2Q2YzRmMjg2MSIsIm5hbWUiOiJEaWxpcCBHb3Jhc2F2YSIsImFwcE5hbWUiOiJBaVNlbnN5IiwiY2xpZW50SWQiOiI2YTVlZmVkOTM5ODg0NjdkNmM0ZjI4NTgiLCJhY3RpdmVQbGFuIjoiTk9ORSIsImlhdCI6MTc4NDYxMDUyMX0.Ej7QrqhL0qT4ErfeIlEBk-ih3TQDeRhL25c5AeflmNI');

//UAT Mobile Mumbers list
define('UAT_MOBILE_NUMBERS', serialize(array('9408881214', '9904466599', '8154909702','9157600271','8734889547','9998807363','9998807367','6358141826','9104586771')));

// Geoloc API Key
define('GEOLOC_API_KEY', 'HbkTwslRMXHZOFfXgZhzy3WnJChCLlnhWfsj735H');

// Whatsapp API
define('INTERAKT_KEY', 'MTB5NzVWNEpxUGl5NzB4aE5zejZZS000WmNyMmxrMG5DWHI2eFljUUJfdzo=');
define('INTERAKT_KEY_NEW_UE', 'MU9ybEJOVjlGaGR0WnVDNllSMzNTRzlJdDUyOFc2M1NVX3JrUWhiS1lrbzo=');
define('INTERAKT_KEY_NEW_RM', 'MU9ybEJOVjlGaGR0WnVDNllSMzNTRzlJdDUyOFc2M1NVX3JrUWhiS1lrbzo=');

define('PLAN_INTERAKT_KEY_NEW_UE', 'R2h0dWFMTDB4bnBENG16dzN6ejlvTnFyMm1SY0xEOS1wTGhvSUtVdUdNYzo=');
define('PLAN_INTERAKT_KEY_RM', 'R2h0dWFMTDB4bnBENG16dzN6ejlvTnFyMm1SY0xEOS1wTGhvSUtVdUdNYzo=');

define('INTERAKT_KEY_WEBINAR_RM', 'aFdBMG1tc1RXS3VBejFXcXRvZVFDU2dkVDBOTkJvcjdTMXpLLWdaTzIzbzo=');
define('INTERAKT_KEY_WEBINAR_PS_PF', 'aFdBMG1tc1RXS3VBejFXcXRvZVFDU2dkVDBOTkJvcjdTMXpLLWdaTzIzbzo=');

// Facebook
define('ACCESS_TOKEN', '#');

// Remarketing Cycle Days Set
define('LOCK_DAYS','-30 days');
  
define('COMPANY_CODE', 'PRYFI5678');
define('LOCAL_IP', '190.92.174.183');
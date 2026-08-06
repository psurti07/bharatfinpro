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
define('COMPANY_MOBILE', '+91-87348-89547');
define('COMPANY_CIN', 'U67190GJ2022PTC133009');
define('COMPANY_GST', '24AAMCP9991N1ZC');
define('COMPANY_SITE', 'https://prayoshafincart.com');
define('COMPANY_ADDRESS', '3rd Floor, Plot 28, Sy. No. 123/1, Parvati Nagar Co-op. Housing Society 2, Katargam, Surat, Gujarat, India, 395004');
define('COMPANY_TIMING', '10 AM to 5 PM (Monday to Saturday)');

define('SECURE_SALT', 'verloopweb');

//Social media
define('SM_GOOGLE', '#');
define('SM_FACEBOOK', 'https://www.facebook.com/profile.php?id=100083668596171');
define('SM_INSTAGRAM', 'https://www.instagram.com/prayoshafincart/');
define('SM_TWITTER', '#');
define('SM_LINKEDIN', '#');
define('SM_PINTEREST', '#');
define('SM_YOUTUBE', '#');

// Email SMTP details
define('SMTP_HOST', 'mail.prayoshafincart.com');
define('SMTP_USER', 'info@prayoshafincart.com');
define('SMTP_PASSWORD', 'fincart@7669');

// SENDINBLUE details
define('SIB_NAME', 'Prayoshafincart.in');
define('SIB_EMAILID', 'info@prayoshafincart.in');
define('SIB_APIKEY', '#');

// SMS details
/* define('SMS_API_KEY', 'EAjyxuIJREeeraXzsiNxrg');
define('SMS_SENDER_ID', 'PRYSFN'); */

// SMS details
define('SMS_OBB_USERNAME', 'prayosha');
define('SMS_OBB_PASSWORD', 'e284942d8cXX');
define('SMS_OBB_SENDER_ID', 'PYOSHA');

// SMS details
// SMS details
define('PLAN_SMS_OBB_USERNAME', 'privyleg');
define('PLAN_SMS_OBB_PASSWORD', '1a813941ceXX');
define('PLAN_SMS_OBB_SENDER_ID', 'PRVELG');

// SMS details
define('SMS_WEBINAR_OBB_USERNAME', 'prayosha');
define('SMS_WEBINAR_OBB_PASSWORD', 'e284942d8cXX');
define('SMS_WEBINAR_OBB_SENDER_ID', 'PYOSHA'); // PFINCA


// Geoloc API Key
define('GEOLOC_API_KEY', 'HbkTwslRMXHZOFfXgZhzy3WnJChCLlnhWfsj735H');

// Facebook
define('ACCESS_TOKEN', '#');

// Whatsapp API
define('INTERAKT_KEY', 'MTB5NzVWNEpxUGl5NzB4aE5zejZZS000WmNyMmxrMG5DWHI2eFljUUJfdzo=');
define('INTERAKT_KEY_NEW_UE', 'eHNEUDBHVkFGNDFmaEVrbndac0huS1J1VE9JR1JSbXRnblp2Ym1HZDF2MDo=');
define('INTERAKT_KEY_NEW_RM', 'eHNEUDBHVkFGNDFmaEVrbndac0huS1J1VE9JR1JSbXRnblp2Ym1HZDF2MDo=');

//  Dashboard
define('PG_DIGITAL_PL', 'Zaakpay');
define('PG_DIGITAL_BL', 'Zaakpay');
define('PG_PLAN_PL', 'Zaakpay');
define('PG_PLAN_BL', 'Zaakpay');
define('PG_CARD_OFFER', 'Zaakpay'); // fail payment page
define('PG_SPECIAL_OFFER', 'Subpaisa');
define('PG_BUMPER_OFFER', 'Subpaisa');
define('PG_STAR_OFFER', 'payu');
define('PG_PRIME_OFFER', 'lyra');
define('PG_MEGA_OFFER', 'Cashfree');
define('PG_SUPER_OFFER', 'Payu'); // product offer page
define('PG_QUICK_OFFER', 'Payu'); // product pffer page

define('COMPANY_CODE', 'PRYFI5678');
define('LOCAL_IP', '190.92.174.183');
define('MASTER_API_KEY', 'Ny8zVkdhRGp6TnBVWXFvZ1pCRk5ZMFpFRENoRGV3ekJjalRPcVhXRk5EbTZoWGxzditDTmIrdm1DN2g3REFpOA==');

define('DATA_LOCK', 'YES'); // display datalock in remarketing page
define('DAYS_LOCK', '#'); // display datalock in remarketing page
define('DATE_LOCK', '04-06-2025'); // display datalock in remarketing page

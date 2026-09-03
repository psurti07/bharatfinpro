<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['translate_uri_dashes'] = TRUE;

$route['default_controller'] = 'Infopage';
$route['404_override'] = 'Customerror';

//$route['company'] = "infopage/company";
$route['our-product'] = "infopage/ourproduct";
//$route['contact'] = "infopage/contact";
$route['career'] = "infopage/career";
$route['gallery'] = "infopage/gallery";
$route['faqs'] = "infopage/faqs";
$route['loan-offers'] = "infopage/loan_offers";
$route['important-update'] = "infopage/important_update";
$route['privacy-policy'] = "infopage/privacy_policy";
$route['refund-policy'] = "infopage/refund_policy";
$route['disclaimer'] = "infopage/disclaimer";
$route['terms-conditions'] = "infopage/terms_conditions";
$route['raise-request'] = "support/raise-request";

$route['gold-membership-card'] = "product/gold";
$route['diamond-membership-card'] = "product/diamond";

$route['cardoffer'] = "loan/cardoffer";
$route['specialoffer'] = "loan/specialoffer";
$route['bumperoffer'] = "loan/bumperoffer";
$route['staroffer'] = "loan/staroffer";
$route['primeoffer'] = "loan/primeoffer";
$route['megaoffer'] = "loan/megaoffer";
$route['superoffer'] = "loan/superoffer";
$route['quickoffer'] = "loan/quickoffer";

$route['customer'] = 'customer/Login';
$route['customer/license-agreement'] = 'customer/dashboard/license_agreement';

$route['plan_customer'] = 'plan_customer/Login';
$route['plan_customer/license-agreement'] = 'plan_customer/dashboard/license_agreement';

$route['webinar/user-register'] = "webinar/user_register";
$route['webinar/personal-details'] = "webinar/personal_details";
$route['webinar/enroll-now'] = "webinar/enroll_now";
$route['webinar/otp-verification'] = "webinar/otp_verification";
$route['webinar/user-registration'] = "webinar/userregister";

$route['webinar/process'] = "webinar/userProcess";
$route['schedule-slot'] = "Schedule_Slot";


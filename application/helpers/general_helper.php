<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Content-Type: text/html; charset=utf-8');

function encryptPassword($username, $password)
{
    $enc_pass = md5(md5($username . $password) . SECURE_SALT);
    return $enc_pass;
}

function random_password($length = 6)
{
    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    //$chars = "0123456789";
    $password = substr(str_shuffle($chars), 0, $length);
    return $password;
}

function random_code($length = 6)
{
    //$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $chars = "01234567890123456789";
    $code = substr(str_shuffle($chars), 0, $length);
    return $code;
}

function checkEmail($email)
{
    $find1 = strpos($email, '@');
    $find2 = strpos($email, '.');
    if ($find1 !== false && $find2 !== false && $find2 > $find1) {
        return true;
    } else {
        return false;
    }
}

function password_stringCrypt($string, $action = 'encrypt')
{
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash('sha256', SECURE_SALT);
    $iv = substr(hash('sha256', 'wecoder_iv'), 0, 16);

    if ($action == 'encrypt') {
        log_message('error', 'string before encrypt  -- ' . $string);
        $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
        log_message('error', 'string after encrypt -- ' . $output);
    } else if ($action == 'decrypt') {
        log_message('error', 'string before decrypt -- ' . $string);

        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        log_message('error', 'string after decrypt -- ' . $output);
    }

    return $output;
}

function stringCrypt($string, $action = 'encrypt')
{
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash('sha256', SECURE_SALT);
    $iv = substr(hash('sha256', 'wecoder_iv'), 0, 16);

    if ($action == 'encrypt') {
        $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

function getUserIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function getMonthOption($selected = '')
{
    $array = array(
        "01" => "January",
        "02" => "February",
        "03" => "March",
        "04" => "April",
        "05" => "May",
        "06" => "June",
        "07" => "July",
        "08" => "August",
        "09" => "September",
        "10" => "October",
        "11" => "November",
        "12" => "December"
    );
    foreach ($array as $key => $value) {
        $option .= "<option ";
        $option .= " value=\"" . $key . "\"";
        if ($selected == $key) {
            $option .= " selected";
        }
        $option .= " >";
        $option .= $value;
        $option .= "</option>";
    }
    return $option;
}

function getDateOption($selected = "", $fromdate = "", $todate = "")
{
    $fromdate =  ($fromdate == "") ? "1" : $fromdate;
    $todate   =  ($todate == "") ? "32" : $todate;
    for ($i = $fromdate; $i < $todate; $i++) {
        if (strlen($i) == "1") $i = "0" . $i;
        $option .= "<option ";
        $option .= " value=\"" . $i . "\"";
        if ($selected == $i) {
            $option .= " selected";
        }
        $option .= " >";
        $option .= $i;
        $option .= "</option>";
    }
    return $option;
}

function getYearOption($selected = "", $fromyear = "", $toyear = "")
{
    $fromyear =  ($fromyear == "") ? "1990" : $fromyear;
    $toyear   =  ($toyear == "") ? date("Y") + 1 : $toyear;
    for ($i = $fromyear; $i <= $toyear; $i++) {
        $option .= "<option ";
        $option .= " value=\"" . $i . "\"";
        if ($selected == $i) {
            $option .= " selected";
        }
        $option .= " >";
        $option .= $i;
        $option .= "</option>";
    }
    return $option;
}


function displayDate($date)
{
    if ($date == "0000-00-00") {
        $dis_date = "-";
    } else {
        $dis_date = date("d/m/Y", strtotime($date));
    }
    return $dis_date;
}

function displayTime($time)
{
    $dis_time = date("h:i A", strtotime($time));
    return $dis_time;
}

function DateFormatDisplay($date)
{
    if ($date == "0000-00-00" || $date == "") {
        $dis_date = "-";
    } else {
        $dis_date = date("d/m/Y H:i", strtotime($date));
    }
    return $dis_date;
}

function insertDate($date)
{
    $ins_date = date("Y-m-d", strtotime($date));
    return $ins_date;
}

function dateDiffInDays($date1, $date2)
{
    // Calulating the difference in timestamps 
    if ($date1 != "" && $date2 != "") {
        $difference = strtotime($date2) - strtotime($date1);

        /*$minutes = floor($difference / 60);
        $out = floor($minutes / 60).':'.($minutes -   floor($minutes / 60) * 60);*/

        $out = abs(round($difference / 86400));
    } else {
        $out = "-";
    }

    return $out;
}

function get_time_ago($rec_date)
{
    // Convert date into strtotime to calculate difference
    if ($rec_date != "") {
        $time = strtotime($rec_date);
        $time_difference = time() - $time;

        if ($time_difference < 1) {
            return 'less than 1 second ago';
        }
        $condition = array(
            12 * 30 * 24 * 60 * 60 =>  'year',
            30 * 24 * 60 * 60       =>  'month',
            24 * 60 * 60            =>  'day',
            60 * 60                 =>  'hour',
            60                      =>  'minute',
            1                       =>  'second'
        );

        foreach ($condition as $secs => $str) {
            $d = $time_difference / $secs;

            if ($d >= 1) {
                $t = round($d);
                return $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
            }
        }
    } else {
        return "Never";
    }
}

function fetchRecDate($rec_date)
{
    $current_date = date('Y-m-d H:i:s');

    if (dateDiffInDays($rec_date, $current_date) <= 7) {
        $date = get_time_ago($rec_date);
    } else {
        $date = displayDate($rec_date);
    }

    return $date;
}

function isBusinessHours()
{
    $currentHour = date('H');
    $startTime = 00;
    $endTime = 23;

    if ($currentHour >= $startTime && $currentHour <= $endTime) {
        return true;
    } else {
        return false;
    }
}

function is_time_cron($time, $cron)
{
    $cron_parts = explode(' ', $cron);
    if (count($cron_parts) != 5) {
        return false;
    }

    list($min, $hour, $day, $mon, $week) = explode(' ', $cron);

    $to_check = array('min' => 'i', 'hour' => 'G', 'day' => 'j', 'mon' => 'n', 'week' => 'w');

    $ranges = array(
        'min' => '0-59',
        'hour' => '0-23',
        'day' => '1-31',
        'mon' => '1-12',
        'week' => '0-6',
    );

    foreach ($to_check as $part => $c) {
        $val = $$part;
        $values = array();

        /*
            For patters like 0-23/2
        */
        if (strpos($val, '/') !== false) {
            //Get the range and step
            list($range, $steps) = explode('/', $val);

            //Now get the start and stop
            if ($range == '*') {
                $range = $ranges[$part];
            }
            list($start, $stop) = explode('-', $range);

            for ($i = $start; $i <= $stop; $i = $i + $steps) {
                $values[] = $i;
            }
        }
        /*
            For patters like :
            2
            2,5,8
            2-23
        */ else {
            $k = explode(',', $val);

            foreach ($k as $v) {
                if (strpos($v, '-') !== false) {
                    list($start, $stop) = explode('-', $v);

                    for ($i = $start; $i <= $stop; $i++) {
                        $values[] = $i;
                    }
                } else {
                    $values[] = $v;
                }
            }
        }

        if (!in_array(date($c, $time), $values) and (strval($val) != '*')) {
            return false;
        }
    }
    return true;
}

function formatePrice($price)
{
    if (is_numeric($price)) {
        return number_format($price, 2);
    } else {
        if (empty($price)) {
            return "0.00";
        } else {
            return $price;
        }
    }
}

function formatePriceIndia($num)
{
    $explrestunits = "";
    $num = preg_replace('/,+/', '', $num);
    $words = explode(".", $num);
    $des = "00";

    if (count($words) <= 2) {
        $num = $words[0];
        if (count($words) >= 2) {
            $des = $words[1];
        }
        if (strlen($des) < 2) {
            $des = "$des";
        } else {
            $des = substr($des, 0, 2);
        }
    }
    if (strlen($num) > 3) {
        $lastthree = substr($num, strlen($num) - 3, strlen($num));
        $restunits = substr($num, 0, strlen($num) - 3); // extracts the last three digits
        $restunits = (strlen($restunits) % 2 == 1) ? "0" . $restunits : $restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for ($i = 0; $i < sizeof($expunit); $i++) {
            // creates each of the 2's group and adds a comma to the end
            if ($i == 0) {
                $explrestunits .= (int)$expunit[$i] . ","; // if is first value , convert into integer
            } else {
                $explrestunits .= $expunit[$i] . ",";
            }
        }
        $thecash = $explrestunits . $lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash . "." . $des; // writes the final format where $currency is the currency symbol.
}

function randomColor()
{
    $rand_color = '#' . substr(md5(mt_rand()), 0, 6);
    return $rand_color;
}

function alert_message($msg, $class = 'danger')
{
    if (!empty($msg)) {
        /*$class = ($type == 'error') ? 'danger' : 'success';*/
        $out = '<div class="alert alert-' . $class . ' border-' . $class . '">';
        $out .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        $out .= '<i class="icofont icofont-close-line-circled"></i>';
        $out .= '</button>';
        $out .= $msg;
        $out .= '</div>';

        return $out;
    } else {
        return false;
    }
}

function calEligiblity($income, $emi, $apr, $loanamount)
{
    $remainamount = floor(($income * 0.35) - $emi);
    $monthlyemi = floor(($loanamount + ($loanamount * ($apr / 100)) * 6) / 72);
    $amount = floor(($loanamount * $remainamount) / $monthlyemi);
    if ($amount < 200000) {
        $amount = 195000;
    } else if ($amount > 850000) {
        $amount = 875000;
    }
    return round($amount);
}

function calPMT($apr, $term, $loanamount)
{
    $term = $term * 12;
    $apr = $apr / 1200;
    $amount = $apr * -$loanamount * pow((1 + $apr), $term) / (1 - pow((1 + $apr), $term));
    return formatePriceIndia(round($amount));
}

function calPercentage($oldvalue, $newvalue)
{
    $amtratio = 100 - (($newvalue * 100) / $oldvalue);
    $percentagevalue = round($amtratio) . "%";
    return $percentagevalue;
}

function getStateOption($selected_state = '')
{
    $states = array(
        "Andaman and Nicobar Islands" => "Andaman and Nicobar Islands",
        "Andhra Pradesh" => "Andhra Pradesh",
        "Arunachal Pradesh" => "Arunachal Pradesh",
        "Assam" => "Assam",
        "Bihar" => "Bihar",
        "Chandigarh" => "Chandigarh",
        "Chhattisgarh" => "Chhattisgarh",
        "Dadra and Nagar Haveli and Daman and Diu" => "Dadra and Nagar Haveli",
        "Daman and Diu" => "Daman and Diu",
        "Delhi" => "Delhi",
        "Goa" => "Goa",
        "Gujarat" => "Gujarat",
        "Haryana" => "Haryana",
        "Himachal Pradesh" => "Himachal Pradesh",
        "Jammu and Kashmir" => "Jammu and Kashmir",
        "Jharkhand" => "Jharkhand",
        "Karnataka" => "Karnataka",
        "Kerala" => "Kerala",
        "Ladakh" => "Ladakh",
        "Lakshadweep" => "Lakshadweep",
        "Madhya Pradesh" => "Madhya Pradesh",
        "Maharashtra" => "Maharashtra",
        "Manipur" => "Manipur",
        "Meghalaya" => "Meghalaya",
        "Mizoram" => "Mizoram",
        "Nagaland" => "Nagaland",
        "Odisha" => "Odisha",
        "Puducherry" => "Puducherry",
        "Punjab" => "Punjab",
        "Rajasthan" => "Rajasthan",
        "Sikkim" => "Sikkim",
        "Tamil Nadu" => "Tamil Nadu",
        "Telangana" => "Telangana",
        "Tripura" => "Tripura",
        "Uttar Pradesh" => "Uttar Pradesh",
        "Uttarakhand" => "Uttarakhand",
        "West Bengal" => "West Bengal"
    );

    foreach ($states as $key => $value) {
        $option .= "<option ";
        $option .= " value=\"" . $value . "\"";
        if ($selected_state == $value) {
            $option .= " selected";
        }
        $option .= " >";
        $option .= $key;
        $option .= "</option>";
    }
    return $option;
}


function getStateAbbreviation($state_name = '')
{
    $states = array(
        "Andaman and Nicobar Islands" => "AN",
        "Andhra Pradesh" => "AP",
        "Arunachal Pradesh" => "AR",
        "Assam" => "AS",
        "Bihar" => "BR",
        "Chandigarh" => "CH",
        "Chhattisgarh" => "CT",
        "Dadra and Nagar Haveli" => "DN",
        "Daman and Diu" => "DD",
        "Delhi" => "DL",
        "Goa" => "GA",
        "Gujarat" => "GJ",
        "Haryana" => "HR",
        "Himachal Pradesh" => "HP",
        "Jammu and Kashmir" => "JK",
        "Jharkhand" => "JH",
        "Karnataka" => "KA",
        "Kerala" => "KL",
        "Ladakh" => "LA",
        "Lakshadweep" => "LD",
        "Madhya Pradesh" => "MP",
        "Maharashtra" => "MH",
        "Manipur" => "MN",
        "Meghalaya" => "ML",
        "Mizoram" => "MZ",
        "Nagaland" => "NL",
        "Odisha" => "OR",
        "Puducherry" => "PY",
        "Punjab" => "PB",
        "Rajasthan" => "RJ",
        "Sikkim" => "SK",
        "Tamil Nadu" => "TN",
        "Telangana" => "TG",
        "Tripura" => "TR",
        "Uttar Pradesh" => "UP",
        "Uttarakhand" => "UT",
        "West Bengal" => "WB"
    );

    foreach ($states as $key => $value) {
        if ($state_name == $key) {
            $statecode = $value;
        }
    }

    return $statecode;
}

function getLockDateByDays()
{
    $currentDate = new DateTime();
    $currentDate->modify(LOCK_DAYS);
    $currentDate->setTime(0, 0, 0);
    $lockdate = $currentDate->format('Y-m-d H:i:s');

    return $lockdate;
}

<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Partnersturnover extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        die;
    }

    public function membership()
    {
        $recDate = date('Y-m-d', strtotime('-1 days'));
        $where = "DATE(m.rec_date) between '" . $recDate . "' AND '" . $recDate . "'";
        $data = $this->db->select('COUNT(DISTINCT i.userid) AS totalusers, IFNULL(SUM(i.inv_price), 0) AS totalamount')
            ->from('membership_order as m')
            ->join('user_registration as r', 'r.id = m.userid')
            ->join('invoice i', 'i.cardid = m.id')
            ->where_in('i.inv_for', array('1,2'))
            ->where($where)
            ->where(['m.isActive' => 1, 'm.isDelete' => 0, 'r.isUser' => 2, 'r.isActive' => 1, 'r.isDelete' => 0, 'i.isDelete' => 0])
            ->get()->row();

        $object = new stdClass();
        $array = get_object_vars($data);

        $array['inv_date'] = $recDate;
        $array['companycode'] = COMPANY_CODE;
        $array['product'] = 'Membership';

        $response = $this->submitturnover($array);
        print_r($response);
        die;
    }

    public function submitturnover($data)
    {
        $jsonData = json_encode($data);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://bizfin.indiakarobar.com/api/manage/partners-turnover',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $jsonData,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $responseData = json_decode($response, true);
            return $responseData;
        }
    }
}
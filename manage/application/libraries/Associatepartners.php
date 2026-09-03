<?php 
    require APPPATH . 'libraries/REST_Controller.php';
    class Associatepartners extends REST_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->database();
        }

        public function index_post(){
            $headers = $this->input->get_request_header('saltkey');
            $decryptKey = stringCrypt($headers, 'decrypt');
            $postDate = $_REQUEST['date'];
            if($_REQUEST['ip'] === LOCAL_IP){
                if($decryptKey === COMPANY_CODE){
                    $todayUserRegister      = $this->userCount(date('Y-m-d', strtotime($postDate)),'today');
                    $currentMonthRegister   = $this->userCount(date('Y-m-d', strtotime($postDate)),'current');
                    $lastMonthRegister      = $this->userCount(date('Y-m-d', strtotime($postDate)),'last');
                    $todaySelling           = $this->sellingAmt(date('Y-m-d', strtotime($postDate)), 'today');
                    $currentMonthSelling    = $this->sellingAmt(date('Y-m-d', strtotime($postDate)), 'current');
                    $lastMonthSelling       = $this->sellingAmt(date('Y-m-d', strtotime($postDate)), 'last');
                    $hourlyCountUsers       = $this->hourBasedCountUser(date('Y-m-d', strtotime($postDate)));
                    $this->response([
                        'todayUserRegister' => $todayUserRegister,
                        'todaySelling' => $todaySelling,

                        'currentMonthUserRegister' => $currentMonthRegister,
                        'currentMonthSelling' => $currentMonthSelling,
                         
                        'lastMonthUserRegister' => $lastMonthRegister,
                        'lastMonthSelling' => $lastMonthSelling,
                        'hourlyUsers' => $hourlyCountUsers
                    ], REST_Controller::HTTP_OK);
                } else {
                    $this->response('Unauthorize Access', REST_Controller::HTTP_UNAUTHORIZED);    
                }
            } else {
                $this->response('Invalid Request Perform', REST_Controller::HTTP_BAD_REQUEST);
            }
        }

        public function userCount($date, $filter){
            switch ($filter) {
                case 'today':
                    # code...
                    $where = ['Date(rec_date)' => $date];
                    break;
                case 'current':
                    # code...
                    $where = [ 'YEAR(rec_date)' => date('Y',strtotime($date)), 'MONTH(rec_date)' => date('m',strtotime($date))];
                    break;
                case 'last':
                    # code...
                    $year = date('Y', strtotime($date));//2023
                    $month = date('m', strtotime($date));//1
                    $where = ['YEAR(rec_date)' => ($month == 01) ? $year - 1  : $year, 'MONTH(rec_date)' => date('m',strtotime($date.' -1 month'))];
                    break;
                default:
                    # code...
                    break;
            }
            $userCount = $this->db->where($where)
            ->where(['isUser' => 2, 'isActive' => 1, 'isDelete' => 0])
            ->get('user_registration')->num_rows();
            // echo $this->db->last_query(); die;
            return $userCount;
        }

        public function sellingAmt($date, $filter){
            switch ($filter) {
                case 'today':
                    # code...
                    $where = "DATE(registration_date) = '" . $date ."'";
                    $where2 = "DATE(rec_date) = '". $date ."'";
                    break;

                case 'current':
                    # code...
                    $where = "YEAR(registration_date) = '". date('Y', strtotime($date)) ."' and MONTH(registration_date) = '" . date('m', strtotime($date)) ."'";
                    $where2 = "YEAR(rec_date) = '". date('Y', strtotime($date)) ."' and MONTH(rec_date) = '". date('m', strtotime($date)) ."'";
                    break;

                case 'last':
                    # code...
                    $year = date('Y', strtotime($date));
                    $month = date('m', strtotime($date));
                    $where = "YEAR(registration_date) = '".($month == 01 ? $year - 1 : $year)."' and MONTH(registration_date) = '".date('m',strtotime($date.' -1 month'))."'";
                    $where2 = "YEAR(rec_date) = '".($month == 01 ? $year - 1 : $year)."' and MONTH(rec_date) = '".date('m',strtotime($date.' -1 month'))."'";
                    break;
                default:
                    # code...
                    break;
            }
            // echo $where.'<br/><br/>';
            // echo $where2; die;
            $totalAmt = $this->db->query(
                "select sum(amount) as totalAmount from membership_order 
                where ". $where ." and 
                isActive = 1 and 
                isDelete = 0 and 
                userid IN (select id from user_registration where ". $where2 ." and isUser = 2 and isActive = 1 and isDelete = 0)"
            )->row()->totalAmount;
            return $totalAmt;
        }

        public function hourBasedCountUser($date){
            $query = $this->db->select('hours.hour_of_day, IFNULL(COUNT(users.id), 0) AS user_count')
            ->from('(SELECT 0 AS hour_of_day
            UNION SELECT 1 UNION SELECT 2 UNION SELECT 3
            UNION SELECT 4 UNION SELECT 5 UNION SELECT 6 UNION SELECT 7
            UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11
            UNION SELECT 12 UNION SELECT 13 UNION SELECT 14 UNION SELECT 15
            UNION SELECT 16 UNION SELECT 17 UNION SELECT 18 UNION SELECT 19
            UNION SELECT 20 UNION SELECT 21 UNION SELECT 22 UNION SELECT 23) AS hours')
            ->join('user_registration as users','hours.hour_of_day = HOUR(users.rec_date) AND DATE(users.rec_date) = "'.$date.'"','left')
            ->where(['isActive'=>1, 'isDelete'=>0, 'isUser'=>2])
            ->group_by('hours.hour_of_day')
            ->order_by('hours.hour_of_day')
            ->get()->result_array();
            $hourlyResults = [];
            for ($hour = 0; $hour < 24; $hour++) {
                $hourlyResults[$hour] = 0; // Initialize user count to 0 for all hours
            }
            
            // Populate user counts for available hours from the MySQL query result
            foreach ($query as $row) {
                $hourlyResults[$row['hour_of_day']] = $row['user_count'];
            }
            // Now add the remaining hours with zero users
            for ($hour = 0; $hour < 24; $hour++) {
                if (!isset($hourlyResults[$hour])) {
                    $hourlyResults[$hour] = 0;
                }
            }
            return implode(',',$hourlyResults);
        }

    }
?>
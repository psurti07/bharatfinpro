<?php

defined('BASEPATH') or exit('No direct script access allowed');

class OnboardTransactionController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function onboarding()
    {
        header('Content-Type: application/json'); // ✅ FIX 1

        try {

            // ✅ Get JSON input
            $data = json_decode(file_get_contents("php://input"), true);

            // ✅ FIX 2 (invalid JSON)
            if (!$data) {
                echo json_encode([
                    'status' => false,
                    'message' => 'Invalid JSON'
                ]);
                return;
            }

            // 🔐 Security check
            if (!isset($data['api_key']) || $data['api_key'] !== 'INDIAKAROBAR@2026') {
                echo json_encode([
                    'status' => false,
                    'message' => 'Unauthorized'
                ]);
                return;
            }

            // ✅ Validation
            if (
                empty($data['company_code']) ||
                empty($data['date']) ||
                !isset($data['leads']) ||
                !isset($data['customers']) ||
                !isset($data['amount'])
            ) {
                echo json_encode([
                    'status' => false,
                    'message' => 'Invalid data'
                ]);
                return;
            }

            // ✅ Prepare data
            $insertData = [
                'company_code'     => $data['company_code'],
                'date'             => $data['date'],
                'rec_date'         => date('Y-m-d H:i:s'),
                'total_leads'      => $data['leads'],
                'total_customers'  => $data['customers'],
                'total_amount'     => $data['amount'],
                'gst_amount'       => 0,
                'isActive'         => 1,
                'isDelete'         => 0
            ];

            // ✅ Check existing
            $exists = $this->db
                ->where('company_code', $data['company_code'])
                ->where('date', $data['date'])
                ->get('onboarding_transaction')
                ->row();

            if ($exists) {
                $this->db->where('id', $exists->id)
                    ->update('onboarding_transaction', $insertData);
            } else {
                $this->db->insert('onboarding_transaction', $insertData);
            }

            echo json_encode([
                'status' => true,
                'message' => 'Data saved successfully'
            ]);
        } catch (\Exception $e) { // ✅ FIX 3

            echo json_encode([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function onborad_transaction_detail()
    {
        $query = $this->db->order_by('id desc')
            ->get('onboarding_transaction')
            ->result();

        $this->db->close();
        $this->db->initialize();

        return $query;
    }

    /**
     * Cron job to send webinar/workshop data to indiakarobar
     * Run every hour
     */
    public function send_webinar_data()
    {
        // Log start
        log_message('info', 'SendWebinarDataToIndiakarobar started');

        $date = date('Y-m-d');
        //$date = '2026-06-06';
        $dateFormat = date('d/m/Y');

        // Company details
        $companyCode = '#';  // Update with your company code
        $companyName = 'Bharatfinpro';  // Update with your company name
        //$companyLocalIp = LOCAL_IP;  // Get from environment or config

        // API URL
        $apiUrl = 'https://manage.indiakarobar.com/api/program-referral-data';

        // 1 = Leads (Webinar Registrations) - Adjust table names as per your DB
        $leadsQuery =  $this->db->select('uwr.*')
            ->from('user_webinar_registration uwr')
            ->join('webinar_order wo', 'wo.userid = uwr.id')
            ->where('DATE(uwr.rec_date)', $date)
            ->where('wo.isUser !=', 2)
            ->where('uwr.isDelete', 0)
            ->where('wo.isDelete', 0)
            ->get();
        $totalLeads = $leadsQuery->num_rows();

        // Get user IDs for leads
        $userIds = array();
        foreach ($leadsQuery->result() as $lead) {
            $userIds[] = $lead->id;
        }

        // 2 = Customers (Paid Webinar Orders)
        $totalCustomers = 0;
        $totalAmount = 0;

        if (!empty($userIds)) {
            $customersQuery = $this->db->select('uwr.*, wo.amount')
                ->from('user_webinar_registration uwr')
                ->join('webinar_order wo', 'wo.userid = uwr.id')
                ->where('DATE(uwr.rec_date)', $date)
                ->where('wo.isUser', 2)
                ->where('uwr.isDelete', 0)
                ->where('wo.isDelete', 0)
                ->get();
            $totalCustomers = $customersQuery->num_rows();

            // Calculate total amount
            $amount = 0;
            foreach ($customersQuery->result() as $order) {
                $amount += $order->amount;
            }
            $totalAmount = round($amount, 2);
        }

        // Log data
        log_message('info', 'Webinar data prepared', [
            'date' => $date,
            'leads' => $totalLeads,
            'customers' => $totalCustomers,
            'amount' => $totalAmount
        ]);

        // Skip if no data
        if ($totalLeads == 0 && $totalCustomers == 0 && $totalAmount == 0) {
            log_message('info', 'No data found for today, skipping sync');
            echo "No data to sync\n";
            return;
        }

        // Prepare payload
        $payload = array(
            'api_key' => 'INDIAKAROBAR@2026',
            'company_code' => $companyCode,
            'company_name' => $companyName,
            //'company_local_ip' => $companyLocalIp,
            'product' => 1, // 1=webinar, 2=workshop
            'data_date' => $dateFormat,
            'total_leads' => $totalLeads,
            'total_customer' => $totalCustomers,
            'total_amount' => $totalAmount
        );

        log_message('info', 'Sending payload to indiakarobar API', [
            'api_url' => $apiUrl,
            'payload' => json_encode($payload)
        ]);

        // Send data
        $response = send_webinar_data($apiUrl, $payload);

        if ($response && isset($response['status']) && $response['status'] === true) {
            log_message('info', 'Webinar data sent successfully', ['response' => $response]);
            echo "✅ Webinar data synced successfully!\n";
            //echo "   📊 Leads (Type 1): {$totalLeads}\n";
            //echo "   👥 Customers (Type 2): {$totalCustomers}\n";
            //echo "   💰 Amount: ₹{$totalAmount}\n";
        } else {
            log_message('error', 'Failed to send webinar data', ['response' => $response]);
            echo "❌ Failed to sync webinar data\n";
        }

        log_message('info', 'SendWebinarDataToIndiakarobar completed');
    }
}
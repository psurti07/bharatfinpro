<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Manage_Site_Model extends CI_Model
{

    public function gettodaystatestics()
    {
        $statestics_res = [];

        /* Online Loan */
        $query_digital = $this->db->select('r.id')
            ->from('user_registration r')
            ->where("CAST(r.update_date as date) = CAST('" . date('Y-m-d') . "' as date)")
            ->where('r.isUser', 1)
            ->where('r.isDelete', 0)
            ->order_by('r.id asc')
            ->get();
        $statestics_res['digitalloans'] = $query_digital->num_rows();

        $query_digitalpl = $this->db->select('r.id')
            ->from('user_registration r')
            ->join('user_application a', 'a.userid = r.id')
            ->where("CAST(r.update_date as date) = CAST('" . date('Y-m-d') . "' as date)")
            ->where('a.loantype', 11)
            ->where('r.isUser', 1)
            ->where('r.isDelete', 0)
            ->order_by('r.id asc')
            ->get();
        $statestics_res['digitalpersonal'] = $query_digitalpl->num_rows();

        $query_digitalbl = $this->db->select('r.id')
            ->from('user_registration r')
            ->join('user_application a', 'a.userid = r.id')
            ->where("CAST(r.update_date as date) = CAST('" . date('Y-m-d') . "' as date)")
            ->where('a.loantype', 12)
            ->where('r.isUser', 1)
            ->where('r.isDelete', 0)
            ->order_by('r.id asc')
            ->get();
        $statestics_res['digitalbusiness'] = $query_digitalbl->num_rows();
        /* Online Loan */


        /* plan Online Loan */
        $query_plan = $this->db->select('r.id')
            ->from('plan_user_registration r')
            ->where("CAST(r.update_date as date) = CAST('" . date('Y-m-d') . "' as date)")
            ->where('r.isUser', 1)
            ->where('r.isDelete', 0)
            ->order_by('r.id asc')
            ->get();
        $statestics_res['planloans'] = $query_plan->num_rows();

        $query_planpl = $this->db->select('r.id')
            ->from('plan_user_registration r')
            ->join('plan_user_application a', 'a.userid = r.id')
            ->where("CAST(r.update_date as date) = CAST('" . date('Y-m-d') . "' as date)")
            ->where('a.loantype', 21)
            ->where('r.isUser', 1)
            ->where('r.isDelete', 0)
            ->order_by('r.id asc')
            ->get();
        $statestics_res['planpersonal'] = $query_planpl->num_rows();

        $query_planbl = $this->db->select('r.id')
            ->from('plan_user_registration r')
            ->join('plan_user_application a', 'a.userid = r.id')
            ->where("CAST(r.update_date as date) = CAST('" . date('Y-m-d') . "' as date)")
            ->where('a.loantype', 22)
            ->where('r.isUser', 1)
            ->where('r.isDelete', 0)
            ->order_by('r.id asc')
            ->get();
        $statestics_res['planbusiness'] = $query_planbl->num_rows();
        /* plan Online Loan */

        $query_gold = $this->db->select('r.id')
            ->from('user_registration r')
            ->join('membership_order m', 'm.userid=r.id')
            ->where("CAST(m.rec_date as date) = CAST('" . date('Y-m-d') . "' as date)")
            ->where('r.cardtype', 11)
            ->where('m.isDelete', 0)
            ->where('r.isDelete', 0)
            ->get();
        $statestics_res['goldcards'] = $query_gold->num_rows();

        $query_diamond = $this->db->select('r.id')
            ->from('user_registration r')
            ->join('membership_order m', 'm.userid=r.id')
            ->where("CAST(m.rec_date as date) = CAST('" . date('Y-m-d') . "' as date)")
            ->where('r.cardtype', 12)
            ->where('m.isDelete', 0)
            ->where('r.isDelete', 0)
            ->get();
        $statestics_res['diamondcards'] = $query_diamond->num_rows();

        /* plan loan data */

        $query_planpl = $this->db->select('r.id')
            ->from('plan_user_registration r')
            ->join('plan_order m', 'm.userid=r.id')
            ->where("CAST(m.rec_date as date) = CAST('" . date('Y-m-d') . "' as date)")
            ->where('r.cardtype', 21)
            ->where('r.isUser', 2)
            ->where('m.isDelete', 0)
            ->where('r.isDelete', 0)
            ->get();
        $statestics_res['planpersonalloan'] = $query_planpl->num_rows();

        $query_planbl = $this->db->select('r.id')
            ->from('plan_user_registration r')
            ->join('plan_order m', 'm.userid=r.id')
            ->where("CAST(m.rec_date as date) = CAST('" . date('Y-m-d') . "' as date)")
            ->where('r.cardtype', 22)
            ->where('r.isUser', 2)
            ->where('m.isDelete', 0)
            ->where('r.isDelete', 0)
            ->get();
        $statestics_res['planbusinessloan'] = $query_planbl->num_rows();

        /*plan loan data end */

        $query_application = $this->db->select('a.id')
            ->from('user_registration r')
            ->join('user_application a', 'a.userid=r.id')
            ->where("CAST(a.rec_date as date) = CAST('" . date('Y-m-d') . "' as date)")
            ->where('a.status', 1)
            ->where('a.isDelete', 0)
            ->where('r.isUser', 2)
            ->where('r.isDelete', 0)
            ->get();
        $statestics_res['userapplication'] = $query_application->num_rows();

        /*plan application */
        $query_plan_application = $this->db->select('a.id')
            ->from('plan_user_registration r')
            ->join('plan_user_application a', 'a.userid=r.id')
            ->where("CAST(a.rec_date as date) = CAST('" . date('Y-m-d') . "' as date)")
            ->where('a.status', 1)
            ->where('a.isDelete', 0)
            ->where('r.isUser', 2)
            ->where('r.isDelete', 0)
            ->get();
        $statestics_res['planuserapplication'] = $query_plan_application->num_rows();

        $query_application_plan = $this->db->select('a.id')
            ->from('plan_user_registration r')
            ->join('plan_user_application a', 'a.userid=r.id')
            ->where('a.userid in (SELECT userid FROM plan_user_application GROUP BY userid HAVING COUNT(*) > 1)')
            ->where("CAST(a.rec_date as date) = CAST('" . date('Y-m-d') . "' as date)")
            ->where('a.status', 1)
            ->where('a.isDelete', 0)
            ->where('r.isUser', 2)
            ->where('r.isDelete', 0)
            ->get();
        $statestics_res['reapplyapplicationplan'] = $query_application_plan->num_rows();


        $query_application = $this->db->select('a.id')
            ->from('user_registration r')
            ->join('user_application a', 'a.userid=r.id')
            ->where('a.userid in (SELECT userid FROM user_application GROUP BY userid HAVING COUNT(*) > 1)')
            ->where("CAST(a.rec_date as date) = CAST('" . date('Y-m-d') . "' as date)")
            ->where('a.status', 1)
            ->where('a.isDelete', 0)
            ->where('r.isUser', 2)
            ->where('r.isDelete', 0)
            ->get();
        $statestics_res['reapplyapplication'] = $query_application->num_rows();

        $query_offer = $this->db->select('id')
            ->where('registration_date', date('Y-m-d'))
            ->where('offerpage', 1)
            ->where("paymentid !=''")
            ->where('isDelete', 0)
            ->get('cardoffer_order');
        $statestics_res['cardoffer'] = $query_offer->num_rows();

        $query_offer = $this->db->select('id')
            ->where('registration_date', date('Y-m-d'))
            ->where('offerpage', 2)
            ->where('isDelete', 0)
            ->get('cardoffer_order');
        $statestics_res['specialoffer'] = $query_offer->num_rows();

        $query_offer = $this->db->select('id')
            ->where('registration_date', date('Y-m-d'))
            ->where('offerpage', 3)
            ->where('isDelete', 0)
            ->get('cardoffer_order');
        $statestics_res['bumperoffer'] = $query_offer->num_rows();

        $query_offer = $this->db->select('id')
            ->where('registration_date', date('Y-m-d'))
            ->where('offerpage', 4)
            ->where('isDelete', 0)
            ->get('cardoffer_order');
        $statestics_res['staroffer'] = $query_offer->num_rows();

        $query_offer = $this->db->select('id')
            ->where('registration_date', date('Y-m-d'))
            ->where('offerpage', 5)
            ->where('isDelete', 0)
            ->get('cardoffer_order');
        $statestics_res['primeoffer'] = $query_offer->num_rows();

        $query_offer = $this->db->select('id')
            ->where('registration_date', date('Y-m-d'))
            ->where('offerpage', 6)
            ->where('isDelete', 0)
            ->get('cardoffer_order');
        $statestics_res['megaoffer'] = $query_offer->num_rows();

        $query_offer = $this->db->select('id')
            ->where('registration_date', date('Y-m-d'))
            ->where('offerpage', 7)
            ->where('isDelete', 0)
            ->get('cardoffer_order');
        $statestics_res['superoffer'] = $query_offer->num_rows();

        $query_offer = $this->db->select('id')
            ->where('registration_date', date('Y-m-d'))
            ->where('offerpage', 8)
            ->where('isDelete', 0)
            ->get('cardoffer_order');
        $statestics_res['quickoffer'] = $query_offer->num_rows();

        $query_refferalcst = $this->db->select('t.id')
            ->from('user_tree t')
            ->join('user_registration r1', 't.refferaluserid=r1.id')
            ->join('user_registration r2', 't.subuserid=r2.id')
            ->join('membership_order m', 'r2.id=m.userid')
            ->where('t.refferaltype', 1)
            ->where('t.payout', 0)
            ->where('r2.isDelete', 0)
            ->where('r2.isUser', 2)
            ->where('r1.isUser', 2)
            ->order_by('t.rec_date asc')
            ->get();
        $statestics_res['refferalcustomerpayout'] = $query_refferalcst->num_rows();

        /* Plan referral */

        $query_planrefferalcst = $this->db->select('t.id')
            ->from('user_tree t')
            ->join('plan_user_registration r1', 't.refferaluserid=r1.id')
            ->join('plan_user_registration r2', 't.subuserid=r2.id')
            ->join('plan_order m', 'r2.id=m.userid')
            ->where('t.refferaltype', 1)
            ->where('t.payout', 0)
            ->where('r2.isDelete', 0)
            ->where('r2.isUser', 2)
            ->where('r1.isUser', 2)
            ->order_by('t.rec_date asc')
            ->get();
        $statestics_res['planrefferalcustomerpayout'] = $query_planrefferalcst->num_rows();

        $query_ads = $this->db->select('id')
            ->where('rec_date', date('Y-m-d'))
            ->get('otpverification');
        $statestics_res['otpmessage'] = $query_ads->num_rows();

        return $statestics_res;
    }

    public function getnewsletterlist()
    {
        $query = $this->db->where('isDelete', 0)
            ->order_by('id asc')
            ->get('newsletter_subscribe')
            ->result();
        return $query;
    }

    public function changesubscription($statusid, $id)
    {
        if ($statusid == 1) {
            $data = array(
                'isActive' => 0,
                'rec_date' => date('Y-m-d H:i:s'),
            );
        } else {
            $data = array(
                'isActive' => 1,
                'rec_date' => date('Y-m-d H:i:s'),
            );
        }

        $sql_query = $this->db->where('id', $id)
            ->update('newsletter_subscribe', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deletesubscription($id)
    {
        $data = array(
            'isDelete' => 1,
        );
        $sql_query_reg = $this->db->where('id', $id)
            ->update('newsletter_subscribe', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function getpagedetails($pagename)
    {
        $query = $this->db->where('option_key', $pagename)
            ->get('site_options');
        return $query->row();
    }

    public function editpage($id, $data)
    {
        $sql_query = $this->db->where('id', $id)
            ->update('site_options', $data);
        return $sql_query;
    }

    public function getsmsdetails($id)
    {
        $query = $this->db->where('id', $id)
            ->get('site_options');
        return $query->row();
    }

    public function editsms($id, $data)
    {
        $sql_query = $this->db->where('id', $id)
            ->update('site_options', $data);
        return $sql_query;
    }

    public function getsitesettings()
    {
        $settings = [];

        $query1 = $this->db->where('option_key', 'welcome-status')
            ->get('site_options');
        $settings['welcomemodel'] = $query1->row();

        $query2 = $this->db->where('option_key', 'facebookpixel')
            ->get('site_options');
        $settings['fbpixelvalue'] = $query2->row();

        $query3 = $this->db->where('option_key', 'facebookdomain')
            ->get('site_options');
        $settings['fbdomainvalue'] = $query3->row();

        $query4 = $this->db->where('option_key', 'smssenderid')
            ->get('site_options');
        $settings['smssenderid'] = $query4->row();

        $query5 = $this->db->where('option_key', 'fbaccesstoken')
            ->get('site_options');
        $settings['fbaccesstoken'] = $query5->row();

        $query6 = $this->db->where('option_key', 'fbeventname')
            ->get('site_options');
        $settings['fbeventname'] = $query6->row();

        $query7 = $this->db->where('option_key', 'fbeventid')
            ->get('site_options');
        $settings['fbeventid'] = $query7->row();

        $query11 = $this->db->where('option_key', 'wpcampaignmain')
            ->get('site_options');
        $settings['wpcampaignmain'] = $query11->row();

        $query12 = $this->db->where('option_key', 'wpcampaignoffer')
            ->get('site_options');
        $settings['wpcampaignoffer'] = $query12->row();

        $query13 = $this->db->where('option_key', 'wpcampaignsuccess')
            ->get('site_options');
        $settings['wpcampaignsuccess'] = $query13->row();

        $query14 = $this->db->where('option_key', 'intekt_get_offer_name')
            ->get('site_options');
        $settings['intekt_get_offer_name'] = $query14->row();

        $query15 = $this->db->where('option_key', 'intekt_rm_offer_name')
            ->get('site_options');
        $settings['intekt_rm_offer_name'] = $query15->row();

        $query16 = $this->db->where('option_key', 'intkt_userwelcomename')
            ->get('site_options');
        $settings['intkt_userwelcomename'] = $query16->row();

        $query17 = $this->db->where('option_key', 'intkt_payment_success')
            ->get('site_options');
        $settings['intkt_payment_success'] = $query17->row();

        $query18 = $this->db->where('option_key', 'plansmssenderid')
            ->get('site_options');
        $settings['plansmssenderid'] = $query18->row();


        $query19 = $this->db->where('option_key', 'plan_facebookpixel')
            ->get('site_options');
        $settings['planfbpixelvalue'] = $query19->row();

        $query20 = $this->db->where('option_key', 'plan_fbaccesstoken')
            ->get('site_options');
        $settings['planfbaccesstoken'] = $query20->row();

        $query21 = $this->db->where('option_key', 'plan_fbeventname')
            ->get('site_options');
        $settings['planfbeventname'] = $query21->row();

        $query22 = $this->db->where('option_key', 'plan_fbeventid')
            ->get('site_options');
        $settings['planfbeventid'] = $query22->row();


        $query23 = $this->db->where('option_key', 'plan_wpcampaignmain')
            ->get('site_options');
        $settings['wpcampaignmainplan'] = $query23->row();

        $query24 = $this->db->where('option_key', 'plan_wpcampaignoffer')
            ->get('site_options');
        $settings['wpcampaignofferplan'] = $query24->row();

        $query25 = $this->db->where('option_key', 'plan_wpcampaignsuccess')
            ->get('site_options');
        $settings['wpcampaignsuccessplan'] = $query25->row();


        $query14 = $this->db->where('option_key', 'intekt_get_offer_name_plan')
            ->get('site_options');
        $settings['intekt_get_offer_name_plan'] = $query14->row();

        $query15 = $this->db->where('option_key', 'intekt_rm_offer_name_plan')
            ->get('site_options');
        $settings['intekt_rm_offer_name_plan'] = $query15->row();

        $query16 = $this->db->where('option_key', 'intkt_userwelcomename_plan')
            ->get('site_options');
        $settings['intkt_userwelcomename_plan'] = $query16->row();

        $query17 = $this->db->where('option_key', 'intkt_payment_success_plan')
            ->get('site_options');
        $settings['intkt_payment_success_plan'] = $query17->row();


        $query18 = $this->db->where('option_key', 'facebookpixel-webinar')
            ->get('site_options');
        $settings['fbpixelvaluewebinar'] = $query18->row();

        $query19 = $this->db->where('option_key', 'fbaccesstokenwebinar')
            ->get('site_options');
        $settings['fbaccesstokenwebinar'] = $query19->row();

        $query20 = $this->db->where('option_key', 'fbeventnamewebinar')
            ->get('site_options');
        $settings['fbeventnamewebinar'] = $query20->row();

        $query21 = $this->db->where('option_key', 'fbeventidwebinar')
            ->get('site_options');
        $settings['fbeventidwebinar'] = $query21->row();

        $query22 = $this->db->where('option_key', 'wpcampaignwebinar')
            ->get('site_options');
        $settings['wpcampaignwebinar'] = $query22->row();

        $query23 = $this->db->where('option_key', 'wpcampaignofferwebinar')
            ->get('site_options');
        $settings['wpcampaignofferwebinar'] = $query23->row();

        $query24 = $this->db->where('option_key', 'wpcampaignsuccesswebinar')
            ->get('site_options');
        $settings['wpcampaignsuccesswebinar'] = $query24->row();




        return $settings;
    }

    public function updatemodelstatus($value)
    {
        $option_value = ($value == 1) ? 0 : 1;

        $data = array(
            'rec_date' => date('Y-m-d H:i:s'),
            'option_value' => $option_value,
        );
        $sql_query = $this->db->where('option_key', 'welcome-status')
            ->update('site_options', $data);
        return $sql_query;
    }

    public function updatesiteonhold($value)
    {
        $option_value = ($value == 1) ? 0 : 1;

        $data = array(
            'rec_date' => date('Y-m-d H:i:s'),
            'option_value' => $option_value,
        );
        $sql_query = $this->db->where('option_key', 'site_on_hold')
            ->update('site_options', $data);
        return $sql_query;
    }

    public function updatesiteonsuspended($value)
    {
        $option_value = ($value == 1) ? 0 : 1;

        $data = array(
            'rec_date' => date('Y-m-d H:i:s'),
            'option_value' => $option_value,
        );
        $sql_query = $this->db->where('option_key', 'site_on_suspended')
            ->update('site_options', $data);
        return $sql_query;
    }

    public function updatefacebookdata($data, $key)
    {
        $sql_query = $this->db->where('option_key', $key)
            ->update('site_options', $data);
        return $sql_query;
    }

    public function updatesitesettingdata($data, $key)
    {
        $query = $this->db->where('option_key', $key)
            ->update('site_options', $data);
        $flag = ($this->db->affected_rows() != 1) ? false : true;
        return $flag;
    }

    public function searchcustomer($mobile)
    {
        $query = $this->db->where('isDelete', 0)
            ->like('mobile', $mobile)
            ->get('user_registration');
        return $query->row();
    }

    public function plan_searchcustomer($mobile)
    {
        $query = $this->db->where('isDelete', 0)
            ->like('mobile', $mobile)
            ->get('plan_user_registration');
        return $query->row();
    }

    public function searchcareer($mobile)
    {
        $query = $this->db->like('mobile', $mobile)
            ->get('career_enquiry');
        return $query->row();
    }

    public function searchbulksms($mobile)
    {
        $query = $this->db->like('mobileno', $mobile)
            ->get('bulksms');
        return $query->row();
    }

    public function getimpupdatelist()
    {
        $query = $this->db->where('isDelete', 0)
            ->order_by('id asc')
            ->get('important_update')
            ->result();
        return $query;
    }

    public function addimpupdate($data)
    {
        $this->db->insert('important_update', $data);
        $bankid = $this->db->insert_id();

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function impupdatestatus($statusid, $id)
    {
        if ($statusid == 1) {
            $data = array(
                'isActive' => 0,
            );
        } else {
            $data = array(
                'isActive' => 1,
            );
        }
        $sql_query = $this->db->where('id', $id)
            ->update('important_update', $data);
    }

    public function deleteimpupdate($id)
    {
        $data = array(
            'isDelete' => 1,
        );
        $sql_query = $this->db->where('id', $id)
            ->update('important_update', $data);
    }

    public function getaccountmsg()
    {
        $msgs = [];

        $query1 = $this->db->where('option_key', 'account-msg-customer')
            ->get('site_options');
        $msgs['customermsg'] = $query1->row();

        return $msgs;
    }

    public function editaccountmsg($id, $data)
    {
        $sql_query = $this->db->where('id', $id)
            ->update('site_options', $data);
        return $sql_query;
    }

    public function getinvoiceno()
    {
        $query = $this->db->select('option_value')
            ->where('option_key', 'newinvoiceno')
            ->get('site_options')
            ->row();
        return $query->option_value;
    }
    public function getstatuslist()
    {
        $query = $this->db->order_by('priorityno asc')
            ->get('loanstatus')
            ->result();
        return $query;
    }

    public function getfileremarkslist()
    {
        $query = $this->db->select('r.*, s.statusname')
            ->from('loanstatus_remarks r')
            ->join('loanstatus s', 's.id=r.statusid')
            ->order_by('r.id asc')
            ->get()
            ->result();
        return $query;
    }

    public function getremarkdetails($id)
    {
        $query = $this->db->where('id', $id)
            ->get('loanstatus_remarks')
            ->row();
        return $query;
    }

    public function addfileremark($data)
    {
        $this->db->insert('loanstatus_remarks', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function editfileremark($id, $data)
    {
        $query = $this->db->where('id', $id)
            ->update('loanstatus_remarks', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function deleteremark($id)
    {
        $data = array(
            'isDelete' => 1
        );
        $query = $this->db->where('id', $id)
            ->update('loanstatus_remarks', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function restoreremark($id)
    {
        $data = array(
            'isDelete' => 0
        );
        $query = $this->db->where('id', $id)
            ->update('loanstatus_remarks', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function getstaffmemberlist()
    {
        $query = $this->db->where('isDelete', 0)
            ->order_by('id desc')
            ->get('administration')
            ->result();
        return $query;
    }

    public function addstaffmember($data)
    {
        $this->db->insert('administration', $data);
        $id = $this->db->insert_id();
        return $id;
    }

    public function getStaffByEmail($email)
    {
        $this->db->where('emailid', $email);
        $this->db->where('isDelete', 0); // optional if using soft deletes
        $query = $this->db->get('administration'); // Replace 'staff' with your actual table name

        if ($query && $query->num_rows() > 0) {
            return $query->row();
        }

        return null;
    }
    public function deletestaffaccount($id)
    {
        $data = array(
            'isActive' => 0,
            'isDelete' => 1
        );
        $query_reg = $this->db->where('id', $id)
            ->update('administration', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }
}
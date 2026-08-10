<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Data_Test_And_Clean_Model extends CI_Model
{

	public function sync_invoice_data($start_date, $end_date, $product_code)
	{
		$table_map = [
			'subscription' => [
				'user_table' => 'user_registration',
				'order_table' => 'subscription_order',
				'inv_for'    => [6, 7]
			],
			'plan' => [
				'user_table' => 'plan_user_registration',
				'order_table' => 'plan_order',
				'inv_for'    => [4, 5]
			],
			'membership' => [
				'user_table' => 'user_registration',
				'order_table' => 'membership_order',
				'inv_for'    => [1, 2]
			],
			'default' => [
				'user_table' => 'user_registration',
				'order_table' => 'membership_order',
				'inv_for'    => [1, 2]
			]
		];

		if (!isset($table_map[$product_code])) {
			return ['error' => 'Invalid product code'];
		}

		$order_table = $table_map[$product_code]['order_table'];
		$user_table = $table_map[$product_code]['user_table'];
		$inv_for = $table_map[$product_code]['inv_for'];

		$this->db->select('
            u.fullname AS customer_name,
            u.email AS customer_email,
            u.mobile AS customer_mobile,
            u.id AS userid,
            u.city,
            u.state,
            so.card_number AS card_number,
            i.rec_date,
            i.inv_for,
            i.inv_prefix,
            i.inv_number,
            i.inv_date,
            i.inv_price,
            i.inv_cgst,
            i.inv_sgst,
            i.inv_igst,
            i.inv_grandtotal
        ');
		$this->db->from('invoice i');
		$this->db->join("$order_table so", 'so.userid = i.userid', 'left');
		$this->db->join("$user_table u", 'u.id = i.userid', 'left');
		$this->db->where('i.rec_date >=', $start_date . ' 00:00:00');
		$this->db->where('i.rec_date <=', $end_date . ' 23:59:59');
		$this->db->where_in('i.inv_for', $inv_for);
		$this->db->where('u.isDelete', 0);
		$this->db->where('u.isUser', 2);
		$this->db->where('i.isDelete', 0);
		$this->db->order_by('i.rec_date', 'DESC');

		$data = $this->db->get()->result_array();

		foreach ($data as &$row) {
			$row['company_code']     = COMPANY_CODE;
			$row['company_local_ip'] = LOCAL_IP;
			$row['product_code']     = $product_code;
		}

		return $data;
	}
	// Model - dataclean/kycdata
	public function kycdatadelete()
	{
		$dt_to = '2023-01-01';
		$dt_from = '2023-03-31';

		$query = $this->db->where('rec_date >=', $dt_to . ' 00:00:00')
			->where('rec_date <=', $dt_from . ' 23:59:59')
			->order_by('id asc')
			->get('user_documents')
			->result();

		if (count($query) > 0) {
			foreach ($query as $row) {
				echo $row->id;

				if ($row->profilephoto != "") {
					if (file_exists('assets/kycdocuments/' . $row->profilephoto)) {
						unlink('assets/kycdocuments/' . $row->profilephoto);
					}
					echo " - Yes - ";
				} else {
					echo " - No - ";
				}

				if ($row->aadharcard != "") {
					if (file_exists('assets/kycdocuments/' . $row->aadharcard)) {
						unlink('assets/kycdocuments/' . $row->aadharcard);
					}
					echo " - Yes - ";
				} else {
					echo " - No - ";
				}

				if ($row->pancard != "") {
					if (file_exists('assets/kycdocuments/' . $row->pancard)) {
						unlink('assets/kycdocuments/' . $row->pancard);
					}
					echo " - Yes - ";
				} else {
					echo " - No - ";
				}

				if ($row->cancelcheque != "") {
					if (file_exists('assets/kycdocuments/' . $row->cancelcheque)) {
						unlink('assets/kycdocuments/' . $row->cancelcheque);
					}
					echo " - Yes - ";
				} else {
					echo " - No - ";
				}

				if ($row->lightbill != "") {
					if (file_exists('assets/kycdocuments/' . $row->lightbill)) {
						unlink('assets/kycdocuments/' . $row->lightbill);
					}
					echo " - Yes - ";
				} else {
					echo " - No - ";
				}

				if ($row->bankstatement != "") {
					if (file_exists('assets/kycdocuments/' . $row->bankstatement)) {
						unlink('assets/kycdocuments/' . $row->bankstatement);
					}
					echo " - Yes - ";
				} else {
					echo " - No - ";
				}

				if ($row->formsixteen != "") {
					if (file_exists('assets/kycdocuments/' . $row->formsixteen)) {
						unlink('assets/kycdocuments/' . $row->formsixteen);
					}
					echo " - Yes - ";
				} else {
					echo " - No - ";
				}

				if ($row->salaryslip != "") {
					if (file_exists('assets/kycdocuments/' . $row->salaryslip)) {
						unlink('assets/kycdocuments/' . $row->salaryslip);
					}
					echo " - Yes - ";
				} else {
					echo " - No - ";
				}

				if ($row->businessproof != "") {
					if (file_exists('assets/kycdocuments/' . $row->businessproof)) {
						unlink('assets/kycdocuments/' . $row->businessproof);
					}
					echo " - Yes - ";
				} else {
					echo " - No - ";
				}

				/* if ($row->gstdoc != "") {
							 if(file_exists('assets/kycdocuments/' . $row->gstdoc)) {
								 unlink('assets/kycdocuments/' . $row->gstdoc);
							 }
							 echo " - Yes - ";
						 } else {
							 echo " - No - ";
						 } */

				if ($row->itreturn != "") {
					if (file_exists('assets/kycdocuments/' . $row->itreturn)) {
						unlink('assets/kycdocuments/' . $row->itreturn);
					}
					echo " - Yes - ";
				} else {
					echo " - No - ";
				}

				/* if ($row->auditreport != "") {
							 if(file_exists('assets/kycdocuments/' . $row->auditreport)) {
								 unlink('assets/kycdocuments/' . $row->auditreport);
							 }
							 echo " - Yes - ";
						 } else {
							 echo " - No - ";
						 } */

				echo "<br/>";
			}
		} else {
			echo "No data found.";
		}
	}

	// Model - dataclean/userprocessstep
	public function userprocessstepset()
	{
		$userlist = $this->db->select('a.id, a.rec_date, a.userid, a.status, r.process_step')
			->from('user_application a')
			->join('user_registration r', 'r.id=a.userid', 'LEFT')
			->where('r.isUser >=', 2)
			->where('a.rec_date >=', '2022-04-01 00:00:00')
			->where('a.rec_date <=', '2022-05-31 23:59:59')
			->order_by('a.id asc')
			->get()
			->result();

		foreach ($userlist as $row) {
			$processstep = 4;

			switch ($row->status) {
				case '1':
					$doclist = $this->db->select('id, rec_date, userid, isVerified')
						->where('userid', $row->userid)
						->get('user_documents')
						->row();

					if ($doclist) {
						if ($doclist->isVerified == 0) {
							$processstep = 4;
						} else {
							$processstep = 6;
						}
					} else {
						$processstep = 4;
					}
					break;

				case '2':
					$processstep = 11;
					break;

				case '3':
					$processstep = 10;
					break;

				case '4':
					$processstep = 8;
					break;

				case '5':
					$processstep = 9;
					break;

				default:
					$processstep = 4;
					break;
			}

			$data = array(
				'update_date' => date('Y-m-d H:i:s', strtotime($row->rec_date)),
				'process_step' => $processstep
			);

			$query = $this->db->where('id', $row->userid)
				->update('user_registration', $data);

			echo $row->id . " - " . $row->userid . " - " . $processstep . "<br/>";
		}
	}

	// Model - dataclean/update_user_reg_data
	//for user registration table > if fullname is null then set name from email address
	public function update_user_registration_data()
	{
		$sql = "UPDATE `user_registration` SET `fullname` = substring_index(email,'@',1) WHERE `fullname` = ''";
		$query = $this->db->query($sql);
		$affectedRows_user = $this->db->affected_rows();
		$str = '';
		if ($affectedRows_user) {
			$str = "User Registration table total (" . $affectedRows_user . ") records affected. <br/>";
		} else {
			$str = "User Registration table (0) records affected. ";
		}
		return $str;
	}

	// Model - dataclean/delete_duplicate_data
	// duplicate entry delete from memebership order and invoice table (do not change query order)
	public function delete_duplicate_user_data()
	{
		$str = '';
		$dt_to = '2019-12-01';
		$dt_from = '2020-01-25';

		$sql_membership = "DELETE m1 FROM membership_order m1 INNER JOIN membership_order m2 WHERE m1.id > m2.id AND m1.userid = m2.userid AND m1.registration_date >= '" . $dt_to . "' AND m1.registration_date <= '" . $dt_from . "'";
		$query_membership = $this->db->query($sql_membership);
		$affectedRows_mem = $this->db->affected_rows();

		if ($affectedRows_mem) {
			$str .= "Membership table total (" . $affectedRows_mem . ") records affected. <br/>";
		} else {
			$str .= "Membership table (0) records affected. <br/>";
		}

		$sql_invoice = "DELETE i1 FROM invoice i1 INNER JOIN invoice i2 WHERE i1.cardid > i2.cardid AND i1.userid = i2.userid AND i1.inv_date >= '" . $dt_to . "' AND i1.inv_date <= '" . $dt_from . "' AND (i1.inv_for = 1 OR i1.inv_for = 2)";
		$query_invoice = $this->db->query($sql_invoice);
		$affectedRows_inv = $this->db->affected_rows();

		if ($affectedRows_inv) {
			$str .= "Invoice table total (" . $affectedRows_inv . ") records affected. <br/>";
		} else {
			$str .= "Invoice table (0) records affected. <br/>";
		}

		return $str;
	}

	// Model - dataclean/ci_sessions_data
	public function delete_ci_sessions_data()
	{
		$timestamp = '1685768241';
		$sql_ci = "DELETE FROM ci_sessions WHERE timestamp <= '" . $timestamp . "' ";
		$query_ci_session = $this->db->query($sql_ci);
		$affectedRows_ci = $this->db->affected_rows();
		$str = '';
		if ($affectedRows_ci) {
			$str = "ci_session table total (" . $affectedRows_ci . ") records affected. <br/>";
		} else {
			$str = "ci_session table (0) records affected. <br/>";
		}

		return $str;
	}

	// Model - dataclean/sms_log_data
	public function delete_sms_log_data()
	{
		$dt_from = '2023-01-01 00:00:00'; // Y-m-d
		$dt_to = '2023-03-31 23:59:59'; // Y-m-d

		$sql_sms = "DELETE FROM sms_log WHERE rec_date >= '" . $dt_from . "' AND rec_date <= '" . $dt_to . "' ";
		$query_sms_log = $this->db->query($sql_sms);
		$affectedRows_sms_log = $this->db->affected_rows();
		$str = '';
		if ($affectedRows_sms_log) {
			$str = "sms_log table total (" . $affectedRows_sms_log . ") records affected. <br/>";
		} else {
			$str = "sms_log table (0) records affected. <br/>";
		}

		return $str;
	}
}
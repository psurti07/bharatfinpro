<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Manage_Product_Model extends CI_Model {

	public function getfilterproduct(){
		$prolist = $reslist = array();
		
		$query = $this->db->order_by('id asc')
				->get('products')
				->result();

		if(count($query) > 0) {
			foreach($query as $row) {
				$reslist['id'] = $row->id;
				$reslist['productname'] = $row->productname;
				$reslist['productslug'] = $row->productslug;

				if($row->inOffer == 1) {
					$reslist['productprice'] = $row->offeramount;
				}
				else {
					$reslist['productprice'] = $row->amount;
				}

				$prolist[] = $reslist;
			}
		}
		return $prolist;      
	}

	public function getproductdetails($slug = ''){
		$query = $this->db->select('id, amount, offeramount, inOffer')
				->where('productslug', $slug)
				->get('products');
		return $query->row();
	}

	public function getinvoiceno(){
		$query = $this->db->select('option_value')
				->where('option_key', 'newinvoiceno')
				->get('site_options')
				->row();
		return $query->option_value;      
	}

}


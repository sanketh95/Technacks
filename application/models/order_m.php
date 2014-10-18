<?php

/**
* 
*/
class Order_m extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function create_order($userid) {
		$this->db->set('user_id', $userid);
		$this->db->insert('orders');

		return  $this->db->insert_id();
	}


	function add_order_item($orderid, $foodid, $quantity) {
		$this->db->set('order_id', $orderid);
		$this->db->set('food_id', $foodid);
		$this->db->set('qty', $quantity);
		$this->db->insert('order_meta');
	}

	function update_order_status($orderid, $status,$comments=null) {
		$this->db->set('status', $status);
		$this->db->set('comments', $comments);
		$this->db->where('id', $orderid);
		$this->db->update('orders');
	}

	function get_order_info($orderid) {
		$this->db->select('orders');
		$this->db->join('order_meta', 'orders.id = order_meta.order_id');
		$this->db->join('menu', 'order_meta.food_id = menu.id');
		$this->db->where('orders.id', $orderid);
		return $this->db->get()->result_array();
	}



}

?>
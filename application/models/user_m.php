<?php

/**
* 
*/
class User_m extends CI_Model
{

	function __construct() {
		parent::__construct();
	}

	/*
		Register the user
	*/
	function register($username, $email, $password, $name, $type) {
		$this->db->set('email', $email);
		$this->db->set('password', $password);
		$this->db->set('username', $username);
		$this->db->set('name', $name);
		$this->db->set('type', $type);

		return $this->db->insert('users', $this);
	}

	/*
		Login the user and set session variables
	*/
	function login($username, $password) {
		$this->db->select('name');
		$this->db->select('type');
		$this->db->select('id');

		$this->db->where('username', $username);
		$this->db->where('password', $password);

		return $this->db->get('users')->result_array();
	}

	/*
	* Returns true if the username exists
	*/
	function user_exists($username) {
		$this->db->from('users');
		$this->db->where('username', $username);
		return (bool) $this->db->count_all_results();
	}

	function get_all_orders($userid, $status=null) {
		$this->db->from('orders');
		$this->db->join('order_meta', 'orders.id = order_meta.order_id');
		$this->db->join('menu', 'menu.id = order_meta.food_id');
		$this->db->where('user_id', $userid);
		if ($status != null) {
			$this->db->where('status', $status);
		}
		return$this->db->get()->result_array();
	}

}

?>
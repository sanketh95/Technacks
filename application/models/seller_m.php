<?php

/**
* 
*/
class seller_m extends CI_Model
{

	function __construct() {
		parent::__construct();
	}

	public function add_to_menu($name,$price,$type)
	{	
		$this->db->set('name', $name);
		$this->db->set('price', $price);
		$this->db->set('type', $type);

		return $this->db->insert('menu', $this);
	}

	public function update_menu($id,$name,$price,$type)
	{
		$this->db->set('name', $name);
		$this->db->set('price', $price);
		$this->db->set('type', $type);
		$this->db->where('id', $id);
		return $this->db->update();
	}

	public function delete_from_menu($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('menu'); 

	}
	
	public function menu($order='asc', $type=null )
	{
		$this->db->select('*');
		$this->db->order_by('price', $order);
		if (!is_null($type))
			$this->db->where('type', $type);
		return $this->db->get('menu')->result_array();
	}

	function get_all_orders($status=null) {
		$this->db->from('orders');
		$this->db->join('order_meta', 'orders.id = order_meta.order_id');
		$this->db->join('menu', 'menu.id = order_meta.food_id');
		if ($status != null) {
			$this->db->where('status', $status);
		}
		return $this->db->get()->result_array();
	}

	function add_due($orderid) {
		$this->db->set('order_id', $orderid);
		$this->db->insert('dues');
	}

	function clear_due($orderid) {
		$this->db->set('status', 'PAID');
		$this->db->where('order_id', $orderid);
		$this->db->update('dues');
	}

}

?>
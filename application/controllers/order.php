<?php

/**
* 
*/
class Order extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username') == null) {
			redirect('user/login');
		}
	}

	public function make_order() {
		if ($this->session->userdata('type') != 'USER') {
			redirect('user/login');
		}
		$userid = $this->session->userdata('id');
		$orderid = $this->input->post('order_id');
		$this->load->model('order_m');
		if ($orderid == null) {
			$orderid = $this->order_m->create_order($userid);
		}

		$foodid = $this->input->post('food_id');
		$qty  = $this->input->post('qty');

		$this->order_m->add_order_item($orderid, $foodid, $qty);
		redirect('home?orderid='.$orderid);
	}

	public function update_order_status() {
		if ($this->session->userdata('type') == 'USER') {
			redirect('user/login');
		}

		$orderid = $this->input->post('order_id');
		$status = $this->input->post('status');
		$comments = $this->input->post('comments');

		$this->load->model('order_m');
		$this->order_m->update_order_status($orderid, $status, $comments);
		redirect('seller/order');
	}

	public function end_order() {
		redirect('home');
	}
	

	
}

?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class seller extends CI_Controller {

	public function __construct() 
    {
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('seller/home');
	}

	public function add_to_menu()
	{
		$name=$this->input->post('name');
		$price=$this->input->post('price');		
		$type=$this->input->post('type');
		$this->load->model('seller_m');

		$this->seller_m->add_to_menu($name,$price,$type);

	}

	public function edit_menu()
	{
		$id=$this->input->post('id');
		$name=$this->input->post('name');
		$price=$this->input->post('price');
		$type=$this->input->post('type');
		$this->load->model('seller_m');

		$this->seller_m->add_to_menu($id,$name,$price,$type);
		redirect('home');

	}

	public function delete_from_menu()
	{
		$id=$this->input->post('id');
		$this->load->model('seller_m');

		$this->seller_m->delete_from_menu($id);
		redirect('home');
	}

	public function menu()
	{
		$this->load->model('seller_m');
		$this->seller_m->menu();
	}


	public function orders() {
		if ($this->session->userdata('username') == null ||
			$this->session->userdata('type') == 'USER') {
			redirect('user/login');
		}

		$this->load->model('seller_m');
		$status = $this->input->get('status');

		$orders = $this->seller_m->get_all_orders( $status);
		$temp = array();
		foreach ($orders as $order) {
			if (array_key_exists($order['order_id'], $temp)) {
				array_push($temp[$order['order_id']], $order);
			}
			else {
				$t = array();
				array_push($t, $order);
				$temp[$order['order_id']] = $t;
			}
		}
		$arr['orders'] = $temp;
		$this->load->view('seller/orders', $arr);
	}

	public function add_food_item() {
		$this->load->view('seller/add_food_item');
	}
}

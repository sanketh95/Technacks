<?php

/**
* 
*/
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username') == null) {
			redirect('user/login');
		}
	}

	public function index() {
		if ($this->session->userdata('type') == 'USER') {
			$this->load->model('seller_m');
			$menu = $this->seller_m->menu();
			$arr['menu'] = $menu;
			$this->load->view('user/home', $arr);
		}
		else if ($this->session->userdata('type') == 'CANTEEN_ADMIN') {
			$this->load->model('seller_m');
			$arr['menu'] = $this->seller_m->menu();
			$this->load->view('seller/home', $arr);
		}
	}
}

?>
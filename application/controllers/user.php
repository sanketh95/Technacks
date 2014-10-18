<?php

/**
* 
*/
class User extends CI_Controller
{
	
	// /*
	// * Register a new user
	// */
	// public function register_action() {
	// 	if ($this->session->userdata('username') != null) {
	// 		redirect('/home');
	// 	}
	// 	$email = $this->input->post('email');
	// 	$password = $this->input->post('password');
	// 	$name = $this->input->post('name');
	// 	$type = $this->input->post('type');
	// 	$username = $this->input->post('username');

	// 	$this->load->model('user_m');

	// 	// Check if user already exists
	// 	// If exists
	// 	if ($this->user_m->email_exists($email)) {
	// 		redirect('/user/register');
	// 	}
		
	// 	$result = $this->user_m->register($username, $email, $password, $name, $type);
	// 	if (!$result) {
	// 		//echo 'bro';
	// 		redirect('/user/login');
	// 	}
	// 	else {
	// 		if ($type == 'DOCTOR') {
	// 			$this->load->model('doctor_m');
	// 			$this->doctor_m->add($this->db->insert_id());
	// 		}

	// 		else if ($type == 'PATIENT') {
	// 			$this->load->model('patient_m');
	// 			$this->patient_m->add($this->db->insert_id());
	// 		}

	// 		else if ($type == 'LAB') {
	// 			$this->load->model('lab_m');
	// 			$this->lab_m->add($this->db->insert_id());
	// 		}
	// 	}
	// 	redirect('/user/login');
	// }

	/*
	* Logs the user in and sets up the user session
	*/
	public function login_action() {
		if ($this->session->userdata('username') != null) {
			redirect('/home');
		}
		$username = $this->input->post('username');
		$password = $this->input->post('password');	

		$this->load->model('user_m');
		$user_array = $this->user_m->login($username, $password);

		if (sizeof($user_array) == 1) {
			$this->session->set_userdata(array(
					'username' => $username,
					'id' => $user_array[0]['id'],
					'type' => $user_array[0]['type'],
					'name' => $user_array[0]['name']
				));
				redirect('/home');
		}
		else {
			redirect('/user/login');
		}
	}

	/*
	* prints true if username already exists
	* prints false otherwise
	*/
	public function user_exists() {
		$username = $this->input->post('username');
		$this->load->model('user_m');
		echo $this->user_m->user_exists($username);
	}

	/*
	* The Login Page
	*/
	public function login() {

		if ($this->session->userdata('username') != null) {
			redirect('home');
		}
		$this->load->view('login');
	}

	/*
	* The Registration page
	*/
	public function register() {
		if ($this->session->userdata('username') != null) {
			redirect('/home');
		}	
		$this->load->view('register');
	}

	/*
	* Logs out a logged in user
	*/
	public function logout_action() {
		$this->session->sess_destroy();
		redirect('/user/login');
	}

	public function orders() {
		if ($this->session->userdata('username') == null ||
			$this->session->userdata('type') != 'USER') {
			redirect('login');
		}

		$this->load->model('user_m');
		$status = $this->input->get('status');

		$orders = $this->user_m->get_all_orders($this->session->userdata('id'), $status);
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
		$this->load->view('user/orders', $arr);
	}
	/*
	* Doctor Exists
 	*/

}

?>
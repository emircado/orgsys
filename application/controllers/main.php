<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('user', 'requirement'));
	}

	public function index() { 
		//get current user data if any
		$session_data = $this->session->userdata('current_user');

		//if there is no logged in user
		if ($session_data == NULL) {
			$data['title'] = 'Home';
			$this->load->view('headandfoot/header', $data);
			$this->load->view('UserUI/login');
			$this->load->view('headandfoot/footer');
		//redirect to user home page
		} else {
			redirect($session_data['user_role'], 'refresh');
		}
	}

	public function login() {
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		$error_msg = NULL;

		if ($this->form_validation->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			//check db for username & password comination
			$result = $this->user->check_user($username, $password);

			if ($result != false) {
				$sess_array = array(
					'username' => $result->username,
					'user_role' => $result->role
				);

				$this->session->set_userdata('current_user', $sess_array);
			}
		}
		
		redirect('main', 'refresh');
	}

	public function logout() {
		$this->session->unset_userdata('current_user');
		$this->session->sess_destroy();
		redirect('main', 'refresh');
	}
}
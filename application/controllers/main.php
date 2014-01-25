<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('user', 'requirement'));
		$this->userlist = array('Unit Head', 'Associate Dean', 'Reviewer');
	}

	public function index() { 
		//get current user data if any
		$session_data = $this->session->userdata('current_user');

		//if there is no logged in user
		if ($session_data == NULL) {
			$this->login_page();
		
		//go to home page
		} else if (in_array($session_data['user_role'], $this->userlist)) {
			$data['title'] = 'Home';
			$data['curr_user'] = $session_data;

			$this->load->view('headandfoot/header', $data);
			$this->load->view('headandfoot/nav', $data);
			$this->load->view('MainUI/home', $data);
			$this->load->view('headandfoot/footer');
		} else {
			//error: role not found
		}
	}

	private function login_page() {
		$data['title'] = 'Home';
		$this->load->view('headandfoot/header', $data);
		$this->load->view('MainUI/login');
		$this->load->view('headandfoot/footer');
	}

	public function login() {
		$this->form_validation->set_rules('username', 'Username', 'trim|required|check_username');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|check_userpass');

		if ($this->form_validation->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			//check db for username & password comination
			$result = $this->user->check_user($username, $password);
	
			if ($result != false) {
				//SESSION DATA CONTAINS
				// - userid
				// - username
				// - role

				$this->session->set_userdata('current_user', $result);
			}
			redirect('main', 'refresh');
		
		} else {
			$this->login_page();
		}	
	}

	public function logout() {
		$this->session->unset_userdata('current_user');
		$this->session->sess_destroy();
		redirect('main', 'refresh');
	}
}

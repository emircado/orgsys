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
			$data['title'] = 'Home';
			$data['script'] = array('codejs/login.js');
			$this->load->view('headandfoot/header', $data);
			$this->load->view('MainUI/login2');
			$this->load->view('headandfoot/footer', $data);
		
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
		//if($this->session->userdata('oauth_token')==NULL OR $this->session->userdata('oauth_token')==NULL)
		//	redirect('dropboxAPI/request_dropbox');
	}

	public function login() {
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
			echo "good";
		} else {
			echo "bad";
		}
	}

	public function logout() {
		$this->session->unset_userdata('current_user');
		$this->session->sess_destroy();
		redirect('main', 'refresh');
	}

	public function org_login() {
		$key = $this->input->post('key');

		echo "bad";
	}
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('user', 'requirement', 'organization', 'document'));
		$this->userlist = array('Unit Head', 'Associate Dean', 'Reviewer');
	}

	public function index() { 
		//get current user data if any
		$session_data = $this->session->userdata('current_user');

		//if there is no logged in user
		if ($session_data == NULL) {

			$sesion_data = $this->session->userdata('current_org');
			if ($sesion_data == NULL) {
				$data['title'] = 'Home';
				$data['script'] = array('codejs/login.js');
				$this->load->view('headandfoot/header', $data);
				$this->load->view('MainUI/login2');
				$this->load->view('headandfoot/footer', $data);
			} else {
				$this->org_home();
			}
		
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
		// if($this->session->userdata('oauth_token')==NULL OR $this->session->userdata('oauth_token')==NULL)
		// 	redirect('dropboxAPI/request_dropbox');
	}

	private function org_home() {
		$data['title'] = 'View Organization Status';
		$data['curr_org'] = $this->session->userdata('current_org');
		$data['documents'] = $this->document->get_documents($data['curr_org']['orgid']);

		$this->load->view('headandfoot/header', $data);
		$this->load->view('headandfoot/nav', $data);
		$this->load->view('OrgMgrUI/org_viewstatus', $data);
		$this->load->view('headandfoot/footer');
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

	public function org_logout() {
		$this->session->unset_userdata('current_org');
		$this->session->sess_destroy();
		redirect('main', 'refresh');
	}

	public function student_orgs() {
		$data['title'] = 'Student Organizations'; 
		$this->load->view('headandfoot/header', $data);
		$this->load->view('StudentOrgUI');
		$this->load->view('headandfoot/footer');
	}

	public function org_login() {
		$viewkey = $this->input->post('key');

		//check db for username & password comination
		$result = $this->organization->check_viewkey($viewkey);
	
		// echo "bad";

		if ($result != false) {
			//SESSION DATA CONTAINS
			// - orgcode

			$this->session->set_userdata('current_org', $result);
			echo "good";
		} else {
			echo "bad";
		}

	}

}

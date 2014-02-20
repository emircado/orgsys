<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user');
	}

	public function index() {
		$this->view();
	}

	//create a user account
	public function create() {
		$data['curr_user'] = $this->session->userdata('current_user');

		if ($data['curr_user'] != NULL && 
			'Associate Dean' == $data['curr_user']['user_role']) {

			$data['title'] = 'Create User Account';
			$data['roles'] = $this->user->get_roles();
			$data['script'] = array('codejs/user_create.js');

			$this->load->view('headandfoot/header', $data);
			$this->load->view('headandfoot/nav', $data);
			$this->load->view('UserMgrUI/user_create', $data);
			$this->load->view('headandfoot/footer', $data);
		}
	}

	public function submit_user() {
		$session_data = $this->session->userdata('current_user');

		//check if there is logged in user
		if ($session_data == NULL) {
			redirect('main', 'refresh');

		} else {
			//SETUP USER DATA
			$userdata = array(
				'name' => $this->input->post('name'),
				'username' => $this->input->post('username'),
				'password' => 'password',
				'roleid' => $this->input->post('role'),
				'syid' => 1
			);

			if ($this->user->username_exists($userdata['username'])) {
				echo "bad";
			} else {
				$this->user->create_user($userdata);
				echo "good";	
			}
		}
	}

	public function myaccount() {
		$data['curr_user'] = $this->session->userdata('current_user');
		if ($data['curr_user'] != NULL) {

			$data['title'] = 'My Account';
			$data['userinfo'] = $this->user->user_details($data['curr_user']['userid']);

			$this->load->view('headandfoot/header', $data);
			$this->load->view('headandfoot/nav', $data);
			$this->load->view('UserMgrUI/user_view', $data);
			$this->load->view('headandfoot/footer');
		}
	}

	public function edit() {
		$data['curr_user'] = $this->session->userdata('current_user');

		if ($data['curr_user'] != NULL) {

			$data['title'] = 'Edit Profile';
			$data['userinfo'] = $this->user->user_details($data['curr_user']['userid']);
			$data['script'] = array('codejs/user_edit.js');

			$this->load->view('headandfoot/header', $data);
			$this->load->view('headandfoot/nav', $data);
			$this->load->view('UserMgrUI/user_edit', $data);
			$this->load->view('headandfoot/footer');
		}
	}
	
	public function change_profile() {
		$session_data = $this->session->userdata('current_user');
		//check if there is logged in user
		if ($session_data == NULL) {
			redirect('main', 'refresh');

		} else {
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email')
			);

			if ($this->input->post('pass') == 1) {
				//check if old password is correct
				if ($this->user->check_userpass($session_data['userid'], $this->input->post('oldpass'))) {
					$newpass = $this->input->post('newpass');

					if ($newpass == $this->input->post('retypepass')) {
						$data['password'] = $newpass;
						$this->user->update_user($session_data['userid'], $data);
						echo "good";

					} else {
						echo "bad2";
					}

				} else {
					echo "bad1";
				}

			} else {
				$this->user->update_user($session_data['userid'], $data);
				echo "good";
			}
		}
	}	
	
	//view all user accounts
	public function view() {
		$data['curr_user'] = $this->session->userdata('current_user');

		if ($data['curr_user'] != NULL && 
			'Associate Dean' == $data['curr_user']['user_role']) {

			$data['title'] = 'View User Accounts';
			$roles = $this->user->get_roles();
			$data['users'] = $this->user->get_users();
			$data['roles'] = array();
			foreach($roles as $r) {
				$data['roles'][$r->roleid] = $r->rolename;
			}

			$this->load->view('headandfoot/header', $data);
			$this->load->view('headandfoot/nav', $data);
			$this->load->view('UserMgrUI/user_viewall', $data);
			$this->load->view('headandfoot/footer');
		}
	}
}

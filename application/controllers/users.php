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

			$this->load->view('headandfoot/header', $data);
			$this->load->view('headandfoot/nav', $data);
			$this->load->view('UserMgrUI/user_create', $data);
			$this->load->view('headandfoot/footer');
		}
	}

	public function submit_user() {
		$session_data = $this->session->userdata('current_user');

		//check if there is logged in user
		if ($session_data == NULL) {
			redirect('main', 'refresh');

		} else {
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]');
			$this->form_validation->set_rules('role', 'Role', 'required');

			$this->form_validation->set_message('is_unique', 'Username is taken.');

			if ($this->form_validation->run()) {
				//SETUP USER DATA
				$userdata = array(
					'name' => $this->input->post('name'),
					'username' => $this->input->post('username'),
					'password' => 'password',
					'roleid' => $this->input->post('role')[0]
				);

				$this->user->create_user($userdata);

				redirect('main', 'refresh');

			} else {
				$this->create();
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
			$this->load->view('UserMgrUI/user_view', $data);
			$this->load->view('headandfoot/footer');
		}
	}
}

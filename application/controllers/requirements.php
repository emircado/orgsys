<?php

class Requirements extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('requirement', 'schoolyear'));
	}

	public function index() {
		$data['title'] = 'Requirements';
		$data['value'] = '';
		//get current school year and requirements
		$active_sy = $this->schoolyear->get_active_sy();
		$data['schoolyear'] = $active_sy;
		if ($active_sy != NULL) {
			$data['reqlist'] = $this->requirement->get_reqlist($active_sy->syid);
		}

		//get current user data
		$session_data = $this->session->userdata('current_user');
		if ($session_data != NULL) {
			$data['username'] = $session_data['username'];
			$data['user_role'] = $session_data['user_role'];
		}

		$this->load->view('headandfoot/header', $data);
		$this->load->view('ReqListUI', $data);
		$this->load->view('headandfoot/footer');
	}

	public function view(){
		$data['title'] = 'View Requirements List';
		$data['curr_user'] = $this->session->userdata('current_user');
		$active_sy = $this->schoolyear->get_active_sy();
		$data['schoolyear'] = $active_sy;
		if ($active_sy != NULL) {
			$data['reqlist'] = $this->requirement->get_reqlist($active_sy->syid);
		}
		$data['value'] = 'hello';
		//get current user data
		$session_data = $this->session->userdata('current_user');
		if ($session_data != NULL) {
			$data['username'] = $session_data['username'];
			$data['user_role'] = $session_data['user_role'];
		}

		$this->load->view('headandfoot/header', $data);
		$this->load->view('headandfoot/nav', $data);
		$this->load->view('req_viewall', $data);
		$this->load->view('headandfoot/footer');
	}
	
/*	public function create(){
		$data['curr_user'] = $this->session->userdata('current_user');

		if ($data['curr_user'] != NULL && 
			'Associate Dean' == $data['curr_user']['user_role']) {

			$data['title'] = 'Create Requirements List';

			$this->load->view('headandfoot/header', $data);
			$this->load->view('headandfoot/nav', $data);
			$this->load->view('UserMgrUI/req_create', $data);
			$this->load->view('headandfoot/footer');
		}
	}
	
	public function submit() {
		$session_data= $this->session->userdata('current_user');

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
*/
}
<?php

class Requirements extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('requirement');
	}

	public function index() {
		$data['title'] = 'Requirements';

		//get current school year and requirements
		$active_sy = $this->requirement->get_active_sy();
		$data['schoolyear'] = $active_sy;
		if (count($active_sy) > 0) {
			$data['reqlist'] = $this->requirement->get_reqlist($active_sy[0]->syid);
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
}
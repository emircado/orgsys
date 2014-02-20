<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SchoolYears extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('schoolyear');
	}

	public function index() {
		$this->view();
	}

	//create a user account
	public function create() {
		$data['curr_user'] = $this->session->userdata('current_user');

		if ($data['curr_user'] != NULL && 
			'Associate Dean' == $data['curr_user']['user_role']) {

			$data['title'] = 'Create School Year';
			$data['schoolyears'] = array(
				'2011' => '2011',
				'2012' => '2012',
				'2013' => '2013',
				'2014' => '2014',
				'2015' => '2015',
				'2016' => '2016'
				);

			$data['script'] = array('codejs/sy_create.js');

			$this->load->view('headandfoot/header', $data);
			$this->load->view('headandfoot/nav', $data);
			$this->load->view('SYMgrUI/sy_create');
			$this->load->view('headandfoot/footer', $data);
		}
	}

	private function view() {
		$data['curr_user'] = $this->session->userdata('current_user');

		if ($data['curr_user'] != NULL && 
			'Associate Dean' == $data['curr_user']['user_role']) {

			$data['title'] = 'View School Years';
			$data['schoolyears'] = $this->schoolyear->get_schoolyears();

			$this->load->view('headandfoot/header', $data);
			$this->load->view('headandfoot/nav', $data);
			$this->load->view('SYMgrUI/sy_view', $data);
			$this->load->view('headandfoot/footer');
		}
	}

}

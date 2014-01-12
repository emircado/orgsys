<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UnitHead extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('requirement'));
	}

	//directs to org manager page
	public function index() {
		$this->view('UnitHeadUI/unithead_orgmngr', 0);
	}

	public function create_org() {
		$this->view('UnitHeadUI/unithead_createorg', 1);
	}

	public function myaccount() {
		$this->view('UserUI/myaccount', 2);
	}

	private function view($page, $key) {
		//get current user data
		$session_data = $this->session->userdata('current_user');
		if ($session_data != NULL) {
			$data['username'] = $session_data['username'];
			$data['user_role'] = $session_data['user_role'];
		}

		//only unit heads can access the page
		if (isset($data['user_role']) && $data['user_role'] == 'Unit Head') {
			switch($key) {
				case 0:
					$data['title'] = 'Manage Organizations';
				break;
				case 1:
					$data['title'] = 'Create Org Account';
				break;
				case 2:
					$data['title'] = 'My Account';
				break;
			}

			$this->load->view('headandfoot/header', $data);
			$this->load->view('UnitHeadUI/unithead_nav', $data);
			$this->load->view($page, $data);
			$this->load->view('headandfoot/footer');
		//redirect to main page if forbidden
		} else {
			redirect('main', 'refresh');
		}
	}
}

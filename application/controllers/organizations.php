<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organizations extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('organization', 'schoolyear'));

	}

	public function index() {
		$this->view();
	}

	//create a user account
	public function create() {
		$data['curr_user'] = $this->session->userdata('current_user');

		if ($data['curr_user'] != NULL &&
			('Associate Dean' == $data['curr_user']['user_role']
				|| 'Unit Head' == $data['curr_user']['user_role'])) {

			$data['title'] = 'Create an Organizations';
			$data['schoolyear'] = $this->schoolyear->get_active_sy();
			$data['departments'] = $this->organization->get_unitheads($data['schoolyear']);
			$data['script'] = array('codejs/org_create.js');

			$this->load->view('headandfoot/header', $data);
			$this->load->view('headandfoot/nav', $data);
			$this->load->view('OrgMgrUI/org_create', $data);
			$this->load->view('headandfoot/footer');
		} else {
			redirect('main', 'refresh');
		}
	}

	private function view() {
		$data['curr_user'] = $this->session->userdata('current_user');

		if ($data['curr_user'] != NULL &&
			('Associate Dean' == $data['curr_user']['user_role']
				|| 'Unit Head' == $data['curr_user']['user_role'])) {

			$data['title'] = 'View Organizations';

			$unitheadid = NULL;
			if ('Unit Head' == $data['curr_user']['user_role']) {
				$unitheadid = $data['curr_user']['userid'];
			}

			$data['organizations'] = $this->organization->get_orglist($unitheadid);

			$this->load->view('headandfoot/header', $data);
			$this->load->view('headandfoot/nav', $data);
			$this->load->view('OrgMgrUI/org_viewall', $data);
			$this->load->view('headandfoot/footer');
		} else {
			redirect('main', 'refresh');
		}
	}

}

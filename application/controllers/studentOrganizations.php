<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class studentOrganizations extends CI_Controller {

	public function index() {
		$this->view();
	}

	public function view() {
		$data['title'] = 'Student Organizations'; 
		$this->load->view('headandfoot/header', $data);
		$this->load->view('StudentOrgUI');
		$this->load->view('headandfoot/footer');
	}
}

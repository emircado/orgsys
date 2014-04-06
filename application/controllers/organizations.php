<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organizations extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('organization', 'schoolyear','requirement'));
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
        $this->load->helper('url');
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
			$data['requirements'] = $this->requirement->get_reqlist($data['schoolyear']->syid);
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

	public function org_status($orgname,$orgstatus){
		$data['curr_user'] = $this->session->userdata('current_user');
		#idagdag mo yung database ng requirements kung saan approved na si urldecode($orgname) tapos pass mo sa view sa OrgMgrUI/org_status
		if ($data['curr_user'] != NULL &&
			('Associate Dean' == $data['curr_user']['user_role']
				|| 'Unit Head' == $data['curr_user']['user_role'])) {

			$data['title'] = 'Modify Organization Status';
			$ostat = 'Not Recognized';
			$unitheadid = NULL;
			if ('Unit Head' == $data['curr_user']['user_role']) {
				$unitheadid = $data['curr_user']['userid'];
			}
			if($orgstatus == 0)
				$ostat = 'Recognized';
			$data['schoolyear'] = $this->schoolyear->get_active_sy();
			$data['requirements'] = $this->requirement->get_reqlist($data['schoolyear']->syid);
			$this->load->view('headandfoot/header', $data);
			$this->load->view('headandfoot/nav', $data);
			$this->load->view('OrgMgrUI/org_status', array($data['requirements'],'name' => urldecode($orgname),'status' => $ostat));
			$this->load->view('headandfoot/footer');
		} else {
			redirect('main', 'refresh');
		}
	}
	
	public function submit_org() {
		$session_data = $this->session->userdata('current_user');
		//check if there is logged in user
		if(!is_dir('uploads/'.$this->input->post('name'))){
			mkdir('uploads/'.$this->input->post('name'));
			$data['schoolyear'] = $this->schoolyear->get_active_sy();
			$data['requirements'] = $this->requirement->get_reqlist($data['schoolyear']->syid);
			/*uncomment this kasi wala lang akong net eh :(
			$params['key'] = $this->config->item('dropbox_key');
			$params['secret'] = $this->config->item('dropbox_secret');
			$params['access'] = array('oauth_token'=>urlencode($this->session->userdata('oauth_token')),
									  'oauth_token_secret'=>urlencode($this->session->userdata('oauth_token_secret')));
			$this->load->library('dropbox', $params);
			$dbpath = '/OrgSys/'.$this->input->post('name');
			$root='dropbox';
			if(!$this->dropbox->create_folder($dbpath, $root))
			*/
			foreach($data['requirements'] as $r){
				mkdir(('uploads/'.$this->input->post('name')).'/'.$r->reqname);
				/*uncomment this
				$dbpath = '/OrgSys/'.$this->input->post('name').'/'$r->reqname.;
				$root='dropbox';
				if(!$this->dropbox->create_folder($dbpath, $root))
				*/
			}
		}
		if ($session_data == NULL) {
			redirect('main', 'refresh');
		} else {
			//SETUP USER DATA
			$orgdata = array(
				'name' => $this->input->post('name'),
				'code' => $this->input->post('code'),
				'userid' => $this->input->post('userid'),
				'viewkey' => $this->input->post('code'),
				'syid' => 1
			);
			$this->organization->create_org($orgdata);
			
			/*if ($this->user->username_exists($userdata['username'])) {
				echo "bad";
			} else {
				$this->user->create_user($userdata);
				echo "good";	
			}*/
			echo "good";
		}
	}
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organizations extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('organization', 'schoolyear','requirement', 'document'));
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
			// $data['script'] = array('codejs/org_create.js');

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

	public function upload_docs($orgcode) {
		$data['curr_user'] = $this->session->userdata('current_user');
		
		if ($data['curr_user'] != NULL && 
			'Associate Dean' == $data['curr_user']['user_role'] ||
			'Unit Head' == $data['curr_user']['user_role']) {
			
			// $data['title'] = 'Upload Requirements - '.urldecode($orgname);
			$data['title'] = 'Upload Documents - '.$orgcode;
			$data['schoolyear'] = $this->schoolyear->get_active_sy();
			$data['requirements'] = $this->requirement->get_reqlist($data['schoolyear']->syid);
			$this->load->view('headandfoot/header', $data);
			$this->load->view('headandfoot/nav', $data);
			// $this->load->view('ReqMgrUI/req_upload_form', array('error' => ' ','orgname' => urldecode($orgname)),$data['requirements']);
			$this->load->view('headandfoot/footer');

		} else {
			redirect('main', 'refresh');
		}
	}

	public function evaluate($orgcode) {
		$data['curr_user'] = $this->session->userdata('current_user');

		#idagdag mo yung database ng requirements kung saan approved na si urldecode($orgname) tapos pass mo sa view sa OrgMgrUI/org_status
		if ($data['curr_user'] != NULL &&
			('Associate Dean' == $data['curr_user']['user_role'] ||
				'Reviewer' == $data['curr_user']['user_role'])) {

			$data['title'] = 'Evaluate Organization Status';
			$data['org'] = $this->organization->get_org($orgcode);
			$data['documents'] = $this->document->get_documents($data['org']->orgid);

			$this->load->view('headandfoot/header', $data);
			$this->load->view('headandfoot/nav', $data);
			$this->load->view('OrgMgrUI/org_eval', $data);
			// $this->load->view('OrgMgrUI/org_status', array($data['requirements'],'name' => urldecode($orgname),'status' => $ostat));
			$this->load->view('headandfoot/footer');

			// $ostat = 'Not Recognized';
			// $unitheadid = NULL;
			// if ('Unit Head' == $data['curr_user']['user_role']) {
			// 	$unitheadid = $data['curr_user']['userid'];
			// }
			// if($orgstatus == 0)
			// 	$ostat = 'Recognized';
			// $data['schoolyear'] = $this->schoolyear->get_active_sy();
			// $data['requirements'] = $this->requirement->get_reqlist($data['schoolyear']->syid);
			// $this->load->view('headandfoot/header', $data);
			// $this->load->view('headandfoot/nav', $data);
			// $this->load->view('OrgMgrUI/org_status', array($data['requirements'],'name' => urldecode($orgname),'status' => $ostat));
			// $this->load->view('headandfoot/footer');
		} else {
			redirect('main', 'refresh');
		}
	}

	public function update_recog($orgcode, $status) {
		$this->organization->update_status($orgcode, $status);

		redirect('organizations/evaluate/'.$orgcode, 'refresh');
	}

	public function update_document($orgcode, $reqid, $status) {
		$this->document->toggle_status($this->organization->get_orgid($orgcode), $reqid, $status);

		redirect('organizations/evaluate/'.$orgcode, 'refresh');
	}

	// public function org_status($orgname,$orgstatus){
	// 	$data['curr_user'] = $this->session->userdata('current_user');
	// 	#idagdag mo yung database ng requirements kung saan approved na si urldecode($orgname) tapos pass mo sa view sa OrgMgrUI/org_status
	// 	if ($data['curr_user'] != NULL &&
	// 		('Associate Dean' == $data['curr_user']['user_role']
	// 			|| 'Unit Head' == $data['curr_user']['user_role'])) {

	// 		$data['title'] = 'Modify Organization Status';
	// 		$ostat = 'Not Recognized';
	// 		$unitheadid = NULL;
	// 		if ('Unit Head' == $data['curr_user']['user_role']) {
	// 			$unitheadid = $data['curr_user']['userid'];
	// 		}
	// 		if($orgstatus == 0)
	// 			$ostat = 'Recognized';
	// 		$data['schoolyear'] = $this->schoolyear->get_active_sy();
	// 		$data['requirements'] = $this->requirement->get_reqlist($data['schoolyear']->syid);
	// 		$this->load->view('headandfoot/header', $data);
	// 		$this->load->view('headandfoot/nav', $data);
	// 		$this->load->view('OrgMgrUI/org_status', array($data['requirements'],'name' => urldecode($orgname),'status' => $ostat));
	// 		$this->load->view('headandfoot/footer');
	// 	} else {
	// 		redirect('main', 'refresh');
	// 	}
	// }
	
	public function submit_org() {
		$session_data = $this->session->userdata('current_user');
		if ($session_data == NULL) {
			redirect('main', 'refresh');
		} else {
			//SETUP ORG DATA
			$orgdata = array(
				'name' => $this->input->post('name'),
				'code' => $this->input->post('code'),
				'userid' => $this->input->post('role'),
				'viewkey' => $this->input->post('code'),
				'syid' => 1
			);
			$this->organization->create_org($orgdata);
			
			$docdata = array(
				'orgid' => $this->organization->get_orgid($orgdata['code']),
				'userid' => $session_data['userid'],
				'syid' => 1,
				'status' => 0
			);

			$reqdata = $this->requirement->get_reqlist($this->schoolyear->get_active_sy()->syid);
			$this->document->init_documents($docdata, $reqdata);

			redirect('organizations', 'refresh');
			// echo "good";
		}

		//check if there is logged in user
		// if(!is_dir('uploads/'.$this->input->post('name'))){
		// 	mkdir('uploads/'.$this->input->post('name'));
		// 	$data['schoolyear'] = $this->schoolyear->get_active_sy();
		// 	$data['requirements'] = $this->requirement->get_reqlist($data['schoolyear']->syid);

			#to uncomment when no internet
			// $params['key'] = $this->config->item('dropbox_key');
			// $params['secret'] = $this->config->item('dropbox_secret');
			// $params['access'] = array('oauth_token'=>urlencode($this->session->userdata('oauth_token')),
			// 						  'oauth_token_secret'=>urlencode($this->session->userdata('oauth_token_secret')));
			// $this->load->library('dropbox', $params);
			// $dbpath = '/OrgSys/'.$this->input->post('name');
			// $root='dropbox';
			// if(!$this->dropbox->create_folder($dbpath, $root))

			// foreach($data['requirements'] as $r){
			// 	mkdir(('uploads/'.$this->input->post('name')).'/'.$r->reqname);
				
				#to uncomment when no internet
				// $dbpath = '/OrgSys/'.$this->input->post('name').'/'.$r->reqname;
				// $root='dropbox';
				// if(!$this->dropbox->create_folder($dbpath, $root)){}
				
		// 	}
		// }
	}
}

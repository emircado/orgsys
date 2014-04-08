<?php

class Requirements extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model(array('requirement', 'schoolyear','organization'));
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
        $this->load->helper('url');
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
		$this->load->view('ReqMgrUI/ReqListUI', $data);
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
		$this->load->view('ReqMgrUI/req_viewall', $data);
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

	public function createReq() { 
		$data['curr_user'] = $this->session->userdata('current_user');

		if ($data['curr_user'] != NULL && 
			'Associate Dean' == $data['curr_user']['user_role']) {
			
			$active_sy = $this->schoolyear->get_active_sy();
			$data['schoolyear'] = $active_sy;
			$data['script'] = array('codejs/button.js');
			if (count($active_sy) > 0) {
				$data['reqlist'] = $this->requirement->get_reqlist($active_sy->syid);
			}

			$data['value'] = 'hello';
			$session_data = $this->session->userdata('current_user');
			$data['title'] = 'Create Requirements List';

			$this->load->view('headandfoot/header', $data);
			$this->load->view('headandfoot/nav', $data);
			$this->load->view('ReqMgrUI/req_create', $data);
			$this->load->view('headandfoot/footer');
		} 
	} 

	public function submit_req() { 
		$session_data= $this->session->userdata('current_user');

		//check if there is logged in user
		if ($session_data == NULL) { 
			redirect('main', 'refresh');

		} else {
			//$this->form_validation->set_rules('req[]', 'Requirements', 'trim|required'); 
			//$this->form_validation->set_rules('desc[]', 'Description', 'trim|required');

			//if ($this->form_validation->run()) {
			//SETUP USER DATA 
			$data['req'] = array(); 
			$data['desc'] = array(); 
			
			$i=0;
			if($this->input->post('req')!=NULL){
				foreach ($this->input->post('req') as $item){
					$data['req'][$i] = $item; 
					$i++;
				}
			}

			$i=0;
			$this->requirement->delete_reqlist();
			if($this->input->post('desc')!=NULL){
				foreach ($this->input->post('desc') as $item) {
					if($data['req'][$i]) {
						$reqdata = array( 
							'name' => $data['req'][$i],
							'description' => str_replace("\n", "||", $item),
							'userid' => $session_data['userid'],
							'syid' => $this->schoolyear->get_active_sy()->syid
						);
						$this->requirement->add_reqlist($reqdata);
					}
					$i++;
				} 
			}
			echo '<pre>'.print_r($this->input->post(),TRUE).'</pre>';
			//} 
			//$this->load->view('UserMgrUI/trial', $userdata);
			//$this->requirement->delete_reqlist();
			redirect('requirements/view', 'refresh'); 
		} 
	}
	
	public function select_org(){
		$data['curr_user'] = $this->session->userdata('current_user');
		$data['title'] = 'Upload Requirements';
		$unitheadid = NULL;
		
		if ($data['curr_user'] != NULL && 
			'Associate Dean' == $data['curr_user']['user_role']){
		}
		if ('Unit Head' == $data['curr_user']['user_role']) {
				$unitheadid = $data['curr_user']['userid'];
		}
		
		$data['organizations'] = $this->organization->get_orglist($unitheadid);
		
		$this->load->view('headandfoot/header', $data);
		$this->load->view('headandfoot/nav', $data);
		$this->load->view('ReqMgrUI/req_slctorg', array('error' => ' ' ));
		$this->load->view('headandfoot/footer');
	}
	
	public function upload_req($orgname){
		$data['curr_user'] = $this->session->userdata('current_user');
		$data['title'] = 'Upload Requirements - '.urldecode($orgname);
		
		if ($data['curr_user'] != NULL && 
			'Associate Dean' == $data['curr_user']['user_role']){
		}
		$data['schoolyear'] = $this->schoolyear->get_active_sy();
		$data['requirements'] = $this->requirement->get_reqlist($data['schoolyear']->syid);
		$this->load->view('headandfoot/header', $data);
		$this->load->view('headandfoot/nav', $data);
		$this->load->view('ReqMgrUI/req_upload_form', array('error' => ' ','orgname' => urldecode($orgname)),$data['requirements']);
		$this->load->view('headandfoot/footer');
	}
	
	public function do_upload($orgname)
	{
		$data['curr_user'] = $this->session->userdata('current_user');
		if ($data['curr_user'] != NULL && 
			'Associate Dean' == $data['curr_user']['user_role']){
			$data['title'] = 'Upload Requirements';
		}
		$data['title'] = 'Upload Requirements';
		$ok = 1;
		$config['allowed_types'] = 'gif|jpg|png|pdf';
		$config['overwrite'] = TRUE;
		$uploads = 0;
		$data['schoolyear'] = $this->schoolyear->get_active_sy();
		$data['requirements'] = $this->requirement->get_reqlist($data['schoolyear']->syid);
		foreach($_FILES as $field => $file)
        {
            // No problems with the file
            if($file['error'] == 0&&$file['name']!=NULL)
            {
                // So lets upload
				$config['upload_path'] = './uploads/'.urldecode($orgname).'/'.$data['requirements'][$uploads]->reqname.'/';
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
                if ($this->upload->do_upload($field))
                {
                    //comment when no internet
					// $data = $this->upload->data();
					// $data['curr_user'] = $this->session->userdata('current_user');
					// $data = array('upload_data' => $this->upload->data());
					// $params['key'] = $this->config->item('dropbox_key');
					// $params['secret'] = $this->config->item('dropbox_secret');
					// $params['access'] = array('oauth_token'=>urlencode($this->session->userdata('oauth_token')),
					// 						  'oauth_token_secret'=>urlencode($this->session->userdata('oauth_token_secret')));
					
					// $this->load->library('dropbox', $params);
					// $dbpath = '/OrgSys/'.urldecode($orgname).'/'.$data['requirements'][$uploads]->reqname.'/';
					// $filepath = $data['upload_data']['full_path'];
					// $params = array();
					// $root='dropbox';
					// $data['curr_user'] = $this->session->userdata('current_user');
					// if(!$this->dropbox->add($dbpath, $filepath,$params, $root)){
					// 	$data['curr_user'] = $this->session->userdata('current_user');
					// 	$data['title'] = 'Upload Requirements';
					// 	$error = array('error' => 'Authentication Failed');
					// 	$this->load->view('headandfoot/header', $data);
					// 	$this->load->view('headandfoot/nav', $data);
					// 	$this->load->view('ReqMgrUI/req_upload_form', $error);
					// 	$this->load->view('headandfoot/footer');
					// }
					//till here
                }
                else
                {
                    $errors = $this->upload->display_errors();
					$ok = 0;
                }
            }
			$uploads = $uploads + 1;
        }
		if($ok==0){
			$data['curr_user'] = $this->session->userdata('current_user');
			$data['title'] = 'Upload Requirements';
			$this->load->view('headandfoot/header', $data);
			$this->load->view('headandfoot/nav', $data);
			$this->load->view('ReqMgrUI/req_upload_form', $data);
			$this->load->view('headandfoot/footer');
		}
		else{
			$data['curr_user'] = $this->session->userdata('current_user');
			$data['title'] = 'Upload Requirements';
			$this->load->view('headandfoot/header', $data);
			$this->load->view('headandfoot/nav', $data);
			$this->load->view('ReqMgrUI/req_upload_success');
			$this->load->view('headandfoot/footer');
		}
	}
	
	public function update_reqstatus(){
		#gawa ka nalang ng database para sa requirements kung saan yung fields ay name ng org tapos yung iba pa ay for req 1 etc... assume natin na di na magagalaw yung req para di muna kelangan gawin tong dynamic
		#after nun kapag klinick nila yung approve edi dapat ok na sila sa requirement na yun. Gawin mo lang yung parang sa 191. Sorry medyo inaantok na rin ako
		#maaga pa ako mamaya :( sorry talaga huhuhu. Anchor yung ginagamit ko sa pagpass ng variable from view to controller mas madali. Search mo nalang.
		#ang irereturn nito na view ay 'OrgMgrUI/org_status'. Gayahin mo yung sa organizations/org_status
	}
}
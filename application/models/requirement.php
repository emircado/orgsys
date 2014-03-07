<?php
class Requirement extends CI_Model{

	function __construct(){
		//call parent
		parent::__construct();
		$this->load->database();
	}

	/*************************** Get Functions **************************/
	public function get_reqlist($syid) {
		$query = $this->db->query(
			"SELECT R.name as reqname,
				R.description as description,
				U.name as createdby
			FROM `requirement` R JOIN `user` U ON (R.userid = U.userid)
			WHERE R.syid = $syid"
		);

		return $query->result();
	}	
}

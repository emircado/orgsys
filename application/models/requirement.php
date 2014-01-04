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
			FROM `Requirement` R JOIN `User` U ON (R.userid = U.userid)
			WHERE R.syid = $syid"
		);

		return $query->result();
	}

	public function get_active_sy() {
		$query = $this->db->query(
			"SELECT S.syid as syid,
				S.name as schoolyear
			FROM `SchoolYear` S
			WHERE S.status = 1
			ORDER BY S.name DESC
			LIMIT 1"
		);

		return $query->result();
	}
}

<?php
class SchoolYear extends CI_Model{

	function __construct(){
		//call parent
		parent::__construct();
		$this->load->database();
	}

	/*************************** Get Functions **************************/
	public function get_schoolyears() {
		$query = $this->db->query(
			"SELECT *
			FROM `schoolyear`"
		);

		return $query->result();
	}

	public function get_active_sy() {
		$query = $this->db->query(
			"SELECT S.syid as syid,
				S.name as schoolyear
			FROM `schoolyear` S
			WHERE S.status = 1
			ORDER BY S.name DESC"
		);

		return $query->row();
	}
}
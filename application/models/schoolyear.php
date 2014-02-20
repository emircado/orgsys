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
}
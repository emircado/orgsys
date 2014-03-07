<?php
class Organization extends CI_Model{

	function __construct(){
		//call parent
		parent::__construct();
		$this->load->database();
	}

	/*************************** Get Functions **************************/
	public function get_orglist($unitheadid = NULL) {
		if ($unitheadid == NULL) {
			$query = $this->db->query(
				"SELECT *
				FROM `organization`"
			);
		} else {
			$query = $this->db->query(
				"SELECT *
				FROM `organization` O
				WHERE O.userid = $unitheadid"
			);
		}

		return $query->result();
	}

	public function get_unitheads($active_sy) {
		$query = $this->db->query(
			"SELECT U.userid as unithead,
				D.name as deptname
			FROM (`user` U JOIN `department` D ON (U.userid = D.userid))
				JOIN `schoolyear` S ON (U.syid = S.syid)
			WHERE S.name = '$active_sy->schoolyear'"
		);

		return $query->result();
	}
}
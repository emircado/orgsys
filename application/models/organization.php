<?php
class Organization extends CI_Model{

	function __construct(){
		//call parent
		parent::__construct();
		$this->load->database();
	}

	/*************************** Get Functions **************************/
	public function get_orglist($unitheadid = NULL) {
		if ($unitheadid != NULL) {
			$this->db->where('userid', $unitheadid);
		}
		$query = $this->db->get('organization');

		return $query->result();
	}

	public function get_unitheads($active_sy) {
		$this->db->select(array(
			'user.userid as unithead',
			'department.name as deptname'
		));
		$this->db->from('user');
		$this->db->join('department', 'user.userid = department.userid');
		$this->db->join('schoolyear', 'user.syid = schoolyear.syid');
		$this->db->where('schoolyear.name', $active_sy->schoolyear);

		$query = $this->db->get();

		// $sql =
		// 	"SELECT U.userid as unithead,
		// 		D.name as deptname
		// 	FROM (`user` U JOIN `department` D ON (U.userid = D.userid))
		// 		JOIN `schoolyear` S ON (U.syid = S.syid)
		// 	WHERE S.name = ?";

		// $query = $this->db->query($sql, array($active_sy->schoolyear));
		
		return $query->result();
	}
}
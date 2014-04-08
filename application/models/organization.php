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

	public function check_viewkey($viewkey) {
		$sql =
			"SELECT O.orgid as orgid,
				O.name as orgname,
				O.code as orgcode,
				O.status as status,
				D.name as dname
			FROM `organization` O JOIN `department` D ON (O.userid = D.userid)
			WHERE O.viewkey = ?
			LIMIT 1";

		$query = $this->db->query($sql, array($viewkey));

		if (count($query->result()) != 1) {
			return false;
		} else {
			return $query->row_array();
		}
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
	
	public function create_org($orgdata) {
		$this->db->insert('organization', $orgdata);
	}

	public function get_org($orgcode) {
		$sql = "SELECT O.orgid as orgid,
				O.name as orgname,
				O.code as orgcode,
				O.status as status,
				O.userid as userid,
				O.syid as syid
			FROM `organization` O
			WHERE O.code = ?";

		$query = $this->db->query($sql, array($orgcode));

		return $query->row();
	}

	public function get_orgid($orgcode) {
		$sql = "SELECT O.orgid as orgid
			FROM `organization` O
			WHERE O.code = ?";

		$query = $this->db->query($sql, array($orgcode));

		return $query->row()->orgid;
	}

	public function update_status($orgcode, $status) {
		if ($status == 1) {
			$s = 0;	
		} else {
			$s = 1;
		}

		$data = array('status' => $s);

		$this->db->where(array('code' =>$orgcode));
		$this->db->update('organization', $data);
	}
}
<?php
class Document extends CI_Model{

	function __construct(){
		//call parent
		parent::__construct();
		$this->load->database();
	}

	/*************************** Get Functions **************************/
	public function init_documents($docdata, $reqdata) {
		foreach ($reqdata as $r) {
			$data = array(
				'orgid' => $docdata['orgid'],
				'reqid' => $r->reqid,
				'userid' => $docdata['userid'],
				'syid' => $docdata['syid']
			);

			$query = $this->db->insert('document', $data);
		}
	}

	public function get_documents($orgid) {
		$sql =
			"SELECT R.reqid as reqid, 
				R.name as reqname,
				D.status as status,
				D.link as link,
				D.date as sub_date
			FROM `document` D JOIN `requirement` R ON (D.reqid = R.reqid)
			WHERE D.orgid = ?";

		$query = $this->db->query($sql, array($orgid));


		return $query->result();
	}

	public function toggle_status($orgid, $reqid, $status) {
		if ($status == 1) {
			$s = 0;	
		} else {
			$s = 1;
		}

		$data = array('status' => $s);

		$this->db->where(array('orgid' => $orgid, 'reqid' => $reqid));
		// $this->db->where(array('reqid', $reqid));
		$this->db->update('document', $data);
	}
}
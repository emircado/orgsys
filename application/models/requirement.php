<?php
class Requirement extends CI_Model{

	function __construct(){
		//call parent
		parent::__construct();
		$this->load->database();
	}

	/*************************** Get Functions **************************/
	public function get_reqlist($syid) {
		$this->db->select(array(
				'requirement.reqid as reqid',
				'requirement.name as reqname',
				'requirement.description',
				'user.name as createdby'
			)
		);
		$this->db->from('requirement');
		$this->db->join('user', 'requirement.userid = user.userid');
		$this->db->where('requirement.syid', $syid);

		$query = $this->db->get();

		// $sql = 
		// 	"SELECT R.name as reqname,
		// 		R.description as description,
		// 		U.name as createdby
		// 	FROM `requirement` R JOIN `user` U ON (R.userid = U.userid)
		// 	WHERE R.syid = ?";

		// $query = $this->db->query($sql, array($syid));

		return $query->result();
	}	

	public function delete_reqlist() {
		$query = $this->db->query( "DELETE FROM requirement" );
	}

	public function add_reqlist($reqdata) {
		$this->db->insert('requirement', $reqdata);
	//foreach ($userdata as $u){ 
		//$query = $this->db->query( 
		//"INSERT INTO `requirement`(`name`,) VALUES ($u)" 
		//); $query = $this->db->insert('requirement', $userdata); //} 
	}
}

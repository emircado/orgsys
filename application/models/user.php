<?php
class User extends CI_Model{

	function __construct(){
		//call parent
		parent::__construct();
		$this->load->database();
	}

	/*************************** Get Functions **************************/
	public function check_user($username, $password) {
		$query = $this->db->query(
			"SELECT U.userid as userid,
				U.username as username,
				R.name as role
			FROM `User` U JOIN `Role` R ON (U.roleid = R.roleid)
			WHERE U.username = '$username'
				AND U.password = '$password'
			LIMIT 1"
		);

		if (count($query->result()) != 1) {
			return false;
		} else {
			return $query->result()[0];
		}
	}
}

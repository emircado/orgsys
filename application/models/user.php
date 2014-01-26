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
				R.name as user_role
			FROM `User` U JOIN `Role` R ON (U.roleid = R.roleid)
			WHERE U.username = '$username'
				AND U.password = '$password'
			LIMIT 1"
		);

		if (count($query->result()) != 1) {
			return false;
		} else {
			return $query->row_array();
		}
	}

	public function get_roles() {
		$query = $this->db->query(
			"SELECT R.roleid as roleid,
				R.name as rolename
			FROM `Role` R"
		);

		return $query->result();
	}

	public function create_user($userdata) {
		$query = $this->db->insert('user', $userdata);
	}

	public function get_users() {
		$query = $this->db->query(
			"SELECT U.username as username,
				U.name as name,
				U.roleid as roleid
			FROM `User` U"
		);

		return $query->result();
	}

	//checks if username is already taken
	public function username_exists($username) {
		$query = $this->db->query(
			"SELECT U.userid as userid
			FROM `User` U
			WHERE U.username = '$username'"
		);

		return count($query->result()) > 0;
	}
}

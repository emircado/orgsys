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
			FROM `user` U JOIN `role` R ON (U.roleid = R.roleid)
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

	public function check_userpass($userid, $password) {
		$query = $this->db->query(
			"SELECT U.userid as userid
			FROM `user` U
			WHERE U.userid = $userid
				AND U.password = '$password'"
		);

		if (count($query->row()) == 0) {
			return false;
		} else {
			return true;
		}
	}

	public function user_details($userid) {
		$query = $this->db->query(
			"SELECT U.username as username,
				U.name as name,
				U.password as password,
				U.email as email
			FROM `user` U
			WHERE U.userid = $userid"
		);
			return $query->row();
	}

	public function get_roles() {
		$query = $this->db->query(
			"SELECT R.roleid as roleid,
				R.name as rolename
			FROM `role` R"
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
				U.email as email,
				U.roleid as roleid
			FROM `user` U"
		);

		return $query->result();
	}

	//checks if username is already taken
	public function username_exists($username) {
		$query = $this->db->query(
			"SELECT U.userid as userid
			FROM `user` U
			WHERE U.username = '$username'"
		);

		return count($query->result()) > 0;
	}

	public function update_user($userid, $userdata) {
		$this->db->where('userid', $userid);
		$this->db->update('user', $userdata);
	}
}

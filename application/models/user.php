<?php
class User extends CI_Model{

	function __construct(){
		//call parent
		parent::__construct();
		$this->load->database();
	}

	/*************************** Get Functions **************************/
	public function check_user($username, $password) {
		// $this->db->query(array('user.userid', 'user.username', 'role.name as user_role'));
		// $this->db->from('user');
		// $this->db->join('role', 'user.roleid = role.roleid');
		// $this->db->where(array(
		// 		'user.username' => $username,
		// 		'user.password' => $password
		// 	)
		// );
		// // $this->db->limit(1);

		// $query = $this->db->get();

		$sql =
			"SELECT U.userid as userid,
				U.username as username,
				R.name as user_role
			FROM `user` U JOIN `role` R ON (U.roleid = R.roleid)
			WHERE U.username = ?
				AND U.password = ?
			LIMIT 1";

		$query = $this->db->query($sql, array($username, $password));

		if (count($query->result()) != 1) {
			return false;
		} else {
			return $query->row_array();
		}
	}

	public function check_userpass($userid, $password) {
		$this->db->select('userid');
		$query = $this->db->get_where('user', 
			array(
				'userid' => $userid,
				'password' => $password
			)
		);

		if (count($query->row()) == 0) {
			return false;
		} else {
			return true;
		}
	}

	public function user_details($userid) {
		$this->db->select(array('username', 'name', 'password', 'email'));
		$query = $this->db->get_where('user', 
			array(
				'userid' => $userid
			)
		);
		
		return $query->row();
	}

	public function get_roles() {
		$this->db->select(array('roleid', 'name as rolename'));
		$query = $this->db->get('role');

		return $query->result();
	}

	public function create_user($userdata) {
		$query = $this->db->insert('user', $userdata);
	}

	public function get_users() {
		$this->db->select(array('username', 'name', 'email', 'roleid'));
		$query = $this->db->get('user');

		return $query->result();
	}

	//checks if username is already taken
	public function username_exists($username) {
		$this->db->select('userid');
		$query = $this->db->get_where('user', array('username' => $username));

		return count($query->result()) > 0;
	}

	public function update_user($userid, $userdata) {
		$this->db->where('userid', $userid);
		$this->db->update('user', $userdata);
	}
}

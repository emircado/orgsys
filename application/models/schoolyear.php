<?php
class SchoolYear extends CI_Model{

	function __construct(){
		//call parent
		parent::__construct();
		$this->load->database();
	}

	/*************************** Get Functions **************************/
	public function get_schoolyears() {
		$query = $this->db->get('schoolyear');
		return $query->result();
	}

	public function get_active_sy() {
		$this->db->select(array(
			'syid as syid',
			'name as schoolyear'
		));
		$this->db->order_by('name', 'desc');

		$query = $this->db->get_where('schoolyear', array('status' => 1));

		return $query->row();
	}
}
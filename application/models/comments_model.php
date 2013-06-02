<?php

class Comments_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function get_comments($post) {
		$query = $this->db->get_where('comments', array('parent_post' => $post));
		return $query->result_array();
	}

	public function get_comment($id) {
		$query = $this->db->get_where('comments', array('id' => $id));
		return $query->row_array();
	}

	public function add_comment() {
		$data = array(
			'user_id' => $this->tank_auth->get_user_id(),
			'parent_post' => $this->input->post('post_id'),
			'body' => $this->input->post('body')
		);

		return $this->db->insert('comments', $data);
	}

	public function remove_comment($id) {
		$this->db->delete('comments', array('id' => $id));
	}

}
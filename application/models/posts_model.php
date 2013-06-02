<?php

class Posts_model extends CI_model {

	public function __construct() {
		$this->load->database();
	}

	public function get_posts($id = FALSE) {
		if ($id === FALSE) {
			$query = $this->db->get('posts');
			return $query->result_array();
		}

		$query = $this->db->get_where('posts', array('id' => $id));
		return $query->row_array();
	}

	public function add_posts($posts) {
		$this->db->insert_batch('posts', $posts);
	}

}
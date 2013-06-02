<?php

class Comments extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('comments_model');

		$this->form_validation->set_rules('body', 'Body', 'required');
		$this->form_validation->set_rules('post_id', 'Post ID', 'required');
	}

	public function post() {
		$this->comments_model->add_comment();

		$data['title'] = 'Comment Posted';
		$data['post_id'] = $this->input->post('post_id');

		$this->load->view('templates/header', $data);
		$this->load->view('comments/success', $data);
		$this->load->view('templates/footer');
	}

	function remove($id = NULL) {
		$this->load->library('Tank_auth');
		$this->load->helper('url');

		if ($id && $this->tank_auth->is_logged_in()) {
			$comment = $this->comments_model->get_comment($id);
			$user_id = $this->tank_auth->get_user_id();

			if ($user_id == $comment['user_id']) {
				$this->comments_model->remove_comment($id);

				$data['title'] = 'Comment Deleted';
				$data['comment'] = $comment;
				$this->load->view('templates/header', $data);
				$this->load->view('comments/deleted');
				$this->load->view('templates/footer');
			} else {
				$data['title'] = 'Deletion Failed';
				$this->load->view('templates/header', $data);
				$this->load->view('comments/delete_failed');
				$this->load->view('templates/footer');
			}
		} else {
			redirect('post/index');
		}
	}

}
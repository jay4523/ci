<?php

class Posts extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('posts_model');
	}

	public function index() {
		$data['posts'] = $this->posts_model->get_posts();
		$data['title'] = 'All Posts';

		$this->load->view('templates/header', $data);
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($id) {
		$this->load->model('comments_model');
		$this->load->model('tank_auth/users');
		$this->load->helper('form');
		$data['posts_item'] = $this->posts_model->get_posts($id);
		$comments_raw = $this->comments_model->get_comments($data['posts_item']['id']);
		$comments = array();

		foreach ($comments_raw as $comment) {
			$user = $this->users->get_user_by_id($comment['user_id'], TRUE);
			$comment['username'] = $user->username;
			$comments[] = $comment;
		}

		if (empty($data['posts_item'])) {
			show_404();
		}

		$data['title'] = $data['posts_item']['title'];
		$data['comments'] = $comments;

		$this->load->view('templates/header', $data);
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer');
	}

	public function get_new() {
		$this->load->library('Tank_auth');

		$user_id = $this->tank_auth->get_user_id();
		if ($user_id) {
			$user = $this->users->get_user_by_id($user_id, TRUE);

			if ($user->admin == 0) {
				echo 'Must be admin to load new posts.';
				die;
			}
		}

		// Initialize Curl
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'http://www.reddit.com/r/japanpics/.json');
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Load JSON data from r/japan\\\pics
		$json = curl_exec($ch);
		curl_close($ch);

		// Parse JSON data
		$json = json_decode($json, TRUE);
		
		// Grab ten posts
		$posts = array();
		$limit = 10;
		for ($i=0;$i<$limit;$i++) {
			// Skip posts with no thumbnail
			if ($json['data']['children'][$i]['data']['thumbnail'] == 'default') {
				$limit++;
				continue;
			}

			$post = array(
				'title' => $json['data']['children'][$i]['data']['title'],
				'url' => $json['data']['children'][$i]['data']['url'],
				'thumb_url' => $json['data']['children'][$i]['data']['thumbnail'],
			);

			$posts[] = $post;
		}

		$this->posts_model->add_posts($posts);

		echo 'Posts added:';
		echo '<ul>';
		foreach ($posts as $post) {
			echo '<li>' . $post['title'];
		}
		echo '</ul>';
	}

}
<?php

class Profile extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->model('tank_auth/users');
	}

	public function view($user_id = NULL) {
		if ($user_id) {
			$user = $this->users->get_user_by_id($user_id, TRUE);
			$profile = $this->users->get_profile($user_id);

			$data['title'] = $user->username . '\'s Profile';
			$data['user'] = $user;
			$data['profile'] = $profile;

			$this->load->view('templates/header', $data);
			$this->load->view('profile/view', $data);
			$this->load->view('templates/footer');
		} else {
			redirect('profile/list');
		}
	}

	public function list_profiles() {
		$users = $this->users->get_all_users();

		$data['title'] = 'Profile List';
		$data['users'] = $users;

		$this->load->view('templates/header', $data);
		$this->load->view('profile/list', $data);
		$this->load->view('templates/footer');
	}

	public function edit() {
		if ($this->tank_auth->is_logged_in()) {
			$user_id = $this->tank_auth->get_user_id();
			$user = $this->users->get_user_by_id($user_id, TRUE);
			$profile = $this->users->get_profile($user_id);

			$data['title'] = 'Your Profile';
			$data['user'] = $user;
			$data['profile'] = $profile;

			$this->load->view('templates/header', $data);
			$this->load->view('profile/edit', $data);
			$this->load->view('templates/footer');
		} else {
			redirect('profile/list');
		}
	}

	public function update() {
		if ($this->tank_auth->is_logged_in()) {
			$user_id = $this->tank_auth->get_user_id();
			$this->users->update_user($user_id);
			$this->users->update_profile($user_id);

			$data['title'] = 'Profile Updated';

			$this->load->view('templates/header', $data);
			$this->load->view('profile/updated');
			$this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view('profile/failed');
			$this->load->view('templates/footer');
		}
	}

}
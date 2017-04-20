<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function insert() {
		$username = 'Peter';
		$password = 'secret';
		$this->load->model("user_model");

		$this->user_model->create_users(
			[
			'username' => $username,
			  'password' => $password
			]
			);
	}

	public function update($id) {
		$username = 'Peter3';
		$password = 'secret2';

		$this->load->model("user_model");

		$this->user_model->update(
			[
			'username' => $username,
			  'password' => $password
			], $id
			);
	}

	public function show_users($user_id){
		$this->load->model("user_model");

		$data['results'] = $this->user_model->get_users($user_id);
		$this->load->view('home_view', $data);
	}

	public function delete($id) {
		
		$this->load->model("user_model");

		$this->user_model->delete($id);
	}
	public function login() { 

		// $data['main_view'] = "home_view";
		// $this->load->view('layouts/main', $data);
		// $_POST['username'] 
		// echo "this works";
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');

		if($this->form_validation->run() === FALSE){
			$data = array(
				'errors' => validation_errors()
				);
			$this->session->set_flashdata($data);
			redirect('home');
		} else {

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model("user_model");

			$userid = $this->user_model->login_user($username, $password);

			if($userid) {
				$user_data = array(
					'user_id' => $userid,
					'username' => $username,
					'logged_in' => true
					);

				$this->session->set_userdata($user_data);
				redirect('home/index');
			}
			// echo $this->input->post('username');

		}
	}


	
}

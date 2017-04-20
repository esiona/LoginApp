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
				'errors' => validation_errors('<p class="bg-danger">')
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
				$this->session->set_flashdata('login_success', 'You are now logged in');
				$data['main_view'] = "users/admin_view";
				$this->load->view('layouts/main', $data);
				// redirect('home/index');
			} else {
				$this->session->set_flashdata('login_failed', 'You are not logged in');

				redirect('home/index');
			}
			// echo $this->input->post('username');

		}
	}

	public function logout () {
		$this->session->sess_destroy();
		redirect('home/index');
	}

	public function register() {
		// $data['main_view'] = 'users/register_view';
		// $this->load->view('layouts/main', $data);
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');
		$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');

		if($this->form_validation->run() === FALSE){
			// $data =  array('errors' => validation_errors() );
			// $this->session->set_flashdata($data);
			// redirect('home');
			$data['main_view'] = 'users/register_view';
			$this->load->view('layouts/main', $data);

		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$firstname = $this->input->post('firstname');
			$email = $this->input->post('email');
			$lastname = $this->input->post('lastname');

			$this->load->model('user_model.php');

			$data = [
				'username' => $username,
				'password' => $password,
				'firstname' => $firstname,
				'lastname' => $lastname,
				'email' => $email
			];
			if($this->user_model->create_users($data)) {
				redirect('home/index');
			} else {
				
			}

		}
	}
	
}

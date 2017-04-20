<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	
	public function login()
	{
		// $data['main_view'] = "home_view";
		// $this->load->view('layouts/main', $data);
		// $_POST['username'] 
		// echo "this works";
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');

		if($this->form_validation->run() === FALSE){
			$data = array(
				'errors' => validation_errors()
				);
			$this->session->set_flashdata($data);
			redirect('home');
		} else {
			echo $this->input->post('username');

		}
	}


	
}

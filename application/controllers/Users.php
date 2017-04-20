<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	
	public function login()
	{
		// $data['main_view'] = "home_view";
		// $this->load->view('layouts/main', $data);
		// $_POST['username'] 
		// echo "this works";
		echo $this->input->post('username');
	}
}

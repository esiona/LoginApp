<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		if($this->session->userdata('logged_in')) {
			$user_id = $this->session->userdata('user_id');
			$this->load->model('project_model');
			$data['projects'] = $this->project_model->getProjects($user_id);
			$data['tasks'] = $this->task_model->getTasks($user_id);

		}
		$data['main_view'] = "home_view";
		$this->load->view('layouts/main', $data);
	}
}

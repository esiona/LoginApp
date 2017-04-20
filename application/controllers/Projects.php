<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {


	
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')) {
			$this->session->set_flashdata('no_access', 'Sorry you are not allowed to view this page');
			redirect('home/index');
		}
	}

	public function index()
	{

		$this->load->model('project_model');
		$data['projects'] = $this->project_model->getProjects();
		$data['main_view'] = "projects/index";
		$this->load->view('layouts/main', $data);
	}

	public function display() {
		$data['main_view'] = "projects/display";
		$this->load->view('layouts/main', $data);
	}
}

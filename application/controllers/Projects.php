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

	public function display($id) {
		$this->load->model('project_model');
		$data['project'] = $this->project_model->getProject($id);
		$data['completed_tasks'] = $this->project_model->getProjectsTask($id);
		$data['uncompleted_tasks'] = $this->project_model->getProjectsTask($id, false);

		$data['main_view'] = "projects/display";
		$this->load->view('layouts/main', $data);
	}


	public function create() {

		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('body', 'Body', 'trim|required|min_length[3]');

		if($this->form_validation->run() === FALSE){
			$data['main_view'] = 'projects/create_view';
			$this->load->view('layouts/main', $data);
		} else {
			$this->load->model('project_model');
			$data = [
				'user_id' => $this->session->userdata('user_id'),
				'name' => $this->input->post('name'),
				'body' => $this->input->post('body')
			];
			if($this->project_model->create_project($data)) {
				$this->session->set_flashdata('project_created', 'Project has been created');
				redirect('projects/index');
			} else {
				redirect('projects/create_view');

			}	
		}

		
	}


	public function edit($id){

		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('body', 'Body', 'trim|required|min_length[3]');
		
		if($this->form_validation->run() === FALSE){
			$data['project_data'] = $this->project_model->getProject($id);

			$data['main_view'] = 'projects/edit';
			$this->load->view('layouts/main', $data);
		} else {
			$data = [
				'name' => $this->input->post('name'),
				'body' => $this->input->post('body')
			];
			if($this->project_model->edit_project($id, $data)){
				$this->session->set_flashdata('project_updated', 'Project has been updated');
				redirect('projects/display/'.$id);
			} else {
				redirect('projects/edit/'.$id);

			}
		}

	}

	public function delete($id){
		$this->load->model('project_model');
		
		$this->project_model->delete_project_tasks($id);

		$this->project_model->delete_project($id);

		$this->session->set_flashdata('project_deleted', 'Project has been deleted');

		redirect('projects/index');
		
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CI_Controller {

	public function create($project_id) {

		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('body', 'Body', 'trim|required|min_length[3]');

		if($this->form_validation->run() === FALSE){
			// $data['project'] = $this->project_model->getProject($project_id);
			$data['main_view'] = 'tasks/create_view';
			$this->load->view('layouts/main', $data);
		} else {

			$name = $this->input->post('name');
			$body = $this->input->post('body');
			$due_date = $this->input->post('due_date');

			$data = [

				'name' => $name,
				'body' => $body,
				'project_id' => $project_id,
				'date_created' => $due_date
			];
			if($this->task_model->create_task($data)) {
				$this->session->set_flashdata('task_created', 'Task has been created');
				redirect('projects/index');
			} else {
				redirect('tasks/create_view');

			}
		}
		

	}


	public function edit($task_id){
		$this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('body', 'Body', 'trim|required|min_length[3]');

		if($this->form_validation->run() === FALSE){
			$data['task_data'] = $this->task_model->get_task($task_id);
			$data['main_view'] = 'tasks/edit';
			$this->load->view('layouts/main', $data);
		} else {

			$name = $this->input->post('name');
			$body = $this->input->post('body');
			$due_date = $this->input->post('due_date');

			$data = [

				'name' => $name,
				'body' => $body,
				'date_created' => $due_date
			];
			if($this->task_model->update_task($task_id, $data)) {
				$this->session->set_flashdata('task_updated', 'Task has been updated');
				redirect('projects/index');
			} else {
				redirect('tasks/edit');

			}
		}
	}



	public function mark_incomplete($task_id){
		
		$this->task_model->incomplete_task($task_id);
		$this->session->set_flashdata('task_incompleted', 'Task has been marked as incomplete');

		$project_id = $this->task_model->getProjectId($task_id);
		// echo 'proj id '.$project_id;
		redirect('projects/display/'.$project_id);
	}

	public function mark_complete($task_id){
		$this->task_model->complete_task($task_id);
		$this->session->set_flashdata('task_completed', 'Task has been marked as complete');
		$project_id = $this->task_model->getProjectId($task_id);
		// echo 'proj id '.$project_id;

		redirect('projects/display/'.$project_id);
	}	

	public function delete($task_id) {
		$this->task_model->delete_task($task_id);
		$this->session->set_flashdata('task_deleted', 'Task has been deleted');
		redirect('projects/index');
	}


	public function display($task_id)
	{
		$data['task'] = $this->task_model->get_task($task_id);
		$data['main_view'] = 'tasks/display';
		$this->load->view('layouts/main', $data);
	}
}

<?php 
class Task_model extends CI_Model 
{
	public function get_task($task_id){
		$this->db->where('id', $task_id);

		$query = $this->db->get('tasks');
		
		if ($query->num_rows() >0){
			return $query->row(0);
		} else {
			return false;
		}
	}


	public function create_task($data){
		if($this->db->insert('tasks', $data)){
			return true;
		} else {
			return false;
		}
	}


	public function update_task($taskid, $data) {
		$this->db->where('id', $taskid);

		if($this->db->update('tasks', $data)){
			return true;
		} else {
			return false;
		}
	}

	public function delete_task($taskid) {
		$this->db->where('id', $taskid);
		if($this->db->delete('tasks')){
			return true;
		} else {
			return false;
		}
	}

	public function complete_task($taskid) {
		$this->db->where('id', $taskid);
		$data = [
			'status' => 0
		];
		if($this->db->update('tasks', $data)){
			return true;
		} else {
			return false;
		}
	}

	public function incomplete_task($taskid) {
		$this->db->where('id', $taskid);
		$data = [
			'status' => 1
		];
		if($this->db->update('tasks', $data)){
			return true;
		} else {
			return false;
		}
	}


	public function getTasks($userid) {
		$this->db->where('projects.user_id', $userid );
		$this->db->join('tasks', 'projects.id = tasks.project_id');
		$query = $this->db->get('projects');

		return $query->result();

	}

	public function getProjectId($task_id){
		$this->db->where('id', $task_id);

		$query = $this->db->get('tasks');
		return $query->row(0)->project_id;

	}
	

	
}
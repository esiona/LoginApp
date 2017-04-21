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
}
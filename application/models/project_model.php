<?php 
class Project_model extends CI_Model 
{
	public function getProjects($user_id = null) {
		if($user_id === null) {
			$query = $this->db->get('projects');

			if ($query->num_rows() >0){
				return $query->result();
			} else {
				return false;
			}
		} else {
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('projects');
			return $query->result();
		}
		
	}

	public function getProjectsTask($id, $active = true) {
		$this->db->select('
				tasks.name as task_name, 
				tasks.body as task_body,
				tasks.id as task_id,
				projects.name as pro_name,
				projects.body as pro_body,
				projects.id as pro_id

			');

		$this->db->from('tasks');
		$this->db->join('projects', 'projects.id = tasks.project_id');
		$this->db->where('tasks.project_id', $id);

		if($active){
			$this->db->where('tasks.status', 0);
		} else {
			$this->db->where('tasks.status', 1);
	
		}

		$query = $this->db->get();
		if($query->num_rows() < 0) {
			return FALSE;
		} else {
			return $query->result();
		}
	}

	public function getProject($id) {

		$this->db->where('id', $id);
		$query = $this->db->get('projects');

		if ($query->num_rows() >0){
			return $query->row(0);
		} else {
			return false;
		}
	}

	public function create_project($data){
		if($this->db->insert('projects', $data)) {
			return true;
		} else {
			return false;
		}
	}


	public function edit_project($id, $data) {
		$this->db->where('id', $id);
		$this->db->update('projects', $data);
		return true;
	}


	public function delete_project($id){
		$this->db->where('id', $id);
		$this->db->delete('projects');
		return true;
	}
}
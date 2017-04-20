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
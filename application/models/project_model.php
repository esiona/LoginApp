<?php 
class Project_model extends CI_Model 
{
	public function getProjects() {
		$query = $this->db->get('projects');

		if ($query->num_rows() >0){
			return $query->result();
		} else {
			return false;
		}
	}
}
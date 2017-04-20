<?php 


class User_model extends CI_Model 
{
	function login_user($username, $pass){
		$this->db->where('username' ,$username);
		$this->db->where('password' ,$pass);

		$result = $this->db->get('users');

		if($result->num_rows() == 1) {
			return $result->row(0)->id;
		} else {
			return false;
		}
	} 

	function create_users($data){
		$this->db->insert('users', $data);
	}

	function get_users($user_id){
		$this->db->where('id' ,$user_id);

		$query = $this->db->get('users');

		return $query->result();
	}

	function update($data, $user_id){
		$this->db->where('id' ,$user_id);
		$this->db->update('users', $data);
	}

	function delete($user_id){
		$this->db->where('id' ,$user_id);
		$this->db->delete('users');
	}

}
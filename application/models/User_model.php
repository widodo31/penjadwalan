<?php

class User_model extends CI_Model{

	var $tabel = "admin";
	

	function checkLogin($data)
	{
		$user = $data['username'];
		$pass = $data['password'];

		$this->db->select('*');
		$this->db->where('username', $user);
		$this->db->where('password', md5($pass));
		$query = $this->db->get($this->tabel);

		if($query->num_rows() == 1)
		{
			return true;
		}else{
			return false;
		}
	}

	function checkData($user)
	{
		$this->db->select("*");
		$this->db->where('username', $user);
		$query = $this->db->get($this->tabel);

		if($query->num_rows() == 1){

			return $query->result();
		}else{
			return false;
		}
	}

}

?>
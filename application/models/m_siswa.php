<?php

if(!defined('BASEPATH')) exit('No direct script allowed access');
class M_siswa extends CI_Model
{
	var $table = "siswa";
	var $id = "id_siswa";
	public $limit;
	public $sort;
	public $offset;
	public $order;

	function num_page()
	{
		$result = $this->db->count_all($this->table);

		return $result;
	}

	function get_all()
	{
		$get = $this->db->query("SELECT * FROM $this->table ".
								"ORDER BY $this->sort $this->order ".
								"LIMIT $this->offset, $this->limit");
		return $get;
	}

	function get()
	{
		$get = $this->db->query("select * from $this->table");
		return $get;
	}

	function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		$result = $this->db->get($this->table);
		return $result;
	}

	function update($id, $data)
	{
		$this->db->where($this->id, $id);
		$this->db->update($this->table, $data);
	}

	function delete($id)
	{
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
	}
}

?>
<?php

if(!defined('BASEPATH')) exit('No direct script allowed access');
class M_guru extends CI_Model
{
	var $table = "guru";
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
		$this->db->where('id_guru', $id);
		$result = $this->db->get($this->table);
		return $result;
	}

	function update($id, $data)
	{
		$this->db->where('id_guru', $id);
		$this->db->update($this->table, $data);
	}

	function delete($id)
	{
		$this->db->where("id_guru", $id);
		$this->db->delete($this->table);
	}
}

?>
<?php
if(!defined('BASEPATH')) exit("No direct script allowed access");

class M_mapel extends CI_Model{

	var $table = "mapel";
	var $id = "id_mapel";
	public $limit;
	public $offset;
	public $sort;
	public $order;

	function __construct()
	{
		parent::__construct();
	}

	function get_all()
	{
		$query = "SELECT * FROM $this->table ORDER BY $this->sort $this->order LIMIT $this->offset, $this->limit";
		return $this->db->query($query);
	}

	function num_page()
	{
		$query = $this->db->get($this->table);
		return $query->num_rows();
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
		return $this->db->get($this->table);
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
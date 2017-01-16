<?php

if(!defined('BASEPATH')) exit('No direct script allowed access');
class M_guruMapel extends CI_Model
{
	var $table = "guru_mapel";
	var $mapel = "mapel";
	var $guru = "guru";
	var $kelas = "kelas";
	var $id = "id_gm";
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
								"INNER JOIN $this->mapel ON $this->table.id_mapel=$this->mapel.id_mapel ".
								"INNER JOIN $this->guru ON $this->table.id_guru=$this->guru.id_guru ".
								"INNER JOIN $this->kelas ON $this->table.id_kelas=$this->kelas.id_kelas ".
								"ORDER BY $this->sort $this->order ".
								"LIMIT $this->offset, $this->limit");
		return $get;
	}

	function get($id)
	{
		$get = $this->db->query("SELECT * FROM $this->table ".
								"INNER JOIN $this->mapel ON $this->table.id_mapel=$this->mapel.id_mapel ".
								"INNER JOIN $this->guru ON $this->table.id_guru=$this->guru.id_guru ".
								"INNER JOIN $this->kelas ON $this->table.id_kelas=$this->kelas.id_kelas WHERE $this->id=$id");
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
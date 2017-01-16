<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class M_jadwal extends CI_Model{

	function query_guruMapel($tahun_akademik){

		$rs_data = $this->db->query("SELECT a.id_gm, "
                                    . "a.id_guru, "
                                    . "b.jumlah_jam, "
                                    . "b.jenis "
                                    . "FROM guru_mapel a "
                                    . "LEFT JOIN mapel b "
                                    . "ON a.id_mapel = b.id_mapel "
                                    . "WHERE a.tahun_akademik = '$tahun_akademik'");
	}
} 

?>
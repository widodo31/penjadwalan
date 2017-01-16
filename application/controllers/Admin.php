<?php

if(!defined("BASEPATH")) exit("No direct script allowed access");

class Admin extends CI_Controller{

	var $template = "template";

	function __construct(){

		parent::__construct();
		$this->load->model(array('user_model','m_guru','m_jam','m_ruang','m_hari','m_kelas','m_mapel','m_guruMapel','m_siswa','m_member','m_jadwal','m_informasi','m_tugas'));
		define('IS_TEST', 'false');
		$this->load->helper(array('form','url','paginate_helper'));
		$this->load->library(array('form_validation', 'pagination', 'session'));
	}	
	
	//=====================================================================================================

	function render_data($data){

		$this->load->view($this->template, $data);
	}

	//=====================================================================================================

	function index(){

		$data['title'] = "DASHBOARD";
		$data['page_name'] = "dashboard";
		$this->render_data($data);
	}

	//=====================================================================================================

	function login(){

		$data['title'] = "Login Admin";
		$this->load->view("login", $data);
	}

	function proses(){

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run() == false){

			if(isset($this->session->userdata['logged_in']))
			{
				
				$data['title'] = 'DASHBOARD';
				$data['page_name'] = 'dashboard';
				$this->render_data($data);
			}else{

				$data['title'] = 'Login Admin';
				$this->load->view('login');
			}
		}
		else
		{
			$data = array(
				"username" => $this->input->post('username'),
				"password" => $this->input->post('password')
				);

			$user = $this->user_model->checkLogin($data);
			if($user == true)
			{
				$username = $this->input->post("username");

				$result = $this->user_model->checkData($username);

				if($result == true)
				{
					$session_data = array(
						"username" => $result[0]->username);


					// menambahkan user ke session
					$this->session->set_userdata('logged_in', $session_data);
					$this->index();
					
				}
			}else{
				$data['error'] = 'Username dan Password salah';
				$data['title'] = 'Login Admin';
				$this->load->view("login", $data);
			}

		}
	}

	function logout()
	{
		$sess_array = array("username" => '');
		$this->session->unset_userdata("logged_in", $sess_array);

		$this->load->view("login");
	}

	//=====================================================================================================

	function guru()
	{
		// mendefinisikan variable
		$data['title'] = 'GURU';
		$data['page_name'] = "manajemen/guru/guru";

		$url = base_url().'admin/guru';
		$total_rows = $this->m_guru->num_page();
		$per_page = 10;

		$config = paginate($url, $total_rows, $per_page, 3);
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();

		$this->m_guru->limit = $per_page;

		if($this->uri->segment(3) == TRUE )
		{
			$this->m_guru->offset = $this->uri->segment(3);
		}
		else
		{
			$this->m_guru->offset = 0;
		}

		$data['no'] = $this->m_guru->offset;
		$this->m_guru->sort = 'nama_guru';
		$this->m_guru->order = 'ASC';
		$data['guru'] = $this->m_guru->get_all();
		$data['msg'] = "Tabel Kosong";	

		$this->render_data($data);		
	}

	function guruAdd()
	{
		$data = array();

		$this->form_validation->set_rules('nip','NIP','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('telp','Telp','required');
		$this->form_validation->set_rules('email','Email','required');

		if($this->form_validation->run() == TRUE)
		{
			$data = array(
					'nip'		=> $this->input->post('nip'),
					'nama_guru'		=> $this->input->post('nama'),
					'alamat'	=> $this->input->post('alamat'),
					'telp'		=> $this->input->post('telp'),
					'email'		=> $this->input->post('email'));

			// array untuk insert member
			$data1 = array(
					'nama'			=> $this->input->post('nama'),
					'password'		=> '12345',
					'email'			=> $this->input->post('email'),
					'level'			=> 'GURU',
					'image'			=> '');

			if(IS_TEST === 'false'){
				$this->m_guru->insert($data);
				$this->m_member->insert($data1);
				$data['msg'] = "Data Berhasil Di Input Di Tabel";
			}else{
				$data['msg'] = "gagal menginput data";
			}
		}

		$data['title'] = 'TAMBAH GURU';
		$data['page_name'] = "manajemen/guru/guruAdd";
		
		$this->render_data($data);
	}

	function guruEdit($id)
	{
		$data = array();

		$this->form_validation->set_rules('nip','NIP','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('telp','Telp','required');
		$this->form_validation->set_rules('email','Email','required');

		if($this->form_validation->run() == TRUE )
		{
			$data = array(
					'nip'		=> $this->input->post('nip'),
					'nama_guru'		=> $this->input->post('nama'),
					'alamat'	=> $this->input->post('alamat'),
					'telp'		=> $this->input->post('telp'),
					'email'		=> $this->input->post('email'));
			if(IS_TEST === 'false'){
				$this->m_guru->update($id, $data);
				$data['msg'] = "Data Berhasil Di diupdate";
			}else{
				$data['msg'] = "Data gagal diupdate";
			}
		}

		$data['title'] = 'GURU EDIT';
		$data['page_name'] = "manajemen/guru/guruEdit";

		$data['guru'] = $this->m_guru->get_by_id($id);
		$this->render_data($data);

	}

	function guruDel($id)
	{


		$data['title'] = 'GURU EDIT';
		$data['page_name'] = "manajemen/guru/guru";

		$data['guru'] = $this->m_guru->delete($id);
		redirect(base_url() . 'admin/guru','reload');
	}

	//===========================================================================================

	function jam()
	{
		$data = array();

		$url = base_url().'admin/jam';
		$total_rows = $this->m_jam->num_page();
		$per_page = 10;

		$config = paginate($url, $total_rows, $per_page, 3);
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();

		$this->m_jam->limit = $per_page;
		if($this->uri->segment(3) == TRUE )
		{
			$this->m_jam->offset = $this->uri->segment(3);
		}
		else
		{
			$this->m_jam->offset = 0;
		}

		$data['no'] = $this->m_jam->offset;
		$this->m_jam->sort = 'range_jam';
		$this->m_jam->order = 'ASC';

		$data['jam'] = $this->m_jam->get();

		$data['title'] = 'JAM';
		$data['page_name'] = "manajemen/jam/jam";

		$this->render_data($data);
	}

	function jamAdd()
	{
		$data = array();

		$this->form_validation->set_rules('range_jam','Range Jam','required');
		$this->form_validation->set_rules('keterangan','Keterangan','required');

		if($this->form_validation->run() == TRUE)
		{
			$data = array(
					'range_jam'		=> $this->input->post('range_jam'),
					'keterangan'	=> $this->input->post('keterangan'));
			if(IS_TEST === 'false'){
				$this->m_jam->insert($data);
				$data['msg'] = "Data Berhasil Di Input Di Tabel";
			}else{
				$data['msg'] = "gagal menginput data";
			}
		}

		$data['title'] = 'TAMBAH JAM';
		$data['page_name'] = "manajemen/jam/jamAdd";
		
		$this->render_data($data);
	}

	function jamEdit($id)
	{
		$data = array();

		$this->form_validation->set_rules('range_jam','Range Jam','required');
		$this->form_validation->set_rules('keterangan','Keterangan','required');

		if($this->form_validation->run() == TRUE )
		{
			$data = array(
					'range_jam'		=> $this->input->post('range_jam'),
					'keterangan'	=> $this->input->post('keterangan'));
			if(IS_TEST === 'false'){
				$this->m_jam->update($id, $data);
				$data['msg'] = "Data Berhasil Di diupdate";
			}else{
				$data['msg'] = "Data gagal diupdate";
			}
		}

		$data['title'] = 'JAM EDIT';
		$data['page_name'] = "manajemen/jam/jamEdit";

		$data['jam'] = $this->m_jam->get_by_id($id);
		$this->render_data($data);

	} 

	function jamDel($id)
	{


		$data['title'] = 'JAM EDIT';
		$data['page_name'] = "manajemen/jam/jam";

		$this->m_jam->delete($id);
		redirect(base_url() . 'admin/jam','reload');
	}

	//=========================================================================================


	function ruang()
	{
		$data = array();

		$url = base_url().'admin/ruang';
		$total_rows = $this->m_ruang->num_page();
		$per_page = 10;

		$config = paginate($url, $total_rows, $per_page, 3);
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();

		$this->m_ruang->limit = $per_page;
		if($this->uri->segment(3) == TRUE )
		{
			$this->m_ruang->offset = $this->uri->segment(3);
		}
		else
		{
			$this->m_ruang->offset = 0;
		}

		$data['no'] = $this->m_ruang->offset;
		$this->m_ruang->sort = 'nama';
		$this->m_ruang->order = 'ASC';

		$data['ruang'] = $this->m_ruang->get();

		$data['title'] = 'RUANG';
		$data['page_name'] = "manajemen/ruang/ruang";

		$this->render_data($data);
	}

	function ruangAdd()
	{
		$data = array();

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('jenis','Jenis','required');

		if($this->form_validation->run() == TRUE)
		{
			$data = array(
					'nama'		=> $this->input->post('nama'),
					'jenis'		=> $this->input->post('jenis'));
			if(IS_TEST === 'false'){
				$this->m_ruang->insert($data);
				$data['msg'] = "Data Berhasil Di Input Di Tabel";
			}else{
				$data['msg'] = "gagal menginput data";
			}
		}

		$data['title'] = 'TAMBAH RUANG';
		$data['page_name'] = "manajemen/ruang/ruangAdd";
		
		$this->render_data($data);
	}

	function ruangEdit($id)
	{
		$data = array();

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('jenis','Jenis','required');

		if($this->form_validation->run() == TRUE )
		{
			$data = array(
					'nama'		=> $this->input->post('nama'),
					'jenis'		=> $this->input->post('jenis'));
			if(IS_TEST === 'false'){
				$this->m_ruang->update($id, $data);
				$data['msg'] = "Data Berhasil Di diupdate";
			}else{
				$data['msg'] = "Data gagal diupdate";
			}
		}

		$data['title'] = 'RUANG EDIT';
		$data['page_name'] = "manajemen/ruang/ruangEdit";

		$data['ruang'] = $this->m_ruang->get_by_id($id);
		$this->render_data($data);

	}

	function ruangDel($id)
	{

		$this->m_ruang->delete($id);
		redirect(base_url() . 'admin/ruang','reload');
	}

	//+=========================================================================================

	function hari()
	{
		$data = array();

		$url = base_url().'admin/hari';
		$total_rows = $this->m_hari->num_page();
		$per_page = 10;

		$config = paginate($url, $total_rows, $per_page, 3);
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();

		$this->m_hari->limit = $per_page;
		if($this->uri->segment(3) == TRUE )
		{
			$this->m_hari->offset = $this->uri->segment(3);
		}
		else
		{
			$this->m_hari->offset = 0;
		}

		$data['no'] = $this->m_hari->offset;
		$this->m_hari->sort = 'nama';
		$this->m_hari->order = 'ASC';

		$data['hari'] = $this->m_hari->get();

		$data['title'] = 'HARI';
		$data['page_name'] = "manajemen/hari/hari";

		$this->render_data($data);
	}

	function hariSearch()
	{
		
	}

	function hariAdd()
	{
		$data = array();

		$this->form_validation->set_rules('nama','Nama','required');

		if($this->form_validation->run() == TRUE)
		{
			$data = array(
					'nama'		=> $this->input->post('nama'));
			if(IS_TEST === 'false'){
				$this->m_hari->insert($data);
				$data['msg'] = "Data Berhasil Di Input Di Tabel";
			}else{
				$data['msg'] = "gagal menginput data";
			}
		}

		$data['title'] = 'TAMBAH HARI';
		$data['page_name'] = "manajemen/hari/hariAdd";
		
		$this->render_data($data);
	}

	function hariEdit($id)
	{
		$data = array();

		$this->form_validation->set_rules('nama','Nama','required');

		if($this->form_validation->run() == TRUE )
		{
			$data = array(
					'nama'		=> $this->input->post('nama'));
			if(IS_TEST === 'false'){
				$this->m_hari->update($id, $data);
				$data['msg'] = "Data Berhasil Di diupdate";
			}else{
				$data['msg'] = "Data gagal diupdate";
			}
		}

		$data['title'] = 'HARI EDIT';
		$data['page_name'] = "manajemen/hari/hariEdit";

		$data['hari'] = $this->m_hari->get_by_id($id);
		$this->render_data($data);

	}

	function hariDel($id)
	{

		$this->m_hari->delete($id);
		redirect(base_url() . 'admin/hari','reload');
	}

	//========================================================================================================================

	function kelas()
	{
		$data = array();

		$url = base_url().'admin/kelas';
		$total_rows = $this->m_kelas->num_page();
		$per_page = 10;

		$config = paginate($url, $total_rows, $per_page, 3);
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();

		$this->m_kelas->limit = $per_page;
		if($this->uri->segment(3) == TRUE )
		{
			$this->m_kelas->offset = $this->uri->segment(3);
		}
		else
		{
			$this->m_kelas->offset = 0;
		}

		$data['no'] = $this->m_kelas->offset;
		$this->m_kelas->sort = 'nama_kelas';
		$this->m_kelas->order = 'ASC';

		$data['kelas'] = $this->m_kelas->get_all();

		$data['title'] = 'KELAS';
		$data['page_name'] = "manajemen/kelas/kelas";

		$this->render_data($data);
	}

	function kelasAdd()
	{
		$data = array();

		$this->form_validation->set_rules('nama','Nama','required');

		if($this->form_validation->run() == TRUE)
		{
			$data = array('nama_kelas'	=> $this->input->post('nama'));
			if(IS_TEST === 'false'){
				$this->m_kelas->insert($data);
				$data['msg'] = "Data Berhasil Di Input Di Tabel";
			}else{
				$data['msg'] = "gagal menginput data";
			}
		}

		$data['title'] = 'TAMBAH KELAS';
		$data['page_name'] = "manajemen/kelas/kelasAdd";
		
		$this->render_data($data);
	}

	function kelasEdit($id)
	{
		$data = array();

		$this->form_validation->set_rules('nama','Nama','required');

		if($this->form_validation->run() == TRUE )
		{
			$data = array('nama_kelas'	=> $this->input->post('nama'));
			if(IS_TEST === 'false'){
				$this->m_kelas->update($id, $data);
				$data['msg'] = "Data Berhasil Di diupdate";
			}else{
				$data['msg'] = "Data gagal diupdate";
			}
		}

		$data['title'] = 'KELAS EDIT';
		$data['page_name'] = "manajemen/kelas/kelasEdit";

		$data['kelas'] = $this->m_kelas->get_by_id($id);
		$this->render_data($data);

	}

	function kelasDel($id)
	{


		$data['title'] = 'KELAS DELETE';
		$data['page_name'] = "manajemen/kelas/kelas";

		$this->m_kelas->delete($id);
		redirect(base_url() . 'admin/kelas','reload');
	}

//=========================================================================================================================


	function mapel()
	{
		$data = array();

		$url = base_url().'admin/mapel';
		$total_rows = $this->m_mapel->num_page();
		$per_page = 10;

		$config = paginate($url, $total_rows, $per_page, 3);
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();

		$this->m_mapel->limit = $per_page;
		if($this->uri->segment(3) == 3 )
		{
			$this->m_mapel->offset = $this->uri->segment(3);
		}
		else
		{
			$this->m_mapel->offset = 0;
		}

		$data['no'] = $this->m_mapel->offset;
		$this->m_mapel->sort = 'nama_mapel';
		$this->m_mapel->order = 'ASC';

		$data['mapel'] = $this->m_mapel->get_all();

		$data['title'] = 'MAPEL';
		$data['page_name'] = "manajemen/mapel/mapel";

		$this->render_data($data);
	}

	function mapelAdd()
	{
		$data = array();

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('jenis','Jenis','required');
		$this->form_validation->set_rules('kode_mapel','Kode Mapel','required');
		$this->form_validation->set_rules('jumlah_jam','Jumlah Jam','required');

		if($this->form_validation->run() == TRUE)
		{
			$data = array(
				'nama_mapel'	=> $this->input->post('nama'),
				'jenis'	=> $this->input->post('jenis'),
				'kode_mapel'=>$this->input->post('kode_mapel'),
				'jumlah_jam'=>$this->input->post('jumlah_jam'));
			if(IS_TEST === 'false'){
				$this->m_mapel->insert($data);
				$data['msg'] = "Data Berhasil Di Input Di Tabel";
			}else{
				$data['msg'] = "gagal menginput data";
			}
		}

		$data['title'] = 'TAMBAH MAPEL';
		$data['page_name'] = "manajemen/mapel/mapelAdd";
		
		$this->render_data($data);
	}

	function mapelEdit($id)
	{
		$data = array();

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('jenis','Jenis','required');
		$this->form_validation->set_rules('kode_mapel','Kode Mapel','required');
		$this->form_validation->set_rules('jumlah_jam','Jumlah Jam','required');

		if($this->form_validation->run() == TRUE )
		{
			$data = array(
				'nama_mapel'	=> $this->input->post('nama'),
				'jenis'	=> $this->input->post('jenis'),
				'kode_mapel'=>$this->input->post('kode_mapel'),
				'jumlah_jam'=>$this->input->post('jumlah_jam'));
			if(IS_TEST === 'false'){
				$this->m_mapel->update($id, $data);
				$data['msg'] = "Data Berhasil Di diupdate";
			}else{
				$data['msg'] = "Data gagal diupdate";
			}
		}

		$data['title'] = 'MAPEL EDIT';
		$data['page_name'] = "manajemen/mapel/mapelEdit";

		$data['mapel'] = $this->m_mapel->get_by_id($id);
		$this->render_data($data);

	}

	function mapelDel($id)
	{


		$data['title'] = 'MAPEL DELETE';
		$data['page_name'] = "manajemen/mapel/mapel";

		$this->m_mapel->delete($id);
		redirect(base_url() . 'admin/mapel','reload');
	}

	//============================================================================================

	function guru_mapel()
	{
		$url = base_url().'admin/guru_Mapel';
		$total_rows = $this->m_guruMapel->num_page();
		$per_page = 10;

		$config = paginate($url, $total_rows, $per_page, 3);
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();

		$this->m_guruMapel->limit = $per_page;
		if($this->uri->segment(3) == TRUE )
		{
			$this->m_guruMapel->offset = $this->uri->segment(3);
		}
		else
		{
			$this->m_guruMapel->offset = 0;
		}

		$data['no'] = $this->m_guruMapel->offset;
		$this->m_guruMapel->sort ='nama_mapel';
		$this->m_guruMapel->order = 'ASC';
		$data['guruMapel'] = $this->m_guruMapel->get_all();

		$data['title'] = 'GURU MAPEL';
		$data['page_name'] = "manajemen/guru_mapel/guruMapel";

		$this->render_data($data);
	}

	function guru_mapelAdd()
	{
		$data = array();

		$this->form_validation->set_rules('id_mapel','Nama Mapel','required');
		$this->form_validation->set_rules('id_guru','Nama Guru','required');
		$this->form_validation->set_rules('id_kelas','Nama Kelas','required');
		$this->form_validation->set_rules('thn_akademik','Tahun Akademik','required');

		if($this->form_validation->run() == TRUE)
		{
			$data = array(
					'id_mapel'			=> $this->input->post('id_mapel'),
					'id_guru'			=> $this->input->post('id_guru'),
					'id_kelas'			=> $this->input->post('id_kelas'),
					'tahun_akademik'	=> $this->input->post('thn_akademik'));
			if(IS_TEST === 'false'){
				$this->m_guruMapel->insert($data);
				$data['msg'] = "Data Berhasil Di Input Di Tabel";
			}else{
				$data['msg'] = "gagal menginput data";
			}
		}

		$data['title'] = 'TAMBAH GURU MAPEL';
		$data['page_name'] = "manajemen/guru_mapel/guru_mapelAdd";
		$data['mapel'] = $this->m_mapel->get();
		$data['guru'] = $this->m_guru->get();
		$data['kelas'] = $this->m_kelas->get();
		
		$this->render_data($data);
	}

	function guru_mapelEdit($id)
	{
		$data = array();

		$this->form_validation->set_rules('id_mapel','Nama Mapel','required');
		$this->form_validation->set_rules('id_guru','Nama Guru','required');
		$this->form_validation->set_rules('id_kelas','Nama Kelas','required');
		$this->form_validation->set_rules('thn_akademik','Tahun Akademik','required');

		if($this->form_validation->run() == TRUE )
		{
			$data = array(
					'id_mapel'			=> $this->input->post('id_mapel'),
					'id_guru'			=> $this->input->post('id_guru'),
					'id_kelas'			=> $this->input->post('id_kelas'),
					'tahun_akademik'	=> $this->input->post('thn_akademik'));
			if(IS_TEST==='false'){
				$this->m_guruMapel->update($id, $data);
				$data['msg'] = "Data Berhasil Di diupdate";
			}else{
				$data['msg'] = "Data gagal diupdate";
			}
		}


		$data['title'] = 'GURU EDIT';
		$data['page_name'] = "manajemen/guru_mapel/guru_mapelEdit";

		$data['mapelGuru'] = $this->m_guruMapel->get_by_id($id);
		$data['mapel'] = $this->m_mapel->get();
		$data['guru'] = $this->m_guru->get();
		$data['kelas'] = $this->m_kelas->get();
		$this->render_data($data);

	}

	function guru_mapelDel($id)
	{


		$data['title'] = 'GURU EDIT';

		$data['guru'] = $this->m_guruMapel->delete($id);
		redirect(base_url() . 'admin/guru_mapel','reload');
	}
//===============================================================================================

	function waktu_tidak_bersedia(){

	}

	//=============================================================================================

	function member(){

		$url = base_url().'admin/member';
		$total_rows = $this->m_member->num_page();
		$per_page = 10;

		$config = paginate($url, $total_rows, $per_page, 3);
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();

		$this->m_member->limit = $per_page;
		if($this->uri->segment(3) == TRUE )
		{
			$this->m_member->offset = $this->uri->segment(3);
		}
		else
		{
			$this->m_member->offset = 0;
		}

		$data['no'] = $this->m_member->offset;
		$this->m_member->sort ='nama';
		$this->m_member->order = 'ASC';
		$data['member'] = $this->m_member->get_all();

		$data['title'] = 'MEMBER';
		$data['page_name'] = "manajemen/member/member";

		$this->render_data($data);

	}

	function memberAdd(){

		$data = array();

		$this->form_validation->set_rules('nama','Nama Member','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('level','Level','required');

		if($this->form_validation->run() == TRUE)
		{
			$config['upload_path'] = './images/';
			$config['allowed_types'] = 'png|jpg';
			$config['max_size'] = 2048;
			$config['max_with'] = 1024;
			$config['max_height'] = 768;
			$config['file_name'] = time().$_FILES['image']['name'];

			if(!empty($_FILES['image']['name'])){

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('image')) {
					# code...
					$uploadImage = $this->upload->data();
					$picture = $uploadImage['file_name'];
				}else{
					#code
					$picture = '';
				}
			}else{
				#code
				$picture = '';
			}
			// array untuk insert member
			$data = array(
					'nama'			=> $this->input->post('nama'),
					'password'		=> $this->input->post('password'),
					'email'			=> $this->input->post('email'),
					'level'			=> $this->input->post('level'),
					'image'			=> $picture);
			// message
			if(IS_TEST === 'false'){
				$this->m_member->insert($data);
				$data['msg'] = "Data Berhasil Di Input Di Tabel";
			}else{
				$data['msg'] = "gagal menginput data";
			}
		}

		$data['title'] = 'TAMBAH MEMBER';
		$data['page_name'] = "manajemen/member/memberAdd";
		// render data
		$this->render_data($data);
	}

	function memberDel($id)
	{
		$data['title'] = 'Member';

		$data['guru'] = $this->m_member->delete($id);
		redirect(base_url() . 'admin/member','reload');
	}

	//=============================================================================================

	function tugas(){

	}

	//=================================================================================================

	function informasi(){

		$url = base_url().'admin/informasi';
		$total_rows = $this->m_informasi->num_page();
		$per_page = 10;

		$config = paginate($url, $total_rows, $per_page, 3);
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();

		$this->m_informasi->limit = $per_page;
		if($this->uri->segment(3) == TRUE )
		{
			$this->m_informasi->offset = $this->uri->segment(3);
		}
		else
		{
			$this->m_informasi->offset = 0;
		}

		$data['no'] = $this->m_informasi->offset;
		$this->m_informasi->sort ='tanggal';
		$this->m_informasi->order = 'ASC';
		$data['informasi'] = $this->m_informasi->get_all();

		$data['title'] = 'INFORMASI';
		$data['page_name'] = "manajemen/informasi/informasi";

		$this->render_data($data);

	}

	function informasiAdd(){

		$data = array();

		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('content','Content','required');
		$this->form_validation->set_rules('tanggal','Tanggal','required');

		if($this->form_validation->run() == TRUE)
		{
			$config['upload_path'] = './images/';
			$config['allowed_types'] = 'png|jpg';
			$config['max_size'] = 2048;
			$config['max_with'] = 1024;
			$config['max_height'] = 768;
			$config['file_name'] = time().$_FILES['image']['name'];

			if(!empty($_FILES['image']['name'])){

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('image')) {
					# code...
					$uploadImage = $this->upload->data();
					$picture = $uploadImage['file_name'];
				}else{
					#code
					$picture = '';
				}
			}else{
				#code
				$picture = '';
			}
			// array untuk insert member
			$data = array(
					'judul'			=> $this->input->post('judul'),
					'content'		=> $this->input->post('content'),
					'tanggal'		=> $this->input->post('tanggal'),
					'image'			=> $picture);
			// message
			if(IS_TEST === 'false'){
				$this->m_informasi->insert($data);
				$data['msg'] = "Data Berhasil Di Input Di Tabel";
			}else{
				$data['msg'] = "gagal menginput data";
			}
		}

		$data['title'] = 'TAMBAH INFOEMASI';
		$data['page_name'] = "manajemen/informasi/informasiAdd";
		// render data
		$this->render_data($data);
	}

	function informasiEdit($id)
	{
		$data = array();

		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('content','Content','required');
		$this->form_validation->set_rules('tanggal','Tanggal','required');

		if($this->form_validation->run() == TRUE )
		{

			$config['upload_path'] = './images/';
			$config['allowed_types'] = 'png|jpg';
			$config['max_size'] = 2048;
			$config['max_with'] = 1024;
			$config['max_height'] = 768;
			$config['file_name'] = time().$_FILES['image']['name'];

			if(!empty($_FILES['image']['name'])){

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('image')) {
					# code...
					$uploadImage = $this->upload->data();
					$picture = $uploadImage['file_name'];
				}else{
					#code
					$picture = '';
				}
			}else{
				#code
				$picture = '';
			}
			// array untuk insert member
			$data = array(
					'judul'			=> $this->input->post('judul'),
					'content'		=> $this->input->post('content'),
					'tanggal'		=> $this->input->post('tanggal'),
					'image'			=> $picture);
			// message
			if(IS_TEST==='false'){
				$this->m_informasi->update($id, $data);
				$data['msg'] = "Data Berhasil Di diupdate";
			}else{
				$data['msg'] = "Data gagal diupdate";
			}
		}


		$data['title'] = 'informasi';
		$data['page_name'] = "manajemen/informasi/informasiEdit";

		$data['informasi'] = $this->m_informasi->get_by_id($id);
		#render data
		$this->render_data($data);

	}

	function informasiDel($id)
	{
		$data['title'] = 'Informasi';

		$this->m_informasi->delete($id);
		redirect(base_url() . 'admin/informasi','reload');
	}

	//================================================================================================
	
	function penjadwalan(){
		
		$data = array();
		// mengambil nama dari form untuk form validation
		$this->form_validation->set_rules('thn_akademik', 'Tahun Akademik', 'required');
		$this->form_validation->set_rules('populasi', 'Populasi', 'required');
		$this->form_validation->set_rules('crossOver', 'crossOver', 'required');
		$this->form_validation->set_rules('mutasi', 'Mutasi', 'required');
		$this->form_validation->set_rules('generasi','Generasi', 'required');
		// buat kondisi untuk form validation
		if($this->form_validation->run() == true){
			// deklarasi variabel
			$thn_akademik = $this->input->post('thn_akademik');
			$populasi = $this->input->post('populasi');
			$crossOver = $this->input->post('crossOver');
			$mutasi = $this->input->post('mutasi');
			$generasi = $this->input->post('generasi');
			// kondisi untuk mengecek tahun akademik
			$guru_mapel = $this->db->query("Select * from guru_mapel where tahun_akademik = '$thn_akademik'");
			if ($guru_mapel->num_rows() == 0) {
				# message untuk tahun akademik jika tidak ada di database
				$data['msg'] = 'Tahun Akademik '.$thn_akademik.' tidak ada di tabel';
			}else{
				//genetika
				$genetika = new Genetika($thn_akademik, $populasi, $mutasi, $crossOver);
				$data['msg'] = $genetika->AmbilData();
			}

		}

		$data['title'] = 'PENJADWALAN';
		$data['page_name'] = "manajemen/penjadwalan/penjadwalan";

		$this->render_data($data);
	}
}

?>
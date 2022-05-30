<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Mahasiswa_model', 'm');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));

		if ($this->session->userdata('roles') != "3") {
			redirect(base_url());
		}
	}

	public function index()
	{
		$queryGetDataDosen  = $this->m->getDataDosen();
		$queryGetDataMahasiswa  = $this->m->getDataMahasiswa();
		$data = array(
			'dosen' => $queryGetDataDosen,
			'mahasiswa' => $queryGetDataMahasiswa,
		);
		// print_r($data);
		// die();
		$this->load->view('Template/header');
		$this->load->view('Admin/V_mahasiswa', $data);
		$this->load->view('Template/footer');
	}

	public function getDataDosen()
	{
		$queryGetDataDosen  = $this->m->getDataDosen();
		echo json_encode($queryGetDataDosen);
	}

	public function delete($nim)
	{
		$this->m->hapususer($nim);
		redirect('Admin/Mahasiswa');

	}


	public function ViewTambah($nim)
	{
		$data['mahasiswa'] = $this->m->getById($nim);
		$this->load->view('Template/header');
		$this->load->view('Admin/TambahPerwalian', $data);
		$this->load->view('Template/footer');
	}

	public function TambahMahasiswa()
	{
		$nim = $this->input->post('nim');
		$nidn = $this->input->post('nidn');

		$data = array(
			'nim' => $nim,
			'nidn' => $nidn,
		);

		$sts = array(
			'nim' => $nidn,
			'status_perwalian' => 1,
		);
		// print_r($data);
		// die;

		$this->m->insertData($data, 'perwalian');
		$this->m->ubahStatus($sts, 'users');

		// $status = 1;

		// $this->m->status($status,'users',$nim);


		// $status = 1;
		// $this->m->status($status,$nim);
		redirect('Admin/Mahasiswa');
	}

	public function sessions()
	{
		print_r($this->session->userdata());
	}

	
}

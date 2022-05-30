<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dosen/Dashboard_model', 'm');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper(array('form', 'url', 'string'));

		if ($this->session->userdata('roles') != "2") {
			redirect(base_url());
		}
	}

	public function index()
	{
		$id_dosen = $this->session->userdata('nidn');
		$queryMahasiswaPerwalian['perwalian'] = $this->m->getMahasiswaPerwalian($id_dosen);
		$this->load->view('Template/header');
		$this->load->view('Dosen/DashboardDosen', $queryMahasiswaPerwalian);
		$this->load->view('Template/footer');
	}

	public function ViewTambahCatatan($nim)
	{

		$mahasiswa = $this->m->getId($nim);
		$chart = $this->m->getChart($nim);
		$getperwalian = $this->m->getPerwalianCatatan($nim);
		$getcatatan = $this->m->getCatatan($getperwalian);
		$data = array(
			'mahasiswa' => $mahasiswa,
			'chart' => $chart,
			'catatan' => $getcatatan,
		);
		$this->load->view('Template/header');
		$this->load->view('Dosen/V_TambahCatatan', $data);
		$this->load->view('Template/footer');
	}

	public function ViewJadwal()
	{
		$nidn = $this->session->userdata('nidn');
		$jadwal['jadwal'] = $this->m->getJadwal($nidn);
		$this->load->view('Template/header');
		$this->load->view('Dosen/Jadwal', $jadwal);
		$this->load->view('Template/footer');
	}

	public function TambahCatatan($id_perwalian)
	{
		$catatan = $this->input->post('catatan');
		$data = array(
			'id_perwalian' => $id_perwalian,
			'catatan' => $catatan,
		);

		$this->m->tambahcatatan($data);
		redirect('Dosen/Dashboard/');
	}


	public function HapusCatatan($id_perwalian)
	{
		$data = array(
			'id_perwalian' => $id_perwalian,
		);
		$this->m->HapusCatatan($data);
		redirect('Dosen/Dashboard/');
	}

	public function sessions()
	{
		print_r($this->session->userdata());
	}
}

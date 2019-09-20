<?php
class Site extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			redirect('auth');
		}
	}
	public function index($id = 1)
	{
		$data['id_kategori'] = $id;

		$this->load->view('templates/header');
		$this->load->view('site/index', $data);
		$this->load->view('templates/footer');
		$this->load->view('site/index_vue', $data);
	}
	public function create($id_kategori)
	{
		$data['id_kategori'] = $id_kategori;
		$this->load->view('templates/header');
		$this->load->view('site/create', $data);
	}
	public function uploadfiles($id_kategori)
	{
		$data['id_kategori'] = $id_kategori;
		$this->load->view('templates/header');
		$this->load->view('site/uploadfiles',$data);
	}
	public function update($id)
	{
		$data['id'] = $id;
		$this->load->view('templates/header');
		$this->load->view('site/update', $data);
	}
	public function data_pilihan()
	{
		$this->load->view('templates/header');
		$this->load->view('site/data_urusan');
		$this->load->view('templates/footer');
		$this->load->view('site/urusan_pilihan_vue');
	}
	public function data_wajib()
	{
		$this->load->view('templates/header');
		$this->load->view('site/data_urusan_wajib');
		$this->load->view('templates/footer');
		$this->load->view('site/urusan_wajib_vue');
	}
	public function data_ditail($id)
	{
		$data['id'] = $id;
		$this->load->view('templates/header');
		$this->load->view('site/ditail');
		$this->load->view('templates/footer');
		$this->load->view('site/ditail_vue', $data);
	}
}

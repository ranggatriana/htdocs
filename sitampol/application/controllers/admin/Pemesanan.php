<?php
defined('BASEPATH') OR exit('No script access allowed');
/**
 * 
 */
class Pemesanan extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->model("pemesanan_model");
		$this->load->library('form_validation');
				# code...
	}

	public function index()
	{
		$data["view_pemesanan"] = $this->pemesanan_model->getAll();
		$this->load->view("admin/pemesanan/list",$data);
	}
	public function add()
	{
		$tabel_pemesanan = $this->pemesanan_model;
		$validation = $this->form_validation;
		$validation->set_rules($tabel_pemesanan->rules());

		if ($validation->run()) {
			$tabel_pemesanan->save();
			$this->session->set_flashdata('success','Berhasil disimpan');
						# code...
		}

		$this->load->view("admin/pemesanan/new_form");
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('admin/pemesanan');

		$tabel_pemesanan = $this->pemesanan_model;
		$validation = $this->form_validation;
		$validation->set_rules($pemesanan->rules());
		
		if ($validation->run()) {
			$tabel_pemesanan->update();
			$this->session->set_flashdata('success', 'Berhasil Disimpan');
		}

		$data["tabel_pemesanan"] = $tabel_pemesanan->getById($id);
		if (!$data["tabel_pemesanan"]) show_404();

		$this->load->view("admin/pemesanan/edit_form", $data); 
	}

	public function delete($id=null)
	{
		if (!isset($id)) show_404();

		if ($this->pemesanan_model->delete($id)) {
			redirect(site_url('admin/pemesanan'));
			# code...
		}
		
	}
}
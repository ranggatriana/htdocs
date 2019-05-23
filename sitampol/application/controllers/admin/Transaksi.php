<?php
defined('BASEPATH') OR exit('No script access allowed');
/**
 * 
 */
class Transaksi extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->model("transaksi_model");
		$this->load->library('form_validation');
				# code...
	}

	public function index()
	{
		$data["view_transaksi"] = $this->transaksi_model->getAll();
		$this->load->view("admin/transaksi/list",$data);
	}
	public function add()
	{
		$tabel_transaksi = $this->transaksi_model;
		$validation = $this->form_validation;
		$validation->set_rules($tabel_transaksi->rules());

		if ($validation->run()) {
			$tabel_transaksi->save();
			$this->session->set_flashdata('success','Berhasil disimpan');
						# code...
		}

		$this->load->view("admin/transaksi/new_form");
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('admin/transaksi');

		$tabel_transaksi = $this->transaksi_model;
		$validation = $this->form_validation;
		$validation->set_rules($transaksi->rules());
		
		if ($validation->run()) {
			$tabel_transaksi->update();
			$this->session->set_flashdata('success', 'Berhasil Disimpan');
		}

		$data["tabel_transaksi"] = $tabel_transaksi->getById($id);
		if (!$data["tabel_transaksi"]) show_404();

		$this->load->view("admin/transaksi/edit_form", $data); 
	}

	public function delete($id=null)
	{
		if (!isset($id)) show_404();

		if ($this->transaksi_model->delete($id)) {
			redirect(site_url('admin/transaksi'));
			# code...
		}
		
	}
}
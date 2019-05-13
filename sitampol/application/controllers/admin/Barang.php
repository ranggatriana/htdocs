<?php
defined('BASEPATH') OR exit('No script access allowed');
/**
 * 
 */
class Barang extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->model("barang_model");
		$this->load->library('form_validation');
				# code...
	}

	public function index()
	{
		$data["tabel_barang"] = $this->barang_model->getAll();
		$this->load->view("admin/barang/list",$data);
	}
	public function add()
	{
		$barang = $this->barang_model;
		$validation = $this->form_validation;
		$validation->set_rules($barang->rules());

		if ($validation->run()) {
			$barang->save();
			$this->session->set_flashdata('success','Berhasil disimpan');
						# code...
		}

		$this->load->view("admin/barang/new_form");
	}

	public function delete($id=null)
	{
		if (!isset($id)) show_404();

		if ($this->barang_model->delete($id)) {
			redirect(site_url('admin/barang'));
			# code...
		}
		
	}
}
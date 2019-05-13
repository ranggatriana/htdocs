<?php
defined('BASEPATH') OR exit('No script access allowed');
/**
 * 
 */
class Kategori extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
		$this->load->model("kategori_model");
		$this->load->library('form_validation');
				# code...
	}

	public function index()
	{
		$data["kategori"] = $this->kategori_model->getAll();
		$this->load->view("admin/kategori/list",$data);
	}
	public function add()
	{
		$kategori = $this->kategori_model;
		$validation = $this->form_validation;
		$validation->set_rules($kategori->rules());

		if ($validation->run()) {
			$kategori->save();
			$this->session->set_flashdata('success','Berhasil disimpan');
						# code...
		}

		$this->load->view("admin/kategori/new_form");
	}

	public function delete($id=null)
	{
		if (!isset($id)) show_404();

		if ($this->kategori_model->delete($id)) {
			redirect(site_url('admin/kategori'));
			# code...
		}
		
	}
}
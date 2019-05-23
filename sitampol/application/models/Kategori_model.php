<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model
{	
	private $_table = "kategori";
	
	public $id_kategori;
	public $nama_kategori;

	public function rules()
	{
		return [
			['field'=>'nama_kategori',
			'label'=>'Name',
			'rules'=>'required'],
		];	# code...
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_kategori" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();		
		$this->nama_kategori = $post["nama_kategori"];
		$this->db->insert($this->_table,$this); 
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_kategori = $post["id"];
		$this->nama_kategori = $post["nama_kategori"];
		
		$this->db->update($this->_table, $this, array('id_kategori' => $post['id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("id_kategori" => $id));
	}
}
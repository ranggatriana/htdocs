<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model
{	
	private $_table = "tabel_barang";
	private $_view = "view_barang";
	
	public $id_barang;
	public $nama_barang;
	public $harga_barang;
	public $stok;
	public $id_kategori;

	public function rules()
	{
		return [
			['field'=>'nama_barang',
			'label'=>'nama_barang',
			'rules'=>'required'],

			['field'=>'harga_barang',
			'label'=>'harga_barang',
			'rules'=>'required']

		];	# code...
	}

	public function getAll()
	{
		return $this->db->get($this->_view)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_barang" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();		
		$this->nama_barang = $post["nama_barang"];
		$this->harga_barang = $post["harga_barang"];
		$this->id_kategori = $post["id_kategori"];
		$this->stok = $post["stok"];
		$this->db->insert($this->_table,$this); 
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_barang = $post["id"];
		$this->nama_barang = $post["nama_barang"];
		$this->harga_barang = $post["harga_barang"];
		$this->stok = $post["stok"];
		$this->$id_kategori = $post["id_kategori"];
		
		$this->db->update($this->_table,$this, array('id_barang' =>$post['id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("id_barang" => $id));
	}
}
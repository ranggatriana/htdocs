<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan_model extends CI_Model
{	
	private $_table = "tabel_pemesanan";
	private $_view  = "view_pemesanan";
	
	public $id_pemesanan;
	public $id_pelanggan;
	public $nama_pelanggan;
	public $id_barang;
	public $nama_barang;
	public $harga_barang;
	public $jumlah_pesan;

	public function rules()
	{
		return [
			['field'=>'nama_pelanggan',
			'label'=>'Name',
			'rules'=>'required'],
		];	# code...
	}

	public function getAll()
	{
		return $this->db->get($this->_view)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_pemesanan" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();		
		$this->id_pelanggan = $post["id_pelanggan"];
		$this->id_barang = $post["id_barang"];
		$this->jumlah_pesan = $post["jumlah_pesan"];
		$this->db->insert($this->_table,$this); 
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_pemesanan = $post["id"];
		$this->id_barang = $post["id_barang"];
		$this->jumlah_pesan = $post["jumlah_pesan"];
		
		$this->db->update($this->_table, $this, array('id_pemesanan' => $post['id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("id_pemesanan" => $id));
	}
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{	
	private $_table = "tabel_transaksi";
	private $_view = "view_transaksi";
	
	public $id_transaksi;
	public $tanggal_transaksi;
	public $id_pelanggan;
	public $nama_pelanggan;
	public $id_barang;
	public $nama_barang;
	public $harga_barang;
	public $jumlah_barang;
	public $total;
	

	public function rules()
	{
		return [
			['field'=>'nama',
			'label'=>'nama',
			'rules'=>'required'],
		];	# code...
	}

	public function getAll()
	{
		return $this->db->get($this->_view)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_transaksi" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();		
		$this->tanggal_transaksi = $post["tanggal_transaksi"];
		$this->id_pelanggan = $post["id_pelanggan"];
		$this->id_barang = $post["id_barang"];
		$this->jumlah_barang = $post["jumlah_barang"];
		$this->total = $post["tanggal_transaksi"];

		$this->db->insert($this->_table,$this); 
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_transaksi = $post["id"];
		$this->tanggal_transaksi = $post["tanggal_transaksi"];
		$this->id_pelanggan = $post["id_pelanggan"];
		$this->id_barang = $post["id_barang"];
		$this->jumlah_barang = $post["jumlah_barang"];
		$this->total = $post["tanggal_transaksi"];
		
		$this->db->update($this->_table, $this, array('id_transaksi' => $post['id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("id_transaksi" => $id));
	}
}
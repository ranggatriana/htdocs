<?php 


class Register_mdl extends CI_Model{
	public function register($datanya){
		return $this->db->insert('tabel_pelanggan',$datanya);
	}
	
	public function get_user($username){
		return $this->db->get_where('tabel_pelanggan',$username)->result_array();
	}
}
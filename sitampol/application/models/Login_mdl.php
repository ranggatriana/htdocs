<?php 

class Login_mdl extends CI_Model{
	
	public function get_user($mau_login){
		return $this->db->get_where('tabel_pelanggan',$mau_login)->result_array();
	}
}
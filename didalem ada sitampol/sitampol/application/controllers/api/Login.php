<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Login extends REST_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Login_mdl','login');
	}
	
	public function index_post(){
		$post = $this->input->post();
		
		$Usernamenya = array(
			'username' => $post['username']
		);
		
		$cekEmailnya = $this->login->get_user($Usernamenya);
		
		
		if(sizeof($cekEmailnya) == 1){
			
			if (password_verify($post['password'], $cekEmailnya[0]['password'])){
					$this->response([
						'kode' => '1',
            'pesan' => 'Sukses Login user'
					]);//,HTTP_OK);							
			} else {
			$this->response([
				'kode' => '2',
				'pesan' => 'password anda salah, coba login lagi'
			]);//,HTTP_NOT_FOUND);				
			}
			
		} else {
			$this->response([
				'kode' => '3',
				'pesan' => 'anda belum terdaftar, silahkan mendaftar dulu'
			]);//,HTTP_NOT_FOUND);
		}
	}
}

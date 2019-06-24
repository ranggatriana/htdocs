<?php 

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Register extends REST_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Register_mdl','reg');
	}
	
	public function index_post(){
		$post = $this->input->post();
		
		$data = array (
			'nama_pelanggan' => $post['nama'],
			'rt' => $post['rt'],
			'rw' => $post['rw'],
			'desa' => $post['desa'],
			'kecamatan' => $post['kecamatan'],
			'kota' => $post['kota'],
			'username' => $post['username'],
			'password' => $post['password']
		);
		$helo = array('username' => $post['username']);
		$cekUsername = $this->reg->get_user($helo);
		
		if(sizeof($cekUsername) > 0 ){
			$this->response([
				'status' => 0,
				'pesan' => 'username sudah pernah dipakai'
			]);//,HTTP_BAD_REQUEST);			
		} else {
			$registercoy = $this->reg->register($data);
			
			if(!$registercoy){
				$this->response([
					'status' => 1,
					'pesan' => 'registrasi gagal'
				]); //,HTTP_BAD_REQUEST);
			} else {
				$this->response([
					'status' => 2,
					'pesan' => 'registrasi berhasil'
				]);//, REST_Controller::HTTP_CREATED);
			}			
		}
	}

	public function halo(){
		$halo =  password_hash('asldkfj', PASSWORD_DEFAULT);
		echo $halo;
	}
} 
<?php
/**
 * 
 */
class Overview extends CI_Controller
{
  
 public function __construct()
  {
    # code...
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('admin/overview');
  }
}
?>
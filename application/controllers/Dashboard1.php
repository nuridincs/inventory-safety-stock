<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard1 extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_barang_return');
  }

  // function index()
  // {
  //   $this->load->view('dashboard1');
  // }

  function getDetailById($id)
  {
    $result = $this->M_barang_return->getDataByID('app_barang_retur', 'receipt_number', $id);
    $this->load->view('detail_barang', $result);
  }

}

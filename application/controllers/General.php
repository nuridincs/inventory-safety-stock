<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('M_general');
  }

  function index()
  {
    $data['content'] = 'content/home';
    $this->load->view('template', $data);
  }

  function listBarang()
  {
    $data['content'] = 'content/barang/list';
    $data['barang'] = $this->M_general->getData('app_barang');
    $this->load->view('template', $data);
  }

}

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
    $data['content'] = 'content/barang_masuk/list';
    $data['barang'] = $this->M_general->getDataBarang('barang_masuk', 'app_barang', 'app_barang_masuk');
    $data['cabang'] = $this->M_general->getData('app_cabang');
    $this->load->view('template', $data);
  }

  function submitRequestBarang()
  {
    $request = $this->input->post('data');
    $result = $this->unserializeForm($request);
    $this->M_general->execute('save', 'app_barang_masuk', $result);
  }

  function unserializeForm($request) {
    $get = explode('&', $request);

    foreach ($get as $key => $value) {
      $result[substr($value, 0 , strpos($value, '='))] =  substr(
        $value,
        strpos( $value, '=' ) + 1
      );
    }

    return $result;
  }

  function VerifikasiBarang()
  {
    $request = $this->input->post('data');
    $this->M_general->execute('update', 'verifikasi_barang', $request);
  }

  function SiapkanBarang()
  {
    $request = $this->input->post('data');
    $this->M_general->execute('update', 'siapkan_barang', $request);
  }

}

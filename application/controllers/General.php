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
    $data['content'] = 'content/list_master_barang';
    $data['barang'] = $this->M_general->getData('app_barang');
    $this->load->view('template', $data);
  }

  function listBarangMasuk()
  {
    $data['content'] = 'content/barang_masuk/list';
    $data['barang'] = $this->M_general->getJoinData('kode_jenis_barang', 'app_barang', 'app_barang_masuk');
    $data['cabang'] = $this->M_general->getData('app_cabang');
    $this->load->view('template', $data);
  }

  function listBarangKeluar()
  {
    $data['content'] = 'content/list_barang_keluar';
    $data['barang'] = $this->M_general->getJoinData('kode_jenis_barang', 'app_barang_masuk', 'app_barang_keluar');
    $this->load->view('template', $data);
  }

  function laporan()
  {
    $data['content'] = 'content/laporan';
    $data['barang'] = $this->M_general->getJoinData('kode_jenis_barang', 'app_barang_masuk', 'app_barang_keluar');
    $this->load->view('template', $data);
  }

  function listUser()
  {
    $data['content'] = 'content/list_user';
    $data['user'] = $this->M_general->getJoinData('id_users_role', 'app_users', 'app_role');
    $data['role'] = $this->M_general->getData('app_role');
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

  function getDtl()
  {
    $request = $this->input->post('data');
    $result = $this->M_general->getDataByID($request['table'], $request['idName'], $request['id']);

    echo json_encode($result);
  }

  function getDtlBarangMasuk()
  {
    $request = $this->input->post('data');
    $result = $this->M_general->getDataByID($request['table'], $request['idName'], $request['id']);
    $getMasterBarang = $this->M_general->getData('app_barang');
    $getCabang = $this->M_general->getData('app_cabang');

    $_view = '<div class="form-group">';
      $_view .= '<label for="kode_jenis_barang">Kode Jenis Barang</label>';
      $_view .= '<select name="update_kode_jenis_barang_lama" class="form-control" id="update_kode_jenis_barang_lama">';
        foreach($getMasterBarang as $barang) {
          if ($result['kode_jenis_barang'] == $barang->kode_jenis_barang) {
            $_view .= '<option value="'.$barang->kode_jenis_barang.'" selected>'.$barang->kode_jenis_barang.'</option>';
          } else {
            $_view .= '<option value="'.$barang->kode_jenis_barang.'">'.$barang->kode_jenis_barang.'</option>';
          }
        }
      $_view .= '</select>';
    $_view .= '</div>';

    $_view .= '<div class="form-group">';
      $_view .= '<label for="cabang">Cabang</label>';
      $_view .= '<select name="update_cabang" class="form-control" id="update_cabang">';
        foreach($getCabang as $cabang) {
          if ($result['id_cabang'] == $cabang->id) {
            $_view .= '<option value="'.$cabang->id.'" selected>'.$cabang->nama_cabang.'</option>';
          } else {
            $_view .= '<option value="'.$cabang->id.'">'.$cabang->nama_cabang.'</option>';
          }
        }
      $_view .= '</select>';
    $_view .= '</div>';

    $_view .= '<div class="form-group">';
      $_view .= '<label for="jumlah">Jumlah Barang</label>';
      $_view .= '<input type="number" value="'.$result['jumlah_barang'].'" class="form-control" name="update_jumlah_barang" placeholder="Masukan Jumlah Barang" id="update_jumlah_barang">';
    $_view .= '</div>';

    $_view .= '<div class="form-group">';
      $_view .= '<label for="keterangan">Keterangan</label>';
      $_view .= '<textarea class="form-control" name="update_keterangan" id="update_keterangan">'.$result['keterangan'].'</textarea>';
    $_view .= '</div>';

    echo $_view;
  }

  function generateData($request)
  {
    $data = [
      'nama' => $request['nama'],
      'email' => $request['email'],
      'password' => md5($request['password']),
      'id_users_role' => $request['id_users_role'],
    ];

    return $data;
  }

  function ActionAdd()
  {
    $role = $this->input->post('role');
    $request = $this->input->post('data');
    $table = $this->input->post('table');

    if (!empty($role) == 'users') {
      $request = $this->generateData($request);
    }

    $this->M_general->execute('save', $table, $request);
  }

  function ActionUpdate()
  {
    $request = $this->input->post('data');
    $table = $this->input->post('table');
    $id_name = $this->input->post('id_name');
    $id = $this->input->post('id');

    $data = [
      'id' => $id,
      'request' => $request,
      'table' => $table,
      'id_name' => $id_name,
    ];
    $this->M_general->execute('update', $id_name, $data);
  }

  function ActionDelete()
  {
    $request = $this->input->post('data');
    $table = $this->input->post('table');
    $this->M_general->execute('delete', $table, $request);
  }

}

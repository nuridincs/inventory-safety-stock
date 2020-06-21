<?php

class M_general extends CI_Model {

  public function getData($table)
  {
    $query = $this->db->get($table);

    return $query->result();
  }

  public function getDataByID($table, $idName, $id) {
    $query = $this->db->select('*')
              ->from($table)
              ->where($idName, $id)
              ->get();

    return $query->result_array()[0];
  }

  public function getJoinData($uniqid, $table1, $table2)
  {
    $query = $this->db->select('*')
            ->from($table1)
            ->join($table2, $table2.'.'.$uniqid.'='.$table1.'.'.$uniqid)
            ->get();

    return $query->result();
  }

  public function execute($action, $type, $data)
  {
    if($action == 'save') {
      if ($type == 'app_barang_masuk') {
        if ($data['jenis_barang'] == 1) { //update stok barang lama
          $resultBarang = $this->getDataByID($type, 'kode_jenis_barang', $data['kode_jenis_barang_lama']);

          $dataBarang = [
            'kode_jenis_barang' => $data['kode_jenis_barang_lama'],
            'id_cabang' => $data['cabang'],
            'status_permintaan'  => 'verifikasi',
            'jumlah_barang'  => $resultBarang['jumlah_barang'] + $data['jumlah_barang'],
            'status_barang'  => 2,
            'keterangan'  => $data['keterangan'],
          ];

          $this->execute('update', $type, $dataBarang);
        } else {
          $dataBarang = [ //insert barang baru
            'kode_jenis_barang' => $data['kode_jenis_barang_baru'],
            'id_cabang' => $data['cabang'],
            'status_permintaan'  => 'verifikasi',
            'jumlah_barang'  => $data['jumlah_barang'],
            'status_barang'  => 2,
            'keterangan'  => $data['keterangan'],
          ];

          $this->db->insert('app_barang', array('kode_jenis_barang' => $data['kode_jenis_barang_baru'], 'minimum_stok' => 0));
          $this->db->insert($type, $dataBarang);
        }
      } elseif ($type == 'app_barang_keluar') {
        $this->db->insert($type, $data);
      } elseif ($type == 'app_barang') {
        $this->db->insert($type, $data);
      } else {
        $this->db->insert($type, $data);
      }
    } elseif ($action == 'update') {
      if ($type == 'app_barang_masuk') {
        $this->db->where('kode_jenis_barang', $data['kode_jenis_barang']);
        $this->db->update($type, $data);
      } elseif ($type == 'verifikasi_barang') {
        $this->db->where('kode_jenis_barang', $data);
        $this->db->update('app_barang_masuk', array('status_permintaan' => 'sedang_diproses', 'status_barang' => 3));
      } elseif ($type == 'siapkan_barang') {
        $resultBarang = $this->getDataByID('app_barang_masuk', 'kode_jenis_barang', $data['id']);
        $formData = [
          'status_permintaan' => 'tersedia',
          'status_barang' => 1,
          'jumlah_barang' => $resultBarang['jumlah_barang'] - $data['jumlah_barang'],
        ];

        $barangKeluar = [
          'kode_jenis_barang' => $data['id'],
          'jumlah_barang_keluar' => $data['jumlah_barang'],
          'tanggal_keluar' => $data['tanggal_keluar'],
        ];

        $this->execute('save', 'app_barang_keluar', $barangKeluar);

        $this->db->where('kode_jenis_barang', $data['id']);
        $this->db->update('app_barang_masuk', $formData);
      } elseif ($type == 'master_barang') {
        $this->db->where('kode_jenis_barang', $data['id']);
        $this->db->update('app_barang', array('minimum_stok' => $data['minimum_stok']));
      } else {
        $this->db->where($type, $data['id']);
        $this->db->update($data['table'], $data['request']);
      }
    } elseif ($action == 'delete') {
      $this->db->where($data['idName'], $data['id']);
      $this->db->delete($type);
    }
  }
}
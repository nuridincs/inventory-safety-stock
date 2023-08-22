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

  public function getInvoiceData($id)
  {
    $query = $this->db->select('*')
            ->from('app_barang_masuk')
            ->join('app_barang_keluar', 'app_barang_keluar.kode_jenis_barang=app_barang_masuk.kode_jenis_barang')
            ->where('app_barang_masuk.kode_jenis_barang', $id)
            ->get();

    return $query->result();
  }

  public function getAvilabilityBunkNumber() {
    $query = "
        SELECT
            bunk_number,
            formatted_bunk_number,
            totalBunkNumber,
            availability
        FROM (
          SELECT
            bunk_number,
            CONCAT('Bunk-', bunk_number) AS formatted_bunk_number,
            COUNT(bunk_number) AS totalBunkNumber,
            CASE
              WHEN COUNT(bunk_number) = 8 THEN 'not-available'
              ELSE 'available'
            END AS availability
          FROM app_barang_retur
          GROUP BY bunk_number
        ) AS subquery
        WHERE availability = 'available'
        ORDER BY bunk_number ASC
        LIMIT 1;
      ";

    return $this->db->query($query)->row();
  }

  public function getLastBunkNumber() {
    $query = "
        SELECT
          bunk_number
        FROM
          app_barang_retur
        GROUP BY
          bunk_number
        ORDER BY
          bunk_number DESC
        LIMIT 1;
    ";

    return $this->db->query($query)->row();
  }

  public function checkKodeBarang($table, $idName, $id) {
    $query = $this->db->select('*')
              ->from($table)
              ->where($idName, $id)
              ->get();

    return $query;
  }

  public function getJoinData($uniqid, $table1, $table2)
  {
    $query = $this->db->select('*')
            ->from($table1)
            ->join($table2, $table2.'.'.$uniqid.'='.$table1.'.'.$uniqid)
            ->get();

    return $query->result();
  }

  public function getJoinDataNew($uniqidTbl1, $uniqidTbl2, $table1, $table2)
  {
    $query = $this->db->select('*')
            ->from($table1)
            ->join($table2, $table2.'.'.$uniqidTbl2.'='.$table1.'.'.$uniqidTbl1, 'left')
            ->get();
    // echo $this->db->last_query();die;

    return $query->result();
  }

  public function getBarangReturn($selectedFilter = null) {
    $query = "
      SELECT
          *, app_barang_retur.id as id, app_customers.nama as nama_customer, app_customers.id as id_customer, app_staff.nama as nama_staff, app_staff.id as id_staff
        FROM
          `app_barang_retur`
        LEFT JOIN `app_staff` ON
          `app_staff`.`id` = `app_barang_retur`.`id_staff`
        LEFT JOIN `app_customers` ON
          `app_customers`.`id` = `app_barang_retur`.`id_customer`
      ";

      if (isset($selectedFilter)) {
        if ($selectedFilter == 'today') {
          $query .= " WHERE DATE(app_barang_retur.created_at) = CURDATE()";
        } elseif ($selectedFilter == 'current_month') {
          $query .= " WHERE MONTH(app_barang_retur.created_at) = MONTH(CURDATE()) AND YEAR(app_barang_retur.created_at) = YEAR(CURDATE())";
        }
      }

    return $this->db->query($query)->result();
  }

  public function getDataInterval2Day() {
    $query = "
      SELECT *
      FROM app_barang_retur
      WHERE created_at < DATE_SUB(CURDATE(), INTERVAL 2 DAY);
    ";

    return $this->db->query($query)->result();
  }

  public function getLaporan($uniqid, $table1, $table2)
  {
    $query = $this->db->select('app_barang_masuk.kode_jenis_barang, app_barang_masuk.jumlah_barang, app_cabang.nama_cabang, app_barang_masuk.tanggal_masuk, app_barang_keluar.tanggal_keluar, app_barang_keluar.jumlah_barang_keluar')
            ->from($table1)
            ->join($table2, $table2.'.'.$uniqid.'='.$table1.'.'.$uniqid, 'left')
            ->join('app_cabang', 'app_cabang.id='.$table1.'.id_cabang')
            ->get();

    // echo $this->db->last_query();die;

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
            'keterangan'  => str_replace('%20', ' ', $data['keterangan']),
          ];

          $this->execute('update', $type, $dataBarang);
        } else {
          $dataBarang = [ //insert barang baru
            'kode_jenis_barang' => $data['kode_jenis_barang_baru'],
            'id_cabang' => $data['cabang'],
            'status_permintaan'  => 'verifikasi',
            'jumlah_barang'  => $data['jumlah_barang'],
            'status_barang'  => 2,
            'keterangan'  => str_replace('%20', ' ', $data['keterangan']),
          ];


          $this->db->insert('app_barang', array('kode_jenis_barang' => $data['kode_jenis_barang_baru'], 'minimum_stok' => 0));
          $this->db->insert($type, $dataBarang);
        }
      } elseif ($type == 'app_barang_keluar') {
        $this->db->insert($type, $data);
      } elseif ($type == 'app_barang') {
        $dataBarangMasuk = [
          'kode_jenis_barang' => $data['kode_jenis_barang'],
          'id_cabang' => 6,
          'jumlah_barang' => 0,
          'status_barang' => 0,
          'status_permintaan' => 'tidak_tersedia',
        ];

        $this->db->insert($type, $data);
        $this->db->insert('app_barang_masuk', $dataBarangMasuk);
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
      } elseif($data['table'] == 'app_users') {

        $dataUser = [
          'nama' => $data['request']['nama'],
          'email' => $data['request']['email'],
        ];

        if ($data['request']['password'] != '') {
          $dataUser = [
            'nama' => $data['request']['nama'],
            'email' => $data['request']['email'],
            'password' => md5($data['request']['password']),
          ];
        }

        $this->db->where($type, $data['id']);
        $this->db->update($data['table'], $dataUser);
      } else {
        $this->db->where($type, $data['id']);
        $this->db->update($data['table'], $data['request']);
      }
    } elseif ($action == 'delete') {
      if ($type == 'app_barang') {
        $this->db->where('kode_jenis_barang', $data['id']);
        $this->db->delete('app_barang_keluar');

        $this->db->where('kode_jenis_barang', $data['id']);
        $this->db->delete('app_barang_masuk');

        $this->db->where('kode_jenis_barang', $data['id']);
        $this->db->delete('app_barang');
      } else {
        $this->db->where($data['idName'], $data['id']);
        $this->db->delete($type);
      }
    }
  }
}
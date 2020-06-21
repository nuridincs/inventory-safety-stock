<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Barang Masuk</title>
</head>
<body>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Barang Masuk</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body table-responsive p-0">
              <table id="example2" class="table table-hover text-nowrap">
                <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Kode Jenis Barang</th>
                  <th>Jumlah Barang</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 0;
                  foreach($barang as $data) {
                    $no++;

                    $status_barang = '<span class="badge badge-danger">Tidak Tersedia</span><br><button class="btn btn-primary btn-sm badge" data-toggle="modal" data-target="#modalPP">Buat Permintaan</button>';
                    if ($data->status_barang == 1) {
                      $status_barang = '<span class="badge badge-success">Tersedia</span><br><button class="btn btn-primary btn-sm badge" onClick="getID(\''.$data->kode_jenis_barang.'\')" data-toggle="modal" data-target="#modalSiapkanBarang">Siapkan Barang</button>';
                    }

                    if ($data->status_barang == 2) {
                      $status_barang = '<span class="badge badge-warning">Pending</span><br><button class="btn btn-success btn-sm badge" data-toggle="modal" onClick="getID(\''.$data->kode_jenis_barang.'\')" data-target="#modalVerifikasiBarang">Verifikasi</button>';
                    }

                    if ($data->status_barang == 3) {
                      $status_barang = '<span class="badge badge-success">Tersedia</span><br><button class="btn btn-primary btn-sm badge" onClick="getID(\''.$data->kode_jenis_barang.'\')" data-toggle="modal" data-target="#modalSiapkanBarang">Siapkan Barang</button>';
                    }

                    if ($data->minimum_stok >= $data->jumlah_barang) {
                      $status_barang = '<span class="badge badge-danger">Tidak Tersedia</span><br><button class="btn btn-primary btn-sm badge" data-toggle="modal" data-target="#modalPP">Buat Permintaan</button>';
                    }
                ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $data->kode_jenis_barang ?></td>
                  <td><?= $data->jumlah_barang ?></td>
                  <td><?= $status_barang ?></td>
                  <td><button class="btn btn-primary btn-sm">Edit</button> | <button class="btn btn-danger btn-sm">Delete</button></td>
                </tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    <input type="hidden" name="idselected" id="idselected" class=form-control"">

    <!-- Modal Buat Permintaan -->
    <div class="modal" id="modalPP">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Buat Permintaan</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form id="form_data">
              <div class="form-group">
                <label for="jenis_barang">Jenis Barang</label>
                <select name="jenis_barang" class="form-control" id="jenis_barang">
                  <option value="1">Barang Lama</option>
                  <option value="2">Barang Baru</option>
                </select>
              </div>
              <div class="form-group">
                <label for="kode_jenis_barang">Kode Jenis Barang</label>
                <input type="text" class="form-control" placeholder="Masukan Jumlah Barang" name="kode_jenis_barang_baru" id="kode_jenis_barang_baru">
                <select name="kode_jenis_barang_lama" class="form-control" id="kode_jenis_barang_lama">
                  <?php foreach($barang as $barang) { ?>
                    <option value="<?= $barang->kode_jenis_barang; ?>"><?= $barang->kode_jenis_barang; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="cabang">Cabang</label>
                <select name="cabang" class="form-control select2 w-100" id="cabang">
                  <?php foreach($cabang as $cabang) { ?>
                    <option value="<?= $cabang->id; ?>"><?= $cabang->nama_cabang; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="jumlah">Jumlah Barang</label>
                <input type="number" class="form-control" name="jumlah_barang" placeholder="Masukan Jumlah Barang" id="jumlah_barang">
              </div>
              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" name="keterangan" placeholder="Masukan keterangan" id="keterangan"></textarea>
              </div>
            </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="submitpp">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

    <!-- Modal Verifikasi Barang -->
    <div class="modal" id="modalVerifikasiBarang">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Verifikasi Barang</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <h3>Apakah barang sudah sesuai ?</h3>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="submitverifikasibarang">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Siapkan Barang -->
    <div class="modal" id="modalSiapkanBarang">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Apakah barang sudah sesuai ?</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <!-- Date range -->
            <div class="form-group">
              <label>Tanggal Keluar:</label>
              <input data-date-format="yyyy-mm-dd" class="form-control" name="tanggal_keluar" id="tanggal_keluar">
            </div>
            <div class="form-group">
              <label for="jumlah">Jumlah Barang</label>
              <input type="number" class="form-control" placeholder="Masukan Jumlah Barang" required="required" id="jumlah_siapkan_barang">
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="submitsiapkanbarnag">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</body>
</html>

<script>
  $(function() {
    $('#tanggal_keluar').datepicker("setDate", new Date());

    $('#tanggal_keluar').on('changeDate', function(ev){
        $(this).datepicker('hide');
    });

    $('#kode_jenis_barang_baru').hide();

    $('#jenis_barang').change(function(){
        if($('#jenis_barang').val() == 2) {
          $('#kode_jenis_barang_lama').hide();
          $('#kode_jenis_barang_baru').show();
        } else {
          $('#kode_jenis_barang_lama').show();
          $('#kode_jenis_barang_baru').hide();
        }
    });

    $('#submitpp').click(function() {
      const formData = $('#form_data').serialize();
      const jumlah_barang = $('#jumlah_barang').val();

      if (jumlah_barang === '') {
        alert('Jumlah Barang Wajib diisi');

        return;
      }

      $.post("submitRequestBarang", { data: formData }, function( data ) {
        window.location.reload();
      });
    })

    $('#submitverifikasibarang').click(function() {
      const id = $("#idselected").val();

      $.post("VerifikasiBarang", { data: id }, function( data ) {
        window.location.reload();
      });
    })

    $('#submitsiapkanbarnag').click(function() {
      const id = $("#idselected").val();
      const jumlah_siapkan_barang = $('#jumlah_siapkan_barang').val();
      const tanggal_keluar = $('#tanggal_keluar').val();

      if (jumlah_siapkan_barang === '') {
        alert('Jumlah Barang Wajib diisi');

        return;
      }

      const formData = {
        data: {
          id: id,
          jumlah_barang: jumlah_siapkan_barang,
          tanggal_keluar: tanggal_keluar,
        }
      }

      $.post("SiapkanBarang", formData, function( data ) {
        window.location.reload();
      });
    })
  });

  function getID(id)
  {
    $('#idselected').val(id);
  }

  // function getDtl(id)
  // {
  //   const formData = {
  //     data: {
  //       id: id,
  //       table: 'app_barang',
  //       idName: 'kode_jenis_barang',
  //     }
  //   }

  //   $.post("getDtl", formData, function( data ) {
  //     const result = JSON.parse(data);
  //     $('#update_kode_jenis_barang').val(result.kode_jenis_barang);
  //     $('#update_minimum_stok').val(result.minimum_stok);
  //   });
  // }
</script>
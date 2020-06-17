<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Barang</title>
</head>
<body>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Barang</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Kode Jenis Barang</th>
                  <th>Stok</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 0;
                  foreach($barang as $data) {
                    $no++;

                    $status_barang = '<span class="badge badge-danger">Tidak Tersedia</span><br><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalPP">Buat Permintaan</button>';
                    if ($data->status_barang == 1) {
                      $status_barang = '<span class="badge badge-success">Tersedia</span>';
                    }
                ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $data->kode_jenis_barang ?></td>
                  <td><?= $data->stok ?></td>
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


    <!-- The Modal -->
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
            <div class="form-group">
              <label for="kode_jenis_barang">Kode Jenis Barang</label>
              <select name="kode_jenis_barang" class="form-control" id="kode_jenis_barang">
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
              <input type="number" class="form-control" placeholder="Masukan Jumlah Barang" id="jumlah">
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
              <textarea class="form-control" placeholder="Masukan keterangan" id="keterangan"></textarea>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

  </div>
</body>
</html>
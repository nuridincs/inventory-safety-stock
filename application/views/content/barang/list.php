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
                ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $data->kode_jenis_barang ?></td>
                  <td><?= $data->stok ?>+</td>
                  <td><?= $data->status_barang ?></td>
                  <td>Edit | Delete</td>
                </tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
</body>
</html>
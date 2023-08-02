<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Customer</title>
</head>
<body>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Customer</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <button class="btn btn-dark btn-sm mb-3" data-toggle="modal" data-target="#modalTambah">Tambah</button>
          <div class="card">
            <div class="card-body table-responsive p-0">
              <table id="example2" class="table table-hover text-nowrap">
                <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Nama</th>
                  <th>Nomor Telepon</th>
                  <th>Alamat</th>
                  <th>Kode Pos</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 0;
                  foreach($customers as $data) {
                    $no++;
                ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $data->nama ?></td>
                  <td><?= $data->nomor_telepon ?></td>
                  <td><?= $data->alamat ?></td>
                  <td><?= $data->kode_pos ?></td>
                  <td>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUpdate" onClick="getDtl('<?= $data->id ?>')">Edit</button>
                    |
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete" onClick="getID('<?= $data->id ?>')">Delete</button>
                  </td>
                </tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    <input type="hidden" name="idselected" id="idselected" class=form-control"">

    <!-- Modal Tambah User -->
    <div class="modal" id="modalTambah">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Tambah Customers</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama" required>
            </div>
            <div class="form-group">
              <label for="text">Nomor Telepon</label>
              <input type="text" class="form-control" name="nomor_telepon" id="nomor_telepon" placeholder="Masukan Nomor Telepon" required>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat" required>
            </div>
            <div class="form-group">
              <label for="kode_pos">Kode Pos</label>
              <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Masukan Kode Pos" required>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="actionadd">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

    <!-- Modal Update Customers -->
    <div class="modal" id="modalUpdate">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Update Customer</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

            <!-- Modal body -->
            <div class="modal-body">
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="update_nama" id="update_nama" placeholder="Masukan Nama" required>
              </div>
              <div class="form-group">
                <label for="text">Nomor Telepon</label>
                <input type="text" class="form-control" name="update_nomor_telepon" id="update_nomor_telepon" placeholder="Masukan Nomor Telepon" required>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" name="update_alamat" id="update_alamat" placeholder="Masukan Alamat" required>
              </div>
              <div class="form-group">
                <label for="kode_pos">Kode Pos</label>
                <input type="text" class="form-control" name="update_kode_pos" id="update_kode_pos" placeholder="Masukan Kode Pos" required>
              </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="actionupdate">Submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
      </div>
    </div>

    <!-- Modal Delete User -->
    <div class="modal" id="modalDelete">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Hapus Customers</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <h3>Apakah Anda yakin ingin menghapus data ini ?</h3>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="actiondelete">Submit</button>
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
    $('#actionadd').click(function() {
      const nama = $('#nama').val();
      const nomor_telepon = $('#nomor_telepon').val();
      const alamat = $('#alamat').val();
      const kode_pos = $('#kode_pos').val();

      if (nama === '') {
        alert('Nama Wajib diisi');

        return;
      }

      if (nomor_telepon === '') {
        alert('Nomor Telepon Wajib diisi');

        return;
      }

      const formData = {
        data: {
          nama,
          nomor_telepon,
          alamat,
          kode_pos,
        },
      }

      $.post("processAddCustomer", formData, function( data ) {
        window.location.reload();
      });
    })

    $('#actionupdate').click(function() {
      const id = $("#idselected").val();
      const nama = $('#update_nama').val();
      const nomor_telepon = $('#update_nomor_telepon').val();
      const alamat = $('#update_alamat').val();
      const kode_pos = $('#update_kode_pos').val();

      if (nama === '') {
        alert('Nama Wajib diisi');

        return;
      }

      if (nomor_telepon === '') {
        alert('Nomor Telepon Wajib diisi');

        return;
      }

      const formData = {
        data: {
          nama,
          nomor_telepon,
          alamat,
          kode_pos,
        },
        id: id,
        table: 'app_customers',
        id_name: 'id',
      }

      $.post("ActionUpdate", formData, function( data ) {
        window.location.reload();
      });
    })

    $('#actiondelete').click(function() {
      const id = $("#idselected").val();

      const formData = {
        data: {
          id: id,
          idName: 'id',
        },
        table: 'app_customers',
      }

      $.post("ActionDelete", formData, function( data ) {
        window.location.reload();
      });
    })
  });

  function getID(id)
  {
    $('#idselected').val(id);
  }

  function getDtl(id)
  {
    $('#idselected').val(id);

    const formData = {
      data: {
        id: id,
        table: 'app_customers',
        idName: 'id',
      }
    }

    $.post("getDtl", formData, function( data ) {
      const result = JSON.parse(data);
      $('#update_nama').val(result.nama);
      $('#update_nomor_telepon').val(result.nomor_telepon);
      $('#update_alamat').val(result.alamat);
      $('#update_kode_pos').val(result.kode_pos);
    });
  }
</script>
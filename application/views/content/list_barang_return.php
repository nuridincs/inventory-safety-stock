<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Barang Retur</title>
</head>
<body>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Barang Retur</h1>
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
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Detail Return</th>
                  <th>Nomor Resi</th>
                  <th>Nomor Ranjang</th>
                  <th>Tanggal Masuk</th>
                  <th>Tanggal Keluar</th>
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
                  <td><?= $data->item_name ?></td>
                  <td><?= $data->category ?></td>
                  <td><?= $data->reject_reason ?></td>
                  <td><?= $data->receipt_number ?></td>
                  <td><?= $data->bunk_number ?></td>
                  <td><?= $data->created_at ?></td>
                  <td><?= $data->item_out_date ?></td>
                  <td><?= $data->status ?></td>
                  <td>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUpdate" onClick="getDtlBarang('<?= $data->id ?>')">Edit</button>
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

    <!-- Modal Tambah Barang -->
    <div class="modal" id="modalTambah">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Tambah Barang Return</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form id="form_data">
              <div class="form-group">
                <label for="item_name">Nama Barang</label>
                <input type="text" class="form-control" name="item_name" id="item_name" placeholder="Masukan Nama Barang">
              </div>
              <div class="form-group">
                <label for="category">Katagori</label>
                <select name="category" id="category" class="form-control">
                  <option value="kualitas">Kualitas</option>
                  <option value="quantity">Quantity</option>
                </select>
              </div>
              <div class="form-group">
                <label for="item_name">Detail Retur</label>
                <input type="text" class="form-control" name="reject_reason" id="reject_reason" placeholder="Masukan Detail Return">
              </div>
              <div class="form-group">
                <label for="item_name">Nomor Resi</label>
                <input type="text" class="form-control" name="receipt_number" id="receipt_number" placeholder="Masukan Nomor Resi">
              </div>
              <div class="form-group">
                <label for="item_name">Nomor Ranjang</label>
                <input type="text" class="form-control" name="bunk_number" id="bunk_number" placeholder="Masukan Nomor Ranjang">
              </div>
            </form>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="addbarang">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

    <!-- Modal Update Barang -->
    <div class="modal" id="modalUpdate">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Update Barang</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

            <!-- Modal body -->
            <div class="modal-body">
            <form id="form_data">
              <div class="form-group">
                <label for="item_name">Nama Barang</label>
                <input type="text" class="form-control" name="update_item_name" id="update_item_name" placeholder="Masukan Nama Barang">
              </div>
              <div class="form-group">
                <label for="category">Katagori</label>
                <select name="update_category" id="update_category" class="form-control">
                  <option value="kualitas">Kualitas</option>
                  <option value="quantity">Quantity</option>
                </select>
              </div>
              <div class="form-group">
                <label for="item_name">Detail Retur</label>
                <input type="text" class="form-control" name="update_reject_reason" id="update_reject_reason" placeholder="Masukan Detail Return">
              </div>
              <div class="form-group">
                <label for="item_name">Nomor Resi</label>
                <input type="text" class="form-control" name="update_receipt_number" id="update_receipt_number" placeholder="Masukan Nomor Resi">
              </div>
              <div class="form-group">
                <label for="item_name">Nomor Ranjang</label>
                <input type="text" class="form-control" name="update_bunk_number" id="update_bunk_number" placeholder="Masukan Nomor Ranjang">
              </div>
              <div class="form-group">
                <label for="status">Apakah barang ini sudah dikirim</label>
                <select name="update_status" id="update_status" class="form-control">
                  <option value="yes">Ya sudah dikirim</option>
                  <option value="no">Belum masih di gudang</option>
                </select>
              </div>
            </form>
          </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="update_item">Submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
      </div>
    </div>

    <!-- Modal Delete Barang -->
    <div class="modal" id="modalDelete">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Hapus Barang</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <h3>Apakah Anda yakin ingin menghapus data ini ?</h3>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="deletebarang">Submit</button>
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
    $('#addbarang').click(function() {
      const item_name = $('#item_name').val();
      const category = $('#category').val();
      const reject_reason = $('#reject_reason').val();
      const receipt_number = $('#receipt_number').val();
      const bunk_number = $('#bunk_number').val();

      if (item_name === '') {
        alert('Nama Barang Wajib diisi');

        return;
      }

      const formData = {
        data: {
          item_name,
          category,
          reject_reason,
          receipt_number,
          bunk_number
        },
        table: 'app_barang_retur',
        role: 'admin',
      }

      $.post("ActionAdd", formData, function( data ) {
        const result = JSON.parse(data);

        if(result.status == 'error') {
          alert(result.msg);
        } else {
          window.location.reload();
        }
      });
    })

    $('#update_item').click(function() {
      const id = $("#idselected").val();
      const item_name = $('#update_item_name').val();
      const category = $('#update_category').val();
      const reject_reason = $('#update_reject_reason').val();
      const receipt_number = $('#update_receipt_number').val();
      const bunk_number = $('#update_bunk_number').val();
      const updateStatus = $('#update_status').val();

      let item_out_date = null;
      let status = 'sedang di proses';
      const currentdate = new Date();

      if (updateStatus === 'yes') {
        status = 'selesai';
        item_out_date= new Date(currentdate.getTime() - (currentdate.getTimezoneOffset() * 60000)).toISOString().split(".")[0].replace(/[T:]/g, '-');
      }


      const formData = {
        data: {
          item_name,
          category,
          reject_reason,
          receipt_number,
          bunk_number,
          status,
          item_out_date
        },
        id: id,
        table: 'app_barang_retur',
        id_name: 'id',
      }

      $.post("ActionUpdate", formData, function( data ) {
        window.location.reload();
      });
    })

    $('#deletebarang').click(function() {
      const id = $("#idselected").val();

      const formData = {
        data: {
          id: id,
          idName: 'id',
        },
        table: 'app_barang_retur',
      }

      $.post("ActionDelete", formData, function( data ) {
        window.location.reload();
      });
    })

    $('#submitsiapkanbarnag').click(function() {
      const id = $("#idselected").val();
      const jumlah_siapkan_barang = $('#jumlah_siapkan_barang').val();
      const formData = {
        data: {
          id: id,
          jumlah_barang: jumlah_siapkan_barang
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

  function getDtlBarang(id)
  {
    $('#idselected').val(id);

    const formData = {
      data: {
        id: id,
        table: 'app_barang_retur',
        idName: 'id',
      }
    }

    $.post("getDtl", formData, function( data ) {
      const result = JSON.parse(data);
      $('#update_item_name').val(result.item_name);
      $('#update_category').val(result.category);
      $('#update_reject_reason').val(result.reject_reason);
      $('#update_receipt_number').val(result.receipt_number);
      $('#update_bunk_number').val(result.bunk_number);
    });
  }
</script>
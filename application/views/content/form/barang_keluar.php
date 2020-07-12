<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Barang Keluar</title>
</head>
<body>
  <div class="content-wrappers container m-auto">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Barang Keluar</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <form method="post" action="<?= base_url('general/actionUpdateFifo') ?>">
            <div class="form-group">
              <label>Tanggal Keluar:</label>
              <input data-date-format="yyyy-mm-dd" class="form-control" name="tanggal_keluar" id="tanggal_keluar">
            </div>

            <div class="form-group">
              <label for="kode_jenis_barang">Nama Barang</label>
              <select name="kode_jenis_barang" id="kode_jenis_barang" class="form-control" required>
                <?php foreach($dataBarang as $data): ?>
                  <option value="<?= $data->kode_jenis_barang ?>"><?= $data->kode_jenis_barang ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
              <label for="jumlah">Jumlah Barang</label>
              <input type="number" class="form-control" placeholder="Masukan Jumlah Barang" required name="jumlah_barang" id="jumlah_barang">
            </div>

            <button class="btn btn-danger">Submit</button>
          </form>
        </div>
      </div>
    </section>

  </div>
</body>
</html>

<script>
  $(function() {
    $('#tanggal_keluar').datepicker("setDate", new Date());

    $('#tanggal_keluar').on('changeDate', function(ev){
      $(this).datepicker('hide');
    });
  });
</script>
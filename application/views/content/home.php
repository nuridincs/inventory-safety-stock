<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <h1 class="m-0 text-dark mb-5">Selamat datang <strong><?php echo $this->session->userdata('nama'); ?></strong></h1>
      <h3 class="m-0 text-dark mb-5">Data yg perlu dikirim sudah melewati batas waktu 2 hari</h3>
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table id="example2" class="table table-hover text-nowrap">
                  <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Nama Barang</th>
                    <th>Nomor Resi</th>
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
                    <td><?= $data->receipt_number ?></td>
                  </tr>
                  <?php } ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
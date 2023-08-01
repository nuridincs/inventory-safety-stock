<!DOCTYPE html>
<html>
<head>
	<title>Detail Barang</title>
	<!-- meta -->
	<?php require_once('template/_meta.php') ;?>

	<!-- css -->
	<?php require_once('template/_css.php') ;?>
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- jQuery -->
	<script src="<?php echo base_url('assets');?>/vendor/AdminLTE-3.0.0-alpha/plugins/jquery/jquery.min.js"></script>
</head>

<body class="hold-transition sidebar-mini-123">
	<div class="wrapper123">

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper-1">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Detail Barang</h1>
						</div>
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
				<div class="card">
					<!-- /.card-header -->
					<div class="card-body p-0">
						<div class="table-responsive">
							<table class="table m-0">
								<tbody>
									<tr>
										<td>Nomor Resi</td>
										<td>
											<div class="sparkbar" data-color="#00a65a" data-height="20"><?= $receipt_number; ?></div>
										</td>
									</tr>
									<tr>
										<td>Nama Barang</td>
										<td>
											<div class="sparkbar" data-color="#00a65a" data-height="20"><?= $item_name; ?></div>
										</td>
									</tr>
									<tr>
										<td>Kategori</td>
										<td>
											<div class="sparkbar" data-color="#00a65a" data-height="20"><?= $category; ?></div>
										</td>
									</tr>
									<tr>
										<td>Keterangan</td>
										<td>
											<div class="sparkbar" data-color="#00a65a" data-height="20"><?= $reject_reason; ?></div>
										</td>
									</tr>
									<tr>
										<td>Tanggal Masuk</td>
										<td>
											<div class="sparkbar" data-color="#00a65a" data-height="20"><?= $created_at; ?></div>
										</td>
									</tr>
									<tr>
										<td>Tanggal Keluar</td>
										<td>
											<div class="sparkbar" data-color="#00a65a" data-height="20"><?= $item_out_date; ?></div>
										</td>
									</tr>
									<tr>
										<td>Status</td>
										<td>
											<span class="badge badge-success"><?= $status; ?></span>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- /.table-responsive -->
					</div>
				</div>
				</div><!--/. container-fluid -->
			</section>
			<!-- /.content -->
		</div>
	</div>
	<!-- ./wrapper -->
	<!-- js -->
	<!-- Bootstrap -->
	<script src="<?php echo base_url('assets');?>/vendor/AdminLTE-3.0.0-alpha/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<?php require_once('template/_js.php') ;?>
	<!-- ChartJS 1.0.2 -->
	<script src="<?php echo base_url('assets');?>/vendor/AdminLTE-3.0.0-alpha/plugins/chartjs-old/Chart.min.js"></script>
	<!-- PAGE SCRIPTS -->
	<script src="<?php echo base_url('assets');?>/vendor/AdminLTE-3.0.0-alpha/dist/js/pages/dashboard2.js"></script>
</body>
</html>

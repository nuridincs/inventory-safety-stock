<!-- Navbar -->
<nav class="main-headers container navbar navbar-expand bg-white navbar-light border-bottom">
	<!-- Left navbar links -->
	<!-- <ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
		</li>
	</ul> -->
	<ul class="navbar-nav">
		<li class="nav-item d-flex align-items-center">
			<h4>PT. Nina</h4>
		</li>
		<li class="nav-item">
			<a href="<?php echo base_url('/general') ?>" class="nav-link">
				<i class="nav-icon fa fa-dashboard"></i>
				<span>
					Dashboard
				</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo base_url('/general/listBarang') ?>" class="nav-link">
				<i class="nav-icon fa fa-folder-open"></i>
				<span>
					Master Barang
				</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo base_url('/general/listBarangMasuk') ?>" class="nav-link">
				<i class="nav-icon fa fa-folder-open"></i>
				<span>
					Barang Masuk
				</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo base_url('/general/listBarangKeluar') ?>" class="nav-link">
				<i class="nav-icon fa fa-folder-open"></i>
				<span>
				Barang Keluar
				</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo base_url('/general/listUser') ?>" class="nav-link">
				<i class="nav-icon fa fa-folder-open"></i>
				<span>
				Users
				</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="<?php echo base_url('/general/laporan') ?>" class="nav-link">
				<i class="nav-icon fa fa-file"></i>
				<span>
				Laporan
				</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#"><i class="fa fa-user-circle"></i> <?php echo $this->session->userdata('nama'); ?></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url('/Auth/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a>
		</li>
	</ul>
</nav>

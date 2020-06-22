<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
				 style="opacity: .8">
		<span class="brand-text font-weight-light">PT. DONY</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?php echo $this->session->userdata('nama'); ?></a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item has-treeview menu-open">
					<a href="<?php echo base_url('/general') ?>" class="nav-link">
						<i class="nav-icon fa fa-dashboard"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('/general/listBarang') ?>" class="nav-link">
						<i class="nav-icon fa fa-folder-open"></i>
						<p>
							Kelola Master Barang
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('/general/listBarangMasuk') ?>" class="nav-link">
						<i class="nav-icon fa fa-folder-open"></i>
						<p>
							Kelola Barang Masuk
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('/general/listBarangKeluar') ?>" class="nav-link">
						<i class="nav-icon fa fa-folder-open"></i>
						<p>
							Kelola Barang Keluar
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('/general/listUser') ?>" class="nav-link">
						<i class="nav-icon fa fa-folder-open"></i>
						<p>
							Kelola Users
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?php echo base_url('/general/laporan') ?>" class="nav-link">
						<i class="nav-icon fa fa-file"></i>
						<p>
							Laporan
						</p>
					</a>
				</li>
				<!-- <li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-edit"></i>
						<p>
							Forms
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/pages/forms/general.html" class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>General Elements</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/pages/forms/advanced.html" class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Advanced Elements</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/pages/forms/editors.html" class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Editors</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fa fa-table"></i>
						<p>
							Tables
							<i class="fa fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/pages/tables/simple.html" class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Simple Tables</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/pages/tables/data.html" class="nav-link">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Data Tables</p>
							</a>
						</li>
					</ul>
				</li> -->
				<li class="nav-item">
					<a href="<?php echo base_url('/Auth/logout') ?>" class="nav-link">
						<i class="nav-icon fa fa-sign-out"></i>
						<p>
							Logout
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>

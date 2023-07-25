<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 bg-sidebar">
	<!-- Brand Logo -->
	<a href="/general" class="brand-link my-3 text-primary">
		<img src="<?php echo base_url()?>assets/vendor/AdminLTE-3.0.0-alpha/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
				 style="opacity: .8">
		<span class="brand-text font-weight-light">PT. XYJ</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<li class="nav-item">
						<a href="<?php echo base_url('/general') ?>" class="nav-link">
							<i class="nav-icon fa fa-dashboard"></i>
							<p>
								Dashboard
							</p>
						</a>
					</li>
					<?php
					$array = [1, 3, 4];
					if (in_array($this->session->userdata('role'), $array)) { ?>
						<li class="nav-item">
							<a href="<?php echo base_url('/general/listBarangRetur') ?>" class="nav-link">
								<i class="nav-icon fa fa-folder-open"></i>
								<p>
									Kelola Barang Retur
								</p>
							</a>
						</li>
					<?php } ?>
				<?php
					$array = [3, 4];
					if (in_array($this->session->userdata('role'), $array)) { ?>
						<li class="nav-item">
							<a href="<?php echo base_url('/general/listUser') ?>" class="nav-link">
								<i class="nav-icon fa fa-folder-open"></i>
								<p>
									Kelola Users
								</p>
							</a>
						</li>
				<?php } ?>
				<?php
					$array = [1, 3, 4];
					if (in_array($this->session->userdata('role'), $array)) { ?>
						<li class="nav-item">
							<a href="<?php echo base_url('/general/laporan') ?>" class="nav-link">
								<i class="nav-icon fa fa-file"></i>
								<p>
									Laporan
								</p>
							</a>
						</li>
				<?php } ?>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>

<style lang="scss">
	.bg-sidebar {
		background: #4e73df;
	}

	.text-primary {
		color: #fff !important;

	}

	.is-active {
		color: #fff !important;
		background-color: #6081e2;
	}
</style>

<script>
var status = localStorage.getItem("status");
var elHref = localStorage.getItem("elementsHref")
$("a[href$='"+elHref+"']").addClass(status);

$(".nav-link").on("click", function(){
	localStorage.setItem("status", "is-active");
	localStorage.setItem("elementsHref", $(this).attr("href"))
	$(".nav-link").removeClass(localStorage.getItem("status"));
	$(this).addClass(localStorage.getItem("status"));
});
</script>

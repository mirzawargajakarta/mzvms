<?php $config = $this->Default_m->getWhere('tabel_config', ['id_config' => 1])->row(); ?>

<footer class="main-footer p-4">
	<h6 class=" text-center font-weight-bold text-black">Copyright &copy; <?= $config->copyright; ?> <?= date('Y'); ?></h6>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin logout?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-footer">
				<button class="btn btn-danger" type="button" data-dismiss="modal">Batal <i class="fa fa-times ml-2"></i></button>
				<a class="btn btn-primary" href="<?= base_url('login/logout'); ?>">Logout <i class="fas fa-sign-out-alt ml-2"></i></a>
			</div>
		</div>
	</div>
</div>

<!-- jQuery -->
<script src="<?= base_url('assets/vendor/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/vendor/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/vendor/dist/js/demo.js') ?>"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/vendor/sweet-alert-2/sweetalert2.all.min.js'); ?>"></script>
<!-- chart js -->
<script src="<?= base_url('assets/vendor/chartjs/chart.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/chartjs/utils.js'); ?>"></script>

<!-- datatables -->
<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/plugin/dataTables.buttons.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/plugin/buttons.flash.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/plugin/jszip.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/plugin/pdfmake.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/plugin/vfs_fonts.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/plugin/buttons.html5.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/plugin/buttons.print.min.js'); ?>"></script>

<!-- my script -->
<script src="<?= base_url('assets/vendor/select2/js/select2.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/parsley.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/my-script.js'); ?>"></script>

<script>
	const base_url = '<?= base_url(''); ?>';
</script>
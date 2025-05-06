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
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<!-- Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
<script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.0/js/dataTables.bootstrap4.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/5.0.4/js/dataTables.fixedColumns.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/5.0.4/js/fixedColumns.bootstrap4.js"></script>

<!-- my script -->
<script src="<?= base_url('assets/vendor/select2/js/select2.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/parsley.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/my-script_nodatatables.js'); ?>"></script>

<script>
	const base_url = '<?= base_url(''); ?>';
</script>

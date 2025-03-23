<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content p-3">

		<div class="rounded mt-4 p-4 bg-white shadow-lg">
			<h3><?= $title; ?></h3>
		</div>

		<div class="rounded mt-4 p-4 bg-white shadow-lg">

			<form role="form" id="my-form" method="post">

				<div class="form-group">
					<label for="oldpass">Password Lama <span class="text-danger">*</span></label>
					<input type="password" class="form-control" id="oldpass" name="oldpass" autocomplete="off" required minlength="8">
					<?= form_error('oldpass'); ?>
				</div>

				<div class="form-group">
					<label for="password">Password Baru <span class="text-danger">*</span></label>
					<input type="password" class="form-control" id="password" name="password" autocomplete="off" required minlength="8">
					<?= form_error('password'); ?>
				</div>

				<div class="form-group">
					<label for="passconfirm">Konfimasi Password <span class="text-danger">*</span></label>
					<input type="password" class="form-control" id="passconfirm" name="passconfirm" autocomplete="off" required minlength="8" data-parsley-equalto="#password">
					<?= form_error('passconfirm'); ?>
				</div>

				<a class="mr-2 mt-3 btn btn-danger " href="<?= base_url('dashboard'); ?>" role="button">Batal <i class="fa fa-times ml-2"></i></a>
				<button class="mt-3 btn btn-primary" type="submit">Ubah <i class="fas fa-paper-plane ml-2"></i></button>

			</form>

		</div>

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('templates/footer.php'); ?>
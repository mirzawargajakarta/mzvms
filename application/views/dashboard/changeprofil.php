<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content p-3">

		<div class="rounded mt-4 p-4 bg-white shadow-lg">
			<h3><?= $title; ?></h3>
		</div>

		<div class="rounded mt-4 p-4 bg-white shadow-lg">

			<?= form_open_multipart(); ?>

			<div class="form-group">
				<label for="username">Username <span class="text-danger">*</span></label>
				<input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : null; ?>" id="username" name="username" autocomplete="off" value="<?= $ubah->username; ?>">
				<?= form_error('name'); ?>
			</div>
			<div class="form-group">
				<label for="nama_user">Nama Lengkap <span class="text-danger">*</span></label>
				<input type="text" class="form-control <?= form_error('nama_user') ? 'is-invalid' : null; ?>" id="nama_user" name="nama_user" autocomplete="off" value="<?= $ubah->nama_user; ?>">
				<?= form_error('nama_user'); ?>
			</div>
			<div class="form-group">
				<label for="telpon">Telpon</label>
				<input type="text" class="form-control <?= form_error('telpon') ? 'is-invalid' : null; ?>" id="telpon" name="telpon" autocomplete="off" value="<?= $ubah->telpon; ?>">
				<?= form_error('telpon'); ?>
			</div>

			<div class="col-md-8">
				<div class="form-group">
					<label for="foto">Foto User <span class="text-danger">(Max Size 500kb)</span></label>
					<div>
						<input type="file" id="real-file" hidden="hidden" name="foto">
						<button type="button" class="btn btn-outline-success" id="custom-button">
							Upload File <i class="fas fa-upload ml-2"></i>
						</button>
						<span id="custom-text" class="text-secondary ml-2">Tidak ada file yang diupload</span>
					</div>
					<?= form_error('foto'); ?>
				</div>

				<div class="form-group">
					<img id="prev" src="<?= base_url('assets/img/'); ?><?= !empty($ubah->foto) ? $ubah->foto : 'noprofil.png'; ?>" height="270" class="rounded">
				</div>

				<input type="hidden" name="foto_lama" value="<?= $ubah->foto; ?>">
			</div>

			<a class="mr-2 mt-3 btn btn-danger " href="<?= base_url(); ?>dashboard" role="button">Batal <i class="fa fa-times ml-2"></i></a>
			<button class="mt-3 btn btn-primary" type="submit">Ubah <i class="fas fa-paper-plane ml-2"></i></button>

			</form>

		</div>

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('templates/footer.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content p-3">

		<div class="rounded mt-4 p-4 bg-white shadow-lg ">
			<h1 class="h3 text-black"><?= $title; ?></h1>
		</div>

		<?php $config = $this->Default_m->getWhere('tabel_config', ['id_config' => 1])->row(); ?>
		<?php $color = explode("-", $config->brandlogo) ?>

		<div class="row mt-3 justify-content-center">
			<div class="col-md-3 col-6">
				<div class="small-box bg-<?= $color[1] ?>">
					<div class="inner">
						<h3 class="text-black"><?= $icon; ?></h3>
						<p class="text-uppercase">Icon</p>
					</div>
					<div class="icon text-white">
						<i class="fas fa-icons"></i>
					</div>
					<a href="<?= base_url('icon'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-md-3 col-6">
				<div class="small-box bg-<?= $color[1] ?>">
					<div class="inner">
						<h3 class="text-black"><?= $navigasi; ?></h3>
						<p class="text-uppercase">Navigasi</p>
					</div>
					<div class="icon text-white">
						<i class="fas fa-list"></i>
					</div>
					<a href="<?= base_url('navigasi'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-md-3 col-6">
				<div class="small-box bg-<?= $color[1] ?>">
					<div class="inner">
						<h3 class="text-black"><?= $profil; ?></h3>
						<p class="text-uppercase">Profil</p>
					</div>
					<div class="icon text-white">
						<i class="fas fa-user"></i>
					</div>
					<a href="<?= base_url('profil'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-md-3 col-6">
				<div class="small-box bg-<?= $color[1] ?>">
					<div class="inner">
						<h3 class="text-black"><?= $user; ?></h3>
						<p class="text-uppercase">User</p>
					</div>
					<div class="icon text-white">
						<i class="fas fa-users"></i>
					</div>
					<a href="<?= base_url('user'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('templates/footer.php'); ?>

<script>
	const flashLogin = $('.flash-login').data('flashdata');
	if (flashLogin) {
		Swal.fire({
			title: 'Login Berhasil!',
			text: flashLogin,
			imageUrl: base_url + 'assets/img/<?= $this->session->userdata('foto') ? $this->session->userdata('foto') : 'noprofil.png'; ?>',
			imageWidth: 250,
			imageHeight: 300,
			imageAlt: 'Avatar User',
		})
	}
</script>
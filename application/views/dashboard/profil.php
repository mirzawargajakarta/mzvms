<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content p-3">

		<div class="rounded mt-4 p-4 bg-white shadow-lg">
			<h3><?= $title; ?></h3>
		</div>

		<div class="rounded mt-4 p-4 bg-white shadow-lg">

			<div class="row">
				<div class="col-md-3">
					<img src="<?= base_url('assets/img/'); ?><?= $user->foto ? $user->foto : 'noprofil.png'; ?>" height="300" class="w-100 rounded">
				</div>
				<div class="col-md-9">
					<div class="col-md-9">
						<table class="h4 text-black table">
							<tr class="align-text-top">
								<td width="150px">Username </td>
								<td width="5px">:</td>
								<td class="font-weight-bold"><?= $user->username; ?></td>
							</tr>
							<tr class="align-text-top">
								<td>Nama</td>
								<td>:</td>
								<td class="font-weight-bold"><?= $user->nama_user; ?></td>
							</tr>
							<tr class="align-text-top">
								<td>Telpon</td>
								<td>:</td>
								<td class="font-weight-bold"><?= $user->telpon; ?></td>
							</tr>
							<tr class="align-text-top">
								<td>Profil </td>
								<td>:</td>
								<td class="font-weight-bold"><?= $user->profil; ?></td>
							</tr>
							<tr class="align-text-top">
								<td>Aktif </td>
								<td>:</td>
								<td class="font-weight-bold"><?= $user->aktif; ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>

			<a class="mr-2 mt-3 btn btn-warning " href="<?= base_url('dashboard'); ?>" role="button"><i class="fa fa-arrow-left mr-2"></i> Back</a>
			<a class="mr-2 mt-3 btn btn-primary " href="<?= base_url('dashboard/changeprofil/'); ?>" role="button">Ubah <i class="fas fa-paper-plane ml-2"></i></a>

		</div>

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('templates/footer.php'); ?>
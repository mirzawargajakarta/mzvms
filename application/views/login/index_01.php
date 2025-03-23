<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php $config = $this->Default_m->getWhere('tabel_config', ['id_config' => 1])->row(); ?>
	<meta name="description" content="<?= $config->description; ?>">
	<meta name="keywords" content="<?= $config->keywords; ?>">
	<meta name="author" content="<?= $config->author; ?>">
	<link rel="icon" href="<?= base_url('assets/img/' . $config->logo); ?>">

	<title><?= $title; ?></title>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/plugins/fontawesome-free/css/all.min.css') ?>">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/dist/css/adminlte.min.css') ?>">
	<!-- datatables -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css'); ?>">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
	<!-- my style -->
	<link href="<?= base_url('assets/css/login.css'); ?>" rel="stylesheet">
</head>

<body style="
background: linear-gradient(rgb(255, 255, 255),rgba(255, 255, 255)),url(<?= base_url('assets/img/' . $config->background); ?>); 
background-repeat: no-repeat;
background-size: cover;
background-position: center;
background-attachment: fixed;
">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
	<div class="flash-error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6  h-100">
				<div class="card">
					<div class="card-body">
						<div class="text-center mb-4">
							<img src="<?= base_url('assets/img/' .  $config->logo); ?>" width="170">
							<h3 class="text-light mt-2"><?= $config->login_title; ?></h3>
						</div>

						<?= form_open(); ?>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" class="form-control" placeholder="username" class="form-control <?= form_error('username') ? 'is-invalid' : null; ?>" id="username" name="username" autocomplete="off">
						</div>
						<div class="text-center font-weight-bold mb-3">
							<?= form_error('username'); ?>
						</div>

						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" class="form-control" placeholder="password" class="form-control <?= form_error('password') ? 'is-invalid' : null; ?>" id="password-field" name="password" autocomplete="off">
						</div>
						<div class="text-center font-weight-bold mb-3">
							<?= form_error('password'); ?>
						</div>

						<div class="mb-3">
							<span class="toggle-password text-white font-italic" toggle="#password-field" style="cursor: pointer; font-size: 14px; ">Show Password</span>
						</div>

						<div class="form-group">
							<input type="submit" value="LOGIN" class="btn float-right login_btn">
						</div>
						</form>
					</div>
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

	<!-- my script -->
	<script src="<?= base_url('assets/js/my-script.js'); ?>"></script>
	<script>
		$(".toggle-password").click(function() {
			var input = $($(this).attr("toggle"));

			console.log(input)

			if (input.attr("type") == "password") {
				input.attr("type", "text");
				$('.toggle-password').html('Hide Password');
			} else {
				input.attr("type", "password");
				$('.toggle-password').html('Show Password');
			}
		});
	</script>

</body>

</html>

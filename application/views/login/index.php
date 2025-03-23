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
	<link href="<?= base_url('assets/css/login01.css'); ?>" rel="stylesheet">

	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<body>
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
	<div class="flash-error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>

	<div class="container">
		<center>
		<div class="middle">
			<div id="login">

			<?= form_open(); ?>

				<fieldset class="clearfix">

					<p ><span class="fa fa-user"></span><input type="text"  Placeholder="Username" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
					<p><span class="fa fa-lock"></span><input type="password"  Placeholder="Password" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
					
					<div>
										<span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text" href="#">Forgot
										password?</a></span>
										<span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="Sign In"></span>
									</div>

				</fieldset>
		<div class="clearfix"></div>
				</form>

				<div class="clearfix"></div>

			</div> <!-- end login -->
			<div class="logo">LOGO
				
				<div class="clearfix"></div>
			</div>
			
			</div>
		</center>
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

<!-- header  ================================================================================================================ -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?= $title; ?>
    </title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-success"> 
	<!-- eo header ------------------------------============================================================================------ -->

<!-- body =============================================================================== -->
<div class="container">

    <!-- Outer Row inspiron 14 5000 vostro 13 -->
    <div class="row justify-content-center">

        <div class="col-lg-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <div class="logo-container">
                                        <img src="<?= base_url(); ?>assets/img/login/logo-login.png" alt="Logo Sarana Jaya">
                                    </div>
                                    <h1 class="h4 text-gray-900 mb-4 pt-3">Aplikasi Pemesanan Login</h1>
                                </div>

                                <?= $this->session->flashdata('message'); ?>

                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Alamat email..." value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <button type="submit" class="btn btn-success btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Lupa Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration'); ?>">Buat Akun!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- eo body ====================================================== -->
<!-- footer -->
 <!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

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
<!-- eo footer -->




	
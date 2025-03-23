<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content p-3">

		<div class="rounded mt-4 p-4 bg-white shadow-lg ">
			<h1 class="h3 text-black"><?= $title; ?></h1>
		</div>

		<div class="rounded mt-4 py-4 bg-white shadow-lg py-5">
			<div class="error-page py-4" style="padding: 100px 0 !important;">
				<h2 class="headline text-danger"> 404</h2>

				<div class="error-content">
					<h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Page not found.</h3>

					<p>
						We could not find the page you were looking for.
						Meanwhile, you may <a href="<?= base_url('dashboard'); ?>">return to dashboard</a> or try using the search
						form.
					</p>


				</div>
				<!-- /.error-content -->
			</div>
		</div>

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('templates/footer.php'); ?>
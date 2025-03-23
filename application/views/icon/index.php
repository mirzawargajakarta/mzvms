<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content p-3">

		<div class="rounded mt-4 p-4 bg-white shadow-lg ">
			<h1 class="h3 text-black"><?= $title; ?></h1>
		</div>

		<div class="rounded mt-4 mb-5 p-4 bg-white shadow-lg ">
			<button type="button" class="btn btn-outline-success mb-3 add-form mr-2" data-toggle="modal" data-target="#exampleModal">
				Tambah <i class="fas fa-plus"></i>
			</button>
			<button type="button" class="btn btn-primary mb-3">Total Data : <?= $num; ?></button>

			<div class="table-responsive">
				<table class="table table-hover table-bordered text-center" id="myTable">
					<thead class="bg-primary text-white ">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Class</th>
							<th scope="col">Icon</th>
							<th scope="col" class="td-aksi">Action</th>
						</tr>
					</thead>
					<tbody class="text-black">
						<?php $i = 1; ?>
						<?php foreach ($icon as $row) : ?>
							<tr>
								<td scope="row"><?= $i++; ?></td>
								<td class="text-left"><?= $row->icon; ?></td>
								<td><i class="<?= $row->icon; ?> text-info fa-2x"></i></td>
								<td class="text-nowarp">
									<a href="#" class="update-form btn btn-outline-warning" data-id_icon="<?= $row->id_icon; ?>" data-icon="<?= $row->icon; ?>" data-toggle="modal" data-target="#exampleModal">
										<i class="fas fa-edit pop" data-toggle="popover" data-placement="bottom" data-content="Update"></i>
									</a>
									<a href="<?= base_url('icon/hapus/' . $row->id_icon); ?>" class="button-delete btn btn-outline-danger">
										<i class="fas fa-trash-alt pop" ata-toggle="popover" data-placement="bottom" data-content="Delete"></i>
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- modal -->
<div class="modal fade modal-action" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Form Icon</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form role="form" id="my-form" method="post">

					<div class="form-group">
						<label for="icon">Icon <span class="text-danger">*</span></label>
						<input type="text" class="form-control" id="icon" name="icon" autocomplete="off" required>
					</div>

					<span class="text-danger py-2">* (Tidak Boleh Kosong)</span>
					<input type="hidden" name="id_icon" id="id_icon">
					<input type="hidden" name="token" id="token">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-cancel" data-dismiss="modal">Batal <i class="fa fa-times ml-2"></i></button>
				<button type="submit" class="btn btn-primary btn-send"></button>

				</form>
				<!-- end form -->

			</div>
		</div>
	</div>
</div>
<!-- end modal -->

<?php $this->load->view('templates/footer.php'); ?>

<script>
	$('.add-form').on('click', function() {
		$('.btn-send').html('Tambah <i class="fas fa-paper-plane ml-2"></i>');
		$('#id_icon').val('');
		$('#my-form')[0].reset();
	});

	$('.btn-cancel').on('click', function() {
		$(".is-valid").removeClass('is-valid');
		$(".text-red").removeClass('text-red');
		$(".is-invalid").removeClass('is-invalid');
	});

	$('#myTable').on('click', '.update-form', function() {
		$('.btn-send').html('Ubah <i class="fas fa-paper-plane ml-2"></i>');
		$('#id_icon').val($(this).data('id_icon'));
		$('#icon').val($(this).data('icon'));
	});
</script>
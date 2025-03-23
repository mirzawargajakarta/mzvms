<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content p-3">

		<div class="rounded mt-4 p-4 bg-white shadow-lg">
			<h3><?= $title; ?></h3>
		</div>

		<div class="rounded mt-4 p-4 bg-white shadow-lg">
			<a class="mb-3 btn btn-outline-primary" href="<?= base_url('user/form'); ?>" role="button">
				Tambah <i class="fa fa-plus"></i>
			</a>
			<button type="button" class="btn btn-info mb-3">Total Data : <?= $num; ?></button>

			<div class="table-responsive">
				<table class="table table-hover table-bordered w-100 text-nowrap text-center" id="myTable">
					<thead class="bg-primary text-white ">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Host</th>
							<th scope="col">Company</th>
							<th scope="col">Target</th>
							<th scope="col">Purpose</th>
							<th scope="col">Name</th>
							<th scope="col">Phpne</th>
							<th scope="col">SourceTypeName</th>
							<th scope="col">Inside</th>
							<th scope="col" class="td-aksi">Action</th>
						</tr>
					</thead>
					<tbody class="text-black">
						<?php $i = 1; ?>
						<?php foreach ($data as $row) : ?>
							<tr>
								<td scope="row"><?= $i++; ?></td>
								<td><?= $row['HostName']; ?></td>
								<td><?= $row['HostCompany']; ?></td>
								<td class="text-left"><?= $row['TargetVisitorType']; ?></td>
								<td><?= $row['PurposeVisit']; ?></td>
								<td><?= $row['Nama']; ?></td>
								<td><?= $row['PhoneNumber']; ?></td>
								<td><?= $row['SourceTypeName']; ?></td>
								<td><?= $row['IsInside']; ?></td>
								<td class="text-nowarp">
									<a href="#" class="get-detail btn btn-outline-info" data-id="<?= $row['Id']; ?>" data-toggle="modal" data-target="#get-detail">
										<i class="fas fa-eye pop" data-toggle="popover" data-placement="bottom" data-content="Detail"> </i>
									</a>
									<a href="<?= base_url('user/form/' . $row['Id']); ?>" class="btn btn-outline-warning">
										<i class="fas fa-edit pop" data-toggle="popover" data-placement="bottom" data-content="Update"></i>
									</a>
									<a href="<?= base_url('user/hapus/' . $row['Id']); ?>" class="button-delete btn btn-outline-danger">
										<i class="fas fa-trash-alt pop" data-toggle="popover" data-placement="bottom" data-content="Delete"></i>
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

<!-- Modal Detail -->
<div class="modal fade " id="get-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body detailUser">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Detail -->

<!-- Form Change Pass -->
<div class="modal fade " id="change-pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form role="form" id="my-form" method="post">

					<button type="button" class="btn btn-info mb-3">Username : <span id="username"></span></button>

					<div class="form-group">
						<label for="password">Password Baru <span class="text-danger">* (Min Length 8 Character)</span></label>
						<input type="password" class="form-control" id="password" name="password" autocomplete="off" required minlength="8">
						<?= form_error('password'); ?>
					</div>

					<div class="form-group">
						<label for="passconfirm">Konfimasi Password <span class="text-danger">* (Min Length 8 Character)</span></label>
						<input type="password" class="form-control" id="passconfirm" name="passconfirm" autocomplete="off" required minlength="8" data-parsley-equalto="#password">
						<?= form_error('passconfirm'); ?>
					</div>

					<input type="hidden" name="id_user" id="id_user">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-cancel" data-dismiss="modal">Close <i class="fa fa-times ml-2"></i></button>
				<button type="submit" class="btn btn-primary btn-send">Ubah <i class="fas fa-paper-plane"></i></button>

				</form>
				<!-- end form -->
			</div>
		</div>
	</div>
</div>
<!-- End Form Change Pass -->

<?php $this->load->view('templates/footer.php'); ?>

<script>
	$('#myTable').on('click', '.get-detail', function() {
		const id = $(this).data('id');
		$(".detailUser").load(base_url + 'user/getWhere/' + id);
	});

	$('#myTable').on('click', '.change-pass', function() {
		$('#username').html($(this).data('username'));
		$('#id_user').val($(this).data('id'));
	});
</script>

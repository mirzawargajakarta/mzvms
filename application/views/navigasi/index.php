<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content p-3">

		<div class="rounded mt-4 mb-3 p-4 bg-white shadow-lg border-left-success ">
			<h1 class="h3 text-black"><?= $title; ?></h1>
		</div>

		<div class="tampil-modal"></div>

		<div class="rounded mt-4 mb-5 p-4 bg-white shadow-lg border-left-primary ">
			<a href="<?= base_url('navigasi/form'); ?>" type="button" class="btn btn-outline-primary mb-3 mr-2">Tambah <i class="fas fa-plus"></i></a>
			<button type="button" class="btn btn-primary mb-3">Total Data : <?= $num; ?></button>

			<div class="table-responsive">
				<table class="table table-hover table-bordered text-nowrap text-center" id="myTable">
					<thead class="bg-primary text-white ">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Navigasi</th>
							<th scope="col">Heading</th>
							<th scope="col">Url</th>
							<th scope="col">Icon</th>
							<th scope="col">navigasi Utama</th>
							<th scope="col">Urutan</th>
							<th scope="col">Aktif</th>
							<th scope="col" class="td-aksi">Action</th>
						</tr>
					</thead>
					<tbody class="text-black">
						<?php $i = 1; ?>
						<?php foreach ($navigasi as $row) : ?>
							<tr>
								<td scope="row"><?= $i++; ?></td>
								<td class="text-left"><?= $row->navigasi; ?></td>
								<td class="text-left"><?= $row->heading; ?></td>
								<td><?= $row->url; ?></td>
								<td><i class="<?= $row->icon; ?> text-info fa-2x"></i></td>
								<?php $data = $this->Default_m->getWhere('tabel_navigasi', ['id_navigasi' => $row->dropdown])->row(); ?>
								<td><?= $row->dropdown == 0 ? 'Root' : $data->navigasi; ?></td>
								<td><?= $row->urutan; ?></td>
								<td><?= $row->aktif; ?></td>
								<td class="text-nowarp">
									<a href="<?= base_url('navigasi/form/' . $row->id_navigasi); ?>" class="btn btn-outline-warning">
										<i class="fas fa-edit pop" data-toggle="popover" data-placement="bottom" data-content="Update"></i>
									</a>
									<a href="<?= base_url('navigasi/hapus/' . $row->id_navigasi); ?>" class="button-delete btn btn-outline-danger">
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

<?php $this->load->view('templates/footer.php'); ?>
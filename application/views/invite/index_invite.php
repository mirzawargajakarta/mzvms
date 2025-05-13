<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content p-3">

		<div class="rounded mt-4 p-4 bg-white shadow-lg">
			<h3><?= $title; ?></h3>
		</div>

		<div class="rounded mt-4 p-4 bg-white shadow-lg">
			<a class="mb-3 btn btn-outline-primary" href="<?= base_url('invite/formadd'); ?>" role="button">
				Add Event Invitation <i class="fa fa-plus"></i>
			</a>
			<div class="table-responsive">
				<table class="table table-hover table-bordered w-100 text-nowrap" id="invtable">
					<thead class="bg-success text-white  text-center">
						<tr>
							<th scope="col" class="td-aksi">Action</th>
							<th scope="col">#</th>
							<th scope="col">Date Event</th>
							<th scope="col">Event Name</th>
							<th scope="col">Description</th>
							<th scope="col">Status</th>					
						</tr>
					</thead>
				</table>
			</div>

		</div>

<!-- Modal Detail -->
<div class="modal fade " id="get-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Event</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body detailInv">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Detail -->


	</section>
	<!-- /.content -->
</div>

<?php $this->load->view('templates/footer_two.php'); ?>

<script type="text/javascript">
$(document).ready(function() {
    $('#invtable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
			"url": "<?php echo base_url()?>/invite/eventlist",
			"dataType": "json",
			"type": "POST"
		},
		"columns": [
			{ "data": "Action" },
			{ "data": "No" },
			{ "data": "EventDate" },
			{ "data": "EventName" },
			{ "data": "Description" },
			{ "data": "IsSent" },
		],
        "order": [[0, 'desc']],
        // "ordering": false, // Ordering (Sorting on Each Column)will Be Disabled
        "info": true, // Will show "1 to n of n entries" Text at bottom
        "lengthChange": false, // Will Disabled Record number per page});
    });

	$('#invtable').on('click', '.get-detail', function() {
		const id = $(this).data('id');
		$(".detailInv").load("<?=base_url('invite/detail/')?>" + id);
	});	

	$('#invtable').on('click', '.to-delete', function(e) {
		e.preventDefault();
		const id = $(this).data('id');
		Swal.fire({
			title: 'Are you sure !',
			text: "Data with #id="+id+" will be delete",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Delete'
		}).then((result) => {
			if (result.isConfirmed) {
				const encoded = encodeURI(id);
				document.location.href = '<?=base_url("invite/hapus/?mzvms=");?>'+encoded;
			}
		})

		});

});

</script>

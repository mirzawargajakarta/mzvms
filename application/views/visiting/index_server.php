<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content p-3">

		<div class="rounded mt-4 p-4 bg-white shadow-lg">
			<h3><?= $title; ?></h3>
		</div>

		<div class="rounded mt-4 p-4 bg-white shadow-lg">

			<div class="table-responsive">
				<table class="table table-hover table-bordered w-100 text-nowrap text-center" id="vistable">
					<thead class="bg-primary text-white ">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Host</th>
							<th scope="col">Target</th>
							<th scope="col">Name</th>
							<th scope="col">Company</th>
							<th scope="col">SourceTypeName</th>
							<th scope="col">Phone</th>
							<th scope="col">Purpose</th>
							<th scope="col">Inside</th>
							<th scope="col" class="td-aksi">Action</th>
						</tr>
					</thead>
				</table>
			</div>

		</div>

	</section>
	<!-- /.content -->
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#vistable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
			"url": "<?php echo base_url()?>/visiting/serverside_datatables",
			"dataType": "json",
			"type": "POST"
		},
		"columns": [
			{ "data": "No" },
			{ "data": "HostName" },
			{ "data": "TargetVisitorType" },
			{ "data": "Nama" },
			{ "data": "SourceCompany" },
			{ "data": "SourceTypeName" },
			{ "data": "PhoneNumber" },
			{ "data": "PurposeVisit" },
			{ "data": "IsInside" },
			{ "data": "Action" },
		],
        "order": [[4, 'asc'], [2, 'asc']],
        // "ordering": false, // Ordering (Sorting on Each Column)will Be Disabled
        "info": true, // Will show "1 to n of n entries" Text at bottom
        "lengthChange": false // Will Disabled Record number per page});
    });
});
</script>

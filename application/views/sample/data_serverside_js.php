<script type="text/javascript">

    $('#tableuser').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
			"url": "<?php echo base_url()?>/user/serverside_datatables",
			"dataType": "json",
			"type": "POST"
		},
		"columns": [
			{ "data": "id" },
			{ "data": "username" },
			{ "data": "email" },
			{ "data": "usergroup_name" },
			{ "data": "active" },
			{ "data": "action" },
		],
        "order": [[4, 'asc'], [2, 'asc']],
        // "ordering": false, // Ordering (Sorting on Each Column)will Be Disabled
        "info": true, // Will show "1 to n of n entries" Text at bottom
        "lengthChange": false // Will Disabled Record number per page});
       
    });
</script>

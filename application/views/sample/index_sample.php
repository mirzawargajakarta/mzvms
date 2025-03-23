<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('core/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>USER</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">SYSTEM ADMIN</a></div>
              <div class="breadcrumb-item"><a href="#">ROLES</a></div>
              <div class="breadcrumb-item">User</div>
            </div>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Listing User (server side)</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="tableuser">
                        <thead>                                 
                          <tr align='center'>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Group Role</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php $this->load->view('core/_partials/footer'); ?>

<script type="text/javascript">

    $('#tableuser').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
			"url": "<?php echo base_url()?>/sample/serverside_datatables",
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

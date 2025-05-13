<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content p-3">

        <div class="rounded mt-4 p-4 bg-white shadow-lg ">
            <h1 class="h3 text-black"><?= $title; ?></h1>
        </div>

        <div class="rounded mt-4 p-4 bg-white shadow-lg ">

            <form role="form" id="my-form" method="post" action="<?=base_url()?>invite/addproc" enctype="multipart/form-data">

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Invitation Date</label>   
						<input type="text" class="form-control" id="tanggalevent" name="tanggalevent">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="hostname">Event Name</label>
						<input type="text" id="eventname" name="eventname" class="form-control">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Event Description</label>   
						<input type="text" class="form-control" id="eventdescription" name="eventdescription">
					</div>
				</div>
			</div>			
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label>Messages</label>
						<textarea class="form-control" id="msg" name="msg" rows="10">Bla.. bla.. bla..</textarea>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-hover table-bordered w-100 text-nowrap" id="invtable">
							<thead class="bg-success text-white  text-center">
								<tr>
									<th scope="col">Action</th>
									<th scope="col">Name</th>
									<th scope="col">WA</th>
									<th scope="col">Email</th>			
								</tr>
							</thead>
							<tbody>
								<tr id="tr1">
									<td>
										<a class='btn btn-outline-success' onclick="tambahbaris(1)">
											<i class='fa fa-plus'></i>
										</a>&nbsp;&nbsp;&nbsp;
									</td>
									<td><input type="text" name="nama[]" id="nama1" class="form-control" ></td>
									<td><input type="text" name="wa[]" id="wa1" class="form-control" ></td>
									<td><input type="text" name="email[]" id="email1" class="form-control" ></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<input class="mt-3 btn btn-primary" type="submit" name="submit" value="SAVE">
            </form>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('templates/footer_two.php'); ?>

<script language="JavaScript">
	
	$(document).ready(function() { 
		
		// tambahbaris(0);
	});
	
	var startid = 2;

	function tambahbaris(n) {
		var i = this.startid++;
		$('#tr'+n).after("<tr id='tr"+i+"'></tr>");

		var tambahbutton = "<a class='btn btn-outline-success' onclick='tambahbaris("+ i +")'><i class='fa fa-plus'></i></a>&nbsp;";

		var kurangbutton = "<a class='btn btn-outline-danger' onclick='hapusbaris("+ i +")'><i class='fa fa-minus'></i></a>";
		$('#tr'+i).append("<td>"+ tambahbutton + kurangbutton +"</td>");

		var inputnama = "<input type='text' name='nama[]' id='nama"+i+"' class='form-control'>";
		$('#tr'+i).append("<td>"+ inputnama +"</td>");

		var inputwa = "<input type='text' name='wa[]' id='wa"+i+"' class='form-control'>";
		$('#tr'+i).append("<td>"+ inputwa +"</td>");

		var inputemail = "<input type='text' name='email[]' id='email"+i+"' class='form-control'>";
		$('#tr'+i).append("<td>"+ inputemail +"</td>");
	}

	function hapusbaris(n) { 
		$('#tr'+n).remove();
	}

	const flashData = $('.flash-data').data('flashdata');
	if (flashData) {
		Swal({
			title: 'Success',
			text: flashData,
			type: 'success'
		});
	}

	// flash-data error
	const flashError = $('.flash-error').data('flashdata');
	if (flashError) {
		Swal({
			title: 'Error',
			text: flashError,
			type: 'error'
		});
	}

</script>

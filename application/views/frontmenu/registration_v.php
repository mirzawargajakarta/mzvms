<link rel="icon" href="<?= base_url('assets/img/24506d8768900869e2f21fc018cc1a5e.png'); ?>">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href=<?= base_url('assets/css/select2-theme.css'); ?>" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<div class="container">
<br>  <p class="text-center"><a href="https://id.pli-petronas.com">PETRONAS</a> Lubricants International (PLI) | Global</p>
<hr>


<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<header class="card-header">
	<a href="<?= base_url('frontmenu');?>" class="float-right btn btn-outline-primary mt-1">Back</a>
	<h4 class="card-title mt-2">Registration</h4>
</header>
<article class="card-body">
<form method="POST" action="<?= base_url('');?>">
	<div class="form-row">
		<div class="col-md-8">
			<div id="my_camera"></div>			
			<input type="hidden" name="image" class="image-tag">
		</div> 
		<div class="col-md-4">
			<a class="float-center btn btn-outline-primary mt-1" onClick="take_snapshot()">Take Snapshot</a>
		</div> 
	</div> 
	<br />
	<div class="form-row">
		<div class="form-group col-md-6">
		  <label>Phone Number</label>
		  <select id="notelepon" name="phonenumberinput" class="form-control"></select>
		</div>
	</div> 
	<div class="form-row">
		<div class="col form-group col-md-8">
			<label>Full Nama </label>   
		  	<input type="text" class="form-control" placeholder="">
		</div> 
		<div class="col form-group col-md-4">
			<label>ID Card Number</label>   
		  	<input type="text" id="" name="" placeholder="" class="form-control">
		</div> 
	</div> 

	<div class="form-row">
		<div class="form-group col-md-6">
			<label class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="gender" value="option1">
				<span class="form-check-label"> Male </span>
			</label>
			<label class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="gender" value="option2">
				<span class="form-check-label"> Female</span>
			</label>
		</div> 
	</div> 

	<div class="form-group">
		<label>Email address</label>
		<input type="email" class="form-control" placeholder="">
	</div> 	

	<div class="form-row">
		<div class="form-group col-md-6">
			<label>Address</label>
			<textarea class="form-control" id="" name="" placeholder=""></textarea>
		</div> 
		<div class="form-group col-md-6">
		  <label>Country</label>
		  <select id="negara" class="form-control select2-multiple">
		  	<option value="ID" selected>Indonesia</option>
			<option value="MY">Malaysia</option>
			<option value="CN">China</option>
			<option value="IN">India</option>
			<option value="JP">Jepang</option>
			<option value="KR">Korea Selatan</option>			
			<option value="PH">Filipina</option>
			<option value="SG">Singapura</option>
			<option value="TH">Thailand</option>
			<option value="VN">Vietnam</option>
		  </select>
		</div> 
	</div> 

<!-- ========================================= -->
<div class="form-row">
	<div class="col form-group col-md-6">
		<label>Company Name</label>   
		<input type="text" id="" name="" placeholder="" class="form-control">
	</div> 
	<div class="form-group col-md-6">
		<label>Company Type</label>
		<?=form_dropdownDB('companytype', $companytypedata, 'Id', 'SourceTypeName', '', "id='companytype' class='form-control'");?>	
	</div> 
</div> 

<div class="form-row">
	<div class="col form-group col-md-6">
		<label>Host Name</label>   
		<input type="text" id="" name="" placeholder="" class="form-control">
	</div> 
	<div class="form-group col-md-6">
		<label>Department</label>
		<?=form_dropdownDB('hostdepartment', $hostdepartmentdata, 'Id', 'TargetVisitorType', '', "id='hostdepartment' class='form-control'");?>	
	</div> 
</div>

<div class="form-row">
	<div class="form-group col-md-6">
		<label>Purpose Visit</label>
		<?=form_dropdownDB('purpose', $purposedata, 'Id', 'PurposeVisit', '', "id='purpose' class='form-control'");?>	
	</div> 
</div> 
<!-- ========================================= -->
	<div class="form-group">
		<label>Notes</label>
		<textarea class="form-control" placeholder=""></textarea>
		<small class="form-text text-muted">put the notes if you have something to tell</small>
	</div> 

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">CHECK IN</button>
    </div> 

    <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>                                          
</form>
</article> 

<div class="border-top card-body text-center">Have an account? <a href="<?= base_url('login')?>">Log In</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div> 
<!--container end.//-->
<script language="JavaScript">
	var isFreeze = 'N';
    Webcam.set({
        width: 420,
        height: 320,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {   
		if(isFreeze=='N') {
			Webcam.snap( function(data_uri) {
				$(".image-tag").val(data_uri);
				Webcam.freeze();
			} );
			isFreeze = 'Y';
		} else {
			Webcam.unfreeze();
			isFreeze = 'N';
		}
    }
	$(document).ready(function() {
		let notelepon = [
                "081398081536", "08111223344556", "081212312345", "085765432181", "088995568415", "0789456123", "0123456789", "098547226", "0845127456", "045561187924",
                "065428791", "048719642", "07845879156", "0878945197854", "04568740087", "01288785451", "0877544898"
            ];

            $("#notelepon").select2({
                tags: true,
                placeholder: "Pilih atau tambahkan no.telepon",
                data: notelepon.map(notelp => ({ id: notelp, text: notelp })),
                allowClear: true
            });
			$('#notelepon').on("change", function(e) { 
				// alert($(this).val());
			});

			$('#negara').select2({
                placeholder: "Choose Country",
                allowClear: true
            });

			$('#hostdepartment').select2({
                placeholder: "Choose Host Department",
                allowClear: true
            });

			$('#companytype').select2({
                placeholder: "Choose Company Type",
                allowClear: true
            });

			$('#purpose').select2({
                placeholder: "Choose Purpose",
                allowClear: true
            });
	});
</script>
<br /><br />

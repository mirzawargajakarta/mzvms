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
<form method="POST" action="<?= base_url('frontmenu/checkin');?>">
<input type="hidden" id="visitorid" name="visitorid" value="N">
<input type="hidden" id="newphonenumber" name="newphonenumber" value="1">

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
		  <input type="text" id="notelepon" name="notelepon" class="form-control allownumericwithoutdecimal" placeholder="">
		</div>
	</div> 
	<div class="form-row">
		<div class="col form-group col-md-8">
			<label>Full Nama </label>   
		  	<input type="text" class="form-control" id="fullname" name="fullname" placeholder="">
		</div> 
		<div class="col form-group col-md-4">
			<label>ID Card Number</label>   
		  	<input type="text" id="idcardno" name="idcardno" placeholder="" class="form-control">
		</div> 
	</div> 

	<div class="form-row">
		<div class="form-group col-md-6">
			<label class="form-check form-check-inline">
				<input class="form-check-input" type="radio" id="male" name="gender" value="M">
				<span class="form-check-label"> Male </span>
			</label>
			<label class="form-check form-check-inline">
				<input class="form-check-input" type="radio" id="female" name="gender" value="F">
				<span class="form-check-label"> Female</span>
			</label>
		</div> 
	</div> 

	<div class="form-group">
		<label>Email address</label>
		<input type="email" class="form-control" id="email" name="email" placeholder="">
	</div> 	

	<div class="form-row">
		<div class="form-group col-md-6">
			<label>Address</label>
			<textarea class="form-control" id="address" name="address" placeholder=""></textarea>
		</div> 
		<div class="form-group col-md-6">
		  <label>Country</label>
		  <select id="negara" name="negara" class="form-control select2-multiple">
		  	<option value=""></option>
		  	<option value="ID">Indonesia</option>
			<option value="MY">Malaysia</option>
			<option value="CN">China</option>
			<option value="IN">India</option>
			<option value="JP">Japan</option>
			<option value="KR">South Korea</option>
			<option value="SG">Singapore</option>
			<option value="TH">Thailand</option>
			<option value="AU">Australia</option>
			<option value="US">America</option>
			<option value="AE">Arab Emirates Union</option>
			<option value="GB">England</option>
		  </select>
		</div> 
	</div> 

<!-- ========================================= -->
<div class="form-row">
	<div class="col form-group col-md-6">
		<label>Company Name</label>   
		<input type="text" id="company" name="company" placeholder="" class="form-control">
	</div> 
	<div class="form-group col-md-6">
		<label>Company Type</label>
		<?=form_dropdownDB_init('companytype', $companytypedata, 'Id', 'SourceTypeName', '','','', "id='companytype' class='form-control'");?>	
	</div> 
</div> 

<div class="form-row">
	<div class="col form-group col-md-6">
		<label>Host Name</label>   
		<input type="text" id="hostname" name="hostname" placeholder="" class="form-control">
	</div> 
	<div class="form-group col-md-6">
		<label>Department</label>
		<?=form_dropdownDB_init('hostdepartment', $hostdepartmentdata, 'Id', 'TargetVisitorType', '','','', "id='hostdepartment' class='form-control'");?>	
	</div> 
</div>

<div class="form-row">
	<div class="form-group col-md-6">
		<label>Purpose Visit</label>
		<?=form_dropdownDB_init('purpose', $purposedata, 'Id', 'PurposeVisit', '', '','',"id='purpose' class='form-control'");?>	
	</div> 
</div> 
<!-- ========================================= -->
	<div class="form-group">
		<label>Notes</label>
		<textarea class="form-control" id="notes" name="notes" placeholder=""></textarea>
		<small class="form-text text-muted">put the notes if you have something to tell</small>
	</div> 

    <div class="form-group">
        <input type="submit" name="submit" value="CHECK IN" class="btn btn-primary btn-block">
    </div>
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
		constraints: { facingMode: environment },
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

	$(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

	$(document).ready(function() {
			// let notelepon = [ "",
				// <?php 
				// 	$i = 0;
				// 	for ($x = 0; $x < count($notelpdata); $x++) {
				// 		$notelp	= $notelpdata[$x]['PhoneNumber'];
				// 		if($x>0) {
				// 			echo ',';
				// 		}
				// 		echo '"'.$notelp.'"';
				// 		if($i==10) {
				// 			$i=0;
				// 			echo "\n";
				// 		}
				// 		$i++;
				// 	}
				// ?>				
			// ];

            $("#notelepon").focus();

			$('#notelepon').on("blur", function(e) { 
				var nomortelp = $(this).val();                
				$.ajax({
					url: '<?= base_url("frontmenu/getVisitorDetail");?>', 
					method: 'POST',
					data: { notelp: nomortelp },
					dataType: 'json',
					success: function(data) {
						var Gender = data.Gender;
						if(Gender == 'M') {
							$( "#male" ).prop( "checked", true );
							$( "#female" ).prop( "checked", false );
						} else if (Gender == 'F') {
							$( "#male" ).prop( "checked", false );
							$( "#female" ).prop( "checked", true );
						} else {
							$( "#male" ).prop( "checked", false );
							$( "#female" ).prop( "checked", false );
						}
						$('#newphonenumber').val(data.isNew);
						$('#fullname').val(data.Nama);						
						$('#email').val(data.Email);
						$('#address').val(data.Alamat);
						$('#idcardno').val(data.IDCard);
						$('#visitorid').val(data.Id);
						$('#negara').val(data.Negara).change();
					}				
				});
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

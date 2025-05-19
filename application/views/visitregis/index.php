<link rel="icon" href="<?= base_url('assets/img/24506d8768900869e2f21fc018cc1a5e.png'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href=<?= base_url('assets/css/select2-theme.css'); ?>" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!-- jQuery Validation -->
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<style>
	body {
		background-image: url("<?= base_url('assets/img/background.png')?>");
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
    .register-box {
      background: white;
      padding: 30px;
      border-radius: 10px;
      width: 400px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.1);
    }
    label.error {
      color: red;
      font-size: 0.8em;
      margin-top: 5px;
	  font-weight: normal;
    }
  </style>

<div class="container">
<br>  <p class="text-center"><a href="https://www.petronas.com/">Petronas</a> Carigali Ketapang II Ltd (PCK2L)</p>
<hr>


<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<header class="card-header">
	<h4 class="card-title mt-2">Confirmation Registration</h4>
</header>
<article class="card-body">
<form id="registerForm">
<input type="hidden" id="invdtlid" name="invdtlid" value="<?=$invdtlid?>">
<input type="hidden" id="newphonenumber" name="newphonenumber" value="1">

	<div class="form-row">
		<div class="col-md-8">
			Please take picture of your ID Card
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
		  <label>ID Card Number</label>
		  <input type="text" id="idcardno" name="idcardno" placeholder="" class="form-control">
		</div>
	</div> 
	<div class="form-row">
		<div class="col form-group col-md-8">
			<label>Full Name</label>   
		  	<input type="text" class="form-control" id="fullname" name="fullname" placeholder="">
		</div> 
		<div class="col form-group col-md-4">
			<label>Phone Number</label>		  	
		  	<input type="text" id="notelepon" name="notelepon" value="<?=$VisitorWA?>" class="form-control" readonly>
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
			</label><br>
			<label for="gender" class="error"></label>
		</div> 
	</div> 

	<div class="form-group">
		<label>Email address</label>
		<input type="email" class="form-control" id="email" name="email" value="<?=$VisitorEmail?>">
	</div> 	

	<div class="form-row">
		<div class="form-group col-md-6">
			<label>Address</label>
			<textarea class="form-control" id="address" name="address" placeholder=""></textarea>
		</div> 
		<div class="form-group col-md-6">
		  <label>Country</label>
		  <select id="negara" name="negara" class="selectform form-control select2-multiple">
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
			<option value="AE">United Arab Emirates</option>
			<option value="GB">England</option>
		  </select>
		  <label for="negara" class="error"></label>
		</div> 
	</div> 

	<div class="form-group">
		<label>Notes</label>
		<textarea class="form-control" id="notes" name="notes" placeholder=""></textarea>
		<small class="form-text text-muted">put the notes if you have something to tell</small>
	</div> 

    <div class="form-group">
		<button type="submit" id="submitbtn" class="btn btn-primary btn-block">SAVE</button>
    </div>
</form>
</article> 

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
		constraints :{  facingMode:'environment' }, //using 'environment' instead of 'user'' to use rear camera for mobile phone
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
		$('#registerForm').validate({
			rules: {
				fullname:  "required",
				idcardno: {
					required: true,
					minlength: 2
				},
				gender:  "required",
				email:  "required",
				address: {
					required: true,
					minlength: 3
				},
				negara:  "required"
			},
			messages: {				
				fullname: "Fullname must not be blank",
				idcardno: {
					required: "ID Card number must not be blank",
					minlength: "Minimum 2 chars"
				},
				gender:  "Gender must be selected",
				email: "Email must not be blank",
				address: {
					required: "Address must not be blank",
					minlength:  "Minimum 2 chars"
				},
				negara: "Country must be selected"
			},
			submitHandler: function (form) {
					$("#submitbtn").html("<i class='fa fa-refresh fa-spin'></i>..Wait for Processing..");
					$("#submitbtn").prop("disabled",true);
					$.ajax({
					url: '<?= base_url("visitregis/konfirmasisave");?>',
					type: 'POST',
					data: $(form).serialize(),
					success: function (response) {
						let res = JSON.parse(response);
						if (res.status === 'success') {
							$("#submitbtn").html("DONE");
							Swal.fire({
								icon: "success",
								title: "Success!",
								text: res.message,
								showConfirmButton: true,
								confirmButtonText: "Print QR",
								showCancelButton: true,
								cancelButtonText: "Don't Print"
							}).then((result) => {
								if (result.isConfirmed) {
									<?php $backurl	= base_url('visitregis/printQR/?qrcode='); ?>
									var uriencode = encodeURI(res.qrcode);
									window.location.href = '<?=$backurl?>'+uriencode;
								}
							});
							form.reset();
							$(".selectform").val("").change();
						} else {
							Swal.fire('FAILED!', res.message, 'error');
						}
					},
					error: function () {
						Swal.fire('Error!', 'Fail on connection to server', 'error');
					}
				});
				return false;
			}
		});

		$("#idcardno").focus();

		$('#negara').select2({
			placeholder: "Choose Country",
			allowClear: true
		});
	});
</script>
<br /><br />

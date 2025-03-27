<link rel="icon" href="<?= base_url('assets/img/24506d8768900869e2f21fc018cc1a5e.png'); ?>">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<div class="container">
<br>  <p class="text-center">More bootstrap 4 components on <a href="http://bootstrap-ecommerce.com/"> Petronas</a></p>
<hr>


<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<header class="card-header">
	<a href="<?= base_url('frontmenu');?>" class="float-right btn btn-outline-primary mt-1">Kembali</a>
	<h4 class="card-title mt-2">Registrasi</h4>
</header>
<article class="card-body">
<form method="POST" action="<?= base_url('');?>">
	<div class="form-row">
		<div class="col-md-8">
			<div id="my_camera"></div>			
			<input type="hidden" name="image" class="image-tag">
		</div> <!-- form-group end.// -->
		<div class="col-md-4">
			<a class="float-center btn btn-outline-primary mt-1" onClick="take_snapshot()">Take Snapshot</a>
		</div> <!-- form-group end.// -->
	</div> <!-- form-group end.// -->

	<div class="form-row">
		<div class="col form-group">
			<label>First name </label>   
		  	<input type="text" class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
		<div class="col form-group">
			<label>Last name</label>
		  	<input type="text" class="form-control" placeholder=" ">
		</div> <!-- form-group end.// -->
	</div> <!-- form-row end.// -->

	<div class="form-group">
		<label>Email address</label>
		<input type="email" class="form-control" placeholder="">
		<small class="form-text text-muted">We'll never share your email with anyone else.</small>
	</div> <!-- form-group end.// -->

	<div class="form-group">
		<label class="form-check form-check-inline">
		  <input class="form-check-input" type="radio" name="gender" value="option1">
		  <span class="form-check-label"> Male </span>
		</label>
		<label class="form-check form-check-inline">
		  <input class="form-check-input" type="radio" name="gender" value="option2">
		  <span class="form-check-label"> Female</span>
		</label>
	</div> <!-- form-group end.// -->

	<div class="form-row">
		<div class="form-group col-md-6">
		  <label>City</label>
		  <input type="text" class="form-control">
		</div> <!-- form-group end.// -->
		<div class="form-group col-md-6">
		  <label>Country</label>
		  <select id="inputState" class="form-control">
		    <option> Choose...</option>
		      <option>Uzbekistan</option>
		      <option>Russia</option>
		      <option selected="">United States</option>
		      <option>India</option>
		      <option>Afganistan</option>
		  </select>
		</div> <!-- form-group end.// -->
	</div> <!-- form-row.// -->

	<div class="form-group">
		<label>Notes</label>
		<textarea class="form-control" placeholder=""></textarea>
		<small class="form-text text-muted">put the notes if you have suggestions</small>
	</div> <!-- form-group end.// -->

	<div class="form-group">
		<label>Create password</label>
	    <input class="form-control" type="password">
	</div> <!-- form-group end.// -->  
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Register  </button>
    </div> <!-- form-group// -->

    <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>                                          
</form>
</article> <!-- card-body end .// -->

<div class="border-top card-body text-center">Have an account? <a href="">Log In</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div> 
<!--container end.//-->
<script language="JavaScript">
	var isFreeze = 'N';
    Webcam.set({
        width: 460,
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
</script>
<br /><br />

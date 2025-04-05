<link rel="icon" href="<?= base_url('assets/img/24506d8768900869e2f21fc018cc1a5e.png'); ?>">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href=<?= base_url('assets/css/select2-theme.css'); ?>" rel="stylesheet" />

<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<div class="container">
<br>  <p class="text-center"><a href="https://id.pli-petronas.com">PETRONAS</a> Lubricants International (PLI) | Global</p>
<hr>


<div class="row justify-content-center">
<div class="col-md-12">
<div class="card">
<header class="card-header">
	<a href="<?= base_url('frontmenu');?>" class="float-right btn btn-outline-primary mt-1" id="backbutton">Back</a>
	<h4 class="card-title mt-2">Visitor has checked out</h4>
</header>
<article class="card-body">
	<div class="form-row">
		<div class="col-md-6"><label>Checkedin on <?=$checkintimeindformat?></label></div>
		<div class="col-md-6"><label>Checkedout on <?=$checkouttimeindformat?></label></div>
	</div>
	<div class="form-row">
		<div class="col-md-6">
			<div id="checkinpic"><img src="<?=base_url('assets/uploads/checkin/').$ciimg?>"></div>	
		</div> 
		<div class="col-md-6">
			<div id="checkinpic"><img src="<?=base_url('assets/uploads/checkout/').$coimg?>"></div>
		</div> 
	</div> 	
	<br />
	<div class="row">
		<div class="col-md-6">
		  <label>Fullname :</label>
		  <?=$fullname?>
		</div>
		<div class="col-md-6">
		  <label>Phone Number :</label>
		  <?=$phone?>
		</div>
	</div> 
<!-- ========================================= -->
	<div class="form-group">
		<label>Notes :</label>
		<?=$notes?>
	</div> 
</article> 

<div class="border-top card-body text-center">Have an account? <a href="<?= base_url('login')?>">Log In</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div> 
<!--container end.//-->
<script language="JavaScript">

	$(document).ready(function() {
            $("#backbutton").focus();
			
	});
</script>
<br /><br />

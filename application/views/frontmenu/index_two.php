<html>
	<head>
		<link rel="icon" href="<?= base_url('assets/img/assets/img/24506d8768900869e2f21fc018cc1a5e.png'); ?>">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<title><?php echo $title;?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			body {
				background-image: url("<?= base_url('assets/img/background.png')?>");
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-size: 100% 100%;
			}
			
			a:link { text-decoration: none; }
			a:visited { color: black; }
			a:hover { text-decoration: none; }
			a:active { text-decoration: none; }
			.block {
				display: block;
				width: 100%;
				border: none;
				border-radius: 10px;
				background-color: #01A49C;
				color: white;
				padding: 14px 28px;
				font-size: 32px;
				font-weight: 600;
				font-family: Verdana, Geneva, Tahoma, sans-serif;
				cursor: pointer;
				text-align: center;
			}
			.block:hover {
				background-color: #01ADA5;
				color: #3A3533;
			}
		</style>
	</head>
<body>

<!-- <br /><br /><br /><br /> -->

<div class="container">
	<div class="row justify-content-md-center my-5">
		<div class="col col-md-5">
			<a href="<?= base_url('frontmenu/registration');?>">
				<button class="block">CHECK-IN</button>
			</a>
		</div>
		<div class="col offset-md-2">
			<a href="<?= base_url('frontmenu/scanqrcode');?>">
				<button class="block">SCAN QR</button>
			</a>
		</div>
	</div>
	<div class="row my-5">
		<div class="col col-md-5">
			<a href="<?= base_url('visiting');?>">
				<button class="block">Administration</button>
			</a>
		</div>
  	</div>
</div>

</body>
</html>

<html>
	<head>
		<link rel="icon" href="<?= base_url('assets/img/assets/img/24506d8768900869e2f21fc018cc1a5e.png'); ?>">
		<title><?php echo $title;?></title>
		<style>
			a:link { text-decoration: none; }
			a:visited { color: black; }
			a:hover { text-decoration: none; }
			a:active { text-decoration: none; }
			*{
				margin: 0;
				padding: 0;
				box-sizing: border-box;
			}
			.stage{
				height: 640px;
				width: 480px;
				background:rgb(216, 232, 253);
				margin-top: 80px;
				margin-left: auto;
				margin-right: auto;
				border-radius: 20px;
			}
			.p{
				font-size: 48px;
				text-align: center;
				margin-top: 40px;
				height: 80px;
				cursor: pointer;
				width: 100%;
				background:rgb(126, 190, 250);
				border-radius: 10px;
				font-family: Century Gothic;
				letter-spacing: 5px;
			}
			.div{
				margin-left: auto;
				margin-right: auto;
				border-radius: 10px;
				width: 320px;
				height: 80px;
				margin-top: 10%;
				transition-duration: 0.2s;
			}
			.p:hover{
				background: #89C2F7;
				color: black;
			}
			.div:nth-child(odd){
				transform: perspective(480px) rotateY(45deg);
				box-shadow: -2px 2px 7px gray;
			}
			.div:nth-child(even){
				transform: perspective(480px) rotateY(-45deg);
				box-shadow: 2px 2px 7px gray;
			}
			.div:hover{
				transform: rotateY(0);
				background: white;
				color: black;
				box-shadow: 0px 0px 0px;
			}
		</style>
	</head>
<body>
	<!-- <br /><br /><br /><br /> -->

	<section class="stage">
	<br />
		<div class="div" id="registration">
			<a href="<?= base_url('frontmenu/registration');?>">
				<p class="p">Registration</p>
			</a>
		</div>
		<div class="div" id="readqrcode">
			<a href="<?= base_url('frontmenu/readqrcode');?>">
				<p class="p">Scan QR</p>
			</a>
		</div>
		<div class="div" id="invitation">
			<a href="<?= base_url('invitation');?>">
				<p class="p">Invitation</p>
			</a>
		</div>
		<div class="div" id="admin">
			<a href="<?= base_url('visiting');?>">
				<p class="p">Admin</p>
			</a>
		</div>
	</section>
</body>
</html>

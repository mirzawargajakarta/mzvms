<?php
$backurl	= base_url('frontmenu');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PrintQR</title>
	<style>
		@media print {
			.pe-no-print {
				display: none !important;
			}

			.pe-preserve-ancestor {
				display: block !important;
				margin: 0 !important;
				padding: 0 !important;
				border: none !important;
				box-shadow: none !important;
			}
		}
	</style>
</head>
<body>
<h2>PETRONAS</h2>
<h3>VISITOR RECEIPT</h3>
	<p><?=$nama?> (<?=$gendertxt = ($gender=='M')?'MALE':'FEMALE';?>)</p>
	<p><?=$notelp?></p>
	<p><?=$alamat?></p>
	<p><?=$noidcard?></p>
	<p><?=$company?></p>
	<p>Host : <?=$hostname?> (<?=$target?>)</p>
	<p>Purpose : <?=$purpose?></p>
	<img src="<?=$qrimage?>">
	<p><?=$checkintime_indformat?></p>
	<p class="pe-no-print"><button onclick="window.print()">Print</button>&nbsp;&nbsp;<button onclick="window.location.href = '<?=$backurl?>'">Back</button></p>
</body>
</html>

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
			@page {
				size: 3.3in 4.2in;
				margin: 0.1in;
			}
			p {
				page-break-before: avoid; /* Never break the content into pages, except when it doesn’t fit on one page. */
			}
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
		.rapatatas {
			line-height: 0.1;
		}
		.rapatsedang {
			line-height: 0.3;
		}
		.rapatbesar {
			line-height: 1.0;
		}
		.hurufnormal {
			font-weight: normal;
		}
		.hurufsedangtebal {
			font-size: 14px;
		}
		.hurufnormaltebal {
			font-weight: bold;
			font-size: 12px;
		}
		.hurufnbesartebal {
			font-weight: bold;
			font-size: 18px;
		}
		.hurufkecil {
			font-size: 10px;
		}
		.hurufsedang {
			font-size: 10px;
		}
	</style>
</head>
<body>
<p class="hurufnbesartebal rapatsedang">PETRONAS</p>
<p class="hurufsedangtebal rapatatas">VISITOR RECEIPT</p>
<p class="hurufsedang rapatatas">------------------------------------------</p>
<p class="hurufnormaltebal rapatatas"><?=$nama?> (<?=$gendertxt = ($gender=='M')?'male':'female';?>)</p>
<p class="hurufsedang rapatatas"><?=$notelp?></p>
<p class="hurufsedang rapatatas"><?=$alamat?></p>
<p class="hurufsedang rapatatas"><?=$noidcard?></p>
<p class="hurufsedang rapatatas"><?=$company?></p>
<p class="hurufsedang rapatatas">Host : <?=$hostname?> (<?=$target?>)</p>
<p class="hurufsedang rapatatas">Purpose : <?=$purpose?></p>
<img src="<?=$qrimage?>">
<p class="hurufkecil rapatatas">&nbsp;&nbsp;&nbsp;&nbsp;<?=$checkintime_indformat?></p>
<p class="pe-no-print"><button onclick="window.location.href = '<?=$backurl?>'">Back</button>&nbsp;&nbsp;&nbsp;&nbsp;<button onclick="window.print()">Print</button></p>
</body>
</html>

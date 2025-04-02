<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PrintQR</title>
</head>
<body>
<h2>PETRONAS</h2>
<h3>VISITOR RECEIPT</h3>
	<table>		
		<tr>
			<td><?=$nama?></td><td> (<?=$gendertxt = ($gender=='M')?'MALE':'FEMALE';?>)</td>
		</tr>
		<tr>
			<td><?=$notelp?></td><td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">
				<img src="<?=$qrimage?>">
			</td>
		</tr>
	</table>
	<button onclick="window.print()">Print</button>
</body>
</html>

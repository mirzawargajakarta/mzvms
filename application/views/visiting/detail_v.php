<div class="row">
    <div class="col-md-6">
		<table class="text-black table">
			<tr class="align-text-top">
				<td align="center">Check-in Time <?=$data['CheckInTimeIndFmt']?></td>
			</tr>
			<tr class="align-text-top">
				<td align="center"><img src="<?= base_url('assets/uploads/checkin/'.$data['FileCI']); ?>" height="200"></td>
			</tr>
		</table>
	</div>
    <div class="col-md-6">
		<table class="text-black table">
			<tr class="align-text-top">
				<td align="center">Check-out Time <?=$data['CheckOutTimeIndFmt']?></td>
			</tr>
			<tr class="align-text-top">
				<td align="center"><img src="<?= base_url('assets/uploads/checkout/'.$data['FileCO']); ?>" height="200"></td>
			</tr>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
        <table class="text-black table">
            <tr class="align-text-top">
                <td width="100px">Host </td>
                <td width="5px">:</td>
                <td class="font-weight-bold"><?=$data['HostName']?></td>
            </tr>
            <tr class="align-text-top">
                <td>Host Department</td>
                <td>:</td>
                <td class="font-weight-bold"><?=$data['TargetVisitorType']?></td>
            </tr>
            <tr class="align-text-top">
                <td>Name</td>
                <td>:</td>
                <td class="font-weight-bold"><?=$data['Nama']?></td>
            </tr>
            <tr class="align-text-top">
                <td>Company</td>
                <td>:</td>
                <td class="font-weight-bold"><?=$data['SourceCompany']?></td>
            </tr>
            <tr class="align-text-top">
                <td>Company Type</td>
                <td>:</td>
                <td class="font-weight-bold"><?=$data['SourceTypeName']?></td>
            </tr>
        </table>
    </div>
</div>



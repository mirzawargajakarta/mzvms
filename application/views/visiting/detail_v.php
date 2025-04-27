<div class="row">
    <div class="col-md-6">
		<table class="text-black table">
			<tr class="align-text-top">
				<td align="center">Check-in Time <?=$data['CheckInTimeIndFmt']?></td>
			</tr>
			<tr class="align-text-top">
				<td align="center">
					<?php
						if($data['FileCI']=='') {
							echo "- No Checkin Picture -";
						} else {
					?>
					<img src="<?= base_url('assets/uploads/checkin/'.$data['FileCI']); ?>" height="200">
					<?php }?>
				</td>
			</tr>
		</table>
	</div>
    <div class="col-md-6">
		<table class="text-black table">
			<tr class="align-text-top">
				<td align="center">Check-out Time <?=$data['CheckOutTimeIndFmt']?></td>
			</tr>
			<tr class="align-text-top">
				<td align="center">
					<?php
						if($data['FileCO']=='') {
							echo "- No Checkout Picture -";
						} else {
					?>
					<img src="<?= base_url('assets/uploads/checkout/'.$data['FileCO']); ?>" height="200">
					<?php }?>
				</td>
			</tr>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
        <table class="text-black table">
            <tr class="align-text-top">
                <td width="160px">Host </td>
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
	<div class="col-md-6">
        <table class="text-black table">
            <tr class="align-text-top">
                <td width="160px">Address </td>
                <td width="5px">:</td>
                <td class="font-weight-bold"><?=$data['HostName']?></td>
            </tr>
            <tr class="align-text-top">
                <td>ID Card</td>
                <td>:</td>
                <td class="font-weight-bold"><?=$data['IDCard']?></td>
            </tr>
            <tr class="align-text-top">
                <td>Phone</td>
                <td>:</td>
                <td class="font-weight-bold"><?=$data['PhoneNumber']?></td>
            </tr>
            <tr class="align-text-top">
                <td>Email</td>
                <td>:</td>
                <td class="font-weight-bold"><?=$data['Email']?></td>
            </tr>
            <tr class="align-text-top">
                <td>Purpose Visit</td>
                <td>:</td>
                <td class="font-weight-bold"><?=$data['PurposeVisit']?></td>
            </tr>
			<tr class="align-text-top">
                <td>Notes</td>
                <td>:</td>
                <td class="font-weight-bold"><?=$data['PVDescription']?></td>
            </tr>
        </table>
    </div>
</div>



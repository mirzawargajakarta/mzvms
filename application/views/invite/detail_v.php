

<div class="row">
	<div class="col-md-12">
        <table class="text-black table">
            <tr class="align-text-top">
                <td width="160px" class="font-weight-bold">Invitation Date </td>
                <td width="5px">:</td>
                <td><?=$dataM['EventDate']?></td>
            </tr>
            <tr class="align-text-top">
                <td class="font-weight-bold">Event Name</td>
                <td>:</td>
                <td><?=$dataM['EventName']?></td>
            </tr>
            <tr class="align-text-top">
                <td class="font-weight-bold">Event Description</td>
                <td>:</td>
                <td><?=$dataM['Description']?></td>
            </tr>
            <tr class="align-text-top">
                <td class="font-weight-bold">Messages</td>
                <td>:</td>
                <td><?=nl2br($dataM['InvMsg'])?></td>
            </tr>
        </table>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
        <table class="text-black table">
            <tr class="align-text-top">
                <td width="5px" class="font-weight-bold">#</td>
                <td class="font-weight-bold">Name</td>
                <td class="font-weight-bold">WA</td>
				<td class="font-weight-bold">Email</td>
            </tr>
			<?php $i = 1; ?>
			<?php foreach ($dataD as $row) : ?>
            <tr class="align-text-top">
                <td><?=$i++?></td>
                <td><?=$row['VisitorName']?></td>
                <td><?=$row['VisitorWA']?></td>
				<td><?=$row['VisitorEmail']?></td>
            </tr>
			<?php endforeach; ?>
        </table>
    </div>
</div>



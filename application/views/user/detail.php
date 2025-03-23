<div class="row">
    <div class="col-md-3">
        <img src="<?= base_url('assets/img/'); ?><?= $user->foto ? $user->foto : 'noprofil.png'; ?>" height="300" class="w-100 rounded">
    </div>
    <div class="col-md-9">
        <table class="text-black table">
            <tr class="align-text-top">
                <td width="150px">Username </td>
                <td width="5px">:</td>
                <td class="font-weight-bold"><?= $user->username; ?></td>
            </tr>
            <tr class="align-text-top">
                <td>Nama</td>
                <td>:</td>
                <td class="font-weight-bold"><?= $user->nama_user; ?></td>
            </tr>
            <tr class="align-text-top">
                <td>Telpon</td>
                <td>:</td>
                <td class="font-weight-bold"><?= $user->telpon; ?></td>
            </tr>
            <tr class="align-text-top">
                <td>Profil </td>
                <td>:</td>
                <td class="font-weight-bold"><?= $user->profil; ?></td>
            </tr>
            <tr class="align-text-top">
                <td>Aktif </td>
                <td>:</td>
                <td class="font-weight-bold"><?= $user->aktif; ?></td>
            </tr>
        </table>
    </div>
</div>
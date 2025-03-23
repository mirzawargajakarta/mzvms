<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content p-3">

        <div class="rounded mt-4 p-4 bg-white shadow-lg">
            <h3><?= $title; ?></h3>
        </div>

        <div class="rounded mt-4 p-4 bg-white shadow-lg">

            <form role="form" id="my-form" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="username">Username <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : null; ?>" id="username" name="username" autocomplete="off" required value="<?= isset($ubah) ? $ubah->username : ''; ?>">
                    <?= form_error('username'); ?>
                </div>

                <?php if (!isset($ubah)) : ?>
                    <div class="form-group">
                        <label for="password">Password <span class="text-danger">* (Min Length 8 Character)</span></label>
                        <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : null; ?>" id="password" name="password" autocomplete="off" required minlength="8">
                        <?= form_error('password'); ?>
                    </div>
                    <div class="form-group">
                        <label for="passconfirm">Konfimasi Password <span class="text-danger">* (Min Length 8 Character)</span></label>
                        <input type="password" class="form-control <?= form_error('passconfirm') ? 'is-invalid' : null; ?>" id="passconfirm" name="passconfirm" autocomplete="off" required minlength="8" data-parsley-equalto="#password">
                        <?= form_error('passconfirm'); ?>
                    </div>
                <?php endif ?>

                <div class="form-group">
                    <label for="nama_user">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= form_error('nama_user') ? 'is-invalid' : null; ?>" id="nama_user" name="nama_user" autocomplete="off" required value="<?= isset($ubah) ? $ubah->nama_user : ''; ?>">
                    <?= form_error('nama_user'); ?>
                </div>

                <div class="form-group">
                    <label for="telpon">Telpon</label>
                    <input type="text" class="form-control <?= form_error('telpon') ? 'is-invalid' : null; ?>" id="telpon" name="telpon" autocomplete="off" value="<?= isset($ubah) ? $ubah->telpon : ''; ?>">
                    <?= form_error('telpon'); ?>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_profil">Profil <span class="text-danger">*</span></label>
                            <select id="id_profil" class="select2bs4 form-control <?= form_error('id_profil') ? 'is-invalid' : null; ?>" name="id_profil" required>
                                <option value="">-- Pilih Profil --</option>
                                <?php foreach ($profil as $row) : ?>
                                    <option value="<?= $row->id_profil; ?>" <?= isset($ubah) && $ubah->id_profil == $row->id_profil ? 'selected' : ''; ?>><?= $row->profil; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_profil'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="aktif">Aktif <span class="text-danger">*</span></label>
                            <select id="aktif" class="form-control <?= form_error('aktif') ? 'is-invalid' : null; ?>" name="aktif" required>
                                <option value="Yes" <?= isset($ubah) && $ubah->aktif == 'Yes' ? 'selected' : ''; ?>>Yes</option>
                                <option value="No" <?= isset($ubah) && $ubah->aktif == 'No' ? 'selected' : ''; ?>>No</option>
                            </select>
                            <?= form_error('aktif'); ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label for="foto">Foto User <span class="text-danger">(Max Size 500kb, Type PNG, JPEG, JPG)</span></label>
                        <div>
                            <input type="file" id="real-file" hidden="hidden" name="foto">
                            <button type="button" class="btn btn-outline-success" id="custom-button">
                                Upload File <i class="fas fa-upload ml-2"></i>
                            </button>
                            <span id="custom-text" class="text-secondary ml-2">Tidak ada file yang diupload</span>
                        </div>
                        <?= form_error('foto'); ?>
                    </div>

                    <div class="form-group">
                        <img id="prev" src="<?= base_url('assets/img/'); ?><?= isset($ubah) && $ubah->foto  ? $ubah->foto : 'noprofil.png'; ?>" height="270" class="w-40 rounded">
                    </div>
                </div>

                <input type="hidden" name="foto_lama" value="<?= isset($ubah) ? $ubah->foto : ''; ?>">

                <a class="mr-2 mt-3 btn btn-danger " href="<?= base_url('user'); ?>" role="button">
                    Batal <i class="fa fa-times ml-2"></i>
                </a>
                <button class="mt-3 btn btn-primary" type="submit"><?= isset($ubah)  ? 'Ubah' : 'Tambah'; ?> <i class="fas fa-paper-plane ml-2"></i></button>

            </form>

        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('templates/footer.php'); ?>

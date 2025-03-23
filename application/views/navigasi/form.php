<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content p-3">

        <div class="rounded mt-4 p-4 bg-white shadow-lg ">
            <h1 class="h3 text-black"><?= $title; ?></h1>
        </div>

        <div class="rounded mt-4 p-4 bg-white shadow-lg ">

            <form role="form" id="my-form" method="post">

                <div class="form-group">
                    <label for="navigasi">Navigasi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= form_error('navigasi') ? 'is-invalid' : null; ?>" id="navigasi" name="navigasi" autocomplete="off" required value="<?= isset($ubah) ? $ubah->navigasi : ''; ?>">
                    <?= form_error('dropdown'); ?>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="heading">Heading </label>
                            <input type="text" class="form-control <?= form_error('heading') ? 'is-invalid' : null; ?>" id="heading" name="heading" autocomplete="off" value="<?= isset($ubah) ? $ubah->heading : ''; ?>">
                            <?= form_error('dropdown'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="url">Url <span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?= form_error('url') ? 'is-invalid' : null; ?>" id="url" name="url" autocomplete="off" required value="<?= isset($ubah) ? $ubah->url : ''; ?>">
                            <?= form_error('dropdown'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="dropdown">Dropdown <span class="text-danger">*</span></label>
                            <select id="dropdown" class="form-control <?= form_error('dropdown') ? 'is-invalid' : null; ?> select2bs4" name="dropdown">
                                <option value="0">No</option>
                                <?php $data = $this->Default_m->getAll('tabel_navigasi', 'id_navigasi')->result(); ?>
                                <?php foreach ($data as $row) : ?>
                                    <?php if ($row->dropdown == 0) : ?>
                                        <option value="<?= $row->id_navigasi; ?>" <?= isset($ubah) && $ubah->dropdown == $row->id_navigasi ? 'selected' : ''; ?>><?= $row->navigasi; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('dropdown'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="icon">Icon </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend" data-toggle="modal" data-target="#exampleModal">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control <?= form_error('profil') ? 'is-invalid' : null; ?>" id="icon" name="icon" placeholder="Klik icon seacrh untuk pilih icon atau input manual icon" value="<?= isset($ubah) ? $ubah->icon : ''; ?>">
                                <?= form_error('dropdown'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="urutan">Urutan <span class="text-danger">*</span></label>
                            <input type="number" class="form-control <?= form_error('urutan') ? 'is-invalid' : null; ?>" id="urutan" name="urutan" required value="<?= isset($ubah) ? $ubah->urutan : ''; ?>">
                            <?= form_error('dropdown'); ?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="aktif">Aktif <span class="text-danger">*</span></label>
                            <select id="aktif" class="form-control <?= form_error('aktif') ? 'is-invalid' : null; ?>" name="aktif">
                                <option value="Yes" <?= isset($ubah) && $ubah->aktif == 'Yes' ? 'selected' : ''; ?>>Yes</option>
                                <option value="No" <?= isset($ubah) && $ubah->aktif == 'No' ? 'selected' : ''; ?>>No</option>
                            </select>
                            <?= form_error('dropdown'); ?>
                        </div>
                    </div>
                </div>

                <a class="mr-2 mt-3 btn btn-danger " href="<?= base_url('navigasi'); ?>" role="button">Batal <i class="fa fa-times ml-2"></i></a>
                <button class="mt-3 btn btn-primary" type="submit"><?= isset($ubah) ? 'Ubah' : 'Tambah'; ?> <i class="fas fa-paper-plane ml-2"></i></button>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- modal -->
<div class="modal fade modal-action" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seacrh Icon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="table-responsive">
                    <table class="table table-hover table-bordered text-center" id="tableShow5">
                        <thead class="bg-primary text-white ">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Class</th>
                                <th scope="col">Icon</th>
                                <th scope="col" class="td-aksi">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-black">
                            <?php $i = 1; ?>
                            <?php foreach ($icon as $k) : ?>
                                <tr>
                                    <td scope="row"><?= $i++; ?></td>
                                    <td class="text-left"><?= $k->icon; ?></td>
                                    <td><i class="<?= $k->icon; ?> text-info fa-2x"></i></td>
                                    <td class="text-nowarp">
                                        <button class="btn btn-outline-primary get-icon" data-icon="<?= $k->icon; ?>" data-dismiss="modal">Pilih</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-cancel" data-dismiss="modal">Batal <i class="fa fa-times ml-2"></i></button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

<?php $this->load->view('templates/footer.php'); ?>

<!-- script -->
<script>
    $('#tableShow5').on('click', '.get-icon', function() {
        $('#icon').val($(this).data('icon'));
    });
</script>
<!-- end script -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content p-3">

        <div class="rounded mt-4 p-4 bg-white shadow-lg ">
            <h1 class="h3 text-black"><?= $title; ?></h1>
        </div>

        <div class="rounded mt-4 p-4 bg-white shadow-lg ">

            <form role="form" id="my-form" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
							<img src="<?= base_url('assets/uploads/checkout/'.$data['FileCO']); ?>" height="200">
                        </div>
                    </div>
                    <div class="col-md-6">
						<div class="form-group">
							<img src="<?= base_url('assets/uploads/checkin/'.$data['FileCI']); ?>" height="200">
						</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="author">Host <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="author" name="author" autocomplete="off" value="<?=$data['']?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="keywords">Keywords <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="keywords" name="keywords" autocomplete="off" value="<?=$data['']?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="description" name="description" autocomplete="off" value="" required>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="logo">logo <span class="text-danger">(Max Size 500kb)</span></label>
                            <div>
                                <input type="file" id="real-file" hidden="hidden" name="logo">
                                <button type="button" class="btn btn-outline-success" id="custom-button">
                                    Upload File <i class="fas fa-upload ml-2"></i>
                                </button>
                                <span id="custom-text" class="text-secondary ml-2">Tidak ada file yang diupload</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <img id="prev" src="<?= base_url('assets/img/no-image.png'); ?>" height="270" width="80%">
                        </div>
                    </div>
                </div>

                <button class="mt-3 btn btn-primary" type="submit">Ubah <i class="fas fa-paper-plane ml-2"></i></button>

            </form>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('templates/footer_two.php'); ?>

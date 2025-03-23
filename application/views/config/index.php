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
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="navbar">Navbar Variants <span class="text-danger">*</span></label>
                            <select id="change-navbar" class="form-control select2bs4" name="navbar" required>
                                <optgroup label="Navbar Dark">
                                    <option value="navbar-dark navbar-primary" <?= $ubah->navbar == 'navbar-dark navbar-primary' ? 'selected' : ''; ?>>Navbar Primary </option>
                                    <option value="navbar-dark navbar-secondary" <?= $ubah->navbar == 'navbar-dark navbar-secondary' ? 'selected' : ''; ?>>Navbar Secondary </option>
                                    <option value="navbar-dark navbar-info" <?= $ubah->navbar == 'navbar-dark navbar-info' ? 'selected' : ''; ?>>Navbar Info </option>
                                    <option value="navbar-dark navbar-danger" <?= $ubah->navbar == 'navbar-dark navbar-danger' ? 'selected' : ''; ?>>Navbar Danger </option>
                                    <option value="navbar-dark navbar-indigo" <?= $ubah->navbar == 'navbar-dark navbar-indigo' ? 'selected' : ''; ?>>Navbar Indigo </option>
                                    <option value="navbar-dark navbar-purple" <?= $ubah->navbar == 'navbar-dark navbar-purple' ? 'selected' : ''; ?>>Navbar Purple </option>
                                    <option value="navbar-dark navbar-pink" <?= $ubah->navbar == 'navbar-dark navbar-pink' ? 'selected' : ''; ?>>Navbar Pink </option>
                                    <option value="navbar-dark navbar-navy" <?= $ubah->navbar == 'navbar-dark navbar-navy' ? 'selected' : ''; ?>>Navbar Navy </option>
                                    <option value="navbar-dark navbar-lightblue" <?= $ubah->navbar == 'navbar-dark navbar-lightblue' ? 'selected' : ''; ?>>Navbar Lightblue </option>
                                    <option value="navbar-dark navbar-teal" <?= $ubah->navbar == 'navbar-dark navbar-teal' ? 'selected' : ''; ?>>Navbar Teal </option>
                                    <option value="navbar-dark navbar-cyan" <?= $ubah->navbar == 'navbar-dark navbar-cyan' ? 'selected' : ''; ?>>Navbar Cyan </option>
                                    <option value="navbar-dark" <?= $ubah->navbar == 'navbar-dark' ? 'selected' : ''; ?>>Navbar Dark </option>
                                    <option value="navbar-dark navbar-gray-dark" <?= $ubah->navbar == 'navbar-dark navbar-gray-dark' ? 'selected' : ''; ?>>Navbar Gray Dark </option>
                                    <option value="navbar-dark navbar-gray" <?= $ubah->navbar == 'navbar-dark navbar-gray' ? 'selected' : ''; ?>>Navbar Gray </option>
                                </optgroup>
                                <optgroup label="Navbar Light">
                                    <option value="navbar-light" <?= $ubah->navbar == 'navbar-light' ? 'selected' : ''; ?>>Navbar Light </option>
                                    <option value="navbar-light navbar-warning" <?= $ubah->navbar == 'navbar-light navbar-warning' ? 'selected' : ''; ?>>Navbar Warning </option>
                                    <option value="navbar-light navbar-white" <?= $ubah->navbar == 'navbar-light navbar-white' ? 'selected' : ''; ?>>Navbar White </option>
                                    <option value="navbar-light navbar-orange" <?= $ubah->navbar == 'navbar-light navbar-orange' ? 'selected' : ''; ?>>Navbar Orange </option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="brandlogo">Brand Logo Variants <span class="text-danger">*</span></label>
                            <select id="change-brandlogo" class="form-control select2bs4" name="brandlogo" required>
                                <option value="navbar-primary" <?= $ubah->brandlogo == 'navbar-primary' ? 'selected' : ''; ?>> Primary </option>
                                <option value="navbar-secondary" <?= $ubah->brandlogo == 'navbar-secondary' ? 'selected' : ''; ?>> Secondary </option>
                                <option value="navbar-info" <?= $ubah->brandlogo == 'navbar-info' ? 'selected' : ''; ?>> Info </option>
                                <option value="navbar-success" <?= $ubah->brandlogo == 'navbar-success' ? 'selected' : ''; ?>> Success </option>
                                <option value="navbar-danger" <?= $ubah->brandlogo == 'navbar-danger' ? 'selected' : ''; ?>> Danger </option>
                                <option value="navbar-indigo" <?= $ubah->brandlogo == 'navbar-indigo' ? 'selected' : ''; ?>> Indigo </option>
                                <option value="navbar-purple" <?= $ubah->brandlogo == 'navbar-purple' ? 'selected' : ''; ?>> Purple </option>
                                <option value="navbar-pink" <?= $ubah->brandlogo == 'navbar-pink' ? 'selected' : ''; ?>> Pink </option>
                                <option value="navbar-navy" <?= $ubah->brandlogo == 'navbar-navy' ? 'selected' : ''; ?>> Navy </option>
                                <option value="navbar-lightblue" <?= $ubah->brandlogo == 'navbar-lightblue' ? 'selected' : ''; ?>> Lightblue </option>
                                <option value="navbar-teal" <?= $ubah->brandlogo == 'navbar-teal' ? 'selected' : ''; ?>> Teal </option>
                                <option value="navbar-cyan" <?= $ubah->brandlogo == 'navbar-cyan' ? 'selected' : ''; ?>> Cyan </option>
                                <option value="navbar-dark" <?= $ubah->brandlogo == 'navbar-dark' ? 'selected' : ''; ?>> Dark </option>
                                <option value="navbar-gray-dark" <?= $ubah->brandlogo == 'navbar-gray-dark' ? 'selected' : ''; ?>> Gray Dark </option>
                                <option value="navbar-gray" <?= $ubah->brandlogo == 'navbar-gray' ? 'selected' : ''; ?>> Gray </option>
                                <option value="navbar-light" <?= $ubah->brandlogo == 'navbar-light' ? 'selected' : ''; ?>> Light </option>
                                <option value="navbar-warning" <?= $ubah->brandlogo == 'navbar-warning' ? 'selected' : ''; ?>> Warning </option>
                                <option value="navbar-white" <?= $ubah->brandlogo == 'navbar-white' ? 'selected' : ''; ?>> White </option>
                                <option value="navbar-orange" <?= $ubah->brandlogo == 'navbar-orange' ? 'selected' : ''; ?>> Orange </option>
                                <option value="" <?= $ubah->brandlogo == null ? 'selected' : ''; ?>> Clear </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="brandcolor">Brand Text Color <span class="text-danger">*</span></label>
                            <select id="change-brandcolor" class="form-control select2bs4" name="brandcolor" required>
                                <option value="text-primary" <?= $ubah->brandcolor == 'text-primary' ? 'selected' : ''; ?>>Primary </option>
                                <option value="text-secondary" <?= $ubah->brandcolor == 'text-secondary' ? 'selected' : ''; ?>>Secondary </option>
                                <option value="text-success" <?= $ubah->brandcolor == 'text-success' ? 'selected' : ''; ?>>Success </option>
                                <option value="text-danger" <?= $ubah->brandcolor == 'text-danger' ? 'selected' : ''; ?>>Danger </option>
                                <option value="text-warning" <?= $ubah->brandcolor == 'text-warning' ? 'selected' : ''; ?>>Warning </option>
                                <option value="text-info" <?= $ubah->brandcolor == 'text-info' ? 'selected' : ''; ?>>Info </option>
                                <option value="text-light" <?= $ubah->brandcolor == 'text-light' ? 'selected' : ''; ?>>Light </option>
                                <option value="text-dark" <?= $ubah->brandcolor == 'text-dark' ? 'selected' : ''; ?>>Dark </option>
                                <option value="text-white" <?= $ubah->brandcolor == 'text-white' ? 'selected' : ''; ?>>White </option>
                                <option value="text-black" <?= $ubah->brandcolor == 'text-black' ? 'selected' : ''; ?>>black </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sidebar">Sidebar Variants <span class="text-danger">*</span></label>
                            <select id="change-sidebar" class="form-control select2bs4" name="sidebar" required>
                                <optgroup label="Dark Sidebar">
                                    <option value="sidebar-dark-primary" <?= $ubah->sidebar == 'sidebar-dark-primary' ? 'selected' : ''; ?>>Sidebar Dark Primary </option>
                                    <option value="sidebar-dark-warning" <?= $ubah->sidebar == 'sidebar-dark-warning' ? 'selected' : ''; ?>>Sidebar Dark Warning </option>
                                    <option value="sidebar-dark-info" <?= $ubah->sidebar == 'sidebar-dark-info' ? 'selected' : ''; ?>>Sidebar Dark Info </option>
                                    <option value="sidebar-dark-danger" <?= $ubah->sidebar == 'sidebar-dark-danger' ? 'selected' : ''; ?>>Sidebar Dark Danger </option>
                                    <option value="sidebar-dark-success" <?= $ubah->sidebar == 'sidebar-dark-success' ? 'selected' : ''; ?>>Sidebar Dark success </option>
                                    <option value="sidebar-dark-indigo" <?= $ubah->sidebar == 'sidebar-dark-indigo' ? 'selected' : ''; ?>>Sidebar Dark Indigo </option>
                                    <option value="sidebar-dark-lightblue" <?= $ubah->sidebar == 'sidebar-dark-lightblue' ? 'selected' : ''; ?>>Sidebar Dark Lightblue </option>
                                    <option value="sidebar-dark-navy" <?= $ubah->sidebar == 'sidebar-dark-navy' ? 'selected' : ''; ?>>Sidebar Dark Navy </option>
                                    <option value="sidebar-dark-purple" <?= $ubah->sidebar == 'sidebar-dark-purple' ? 'selected' : ''; ?>>Sidebar Dark Purple </option>
                                    <option value="sidebar-dark-fuchsia" <?= $ubah->sidebar == 'sidebar-dark-fuchsia' ? 'selected' : ''; ?>>Sidebar Dark Fuchsia </option>
                                    <option value="sidebar-dark-pink" <?= $ubah->sidebar == 'sidebar-dark-pink' ? 'selected' : ''; ?>>Sidebar Dark Pink </option>
                                    <option value="sidebar-dark-maroon" <?= $ubah->sidebar == 'sidebar-dark-maroon' ? 'selected' : ''; ?>>Sidebar Dark Maroon </option>
                                    <option value="sidebar-dark-orange" <?= $ubah->sidebar == 'sidebar-dark-orange' ? 'selected' : ''; ?>>Sidebar Dark Orange </option>
                                    <option value="sidebar-dark-lime" <?= $ubah->sidebar == 'sidebar-dark-lime' ? 'selected' : ''; ?>>Sidebar Dark Lime </option>
                                    <option value="sidebar-dark-teal" <?= $ubah->sidebar == 'sidebar-dark-teal' ? 'selected' : ''; ?>>Sidebar Dark Teal </option>
                                    <option value="sidebar-dark-olive" <?= $ubah->sidebar == 'sidebar-dark-olive' ? 'selected' : ''; ?>>Sidebar Dark live </option>
                                </optgroup>
                                <optgroup label="Light Sidebar">
                                    <option value="sidebar-light-primary" <?= $ubah->sidebar == 'sidebar-light-primary' ? 'selected' : ''; ?>>Sidebar Light Primary </option>
                                    <option value="sidebar-light-warning" <?= $ubah->sidebar == 'sidebar-light-warning' ? 'selected' : ''; ?>>Sidebar Light Warning </option>
                                    <option value="sidebar-light-info" <?= $ubah->sidebar == 'sidebar-light-info' ? 'selected' : ''; ?>>Sidebar Light Info </option>
                                    <option value="sidebar-light-danger" <?= $ubah->sidebar == 'sidebar-light-danger' ? 'selected' : ''; ?>>Sidebar Light Danger </option>
                                    <option value="sidebar-light-success" <?= $ubah->sidebar == 'sidebar-light-success' ? 'selected' : ''; ?>>Sidebar Light success </option>
                                    <option value="sidebar-light-indigo" <?= $ubah->sidebar == 'sidebar-light-indigo' ? 'selected' : ''; ?>>Sidebar Light Indigo </option>
                                    <option value="sidebar-light-lightblue" <?= $ubah->sidebar == 'sidebar-light-lightblue' ? 'selected' : ''; ?>>Sidebar Light Lightblue </option>
                                    <option value="sidebar-light-navy" <?= $ubah->sidebar == 'sidebar-light-navy' ? 'selected' : ''; ?>>Sidebar Light Navy </option>
                                    <option value="sidebar-light-purple" <?= $ubah->sidebar == 'sidebar-light-purple' ? 'selected' : ''; ?>>Sidebar Light Purple </option>
                                    <option value="sidebar-light-fuchsia" <?= $ubah->sidebar == 'sidebar-light-fuchsia' ? 'selected' : ''; ?>>Sidebar Light Fuchsia </option>
                                    <option value="sidebar-light-pink" <?= $ubah->sidebar == 'sidebar-light-pink' ? 'selected' : ''; ?>>Sidebar Light Pink </option>
                                    <option value="sidebar-light-maroon" <?= $ubah->sidebar == 'sidebar-light-maroon' ? 'selected' : ''; ?>>Sidebar Light Maroon </option>
                                    <option value="sidebar-light-orange" <?= $ubah->sidebar == 'sidebar-light-orange' ? 'selected' : ''; ?>>Sidebar Light Orange </option>
                                    <option value="sidebar-light-lime" <?= $ubah->sidebar == 'sidebar-light-lime' ? 'selected' : ''; ?>>Sidebar Light Lime </option>
                                    <option value="sidebar-light-teal" <?= $ubah->sidebar == 'sidebar-light-teal' ? 'selected' : ''; ?>>Sidebar Light Teal </option>
                                    <option value="sidebar-light-olive" <?= $ubah->sidebar == 'sidebar-light-olive' ? 'selected' : ''; ?>>Sidebar Light live </option>
                                </optgroup>
                            </select>
                            <?= form_error('sidebar'); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="brand">Brand <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="brand" name="brand" autocomplete="off" value="<?= $ubah->brand; ?>" required>
                            <?= form_error('brand'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="login_title">Login Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="login_title" name="login_title" autocomplete="off" value="<?= $ubah->login_title; ?>" required>
                            <?= form_error('login_title'); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="copyright">Copyright <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="copyright" name="copyright" autocomplete="off" value="<?= $ubah->copyright; ?>" required>
                            <?= form_error('copyright'); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="author">Author <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="author" name="author" autocomplete="off" value="<?= $ubah->author; ?>" required>
                            <?= form_error('author'); ?>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="keywords">Keywords <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="keywords" name="keywords" autocomplete="off" value="<?= $ubah->keywords; ?>" required>
                            <?= form_error('keywords'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="description" name="description" autocomplete="off" value="<?= $ubah->description; ?>" required>
                    <?= form_error('description'); ?>
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
                            <img id="prev" src="<?= base_url('assets/img/'); ?><?= !empty($ubah->logo) ? $ubah->logo : 'no-image.png'; ?>" height="270" width="80%">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="background">Background <span class="text-danger">(Max Size 500kb)</span></label>
                            <div>
                                <input type="file" id="real-file2" hidden="hidden" name="background">
                                <button type="button" class="btn btn-outline-success" id="custom-button2">
                                    Upload File <i class="fas fa-upload ml-2"></i>
                                </button>
                                <span id="custom-text2" class="text-secondary ml-2">Tidak ada file yang diupload</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <img id="prev2" src="<?= base_url('assets/img/'); ?><?= !empty($ubah->background) ? $ubah->background : 'no-image.png'; ?>" height="270" width="100%">
                        </div>
                    </div>
                </div>

                <input type="hidden" name="logo_lama" value="<?= $ubah->logo; ?>">
                <input type="hidden" name="background_lama" value="<?= $ubah->background; ?>">

                <button class="mt-3 btn btn-primary" type="submit">Ubah <i class="fas fa-paper-plane ml-2"></i></button>

            </form>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('templates/footer.php'); ?>
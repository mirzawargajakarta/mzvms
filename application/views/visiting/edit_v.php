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
							<img src="<?= base_url('assets/uploads/checkin/'.$data['FileCI']); ?>" height="200">
                        </div>
                    </div>
                    <div class="col-md-6">
						<div class="form-group">
						<img src="<?= base_url('assets/uploads/checkout/'.$data['FileCO']); ?>" height="200">
						</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hostname">Name </label>
                            <input type="text" class="form-control" id="hostname" name="hostname" autocomplete="off" value="<?=$data['HostName']?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hostname">Host </label>
                            <input type="text" class="form-control" id="hostname" name="hostname" autocomplete="off" value="<?=$data['HostName']?>">
                        </div>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-6">
                        <div class="form-group">
                            <label for="hostdepartment">Host Department </label>
                            <input type="text" class="form-control" id="hostdepartment" name="hostdepartment" autocomplete="off" value="<?=$data['TargetVisitorType']?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company">Company </label>
                            <input type="text" class="form-control" id="company" name="company" autocomplete="off" value="<?=$data['SourceCompany']?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Notes <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="description" name="description" autocomplete="off" value="<?=$data['PVDescription']?>">
                </div>

                <button class="mt-3 btn btn-primary" type="submit">Ubah <i class="fas fa-paper-plane ml-2"></i></button>

            </form>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('templates/footer_two.php'); ?>

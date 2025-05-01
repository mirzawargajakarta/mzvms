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
							<input type="file" id="fileci" hidden="hidden" name="fileci">
							<button type="button" class="btn btn-outline-success" id="custom-button">
								Upload File CheckIn<i class="fas fa-upload ml-2"></i>
							</button>
							<span id="custom-text" class="text-secondary ml-2">Tidak ada file yang diupload</span>
						</div>
                        <div class="form-group">
							<?php
								if($data['FileCI']=='') {
									echo "- No Checkin Picture -";
								} else {
							?>
							<img src="<?= base_url('assets/uploads/checkin/'.$data['FileCI']); ?>" height="200">
							<?php }?>
                        </div>
                    </div>
                    <div class="col-md-6">
						<div class="form-group">
							<input type="file" id="fileco" hidden="hidden" name="fileco">
							<button type="button" class="btn btn-outline-success" id="custom-button2">
								Upload File CheckOut<i class="fas fa-upload ml-2"></i>
							</button>
							<span id="custom-text2" class="text-secondary ml-2">Tidak ada file yang diupload</span>
						</div>
						<div class="form-group">
							<?php
									if($data['FileCO']=='') {
									echo "- No Checkout Picture -";
								} else {
							?>
							<img src="<?= base_url('assets/uploads/checkout/'.$data['FileCO']); ?>" height="200">
					<?php }?>
						</div>
                    </div>
                </div>
				<div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
							<label>Checkin Time</label>   
							<input type="text" class="form-control" id="checkin" name="checkin" value="<?=$data['CheckInTime']?>">
                        </div>
                    </div>
					<div class="col-md-6">
						<div class="form-group">
                            <label for="hostname">Checkout Time</label>
							<input type="text" id="checkout" name="checkout" class="form-control"  value="<?=$data['CheckOutTime']?>">
                        </div>
                    </div>
				</div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
							<label>Full Name</label>   
							<input type="text" class="form-control" id="fullname" name="fullname" value="<?=$data['Nama']?>">
                        </div>
                    </div>
					<div class="col-md-6">
						<div class="form-group">
                            <label for="hostname">Phone Number </label>
							<input type="text" id="notelepon" name="notelepon" class="form-control allownumericwithoutdecimal"  value="<?=$data['PhoneNumber']?>">
                        </div>
                    </div>
				</div>
				<div class="row">
                    <div class="col-md-6">
						<label>Gender</label><br />
						<?php 
							$isMaleChecked = ($data['Gender']=='M')?' checked':'';
							$isFemaleChecked = ($data['Gender']=='F')?' checked':'';
						?>
						<label class="form-check form-check-inline">
							<input class="form-check-input" type="radio" id="male" name="gender" value="M"<?=$isMaleChecked?>>
							<span class="form-check-label"> Male </span>
						</label>
						<label class="form-check form-check-inline">
							<input class="form-check-input" type="radio" id="female" name="gender" value="F"<?=$isFemaleChecked?>>
							<span class="form-check-label"> Female</span>
						</label>
                    </div>
                </div>
				<br />
				<div class="row">
					<div class="col-md-6">
                        <div class="form-group">
							<label>ID Card Number</label>   
							<input type="text" id="idcardno" name="idcardno" value="<?=$data['IDCard']?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
							<label>Email address</label>
							<input type="email" class="form-control" id="email" name="email" value="<?=$data['Email']?>">
                        </div>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-6">
                        <div class="form-group">
							<label>Address</label>
							<textarea class="form-control" id="address" name="address"><?=$data['Alamat']?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
							<label>Country</label>
							<select id="negara" name="negara" class="selectform form-control select2-multiple">
								<option value=""></option>
								<option value="ID">Indonesia</option>
								<option value="MY">Malaysia</option>
								<option value="CN">China</option>
								<option value="IN">India</option>
								<option value="JP">Japan</option>
								<option value="KR">South Korea</option>
								<option value="SG">Singapore</option>
								<option value="TH">Thailand</option>
								<option value="AU">Australia</option>
								<option value="US">America</option>
								<option value="AE">United Arab Emirates</option>
								<option value="GB">England</option>
							</select>
                        </div>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Company Name</label>   
							<input type="text" id="company" name="company"  value="<?=$data['SourceCompany']?>" class="form-control">	
						</div> 	
					</div> 
					<div class="col-md-6">
						<div class="form-group">
							<label>Company Type</label>
							<?=form_dropdownDB_init('companytype', $companytypedata, 'Id', 'SourceTypeName', $data['SourcetypemstId'],'','', "id='companytype' class='selectform form-control'");?>	
						</div> 
					</div> 
				</div>
				<div class="row">
					<div class="col-md-6">
                        <div class="form-group">
							<label>Host Name</label>   
							<input type="text" id="hostname" name="hostname"  value="<?=$data['HostName']?>" class="form-control">	
                        </div>
                    </div>
					<div class="col-md-6">
                        <div class="form-group">
							<label>Department</label>   
							<?=form_dropdownDB_init('hostdepartment', $hostdepartmentdata, 'Id', 'TargetVisitorType', $data['TargettypemstId'],'','', "id='hostdepartment' class='selectform form-control'");?>	
                        </div>
                    </div>
				</div>
				<div class="row">
					<div class="col-md-6">
                        <div class="form-group">
							<label>Purpose Visit</label>
							<?=form_dropdownDB_init('purpose', $purposedata, 'Id', 'PurposeVisit', $data['PurposemstId'], '','',"id='purpose' class='selectform form-control'");?>
                        </div>
                    </div>
					<div class="col-md-6">
                        <div class="form-group">
						<label>Notes</label>
							<textarea class="form-control" id="notes" name="notes"><?=$data['PVDescription']?></textarea>
                        </div>
                    </div>
				</div>
                <button class="mt-3 btn btn-primary" type="submit">SAVE CHANGES <i class="fas fa-paper-plane ml-2"></i></button>
            </form>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php $this->load->view('templates/footer_two.php'); ?>

<script language="JavaScript">
// ======== input type file ========
const realFileBtn = document.getElementById("fileci");
const customBtn = document.getElementById("custom-button");
const customTxt = document.getElementById("custom-text");

customBtn.addEventListener("click", function () {
	realFileBtn.click();
});

realFileBtn.addEventListener("change", function () {
	if (realFileBtn.value) {
		customTxt.innerHTML = realFileBtn.value.match(
			/[\/\\]([\w\d\s\.\-\(\)]+)$/
		)[1];
	} else {
		customTxt.innerHTML = "No File Uploaded";
	}
});

// upload 2
const realFileBtn2 = document.getElementById("fileco");
const customBtn2 = document.getElementById("custom-button2");
const customTxt2 = document.getElementById("custom-text2");

customBtn2.addEventListener("click", function () {
	realFileBtn2.click();
});

realFileBtn2.addEventListener("change", function () {
	if (realFileBtn2.value) {
		customTxt2.innerHTML = realFileBtn2.value.match(
			/[\/\\]([\w\d\s\.\-\(\)]+)$/
		)[1];
	} else {
		customTxt2.innerHTML = "No File Uploaded";
	}
});
// ======== end input type file ========

</script>

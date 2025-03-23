
// ======== parsley form validation ========
$("#my-form").parsley({
	errorClass: 'is-invalid text-red',
	successClass: 'is-valid',
	errorsWrapper: '<span class="invalid-feedback"></span>',
	errorTemplate: '<span></span>',
	trigger: 'change'
});
// ======== end parsley form validation ========

// ======== select2 js ========
$('.select2bs4').select2({
	theme: 'bootstrap4',
	width: '100%'
});
// ======== end select2 js ========

// ======== sweet alert ========
// button-delete
$('.button-delete').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal({
		title: 'Apakah Anda Yakin',
		text: "Data Akan Dihapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});

// flash-data sukses
const flashData = $('.flash-data').data('flashdata');
if (flashData) {
	Swal({
		title: 'Success',
		text: flashData,
		type: 'success'
	});
}

// flash-data error
const flashError = $('.flash-error').data('flashdata');
if (flashError) {
	Swal({
		title: 'Error',
		text: flashError,
		type: 'error'
	});
}
// ======== end sweet alert ========


// ======== popover on mouseover ========
// ======== popover ========
$(".pop").popover({
		trigger: "manual",
		html: true,
		animation: false
	})
	.on("mouseenter", function () {
		var _this = this;
		$(this).popover("show");
		$(".popover").on("mouseleave", function () {
			$(_this).popover('hide');
		});
	}).on("mouseleave", function () {
		var _this = this;
		setTimeout(function () {
			if (!$(".popover:hover").length) {
				$(_this).popover("hide");
			}
		}, 300);
	});
// ======== end popover on mouseover ========

// ======== preview img  ========
function readURL(input) {

	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#prev').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

$("#real-file").change(function () {
	readURL(this);
});

// preview 2
function readURL2(input) {

	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#prev2').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
}

$("#real-file2").change(function () {
	readURL2(this);
});
// ======== end preview img  ========

// ======== input type file ========
const realFileBtn = document.getElementById("real-file");
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
		customTxt.innerHTML = "Tidak ada file yang diupload";
	}
});

// upload 2
const realFileBtn2 = document.getElementById("real-file2");
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
		customTxt2.innerHTML = "Tidak ada file yang diupload";
	}
});
// ======== end input type file ========

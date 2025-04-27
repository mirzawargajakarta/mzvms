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

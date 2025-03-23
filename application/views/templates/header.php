<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php $config = $this->Default_m->getWhere('tabel_config', ['id_config' => 1])->row(); ?>
	<meta name="description" content="<?= $config->description; ?>">
	<meta name="keywords" content="<?= $config->keywords; ?>">
	<meta name="author" content="<?= $config->author; ?>">
	<link rel="icon" href="<?= base_url('assets/img/' . $config->logo); ?>">

	<title><?= $title; ?></title>

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/plugins/fontawesome-free/css/all.min.css') ?>">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/dist/css/adminlte.css') ?>">
	<!-- datatables -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css'); ?>">
	<!-- select2 -->
	<link rel="stylesheet" href="<?= base_url('assets/vendor/select2/css/select2.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
	<!-- Google Font: Source Sans Pro -->
	<!-- <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet"> -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

	<!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">  -->

	<!-- my style -->
	<link href="<?= base_url('assets/css/mz-style.css'); ?>" rel="stylesheet">
</head>
<!-- <body class="hold-transition sidebar-mini layout-fixed sidebar-collapse layout-navbar-fixed"> -->
<body class="hold-transition layout-fixed sidebar-collapse layout-navbar-fixed">
	<!-- <body class="hold-transition sidebar-mini sidebar-collapse"> -->
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
	<div class="flash-error" data-flashdata="<?= $this->session->flashdata('error'); ?>"></div>
	<div class="flash-login" data-flashdata="<?= $this->session->flashdata('login'); ?>"></div>
	<!-- Site wrapper -->
	<div class="wrapper">

		<?php $this->load->view('templates/navbar'); ?>
		<?php $this->load->view('templates/sidebar'); ?>
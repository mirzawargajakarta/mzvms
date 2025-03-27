<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontmenu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
		$data['title'] = "MzVMS";
		$this->load->view('frontmenu/index', $data);
    }

	public function registration()
	{
		$data['title'] = "Form Kontak Registrasi";
		$this->load->view('frontmenu/registration_v', $data);
	}

	public function scanqrcode()
	{
		$data['title'] = "Scan QRcode";
		$this->load->view('frontmenu/qrcodereader_v', $data);
	}
}

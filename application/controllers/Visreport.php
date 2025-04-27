<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visreport extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Default_m');
        security();
    }

    public function index()
    {        
		$data['title'] = 'Report Visitment';

        $this->load->view('templates/header', $data);
        $this->load->view('report/index_v', $data);
        $this->load->view('templates/foot', $data);
		
    }
}

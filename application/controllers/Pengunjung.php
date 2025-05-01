<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pengunjung_model');
    }

    public function index() {
        $tahun = $this->input->get('tahun') ? $this->input->get('tahun') : date('Y');
        
        $data['tahun_selected'] = $tahun;
        $data['tahun_options'] = $this->Pengunjung_model->get_tahun_available();
        $data['data_pengunjung'] = $this->Pengunjung_model->get_pengunjung_by_tahun($tahun);
        
        $this->load->view('test/pengunjung_view', $data);
    }
}

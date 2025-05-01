<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Ambil data pengunjung berdasarkan tahun
    public function get_pengunjung_by_tahun($tahun) {
        $this->db->select('negara, SUM(jumlah) as total');
        $this->db->where('tahun', $tahun);
        $this->db->group_by('negara');
        $query = $this->db->get('pengunjung_hotel');
        return $query->result();
    }

    // Ambil daftar tahun yang tersedia
    public function get_tahun_available() {
        $this->db->select('tahun');
        $this->db->group_by('tahun');
        $query = $this->db->get('pengunjung_hotel');
        return $query->result();
    }
}

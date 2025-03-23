<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Navigasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Default_m');
        security();
    }

    public function index()
    {
        $data['title'] = 'Navigasi';
        $data['navigasi'] = $this->Default_m->getAll('tabel_navigasi', 'id_navigasi')->result();
        $data['num'] = $this->Default_m->getAll('tabel_navigasi', 'id_navigasi')->num_rows();
        $data['icon'] = $this->Default_m->getAll('tabel_icon', 'id_icon')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('navigasi/index', $data);
        $this->load->view('templates/foot');
    }

    public function form($id_navigasi = null)
    {
        $this->form_validation->set_rules('navigasi', 'navigasi', 'required');
        $this->form_validation->set_rules('urutan', 'urutan', 'required');
        $this->form_validation->set_rules('dropdown', 'dropdown', 'required');
        $this->form_validation->set_rules('aktif', 'aktif', 'required');
        $this->form_validation->set_rules('url', 'url', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Form Navigasi';
            $data['navigasi'] = $this->Default_m->getAll('tabel_navigasi', 'id_navigasi')->result();
            $data['num'] = $this->Default_m->getAll('tabel_navigasi', 'id_navigasi')->num_rows();
            $data['icon'] = $this->Default_m->getAll('tabel_icon', 'id_icon')->result();

            if ($id_navigasi) {
                $where = ['id_navigasi' => $id_navigasi];
                $data['ubah'] = $this->Default_m->getWhere('tabel_navigasi', $where)->row();
            }

            $this->load->view('templates/header', $data);
            $this->load->view('navigasi/form', $data);
            $this->load->view('templates/foot');
        } else {
            $data = [
                'navigasi' => $this->input->post('navigasi'),
                'heading' => $this->input->post('heading'),
                'url' => $this->input->post('url'),
                'icon' => empty($this->input->post('icon')) ? 'far fa-circle' : $this->input->post('icon'),
                'dropdown' => $this->input->post('dropdown'),
                'urutan' => $this->input->post('urutan'),
                'aktif' => $this->input->post('aktif'),
            ];

            if ($id_navigasi) {
                $where = ['id_navigasi' => $id_navigasi];
                $this->Default_m->update('tabel_navigasi', $where, $data);
                $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            } else {
                $this->Default_m->insert('tabel_navigasi', $data);
                $this->session->set_flashdata('flash', 'Data Berhasil Ditambahkan');
            }
            redirect('navigasi');
        }
    }

    public function hapus($id_navigasi)
    {
        $where = ['id_navigasi' => $id_navigasi];
        $this->Default_m->delete('tabel_navigasi', $where);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
            redirect('navigasi');
        }
    }
}

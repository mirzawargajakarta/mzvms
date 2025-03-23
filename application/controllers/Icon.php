<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Icon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Default_m');
        security();
    }

    public function index()
    {
        $this->form_validation->set_rules('icon', 'icon|trim|is_unique[tabel_icon.icon]', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() === FALSE) {

            $data['title'] = 'Icons';
            $data['icon'] = $this->Default_m->getAll('tabel_icon', 'id_icon')->result();
            $data['num'] = $this->Default_m->getAll('tabel_icon', 'id_icon')->num_rows();

            $this->load->view('templates/header', $data);
            $this->load->view('icon/index', $data);
            $this->load->view('templates/foot');
        } else {
            $id_icon = $this->input->post('id_icon');
            $data = ['icon' => $this->input->post('icon')];

            if ($id_icon) {
                $where = ['id_icon' => $id_icon];
                $this->Default_m->update('tabel_icon', $where, $data);
                $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            } else {
                $this->Default_m->insert('tabel_icon', $data);
                $this->session->set_flashdata('flash', 'Data Berhasil Ditambahkan');
            }
            redirect('icon');
        }
    }

    public function getWhere()
    {
        $where = ['id_icon' => $_POST['id']];
        echo json_encode($this->Default_m->getWhere('tabel_icon', $where)->row());
    }

    public function hapus($id_icon)
    {
        $where = ['id_icon' => $id_icon];
        $this->Default_m->delete('tabel_icon', $where);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
        }

        // notifikasi error sql
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('error', 'Data Gagal Dihapus, Data Sedang Digunakan');
        }

        redirect('icon');
    }
}

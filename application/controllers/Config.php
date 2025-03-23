<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Config extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Default_m');
        security();
    }

    public function index()
    {
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('author', 'author', 'required');
        $this->form_validation->set_rules('keywords', 'keywords', 'required');
        $this->form_validation->set_rules('brand', 'brand', 'required');
        $this->form_validation->set_rules('copyright', 'copyright', 'required');
        $this->form_validation->set_rules('login_title', 'login_title', 'required');
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback text-capitalize">', '</div>');

        if ($this->form_validation->run() === FALSE) {

            $data['title'] = 'Config';
            $data['ubah'] = $this->Default_m->getWhere('tabel_config', ['id_config' => 1])->row();

            $this->load->view('templates/header', $data);
            $this->load->view('config/index', $data);
            $this->load->view('templates/foot');
        } else {
            $id_config = 1;
            $path = './assets/img/';
            $type = 'jpg|jpeg|png';
            $size = 520;
            $name1 = 'logo';
            $name2 = 'background';
            $logoLama = $this->input->post('logo_lama');
            $backgroundLama = $this->input->post('background_lama');

            $data = [
                'navbar' => $this->input->post('navbar'),
                'brandlogo' => $this->input->post('brandlogo'),
                'brandcolor' => $this->input->post('brandcolor'),
                'sidebar' => $this->input->post('sidebar'),
                'description' => $this->input->post('description'),
                'author' => $this->input->post('author'),
                'keywords' => $this->input->post('keywords'),
                'description' => $this->input->post('description'),
                'brand' => $this->input->post('brand'),
                'login_title' => $this->input->post('login_title'),
                'copyright' => $this->input->post('copyright'),
                'logo' => !empty($_FILES[$name1]["name"]) ?  $this->Default_m->upload($path, $type, $size, $name1) : $logoLama,
                'background' => !empty($_FILES[$name2]["name"]) ?  $this->Default_m->upload($path, $type, $size, $name2) : $backgroundLama
            ];

            $where = ['id_config' => $id_config];
            $this->Default_m->update('tabel_config', $where, $data);
            if (!empty($_FILES[$name1]["name"])) {
                unlink($path . $logoLama);
            }
            if (!empty($_FILES[$name2]["name"])) {
                unlink($path . $backgroundLama);
            }
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('config');
        }
    }
}

<?php

function check_access($id_profil, $id_navigasi)
{
    $ci = get_instance();

    $ci->db->where('id_profil', $id_profil);
    $ci->db->where('id_navigasi', $id_navigasi);
    $result = $ci->db->get('tabel_akses');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function security()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('login');
    } else {
        $id_user = $ci->session->userdata('id_user');
        $data = $ci->Default_m->getWhere('tabel_user', ['id_user' => $id_user])->row();
        $id_profil = $data->id_profil;

        $data = $ci->db->get_where('tabel_navigasi', ['url' => $ci->uri->segment(1)])->row();

        $akses = $ci->db->get_where('tabel_akses', [
            'id_profil' => $id_profil,
            'id_navigasi' => $data->id_navigasi
        ]);

        if ($akses->num_rows() < 1) {
            redirect('dashboard/error');
        }
    }
}

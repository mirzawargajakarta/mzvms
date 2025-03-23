<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notfound extends CI_Controller
{
    public function index()
    {
        $data['title'] = '404 Not Found';
        $this->load->view('404/index', $data);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('Pdf');
        // $this->load->model('M_admin');
        $this->load->helper(array('form', 'url'));
        // $this->load->library(array('form_validation','Routerosapi'));
        //cek jika user blm login maka redirect ke halaman login
        if ($this->session->userdata('username', 'nama')  != true) {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Maaf anda belum login !</div>');
            redirect('login');
        }
    }

    public function index()
    {
        $data = [];
        $this->load->view('body/header');
        $this->load->view('inventori/index', $data);
        $this->load->view('body/footer');
    }
}

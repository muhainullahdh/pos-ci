<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
	// private $param;

	public function __construct() {
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
        $this->db->from('customers as a');
        $this->db->join('transaksi as b','a.id_customer=b.pelanggan');
        $this->db->join('users as c','c.id=b.kasir');
        $penjualan = $this->db->get()->result();
        $data = [
            "penjualan" => $penjualan,
        ];
		$this->load->view('body/header');
		$this->load->view('penjualan/index',$data);
		$this->load->view('body/footer');
    }
}


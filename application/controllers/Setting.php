<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller
{
    // private $param;

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('Pdf');
        // $this->load->model('M_admin');
        $this->load->helper(array('form', 'url'));
        // $this->load->library(array('form_validation','Routerosapi'));
        //cek jika user blm login maka redirect ke halaman login
        if ($this->session->userdata('username', 'nama') != true) {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Maaf anda belum login !</div>');
            redirect('login');
        }
    }
    function struk()
    {
        $nama = $this->input->post('nama');
        $no_telp = $this->input->post('telp');
        $tipe_penjualan = $this->input->post('tipe_penjualan');
        $action = $this->input->post('action');
        // if ($nama == true && $no_telp == true && $action != 'edit') {
        //     $cek = $this->db->query("SELECT * FROM customers where nama_toko='$nama' ")->num_rows();
        //     if ($cek == true) {
        //         $this->session->set_flashdata('msg', 'double_satuan');
        //         $this->session->set_flashdata('msg_val', $nama);
        //         redirect('user/customer');
        //     } else {
        //         $datax = [
        //             "kode_pelanggan" => $this->input->post('kd_pelanggan'),
        //             "nama_toko" => $nama,
        //             "no_telp" => $no_telp,
        //             "pic_toko" => $this->input->post('pic'),
        //             "alamat" => $this->input->post('alamat'),
        //             "kota" => $this->input->post('kota'),
        //             "email" => $this->input->post('email'),
        //             "jadwal_kirim" => $this->input->post('jadwal_kirim'),
        //             "tipe_penjualan" => $tipe_penjualan,
        //             "tipe_pembayaran" => $this->input->post('tipe_pembayaran'),
        //             "salesman" => $this->input->post('sales'),
        //             "tanggal_member" => date('Y-m-d'),
        //             "status" => 1,

        //         ];
        //         $this->db->insert('customers', $datax);
        //         redirect('user/customer');
        //     }
        // }
        if ($action == 'edit' && $this->input->post('editor1') == true) {

            $datax = [
                "struk" => $this->input->post('editor1'),
            ];
            $this->db->where('id', 1);
            $this->db->update('setting', $datax);
            redirect('setting/struk');

        }else if ($action == 'edit' && $this->input->post('editor2') == true) {
            $datax = [
                "alamat" => $this->input->post('editor2'),
            ];
            $this->db->where('id', 1);
            $this->db->update('setting', $datax);
            redirect('setting/struk');

        }
        // if ($this->session->userdata('filter_penjualan') == true) {
        //     $this->db->where('tipe_penjualan', $this->session->userdata('filter_penjualan'));
        // }
        $data = [
            "setting" => $this->db->get_where('setting',['id' => 1])->row_array()
        ];
        // $this->session->set_flashdata('msg','Data tidak boleh kosong');
        // redirect('barang/satuan');
        $this->load->view('body/header');
        $this->load->view('user/setting', $data);
        $this->load->view('body/footer');  
    }
}
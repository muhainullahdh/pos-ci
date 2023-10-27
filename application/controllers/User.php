<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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
    function customer()
    {
        $nama = $this->input->post('nama');
        $no_telp = $this->input->post('telp');
        $tipe_penjualan = $this->input->post('tipe_penjualan');
        $action = $this->input->post('action');
        $id = $this->input->post('id_customers');
        if ($nama == true && $no_telp == true && $action != 'edit') {
            $cek = $this->db->query("SELECT * FROM customers where nama='$nama' ")->num_rows();
            if ($cek == true) {
                $this->session->set_flashdata('msg','double_satuan');
                $this->session->set_flashdata('msg_val',$nama);
                redirect('user/customer');
            }else{
                $datax = [
                    "nama" => $nama,
                    "no_telp" => $no_telp,
                    "tipe_penjualan" => $tipe_penjualan
                ];
                $this->db->insert('customers',$datax);
                redirect('user/customer');
            }
        }
        if ($action == 'edit') {

            $datax = [
                "nama" => $nama,
                "no_telp" => $no_telp,
                "tipe_penjualan" => $tipe_penjualan
            ];
            $this->db->where('id_customer',$id);
            $this->db->update('customers',$datax);
            redirect('user/customer');

        }
        $data = [
            "customers" => $this->db->get('customers')->result()
        ];
            // $this->session->set_flashdata('msg','Data tidak boleh kosong');
            // redirect('barang/satuan');
            $this->load->view('body/header');
            $this->load->view('user/customers',$data);
            $this->load->view('body/footer');
    }
    function delete_customer()
    {
        $id = $this->input->post('id');
        $this->db->where('id_customer',$id);
        $this->db->delete('customers');
        echo json_encode('berhasil');
    }
}

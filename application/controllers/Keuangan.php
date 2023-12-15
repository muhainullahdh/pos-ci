<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'date'));

        //cek jika user blm login maka redirect ke halaman login
        if ($this->session->userdata('username', 'nama')  != true) {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Maaf anda belum login !</div>');
            redirect('login');
        }
    }

    public function index()
    {
        $data = [
            "payment" => $this->db->where('piutang', 1)->order_by('id', 'DESC')->get('transaksi')->result()
        ];

        $this->load->view('body/header');
        $this->load->view('keuangan/index', $data);
        $this->load->view('body/footer');
    }

    public function bayar_angsuran($id)
    {
        $nominal_bayar = str_replace(",", "", $this->input->post('nominal_bayar'));
        $sisa = $this->input->post('sisa');

        if ($sisa == 0) {
            $status_piutang = 0;
        } else {
            $status_piutang = 1;
        }

        $data_histori = [
            "id_transaksi" => $id,
            "nominal_bayar" => str_replace(",", "", $nominal_bayar),
            "post_date" => date('Y-m-d H:i:s'),
            "user" => $this->session->userdata('id_user')
        ];

        $transaksi = $this->db->select('total_bayar, no_struk')->where('id', $id)->get('transaksi')->row_array();

        $total_bayar_baru = $transaksi['total_bayar'] + $nominal_bayar;

        $data_transaksi = [
            "total_bayar" => $total_bayar_baru,
            "piutang" => $status_piutang
        ];


        $newTab = [
            "url_newtab" => base_url('pos/cetak?id=') . $id
        ];


        // exit;

        // $cek = $this->db->where('id_transaksi', $id)->get('histori_transaksi')->row_array();
        // echo '<pre>';
        // print_r($cek);
        // echo '</pre>';

        // exit;

        $this->db->insert('histori_transaksi', $data_histori);

        $this->db->where('id', $id);
        $this->db->update('transaksi', $data_transaksi);

        $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data pembayaran ' . $transaksi['no_struk'] . ' berhasil diperbarui.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');

        $this->session->set_flashdata('new_tab', '<script>window.open("' . base_url('pos/cetak?id=') . $id . '&status=not_first", "_blank");</script>');
        redirect('keuangan');
    }
}

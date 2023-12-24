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
        $data_b = $this->db->query('SELECT max(id_faktur) as no_faktur FROM faktur')->row_array();
        $no_bukti_faktur = $data_b['no_faktur'];
        // $urutan = (int) substr($no_bukti_faktur, 2, 6);
        // $urutan++;
        // // $huruf = "BH";
        // $no_bukti_faktur = sprintf("%06s", $urutan);
        
        $data = [
            'no_faktur' => str_pad($no_bukti_faktur, 6, "0", STR_PAD_LEFT), //urutan faktur berdasarkan id
            'pelanggan' => $this->db->get('customers')->result(),
            "payment" => $this->db->where('piutang', 1)->where_not_in('pelanggan', '273')->from('transaksi as a')->join('customers as b', 'a.pelanggan = b.id_customer', 'left')->order_by('a.id', 'DESC')->get()->result(),
        ];
        $this->load->view('body/header');
        $this->load->view('keuangan/index', $data);
        $this->load->view('body/footer');
    }
    function get_piutang_customers()
    {
        $id = $this->input->post('id');//id pelanggan
        $cek_faktur = $this->db->get_where('faktur',['pelanggan' => $id])->num_rows();
        // if ($cek_faktur == true) {
        //     $this->db->select('*,sum(b.jumlah_bayar) as jumlah_bayar');
        //     $this->db->where('a.pelanggan',$id);
        //     $this->db->from('faktur as a');
        //     $this->db->join('faktur_detail as b','a.no_bukti=b.no_bukti');
        //     $this->db->group_by('a.id_transaksi');
        //     $db = $this->db->get()->result();
        //     $output = [
        //         "status" => 'already',
        //         "res" => $db
        //     ];
        // } else {
            $this->db->select('*,CONCAT("P",LPAD(c.id, 6, "0")) as no_faktur,DATE_ADD(a.tgl_transaksi, INTERVAL 10 DAY) as tgl_tempo_faktur,a.total_transaksi - sum(c.nominal_bayar) jumlah_bayar_piutang,a.id as id_transaksi_piutang');
            $this->db->where('a.pelanggan', $id);
            $this->db->where('a.piutang', 1);
            $this->db->from('transaksi as a');
            $this->db->join('customers as b', 'a.pelanggan=b.id_customer','LEFT');
            $this->db->join('histori_transaksi as c', 'a.id=c.id_transaksi','LEFT');
            $this->db->join('piutang as d', 'a.id=d.id_transaksi','LEFT');
            $this->db->join('faktur as e','a.pelanggan=e.pelanggan','LEFT');
            $this->db->join('faktur_detail as f','a.id=f.id_transaksi','LEFT');
            $this->db->group_by('a.no_struk');
            $db = $this->db->get()->result();
            $output = [
                "status" => 'ready',
                "res" => $db
            ];
        // }
        echo json_encode($output);
    }
    public function bayar_angsuran()
    {
        $id = $this->input->post('id');
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

        // $this->db->where('id', $id);
        // $this->db->update('transaksi', $data_transaksi);
        echo json_encode('berhasil');
        // $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        //     Data pembayaran ' . $transaksi['no_struk'] . ' berhasil diperbarui.
        // <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        // </div>');

        // $this->session->set_flashdata('new_tab', '<script>window.open("' . base_url('pos/cetak?id=') . $id . '&status=not_first", "_blank");</script>');
        // redirect('keuangan');
    }
    function simpan()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $no_bukti = $this->input->post('no_bukti');
        $dk = $this->input->post('dk');
        $tgl_bukti = $this->input->post('tgl_bukti');
        $id_pelanggan = $this->input->post('id_pelanggan');
        $kd_akun = $this->input->post('kd_akun');
        $nama_akun = $this->input->post('nama_akun');
        $salesman = $this->input->post('salesman');
        $keterangan = $this->input->post('keterangan');
        $pembayaran = $this->input->post('pembayaran');

        $faktur = [
            "id_transaksi" => 1,
            "no_bukti" => $no_bukti,
            "tgl_bukti" => $tgl_bukti,
            "pelanggan" => $id_pelanggan,
            "pembayaran" => $pembayaran,
            "kode_akun" => $kd_akun,
            "nama_akun" => $nama_akun,
            "keterangan" => $keterangan,
        ];
        $this->db->insert('faktur',$faktur);
        foreach ($this->input->post('piutang_pelanggan_list') as $x) {
            $faktur_detail = [
                "id_transaksi" => $x['id_transaksi'],
                "no_bukti" => $no_bukti, //no_bukti ambil dari table faktur
                "no_faktur" => $x['no_faktur'],
                "tgl_faktur" => $x['tgl_faktur'],
                "tgl_jatuh_tempo" => $x['tgl_tempo'],
                "sisa_piutang" => $this->clean($x['sisa_piutang']),
                "jumlah_bayar" => $this->clean($x['nominal_bayar']),
                "keterangan" => $x['keterangan'],
                "status_piutang" => 1
            ];
            $this->db->insert('faktur_detail', $faktur_detail);
        }
        echo json_encode("berhasil");
        // $this->db->insert('histori_transaksi');//table hisstroy pemabayaran piutang
    }
    function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
}

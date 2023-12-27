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
        $this->db->select('*,a.tgl_bukti as tgl_bukti_faktur');
        // $this->db->where('a.pelanggan', $id);
        // $this->db->where('a.piutang', 1);
        if ($this->session->userdata('tgl_filter_piutang') == true && $this->session->userdata('tgl_filter_piutang2') == true ) {
            $this->db->where('a.tgl_bukti >=', $this->session->userdata('tgl_filter_piutang'));
            $this->db->where('a.tgl_bukti <=', $this->session->userdata('tgl_filter_piutang2'));
        } else {
            $date = date('Y-m-d');
            $this->session->set_userdata('tgl_filter_piutang', $date);
            $this->session->set_userdata('tgl_filter_piutang2', $date);
        }
        $this->db->where('b.tgl_faktur !=', null);
        $this->db->from('faktur as a');
        $this->db->join('faktur_detail as b','a.no_bukti=b.no_bukti');
        $this->db->join('customers as c','a.pelanggan=c.id_customer');
        $this->db->join('transaksi as d','b.id_transaksi=d.id');
        $this->db->group_by('b.no_bukti');
        $db_faktur = $this->db->get()->result();
        
        $data = [
            'faktur' => $db_faktur,
            'no_faktur' => str_pad($no_bukti_faktur, 6, "0", STR_PAD_LEFT), //urutan faktur berdasarkan id
            'pelanggan' => $this->db->get('customers')->result(),
            "payment" => $this->db->where('piutang', 1)->where_not_in('pelanggan', '273')->from('transaksi as a')->join('customers as b', 'a.pelanggan = b.id_customer', 'left')->order_by('a.id', 'DESC')->get()->result(),
        ];
        $this->load->view('body/header');
        $this->load->view('keuangan/index', $data);
        $this->load->view('body/footer');
    }
    function set_url()
    {
        $date = date('Y-m-d');
        $this->session->set_userdata('tgl_filter_piutang', $date);
        $uri = $this->uri->segment(3);
        $this->session->set_userdata('menu_piutang',$uri);
        redirect('keuangan');
    }
    function filter_tgl()
    {
        $uri = $this->uri->segment(3);
        $date = $this->input->post('tgl');
        if ($uri == 'start') {
            $this->session->set_userdata('tgl_filter_piutang',$date);
        }else if ($uri == 'end') {
            $this->session->set_userdata('tgl_filter_piutang2', $date);
        }
        redirect('keuangan');
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
            $this->db->select('*,CONCAT("P",LPAD(a.id, 6, "0")) as no_faktur,DATE_ADD(a.tgl_transaksi, INTERVAL 10 DAY) as tgl_tempo_faktur,a.total_transaksi - sum(c.nominal_bayar) as jumlah_bayar_piutang,a.id as id_transaksi_piutang');
            $this->db->where('a.pelanggan', $id);
            $this->db->where('a.piutang', 1);
            $this->db->from('transaksi as a');
            $this->db->join('customers as b', 'a.pelanggan=b.id_customer','LEFT');
            $this->db->join('histori_transaksi as c', 'a.id=c.id_transaksi','LEFT');
            $this->db->join('piutang as d', 'a.id=d.id_transaksi','LEFT');
            $this->db->join('faktur as e', 'a.pelanggan=e.pelanggan', 'LEFT');
            $this->db->join('faktur_detail as f', 'a.id=f.id_transaksi', 'LEFT');
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
            "no_bukti" => $no_bukti,
            "tgl_bukti" => $tgl_bukti,
            "pelanggan" => $id_pelanggan,
            "pembayaran" => $pembayaran,
            "kode_akun" => $kd_akun,
            "nama_akun" => $nama_akun,
            "dk" => $dk,
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

            $piutang_history = [
                "id_transaksi" => $x['id_transaksi'],
                "nominal_bayar" => $this->clean($x['nominal_bayar']),
            ];
            $this->db->insert('histori_transaksi', $piutang_history);
        }
        echo json_encode(
            [
                "id_pelanggan" => $id_pelanggan,
                'message' => 'berhasil'
            ]
        );
        // $this->db->insert('histori_transaksi');//table hisstroy pemabayaran piutang
    }
    function cetak()
    {
        $no_struk = $this->uri->segment(3);
        // $mpdf = new \Mpdf\Mpdf([
        //     // 'tempDir' => '/tmp',
        //     'mode' => '',
        //     'format' => array(90, 80),
        //     'default_font_size' => 0,
        //     'default_font' => '',
        //     'margin_left' => 15,
        //     'margin_right' => 15,
        //     'margin_top' => 5,
        //     'margin_bottom' => 10,
        //     'margin_header' => 10,
        //     'margin_footer' => 5,
        //     'orientation' => 'P',
        //     'showImageErrors' => true
        // ]);
        $this->db->select('*');
        $this->db->where('a.id', $no_struk);
        $this->db->join('piutang as b', 'a.id=b.id_transaksi', 'LEFT');
        $this->db->join('histori_transaksi as c', 'a.id=c.id_transaksi', 'LEFT');
        $get_transaksi = $this->db->get("transaksi as a")->row_array();

        $this->db->where('id_transaksi', $no_struk);
        $get_transaksi_item = $this->db->get("transaksi_item")->result();
        $data = [
            "transkasi" => $get_transaksi,
            "transaksi_item" => $get_transaksi_item
        ];
        $this->load->view('keuangan/cetak', $data);
        // $mpdf->defaultfooterline=0;
        // // $mpdf->setFooter('<div style="text-align: left;">F.7.1.1</div>');
        // $mpdf->WriteHTML($html);
        // $mpdf->SetJS('this.print();');
        // $mpdf->Output();
    }
    function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
}

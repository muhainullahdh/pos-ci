<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
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
        $this->db->from('barang');
        $this->db->order_by('id','ASC');
        $barang = $this->db->get()->result();

        $data_b = $this->db->query('SELECT max(kode_barang) as kode_barang FROM barang')->row_array();
        $kodeBarang = $data_b['kode_barang'];
        // mengambil angka dari kode barang terbesar, menggunakan fungsi substr dan diubah ke integer dengan (int)
        $urutan = (int) substr($kodeBarang, 2, 5);
        // nomor yang diambil akan ditambah 1 untuk menentukan nomor urut berikutnya
        $urutan++;
        // membuat kode barang baru
        // string sprintf("%03s", $urutan); berfungsi untuk membuat string menjadi 3 karakter
        // misalnya string sprintf("%03s", 22); maka akan menghasilkan '022'
        // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya PC
        $huruf = "BH";
        $kodeBarang = $huruf . sprintf("%05s", $urutan);
        $data = [
            "barang" => $barang,
            "kode_barang" => $kodeBarang
        ];
		$this->load->view('body/header');
		$this->load->view('barang/index',$data);
		$this->load->view('body/footer');
	}
    function satuan()
    {
        $satuan = $this->input->post('satuan');
        $singkat = $this->input->post('singkat');
        if ($satuan == true && $singkat == true) {
            $datax = [
                "satuan" => $satuan,
                "singkatan" => strtoupper($singkat)
            ];
            $this->db->insert('satuan',$datax);
            redirect('barang/satuan');
        }
        $data = [
            "satuan" => $this->db->get('satuan')->result()
        ];
            // $this->session->set_flashdata('msg','Data tidak boleh kosong');
            // redirect('barang/satuan');
            $this->load->view('body/header');
            $this->load->view('barang/satuan',$data);
            $this->load->view('body/footer');

    }
    function kategori()
    {
        $satuan = $this->input->post('kategori');
        $singkat = $this->input->post('singkat');
        if ($satuan == true) {
            $datax = [
                "nama_kategori" => $satuan,
            ];
            $this->db->insert('kategori',$datax);
            redirect('barang/satuan');
        }
        $data = [
            "kategori" => $this->db->get('kategori')->result()
        ];
            // $this->session->set_flashdata('msg','Data tidak boleh kosong');
            // redirect('barang/satuan');
            $this->load->view('body/header');
            $this->load->view('barang/kategori',$data);
            $this->load->view('body/footer');

    }
    function brand()
    {
        $brand = $this->input->post('brand');
        if ($brand == true) {
            $datax = [
                "nama_brand" => $brand,
            ];
            $this->db->insert('brand',$datax);
            redirect('barang/brand');
        }
        $data = [
            "brand" => $this->db->get('brand')->result()
        ];
            // $this->session->set_flashdata('msg','Data tidak boleh kosong');
            // redirect('barang/satuan');
            $this->load->view('body/header');
            $this->load->view('barang/brand',$data);
            $this->load->view('body/footer');

    }
    function get_barang()
    {
        $id = $this->input->post('id');
        $this->db->where('a.id',$id);
        $this->db->from('barang as a');
        $this->db->join('kategori as b','a.kategori_id=b.id');
        $data=  $this->db->get()->row_array();
        echo json_encode($data);
    }
    function get_kategori()
    {
        $id = $this->input->post('id');
        if ($id == true) {
            $this->db->where('id',$id);
        }
        $this->db->from('kategori');
        $data=  $this->db->get()->result();
        echo json_encode($data);
    }
    function get_satuan()
    {
        $id = $this->input->post('id');
        if ($id == true) {
            $this->db->where('id_satuan',$id);
        }
        $this->db->from('satuan');
        $data=  $this->db->get()->result();
        echo json_encode($data);
    }
    // isi_besar : $('.isi_besar').val(),
    // id_satuank : $('.satuank').val(),
    // isi_kecil : $('.isi_kecil').val(),
    // kategori_id : $('.kategori').val(),
    // stok : $('.stok').val(),
    // hpp_besar : $('.hpp_besar').val(),
    // hpp_kecil : $('.hpp_kecil').val(),
    // harga_j_besar : $('.harga_j_besar').val(),
    // harga_j_kecil : $('.harga_j_kecil').val(),
    function submit()
    {
        $cek = $this->input->post('cek');
        $tipe = $this->input->post('tipe');
        $data = [
            "kode_barang" => $this->input->post('kode_barang'),
            "nama" => $this->input->post('nama_barang'),
            "id_satuan_besar" => $this->input->post('id_satuanb'),
            "id_satuan_kecil" => $this->input->post('id_satuank'),
            "id_satuan_kecil_konv" => $this->input->post('satuan_konv'),
            "qty_besar" => $this->input->post('isi_besar'),
            "qty_kecil" => $this->input->post('isi_kecil'),
            "qty_konv" => $this->input->post('isi_konv'),
            "hpp_besar" => $this->clean($this->input->post('hpp_besar')),
            "hpp_kecil" => $this->clean($this->input->post('hpp_kecil')),
            "hpp_konv" => $this->clean($this->input->post('hpp_kecil_konv')),
            "tipe_penjualan" => $this->clean($this->input->post('tipe')),
            "hargajualb_".$tipe => $this->clean($this->input->post('harga_j_besar')),
            "hargajualk_".$tipe => $this->clean($this->input->post('harga_j_kecil')),
            "hargajual_konv_".$tipe => $this->clean($this->input->post('harga_j_konv')),
            "brand" => $this->input->post('brand'),
            "stok" => $this->input->post('stok'),
            "tgl_input" => date('Y-m-d H:i:s'),
            "kategori_id" => $this->input->post('kategori_id'),
            "user_id" => $this->session->userdata('id_user')
        ];
        if ($cek == 'Simpan') {
            $this->db->insert('barang',$data);
            $data_ec = [
                "nama" => $this->input->post('nama_barang'),
                "status" => 200
            ];
            echo json_encode($data_ec);
        }else if($cek == 'Update'){
            echo json_encode("update");
        }
    }
    function delete_kategori()
    {
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->delete('kategori');
        echo json_encode('berhasil');
    }
    function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
     }
}

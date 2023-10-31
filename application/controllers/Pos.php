<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos extends CI_Controller {
	// private $param;

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if ($this->session->userdata('username', 'nama')  != true) {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Maaf anda belum login !</div>');
            redirect('login');
        }
    }
	public function index()
	{
		// $this->load->view('body/header');
        $tipe = $this->input->post('tipe');
        if ($tipe == true) {
            $this->session->set_userdata('tipe_penjualan',$tipe);
        }
        $data = [
            "product" => $this->db->get('barang')->result(),
            "satuan" => $this->db->get('satuan')->result(),
            "customers" => $this->db->get('customers')->result()
        ];
		$this->load->view('pos/sale',$data);
		// $this->load->view('body/foot/er');
	}
    function search_barang()
    {
        $id = $this->input->post('id');

        $this->db->where('a.id', $id);
        $this->db->from('barang as a');
        $this->db->join('satuan as b','a.id=b.barang_id','LEFT');
        $this->db->order_by('a.id','ASC');
        $data = $this->db->get();

        echo json_encode($data->row_array());
    }
    function get_barang()
    {
        $title = $_GET['term'];
        // $this->db->where('status', 'Aktif');
        $this->db->like('a.nama', $title , 'both');
        $this->db->order_by('a.nama', 'asc');
        $this->db->limit(10);
        $this->db->from('barang as a');
        // $this->db->join('satuan as b','a.id_satuan=b.id_satuan','LEFT');
        $result = $this->db->get();
        if (count($result->result()) > 0) {
            foreach ($result->result() as $row)
                $arr_result[] = array(
                    'label'         => $row->nama,
                    'description'   => $row->id
                );
            echo json_encode($arr_result);
        }
    }
    function get_satuan()
    {
        $id = $this->input->post('id');
        $data = $this->db->get_where('satuan',['id_satuan' => $id])->row_array();
        echo json_encode($data);
    }
    function change_customer()
    {
        $tipe = $this->input->post('tipe');
        $xx = $this->session->set_userdata('tipe_penjualan',$tipe);
        if ($xx == true) {
            redirect('pos/sale');
        }
    }
    function submit()
    {
        $id_barang = $this->input->post('id_barang');
        $cek = $this->input->post('cek');
        $urutan = substr($this->input->post('no_struk'),10);
        $data = [
            "no_struk" => $this->input->post('no_struk'),
            "urutan" => $urutan,
            "pelanggan" => explode(',',$this->input->post('tipe'))[1],
            "diskon" => $this->clean($this->input->post('diskon_all')),
            "total_netto" => $this->clean($this->input->post('total_netto')),
            "total_bayar" => $this->clean($this->input->post('total_bayar')),
            "keterangan" => $this->clean($this->input->post('keterangan')),
            "user_id" => $this->session->userdata('id_user')
        ];
        if ($cek == 'BAYAR') {
            foreach ($this->input->post('item') as $x) {
                $output[] = array(
                    "id_transaksi" => 2,
                    "barang" => $x['barang'],
                    "qty" => $x['qty'],
                    "satuan" => $x['satuan'],
                    "harga_satuan" => $x['harga_satuan'],
                    "diskon_item" => $x['diskon_item'],
                    "jumlah" => $x['jumlah'],
                );
            }
            $this->db->insert('transaksi',$data);
            $this->db->insert_batch('transaksi_item',$output);
            $data_ec = [
                "nama" => $this->input->post('no_struk'),
                "status" => 200
            ];

                echo json_encode($data_ec);
        }else if($cek == 'TAHAN'){
            // $this->db->where('id',$id_barang);
            // $this->db->update('barang',$data);
            // $data_ec = [
            //     "nama" => $this->input->post('nama_barang'),
            //     "status" => 200
            // ];
            // echo json_encode($data_ec);
        }
    }
    function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
     }
}

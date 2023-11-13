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
        }else{
            $this->session->set_userdata('tipe_penjualan','umum,273,1');
        }
        $this->db->select('*,sum(c.jumlah) as total_transaksi');
        $this->db->from('transaksi as a');
        $this->db->join('customers as b','a.pelanggan=b.id_customer');
        $this->db->join('transaksi_item as c','a.id=c.id_transaksi');
        $this->db->where('a.trash',0);
        $this->db->where('a.tahan',1);
        $this->db->group_by('a.no_struk');
        $load = $this->db->get()->result();
        $id = $this->uri->segment(3);
        if ($id == true) {
            $transkasi = $this->db->get_where('transaksi',['id' => $id])->row_array();
            $transkasi_item = $this->db->get_where('transaksi_item',['id_transaksi' => $id])->result();
        }else{
            $transkasi = '';
            $transkasi_item = '';
        }
        $data = [
            "product" => $this->db->get('barang')->result(),
            "satuan" => $this->db->get('satuan')->result(),
            "customers" => $this->db->get('customers')->result(),
            "ekspedisi" => $this->db->get('ekspedisi')->result(),
            "transaksi" => $transkasi,
            "transaksi_item" => $transkasi_item,
            "load" => $load
        ];
		$this->load->view('pos/sale',$data);
		// $this->load->view('body/foot/er');
	}
    // function load_hold($id)
    // {
    //     $tipe = $this->input->post('tipe');
    //     if ($tipe == true) {
    //         $this->session->set_userdata('tipe_penjualan',$tipe);
    //     }
    //     $transkasi = $this->db->get_where('transaksi',['id' => $id])->row_array();
    //     $transkasi_item = $this->db->get_where('transaksi_item',['id_transaksi' => $id])->result();
    //     $load = $this->db->get_where('transaksi',['tahan' => 1])->result();
    //     $data = [
    //         "product" => $this->db->get('barang')->result(),
    //         "satuan" => $this->db->get('satuan')->result(),
    //         "customers" => $this->db->get('customers')->result(),
    //         "ekspedisi" => $this->db->get('ekspedisi')->result(),
    //         "transaksi" => $transkasi,
    //         "transaksi_item" => $transkasi_item,
    //         "load" => $load
    //     ];
	// 	$this->load->view('pos/load_sale',$data);
    // }
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
    function cetak()
    {
        $id_transaksi = $this->input->get('id');
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
        $this->db->where('id',$id_transaksi);
        $get_transaksi = $this->db->get("transaksi")->row_array();
        $this->db->where('id_transaksi',$id_transaksi);
        $get_transaksi_item = $this->db->get("transaksi_item")->result();
        $data = [
            "transkasi" => $get_transaksi,
            "transaksi_item" => $get_transaksi_item
        ];
        $this->load->view('pos/cetak', $data);
        // $mpdf->defaultfooterline=0;
        // // $mpdf->setFooter('<div style="text-align: left;">F.7.1.1</div>');
        // $mpdf->WriteHTML($html);
        // $mpdf->SetJS('this.print();');
        // $mpdf->Output();
    }
    function submit()
    {
        $id_barang = $this->input->post('id_barang');
        $cek = $this->input->post('cek');
        $urutan = substr($this->input->post('no_struk'),8);
        $data = [
            "no_struk" => $this->input->post('no_struk'),
            "urutan" => $urutan,
            "pelanggan" => explode(',',$this->input->post('tipe'))[1],
            "diskon" => $this->clean($this->input->post('diskon_all')),
            "total_netto" => $this->clean($this->input->post('total_netto')),
            "total_bayar" => $this->clean($this->input->post('total_bayar')),
            "kembali" => $this->clean($this->input->post('kembali')),
            "jumlah_item" => $this->clean($this->input->post('jumlah_item')),
            "keterangan" => $this->input->post('keterangan'),
            "kasir" => $this->session->userdata('id_user'),
            "pengiriman" => $this->input->post('pengiriman'),
            "tahan" => $this->clean($this->input->post('tahan')),
            "pembayaran" => $this->input->post('pembayaran'),
            "piutang" => $this->input->post('piutang')
        ];
        // if ($cek == 'BAYAR') {
            $this->db->insert('transaksi',$data);
            $get_transkasi = $this->db->query("SELECT MAX(id) as id_transaksi from transaksi")->row_array();
            foreach ($this->input->post('item') as $x) {
                $ex_satuan = explode(',',$x['satuan']);
                $output[] = array(
                    "id_transaksi" => $get_transkasi['id_transaksi'],
                    "kd_barang" => $x['kd_barang'],
                    "barang" => $x['barang'],
                    "qty" => $x['qty'],
                    "qty_satuan" => $ex_satuan[0],
                    "satuan" => $ex_satuan[1],
                    "harga_satuan" => $x['harga_satuan'],
                    "diskon_item" => $x['diskon_item'],
                    "jumlah" => $x['jumlah'],
                );
                $barang = $this->db->get_where('barang',['id' => $x['kd_barang']])->row_array();
                $total_qty_pcs = $barang['stok'] - (intval($x['qty']) *  intval($ex_satuan[0]));
                $this->db->set('stok', $total_qty_pcs);
                $this->db->where('id', $x['kd_barang']);
                $this->db->update('barang');
            }
            $this->db->insert_batch('transaksi_item',$output);
            $data_ec = [
                "id_transaksi" => $get_transkasi['id_transaksi'],
                'no_struk' => $this->input->post('no_struk'),
                'tahan' => $this->input->post('tahan'),
                "status" => 200
            ];
            echo json_encode($data_ec);
        // }else{
        // }
        //     // $this->db->where('id',$id_barang);
        //     // $this->db->update('barang',$data);
        //     // $data_ec = [
        //     //     "nama" => $this->input->post('nama_barang'),
        //     //     "status" => 200
        //     // ];
        //     // echo json_encode($data_ec);
        // }
    }
    function load() {
        $id = $this->input->post('id');
        // $draw=intval($this->input->get("draw"));
        // $start=intval($this->input->get("start"));
        // $length=intval($this->input->get("length"));
        $this->db->where('id_transaksi',$id);
        $query=$this->db->get("transaksi_item")->result();

        // $data= [];

        // foreach($query->result() as$r) {

        //     $data[] =array(
        //             $r->id_transaksi_item,
        //             $r->barang,
        //             $r->qty
        //     );

        // }
        // $result=array(

        //         "draw"=>$draw,
        //             "recordsTotal"=>$query->num_rows(),

        //             "recordsFiltered"=>$query->num_rows(),

        //             "data"=>$data
        //         );

        echo json_encode($query);

        exit();

    }
    function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
     }
}

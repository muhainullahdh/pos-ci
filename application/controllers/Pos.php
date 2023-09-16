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
        $data = [
            "product" => $this->db->get('products')->result(),
            "satuan" => $this->db->get('satuan')->result()
        ];
		$this->load->view('pos/sale',$data);
		// $this->load->view('body/foot/er');
	}
    function search_barang()
    {
        $id = $this->input->post('id');

        $this->db->where('id_product', $id);

        $data = $this->db->get("products")->row_array();
        // $data = array();
        // foreach ($data2 as $hsl)
        //     {
        //         $data[] = $hsl->nama;
        //     }

        echo json_encode($data);
    }
}

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
        $urutan = (int) substr($kodeBarang, 2, 5);
        $urutan++;
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
        $action = $this->input->post('action');
        $id = $this->input->post('id_satuan');
        if ($satuan == true && $singkat == true && $action != 'edit') {
            $cek = $this->db->query("SELECT * FROM satuan where satuan='$satuan' ")->num_rows();
            if ($cek == true) {
                $this->session->set_flashdata('msg','double_satuan');
                $this->session->set_flashdata('msg_val',$satuan);
                redirect('barang/satuan');
            }else{
                $datax = [
                    "satuan" => $satuan,
                    "singkatan" => strtoupper($singkat)
                ];
                $this->db->insert('satuan',$datax);
                redirect('barang/satuan');
            }
        }
        if ($action == 'edit') {

            $datax = [
                "satuan" => $satuan,
                "singkatan" => strtoupper($singkat)
            ];
            $this->db->where('id_satuan',$id);
            $this->db->update('satuan',$datax);
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
        $action = $this->input->post('action');
        $id = $this->input->post('id_kategori');
        if ($satuan == true && $action != 'edit') {
            $cek = $this->db->query("SELECT * FROM kategori where nama_kategori='$satuan' ")->num_rows();
            if ($cek == true) {
                $this->session->set_flashdata('msg','double_satuan');
                $this->session->set_flashdata('msg_val',$satuan);
                redirect('barang/kategori');
            }else{
                $datax = [
                    "nama_kategori" => $satuan,
                ];
                $this->db->insert('kategori',$datax);
                redirect('barang/kategori');
            }
        }
        if ($action == 'edit') {

            $datax = [
                "nama_kategori" => $satuan,
            ];
            $this->db->where('id',$id);
            $this->db->update('kategori',$datax);
            redirect('barang/kategori');

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
    function import()
    {
        $this->load->library('PHPExcel');
        if (isset($_FILES["barang_import"]["name"])) {
			$path = $_FILES["barang_import"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					// $kode_barang = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					// $nama = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					// $angkatan = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$temp_data[] = array(
						'kode_barang'	=> $worksheet->getCellByColumnAndRow(0, $row)->getValue(),
						'nama'	=> $worksheet->getCellByColumnAndRow(1, $row)->getValue(),
						'id_satuan_besar'	=> $worksheet->getCellByColumnAndRow(2, $row)->getValue() == "" ? "" : $worksheet->getCellByColumnAndRow(2, $row)->getValue(),
						'id_satuan_kecil'	=> $worksheet->getCellByColumnAndRow(3, $row)->getValue() == "" ? "" : $worksheet->getCellByColumnAndRow(3, $row)->getValue(),
						'id_satuan_kecil_konv'	=> $worksheet->getCellByColumnAndRow(4, $row)->getValue() == "" ? "" : $worksheet->getCellByColumnAndRow(4, $row)->getValue(),
						'qty_besar'	=> $worksheet->getCellByColumnAndRow(5, $row)->getValue() == "" ? 0 : $worksheet->getCellByColumnAndRow(5, $row)->getValue(),
						'qty_kecil'	=> $worksheet->getCellByColumnAndRow(6, $row)->getValue() == "" ? 0 : $worksheet->getCellByColumnAndRow(6, $row)->getValue(),
						'qty_konv'	=> $worksheet->getCellByColumnAndRow(7, $row)->getValue() == "" ? 0 : $worksheet->getCellByColumnAndRow(7, $row)->getValue(),
						'hpp_besar'	=> $worksheet->getCellByColumnAndRow(8, $row)->getValue() == "" ? 0 : $worksheet->getCellByColumnAndRow(8, $row)->getValue(),
						'hpp_kecil'	=> $worksheet->getCellByColumnAndRow(9, $row)->getValue() == "" ? 0 : $worksheet->getCellByColumnAndRow(9, $row)->getValue(),
						'hpp_konv'	=> $worksheet->getCellByColumnAndRow(10, $row)->getValue() == "" ? 0 : $worksheet->getCellByColumnAndRow(10, $row)->getValue(),
						'hargajualb_retail'	=> $worksheet->getCellByColumnAndRow(11, $row)->getValue() == "" ? 0 : $worksheet->getCellByColumnAndRow(11, $row)->getValue(),
						'hargajualk_retail'	=> $worksheet->getCellByColumnAndRow(12, $row)->getValue() == "" ? 0 : $worksheet->getCellByColumnAndRow(12, $row)->getValue(),
						'hargajual_konv_retail'	=> $worksheet->getCellByColumnAndRow(13, $row)->getValue() == "" ? 0 : $worksheet->getCellByColumnAndRow(13, $row)->getValue(),
						'hargajualb_grosir'	=> $worksheet->getCellByColumnAndRow(14, $row)->getValue() == "" ? 0 : $worksheet->getCellByColumnAndRow(14, $row)->getValue(),
						'hargajualk_grosir'	=> $worksheet->getCellByColumnAndRow(15, $row)->getValue() == "" ? 0 : $worksheet->getCellByColumnAndRow(15, $row)->getValue(),
						'hargajual_konv_grosir'	=> $worksheet->getCellByColumnAndRow(16, $row)->getValue() == "" ? 0 : $worksheet->getCellByColumnAndRow(16, $row)->getValue(),
						'hargajualb_partai'	=> $worksheet->getCellByColumnAndRow(17, $row)->getValue() == "" ? 0 : $worksheet->getCellByColumnAndRow(17, $row)->getValue(),
						'hargajualk_partai'	=> $worksheet->getCellByColumnAndRow(18, $row)->getValue() == "" ? 0 : $worksheet->getCellByColumnAndRow(18, $row)->getValue(),
						'hargajual_konv_partai'	=> $worksheet->getCellByColumnAndRow(19, $row)->getValue() == "" ? 0 : $worksheet->getCellByColumnAndRow(19, $row)->getValue(),
						'hargajualb_promo'	=> $worksheet->getCellByColumnAndRow(20, $row)->getValue() == "" ? 0 : $worksheet->getCellByColumnAndRow(20, $row)->getValue(),
						'hargajualk_promo'	=> $worksheet->getCellByColumnAndRow(21, $row)->getValue() == "" ? 0 : $worksheet->getCellByColumnAndRow(21, $row)->getValue(),
						'hargajual_konv_promo'	=> $worksheet->getCellByColumnAndRow(22, $row)->getValue() == "" ? 0 : $worksheet->getCellByColumnAndRow(22, $row)->getValue(),
						'brand'	=> $worksheet->getCellByColumnAndRow(23, $row)->getValue(),
						'stok'	=> $worksheet->getCellByColumnAndRow(24, $row)->getValue(),
						'min_stok'	=> 1,
                        'kategori_id' => $worksheet->getCellByColumnAndRow(28, $row)->getValue(),
                        'user_id' => 1,
                        'status' => 1,
                        'id_gudang' => 7,
                    );
                    // var_dump(json_encode($nama));
				}
			}
			$insert = $this->db->insert_batch('barang',$temp_data);
			// $this->load->model('ImportModel');
			if($insert){
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-ok"></span> Data Berhasil di Import ke Database');
				redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			echo "Tidak ada file yang masuk";
		}
    }
    function brand()
    {
        $brand = $this->input->post('brand');
        $action = $this->input->post('action');
        $id = $this->input->post('id_brand');
        if ($brand == true) {
            $cek = $this->db->query("SELECT * FROM brand where nama_brand='$brand' ")->num_rows();
            if ($cek == true) {
                $this->session->set_flashdata('msg','double_satuan');
                $this->session->set_flashdata('msg_val',$brand);
                redirect('barang/brand');
            }else{
                $datax = [
                    "nama_brand" => $brand,
                ];
                $this->db->insert('brand',$datax);
                redirect('barang/brand');
            }
        }
        if ($action == 'edit') {

            $datax = [
                "nama_brand" => $brand,
            ];
            $this->db->where('id',$id);
            $this->db->update('brand',$datax);
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
        $this->db->select('*,a.id as id_barang');
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
    function get_brand()
    {
        $id = $this->input->post('id');
        if ($id == true) {
            $this->db->where('id_brand',$id);
        }
        $this->db->from('brand');
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
        $id_barang = $this->input->post('id_barang');
        $cek = $this->input->post('cek');
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
            "hargajualb_retail" => $this->clean($this->input->post('harga_j_besar_retail')),
            "hargajualk_retail" => $this->clean($this->input->post('harga_j_kecil_retail')),
            "hargajual_konv_retail" => $this->clean($this->input->post('harga_j_konv_retail')),
            "hargajualb_grosir" => $this->clean($this->input->post('harga_j_besar_grosir')),
            "hargajualk_grosir" => $this->clean($this->input->post('harga_j_kecil_grosir')),
            "hargajual_konv_grosir" => $this->clean($this->input->post('harga_j_konv_grosir')),
            "hargajualb_partai" => $this->clean($this->input->post('harga_j_besar_partai')),
            "hargajualk_partai" => $this->clean($this->input->post('harga_j_kecil_partai')),
            "hargajual_konv_partai" => $this->clean($this->input->post('harga_j_konv_partai')),
            "hargajualb_promo" => $this->clean($this->input->post('harga_j_besar_promo')),
            "hargajualk_promo" => $this->clean($this->input->post('harga_j_kecil_promo')),
            "hargajual_konv_promo" => $this->clean($this->input->post('harga_j_konv_promo')),
            "brand" => $this->input->post('brand'),
            "stok" => $this->input->post('stok'),
            "tgl_input" => date('Y-m-d H:i:s'),
            "kategori_id" => $this->input->post('kategori_id'),
            "user_id" => $this->session->userdata('id_user')
        ];
        if ($cek == 'Simpan') {
            $cek_db = $this->db->get_where('barang',['kode_barang' => $this->input->post('kode_barang')])->num_rows();
            if ($cek_db == true) {
                $data_ec = [
                    "nama" => $this->input->post('nama_barang'),
                    "status" => "double"
                ];
            }else{
                $this->db->insert('barang',$data);
                $data_ec = [
                    "nama" => $this->input->post('nama_barang'),
                    "status" => 200
                ];
            }
            echo json_encode($data_ec);
        }else if($cek == 'Update'){
            $this->db->where('id',$id_barang);
            $this->db->update('barang',$data);
            $data_ec = [
                "nama" => $this->input->post('nama_barang'),
                "status" => 200
            ];
            echo json_encode($data_ec);
        }
    }

  
    function gudang()
    {
        $kd_supplier = $this->input->post('kd_supplier');
        $nama = $this->input->post('nama');
        $kode = $this->input->post('kode');
        $action = $this->input->post('action');
        $id = $this->input->post('id');
        if ($nama == true && $kode == true && $action != 'edit') {
            $cek = $this->db->query("SELECT * FROM gudang where kode='$kode' ")->num_rows();
            if ($cek == true) {
                $this->session->set_flashdata('msg','double_satuan');
                $this->session->set_flashdata('msg_val',$nama);
                redirect('barang/gudang');
            }else{
                $datax = [
                    "nama" => $nama,
                    "kode" => $kode,
                ];
                $this->db->insert('gudang',$datax);
                redirect('barang/gudang');
            }
        }
        if ($action == 'edit') {
            $datax = [
                "nama" => $nama,
                "kode" => $kode,
            ];
            $this->db->where('id',$id);
            $this->db->update('gudang',$datax);
            redirect('barang/gudang');

        }
        $data = [
            "gudang" => $this->db->get('gudang')->result(),
        ];
            // $this->session->set_flashdata('msg','Data tidak boleh kosong');
            // redirect('barang/satuan');
            $this->load->view('body/header');
            $this->load->view('barang/gudang',$data);
            $this->load->view('body/footer');
    }
    function delete_gudang()
    {
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->delete('gudang');
        echo json_encode('berhasil');
    }
    function delete_kategori()
    {
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->delete('kategori');
        echo json_encode('berhasil');
    }
    function delete_barang()
    {
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->delete('barang');
        echo json_encode('berhasil');
    }
    function delete_satuan()
    {
        $id = $this->input->post('id');
        $this->db->where('id_satuan',$id);
        $this->db->delete('satuan');
        echo json_encode('berhasil');
    }
    function delete_brand()
    {
        $id = $this->input->post('id');
        $this->db->where('id_brand',$id);
        $this->db->delete('brand');
        echo json_encode('berhasil');
    }
    function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
     }
}

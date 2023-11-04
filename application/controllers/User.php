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
    function supplier()
    {
        $kd_supplier = $this->input->post('kd_supplier');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $kota = $this->input->post('kota');
        $no_telp = $this->input->post('telp');
        $email = $this->input->post('email');
        $contact = $this->input->post('contact');
        $tipe_pem = $this->input->post('tipe');
        $action = $this->input->post('action');
        $id = $this->input->post('id');
        if ($nama == true && $no_telp == true && $action != 'edit') {
            $cek = $this->db->query("SELECT * FROM supplier where nama_supplier='$nama' ")->num_rows();
            if ($cek == true) {
                $this->session->set_flashdata('msg','double_satuan');
                $this->session->set_flashdata('msg_val',$nama);
                redirect('user/supplier');
            }else{
                $datax = [
                    "kode_supplier" => $kd_supplier,
                    "nama_supplier" => $nama,
                    "alamat" => $alamat,
                    "kota" => $kota,
                    "telpon" => $no_telp,
                    "email" => $email,
                    "contact" => $contact,
                    "tipe_pembayaran" => $tipe_pem,
                    "status" => 1
                ];
                $this->db->insert('supplier',$datax);
                redirect('user/supplier');
            }
        }
        if ($action == 'edit') {
            $datax = [
                "nama_supplier" => $nama,
                "alamat" => $alamat,
                "kota" => $kota,
                "telpon" => $no_telp,
                "email" => $email,
                "contact" => $contact,
                "tipe_pembayaran" => $tipe_pem,
                "status" => 1
            ];
            $this->db->where('id',$id);
            $this->db->update('supplier',$datax);
            redirect('user/supplier');

        }
        $data_b = $this->db->query('SELECT max(kode_supplier) as kode_supplier FROM supplier')->row_array();
        $kodesupplier = $data_b['kode_supplier'];
        $urutan = (int) substr($kodesupplier, 3, 6);
        $urutan++;
        $huruf = "SPL";
        $kode_supplier = $huruf . sprintf("%05s", $urutan);
        $data = [
            "supplier" => $this->db->get('supplier')->result(),
            "kd_supplier" => $kode_supplier
        ];
            // $this->session->set_flashdata('msg','Data tidak boleh kosong');
            // redirect('barang/satuan');
            $this->load->view('body/header');
            $this->load->view('user/supplier',$data);
            $this->load->view('body/footer');
    }
    function ekspedisi()
    {
        $kd_supplier = $this->input->post('kd_supplier');
        $nama = $this->input->post('nama');
        $kurir = $this->input->post('kurir');
        $resi = $this->input->post('resi');
        $action = $this->input->post('action');
        $id = $this->input->post('id');
        if ($nama == true && $kurir == true && $action != 'edit') {
            $cek = $this->db->query("SELECT * FROM supplier where nama_supplier='$nama' ")->num_rows();
            if ($cek == true) {
                $this->session->set_flashdata('msg','double_satuan');
                $this->session->set_flashdata('msg_val',$nama);
                redirect('user/ekspedisi');
            }else{
                $datax = [
                    "nama" => $nama,
                    "kurir" => $kurir,
                    "no_resi" => $resi,
                ];
                $this->db->insert('ekspedisi',$datax);
                redirect('user/ekspedisi');
            }
        }
        if ($action == 'edit') {
            $datax = [
                "nama" => $nama,
                "kurir" => $kurir,
                "no_resi" => $resi,
            ];
            $this->db->where('id',$id);
            $this->db->update('ekspedisi',$datax);
            redirect('user/ekspedisi');

        }
        $data_b = $this->db->query('SELECT max(kode_supplier) as kode_supplier FROM supplier')->row_array();
        $kodesupplier = $data_b['kode_supplier'];
        $urutan = (int) substr($kodesupplier, 3, 6);
        $urutan++;
        $huruf = "SPL";
        $kode_supplier = $huruf . sprintf("%05s", $urutan);
        $data = [
            "ekspedisi" => $this->db->get('ekspedisi')->result(),
            "kd_supplier" => $kode_supplier
        ];
            // $this->session->set_flashdata('msg','Data tidak boleh kosong');
            // redirect('barang/satuan');
            $this->load->view('body/header');
            $this->load->view('user/ekspedisi',$data);
            $this->load->view('body/footer');
    }
    function delete_customer()
    {
        $id = $this->input->post('id');
        $this->db->where('id_customer',$id);
        $this->db->delete('customers');
        echo json_encode('berhasil');
    }
    function import()
    {
        $this->load->library('PHPExcel');
        if (isset($_FILES["customer_imp"]["name"])) {
			$path = $_FILES["customer_imp"]["tmp_name"];
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
						'kode_pelanggan'	=> $worksheet->getCellByColumnAndRow(0, $row)->getValue(),
						'nama_toko'	=> $worksheet->getCellByColumnAndRow(1, $row)->getValue(),
						'pic_toko'	=> $worksheet->getCellByColumnAndRow(2, $row)->getValue(),
						'no_telp'	=> $worksheet->getCellByColumnAndRow(3, $row)->getValue(),
						'alamat'	=> $worksheet->getCellByColumnAndRow(4, $row)->getValue(),
						'kota'	=> $worksheet->getCellByColumnAndRow(5, $row)->getValue(),
						'email'	=> $worksheet->getCellByColumnAndRow(6, $row)->getValue(),
						'jadwal_kirim'	=> $worksheet->getCellByColumnAndRow(7, $row)->getValue(),
						'tipe_pembayaran'	=> $worksheet->getCellByColumnAndRow(8, $row)->getValue(),
						'tipe_penjualan'	=> $worksheet->getCellByColumnAndRow(9, $row)->getValue(),
						'salesman'	=> $worksheet->getCellByColumnAndRow(10, $row)->getValue(),
						'tanggal_member'	=> $worksheet->getCellByColumnAndRow(11, $row)->getValue(),
						'level'	=> $worksheet->getCellByColumnAndRow(12, $row)->getValue(),
						'status'	=> $worksheet->getCellByColumnAndRow(13, $row)->getValue(),
                    );
                    // var_dump(json_encode($nama));
				}

			}
			$insert = $this->db->insert_batch('customers',$temp_data);
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
    function import_supplier()
    {
        $this->load->library('PHPExcel');
        if (isset($_FILES["supplier_imp"]["name"])) {
			$path = $_FILES["supplier_imp"]["tmp_name"];
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
						'kode_supplier'	=> $worksheet->getCellByColumnAndRow(0, $row)->getValue(),
						'nama_supplier'	=> $worksheet->getCellByColumnAndRow(1, $row)->getValue(),
						'alamat'	=> $worksheet->getCellByColumnAndRow(2, $row)->getValue(),
						'kota'	=> $worksheet->getCellByColumnAndRow(3, $row)->getValue(),
						'telpon'	=> $worksheet->getCellByColumnAndRow(4, $row)->getValue(),
						'email'	=> $worksheet->getCellByColumnAndRow(5, $row)->getValue(),
						'contact'	=> $worksheet->getCellByColumnAndRow(6, $row)->getValue(),
						'tipe_pembayaran'	=> $worksheet->getCellByColumnAndRow(7, $row)->getValue(),
						'status'	=> $worksheet->getCellByColumnAndRow(8, $row)->getValue(),
                    );
                    // var_dump(json_encode($nama));
				}

			}
			$insert = $this->db->insert_batch('supplier',$temp_data);
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
}

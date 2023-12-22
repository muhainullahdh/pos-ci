<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('Pdf');
        // $this->load->model('M_admin');
        $this->load->helper(array('form', 'url'));

        $this->load->library('PHPExcel');
        // $this->load->library(array('form_validation','Routerosapi'));
        //cek jika user blm login maka redirect ke halaman login
        if ($this->session->userdata('username', 'nama')  != true) {
            $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Maaf anda belum login !</div>');
            redirect('login');
        }
    }

    public function index()
    {
        $data = [
            "categories" => $this->db->order_by('nama_kategori', 'ASC')->get('kategori')->result(),
            "gudang" => $this->db->order_by('nama', 'ASC')->get('gudang')->result(),
        ];
        $this->load->view('body/header');
        $this->load->view('inventori/index', $data);
        $this->load->view('body/footer');
    }

    public function stock_opname()
    {
        $data = [];
        $this->load->view('body/header');
        $this->load->view('inventori/stock_opname', $data);
        $this->load->view('body/footer');
    }

    public function koreksi_barang()
    {
        $data = [];
        $this->load->view('body/header');
        $this->load->view('inventori/koreksi_barang', $data);
        $this->load->view('body/footer');
    }

    public function mutasi_barang()
    {
        $data = [];
        $this->load->view('body/header');
        $this->load->view('inventori/mutasi_barang', $data);
        $this->load->view('body/footer');
    }

    public function getBarang()
    {
        $kategoriId = $this->input->post('kategori_id');

        $barang =  $this->db->where('kategori_id', $kategoriId)->order_by('nama', 'ASC')->get('barang')->result();

        // Mengembalikan data dalam format JSON
        echo json_encode($barang);
    }

    public function process()
    {
        $kelompok_barang = $this->input->post('kelompok_barang');
        $barang = $this->input->post('barang');
        $barang2 = $this->input->post('barang2');
        $gudang1 = $this->input->post('gudang1');
        $gudang2 = $this->input->post('gudang2');

        // $data = [
        //     'kategori' => $kelompok_barang,
        //     'barang' => $barang,
        //     'barang2' => $barang2,
        //     'gudang1' => $gudang1,
        //     'gudang2' => $gudang2,
        // ];

        if ($_POST['submit'] == "proses") {
            if ($kelompok_barang) {
                if ($barang) {
                    $nama_barang1 = $this->db->where('id', $barang)->get('barang')->row_array();

                    if (!$barang2) {
                        $data = [
                            "tampil" => $this->db->where('kategori_id', $kelompok_barang)->where('id', $barang)->order_by('nama', 'ASC')->get('barang')->result(),
                            "categories" => $this->db->order_by('nama_kategori', 'ASC')->get('kategori')->result(),
                            "gudang" => $this->db->order_by('nama', 'ASC')->get('gudang')->result(),
                        ];
                    } else {
                        $nama_barang2 = $this->db->where('id', $barang2)->get('barang')->row_array();
                        // var_dump($nama_barang1['nama'], $nama_barang2['nama']);
                        // exit;
                        $data = [
                            "tampil" => $this->db->select('*')->from('barang')->where('nama >=', $nama_barang1['nama'])->where('nama <=', $nama_barang2['nama'])->order_by('nama', 'ASC')->get()->result(),
                            "categories" => $this->db->order_by('nama_kategori', 'ASC')->get('kategori')->result(),
                            "gudang" => $this->db->order_by('nama', 'ASC')->get('gudang')->result(),
                        ];
                    }
                } else {
                    $data = [
                        "tampil" => $this->db->where('kategori_id', $kelompok_barang)->order_by('nama', 'ASC')->get('barang')->result(),
                        "categories" => $this->db->order_by('nama_kategori', 'ASC')->get('kategori')->result(),
                        "gudang" => $this->db->order_by('nama', 'ASC')->get('gudang')->result(),
                    ];
                }
            } else {
                $data = [
                    "tampil" => $this->db->order_by('nama', 'ASC')->get('barang')->result(),
                    "categories" => $this->db->order_by('nama_kategori', 'ASC')->get('kategori')->result(),
                    "gudang" => $this->db->order_by('nama', 'ASC')->get('gudang')->result(),
                ];
            }

            $this->load->view('body/header');
            $this->load->view('inventori/index', $data);
            $this->load->view('body/footer');
        } else if ($_POST['submit'] == "cetak") {

            $mpdf = new \Mpdf\Mpdf([
                'tempDir' => 'assets/pdf',
                'mode' => '',
                'format' => 'A4',
                'default_font_size' => 0,
                'default_font' => '',
                'margin_left' => 15,
                'margin_right' => 15,
                'margin_top' => 5,
                'margin_bottom' => 10,
                'margin_header' => 10,
                'margin_footer' => 10,
                'orientation' => 'L',
            ]);
            if ($kelompok_barang) {
                if ($barang) {
                    $nama_barang1 = $this->db->where('id', $barang)->order_by('nama', 'ASC')->get('barang')->row_array();

                    if (!$barang2) {
                        $data = [
                            "tampil" => $this->db->where('kategori_id', $kelompok_barang)->where('id', $barang)->order_by('nama', 'ASC')->get('barang')->result(),
                        ];
                    } else {
                        $nama_barang2 = $this->db->where('id', $barang2)->order_by('nama', 'ASC')->get('barang')->row_array();
                        // var_dump($nama_barang1['nama'], $nama_barang2['nama']);
                        // exit;
                        $data = [
                            "tampil" => $this->db->select('*')->from('barang')->where('nama >=', $nama_barang1['nama'])->where('nama <=', $nama_barang2['nama'])->order_by('nama', 'ASC')->get()->result(),
                        ];
                    }
                } else {
                    $data = [
                        "tampil" => $this->db->where('kategori_id', $kelompok_barang)->order_by('nama', 'ASC')->get('barang')->result(),
                    ];
                }
            } else {
                $data = [
                    "tampil" => $this->db->get('barang')->order_by('nama', 'ASC')->result(),
                ];
            }
            $html = $this->load->view('inventori/cetak_pdf_sisa_stok', $data, true);
            $mpdf->defaultfooterline = 0;
            // $mpdf->setFooter('<div style="text-align: left;">F.7.1.1</div>');
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        } else if ($_POST['submit'] == "cetak_excel") {
            if ($kelompok_barang) {
                if ($barang) {
                    $nama_barang1 = $this->db->where('id', $barang)->order_by('nama', 'ASC')->get('barang')->row_array();

                    if (!$barang2) {
                        $data = [
                            "tampil" => $this->db->where('kategori_id', $kelompok_barang)->where('id', $barang)->order_by('nama', 'ASC')->get('barang')->result(),
                        ];
                    } else {
                        $nama_barang2 = $this->db->where('id', $barang2)->order_by('nama', 'ASC')->get('barang')->row_array();
                        // var_dump($nama_barang1['nama'], $nama_barang2['nama']);
                        // exit;
                        $data = [
                            "tampil" => $this->db->select('*')->from('barang')->where('nama >=', $nama_barang1['nama'])->where('nama <=', $nama_barang2['nama'])->order_by('nama', 'ASC')->get()->result(),
                        ];
                    }
                } else {
                    $data = [
                        "tampil" => $this->db->where('kategori_id', $kelompok_barang)->order_by('nama', 'ASC')->get('barang')->result(),
                    ];
                }
            } else {
                $data = [
                    "tampil" => $this->db->get('barang')->order_by('nama', 'ASC')->result(),
                ];
            }

            require_once(APPPATH . 'libraries/PHPExcel/IOFactory.php');

            $excel = new PHPExcel();
            // Settingan awal fil excel
            $excel->getProperties()->setCreator('My Notes Code')
                ->setLastModifiedBy('My Notes Code')
                ->setTitle("Sisa Stok")
                ->setSubject("Stok")
                ->setDescription("Laporan Semua Sisa Stok")
                ->setKeywords("Sisa Stok");

            // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
            $style_col = array(
                'font' => array('bold' => true), // Set font nya jadi bold
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
            $style_row = array(
                'alignment' => array(
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            // print_r($data['tampil']);
            // foreach ($data['tampil'] as $t) {
            //     echo '<pre>';
            //     print_r($t->nama);
            //     echo '</pre>';
            // }
            // exit;

            // bagian header
            $excel->setActiveSheetIndex(0)->setCellValue('A1', "No.");
            $excel->setActiveSheetIndex(0)->setCellValue('B1', "Kode barang");
            $excel->setActiveSheetIndex(0)->setCellValue('C1', "Nama barang");
            $excel->setActiveSheetIndex(0)->setCellValue('D1', "Satuan");
            $excel->setActiveSheetIndex(0)->setCellValue('E1', "Sisa stok");
            $excel->setActiveSheetIndex(0)->setCellValue('F1', "Saldo stok");

            // Apply style header yang telah kita buat tadi ke masing-masing kolom header
            $excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);

            $no = 1;
            $numrow = 2;
            foreach ($data['tampil'] as $t) {
                $saldo_stock = $t->qty_kecil + $t->hargajualk_retail;

                $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
                $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $t->kode_barang);
                $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $t->nama);
                $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $t->qty_kecil . ' '  . $t->id_satuan_kecil);
                $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $t->stok);
                $excel->setActiveSheetIndex(0)->setCellValue('f' . $numrow, $saldo_stock);

                // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
                $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);


                $no++; // Tambah 1 setiap kali looping
                $numrow++; // Tambah 1 setiap kali looping
            }

            // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
            $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

            // Set orientasi kertas jadi LANDSCAPE
            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

            // Rename worksheet
            $excel->getActiveSheet()->setTitle('Sisa stok');


            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $excel->setActiveSheetIndex(0);


            // Redirect output to a client’s web browser (Excel5)
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Sisa stok.xls"');
            header('Cache-Control: max-age=0');
            // If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');

            // If you're serving to IE over SSL, then the following may be needed
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
            header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header('Pragma: public'); // HTTP/1.0

            $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
            $objWriter->save('php://output');
            exit;
        }
    }
}

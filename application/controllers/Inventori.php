<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('Pdf');
        $this->load->model('M_Barang');
        $this->load->helper(array('form', 'url', 'date'));

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
        $max_num = $this->db->select('max(no_urut) as max')->get('stock_opname')->row_array();

        if (!$max_num) {
            $bilangan = 1; // Nilai Proses
        } else {
            $bilangan = $max_num['max'] + 1;
        }

        $no_urut = sprintf("%06d", $bilangan);

        $no_stock_opname = 'STP-' . date('ym') . '-' . $no_urut;
        $data = [
            "gudang2" => $this->db->order_by('id', 'ASC')->get('gudang')->result(),
            "lists" => $this->db->order_by('no_stock_opname', 'DESC')->get('stock_opname')->result(),
            "no_sop" => $no_stock_opname,
            "no_urut" => $no_urut,
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/stock_opname', $data);
        $this->load->view('body/footer');
    }

    public function process_stock_opname()
    {
        $data = [
            "gudang" => $this->db->order_by('nama', 'ASC')->get('gudang')->result(),
            "tanggal" => $this->input->post('tanggal'),
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/stock_opname', $data);
        $this->load->view('body/footer');
    }

    public function koreksi_barang()
    {
        $max_num = $this->db->select('max(no_urut) as max')->get('koreksi')->row_array();

        if (!$max_num) {
            $bilangan = 1; // Nilai Proses
        } else {
            $bilangan = $max_num['max'] + 1;
        }

        $no_urut = sprintf("%06d", $bilangan);

        $no_koreksi = 'STP-' . date('ym') . '-' . $no_urut;
        $data = [
            "gudang2" => $this->db->order_by('id', 'ASC')->get('gudang')->result(),
            "lists" => $this->db->order_by('no_koreksi', 'DESC')->get('koreksi')->result(),
            "no_koreksi" => $no_koreksi,
            "no_urut" => $no_urut,
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/koreksi_barang', $data);
        $this->load->view('body/footer');
    }

    public function proses_koreksi_barang()
    {
        $id_barang = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang');

        $data_koreksi = [
            "id_barang" => $id_barang,
            "tanggal_koreksi" => date('Y-m-d'),
            "stok_awal" => $this->input->post('stok'),
            "debit_kredit" => $this->input->post('debit_kredit'),
            "jumlah_koreksi" => $this->input->post('jumlah'),
            "alasan_koreksi" => $this->input->post('alasan_koreksi'),
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => $this->session->userdata('id_user'),
        ];

        $this->db->insert('koreksi', $data_koreksi);

        $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Stok ' . $nama_barang . ' telah dikoreksi. Menunggu persetujuan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');

        redirect('inventori/koreksi_barang');
    }

    public function histori_koreksi()
    {
        $data = [
            'koreksi' => $this->db->select('a.id as id_koreksi, b.nama as nama_barang, tanggal_koreksi, stok_awal, jumlah_koreksi, debit_kredit, alasan_koreksi, c.nama as nama_user, status_koreksi')->from('koreksi a')->join('barang b', 'a.id_barang = b.id', 'left')->join('users c', 'a.created_by = c.id', 'left')->order_by('created_at', 'DESC')->limit(500, 0)->get()->result(),
        ];
        // echo '<pre>';
        // print_r($data['koreksi']);
        // echo '</pre>';
        // exit;


        $this->load->view('body/header');
        $this->load->view('inventori/histori_koreksi', $data);
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

    public function getBarangGudang()
    {
        $gudang_id = $this->input->post('gudang_id');

        $barang =  $this->db->where('id_gudang', $gudang_id)->order_by('nama', 'ASC')->get('barang')->result();

        // Mengembalikan data dalam format JSON
        echo json_encode($barang);
    }

    public function getBarangDetail()
    {
        $id_barang = $this->input->post('barang_id');

        // print_r($id_barang);
        // exit;

        $barang =  $this->db->where('id', $id_barang)->get('barang')->row_array();

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
        $opsi_stok = $this->input->post('opsi_stok');
        $input_nama_barang = $this->input->post('input_nama_barang');

        // $data = [
        //     'kategori' => $kelompok_barang,
        //     'barang' => $barang,
        //     'barang2' => $barang2,
        //     'gudang1' => $gudang1,
        //     'gudang2' => $gudang2,
        // ];
        // $nama_barang1 = $this->db->where('id', $barang)->get('barang')->row_array();
        // $nama_barang2 = $this->db->where('id', $barang2)->get('barang')->row_array();

        // if ($opsi_stok == "all") {
        //     $opsi = "";
        // } else if ($opsi_stok == "sisa_stok") {
        //     $opsi = "'stok !=', '0'";
        // } else if ($opsi_stok == "stok_0") {
        //     $opsi = "'stok =', '0'";
        // } else if ($opsi_stok == "stok_minus") {
        //     $opsi = "'stok <', '0'";
        // } else if ($opsi_stok == "stok_0_dan_minus") {
        //     $opsi = "'stok <=', '0'";
        // }

        // if (!empty($kelompok_barang) && !empty($barang) && !empty($barang2) && !empty($gudang1) && !empty($gudang2) && !empty($opsi_stok) && !empty($input_nama_barang)) {
        //     // Semua form diisi
        // } elseif (!empty($kelompok_barang) && !empty($barang) && !empty($barang2) && !empty($gudang1) && !empty($gudang2) && !empty($opsi_stok)) {
        //     // Form dengan $input_nama_barang tidak diisi
        //     $data = [
        //         "tampil" => $this->db->select('*')->from('barang')->where('nama >=', $nama_barang1['nama'])->where('nama <=', $nama_barang2['nama'])->where('id_gudang >=', $gudang1)->where('id_gudang <=', $gudang2)->where($opsi)->order_by('nama', 'ASC')->get()->result(),
        //         "categories" => $this->db->order_by('nama_kategori', 'ASC')->get('kategori')->result(),
        //         "gudang" => $this->db->order_by('nama', 'ASC')->get('gudang')->result(),
        //     ];
        // } elseif (!empty($kelompok_barang) && !empty($barang) && !empty($barang2) && !empty($gudang1) && !empty($gudang2)) {
        //     // Form dengan $opsi_stok dan $input_nama_barang tidak diisi
        //     $data = [
        //         "tampil" => $this->db->select('*')->from('barang')->where('nama >=', $nama_barang1['nama'])->where('nama <=', $nama_barang2['nama'])->where('id_gudang >=', $gudang1)->where('id_gudang <=', $gudang2)->order_by('nama', 'ASC')->get()->result(),
        //         "categories" => $this->db->order_by('nama_kategori', 'ASC')->get('kategori')->result(),
        //         "gudang" => $this->db->order_by('nama', 'ASC')->get('gudang')->result(),
        //     ];
        // } elseif (!empty($kelompok_barang) && !empty($barang) && !empty($barang2) && !empty($gudang1)) {
        //     // Form dengan $gudang2, $opsi_stok, dan $input_nama_barang tidak diisi
        //     $data = [
        //         "tampil" => $this->db->select('*')->from('barang')->where('nama >=', $nama_barang1['nama'])->where('nama <=', $nama_barang2['nama'])->where('id_gudang', $gudang1)->order_by('nama', 'ASC')->get()->result(),
        //         "categories" => $this->db->order_by('nama_kategori', 'ASC')->get('kategori')->result(),
        //         "gudang" => $this->db->order_by('nama', 'ASC')->get('gudang')->result(),
        //     ];
        // } elseif (!empty($kelompok_barang) && !empty($barang) && !empty($barang2)) {
        //     // Form dengan $gudang1, $gudang2, $opsi_stok, dan $input_nama_barang tidak diisi
        //     $data = [
        //         "tampil" => $this->db->select('*')->from('barang')->where('nama >=', $nama_barang1['nama'])->where('nama <=', $nama_barang2['nama'])->order_by('nama', 'ASC')->get()->result(),
        //         "categories" => $this->db->order_by('nama_kategori', 'ASC')->get('kategori')->result(),
        //         "gudang" => $this->db->order_by('nama', 'ASC')->get('gudang')->result(),
        //     ];
        // } elseif (!empty($kelompok_barang) && !empty($barang)) {
        //     // Form dengan $barang2, $gudang1, $gudang2, $opsi_stok, dan $input_nama_barang tidak diisi
        //     $data = [
        //         "tampil" => $this->db->where('kategori_id', $kelompok_barang)->where('id', $barang)->order_by('nama', 'ASC')->get('barang')->result(),
        //         "categories" => $this->db->order_by('nama_kategori', 'ASC')->get('kategori')->result(),
        //         "gudang" => $this->db->order_by('nama', 'ASC')->get('gudang')->result(),
        //     ];
        // } elseif (!empty($kelompok_barang)) {
        //     // Form dengan $barang, $barang2, $gudang1, $gudang2, $opsi_stok, dan $input_nama_barang tidak diisi
        //     $data = [
        //         "tampil" => $this->db->where('kategori_id', $kelompok_barang)->order_by('nama', 'ASC')->get('barang')->result(),
        //         "categories" => $this->db->order_by('nama_kategori', 'ASC')->get('kategori')->result(),
        //         "gudang" => $this->db->order_by('nama', 'ASC')->get('gudang')->result(),
        //     ];
        // }

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
    }

    public function unduh_stock()
    {
        $kelompok_barang = $this->input->post('kelompok_barang');
        $barang = $this->input->post('barang');
        $barang2 = $this->input->post('barang2');
        $gudang1 = $this->input->post('gudang1');
        $gudang2 = $this->input->post('gudang2');
        $opsi_stok = $this->input->post('opsi_stok');
        $input_nama_barang = $this->input->post('input_nama_barang');

        // $data = [
        //     'kategori' => $kelompok_barang,
        //     'barang' => $barang,
        //     'barang2' => $barang2,
        //     'gudang1' => $gudang1,
        //     'gudang2' => $gudang2,
        // ];
        if ($_POST['submit'] == "cetak") {

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
                $saldo_stock = $t->stok * $t->hpp_kecil;

                $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
                $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $t->kode_barang);
                $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $t->nama);
                $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $t->id_satuan_kecil);
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

    public function cetak_pdf()
    {
        $dataArray = $this->input->get('data');
        echo json_encode($dataArray);
        // Tidak perlu exit di sini, kecuali Anda memang ingin menghentikan eksekusi lebih lanjut.
    }
    public function add_stock_opname()
    {
        $tanggal = $this->input->post('tanggal');
        $gudang = $this->input->post('gudang');
        $keterangan = $this->input->post('keterangan');

        $max_num = $this->db->select('max(no_urut) as max')->get('stock_opname')->row_array();

        if (!$max_num) {
            $bilangan = 1; // Nilai Proses
        } else {
            $bilangan = $max_num['max'] + 1;
        }

        $no_urut = sprintf("%06d", $bilangan);

        $no_stock_opname = 'STP-' . date('ym') . '-' . $no_urut;

        $data = [
            'no_urut' => $no_urut,
            'no_stock_opname' => $no_stock_opname,
            'tanggal_opname' => $tanggal,
            'id_gudang' => $gudang,
            'keterangan' => $keterangan,
            "gudang2" => $this->db->order_by('id', 'ASC')->get('gudang')->result(),
            "barang" =>  $this->db->where('id_gudang', $gudang)->order_by('nama', 'ASC')->get('barang')->result(),
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/add_detail_sop', $data);
        $this->load->view('body/footer');
    }

    public function add_koreksi()
    {
        $tanggal = $this->input->post('tanggal');
        $gudang = $this->input->post('gudang');
        $keterangan = $this->input->post('keterangan');

        $max_num = $this->db->select('max(no_urut) as max')->get('koreksi')->row_array();

        if (!$max_num) {
            $bilangan = 1; // Nilai Proses
        } else {
            $bilangan = $max_num['max'] + 1;
        }

        $no_urut = sprintf("%06d", $bilangan);

        $no_koreksi = 'STP-' . date('ym') . '-' . $no_urut;

        $data = [
            'no_urut' => $no_urut,
            'no_koreksi' => $no_koreksi,
            'tanggal_koreksi' => $tanggal,
            'id_gudang' => $gudang,
            'keterangan' => $keterangan,
            "gudang2" => $this->db->order_by('id', 'ASC')->get('gudang')->result(),
            "barang" =>  $this->db->where('id_gudang', $gudang)->order_by('nama', 'ASC')->get('barang')->result(),
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/add_detail_koreksi', $data);
        $this->load->view('body/footer');
    }

    public function detail_koreksi()
    {
        $id = $this->uri->segment(3);

        $koreksi = $this->db->where('no_koreksi', $id)->get('koreksi')->row_array();

        $data = [
            "koreksi" => $koreksi,
            "list" => $this->db->where('id_koreksi', $koreksi['id'])->get('koreksi_details')->result(),
            "barang" =>  $this->db->where('id_gudang', $koreksi['id_gudang'])->order_by('nama', 'ASC')->get('barang')->result(),
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/koreksi_detail', $data);
        $this->load->view('body/footer');
    }

    public function detail_sop()
    {
        $id = $this->uri->segment(3);

        $sop = $this->db->where('no_stock_opname', $id)->get('stock_opname')->row_array();

        $data = [
            "sop" => $sop,
            "list" => $this->db->where('id_stock_opname', $sop['id'])->get('stock_opname_details')->result(),
            "barang" =>  $this->db->where('id_gudang', $sop['id_gudang'])->order_by('nama', 'ASC')->get('barang')->result(),
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/stock_opname_detail', $data);
        $this->load->view('body/footer');
    }

    public function add_detail_sop()
    {
        // Assuming you have received the form data through POST
        $no_stock_opname = $this->input->post('no_sop');
        $tanggal_opname = $this->input->post('tanggal_sop');

        // Create a new stock_opname record
        $stock_opname_data = array(
            'no_urut' => $this->input->post('no_urut'),
            'no_stock_opname' => $no_stock_opname,
            'tanggal_opname' => $tanggal_opname,
            'id_gudang' => $this->input->post('gudang'),
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $this->session->userdata('id_user'),
        );

        // Insert into stock_opname table
        $this->db->insert('stock_opname', $stock_opname_data);

        // Get the inserted stock_opname ID
        $stock_opname_id = $this->db->insert_id();

        // Get data from the dynamic rows
        $barang_ids = $this->input->post('id_barang');
        $qty_fisik_values = $this->input->post('qty_fisik');
        $qty_sistem_values = $this->input->post('qty_sistem');
        $satuan_values = $this->input->post('satuan');
        $selisih_values = $this->input->post('selisih');
        $now = date('Y-m-d H:i:s');

        // Loop through the rows and insert into stock_opname_details
        if (is_array($barang_ids)) {

            for ($i = 0; $i < count($barang_ids); $i++) {
                $barang_id = $barang_ids[$i];
                $qty_fisik = $qty_fisik_values[$i];
                $qty_sistem = $qty_sistem_values[$i];
                $satuan = $satuan_values[$i];
                $selisih = $selisih_values[$i];

                $stock_opname_detail_data = [
                    'id_stock_opname' => $stock_opname_id,
                    'id_barang' => $barang_id,
                    'satuan' => $satuan,
                    'qty_sistem' => $qty_sistem,
                    'qty_fisik' => $qty_fisik,
                    'selisih' => $selisih,
                    'created_at' => $now,
                    'created_by' => $this->session->userdata('id_user'),
                ];

                // Insert into stock_opname_details table
                $this->db->insert('stock_opname_details', $stock_opname_detail_data);
            }

            $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Stok opname berhasil ditambahkan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            // Redirect or show a success message
            redirect('inventori/stock_opname');
        } else {
            // Redirect or show a success message
            redirect('inventori/stock_opname');
        }
    }

    public function add_detail_koreksi()
    {
        // Assuming you have received the form data through POST
        $no_koreksi = $this->input->post('no_koreksi');
        $tanggal_koreksi = $this->input->post('tanggal_koreksi');

        // Create a new koreksi record
        $koreksi_data = array(
            'no_urut' => $this->input->post('no_urut'),
            'no_koreksi' => $no_koreksi,
            'tanggal_koreksi' => $tanggal_koreksi,
            'id_gudang' => $this->input->post('gudang'),
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $this->session->userdata('id_user'),
        );

        // Insert into koreksi table
        $this->db->insert('koreksi', $koreksi_data);

        // Get the inserted koreksi ID
        $koreksi_id = $this->db->insert_id();

        // Get data from the dynamic rows
        $barang_ids = $this->input->post('id_barang');
        $debit_kredit_values = $this->input->post('debit_kredit');
        $qty_sistem_values = $this->input->post('qty_sistem');
        $satuan_values = $this->input->post('satuan');
        $jumlah_values = $this->input->post('jumlah');
        $now = date('Y-m-d H:i:s');

        // Loop through the rows and insert into koreksi_details
        if (is_array($barang_ids)) {

            for ($i = 0; $i < count($barang_ids); $i++) {
                $barang_id = $barang_ids[$i];
                $debit_kredit = $debit_kredit_values[$i];
                $qty_sistem = $qty_sistem_values[$i];
                $satuan = $satuan_values[$i];
                $jumlah = $jumlah_values[$i];

                $koreksi_detail_data = [
                    'id_koreksi' => $koreksi_id,
                    'id_barang' => $barang_id,
                    'satuan' => $satuan,
                    'stok_awal' => $qty_sistem,
                    'debit_kredit' => $debit_kredit,
                    'jumlah_koreksi' => $jumlah,
                    'created_at' => $now,
                    'created_by' => $this->session->userdata('id_user'),
                ];

                // Insert into koreksi_details table
                $this->db->insert('koreksi_details', $koreksi_detail_data);
            }

            $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Stok koreksi berhasil ditambahkan.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            // Redirect or show a success message
            redirect('inventori/koreksi_barang');
        } else {
            // Redirect or show a success message
            redirect('inventori/koreksi_barang');
        }
    }

    public function pending_sop()
    {
        $data = [
            "barang" => $this->db->where('a.status', 0)->from('stock_opname_details a')->join('stock_opname b', 'a.id_stock_opname = b.id', 'left')->join('barang c', 'a.id_barang = c.id', 'left')->order_by('no_stock_opname', 'ASC')->order_by('nama', 'ASC')->get()->result(),
        ];

        $this->load->view('body/header');
        $this->load->view('inventori/pending_sop', $data);
        $this->load->view('body/footer');
    }

    public function pending_koreksi()
    {
        $data = [
            "barang" => $this->db->where('a.status_koreksi', 0)->from('koreksi_details a')->join('koreksi b', 'a.id_koreksi = b.id', 'left')->join('barang c', 'a.id_barang = c.id', 'left')->order_by('no_koreksi', 'ASC')->order_by('nama', 'ASC')->get()->result(),
        ];

        // echo '<pre>';
        // print_r($data['barang']);
        // echo '</pre>';
        // exit;

        $this->load->view('body/header');
        $this->load->view('inventori/pending_koreksi', $data);
        $this->load->view('body/footer');
    }

    public function delete_sop()
    {
        $id = $this->uri->segment(3);

        $this->db->where('id', $id);
        $this->db->delete('stock_opname');
        $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Stok opname berhasil dihapus.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        // After that you need to used redirect function instead of load view such as 
        redirect("inventori/stock_opname");
    }

    public function delete_detail_sop()
    {
        $no_stock_opname = $this->uri->segment(3);
        $id = $this->uri->segment(4);

        $this->db->where('id', $id);
        $this->db->delete('stock_opname_details');
        $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Stok opname berhasil dihapus.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        // After that you need to used redirect function instead of load view such as 
        redirect("inventori/detail_sop/$no_stock_opname");
    }

    public function delete_detail_koreksi()
    {
        $no_koreksi = $this->uri->segment(3);
        $id = $this->uri->segment(4);

        $this->db->where('id', $id);
        $this->db->delete('koreksi_details');
        $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data koreksi berhasil dihapus.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
        // After that you need to used redirect function instead of load view such as 
        redirect("inventori/detail_sop/$no_koreksi");
    }

    public function approve()
    {
        $id = $this->uri->segment(3);
        print_r($id);

        $sop_detail = $this->db->where('Id', $id)->get('stock_opname_details')->row_array();

        $data_sop_detail = ['status' => 1];

        $data_stok = ['stok' => $sop_detail['qty_fisik']];

        $this->db->where('id', $sop_detail['id_barang'])->update('barang', $data_stok);
        $update = $this->db->where('Id', $id)->update('stock_opname_details', $data_sop_detail);

        if ($update) {
            $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Stok barang sudah diperbarui.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        } else {
            $this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Terjadi kesalahan. Silahkan dicoba lagi.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function getData()
    {
        $results = $this->M_Barang->getDataBarang();

        $data = [];

        $no = $this->input->post('start', true);

        foreach ($results as $r) {
            $row = array();

            $gudang = $this->db->where('id', $r->id_gudang)->get('gudang')->row_array();
            if ($r->id_gudang) {
                $nama_gudang = $gudang['nama'];
            } else {
                $nama_gudang = '-';
            }

            $row[] = ++$no . '.';
            $row[] = $r->kode_barang;
            $row[] = $r->nama;
            $row[] = $r->stok;
            $row[] = $nama_gudang;
            $row[] = '<button type="button" data-id="' . $r->id . '" class="btn btn-primary btn-square barang_v"><i class="fa fa-eye"></i></button>';

            $row[] = $r->id;
            $data[] = $row;
        }

        $output = array(
            "draw" => $this->input->post('draw', true),
            "recordsTotal" => $this->M_Barang->count_all_data(),
            "recordsFiltered" => $this->M_Barang->count_filtered_data(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function approve_koreksi()
    {
        $id = $this->uri->segment(3);
        $koreksi_detail = $this->db->where('Id', $id)->get('koreksi_details')->row_array();

        // echo '<pre>';
        // print_r($koreksi_detail);
        // echo ' </pre>';
        // exit;

        if ($koreksi_detail['debit_kredit'] == "debit") {
            $stok_baru = $koreksi_detail['stok_awal'] + $koreksi_detail['jumlah_koreksi'];
        } else if ($koreksi_detail['debit_kredit'] == "kredit") {
            $stok_baru = $koreksi_detail['stok_awal'] - $koreksi_detail['jumlah_koreksi'];
        }

        $data_koreksi_detail = ['status_koreksi' => 1];

        $data_stok = ['stok' => $stok_baru];

        $this->db->where('id', $koreksi_detail['id_barang'])->update('barang', $data_stok);
        $update = $this->db->where('Id', $id)->update('koreksi_details', $data_koreksi_detail);

        if ($update) {
            $this->session->set_flashdata('message_name', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Stok barang sudah diperbarui.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        } else {
            $this->session->set_flashdata('message_name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Terjadi kesalahan. Silahkan dicoba lagi.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
}

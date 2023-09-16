<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {
	// private $param;

        public function __construct() {
            parent::__construct();
            $this->load->library('session');
        }
        function index(){
            $this->load->view('body/header');
            $this->load->view('registrasi');
            $this->load->view('body/footer');
        }
        function getRomawi($bln){
            switch ($bln){
                case 1:
                    return "I";
                    break;
                case 2:
                    return "II";
                    break;
                case 3:
                    return "III";
                    break;
                case 4:
                    return "IV";
                    break;
                case 5:
                    return "V";
                    break;
                case 6:
                    return "VI";
                    break;
                case 7:
                    return "VII";
                    break;
                case 8:
                    return "VIII";
                    break;
                case 9:
                    return "IX";
                    break;
                case 10:
                    return "X";
                    break;
                case 11:
                    return "XI";
                    break;
                case 12:
                    return "XII";
                    break;
            }
        }
        function x(){
            $this->load->library('upload');
            $extensi_true = array('png','jpg','jpeg');
            $nama = $_FILES['foto']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
            // $target_x = '/Applications/XAMPP/xamppfiles/htdocs/bandestraining/';
            $target_x = '/home/u1677928/public_html/id/';
            if(in_array($ekstensi,$extensi_true) === true){
                 if (($this->input->post('tinggi_bdn') > "158" && $this->input->post('jenis_kelamin') == "Perempuan") || ($this->input->post('tinggi_bdn') > "165" && $this->input->post('jenis_kelamin') == "Laki-laki")) {
                        $filenamex = md5($_FILES['foto']['name']).'.'.$ekstensi;
                        $target = $target_x.'assets/images/foto/'. $filenamex;
                        move_uploaded_file($_FILES['foto']['tmp_name'],$target);
                        $mpdf = new \Mpdf\Mpdf([
                            'tempDir' => '/tmp',
                            'mode' => '',
                            'format' => 'A4',
                            'default_font_size' => 0,
                            'default_font' => '',
                            'margin_left' => 0,
                            'margin_right' => 0,
                            'margin_top' => 0,
                            'margin_bottom' => 0,
                            // 'margin_header' => 10,
                            // 'margin_footer' => 5,
                            'orientation' => 'P',
                        ]);
                        $data = [
                            "nama" => strtoupper($this->input->post('nama')),
                            "alamat" => strtoupper($this->input->post('alamat')),
                            "tgl_lahir" => $this->input->post('tgl_lahir'),
                            "agama" => strtoupper($this->input->post('agama')),
                            "tinggi_bdn" => strtoupper($this->input->post('tinggi_bdn')),
                            "berat_bdn" => strtoupper($this->input->post('berat_bdn')),
                            "jenis_kelamin" => strtoupper($this->input->post('jenis_kelamin')),
                            "no_telp" => strtoupper($this->input->post('no_telp')),
                            "status" => strtoupper($this->input->post('status')),
                            "email" => $this->input->post('email'),
                            "golongan_darah" => strtoupper($this->input->post('golongan_darah')),
                            "pelatihan" => strtoupper($this->input->post('pelatihan')),
                            "no_regis" => strtoupper($this->input->post('no_regis')),
                            "foto" => $filenamex
                        ];
                        //perempuan 158
                        //cowo 165
                        $db =  $this->db->query("SELECT MAX(no_bat) as no_bat FROM registrasi")->row_array();
                        $nomor = $db['no_bat'];
                                $nomor++;
                                $nomor_t = sprintf("%03s", $nomor);;
                                $bulan = date('n');
                                $romawi = $this->getRomawi($bulan);
                                $tahun = date('Y');
                        $insert = [
                            "no_bat" => $nomor,
                            "no_registrasi" => $nomor_t.'/BAT/REG/'.$romawi.'/'.$tahun
                        ];
                        $this->db->insert('registrasi',$insert);

                        $mpdf->WriteHTML($this->load->view('registrasi_view',$data,true));
                        $mpdf->SetHTMLFooter('
                        <img style="margin-bottom: -34px;" src="assets/images/footer.png" alt="">
                        ');
                        // $mpdf->Output();
                        $filename=$target_x."/assets/$filenamex.pdf";
                        $mpdf->Output($filename, 'F');

                        $this->load->library("Mailer");
                        $mail = $this->mailer->load();
                            $mail->isSMTP();
                            $mail->Host       = 'mail.bandestraining.com';
                            $mail->SMTPAuth   = true;
                            $mail->Username   = 'info@bandestraining.com';
                            $mail->Password   = '+7!WX?B]tKh~';
                            $mail->SMTPSecure = 'ssl';
                            $mail->Port       = 465;
                            $mail->setFrom("info@bandestraining.com", "BAT");
                            $mail->addAddress("cs@bandestraining.com");
                            $mail->isHTML(true);
                            $mail->Subject = "Registrasi BAT";
                            $mail->Body    = "<h4><b>Registrasi Berhasil</b><br><br>Nama : ".$this->input->post('nama')." <br> No Telp : ".$this->input->post('no_telp')." <br>Berikut ini form pdf pendaftaran";
                            $mail->addAttachment($target_x.'assets/'.$filenamex.'.pdf');
                            if($mail->send()){
                                    // echo $mail->send();
                                $this->session->set_flashdata("pesan", '<div class="alert alert-success" id="alert">Registrasi Berhasil  '.$this->input->post('nama').'</div>');
                                redirect('registrasi');
                            } else {
                                $this->session->set_flashdata("pesan", '<div class="alert alert-danger" id="alert">Email not sent.</div>');
                                redirect('registrasi');
                            }
                    }else{
                        $this->session->set_flashdata("pesan", '<div class="alert alert-danger" id="alert">Tinggi perempuan minimal 158cm dan laki-laki 165cm</div>');
                        redirect('registrasi');
                    }
            }else{
                $this->session->set_flashdata("pesan", '<div class="alert alert-danger" id="alert">Extensi yang diizinkan jpg,jpeg,png</div>');
                redirect('registrasi');
            }
        }
        function logout()
        {
            $array_unset = array('id_user','username', 'nama','email','role','status');
            $this->session->unset_userdata($array_unset);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Berhasil Logout!</div>');
            redirect('login');
        }
    }


?>

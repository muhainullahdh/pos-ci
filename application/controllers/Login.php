<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	// private $param;

        public function __construct() {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->library(array('form_validation'));
        }
        function index(){
            // $this->load->view('body/header');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() === false) {
                $this->load->view('login');
            }else{
                $this->action();
            }
            // $this->load->view('body/footer');
        }
        function action()
        {
            $username = $this->input->post('username');
            $password =  $this->input->post('password');
            $user = $this->db->get_where('users', ['username' => $username])->row_array();
            if ($user['username'] == $username) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id'],
                        'nama' => $user['nama'],
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'status' => $user['status'],
                        'email' => $user['email'],
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_userdata('tipe_penjualan','umum,1,1');
                    $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Login Berhasil !</div>');
                    redirect();
                } else {
                    $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Password salah !</div>');
                    // redirect('login');
                    $this->load->view('login');

                }
            } else {
                $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">username <b>'.$username.'</b> tidak ada !</div>');
                $this->load->view('login');
                // redirect('login');
            }
        }
    }


?>

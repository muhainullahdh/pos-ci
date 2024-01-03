<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_Barang extends CI_Model
{
    var $table = 'barang';
    // var $column_order = array(null, 'nama', 'menu_harga', 'menu_seo', 'kategori_nama');
    // var $order = array(null, 'nama', 'menu_harga', 'menu_seo', 'kategori_nama');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getDataBarang()
    {
        $this->_get_data_query();

        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get()->result();

        return $query;
    }

    private function _get_data_query()
    {
        $this->db->from($this->table);

        if (isset($_POST['search']['value'])) {
            $this->db->like('nama', $_POST['search']['value']);
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('nama', 'ASC');
        }
    }

    public function count_filtered_data()
    {
        $this->_get_data_query();

        $query = $this->db->get();

        return $query->num_rows();
    }

    public function count_all_data()
    {
        $this->db->from($this->table);

        return $this->db->count_all_results();
    }
}

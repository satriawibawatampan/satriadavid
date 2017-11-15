<?php

class M_cashflow extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    function Add_cashflow($name, $type, $description, $amount) {
        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'nama' => $name,
            'tipe' => $type,
            'deskripsi' => $description,
            'jumlah' => $amount,
            'id_cabang' => $this->session->userdata['xcellent_cabang'],
            'createdat' => date('Y-m-d H:i:s'),
            'updatedat' => date('Y-m-d H:i:s')
        );

        $this->db->insert('aruskas', $data);
    }

    function Get_all_cashflow() {

        $this->db->select('*');
        $this->db->from('aruskas');
        $this->db->where('id_cabang', $this->session->userdata['xcellent_cabang']);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function Json_get_one_supplier($id) {
        $this->db->select('*');
        $this->db->from('supplier');
        $this->db->where('statusaktif', 1);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

}

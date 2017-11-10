<?php

class M_supplier extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    function Add_supplier($name, $company, $alamat, $phone) {
        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'nama' => $name,
            'perusahaan' => $company,
            'telepon' => $phone,
            'alamat' => $alamat,
            'statusaktif' => 1,
            'createdat' => date('Y-m-d H:i:s'),
            'updatedat' => date('Y-m-d H:i:s')
        );

        $this->db->insert('supplier', $data);
    }

    function Get_all_supplier() {
        $this->db->select('*');
        $this->db->from('supplier');
        $this->db->where('statusaktif', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function Edit_supplier($id, $name, $address, $phone, $company) {
        $data = array(
            'nama' => $name,
            'perusahaan' => $company,
            'alamat' => $address,
            'telepon' => $phone
        );
        $this->db->where('id', $id);
        $this->db->update(supplier, $data);
    }

    function Delete_supplier($ida) {
        $data = array(
            'statusaktif' => 0
        );
        $this->db->where('id', $ida);
        $this->db->update(supplier, $data);
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

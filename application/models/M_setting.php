<?php

class M_setting extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    

    function Get_all_setting() {
        $this->db->select('*');
        $this->db->from('setting');
        $this->db->where('id_cabang', $this->session->userdata['xcellent_cabang']);
        $query = $this->db->get();
        return $query->result();
    }

    function Show_all_admin() {
        $this->db->select("admin.*, tipeadmin.nama as tipe, cabang.nama as namacabang");
        $this->db->from('admin');
        $this->db->join('cabang', 'admin.id_cabang = cabang.id');
        $this->db->join('tipeadmin', 'admin.id_tipeadmin=tipeadmin.id');
        //where ini tak hapus agar muncul.
        //   $this->db->where('admin.statusaktif', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function Json_get_one_admin($id) {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('statusaktif', 1);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function Edit_admin($id, $nama, $email, $address, $phone, $type, $branch) {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'nama' => $nama,
            'alamat' => $address,
            'telepon' => $phone,
            'id_tipeadmin' => $type,
            'id_cabang' => $branch,
            'updatedat' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $id);
        $this->db->update('admin', $data);
    }

    function Deactivate_admin($id) {

        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'statusaktif' => 0,
            'updatedat' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $id);
        $this->db->update('admin', $data);
    }

    function Activate_admin($id) {

        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'statusaktif' => 1,
            'updatedat' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $id);
        $this->db->update('admin', $data);
    }

    function Change_password($email, $pass) {

        $this->db->select("salt");

        $this->db->from('admin');
        $this->db->where('email', $email);
        $query = $this->db->get();

        $ambilgaram = $query->row();




        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'password' => $pass,
            'updatedat' => date('Y-m-d H:i:s')
        );

        $this->db->where('email', $email);
        $this->db->update('admin', $data);
    }

    function Cek_email($email) {

        $this->db->select("salt");

        $this->db->from('admin');
        $this->db->where('email', $email);
        $query = $this->db->get();
        $ambilgaram = $query->row();

        if (isset($ambilgaram)) {
            $garam = $ambilgaram->salt;


            return $garam;
        } else {

            $this->session->set_flashdata('testerror', "Email is invalid");
            $this->session->keep_flashdata('testerror');
            redirect('Back/Account/Show_forgot_password');
        }
    }

}

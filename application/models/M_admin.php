<?php

class M_admin extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    function Cek_login($email, $pass) {

        $this->db->select("salt");

        $this->db->from('admin');

        $this->db->where('email', $email);
        $query = $this->db->get();

        $ambilgaram = $query->row();

        if (isset($ambilgaram)) {
            $garam = $ambilgaram->salt;
            $password = md5($pass);
            $password = $password . $garam;
            $password = md5($password);

            $this->db->select("*");
            $this->db->from('admin');

            $this->db->where('email', $email);
            $this->db->where('password', $password);
            $query = $this->db->get();
            $tampung = $query->row_array();
            return $tampung;
        } else {

            redirect('Back/Account/Show_login');
        }
    }

    function Add_admin($name, $email, $salt, $password, $phone, $address, $type, $branch, $idadmin) {

        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'nama' => $name,
            'email' => $email,
            'tipe' => $type,
            'password' => $password,
            'salt' => $salt,
            'id_cabang' => $branch,
            'statusaktif' => 1,
            'telepon' => $phone,
            'alamat' => $address,
            'id_admin' => $idadmin,
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s')
        );

        $this->db->insert('admin', $data);
    }

    function Add_admin_type($name) {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'nama' => $name,
            'statusaktif' => 1,
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s')
        );

        $this->db->insert('tipeadmin', $data);
    }
    
     function Get_all_admintype() {
        $this->db->select('*');
        $this->db->from('tipeadmin');
        $this->db->where('statusaktif', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function Show_all_admin() {
        $this->db->select("admin.*, tipeadmin.nama as tipe, cabang.nama as namacabang");
        //$this->db->select("admin.id as id,admin.nama as nama,admin.email as email, admin.alamat as alamat, admin.telepon as telepon, tipeadmin.nama as tipe, cabang.nama as namacabang");

        $this->db->from('admin');
        $this->db->join('cabang', 'admin.id_cabang = cabang.id');
        $this->db->join('tipeadmin','admin.id_tipeadmin=tipeadmin.id');
        $this->db->where('admin.statusaktif', 1);
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
    
    function Edit_admin($id,$nama,$email,$address,$phone,$type,$branch) {
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

    function Delete_admin($id) {

        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'statusaktif' => 0,
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

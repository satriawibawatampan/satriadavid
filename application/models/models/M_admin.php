<?php
class M_admin extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    function Cek_login($email, $pass) {

        $this->db->select("salt,statusaktif");

        $this->db->from('admin');
        $this->db->where('email', $email);
        $query = $this->db->get();

        //cek status aktif baru ambil datanya.
        if ($query->row() != null) {
            if ($query->row()->statusaktif == 1) {
                $ambilgaram = $query->row();
            }
        }

        if (isset($ambilgaram)) {
            $garam = $ambilgaram->salt;
            $password = md5($pass);
            $password = $password . $garam;
            $password = md5($password);

            $this->db->select("admin.*, cabang.nama as nama_cabang");
            $this->db->from('admin');
            $this->db->join('cabang', "admin.id_cabang = cabang.id");
            //$this->db->join('setting', "admin.id_cabang = setting.id_cabang","left");
            $this->db->where('email', $email);
            $this->db->where('password', $password);
            $query = $this->db->get();
            $tampung = $query->row_array();
            return $tampung;
        } else {
            return null;
        }
    }

    function Add_admin($name, $email, $salt, $password, $phone, $address, $type, $branch) {

        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'nama' => $name,
            'email' => $email,
            'id_tipeadmin' => $type,
            'password' => $password,
            'salt' => $salt,
            'id_cabang' => $branch,
            'statusaktif' => 1,
            'telepon' => $phone,
            'alamat' => $address,
            'id_admin' => $this->session->userdata['xcellent_id'],
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s')
        );

        $this->db->insert('admin', $data);
    }

    function Add_admin_type($name, $hakakses) {
        $this->db->trans_start();
        // print_r($hakakses); exit();
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'nama' => $name,
            'statusaktif' => 1,
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s')
        );

        $this->db->insert('tipeadmin', $data);
        $idtipeadmin = $this->db->insert_id();

        for ($a = 0; $a < count($hakakses); $a++) {
            $data = array(
                'id_tipeadmin' => $idtipeadmin,
                'id_hakakses' => $hakakses[$a]
            );

            $this->db->insert('tipeadmin_hakakses', $data);
        }

        $this->db->trans_complete();
    }

    function Edit_admin_type($name, $id, $hakakses) {
        $this->db->trans_start();
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'nama' => $name
        );
        $this->db->where('id', $id);
        $this->db->update('tipeadmin', $data);

        $this->db->where('id_tipeadmin', $id);
        $this->db->delete('tipeadmin_hakakses');

        for ($a = 0; $a < count($hakakses); $a++) {
            $data = array(
                'id_tipeadmin' => $id,
                'id_hakakses' => $hakakses[$a]
            );

            $this->db->insert('tipeadmin_hakakses', $data);
        }



        $this->db->trans_complete();
    }

    function Get_admin_branch() {
        $this->db->select('id_cabang');
        $this->db->from('admin');
        $this->db->where('id', $this->session->userdata['xcellent_id']);
        $query = $this->db->get();
        return $query->row();
    }

    function Get_all_admintype_hakakses() {
        $this->db->select('tipeadmin_hakakses.*');
        $this->db->from('tipeadmin_hakakses');
        // $this->db->where('statusaktif', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function Get_all_admintype() {
        $this->db->select('*');
        $this->db->from('tipeadmin');
        $this->db->where('statusaktif', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function Get_all_access() {
        $this->db->select('*');
        $this->db->from('hakakses');
        $this->db->order_by('nama');
        $this->db->where('statusaktif', 1);
        $query = $this->db->get();
        return $query->result();
    }
    
    function Get_access_by_id($id)
    {
       $this->db->select('tipeadmin_hakakses.id_hakakses');
        $this->db->from('tipeadmin_hakakses');
        $this->db->where('id_tipeadmin',$id);
        $query = $this->db->get();
        $hasil =$query->result_array(); 
        $tampungarray = [];
        for($x = 0;  $x<count($hasil);$x++)
        {
            array_push($tampungarray, $hasil[$x]['id_hakakses']);
        }
        return $tampungarray;
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

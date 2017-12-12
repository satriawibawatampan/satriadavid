<?php

class M_member extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
        $this->load->model('M_cashflow');
    }

    function Add_member($name, $email, $phone, $address, $ttl, $gender, $idadmin, $deposit) {
        $this->db->trans_start();
        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'nama' => $name,
            'email' => $email,
            'deposit' => $deposit,
            'ttl' => $ttl,
            'gender' => $gender,
            'telepon' => $phone,
            'alamat' => $address,
            'id_admin' => $idadmin,
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s')
        );

        $this->db->insert('member', $data);
        $this->db->trans_complete();
    }

    function Add_member_ajax($nama, $idadmin, $deposit, $email, $bod, $phone, $gender, $alamat) {
        $this->db->trans_start();
        
        $allmember = $this->Show_all_member();
       // print_r($allmember);$exit();
        foreach ($allmember as $item)
        {
            //print_r($item->email);$exit();
            if($item->email == $email)
            {
                return 0;
            }
        }
        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'nama' => $nama,
            'email' => $email,
            'deposit' => $deposit,
            'ttl' => $bod,
            'gender' => $gender,
            'telepon' => $phone,
            'alamat' => $alamat,
            'id_admin' => $idadmin,
            'statusaktif' => "0",
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s')
        );

        $this->db->insert('member', $data);
        $this->db->trans_complete();

        $sql2 = "SELECT LAST_INSERT_ID() as id";
        $hasil = $this->db->query($sql2);
        $id = $hasil->row()->id;

        return $id;
    }

    function Cancel_add_member($id) {
        $this->db->where('id', $id);
        $this->db->delete('member');
    }

    function Show_all_member() {
        $this->db->select('*');
        $this->db->from('member');
       // $this->db->where('statusaktif', 1);

        $query = $this->db->get();
        return $query->result();
    }

    function Deactivate_member($id) {

        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'statusaktif' => 0
        );

        $this->db->where('id', $id);
        $this->db->update('member', $data);
    }

    function Activate_member($id) {

        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'statusaktif' => 1
        );

        $this->db->where('id', $id);
        $this->db->update('member', $data);
    }

    function Show_all_member_active() {
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('member.statusaktif', 1);
        $query = $this->db->get();
        return $query->result();
    }

    function Json_get_one_member($id) {
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('statusaktif', 1);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function Edit_member($id, $nama, $email, $address, $phone, $ttl, $deposit, $gender) {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'nama' => $nama,
            'email' => $email,
            'alamat' => $address,
            'telepon' => $phone,
            'ttl' => $ttl,
            'deposit' => $deposit,
            'gender' => $gender,
            'updatedat' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $id);
        $this->db->update('member', $data);
    }

    function Delete_member($id) {

        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'statusaktif' => 0,
            'updatedat' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $id);
        $this->db->update('member', $data);
    }

    function Add_deposit($deposit, $idmember) {


        $this->db->trans_start();
        $this->db->set('deposit', 'deposit+' . $deposit, FALSE);
        $this->db->where('id', $idmember);
        $this->db->update('member');


        $this->M_cashflow->Add_cashflow("Member Deposit", 1, "Deposit Member " . $idmember, $deposit);
        $this->db->trans_complete();
    }

}

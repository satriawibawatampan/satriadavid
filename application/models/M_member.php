<?php

class M_member extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
        $this->load->model('M_cashflow');
    }

    function Add_member($name, $email, $phone, $address, $ttl, $gender, $idadmin, $deposit) {

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
    }

    function Show_all_member() {
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
        
        
        $this->M_cashflow->Add_cashflow("Member Deposit", 1, "Deposit Member ".$idmember, $deposit);
        $this->db->trans_complete();
    }

}

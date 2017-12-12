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
            'id_admin' => $this->session->userdata['xcellent_id'],
            'createdat' => date('Y-m-d H:i:s'),
            'updatedat' => date('Y-m-d H:i:s')
        );

        $this->db->insert('aruskas', $data);
    }

    function Get_all_cashflow() {

        $this->db->select('aruskas.*, admin.nama as namaadmin, admin.id as idadmin');
        $this->db->from('aruskas');
        $this->db->join('admin', 'admin.id = aruskas.id_admin');
        $this->db->where('aruskas.id_cabang', $this->session->userdata['xcellent_cabang']);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

     function Get_income_summary() {
        $query = " SELECT notajual.id as idnotajual, notajual.createdat as tanggal, notajual.updatedat as tanggalupdate, notajual.grandtotal as grandtotal, (select sum(notajual_produk.hargapokok*notajual_produk.jumlah) from notajual_produk where notajual_produk.id_notajual = idnotajual) as hpp
        FROM `notajual`
where notajual.id_cabang = ? order by notajual.id        
";
        $result = $this->db->query($query,  $this->session->userdata['xcellent_id']);
        return $result->result();
        //$result->result();
        //print_r($laporan); exit();
    }
    function Get_all_pettycash() {

        $this->db->select('uangkasir.*, admin.nama as namaadmin, admin.id as idadmin');
        $this->db->from('uangkasir');
        $this->db->join('admin', 'admin.id = uangkasir.id_admin');
        $this->db->where('uangkasir.id_cabang', $this->session->userdata['xcellent_cabang']);
        $this->db->order_by('uangkasir.id', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    

    function Add_pettycash($name, $type, $description, $amount) {

        $this->db->trans_start();
        date_default_timezone_set('Asia/Jakarta');
        $this->db->select('jumlahuang');
        $this->db->from('uangkasir');
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        $jumlahuang = $query->row()->jumlahuang;
        // print_r($jumlahuang); exit();
        $pengali = 1;
        if ($type == 1) {
            $pengali = 1;
        } else if ($type == 2) {
            $pengali = -1;
            if ($amount > $jumlahuang) {
                return 0;
            }
        }

        $namabaru = "";
        if ($name == "") {
//            print_r("asd"); exit();
            if ($type == 1) {
                $namabaru = "Put Cash";
            } else if ($type == 2) {
                $namabaru = "Take Cash";
            }
        } else {
            $namabaru = $name;
        }


        $data = array(
            'nama' => $namabaru,
            'tipe' => $type,
            'deskripsi' => $description,
            'jumlah' => $amount,
            'id_cabang' => $this->session->userdata['xcellent_cabang'],
            'id_admin' => $this->session->userdata['xcellent_id'],
            'jumlahuang' => $jumlahuang + ($amount * $pengali)
        );

        $this->db->insert('uangkasir', $data);
        $idinsert = $this->db->insert_id();

        $this->db->trans_complete();
    }

    function Json_get_one_supplier($id) {
        $this->db->select('*');
        $this->db->from('supplier');
        $this->db->where('statusaktif', 1);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function Get_income_summary_bydate($from, $to) {
        $query = " SELECT notajual.id as idnotajual, notajual.createdat as tanggal, notajual.grandtotal as grandtotal, (select sum(notajual_produk.hargapokok*notajual_produk.jumlah) from notajual_produk where notajual_produk.id_notajual = idnotajual) as hpp
        FROM `notajual`
where createdat >= ? and createdat <= ?        
";
        $result = $this->db->query($query, array($from, $to));
        return $result->result();
        //$result->result();
        //print_r($laporan); exit();
    }

    function Get_petty_cash_bydate($from, $to) {
        $this->db->select('uangkasir.*, admin.nama as namaadmin, admin.id as idadmin');
        $this->db->from('uangkasir');
        $this->db->join('admin', 'admin.id = uangkasir.id_admin');
        $this->db->where('uangkasir.id_cabang', $this->session->userdata['xcellent_cabang']);
        $this->db->where('uangkasir.createdat <=', $to);
        $this->db->where('uangkasir.createdat >=', $from);
        $this->db->order_by('uangkasir.id', 'desc');
        $query = $this->db->get();
        return $query->result();
        return $result->result();
        //$result->result();
        //print_r($laporan); exit();
    }

}

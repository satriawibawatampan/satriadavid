<?php

class M_pesanan extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    function Show_all_pesanan() {
        $query = $this->db->query("SELECT pesanan.id as idpesanan, user.nama as namauser, pesanan.grandtotal , pesanan.createdat, pesanan.status FROM pesanan left join user on pesanan.id_user = user.id left join admin on pesanan.id_admin = admin.id ");


        return $query->result();
    }

    function Show_one_pesanan_barang($id) {
       $this->db->select("pesanan_barang.id_pesanan as idpesanan,barang.id as idbarang, barang.foto as foto, barang.nama as namabarang, pesanan_barang.jumlah, pesanan_barang.harga, pesanan_barang.subtotal ");
       
        $this->db->from('pesanan_barang');
        $this->db->join('barang', 'pesanan_barang.id_barang = barang.id  ' );
        $this->db->where('id_pesanan', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function Delete_kategori($id) {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'statusaktif' => 0,
            'updatedat' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $id);
        $this->db->update('kategori', $data);
    }

    function Edit_kategori($id, $namabaru) {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'nama' => $namabaru,
            'updatedat' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $id);
        $this->db->update('kategori', $data);
    }

    function Accept_pesanan($id) {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'status' => 2,
            'updatedat' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $id);
        $this->db->update('pesanan', $data);
    }

    function Send_pesanan($id) {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'status' => 3,
            'updatedat' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $id);
        $this->db->update('pesanan', $data);
    }

    function Finish_pesanan($id) {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'status' => 4,
            'updatedat' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $id);
        $this->db->update('pesanan', $data);
    }

    function Edit_pesanan_barang($idpesanan, $idbarang, $jumlah, $harga, $subtotal) {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'jumlah' => $jumlah,
            'harga' => $harga,
            'subtotal' => $jumlah * $harga,
            'updatedat' => date('Y-m-d H:i:s')
        );

        $array = array('id_pesanan' => $idpesanan, 'id_barang' => $idbarang);
        $this->db->where($array);
        $this->db->update('pesanan_barang', $data);

        $this->Edit_grandtotal($idpesanan);

        // return $grandtotal->grandtotal;
    }

    function Hapus_pesanan_barang($idpesanan, $idbarang) {

        $array = array('id_pesanan' => $idpesanan, 'id_barang' => $idbarang);
        $this->db->where($array);
        $this->db->delete('pesanan_barang');
    }

    function Edit_grandtotal($idpesanan) {
        $this->db->select('sum(subtotal) as grandtotal');
        $this->db->from('pesanan_barang');

        //  $array = array('id_pesanan' => $idpesanan);
        $this->db->where('id_pesanan', $idpesanan);
        $query = $this->db->get();
        $grandtotal = $query->row();
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'grandtotal' => $grandtotal->grandtotal,
            'updatedat' => date('Y-m-d H:i:s'));


        $this->db->where('id', $idpesanan);
        $this->db->update('pesanan', $data);
    }

    function Input_pesanan($total, $iduser, $nama, $hp, $alamat, $provinsi, $kota, $kecamatan, $kodepos) {
        date_default_timezone_set('Asia/Jakarta');
        $datenya = date('Y-m-d H:i:s');

        $data = array(
            'tanggal' => $datenya,
            'grandtotal' => $total,
            'status' => 1,
            'id_user' => $iduser,
            'id_admin' => 1,
            'nama_kirim' => $nama,
            'alamat_kirim' => $alamat,
            'kodepos_kirim' => $kodepos,
            'provinsi_kirim' => $provinsi,
            'kota_kirim' => $kota,
            'kecamatan_kirim' => $kecamatan,
            'telepon_kirim' => $hp,
            'createdAt' => $datenya,
            'updatedAt' => $datenya
        );

        $this->db->insert('pesanan', $data);

        $idpesanan = $this->Get_id_pesanan($datenya, $iduser);

        //  print_r($idpesanan); exit();

        $this->Input_pesanan_barang($idpesanan->id);
    }

    function Get_id_pesanan($tanggal, $id_user) {
        $this->db->select('id');
        $query = $this->db->get_where('pesanan', array('tanggal' => $tanggal, 'id_user' => $id_user));
        return $query->row();
    }

    function Input_pesanan_barang($idpesanan) {
        date_default_timezone_set('Asia/Jakarta');
        $datenya = date('Y-m-d H:i:s');
        foreach ($this->cart->contents() as $content) {

            $data = array(
                'id_pesanan' => $idpesanan,
                'id_barang' => $content['id'],
                'jumlah' => $content['qty'],
                'harga' => $content['price'],
                'subtotal' => $content['subtotal'],
                'createdAt' => $datenya,
                'updatedAt' => $datenya
            );

            $this->db->insert('pesanan_barang', $data);
        }
    }

}

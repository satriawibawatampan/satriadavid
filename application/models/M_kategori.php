<?php

class M_kategori extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    function Input_kategori($name) {

        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'nama' => $name,
            'createdat' => date('Y-m-d H:i:s'),
            'updatedat' => date('Y-m-d H:i:s')
        );

        $this->db->insert('kategori', $data);
    }

    function Show_all_category() {
        // $query = $this->db->query("SELECT * FROM kategori where statusaktif=1;");
        // $query = $this->db->get_where('kategori', array('statusaktif' => 1, 'id !=' =>1));

        $this->db->select('kategori.id as id, kategori.nama as nama, count(kategori.id) as jumlah');
        $this->db->from('kategori');
      //  $this->db->join('barang', 'kategori.id = barang.id_kategori');
        $this->db->where('kategori.statusaktif', 1);
        $this->db->where('kategori.id !=', 0);
        $this->db->group_by("kategori.id");
        $query = $this->db->get();
        return $query->result();
    }
    function Show_all_kategori_1() {
        // $query = $this->db->query("SELECT * FROM kategori where statusaktif=1;");
        // $query = $this->db->get_where('kategori', array('statusaktif' => 1, 'id !=' =>1));

        $this->db->select('kategori.id as id, kategori.nama as nama');
        $this->db->from('kategori');
       
        $this->db->where('kategori.statusaktif', 1);
        $this->db->where('kategori.id !=', 0);
       
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

    function Edit_category($id, $namabaru) {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'nama' => $namabaru
        );

        $this->db->where('id', $id);
        $this->db->update('kategori', $data);
    }

    function Show_category_front($idkategori, $limit, $offset) {
        if($offset!=0)
        {$this->db->limit($limit, ($offset-1)*$limit);}
        else
        {
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get_where('barang', array('id_kategori' => $idkategori));


//tadi cuma ini saja
// $query = $this->db->get_where('barang', array('id_kategori' => $idkategori));

        return $query->result();
    }
    
    function Jumlah_data($idkategori)
    {
        return $this->db->get_where('barang', array('id_kategori' => $idkategori))->num_rows();
    }

}

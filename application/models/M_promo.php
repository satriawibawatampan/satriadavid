<?php

class M_promo extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
        $this->load->model('M_harga');
    }

    function Add_promo($name, $start, $end, $product, $discount) {
        $this->db->trans_start();
        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'nama' => $name,
            'statusaktif' => 1,
             'id_cabang' => $this->session->userdata['xcellent_cabang'],
            'awal' => $start,
            'akhir' => $end,
        );


        $this->db->insert('promo', $data);
        $insert_id = $this->db->insert_id();

        for ($x = 0; $x < count($product); $x++) {
            $date = date('Y-m-d H:i:s');
            $data = array(
                'id_produk' => $product[$x],
                'id_promo' => $insert_id,
                'diskon' => $discount[$x],
            );

            $this->db->insert('promo_produk', $data);
        }


        $this->db->trans_complete();
    }
    
    function Unique_promo_name($str)
    {
        $this->db->select('*');
        $this->db->from('promo');
       // $this->db->where('material.id_cabang', $this->session->userdata['xcellent_cabang']);
        $this->db->where('promo.nama', $str);
        $query = $this->db->get();
        
        if($query->row()!=null)
        {
        $boleh= $query->row()->nama;
              return $boleh;
        }
        else
        {
            return "promonya kosong lalala";
        }
    }

    

    function Get_all_promo() {
        $this->db->select('promo.*');
        $this->db->from('promo');
//hapus statusaktif = 1
        //$this->db->where('statusaktif', 1);
        $this->db->where('id_cabang',$this->session->userdata['xcellent_cabang'] );
        $query = $this->db->get();
        return $query->result();
    }

    function Get_one_promo($id) {
        $this->db->select('promo.*');
        $this->db->from('promo');

        $this->db->where('promo.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function Get_promo_product($idpromo) {
        $this->db->select('promo_produk.*, produk.nama as namaproduct');
        $this->db->from('promo_produk');
        $this->db->join('produk', 'promo_produk.id_produk = produk.id');
        $this->db->where('promo_produk.id_promo', $idpromo);
        $query = $this->db->get();
        return $query->result();
    }

    function Get_promo_product_now() {

        date_default_timezone_set('Asia/Jakarta');
//          print_r( date('Y-m-d'));   exit();
        $this->db->select('promo_produk.*');
        $this->db->from('promo_produk');
        $this->db->join('promo', 'promo_produk.id_promo = promo.id');
        $this->db->where('promo.awal <=', date('Y-m-d'));
        $this->db->where('promo.akhir >=', date('Y-m-d'));
        $this->db->where('statusaktif', 1);
         $this->db->where('id_cabang',$this->session->userdata['xcellent_cabang'] );
        $query = $this->db->get();
        //  print_r( $query->result()->);   exit();
        return $query->result_array();
    }

    function Edit_promo($id, $name, $start, $end, $product, $discount) {
        $this->db->trans_start();
        date_default_timezone_set('Asia/Jakarta');

        //ambil createdat
        $this->db->select("createdat ");
        $this->db->from("promo");
        $this->db->where('id', $id);
        $createdat = $this->db->get()->row()->createdat;


        $date = date('Y-m-d H:i:s');
        $data = array(
            'nama' => $name,
            'statusaktif' => 1,
            'awal' => $start,
            'akhir' => $end,
        );
        $this->db->where('id', $id);
        $this->db->update('promo', $data);

        //update promo_produk (hapus dan insert lagi material)
        $this->db->where('id_promo', $id);
        $this->db->delete('promo_produk');
        // print_r(count($materialid));exit();
        for ($x = 0; $x < count($product); $x++) {
            $data2 = array(
                'id_produk' => $product[$x],
                'id_promo' => $id,
                'diskon' => $discount[$x],
                'createdAt' => $createdat
            );
            $this->db->insert('promo_produk', $data2);
        }


        $this->db->trans_complete();
    }
    
     function Deactivate_promo($id) {

        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'statusaktif' => 0,
            'updatedat' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $id);
        $this->db->update('promo', $data);
    }

    function Activate_promo($id) {

        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'statusaktif' => 1,
            'updatedat' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $id);
        $this->db->update('promo', $data);
    }

}

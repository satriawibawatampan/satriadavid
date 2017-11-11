<?php

class M_material extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
        $this->load->model('M_product');
        $this->load->model('M_harga');
    }

    function Add_material($name, $type, $hpp, $amountperpack, $idbranch, $bigstock, $grossirprice, $minimumqty, $maximumqty) {
        $this->db->trans_start();
        date_default_timezone_set('Asia/Jakarta');

        $date = date('Y-m-d H:i:s');
        $data = array(
            'nama' => $name,
            'tipe' => $type,
            'hargapokok' => $hpp,
            'jumlahperpack' => $amountperpack,
            'id_cabang' => $this->session->userdata['xcellent_cabang'],
            'createdAt' => $date,
            'updatedAt' => $date
        );

        $this->db->insert('material', $data);
        $insert_material_id = $this->db->insert_id();

        $this->Add_detailmaterial($insert_material_id, $amountperpack, $bigstock, $idbranch, 0);

        $insert_product_id = $this->M_product->Add_product($name, $insert_material_id);

        $this->M_harga->Add_harga($insert_product_id, $grossirprice, $minimumqty, $maximumqty);
        $this->db->trans_complete();
        //return $this->Get_material_id_bytime($date);
        //      return $this->db->insert_id();
    }

    function Add_detailmaterial($idmaterial, $amountperpack, $bigstock, $idbranch, $insert_nota_beli_id) {


        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');

        for ($x = 0; $x < $bigstock; $x++) {
            $data = array(
                'id_material' => $idmaterial,
                //'id_cabang' => $idbranch,
                'id_notabeli' => $insert_nota_beli_id,
                'stok' => $amountperpack,
                'createdAt' => $date,
                'updatedAt' => $date
            );

            $this->db->insert('detailmaterial', $data);
        }
    }

    function Get_material_id_bytime($time) {
        $this->db->select('id');
        $this->db->from('material');
        $this->db->where('createdat', $time);

        $query = $this->db->get();
        return $query->row();
    }

    function Show_all_material($idbranch) {
        $this->db->select("material.id as id, material.nama as nama, material.tipe as tipe, material.hargapokok as hpp, material.jumlahperpack as jumlahperpack, count(detailmaterial.stok) as stok, sum(detailmaterial.stok) as totalstok");

        $this->db->from('material');
        $this->db->join('detailmaterial', 'detailmaterial.id_material = material.id');
        // $this->db->join('cabang', 'cabang.id = material.id_cabang');

        $this->db->where('material.statusaktif', 1);
        $this->db->where('material.id_cabang', $idbranch);
        $this->db->group_by('material.id');
        $query = $this->db->get();
        print_r($query->result()); exit();
        return $query->result();
    }

    function Get_all_material() {
        $this->db->select('*');
        $this->db->from('material');
        $this->db->where('statusaktif', 1);
        $this->db->where('id_cabang', $this->session->userdata['xcellent_cabang']);
        $this->db->order_by('nama');
        $query = $this->db->get();
        
        return $query->result();
    }

    function Get_one_material_and_detailmaterial($id, $branch) {
        $this->db->select('material.*, detailmaterial.* ');
        $this->db->from('material');
        $this->db->join('detailmaterial', 'detailmaterial.id_material = material.id');
        $this->db->where('material.statusaktif', 1);
        $this->db->where('material.id_cabang', $this->session->userdata['xcellent_cabang']);
        $query = $this->db->get();
        return $query->result();
    }

    function Json_get_one_material($id) {
        $this->db->select('material.id as id,material.nama as nama, material.tipe as tipe, material.hargapokok as hargapokok, material.jumlahperpack as jumlahperpack');
        $this->db->from('material');

        $this->db->where('material.statusaktif', 1);
        $this->db->where('material.id_cabang', $this->session->userdata['xcellent_cabang']);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

//    function Json_get_one_material($id) {
//        $this->db->select('material.nama as nama, material.tipe as tipe, material.hargapokok as hargapokok, material.jumlahperpack as jumlahperpack, detailmaterial.stok as stok, detailmaterial.id_cabang as id_cabang');
//        $this->db->from('material');
//         $this->db->join('detailmaterial', 'detailmaterial.id_material = material.id');
//        $this->db->where('material.statusaktif', 1);
//        $this->db->where('id', $id);
//        $query = $this->db->get();
//        return $query->row();
//    }

    function Json_get_detail_material($id) {
        $this->db->select('material.id as id,material.nama as nama,material.hargapokok as hpp, material.tipe as tipe, detailmaterial.id as detailmaterialid, detailmaterial.stok as stok,detailmaterial.id_notabeli as idnotabeli, detailmaterial.createdat as createdat, detailmaterial.updatedat as updatedat');
        $this->db->from('detailmaterial');
        $this->db->join('material', 'detailmaterial.id_material = material.id');
        $this->db->where('id_material', $id);
        $this->db->where('material.id_cabang', $this->session->userdata['xcellent_cabang']);
        $this->db->order_by('detailmaterial.createdat', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    function Json_get_detail_material_array($id) {
        $query = $this->db->query("select detailmaterial.*, material.tipe
                    from detailmaterial
                    join material on detailmaterial.id_material = material.id
                    join produk_material on produk_material.id_material = material.id
                    join produk on produk.id = produk_material.id_produk
                    where produk.id = ?
                    order by id_material asc, createdat asc, stok asc", array($id));
        $detailmaterial = $query->result_array();
        // print_r("a");exit();
        return($detailmaterial);
        // return $query->result_array();
    }

    function Edit_material($id, $nama, $tipe, $hargapokok) {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'nama' => $nama,
            'tipe' => $tipe,
            'hargapokok' => $hargapokok,
            'updatedat' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $id);
        $this->db->update('material', $data);
    }

    function Add_more_stock($id, $stock) {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'id_material' => $id,
            'stok' => $stock,
            // 'id_cabang' => $this->session->userdata['xcellent_cabang'],
            'updatedat' => date('Y-m-d H:i:s'),
        );


        $this->db->insert('detailmaterial', $data);
    }

    function Edit_stock_material($id, $stock) {
        date_default_timezone_set('Asia/Jakarta');
        $this->db->trans_start();
        for ($x = 0; $x < count($id); $x++) {
            $data = array(
                'stok' => $stock[$x],
                    // 'updatedat' => date('Y-m-d H:i:s'),
            );

            $this->db->where('id', $id[$x]);
            $this->db->update('detailmaterial', $data);
        }

        $this->db->trans_complete();
    }

    function Edit_stock_material_where_notabeli($idnotabeli, $idmaterialold, $idmaterial, $stock, $amountperpack, $hpp) {
        date_default_timezone_set('Asia/Jakarta');
        $this->db->trans_start();

        //ambil created at
        $this->db->select('createdat');

        $this->db->where('id_material', $idmaterialold);
        $this->db->where('id_notabeli', $idnotabeli);
        $query = $this->db->get('detailmaterial', 0, 1);
        $createdat = $query->row()->createdat;


        //hapus dulu dari detailmaterial
        $this->db->where('id_notabeli', $idnotabeli);
        $this->db->where('id_material', $idmaterialold);
        $this->db->delete('detailmaterial');

        //lakukan pembaharuan HPP
        $this->Update_hpp_plus($idmaterial, $stock, $amountperpack, $hpp);


        //masukan ke detail_material jika quantity nya ada
        if ($stock * $amountperpack != 0) {
            for ($x = 0; $x < $stock; $x++) {
                $data = array(
                    'stok' => $amountperpack,
                    'createdat' => $createdat,
                    'id_notabeli' => $idnotabeli,
                    'id_cabang' => $this->session->userdata['xcellent_cabang'],
                    'id_material' => $idmaterial
                );

                $this->db->insert('detailmaterial', $data);
            }
        }

        $this->db->trans_complete();
    }

    function Count_stok_material($id) {
        $this->db->select('sum(detailmaterial.stok) as totalstok ');
        $this->db->from('detailmaterial');
        $this->db->join('material', 'detailmaterial.id_material = material.id');
        $this->db->where('material.id', $id);
        $this->db->where('material.id_cabang', $this->session->userdata['xcellent_cabang']);
        $this->db->group_by('detailmaterial.id_material');
        $query = $this->db->get();
        return $query->row();
    }

    function Update_hpp_plus($idmaterial, $qty, $amountperpack, $buyingprice) {
        $material = $this->Json_get_one_material($idmaterial);
        $hpplama = $material->hargapokok;
        $countdetailmaterial = $this->Count_stok_material($idmaterial);
        $totalstoklama = $countdetailmaterial->totalstok;

        //$hppbaru = $totalstoklama*$hpplama;
        $hppbaru = (($totalstoklama * $hpplama) + ($qty * $amountperpack * $buyingprice)) / ($totalstoklama + ( $qty * $amountperpack));

        $data = array('hargapokok' => $hppbaru);
        $this->db->where('id', $idmaterial);
        $this->db->update('material', $data);
    }

    function Update_hpp_min($idmaterialold, $idnota) {
        $hpplama = $this->Json_get_one_material($idmaterialold)->hargapokok;
        $totalstoklama = $this->Count_stok_material($idmaterialold)->totalstok;
        $subtotallama = $this->M_purchasing->Get_one_material_from_purchasing_note($idnota, $idmaterialold)->subtotal;
        $jumlahlama = $this->M_purchasing->Get_one_material_from_purchasing_note($idnota, $idmaterialold)->jumlah * $this->M_purchasing->Get_one_material_from_purchasing_note($idnota, $idmaterialold)->jumlahperpak;

        //print_r($hpplama."/".$totalstoklama."/".$subtotallama."/".$jumlahlama);
        //exit();
        print_r($totalstoklama . "/" . $jumlahlama);
        $hppbaru = (($hpplama * $totalstoklama) - $subtotallama) / ($totalstoklama - $jumlahlama);
        $data = array('hargapokok' => $hppbaru);
        $this->db->where('id', $idmaterialold);
        $this->db->update('material', $data);
    }

    function Reduce_material_quantity($arraytamp) {
          $this->db->trans_start();

        for ($x = 0; $x < count($arraytamp); $x++) {
            $data = array(
                'stok' => $arraytamp[$x]->stok,
                
            );
            $this->db->where('id', $arraytamp[$x]->id);
            $this->db->update('material', $data);

            //$this->db->insert('detailmaterial', $data);
        }
          $this->db->trans_complete();
       
       
    }

}

<?php

class M_purchasing extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
        $this->load->model('M_product');
        $this->load->model('M_harga');
        $this->load->model('M_supplier');
        $this->load->model('M_cashflow');
    }

    function Add_purchasing_note($idsupplier, $idmaterial, $buyingprice, $qty, $subtotal, $idbranch, $amountperpack) {
        $this->db->trans_start();
        date_default_timezone_set('Asia/Jakarta');
        $grandtotal = 0;
        for ($x = 0; $x < count($subtotal); $x++) {
            if ($subtotal[$x] != null) {
                $grandtotal += $subtotal[$x];
            }
        }

        $date = date('Y-m-d H:i:s');
        $data = array(
            'id_supplier' => $idsupplier,
            'tanggal' => $date,
            'grandtotal' => $grandtotal,
            'id_cabang' => $idbranch,
            'createdAt' => $date,
            'updatedAt' => $date
        );


        $this->db->insert('notabeli', $data);
        $insert_nota_beli_id = $this->db->insert_id();
        for ($x = 0; $x < count($idmaterial); $x++) {
            $this->Add_notabeli_material($insert_nota_beli_id, $idmaterial[$x], $qty[$x], $buyingprice[$x], $subtotal[$x], $amountperpack[$x]);
            $this->M_material->Update_hpp_plus($idmaterial[$x], $qty[$x], $amountperpack[$x], $buyingprice[$x]);
            $this->M_material->Add_detailmaterial($idmaterial[$x], $amountperpack[$x], $qty[$x], $this->session->userdata['xcellent_cabang'], $insert_nota_beli_id);
        }



        $this->db->trans_complete();
    }

    function Add_notabeli_material($insert_nota_beli_id, $idmaterial, $qty, $price, $subtotal, $amountperpack) {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        
        $data = array(
            'id_notabeli' => $insert_nota_beli_id,
            'id_material' => $idmaterial,
            'jumlah' => $qty,
            'jumlahperpak' => $amountperpack,
            'harga' => $price,
            'subtotal' => $subtotal,
            'createdAt' => $date,
            'updatedAt' => $date
        );

        $this->db->insert('notabeli_material', $data);
    }

    function Get_all_purchasing_note() {

        $this->db->select('notabeli.*,supplier.nama as namasupplier, supplier.perusahaan as perusahaan');
        $this->db->from('notabeli');
        $this->db->join('supplier', 'supplier.id = notabeli.id_supplier');
        $this->db->order_by("tanggal","desc");
        $query = $this->db->get();
        return $query->result();
    }

    function Get_detail_purchasing_note($id) {

        $this->db->select('notabeli.* , supplier.id as idsupplier, supplier.nama as namasupplier, notabeli_material.id_material as idmaterial, material.nama as namamaterial, material.tipe as tipematerial, notabeli_material.jumlah as jumlahmaterial, notabeli_material.jumlahperpak as jumlahperpak, notabeli_material.subtotal as subtotal, notabeli_material.harga');
        $this->db->from('notabeli');
        $this->db->join('notabeli_material', 'notabeli.id = notabeli_material.id_notabeli');
        $this->db->join('supplier', 'supplier.id = notabeli.id_supplier');
        $this->db->join('material', 'material.id = notabeli_material.id_material');
        $this->db->where('notabeli.id', $id);

        $query = $this->db->get();
        return $query->result();
    }

    function Get_one_material_from_purchasing_note($idnota, $idmaterial) {
        $this->db->select("*");
        $this->db->from("notabeli_material");
        $this->db->where("id_notabeli", $idnota);
        $this->db->where("id_material", $idmaterial);

        $query = $this->db->get();
        return $query->row();
    }

    function Edit_purchasing_note($idnota, $supplier, $idmaterialold, $idmaterial, $hpp, $qty, $amountperpack) {
        $this->db->trans_start();
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');

        $grandtotal = 0;
        for ($x = 0; $x < count($idmaterial); $x++) {

            //rubah hpp per item
            //Lakukan pengurangan HPP 
            $this->M_material->Update_hpp_min($idmaterialold[$x], $idnota);

            //tambahkan baru setelah di edit
            $this->M_material->Edit_stock_material_where_notabeli($idnota, $idmaterialold[$x], $idmaterial[$x], $qty[$x], $amountperpack[$x], $hpp[$x]);



            //rubah detail notabeli_material   
            if ($qty[$x] * $amountperpack[$x] != 0) {
                $data = array(
                    'id_material' => $idmaterial[$x],
                    'jumlah' => $qty[$x],
                    'jumlahperpak' => $amountperpack[$x],
                    'harga' => $hpp[$x],
                    'subtotal' => $hpp[$x] * $qty[$x] * $amountperpack[$x],
                    'updatedAt' => $date);
                $this->db->where('id_notabeli', $idnota);
                $this->db->where('id_material', $idmaterialold[$x]);
                $this->db->update('notabeli_material', $data);
            } else {
                //hapus dari notabeli_material
                $this->db->where('id_notabeli', $idnota);
                $this->db->where('id_material', $idmaterialold[$x]);
                $this->db->delete('notabeli_material');
            }

            $grandtotal = $grandtotal + ($hpp[$x] * $qty[$x] * $amountperpack[$x]);
        }

        //betulkan grandtotal
        $dataeditnota = array(
            'id_supplier' => $supplier,
            'grandtotal' => $grandtotal);

        $this->db->where('id', $idnota);
        $this->db->update('notabeli', $dataeditnota);

        $this->db->trans_complete();
    }

    function Pay_purchasing_note($id) {

        $this->db->trans_complete();
        $data = array(
            'statusbayar' => 1
        );
        $this->db->where('id', $id);
        $this->db->update('notabeli', $data);

        $purcashingnote = $this->Get_detail_purchasing_note($id);
        
        $this->M_cashflow->Add_cashflow("Purchase Payment", 2, "Pay Purchasing Note ".$id, $purcashingnote[0]->grandtotal);
        //print_r($purcashingnote[0]->id);        exit();


        $this->db->trans_complete();
    }

}

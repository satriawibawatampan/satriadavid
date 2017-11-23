<?php

class M_order extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
        $this->load->model('M_cashflow');
    }

    function Add_order_note($datas, $products, $member, $grandtotal, $promo, $totaldiskon) {

        $this->db->trans_start();

        //input order note
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'id_admin' => $this->session->userdata['xcellent_id'],
            'id_member' => $member,
            'tanggal' => date('Y-m-d H:i:s'),
            'grandtotal' => $grandtotal,
            'totaldiskon' => $totaldiskon,
            'id_promo' => $promo[0]['id_promo'],
            'id_cabang  ' => $this->session->userdata['xcellent_cabang'],
            'createdat' => date('Y-m-d H:i:s'),
            'updatedat' => date('Y-m-d H:i:s')
        );
        $this->db->insert('notajual', $data);
        $order_id = $this->db->insert_id();

        //----------------------------------------------
        //input ordernote_product
        for ($x = 0; $x < count($products); $x++) {
            //get hpp
            $sql = " SELECT  sum(material.hargapokok*" . $products[$x]['jumlah'] . ") as total
                        from material
                        join produk_material on produk_material.id_material = material.id
                        join produk on produk.id = produk_material.id_produk

                        where produk.id= ?";
            $result = $this->db->query($sql, array($products[$x]['id']));
            $hppnya = $result->row();
            echo $hppnya->total;

            $data = array(
                'id_notajual' => $order_id,
                'id_produk' => $products[$x]['id'],
                'jumlah' => $products[$x]['jumlah'],
                'diskon' => $products[$x]['diskon'],
                'harga' => $products[$x]['harga'],
                'hargapokok  ' => $hppnya->total,
                'subtotal  ' => $products[$x]['subtotal'],
                'createdat' => date('Y-m-d H:i:s'),
                'updatedat' => date('Y-m-d H:i:s')
            );

            $this->db->insert('notajual_produk', $data);
            $id_notajualproduk = $this->db->insert_id();

            //input used_material_tempt
            for ($y = 0; $y < count($datas); $y++) {
                if ($datas[$y]['idproduk'] == $products[$x]['id']) {
                    $data = array(
                        'id_notajualproduk' => $id_notajualproduk,
                        'id_detailmaterial' => $datas[$y]['id'],
                        'jumlah' => $datas[$y]['stok'],
                        'createdat' => date('Y-m-d H:i:s'),
                        'updatedat' => date('Y-m-d H:i:s')
                    );


                    $this->db->insert('used_material_temp', $data);
                }
            }
        }







        $this->db->trans_complete();
    }

    function Get_all_order() {
        $this->db->select('notajual.*, member.id as idmember, member.nama as namamember, promo.nama as namapromo, admin.nama as namaadmin, b.nama as namakasir, c.nama as namaproduser');
        $this->db->from('notajual');
        $this->db->join('member', 'member.id=notajual.id_member');
        $this->db->join('admin', 'admin.id=notajual.id_admin');
        $this->db->join('admin b', 'b.id=notajual.id_kasir');
        $this->db->join('admin c', 'c.id=notajual.id_produser');
        $this->db->join('promo', 'promo.id=notajual.id_promo');
        $this->db->where('notajual.id_cabang', $this->session->userdata['xcellent_cabang']);
        $query = $this->db->get();
        return $query->result();
    }

    function Get_one_order($id) {
        $this->db->select('*');
        $this->db->from('notajual');
//        $this->db->join('member','member.id=notajual.id_member');
//        $this->db->join('promo','promo.id=notajual.id_promo');
        //$this->db->where('notajual.id_cabang', $this->session->userdata['xcellent_cabang']);
        $this->db->where('notajual.id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function Get_order_product($id) {
        $this->db->select('notajual_produk.*, produk.nama as namaproduk');
        $this->db->from('notajual_produk');
        $this->db->join('produk', 'notajual_produk.id_produk=produk.id');
//        $this->db->join('promo','promo.id=notajual.id_promo');
        //$this->db->where('notajual.id_cabang', $this->session->userdata['xcellent_cabang']);
        $this->db->where('notajual_produk.id_notajual', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function Make_payment($id,$grandtotal) {
        $this->db->trans_start();
        //update status
        $data = array('status' => 1);
        $this->db->where('id', $id);
        $this->db->update('notajual', $data);
        
        
        //hapus usertemp
        $query = $this->db->query("delete from used_material_temp
                where id_notajualproduk in 
                    (select id from notajual_produk where id_notajual=?)", array($id));
        
        //masukan ke cashflow
        $this->M_cashflow->Add_cashflow("Order Payment",1,"Order Note ".$id,$grandtotal);

        $this->db->trans_complete();
    }
    function Run_producing($id) {
        $this->db->trans_start();
        
        $data = array('status' => 2);
        $this->db->where('id', $id);
        $this->db->update('notajual', $data);

        $this->db->trans_complete();
    }
    function Set_finish($id) {
        $this->db->trans_start();
        
        $data = array('status' => 3);
        $this->db->where('id', $id);
        $this->db->update('notajual', $data);

        $this->db->trans_complete();
    }

}

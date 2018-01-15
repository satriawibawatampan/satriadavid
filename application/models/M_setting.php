<?php

class M_setting extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
        $this->load->model('M_admin');
    }

    

    function Get_all_setting() {
        
        $this->db->trans_start();
        
        $cabang = $this->M_admin->Get_admin_branch();
        
        
        $this->db->select('*');
        $this->db->from('setting');
        $this->db->where('id_cabang', $cabang->id_cabang);
        $query = $this->db->get();
       // print_r($query->result()); exit();
       
        
        $this->db->trans_complete();
         return $query->result();
    }

    function Change_setting($depositminimal, $depositbonus, $memberprice, $pointprice, $idnya,$minimalpointexchange, $pointtodeposit)
    {
        $this->db->trans_start();
        $data = array(
            'harga_deposit' => $depositminimal,
            'bonus_deposit' => $depositbonus,
            'harga_member' => $memberprice,
            'harga_poin' => $pointprice,
            'minimaltukarpoin' => $minimalpointexchange,
            'nilaipoinkedeposit' => $pointtodeposit
                
            
        );
        $this->db->where('id', $idnya);
        $this->db->update('setting', $data);
          $this->db->trans_complete();
    }

}

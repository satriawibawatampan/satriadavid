<?php

class M_payment extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    function Add_payment($name,$nilai) {
        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'nama' => $name,
            'nilai' => $nilai,
            'id_cabang' =>  $this->session->userdata['xcellent_cabang'],
            'createdat' => date('Y-m-d H:i:s'),
            'updatedat' => date('Y-m-d H:i:s')
        );

        $this->db->insert('pembayaran', $data);
    }

    function Get_all_payment() {
        $this->db->select('*');
        $this->db->from('pembayaran');
        $this->db->where('statusaktif', 1);
        $this->db->where('id_cabang',0);
        $this->db->or_where('id_cabang',$this->session->userdata['xcellent_cabang']);
        $query = $this->db->get();
      //  print_r($query->result());exit();
        return $query->result();
    }
    
    
    
    function Edit_payment($id,$name,$nilai)
    {
//        print_r($id."/".$name."/".$nilai); exit();
        $data = array(
            'nama' => $name,
            'nilai' => $nilai
            
        );
         $this->db->where('id', $id);
         $this->db->update(pembayaran,$data);
    }

}

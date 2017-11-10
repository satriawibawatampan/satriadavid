<?php

class M_lokasi extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    

    function GetAllProvinsi() {
          $query=  $this->db->get('provinces');
       return $query->result();
    }
    
    function GetAllKota($id) {
          $query=  $this->db->get_where('regencies',array('province_id'=>$id));
       return $query->result();
    }
    function GetAllKecamatan($id) {
          $query=  $this->db->get_where('districts',array('regency_id'=>$id));
       return $query->result();
    }
    
   
}

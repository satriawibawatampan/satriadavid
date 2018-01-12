<?php

class M_harga extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
       
    }

    function Add_harga($insert_product_id,$grossirprice,$minimumqty,$maximumqty) {
       
        date_default_timezone_set('Asia/Jakarta');

        $date = date('Y-m-d H:i:s');
        
        $sizearray = count($grossirprice);
        
        for($x=0;$x<$sizearray;$x++)
        {
        
        $data = array(
            
            'batasbawah' => $minimumqty[$x],
            'batasatas' => $maximumqty[$x],
            'hargajual' => $grossirprice[$x],
            'statusaktif' => 1,
            'id_produk' => $insert_product_id,
            'createdAt' => $date,
            'updatedAt' => $date
        );

        $this->db->insert('harga', $data);
        }
       
        
    }
    
    function Get_harga($idproduct)
    {
          $this->db->select('harga.*');
        $this->db->from('harga');
      
        $this->db->where('harga.id_produk', $idproduct);
        $query = $this->db->get();
        return $query->result();
    }

    
}

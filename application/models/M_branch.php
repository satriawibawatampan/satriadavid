<?php

class M_branch extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    function Add_branch($name) {
        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'nama' => $name,
            'createdat' => date('Y-m-d H:i:s'),
            'updatedat' => date('Y-m-d H:i:s')
        );

        $this->db->insert('cabang', $data);
    }

    function Get_branch_byId($id){
        $sql = "SELECT * FROM cabang WHERE id = ?";
        $hasil = $this->db->query($sql, array($id));
        return $hasil->row_array();
    }

    function Get_all_branch() {
        $this->db->select('*');
        $this->db->from('cabang');
        $this->db->where('statusaktif', 1);
        $query = $this->db->get();
        return $query->result();
    }
    
    function Change_branch($idadmin,$branch)
    {
        $data = array(
            'id_cabang' => $branch,
            
        );
         $this->db->where('id', $idadmin);
         $this->db->update('admin',$data);
    }
    
    function Edit_branch($id,$name)
    {
        $data = array(
            'nama' => $name,
            
        );
         $this->db->where('id', $id);
         $this->db->update(cabang,$data);
    }

}

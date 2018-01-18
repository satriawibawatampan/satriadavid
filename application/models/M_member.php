<?php

class M_member extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
        $this->load->model('M_cashflow');
        $this->load->model('M_order');
        $this->load->model('M_setting');
    }

    function Add_member($name, $email, $phone, $address, $ttl, $gender, $idadmin, $deposit) {
        $this->db->trans_start();
        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'nama' => $name,
            'email' => $email,
            'deposit' => $deposit,
            'ttl' => $ttl,
            'gender' => $gender,
            'telepon' => $phone,
            'alamat' => $address,
            'id_admin' => $idadmin,
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s')
        );

        $this->db->insert('member', $data);
        $this->db->trans_complete();
    }

    function Add_member_ajax($nama, $idadmin, $deposit, $email, $bod, $phone, $gender, $alamat, $bonusdeposit) {
        $this->db->trans_start();

        $allmember = $this->Show_all_member();
        // print_r($allmember);$exit();
        foreach ($allmember as $item) {
            //print_r($item->email);$exit();
            if ($item->email == $email) {
                return 0;
            }
        }
        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'nama' => $nama,
            'email' => $email,
            'deposit' => $deposit + ($deposit * $bonusdeposit / 100),
            'ttl' => $bod,
            'gender' => $gender,
            'telepon' => $phone,
            'alamat' => $alamat,
            'id_admin' => $idadmin,
            'statusaktif' => "0",
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s')
        );

        $this->db->insert('member', $data);
        $this->db->trans_complete();

        $sql2 = "SELECT LAST_INSERT_ID() as id";
        $hasil = $this->db->query($sql2);
        $id = $hasil->row()->id;

        return $id;
    }

    function Add_member_from_kasir_ajax($nama, $idadmin, $deposit, $email, $bod, $phone, $gender, $alamat, $idnota,$bonusdeposit) {
        $this->db->trans_start();

        $allmember = $this->Show_all_member();
        // print_r($allmember);$exit();
        foreach ($allmember as $item) {
            //print_r($item->email);$exit();
            if ($item->email == $email) {
                return 0;
            }
        }
        date_default_timezone_set('Asia/Jakarta');

        $data = array(
            'nama' => $nama,
            'email' => $email,
            'deposit' => $deposit+ ($deposit * $bonusdeposit / 100),
            'ttl' => $bod,
            'gender' => $gender,
            'telepon' => $phone,
            'alamat' => $alamat,
            'id_admin' => $idadmin,
            'statusaktif' => "0",
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s')
        );

        $this->db->insert('member', $data);
        $idmember = $this->db->insert_id();

        $this->M_order->AddMemberToNota($idnota, $idmember,$deposit,$bonusdeposit);

        $this->db->trans_complete();
        return $idmember;
    }
    

    function Cancel_add_member($idmember) {
        $this->db->trans_start();
        $this->db->where('id', $idmember);
        $this->db->delete('member');
        
        
        $this->db->trans_complete();
    }
    function Cancel_add_member_in_edit($idmember,$idnota,$hargamember) {
        $this->db->trans_start();
        $this->db->where('id', $idmember);
        $this->db->delete('member');
      //  json_decode($idnota);
         $sql = "DELETE FROM notajual_produk WHERE id_notajual = ? and id_produk= ?";
        $this->db->query($sql, array($idnota,0));
        
       $this->db->set('grandtotal', 'grandtotal-' . $hargamember, FALSE);
        $this->db->where('id', $idnota);
        $this->db->update('notajual');
        
        $data = array(
            'id_member' => 0
        );

        $this->db->where('id', $idnota);
        $this->db->update('notajual', $data );
        
        $this->db->trans_complete();
    }

    function Show_all_member() {
        $this->db->select('*');
        $this->db->from('member');

        $query = $this->db->get();
        return $query->result();
    }

    function Deactivate_member($id) {

        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'statusaktif' => 0
        );

        $this->db->where('id', $id);
        $this->db->update('member', $data);
    }

    function Activate_member($id) {

        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'statusaktif' => 1
        );

        $this->db->where('id', $id);
        $this->db->update('member', $data);
    }

    function Show_all_member_active() {
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('member.statusaktif', 1);
        $query = $this->db->get();
        //print_r($query->result()); exit();
        return $query->result();
    }

    function Json_get_one_member($id) {
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('statusaktif', 1);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function Edit_member($id, $nama, $email, $address, $phone, $ttl, $deposit, $gender) {
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'nama' => $nama,
            'email' => $email,
            'alamat' => $address,
            'telepon' => $phone,
            'ttl' => $ttl,
            'deposit' => $deposit,
            'gender' => $gender,
            'updatedat' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $id);
        $this->db->update('member', $data);
    }

    function Delete_member($id) {

        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'statusaktif' => 0,
            'updatedat' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $id);
        $this->db->update('member', $data);
    }

    function Add_deposit($deposit, $idmember) {


        $this->db->trans_start();
        $this->db->set('deposit', 'deposit+' . $deposit, FALSE);
        $this->db->where('id', $idmember);
        $this->db->update('member');


        // $this->M_cashflow->Add_cashflow("Member Deposit", 1, "Deposit Member " . $idmember, $deposit);
        $this->db->trans_complete();
    }

    function Reduce_deposit($payment, $idmember) {


        $this->db->trans_start();
        $this->db->set('deposit', 'deposit-' . $payment, FALSE);
        $this->db->where('id', $idmember);
        $this->db->update('member');


        // $this->M_cashflow->Add_cashflow("Member Deposit", 1, "Deposit Member " . $idmember, $deposit);
        $this->db->trans_complete();
    }

    function Add_point($idmember, $grandtotal) {


        $this->db->trans_start();

       $datasetting = $this->M_setting->Get_all_setting();
  
        $hargapoint = $datasetting[0]->harga_poin;
        $poinditambah = (int) $grandtotal / (int) $hargapoint;
        
        
        $this->db->set('poin', 'poin+' .  $poinditambah,FALSE);
        $this->db->where('id', $idmember);
        $this->db->update('member');
        

        $this->db->trans_complete();
    }
    
    function Get_count_member_per_100()
    {
        $this->db->select('count(*) as count');
        $this->db->from('member');
        $this->db->where('statusaktif', 1);
        
        $query = $this->db->get();
        //print_r($query->row());exit();
        return $query->row();
    }
    function Get_member_per_100($counter)
    {
        $this->db->select('member.email');
        //$this->db->from('member');
        $this->db->where('statusaktif', 1);
        
        $query = $this->db->get('member', 100, (int)($counter/100+1));
       // print_r($query->result());exit();
        return $query->result_array();
    }
    
    function Exchange_point($id, $minimalexchange,$pointtodeposit)
    {
        $this->db->trans_start();
       $this->db->set('poin', 'poin-' .  $minimalexchange,FALSE);
        $this->db->where('id', $id);
        $this->db->update('member');
        
       $this->db->set('deposit', 'deposit+' .  $pointtodeposit,FALSE);
        $this->db->where('id', $id);
        $this->db->update('member');
          $this->db->trans_complete();
    }
    
    function AddMemberToNota($id, $idmember, $deposit, $bonusdeposit) {
        $this->db->trans_start();
        $sql = "SELECT * FROM member WHERE id = ?";
        $result = $this->db->query($sql, array($idmember));
        $hasil = $result->row_array();
        if (count($hasil) > 0) {
            $data = array(
                'id_notajual' => $id,
                'id_produk' => 0,
                'jumlah' => 1,
                'diskon' => 0,
                'harga' => $deposit,
                'deskripsi' => 'ID: ' . $idmember,
                'hargapokok  ' => $deposit + ($deposit * $bonusdeposit / 100),
                'subtotal  ' => $deposit,
                'createdat' => date('Y-m-d H:i:s'),
                'updatedat' => date('Y-m-d H:i:s')
            );
            $this->db->insert('notajual_produk', $data);

            //udpate to notajual
            $sql2 = "UPDATE notajual SET id_member = ?, grandtotal = grandtotal + ? WHERE id = ?";
            $this->db->query($sql2, array($idmember, $deposit, $id));
        }

        $this->db->trans_complete();
    }

}

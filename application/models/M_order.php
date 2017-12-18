<?php

class M_order extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
        $this->load->model('M_cashflow');
        $this->load->model('M_material');
        $this->load->model('M_promo');
        $this->load->model('M_product');
        $this->load->model('M_member');
    }

    function Add_order_note($datas, $products, $member, $grandtotal, $promo, $totaldiskon, $deskripsi) {
        // print_r($products); exit();
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

        //Tak rapiin masuk sini kabeh
        $hasil = $this->InsertNotaProdukData($products, $order_id);

        $this->db->trans_complete();
        return $hasil;
    }

    function InsertNotaProdukData($products, $order_id) {
        $this->db->trans_start();


        //input ordernote_product
        for ($x = 0; $x < count($products); $x++) {

            $detailmaterial = $this->M_material->Json_get_detail_material_array($products[$x]['id']);
            //  print_r($detailmaterial);            exit();
            $produk_material = $this->M_product->Json_get_material_array($products[$x]['id']);
            //print_r($produk_material);            exit();
            $tampung = [];
            $countertampung = 0;
            $needed = [];
            $neededtipe1 = [];
            for ($a = 0; $a < count($produk_material); $a++) {
                if ($produk_material[$a]['id_kategori'] == "1" || $produk_material[$a]['id_kategori'] == "2" || $produk_material[$a]['id_kategori'] == "3") {
                    if ($produk_material[$a]['tipematerial'] == 1) {
                        $needed[$a] = $products[$x]['jumlah'] * $produk_material[$a]['jumlahmaterial'];
                        $neededtipe1[$a] = $products[$x]['jumlah'];
                    } else {
                        $needed[$a] = $products[$x]['jumlah'];
                        $neededtipe1[$a] = $products[$x]['jumlah'] * $produk_material[$a]['jumlahmaterial'];
                    }
                } else {
                    //Jika tipe Produk
                    $needed[$a] = $products[$x]['jumlah'] * $produk_material[$a]['jumlahmaterial'];
                    $neededtipe1[$a] = $products[$x]['jumlah'];
                }
                for ($b = 0; $b < count($detailmaterial); $b++) {
                    if ($produk_material[$a]['idmaterial'] == $detailmaterial[$b]['id_material']) {
                        if ($detailmaterial[$b]['tipe'] == 2) {
                            $neededtipe1[$a] = 0;
                            if ($needed[$a] <= $detailmaterial[$b]['stok'] && $detailmaterial[$b]['stok'] > 0) {
                                $tampung[$countertampung]['id'] = $detailmaterial[$b]['id'];
                                $tampung[$countertampung]['stok'] = $needed[$a];
                                $tampung[$countertampung]['idproduk'] = $products[$x]['id'];
                                // $tampung.push({"id": $detailmaterial[$b]['id'], "stok": $needed[$a], "idproduk": $idproduk});
                                $detailmaterial[$b]['stok'] = $detailmaterial[$b]['stok'] - $needed[$a];
                                $needed[$a] = 0;
                                $countertampung++;
                                break;
                            } else if ($needed[$a] > $detailmaterial[$b]['stok'] && $detailmaterial[$b]['stok'] > 0) {
                                $tampung[$countertampung]['id'] = $detailmaterial[$b]['id'];
                                $tampung[$countertampung]['stok'] = $detailmaterial[$b]['stok'];
                                $tampung[$countertampung]['idproduk'] = $products[$x]['id'];

                                if ($produk_material[$a]['id_kategori'] == "1") {
                                    //Jika tipe Material
                                    $needed[$a] --;
                                } else {
                                    //Jika tipe Produk
                                    $needed[$a] = $needed[$a] - $detailmaterial[$b]['stok'];
                                }
                                $detailmaterial[$b]['stok'] = 0;
                                $countertampung++;
                            }
                        } else if ($detailmaterial[$b]['tipe'] == 1 && $neededtipe1[$a] > 0) {
                            $needed[$a] = 0;
                            //Pesen 20 brang
                            //Produk material per barag, butuh mek 7
                            if ($produk_material[$a]['id_kategori'] == "1" || $produk_material[$a]['id_kategori'] == "2" || $produk_material[$a]['id_kategori'] == "3") {
                                //print_r("asd"); exit();
                                for ($xc = $neededtipe1[$a]; $xc > 0; $xc -= $products[$x]['long']) {

                                    if ($detailmaterial[$b]['stok'] >= $products[$x]['long']) {

                                        $detailmaterial[$b]['stok'] = $detailmaterial[$b]['stok'] - $products[$x]['long'];


                                        $tampung[$countertampung]['id'] = $detailmaterial[$b]['id'];
                                        $tampung[$countertampung]['stok'] = $products[$x]['long'];
                                        $tampung[$countertampung]['idproduk'] = $products[$x]['id'];

                                        //Jika kategori Material
                                        $neededtipe1[$a] = $neededtipe1[$a] - 1;


                                        $countertampung++;
                                    } else {
                                        break;
                                    }
                                }
                            } else {
                                //else if ($produk_material[$a]['id_kategori'] == "2") {
                                for ($xc = $neededtipe1[$a]; $xc > 0; $xc--) {
                                    //pesenean sisa 17
                                    if ($detailmaterial[$b]['stok'] >= $produk_material[$a]['jumlahmaterial']) {
                                        //stok skg 48
                                        $detailmaterial[$b]['stok'] = $detailmaterial[$b]['stok'] - $produk_material[$a]['jumlahmaterial'];
                                        //Stok sisa setelah d kurangi 47
                                        $tampung[$countertampung]['id'] = $detailmaterial[$b]['id'];
                                        $tampung[$countertampung]['stok'] = $produk_material[$a]['jumlahmaterial'];
                                        $tampung[$countertampung]['idproduk'] = $products[$x]['id'];

                                        //Jika tipe Produk
                                        $neededtipe1[$a] --;


                                        $countertampung++;
                                    } else {
                                        break;
                                    }
                                }
                            }
                        }
                    }
                }
            }
            $bolehtambah = true;
            $namaproduktidakcukup = "";

            for ($m = 0; $m < count($needed); $m++) {
                if ($needed[$m] > 0) {
                    $bolehtambah = false;
                    $namaproduktidakcukup = $produk_material[$m]['namaproduk'];

                    //  exit();
                    break;
                }
            }
            for ($n = 0; $n < count($neededtipe1); $n++) {
                if ($neededtipe1[$n] > 0) {

                    $bolehtambah = false;
                    $namaproduktidakcukup = $produk_material[$n]['namaproduk'];
                    // print_r("Materials for product ".$namaproduktidakcukup." are not enough.");
                    //print_r("needed1 ada yang isi");
                    // exit();
                    break;
                }
            }

            if ($bolehtambah == false) {

                $this->db->trans_rollback();
                return 0;
                //print_r("Materials for product ".$namaproduktidakcukup." are not enough.");
                // return $a;
                // print_r("needed ada yang isi lalal");
            } else if ($bolehtambah == true) {




                //  print_r($order_id);                exit();
                //get hpp to input to notajual_produk
                $sql = " SELECT  sum(material.hargapokok*" . $products[$x]['jumlah'] . ") as total
                        from material
                        join produk_material on produk_material.id_material = material.id
                        join produk on produk.id = produk_material.id_produk

                        where produk.id= ?";
                $result = $this->db->query($sql, array($products[$x]['id']));
                $hppnya = $result->row();


                //input to notajual_produk
                if ($hppnya->total == NULL) {
                    $hppnya->total = 0;
                }
                $data = array(
                    'id_notajual' => $order_id,
                    'id_produk' => $products[$x]['id'],
                    'jumlah' => $products[$x]['jumlah'],
                    'long' => $products[$x]['long'],
                    'diskon' => $products[$x]['diskon'],
                    'harga' => $products[$x]['harga'],
                    'hargapokok  ' => $hppnya->total,
                    'subtotal  ' => $products[$x]['subtotal'],
                    'createdat' => date('Y-m-d H:i:s'),
                    'updatedat' => date('Y-m-d H:i:s')
                );
                $this->db->insert('notajual_produk', $data);
                $id_notajualproduk = $this->db->insert_id();


                for ($t = 0; $t < count($tampung); $t++) {
                    //input used_material_tempt
                    $data = array(
                        'id_notajualproduk' => $id_notajualproduk,
                        'id_detailmaterial' => $tampung[$t]['id'],
                        'jumlah' => $tampung[$t]['stok'],
                        'createdat' => date('Y-m-d H:i:s'),
                        'updatedat' => date('Y-m-d H:i:s')
                    );
                    $this->db->insert('used_material_temp', $data);

                    //kurangi detailmaterial
                    $this->db->set('stok', 'stok-' . $tampung[$t]['stok'], FALSE);
                    $this->db->where('id', $tampung[$t]['id']);
                    $this->db->update('detailmaterial');

                    //Rubah status pakai
                    $datanya = array('statuspakai' => 1);
                    $this->db->where('id', $tampung[$t]['id']);
                    $this->db->update('detailmaterial', $datanya);
                }
            }
        }

        $this->db->trans_complete();
        return 1;
    }

    function Edit_order_note($idnota, $products, $member, $grandtotal, $promo, $totaldiskon) {
        $this->db->trans_start();

        //Delete yg lama
        $this->DeleteOrder($id_notajual, "edit");

        //Insert yang baru
        $this->InsertNotaProdukData($products, $idnota);

        //Update Nota
        $sql = "UPDATE notajual SET grandtotal = ?, totaldiskon=?";
        $array = array($grandtotal, $totaldiskon);
        if (isset($member)) {
            $sql .= ",id_member = ?";
            array_push($array, $member);
        }
        if (isset($promo)) {
            $sql .= ",id_promo = ?";
            array_push($array, $promo);
        }
        $sql .= " WHERE id = ?";

        $this->db->trans_complete();
        return 1;
    }

    function Get_all_order() {
        $this->db->select('notajual.*, member.id as idmember, member.nama as namamember, promo.nama as namapromo, admin.nama as namaadmin,'
                . ' b.nama as namakasir, c.nama as namaproduser'
                . '');
        $this->db->from('notajual');
        $this->db->join('member', 'member.id=notajual.id_member');
        $this->db->join('admin', 'admin.id=notajual.id_admin');
        $this->db->join('admin b', 'b.id=notajual.id_kasir');
        $this->db->join('admin c', 'c.id=notajual.id_produser');
        $this->db->join('promo', 'promo.id=notajual.id_promo', 'left');
        $this->db->where('notajual.id_cabang', $this->session->userdata['xcellent_cabang']);
        if ($this->session->userdata['xcellent_tipe'] == 4) {
            $this->db->where('notajual.status', 1);
        }
        $this->db->order_by('notajual.grandtotal', 'DESC');
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

    function Make_payment($id, $grandtotal, $idpayment, $amount,$idmember) {
        $this->db->trans_start();
        //cek apakah ada registrasi member
        $sql = "SELECT nj.* FROM notajual_produk np, notajual nj
                WHERE np.id_notajual = ? AND np.id_produk = ? AND nj.id = np.id_notajual";
        $result1 = $this->db->query($sql, array($id, 0));
        $hasil = $result1->row_array();
        if (count($hasil) > 0) {
            $this->M_member->Activate_member($hasil['id_member']);
        }
        
        //cek apakah ada deposit
        $sql = "SELECT nj.* FROM notajual_produk np, notajual nj
                WHERE np.id_notajual = ? AND np.id_produk = ? AND nj.id = np.id_notajual";
        $result1 = $this->db->query($sql, array($id, 13));
        $hasil = $result1->row_array();
        if (count($hasil) > 0) {
            $this->M_member->Add_deposit(100/90*$grandtotal,$hasil['id_member']);
        }

        //update status
        $data = array('status' => 1, 'id_kasir' => $this->session->userdata['xcellent_id']);
        $this->db->where('id', $id);
        $this->db->update('notajual', $data);



        //masukan ke notajual_pembayaran
        for ($f = 0; $f < count($idpayment); $f++) {
            $data = array(
                'id_notajual' => $id,
                'id_pembayaran' => $idpayment[$f],
                'jumlah' => $amount[$f]
            );
            $this->db->insert('notajual_pembayaran', $data);

            if ($idpayment[$f] == 1) {
                $this->M_cashflow->Add_pettycash("Order Payment", 1, "Order Note " . $id, $amount[$f]);
            }
            if($idpayment[$f]==0)
            {
                $this->M_member->Reduce_deposit($amount[$f]);
            }
        }

        //update kasir
        //masukan ke cashflow
        $this->M_cashflow->Add_cashflow("Order Payment", 1, "Order Note " . $id, $grandtotal);

        $this->db->trans_complete();
    }

    function Run_producing($id) {
        $this->db->trans_start();

        $data = array('status' => 2, 'id_produser' => $this->session->userdata['xcellent_id']);
        $this->db->where('id', $id);
        $this->db->update('notajual', $data);

        $this->db->trans_complete();
    }

    function Set_finish($id, $deskripsi, $iddetailmaterial, $idnotajualproduk) {
        $this->db->trans_start();

        //ubah jadi finish
        $data = array('status' => 3);
        $this->db->where('id', $id);
        $this->db->update('notajual', $data);

        //update residu
        for ($f = 0; $f < count($iddetailmaterial); $f++) {
            $data = array(
                'deskripsi_residual' => $deskripsi[$f]
            );
            $this->db->where('id_detailmaterial', $iddetailmaterial[$f]);
            $this->db->where('id_notajualproduk', $idnotajualproduk[$f]);
            $this->db->update('used_material_temp', $data);
        }

        $this->db->trans_complete();
    }

    function Get_printByIdNota($id_notajual) {
        $this->db->trans_start();
//        $sql = "SELECT nj.*, a.nama as nama_admin, m.nama as nama_member
//                FROM notajual nj, admin a, member m
//                WHERE nj.id = ? AND nj.id_admin = a.id AND nj.id_member = m.id";
//        $result = $this->db->query($sql, array($id_notajual));
        $this->db->select('notajual.*, member.id as idmember, member.nama as nama_member, promo.nama as namapromo, admin.nama as namaadmin,'
                . ' b.nama as nama_admin, c.nama as namaproduser'
                . '');
        $this->db->from('notajual');
        $this->db->join('member', 'member.id=notajual.id_member');
        $this->db->join('admin', 'admin.id=notajual.id_admin');
        $this->db->join('admin b', 'b.id=notajual.id_kasir');
        $this->db->join('admin c', 'c.id=notajual.id_produser');
        $this->db->join('promo', 'promo.id=notajual.id_promo');
        $this->db->where('notajual.id', $id_notajual);

        $query = $this->db->get();
        $nota = $query->row_array();
        if (count($nota) > 0) {
            //Get Barang By Nota
            $barangs = $this->M_product->Get_productNotaJualByIdNota($id_notajual);
            if (count($barangs) > 0) {
                $nota['produks'] = $barangs;
            } else {
                $nota['produks'] = [];
            }
            //Get Pembayaran By Nota
            $pembayaran = $this->Get_pembayaranByIdNota($id_notajual);
            if (count($pembayaran) > 0) {
                $nota['pembayaran'] = $pembayaran;
            } else {
                $nota['pembayaran'] = [];
            }
        }
        return $nota;

        $this->db->trans_complete();
    }

    function Get_pembayaranByIdNota($id_notajual) {
        $sql = "SELECT np.* FROM notajual_pembayaran np join pembayaran p on p.id = np.id_pembayaran WHERE np.id_notajual = ?";
        $result = $this->db->query($sql, array($id_notajual));
        $hasil = $result->result_array();
        return $hasil;
    }

    function AddMemberToNota($id, $idmember) {
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
                'harga' => $hasil['deposit'],
                'hargapokok  ' => 0,
                'subtotal  ' => $hasil['deposit'],
                'createdat' => date('Y-m-d H:i:s'),
                'updatedat' => date('Y-m-d H:i:s')
            );
            $this->db->insert('notajual_produk', $data);

            //udpate to notajual
            $sql2 = "UPDATE notajual SET id_member = ?, grandtotal = grandtotal + ? WHERE id = ?";
            $this->db->query($sql2, array($idmember, $hasil['deposit'], $id));
        }

        $this->db->trans_complete();
    }

    function Add_deposit_to_note($deposit, $idmember) {
         $this->db->trans_start();
        //input order note
        //print_r($deposit); exit();
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'id_admin' => $this->session->userdata['xcellent_id'],
            'id_member' => $idmember,
            'tanggal' => date('Y-m-d H:i:s'),
            'grandtotal' => $deposit - ($deposit * 10 / 100),
            'totaldiskon' => $deposit * 10 / 100,
            'id_promo' => "0",
            'id_cabang  ' => $this->session->userdata['xcellent_cabang'],
            'createdat' => date('Y-m-d H:i:s'),
            'updatedat' => date('Y-m-d H:i:s')
        );
        $this->db->insert('notajual', $data);
        $order_id = $this->db->insert_id();
//print_r($order_id); exit();
        //input to notajual_produk
        $data = array(
            'id_notajual' => $order_id,
            'id_produk' => 13,
            'jumlah' => 1,
            'long' => 1,
            'diskon' => 10,
            'harga' => $deposit,
            'hargapokok  ' => $deposit ,
            'subtotal  ' => $deposit - $deposit * 10 / 100,
            'createdat' => date('Y-m-d H:i:s'),
            'updatedat' => date('Y-m-d H:i:s')
        );
        $this->db->insert('notajual_produk', $data);
        $id_notajualproduk = $this->db->insert_id();
        
       //$this->M_member->Add_deposit($deposit, $idmember) ;
       
        $this->db->trans_complete();
    }

    function DeleteOrder($id, $dari) {
        $this->db->trans_start();
        $sql = "SELECT umt.*
        FROM notajual_produk nj, used_material_temp umt, detailmaterial dm
        WHERE nj.id_notajual = ? AND nj.id = umt.id_notajualproduk AND dm.id=umt.id_detailmaterial";
        $hasil = $this->db->query($sql, array($id));
        $barangs = $hasil->result_array();

        if (count($barangs) > 0) {
            //Tambah Material stok dlu
            for ($i = 0; $i < count($barangs); $i++) {
                $this->M_material->Update_detailMaterialStok($barangs[$i]['id_detailmaterial'], $barangs[$i]['jumlah']);
            }

            //delete di used_material_temp
            for ($i = 0; $i < count($barangs); $i++) {
                $this->DeleteTempMaterial($barangs[$i]['id_notajualproduk'], $barangs[$i]['id_detailmaterial']);
            }
        }

        $this->DeleteNotaJualProduk($id);

        if ($dari == "delete") {
            $this->DeleteNotaJual($id);
        } else if ($dari == "edit") {
            
        }


        $this->db->trans_complete();
    }

    function DeleteTempMaterial($id_notajualproduk, $id_detailmaterial) {
        $this->db->trans_start();

        $sql = "DELETE FROM used_material_temp WHERE id_notajualproduk = ? AND id_detailmaterial = ?";
        $this->db->query($sql, array($id_notajualproduk, $id_detailmaterial));

        $this->db->trans_complete();
    }

    function DeleteNotaJualProduk($id_notajual) {
        $this->db->trans_start();

        $sql = "DELETE FROM notajual_produk WHERE id_notajual = ?";
        $this->db->query($sql, array($id_notajual));

        $this->db->trans_complete();
    }

    function DeleteNotaJual($id_notajual) {
        $this->db->trans_start();

        $sql = "DELETE FROM notajual WHERE id = ?";
        $this->db->query($sql, array($id_notajual));

        $this->db->trans_complete();
    }

}

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

    function Add_order_note($datas, $products, $member, $grandtotal, $promo, $totaldiskon, $deskripsi, $antrian) {
        // print_r($products); exit();
        $this->db->trans_start();

        // print_r($antrian); exit();
        //input order note
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'id_admin' => $this->session->userdata['xcellent_id'],
            'id_member' => $member,
            'tanggal' => date('Y-m-d H:i:s'),
            'grandtotal' => $grandtotal,
            'totaldiskon' => $totaldiskon,
            'antrian' => $antrian,
            'id_promo' => $promo[0]['id_promo'],
            'id_cabang  ' => $this->session->userdata['xcellent_cabang'],
            'createdat' => date('Y-m-d H:i:s'),
            'updatedat' => date('Y-m-d H:i:s')
        );
        $this->db->insert('notajual', $data);
        $order_id = $this->db->insert_id();

        //Tak rapiin masuk sini kabeh
        $hasil = $this->InsertNotaProdukData($products, $order_id, "add");
        if($hasil == 1){
            $this->db->trans_complete();
            return 1;
        }else{
            $this->db->trans_rollback();
            return $hasil;
        }
    }

    function Add_order_note_deposit($member, $grandtotal) {
        // print_r($products); exit();
        $this->db->trans_start();

        //input order note
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'id_admin' => $this->session->userdata['xcellent_id'],
            'id_member' => $member,
            'tanggal' => date('Y-m-d H:i:s'),
            'grandtotal' => $grandtotal,
            'totaldiskon' => 0,
            'id_promo' => 0,
            'id_cabang  ' => $this->session->userdata['xcellent_cabang'],
            'createdat' => date('Y-m-d H:i:s'),
            'updatedat' => date('Y-m-d H:i:s')
        );
        $this->db->insert('notajual', $data);
        $order_id = $this->db->insert_id();

        $data = array(
            'id_notajual' => $order_id,
            'id_produk' => 1,
            'jumlah' => 1,
            'long' => 1,
            'diskon' => 0,
            'harga' => $grandtotal,
            'hargapokok  ' => $grandtotal,
            'subtotal  ' => $grandtotal,
            'createdat' => date('Y-m-d H:i:s'),
            'updatedat' => date('Y-m-d H:i:s')
        );
        $this->db->insert('notajual_produk', $data);
        $id_notajualproduk = $this->db->insert_id();




        $this->M_member->Add_deposit($grandtotal, $member);

        $this->db->trans_complete();
        return $hasil;
    }

    function InsertNotaProdukData($products, $order_id, $dari) {
        $this->db->trans_start();
        $idOut = "";

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

                $needed[$a] = $products[$x]['jumlah'] * $produk_material[$a]['jumlahmaterial'];
                $neededtipe1[$a] = $products[$x]['jumlah'];

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


                                $needed[$a] = $needed[$a] - $detailmaterial[$b]['stok'];

                                $detailmaterial[$b]['stok'] = 0;
                                $countertampung++;
                            }
                        } else if ($detailmaterial[$b]['tipe'] == 1 && $neededtipe1[$a] > 0) {
                            $needed[$a] = 0;

                            if ($products[$x]['long'] != 1) {
                                 //if ini masuk kalau produknya memerlukan long. 
                                $start = $products[$x]['long'] * $neededtipe1[$a];

                                $totalyangdigunakan = 0;
                                for ($xc = $start; $xc > 0; $xc -= $products[$x]['long']) {
                                    if ($detailmaterial[$b]['stok'] >= $products[$x]['long']) {
                                        $detailmaterial[$b]['stok'] = $detailmaterial[$b]['stok'] - $products[$x]['long'];

                                        $totalyangdigunakan += $products[$x]['long'];

                                        $neededtipe1[$a] = $neededtipe1[$a] - 1;
                                        if ($neededtipe1[$a] == 0) {
                                            $tampung[$countertampung]['id'] = $detailmaterial[$b]['id'];
                                            $tampung[$countertampung]['stok'] = $totalyangdigunakan;
                                            $tampung[$countertampung]['idproduk'] = $products[$x]['id'];
                                            $countertampung++;
                                        }
                                    } else {
                                        //totalyangdigunakan pernah ditambah sebelumnya.
                                        if ($totalyangdigunakan != 0) {
                                            $tampung[$countertampung]['id'] = $detailmaterial[$b]['id'];
                                            $tampung[$countertampung]['stok'] = $totalyangdigunakan;
                                            $tampung[$countertampung]['idproduk'] = $products[$x]['id'];
                                            $countertampung++;
                                        }
                                        break;
                                    }
                                }
                            } else if ($products[$x]['long'] == 1) { 
                               //kalau datanya tidak menggunakan long, long di send 1. data yang digunakan adalah produk_material[jumlah material]
                                $start = $produk_material[$a]['jumlahmaterial'] * $neededtipe1[$a];

                                $totalyangdigunakan = 0;
                                for ($xc = $start; $xc > 0; $xc -= $produk_material[$a]['jumlahmaterial']) {
                                    if ($detailmaterial[$b]['stok'] >= $produk_material[$a]['jumlahmaterial']) {
                                        $detailmaterial[$b]['stok'] = $detailmaterial[$b]['stok'] - $produk_material[$a]['jumlahmaterial'];

                                        //variable ini saya gunakan agar masuk residual material jadi 1 keseluruhan
                                        $totalyangdigunakan += $produk_material[$a]['jumlahmaterial'];

                                        $neededtipe1[$a] = $neededtipe1[$a] - 1;
                                        if ($neededtipe1[$a] == 0) {
                                            $tampung[$countertampung]['id'] = $detailmaterial[$b]['id'];
                                            $tampung[$countertampung]['stok'] = $totalyangdigunakan;
                                            $tampung[$countertampung]['idproduk'] = $products[$x]['id'];
                                            $countertampung++;
                                        }
                                    } else {
                                        //totalyangdigunakan pernah ditambah sebelumnya.
                                        if ($totalyangdigunakan != 0) {
                                            $tampung[$countertampung]['id'] = $detailmaterial[$b]['id'];
                                            $tampung[$countertampung]['stok'] = $totalyangdigunakan;
                                            $tampung[$countertampung]['idproduk'] = $products[$x]['id'];
                                            $countertampung++;
                                        }
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
                return $namaproduktidakcukup;
                //print_r("Materials for product ".$namaproduktidakcukup." are not enough.");
                // return $a;
                // print_r("needed ada yang isi lalal");
            } else if ($bolehtambah == true) {
                if (isset($products[$x]['long'])) {
                    
                } else {
                    $products[$x]['long'] = $products[$x]['jumlah2'];
                }
                $sql = " SELECT  sum(material.hargapokok*" . $products[$x]['jumlah'] . "*" . $products[$x]['long'] . ") as total
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
                date_default_timezone_set('Asia/Jakarta');
                $data = array(
                    'id_notajual' => $order_id,
                    'id_produk' => $products[$x]['id'],
                    'jumlah' => $products[$x]['jumlah'],
                    'long' => $products[$x]['long'],
                    'diskon' => $products[$x]['diskon'],
                    'harga' => $products[$x]['harga'],
                    'deskripsi' => $products[$x]['deskripsi'],
                    'hargapokok  ' => $hppnya->total,
                    'subtotal  ' => $products[$x]['subtotal'],
                    'createdat' => date('Y-m-d H:i:s'),
                    'updatedat' => date('Y-m-d H:i:s')
                );
                //satria kasih if agar ketika edit, id tidak dimasukkan kembali.
                if ($dari == "add" || $dari == "edit" && $products[$x]['id'] != 0) {
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
        }

        $this->db->trans_complete();
        return 1;
    }

    function Edit_order_note($idnota, $products, $member, $grandtotal, $promo, $totaldiskon) {
        $this->db->trans_start();

        //Delete yg lama
        $this->DeleteOrder($idnota, "edit");

        //Insert yang baru
        $hasil = $this->InsertNotaProdukData($products, $idnota, "edit");

        if ($hasil == 1) {
            //Update Nota
            $newgrandtotal = 0;
            $newtotaldiskon = 0;
            $adatambahmember = 0;
            $idmemberbaru = 0;
            for ($x = 0; $x < count($products); $x++) {
                $newgrandtotal += $products[$x]['subtotal'];
                $newtotaldiskon += $products[$x]['diskon'] / 100 * $products[$x]['jumlah'] * $products[$x]['harga'];
                if ($products[$x]['id'] == 0) {
                    $adatambahmember = 1;
                    $idmemberbaru = substr($products[$x]['deskripsi'], 4, strlen($products[$x]['deskripsi']));
                }
            }
            // print_r($idmemberbaru);exit();
            // print_r($newtotaldiskon); exit();
            $sql = "UPDATE notajual SET grandtotal = ?, totaldiskon=?";
            $array = array($newgrandtotal, $newtotaldiskon);
            if ($adatambahmember == 1) {
                $sql .= ",id_member = ?";
                array_push($array, $idmemberbaru);
            } else {
                $sql .= ",id_member = ?";
                array_push($array, $member);
            }
            if (isset($promo)) {
                $sql .= ",id_promo = ?";
                array_push($array, $promo[0]['id_promo']);
            }
            $sql .= " WHERE id = ?";
            array_push($array, $idnota);
            //  print_r($sql);exit();
            $this->db->query($sql, $array);
            $this->db->trans_complete();
            return 1;
        } else {
            return $hasil;
        }
    }

    function Get_all_order() {
        $this->db->select('notajual.*, member.id as idmember, member.nama as namamember, member.poin as poinmember, member.deposit as depositmember, member.statusaktif as memberstatusaktif, promo.nama as namapromo, admin.nama as namaadmin,'
                . ' b.nama as namakasir, c.nama as namaproduser');
        $this->db->from('notajual');
        $this->db->join('member', 'member.id=notajual.id_member', 'left');
        $this->db->join('admin', 'admin.id=notajual.id_admin', 'left');
        $this->db->join('admin b', 'b.id=notajual.id_kasir', 'left');
        $this->db->join('admin c', 'c.id=notajual.id_produser', 'left');
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
        $this->db->select('notajual.*, member.nama as namamember, member.statusaktif as statusaktifmember');
        $this->db->from('notajual');
        $this->db->join('member', 'member.id=notajual.id_member', "left");
//        $this->db->join('promo','promo.id=notajual.id_promo');
        //$this->db->where('notajual.id_cabang', $this->session->userdata['xcellent_cabang']);
        $this->db->where('notajual.id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function Get_order_product_to_edit($id) {
        $this->db->select('notajual_produk.*, produk.nama as namaproduk');
        $this->db->from('notajual_produk');
        $this->db->join('produk', 'notajual_produk.id_produk=produk.id');
        //$this->db->join('material', 'notajual_produk.id_produk=produk.id');
//        $this->db->join('promo','promo.id=notajual.id_promo');
        //$this->db->where('notajual.id_cabang', $this->session->userdata['xcellent_cabang']);
        $this->db->where('notajual_produk.id_notajual', $id);
        $query = $this->db->get();
        $hasil = $query->result();
        //print_r($hasil);exit();
        $hasil2 = [];
        $count = 0;
        foreach ($hasil as $item) {
            $sql2 = "select count(*) jumlah "
                    . "from material "
                    . "join produk_material on produk_material.id_material = material.id "
                    . "join produk on produk.id = produk_material.id_produk "
                    . "where material.tipe = 1 and produk.id= ? ";
            $result2 = $this->db->query($sql2, array($item->id_produk));
            $result = $result2->row();

            if ($result->jumlah == 0) {
                // $hasil2["tipe"] = 2; 
                // array_push($hasil, 2);
                $hasil[$count]->tipe = 2;
            } else if ($result->jumlah == 1) {
                // $hasil2["tipe"] = 1;
                $hasil[$count]->tipe = 1;
            }
            $count++;
            // array_push($hasil, $hasil2);
        }
        //print_r($hasil);exit();
        return($hasil);
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
    
    function Check_pin($pin, $idmember) {

        $this->db->select("salt,statusaktif,password");

        $this->db->from('member');
        $this->db->where('id', $idmember);
        $query = $this->db->get();

        //cek status aktif baru ambil datanya.
        if ($query->row() != null) {
            if ($query->row()->statusaktif == 1) {
                $ambilgaram = $query->row();
            }
        }

        if (isset($ambilgaram)) {
            $passwordasli = $ambilgaram->password;
            $garam = $ambilgaram->salt;
            $password = md5($pin);
            $password = $password . $garam;
            $password = md5($password);

            if($passwordasli == $password)
            {
                //kalau password benar
                 return 1;
                 

            }
            else
            {
               // kalau password salah
                return 0;
            }
            
           
        } else {
            //kalau tidak ada memberidnya
            return 0;
        }
    }

    function Make_payment($id, $grandtotal, $idpayment, $amount, $idmember) {

        $this->db->trans_start();
        //cek apakah ada registrasi member
        $sql = "SELECT nj.* FROM notajual_produk np, notajual nj
                WHERE np.id_notajual = ? AND np.id_produk = ? AND nj.id = np.id_notajual";
        $result1 = $this->db->query($sql, array($id, 0));
        $hasil = $result1->row_array();
        if (count($hasil) > 0) {
            $this->M_member->Activate_member($hasil['id_member']);
        }

        //,masukan poin. KALAU TIDAK ADA DEPOSIT  dan SUDAH MEMBER
//        $sql2 = "SELECT nj.* FROM notajual_produk np, notajual nj
//                WHERE np.id_notajual = ? AND (np.id_produk = ? or np.id_produk= ?) AND  nj.id = np.id_notajual";

        $sql2 = "SELECT sum(notajual_produk.subtotal) as grandtotalyangdihitung from notajual_produk where id_notajual= ? and id_produk!=? and id_produk!=?";
        $result2 = $this->db->query($sql2, array($id, 1, 0));
        $grandtotalyangdihitung = $result2->row()->grandtotalyangdihitung;
        //  print_r($grandtotalyangdihitung);exit();
        if (isset($grandtotalyangdihitung) && $idmember != 0) {
            $point = $this->M_member->Add_point($idmember, $grandtotalyangdihitung);
        } else {
            //  print_r("yes");exit();
            // $point = $this->M_member->Add_point($idmember, $grandtotalyangdihitung);
        }

        //update status
        $data = array('status' => 1, 'id_kasir' => $this->session->userdata['xcellent_id']);
        $this->db->where('id', $id);
        $this->db->update('notajual', $data);


        $this->db->select('status');
        $this->db->from('notajual');
        $this->db->where('id', $id);
        $query = $this->db->get();
        //print_r($query->row()->status);exit();
        //masukan ke notajual_pembayaran
        //print_r($amount);exit(); 

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
            if ($idpayment[$f] == 0) {
                $this->M_member->Reduce_deposit($amount[$f], $idmember);
            }
        }

        //update kasir
        //masukan ke cashflow
        $this->M_cashflow->Add_cashflow("Order Payment", 1, "Order Note " . $id, $grandtotal);

        $this->db->trans_complete();

        if ($this->db->trans_status() === true) {
            return 1;
        } else {
            return 0;
        }
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

        //print_r($deskripsi);exit();
        //update residu
        for ($f = 0; $f < count($iddetailmaterial); $f++) {
            if ($iddetailmaterial != "") {
                $data = array(
                    'deskripsi_residual' => $deskripsi[$f]
                );
                $this->db->where('id_detailmaterial', $iddetailmaterial[$f]);
                $this->db->where('id_notajualproduk', $idnotajualproduk[$f]);
                $this->db->update('used_material_temp', $data);
            }
        }

        $this->db->trans_complete();
    }

    function Get_printByIdNota($id_notajual) {
        $this->db->trans_start();

        $this->db->select('notajual.*, member.id as idmember, member.nama as nama_member, member.deposit as deposit_member, member.poin as poin_member, promo.nama as namapromo, admin.nama as namaadmin,'
                . ' b.nama as nama_admin, c.nama as namaproduser'
                . '');
        $this->db->from('notajual');
        $this->db->join('member', 'member.id=notajual.id_member', 'left');
        $this->db->join('admin', 'admin.id=notajual.id_admin', 'left');
        $this->db->join('admin b', 'b.id=notajual.id_kasir', 'left');
        $this->db->join('admin c', 'c.id=notajual.id_produser', 'left');
        $this->db->join('promo', 'promo.id=notajual.id_promo', 'left');
        $this->db->where('notajual.id', $id_notajual);

        $query = $this->db->get();
        $nota = $query->result_array();
        // print_r($nota); exit();
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
        $sql = "SELECT np.* , p.nama as nama_pembayaran
                FROM notajual_pembayaran np 
                join pembayaran p on p.id = np.id_pembayaran 
                WHERE np.id_notajual = ?";
        $result = $this->db->query($sql, array($id_notajual));
        $hasil = $result->result_array();
        return $hasil;
    }

    function AddDepositToNota($deposit, $idmember) {
        $this->db->trans_start();

        //input order note
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'id_admin' => $this->session->userdata['xcellent_id'],
            'id_member' => $idmember,
            'tanggal' => date('Y-m-d H:i:s'),
            'grandtotal' => $deposit,
            'totaldiskon' => 0,
            'id_promo' => 0,
            'id_cabang  ' => $this->session->userdata['xcellent_cabang'],
            'createdat' => date('Y-m-d H:i:s'),
            'updatedat' => date('Y-m-d H:i:s')
        );
        $this->db->insert('notajual', $data);
        $order_id = $this->db->insert_id();


        $data = array(
            'id_notajual' => $order_id,
            'id_produk' => 0,
            'jumlah' => 1,
            'diskon' => 0,
            'harga' => $deposit,
            'hargapokok  ' => $deposit + ($deposit * $bonusdeposit / 100),
            'subtotal  ' => $deposit * 0.9,
            'createdat' => date('Y-m-d H:i:s'),
            'updatedat' => date('Y-m-d H:i:s')
        );
        $this->db->insert('notajual_produk', $data);




        $this->db->trans_complete();
    }

    function AddMemberToNota($id, $idmember, $deposit, $bonusdeposit) {
        $this->db->trans_start();
        $sql = "SELECT * FROM member WHERE id = ?";
        $result = $this->db->query($sql, array($idmember));
        $hasil = $result->row_array();
        // print_r($hasil);exit();
        if (count($hasil) > 0) {
            $data = array(
                'id_notajual' => $id,
                'id_produk' => 0,
                'jumlah' => 1,
                'long' => 1,
                'diskon' => 0,
                'harga' => $deposit,
                'deskripsi' => 'ID: ' . $idmember,
                'hargapokok  ' => $deposit + ($deposit * $bonusdeposit / 100),
                'subtotal  ' => $deposit,
                'createdat' => date('Y-m-d H:i:s'),
                'updatedat' => date('Y-m-d H:i:s')
            );
            $this->db->insert('notajual_produk', $data);
            //  print_r($idmember);exit();
            //udpate to notajual
            $sql2 = "UPDATE notajual SET id_member = ?, grandtotal = grandtotal + ? WHERE id = ?";
            $this->db->query($sql2, array($idmember, $deposit, $id));
        }

        $this->db->trans_complete();
    }

    function Set_member_in_nota($id, $idmember) {
        $this->db->trans_start();
        //udpate to notajual
        $sql2 = "UPDATE notajual SET id_member = ?";
        $this->db->query($sql2, array($idmember));

        $this->db->trans_complete();
    }

    function Add_deposit_to_note($deposit, $idmember, $idpayment, $amount, $bonusdeposit) {
        $this->db->trans_start();

        //input order note
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'id_admin' => $this->session->userdata['xcellent_id'],
            'id_member' => $idmember,
            'tanggal' => date('Y-m-d H:i:s'),
            'grandtotal' => $deposit,
            'totaldiskon' => $deposit,
            'id_promo' => "0",
            'id_cabang  ' => $this->session->userdata['xcellent_cabang'],
            'createdat' => date('Y-m-d H:i:s'),
            'updatedat' => date('Y-m-d H:i:s')
        );
        $this->db->insert('notajual', $data);
        $order_id = $this->db->insert_id();


        //input to notajual_produk
        $data = array(
            'id_notajual' => $order_id,
            'id_produk' => 1,
            'jumlah' => 1,
            'long' => 1,
            'diskon' => 0,
            'harga' => $deposit,
            'hargapokok  ' => $deposit + ($deposit * $bonusdeposit / 100),
            'subtotal  ' => $deposit,
            'createdat' => date('Y-m-d H:i:s'),
            'updatedat' => date('Y-m-d H:i:s')
        );
        $this->db->insert('notajual_produk', $data);
        $id_notajualproduk = $this->db->insert_id();

        $this->M_member->Add_deposit($deposit + ($deposit * $bonusdeposit / 100), $idmember);
        $this->Make_payment($order_id, $deposit, $idpayment, $amount, $idmember);

        $this->db->trans_complete();
    }

    function DeleteOrder($id, $dari) {
        $this->db->trans_start();
        $sql = "SELECT umt.*
        FROM notajual_produk nj, used_material_temp umt, detailmaterial dm
        WHERE nj.id_notajual = ? AND nj.id = umt.id_notajualproduk AND dm.id=umt.id_detailmaterial";
        $hasil = $this->db->query($sql, array($id));
        $barangs = $hasil->result_array();
//print_r(($barangs));exit();
        if (count($barangs) > 0) {
            //Tambah Material stok dlu
            for ($i = 0; $i < count($barangs); $i++) {
                //print_r($barangs[$i]['jumlah']);exit();
                $this->M_material->Update_detailMaterialStok($barangs[$i]['id_detailmaterial'], $barangs[$i]['jumlah']);
            }

            //delete di used_material_temp
            for ($i = 0; $i < count($barangs); $i++) {
                $this->DeleteTempMaterial($barangs[$i]['id_notajualproduk'], $barangs[$i]['id_detailmaterial']);
            }
        }



        if ($dari == "delete") {
            $this->DeleteNotaJualProduk($id);
            $this->DeleteNotaJual($id);
        } else if ($dari == "edit") {
            $this->DeleteNotaJualProduk_edit($id);
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

        //cari apakah ada pendaftaran member
        $this->db->select('id_produk,deskripsi');
        $this->db->from('notajual_produk');
        $this->db->where('id_notajual', $id_notajual);
        $this->db->where('id_produk', 0);
        $query = $this->db->get();
        $row = $query->row();
        if (isset($row)) {
            $deskripsi = (string) $row->deskripsi;
            //print_r(strlen($deskripsi));exit();
            $memberid_dihapus = substr($deskripsi, 4, strlen($deskripsi));
            //print_r($memberid_dihapus);exit();
            $sql = "DELETE FROM member WHERE id = ?";
            $this->db->query($sql, array($memberid_dihapus));
        }


        $sql = "DELETE FROM notajual_produk WHERE id_notajual = ?";
        $this->db->query($sql, array($id_notajual));

        $this->db->trans_complete();
    }

    function DeleteNotaJualProduk_edit($id_notajual) {
        $this->db->trans_start();

        $sql = "DELETE FROM notajual_produk WHERE id_notajual = ? and id_produk!=0";
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

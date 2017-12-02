<?php

class M_order extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
        $this->load->model('M_cashflow');
        $this->load->model('M_material');
        $this->load->model('M_product');
    }

    function Add_order_note($datas, $products, $member, $grandtotal, $promo, $totaldiskon, $deskripsi) {

        $this->db->trans_start();

        //input order note
        date_default_timezone_set('Asia/Jakarta');
        $data = array(
            'id_admin' => $this->session->userdata['xcellent_id'],
            'id_member' => $member,
            'tanggal' => date('Y-m-d H:i:s'),
            'grandtotal' => $grandtotal,
            'totaldiskon' => $totaldiskon,
            'deskripsi' => $deskripsi,
            'id_promo' => $promo[0]['id_promo'],
            'id_cabang  ' => $this->session->userdata['xcellent_cabang'],
            'createdat' => date('Y-m-d H:i:s'),
            'updatedat' => date('Y-m-d H:i:s')
        );
        $this->db->insert('notajual', $data);
        $order_id = $this->db->insert_id();

        //input ordernote_product
        for ($x = 0; $x < count($products); $x++) {

            $detailmaterial = $this->M_material->Json_get_detail_material_array($products[$x]['id']);
            //  print_r($detailmaterial);            exit();
            $produk_material = $this->M_product->Json_get_material_array($products[$x]['id']);
// print_r($produk_material);            exit();
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

                            if ($detailmaterial[$b]['stok'] >= $produk_material[$a]['jumlahmaterial']) {
                                $detailmaterial[$b]['stok'] = $detailmaterial[$b]['stok'] - $produk_material[$a]['jumlahmaterial'];

                                $tampung[$countertampung]['id'] = $detailmaterial[$b]['id'];
                                $tampung[$countertampung]['stok'] = $produk_material[$a]['jumlahmaterial'];
                                $tampung[$countertampung]['idproduk'] = $products[$x]['id'];

                                $neededtipe1[$a] --;
                                $countertampung++;
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
                    $namaproduktidakcukup = $produk_material[$m]['namaproduk'];
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
                }


                // print_r($tampung);
                // exit();
            }
        }











        $this->db->trans_complete();
        return 1;
    }

    function Edit_order_note($idnota, $products, $member, $grandtotal, $promo, $totaldiskon) {
        $this->db->trans_start();

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
                $needed[$a] = ($products[$x]['jumlah'] - $products[$x]['jumlah2']) * $produk_material[$a]['jumlahmaterial'];

                $neededtipe1[$a] = ($products[$x]['jumlah'] - $products[$x]['jumlah2']);
                if ($needed[$a] > 0) {

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

                                if ($detailmaterial[$b]['stok'] >= $produk_material[$a]['jumlahmaterial']) {
                                    $detailmaterial[$b]['stok'] = $detailmaterial[$b]['stok'] - $produk_material[$a]['jumlahmaterial'];

                                    $tampung[$countertampung]['id'] = $detailmaterial[$b]['id'];
                                    $tampung[$countertampung]['stok'] = $produk_material[$a]['jumlahmaterial'];
                                    $tampung[$countertampung]['idproduk'] = $products[$x]['id'];

                                    $neededtipe1[$a] --;
                                    $countertampung++;
                                }
                            }
                        }
                    }
                } else if ($needed[$a] < 0) {
                    
                } else if ($needed[$a] == 0) {
                    
                }
            }
            // print_r($needed);                exit();
            $bolehtambah = 1;
            $namaproduktidakcukup = "";
            for ($m = 0; $m < count($needed); $m++) {
                if ($needed[$m] > 0) {
                    $bolehtambah = 0;
                    $namaproduktidakcukup = $produk_material[$m]['namaproduk'];

                    //  exit();
                    break;
                }
            }
            for ($n = 0; $n < count($neededtipe1); $n++) {
                if ($neededtipe1[$n] > 0) {

                    $bolehtambah = 0;
                    $namaproduktidakcukup = $produk_material[$m]['namaproduk'];
                    // print_r("Materials for product ".$namaproduktidakcukup." are not enough.");
                    //print_r("needed1 ada yang isi");
                    // exit();
                    break;
                }
            }

            if ($bolehtambah == 0) {

                $this->db->trans_rollback();
                return 0;
            } else if ($bolehtambah == 1) {

                //udpate to notajual

                $data = array(
                    'grandtotal' => $grandtotal,
                    'totaldiskon' => $totaldiskon
                );

                $this->db->where('id', $idnota);
                $this->db->update('notajual', $data);
                // $updated_status = $this->db->affected_rows();
                //    update to notajual_produk

                $data = array(
                    'jumlah' => $products[$x]['jumlah'],
                    'harga' => $products[$x]['harga'],
                    'subtotal  ' => $products[$x]['subtotal'],
                    'deskripsi  ' => $products[$x]['deskripsi']
                );
                $this->db->where('id_notajual', $idnota);
                $this->db->where('id_produk', $products[$x]['id']);
                $this->db->where('id', $products[$x]['idnotajualproduk']);
                $this->db->update('notajual_produk', $data);


                //ambil used_material_temp denan idnotajualproduk tertentu
                $this->db->select('*');
                $this->db->from('used_material_temp');
                $this->db->where('id_notajualproduk', $products[$x]['idnotajualproduk']);
                $this->db->order_by('id_detailmaterial');

                $query = $this->db->get();
                $used_temp = $query->result_array();


                if ($products[$x]['jumlah'] > $products[$x]['jumlah2']) {



                    for ($t = 0; $t < count($tampung); $t++) {

                        //kurangi detailmaterial
                        $this->db->set('stok', 'stok-' . $tampung[$t]['stok'], FALSE);
                        $this->db->where('id', $tampung[$t]['id']);
                        $this->db->update('detailmaterial');


                        $apakahtampungada = 0;
                        //update used_material_tempt
                        for ($u = 0; $u < count($used_temp); $u++) {
                            if ($tampung[$t]['id'] == $used_temp[$u]['id_detailmaterial']) {
                                // print_r($tampung[$t]['id']."yes".$products[$x]['idnotajualproduk']);exit();

                                $this->db->set('jumlah', 'jumlah+' . $tampung[$t]['stok'], FALSE);
                                $this->db->where('id_notajualproduk', $products[$x]['idnotajualproduk']);
                                $this->db->where('id_detailmaterial', $tampung[$t]['id']);
                                $this->db->update('used_material_temp');
                                //   print_r($this->db->affected_rows());exit();
                                $apakahtampungada = 1;

                                // break;
                            }
                        }

                        //print_r($apakahtampungada);exit();
                        if ($apakahtampungada == 0) {
                            $data = array(
                                'id_notajualproduk' => $products[$x]['idnotajualproduk'],
                                'id_detailmaterial' => $tampung[$t]['id'],
                                'jumlah' => $tampung[$t]['stok']
                            );
                            $this->db->insert('used_material_temp', $data);
                        }
//                         return $this->db->error();
                    }
                } else if ($products[$x]['jumlah'] < $products[$x]['jumlah2']) {
                    $selisih = $products[$x]['jumlah2'] - $products[$x]['jumlah'];
                    //tambahkan detial material
                    for ($u = 0; $u < count($used_temp); $u++) {
                        $this->db->set('stok', 'stok+' . $selisih, FALSE);
                        $this->db->where('id', $used_temp[$u]['id_detailmaterial']);
                        $this->db->update('detailmaterial');

                        $this->db->set('jumlah', 'jumlah-' . $selisih, FALSE);
                        $this->db->where('id_notajualproduk', $used_temp[$u]['id_notajualproduk']);
                        $this->db->update('used_material_temp');
                    }

                    //update used_material_temp
                }
            }


            // print_r($tampung);
            // exit();
        }

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
        $this->db->join('promo', 'promo.id=notajual.id_promo');
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

    function Make_payment($id, $grandtotal) {
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
        $this->M_cashflow->Add_cashflow("Order Payment", 1, "Order Note " . $id, $grandtotal);

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

    function Get_printByIdNota($id_notajual) {
        $this->db->trans_start();
        $sql = "SELECT nj.*, a.nama as nama_admin, m.nama as nama_member
                FROM notajual nj, admin a, member m
                WHERE nj.id = ? AND nj.id_admin = a.id AND nj.id_member = m.id";
        $result = $this->db->query($sql, array($id_notajual));

        $nota = $result->row_array();
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

}

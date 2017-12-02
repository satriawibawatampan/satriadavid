<?php

class M_product extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
        $this->load->model('M_harga');
    }

    function Add_product_real($category, $name, $materialid, $materialquantity, $minqty, $maxqty, $price) {
        $this->db->trans_start();
        date_default_timezone_set('Asia/Jakarta');

        $date = date('Y-m-d H:i:s');
        $data = array(
            'nama' => $name,
            'statusaktif' => 1,
            'id_kategori' => $category,
            'createdAt' => $date,
            'updatedAt' => $date
        );

        $this->db->insert('produk', $data);
        $insert_id = $this->db->insert_id();

        for ($x = 0; $x < count($materialid); $x++) {
            $data = array(
                'id_produk' => $insert_id,
                'id_material' => $materialid[$x],
                'jumlah' => $materialquantity[$x],
                'createdAt' => $date,
                'updatedAt' => $date
            );
            $this->db->insert('produk_material', $data);
        }

        $this->M_harga->Add_harga($insert_id, $price, $minqty, $maxqty);

        $this->db->trans_complete();
    }

    function Add_product($name, $idmaterial) {
        date_default_timezone_set('Asia/Jakarta');

        $date = date('Y-m-d H:i:s');
        $data = array(
            'nama' => $name,
            'statusaktif' => 1,
            'id_kategori' => 1,
            'id_cabang' => $this->session->userdata['xcellent_cabang'],
            'createdAt' => $date,
            'updatedAt' => $date
        );

        $this->db->insert('produk', $data);
        $insert_id = $this->db->insert_id();

        $data2 = array(
            'id_produk' => $insert_id,
            'id_material' => $idmaterial,
            'jumlah' => 1,
            'createdAt' => $date,
            'updatedAt' => $date
        );
        $this->db->insert('produk_material', $data2);

        return $insert_id;
    }

    function Get_all_product() {


        $this->db->select('produk.*,harga.hargajual as hargajual, kategori.nama as namakategori');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id = produk.id_kategori');
        $this->db->join('harga', 'harga.id_produk = produk.id');
        $this->db->where('produk.id_cabang', $this->session->userdata['xcellent_cabang']);
        $this->db->where('harga.batasbawah', 1);
        $query = $this->db->get();
        return $query->result();

        //   $query = "SELECT p.*, h.hargajual as hargajual , k.nama as namakategori FROM produk p join harga h on p.id = h.id_produk join kategori k on k.id = p.id_kategori WHERE h.batasbawah = 1 and p.id_cabang=". $this->session->userdata['xcellent_cabang'];
    }

    function Get_all_product_where_category($idkategori) {
        $this->db->select('produk.*');
        $this->db->from('produk');
        $this->db->where('produk.id_kategori', $idkategori);
        $this->db->where('produk.id_cabang', $this->session->userdata['xcellent_cabang']);
        $query = $this->db->get();
        return $query->result();
    }

    function Get_one_product($id) {
        $this->db->select('produk.*');
        $this->db->from('produk');

        $this->db->where('produk.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function Get_product_material($idproduk) {
        $this->db->select('produk_material.*, material.nama as namamaterial');
        $this->db->from('produk_material');
        $this->db->join('material', 'material.id = produk_material.id_material');
        $this->db->where('produk_material.id_produk', $idproduk);
        $query = $this->db->get();
        return $query->result();
    }

    function Json_get_product_price($id) {
        $this->db->select("*");
        $this->db->from("harga");
        $this->db->where("statusaktif", 1);
        $this->db->where("id_produk", $id);

        $query = $this->db->get();
        return $query->result();
    }

    public function get_allProductAndListHarga() {

        $sql = "SELECT p.*
                    FROM produk p";

        $result = $this->db->query($sql);
        $products = $result->result_array();
        $products2 = [];
        foreach ($products as $product) {
            $sql2 = "SELECT h.* FROM harga h WHERE h.id_product = ?";
            $result2 = $this->db->query($sql2, array($product['id']));
            $hargas = $result2->result_array();
            if (count($hargas) > 0) {
                $product["harga"] = $hargas;
            } else {
                $product["harga"] = [];
            }
            array_push($products2, $product);
        }

        return $products2;
    }

    public function get_all_produk_kategori() {

        $sql = "SELECT k.*
                    FROM kategori k";

        $result = $this->db->query($sql);
        $kategori = $result->result_array();
        $kategori2 = [];
        foreach ($kategori as $itemkategori) {
            $products = $this->get_productAndListHargaByKategori($itemkategori['id']);
            if (count($products) > 0) {
                $itemkategori["product"] = $products;
            } else {
                $itemkategori["product"] = [];
            }
            array_push($kategori2, $itemkategori);
        }
        //print_r($kategori2);        exit();

        return $kategori2;
    }

    public function get_productAndListHargaByKategori($id_kategori) {

        $sql = "SELECT p.*
                FROM produk p
				WHERE p.id_kategori = ?";

        $result = $this->db->query($sql, array($id_kategori));
        $products = $result->result_array();
        $products2 = [];
        foreach ($products as $product) {
            $sql2 = "SELECT h.* FROM harga h WHERE h.id_produk = ?";
            $result2 = $this->db->query($sql2, array($product['id']));
            $hargas = $result2->result_array();
            if (count($hargas) > 0) {
                $product["harga"] = $hargas;
            } else {
                $product["harga"] = [];
            }
            array_push($products2, $product);
        }

        return $products2;
    }

    public function Get_productNotaJualByIdNota($id_notajual){
        $sql = "SELECT np.*, p.nama as nama_produk 
                FROM notajual_produk np, produk p
                WHERE np.id_produk = p.id AND np.id_notajual = ?";
        $result = $this->db->query($sql, array($id_notajual));
        $hasil = $result->result_array();
        return $hasil;
    }

    function Json_get_material($id) {
        $this->db->select("material.nama as namamaterial, produk_material.id_material as idmaterial, produk_material.jumlah as jumlahmaterial ");
        $this->db->from("material");
        $this->db->join("produk_material", "produk_material.id_material = material.id");
        $this->db->join("produk", "produk_material.id_produk = produk.id");

        $this->db->where("produk_material.id_produk", $id);

        $query = $this->db->get();
        return $query->result();
    }
    function Json_get_material_array($id) {
        $this->db->select("material.nama as namamaterial, produk_material.id_material as idmaterial, produk_material.jumlah as jumlahmaterial , produk.nama as namaproduk ");
        $this->db->from("material");
        $this->db->join("produk_material", "produk_material.id_material = material.id");
        $this->db->join("produk", "produk_material.id_produk = produk.id");

        $this->db->where("produk_material.id_produk", $id);

        $query = $this->db->get();
        return $query->result_array();
    }

    function Edit_product($id, $name, $category, $materialqty, $materialid, $batasbawah, $batasatas, $harga) {
        $this->db->trans_start();
        date_default_timezone_set('Asia/Jakarta');

        //ambil createdat
        $this->db->select("createdat ");
        $this->db->from("produk");
        $this->db->where('id', $id);
        $createdat = $this->db->get()->row()->createdat;


        $date = date('Y-m-d H:i:s');
        $data = array(
            'nama' => $name,
            'statusaktif' => 1,
            'id_kategori' => $category,
        );
        $this->db->where('id', $id);
        $this->db->update('produk', $data);

        //update produk_material (hapus dan insert lagi material)
        $this->db->where('id_produk', $id);
        $this->db->delete('produk_material');
        // print_r(count($materialid));exit();
        for ($x = 0; $x < count($materialid); $x++) {
            $data2 = array(
                'id_produk' => $id,
                'id_material' => $materialid[$x],
                'jumlah' => $materialqty[$x],
                'createdAt' => $createdat,
            );
            $this->db->insert('produk_material', $data2);
        }

        //harga
        $this->db->where('id_produk', $id);
        $this->db->delete('harga');
        $this->M_harga->Add_harga($id, $harga, $batasbawah, $batasatas);


        $this->db->trans_complete();
    }

}

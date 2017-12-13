<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start();
class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        ;
        if (isset($this->session->userdata['xcellent_id'])) {


            $this->load->model('M_admin');
            $this->load->model('M_material');
            $this->load->model('M_product');
            $this->load->model('M_kategori');
            $this->load->model('M_harga');
            $this->load->model('M_member');
            $this->load->model('M_promo');
            $this->load->model('M_order');
            $this->load->model('M_payment');



            $this->load->helper(array('form', 'url', 'string', 'date'));
            $this->load->library('form_validation');
        } else {
            redirect('Back/Account/Show_login');
        }
    }

    public function index() {

        $navigation = array(
            "menu" => "order",
            "submenu" => "add",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_add_order_back');
        $this->load->view('back/v_footer_back');
        //  $this->load->view('back/v_blank');
        //  
//       
    }

    public function Prints($id_nota) {
        $nota = $this->M_order->Get_printByIdNota($id_nota);
        $data = array(
            "nota" => $nota
        );
        if (count($nota) > 0) {
            $this->load->view('back/v_print', $data);
        } else {
            $navigation = array(
                "menu" => "order",
                "submenu" => "all",
                "stokhabis" => $this->M_material->Get_material_out_of_stock()
            );
            $this->load->view('back/v_head_admin_back');
            $this->load->view('back/v_header_back');
            $this->load->view('back/v_navigation_back', $navigation);
            $this->load->view('back/v_printNoData');
            $this->load->view('back/v_footer_back');
        }
    }

    public function Show_add_order_note() {
        $data['listkategori'] = $this->M_product->get_all_produk_kategori();

        $data['listmember'] = $this->M_member->Show_all_member_active();
        $data['listpromo'] = $this->M_promo->Get_promo_product_now();

//   
        $navigation = array(
            "menu" => "order",
            "submenu" => "add",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );

//          print_r($navigation);   exit();
//          print_r($data['listkategori']);   exit();
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_add_order_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Show_edit_order($id) {
        $data['listkategori'] = $this->M_product->get_all_produk_kategori();
        $data['listmember'] = $this->M_member->Show_all_member_active();
        $data['listpromo'] = $this->M_promo->Get_promo_product_now();
        $data['dataorder'] = $this->M_order->Get_one_order($id);
        $data['listorderproduk'] = $this->M_order->Get_order_product($id);
        // print_r( $data['listorderproduk']); exit();

        $navigation = array(
            "menu" => "order",
            "submenu" => "all","stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_edit_order_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Show_all_order_note() {
        $data['tableorder'] = $this->M_order->Get_all_order();
        $data['listpaymentmethod']= $this->M_payment->Get_all_payment();
        $navigation = array(
            "menu" => "order",
            "submenu" => "all",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_all_order_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Add_order_note() {
        $data = $this->input->post("data");
        $products = $this->input->post("product");
        $member = $this->input->post("member");
        $grandtotal = $this->input->post("grandtotal");
        $promo = $this->input->post("promo");
        $totaldiskon = $this->input->post("totaldiskon");
        $deskripsi = $this->input->post("deskripsi");

        // echo $products[0]['harga']; exit();

        $bolehtambah = $this->M_order->Add_order_note($data, $products, $member, $grandtotal, $promo, $totaldiskon, $deskripsi);

        echo json_encode($bolehtambah);
    }

    public function Edit_order_note() {
        //$data = $this->input->post("data");
        $id = $this->input->post("idorderan");
        $products = $this->input->post("product");
        $member = $this->input->post("member");
        $grandtotal = $this->input->post("grandtotal");
        $promo = $this->input->post("promo");
        $totaldiskon = $this->input->post("totaldiskon");

        // echo $products[0]['harga']; exit();

        $bolehtambah = $this->M_order->Edit_order_note($id, $products, $member, $grandtotal, $promo, $totaldiskon);

        echo json_encode($bolehtambah);
    }

    public function Json_get_order_product($id) {
        $data = $this->M_order->Get_order_product($id);
        echo json_encode($data);
    }

    public function Json_get_product_by_category($id) {
        $data = $this->M_product->Get_all_product_where_category($id);
        echo json_encode($data);
    }

    public function Json_get_material($id) {
        $data = $this->M_product->Json_get_material($id);
        echo json_encode($data);
    }

   

    public function Edit_product() {

        if ($this->input->post('button_editproduct')) {
            $id = $this->input->post('name_editidproduct');
            $name = $this->input->post('name_editname');
            $category = $this->input->post('name_editcategory');

            $materialqty = $this->input->post('name_txt_jumlah');
            $materialid = $this->input->post('name_txt_idmaterial');
            $batasbawah = $this->input->post('name_qty_min');
            $batasatas = $this->input->post('name_qty_max');
            $harga = $this->input->post('name_price');


            $this->M_product->Edit_product($id, $name, $category, $materialqty, $materialid, $batasbawah, $batasatas, $harga);
            $this->session->set_flashdata('pesanform', "Your Product, " . $name . " , has been edited");
            $this->session->keep_flashdata('pesanform');


            redirect('Back/Product/Show_edit_product/' . $id);
        }
    }

    public function Make_payment() {
        if ($this->input->post('button_payment')) {
            $id = $this->input->post('name_paymentid');
            $grandtotal = $this->input->post('name_grandtotal');
            $idpayment = $this->input->post('name_txt_id_paymentmethod');
            $amount=$this->input->post('name_txt_id_paymentamount');

            $this->M_order->Make_payment($id, $grandtotal,$idpayment,$amount);
            $this->session->set_flashdata('pesanform', "Your Order Note, " . $id . " , has been paid");
            $this->session->keep_flashdata('pesanform');
            redirect('Back/Order/Show_all_order_note/');
        }
    }

    public function Run_producing() {
        if ($this->input->post('button_producing')) {
            $id = $this->input->post('name_producingid');

            $this->M_order->Run_producing($id);
            $this->session->set_flashdata('pesanform', "Your Order Note, " . $id . " , is being ran.");
            $this->session->keep_flashdata('pesanform');
            redirect('Back/Order/Show_all_order_note/');
        }
    }

    public function Set_finish() {
        
        
        if ($this->input->post('button_finish')) {
            $id = $this->input->post('name_finishid');
            $deskripsi =  $this->input->post('name_txt_residu_deskripsi');
            $iddetailmaterial =  $this->input->post('name_txt_residu_iddetailmaterial');
            $idnotajualproduk =  $this->input->post('name_txt_residu_idnotajualproduk');

            $this->M_order->Set_finish($id,$deskripsi,$iddetailmaterial,$idnotajualproduk);
             $this->session->set_flashdata('pesanform', "Your Order Note, " . $id . " , has been finished");
            $this->session->keep_flashdata('pesanform');
            redirect('Back/Order/Show_all_order_note/');
        }
    }

    public function AddMemberToNota(){
        $id =$this->input->post("id");
        $idMember =$this->input->post("idMember");

        $this->M_order->AddMemberToNota($id, $idMember);
    }

}

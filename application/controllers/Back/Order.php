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



            $this->load->helper(array('form', 'url', 'string', 'date'));
            $this->load->library('form_validation');
        } else {
            redirect('Back/Account/Show_login');
        }
    }

    public function index() {


        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back');
        $this->load->view('back/v_add_order_back');
        $this->load->view('back/v_footer_back');
        //  $this->load->view('back/v_blank');
        //  
//       
    }

    public function Show_add_order_note() {
        $data['listkategori'] = $this->M_product->get_all_produk_kategori();
     
        $data['listmember']= $this->M_member->Show_all_member();
        $data['listpromo']= $this->M_promo->Get_promo_product_now();
      //  print_r($data['listpromo']);   exit();
//   
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back');
        $this->load->view('back/v_add_order_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Show_edit_order($id) {
        $data['listkategori'] = $this->M_product->get_all_produk_kategori();
         $data['listmember']= $this->M_member->Show_all_member();
         $data['listpromo']= $this->M_promo->Get_promo_product_now();
        $data['dataorder'] = $this->M_order->Get_one_order($id);
        $data['listorderproduk']=$this->M_order->Get_order_product($id);
           // print_r( $data['listorderproduk']); exit();
       
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back');
        $this->load->view('back/v_edit_order_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Show_all_order_note() {
        $data['tableorder'] = $this->M_order->Get_all_order();
        
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back');
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
         
        // echo $products[0]['harga']; exit();
     
        $this->M_order->Add_order_note($data,$products,$member,$grandtotal,$promo,$totaldiskon);
    }

    public function Json_get_product_by_category($id) {
        $data = $this->M_product->Get_all_product_where_category($id);
        echo json_encode($data);
    }

    public function Json_get_material($id) {
        $data = $this->M_product->Json_get_material($id);
        echo json_encode($data);
    }

    public function Delete_material() {

        if ($this->input->post('button_deletemember')) {
            $id = $this->input->post('name_deleteid');
            $name = $this->input->post('name_deletename');

            $this->M_member->delete_member($id);
            $this->session->set_flashdata('pesanform', "Your member, " . $name . " , has been deleted");
            $this->session->keep_flashdata('pesanform');


            redirect('Back/Member/Show_all_member');
        }
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

}

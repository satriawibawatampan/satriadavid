<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start();
class Promo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        ;
        if (isset($this->session->userdata['xcellent_id'])) {


            $this->load->model('M_promo');
            $this->load->model('M_product');




            $this->load->helper(array('form', 'url', 'string', 'date'));
            $this->load->library('form_validation');
        } else {
            redirect('Back/Account/Show_login');
        }
    }

    public function index() {
        $data['listproduct'] = $this->M_product->Get_all_product();
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back');
        $this->load->view('back/v_add_promo_back', $data);
        $this->load->view('back/v_footer_back');
        //  $this->load->view('back/v_blank');
        //  
//       
    }

    public function Show_add_promo() {
        $data['listproduct'] = $this->M_product->Get_all_product();

        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back');
        $this->load->view('back/v_add_promo_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Show_edit_promo($id) {
        $data['listproduct'] = $this->M_product->Get_all_product();
        $data['datapromo'] = $this->M_promo->Get_one_promo($id);
        $data['datapromoproduct'] = $this->M_promo->Get_promo_product($id);
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back');
        $this->load->view('back/v_edit_promo_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Show_all_promo() {
        $data['tablepromo'] = $this->M_promo->Get_all_promo();
        // $data['tableprice'] = $this->M_product->Get_price();
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back');
        $this->load->view('back/v_all_promo_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Add_Promo() {
        if ($this->input->post('button_addpromo')) {


            $name = $this->input->post('name_name');
            $start = $this->input->post('name_start');
            $end = $this->input->post('name_end');
            $product = $this->input->post('name_txt_id_product');
            $discount = $this->input->post('name_txt_discount');

            $this->M_promo->Add_promo($name, $start, $end, $product, $discount);
            $this->session->set_flashdata('pesanform', "New Promo has been added");
            $this->session->keep_flashdata('pesanform');

            redirect('Back/Promo/Show_add_promo');
        } else {
//            print_r('b');
//            exit();
            redirect('Back/Promo/Show_add_promo');
        }
    }

    public function Check_for_register_promo() {
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $promo = $this->M_promo->Get_all_promo();
        $bolehtambahpromo = [];
        $bolehtambahpromo[0]=array('kode' => 1,'nama'=>'');
        foreach($promo as $item)
        {
            if(($start >= $item->awal && $start<= $item->akhir) ||
                    ($end >= $item->awal && $end<= $item->akhir) ||
                    ($item->awal>=$start && $item->awal<=$end))
            {
                //array_push($bolehtambahpromo, array('kode' => 0,'nama'=>($item->nama)));
                $bolehtambahpromo[0]=array('kode' => 0,'nama'=>$item->nama);
                break;
            }
        }
       // print_r($bolehtambahpromo[0]);        exit();
        //$bolehtambahpromo = $this->M_promo->Check_for_register_promo($start, $end);
        echo json_encode($bolehtambahpromo);
    }

    public function Json_get_promo_product($id) {
        $data = $this->M_promo->Get_promo_product($id);
        echo json_encode($data);
    }

    public function Edit_promo() {

        if ($this->input->post('button_editpromo')) {
            $id = $this->input->post('name_editid');
            $name = $this->input->post('name_name');
            $start = $this->input->post('name_start');
            $end = $this->input->post('name_end');
            $product = $this->input->post('name_txt_id_product');
            $discount = $this->input->post('name_txt_discount');


            $this->M_promo->Edit_promo($id, $name, $start, $end, $product, $discount);
            $this->session->set_flashdata('pesanform', "Your Promo, " . $name . " , has been edited");
            $this->session->keep_flashdata('pesanform');


            redirect('Back/Promo/Show_edit_promo/' . $id);
        }
    }

}

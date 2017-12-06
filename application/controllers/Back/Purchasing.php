<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start();
class Purchasing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        ;
        if (isset($this->session->userdata['xcellent_id'])) {


            $this->load->model('M_admin');
            $this->load->model('M_purchasing');
            $this->load->model('M_material');
            $this->load->model('M_product');
            $this->load->model('M_supplier');



            $this->load->helper(array('form', 'url', 'string', 'date'));
            $this->load->library('form_validation');
        } else {
            redirect('Back/Account/Show_login');
        }
    }

    public function index() {


        $navigation=array(
            "menu" => "purchasing",
            "submenu" => "add",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_add_purchasing_note_back');
        $this->load->view('back/v_footer_back');
        //  $this->load->view('back/v_blank');
        //  
//       
    }

    public function Show_add_purchasing_note() {

        $data['listmaterial'] = $this->M_material->Get_all_material();
        $data['listsupplier'] = $this->M_supplier->Get_all_supplier();

        $navigation=array(
            "menu" => "purchasing",
            "submenu" => "add",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_add_purchasing_note_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Show_all_purchasing_note() {
        $data['tablepurchasingnote'] = $this->M_purchasing->Get_all_purchasing_note();
        // $data['listsupplier'] = $this->M_supplier->Get_all_supplier();

        $navigation=array(
            "menu" => "purchasing",
            "submenu" => "all",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_all_purchasing_note_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Show_detail_purchasing_note($id) {
        $data['tablepurchasingnote'] = $this->M_purchasing->Get_detail_purchasing_note($id);
        // $data['listsupplier'] = $this->M_supplier->Get_all_supplier();

        $navigation=array(
            "menu" => "purchasing",
            "submenu" => "all",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_detail_purchasing_note_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Show_print_one_purchasing_note($id) {
        $data['tablepurchasingnote'] = $this->M_purchasing->Get_detail_purchasing_note($id);
        // $data['listsupplier'] = $this->M_supplier->Get_all_supplier();
        $this->load->view('back/v_head_admin_back');
        // $this->load->view('back/v_header_back');
        //$this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_print_one_purchasing_note_back', $data);
        // $this->load->view('back/v_footer_back');
    }

    public function Show_edit_purchasing_note($id) {
        $data['listmaterial'] = $this->M_material->Get_all_material();
        $data['listsupplier'] = $this->M_supplier->Get_all_supplier();
        $data['datapurchasingnote'] = $this->M_purchasing->Get_detail_purchasing_note($id);

        $navigation=array(
            "menu" => "purchasing",
            "submenu" => "all",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_edit_purchasing_note_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Add_purchasing_note() {
        if ($this->input->post('button_addpurchasingnote')) {


            $idsupplier = $this->input->post('name_supplier');
            $idmaterial = $this->input->post('name_idmaterial');
            $buyingprice = $this->input->post('name_buyingprice');
            $qty = $this->input->post('name_quantity');
            $amountperpack = $this->input->post('name_amountperpack');
            $subtotal = $this->input->post('name_subtotal');
            $idbranch = $this->session->userdata['xcellent_cabang'];


            $this->M_purchasing->Add_purchasing_note($idsupplier, $idmaterial, $buyingprice, $qty, $subtotal, $idbranch, $amountperpack);


            $this->session->set_flashdata('pesanform', "New purchasing note has been added.");
            $this->session->keep_flashdata('pesanform');

            redirect('Back/Purchasing/Show_add_purchasing_note');
        }
    }

    public function Json_get_one_material($id) {
        $data = $this->M_material->Json_get_one_material($id);
        echo json_encode($data);
    }

    public function Json_get_detail_material($id) {
        $data = $this->M_material->Json_get_detail_material($id);
        echo json_encode($data);
    }

    

    public function Edit_purchasing_note() {

        if ($this->input->post('button_editpurchasingnote')) {
            $idnota = $this->input->post('name_editidnota');
            $supplier = $this->input->post('name_editsupplier');
            $idmaterial = $this->input->post('name_editmaterials');
            $idmaterialold = $this->input->post('name_editidmaterialold');
            $hpp = $this->input->post('name_editbuyingprice');
            $qty = $this->input->post('name_editquantity');
            $amountperpack = $this->input->post('name_editamountperpack');

            // print_r($id.$nama.$tipe.$hpp);
            // exit();

            $this->M_purchasing->Edit_purchasing_note($idnota, $supplier, $idmaterialold, $idmaterial, $hpp, $qty, $amountperpack);
            $this->session->set_flashdata('pesanform', "Your Purchase Note , Note " . $idnota . " , has been edited");
            $this->session->keep_flashdata('pesanform');


            redirect('Back/Purchasing/Show_edit_purchasing_note/' . $idnota);
        }
    }

    public function Pay_purchasing_note() {
        if ($this->input->post('button_paypurchasingnote')) {

            $idnota = $this->input->post('name_payid');
            $this->M_purchasing->Pay_purchasing_note($idnota);
            
             $this->session->set_flashdata('pesanform', "Your Purchase Note , Note " . $idnota . " , has been paid");
            $this->session->keep_flashdata('pesanform');


            redirect('Back/Purchasing/Show_all_purchasing_note');
        }
    }

}

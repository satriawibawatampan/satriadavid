<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start();
class Material extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //  header('Access-Control-Allow-Origin: *');
        $this->load->library('session');
        if (isset($this->session->userdata['xcellent_id'])) {


            $this->load->model('M_admin');
            $this->load->model('M_material');
            $this->load->model('M_product');



            $this->load->helper(array('form', 'url', 'string', 'date'));
            $this->load->library('form_validation');
        } else {
            redirect('Back/Account/Show_login');
        }
    }

    public function index() {

        $navigation = array(
            "menu" => "material",
            "submenu" => "add",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_add_material_back');
        $this->load->view('back/v_footer_back');
        //  $this->load->view('back/v_blank');
        //  
//       
    }

    public function Show_add_material() {
        $navigation = array(
            "menu" => "material",
            "submenu" => "add",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_add_material_back');
        $this->load->view('back/v_footer_back');
    }

    public function Show_all_material() {
        $data['tablematerial'] = $this->M_material->Show_all_material($this->session->userdata['xcellent_cabang']);

        $navigation = array(
            "menu" => "material",
            "submenu" => "all",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_all_material_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Show_edit_material($id) {
        $data['datamaterial'] = $this->M_material->Json_get_one_material($id);
        $data['datadetailmaterial'] = $this->M_material->Json_get_detail_material($id);

        $navigation = array(
            "menu" => "material",
            "submenu" => "all",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_edit_material_back', $data);
        $this->load->view('back/v_footer_back');
    }

public function unique_material_name($str)
        {
            $boleh = $this->M_material->Unique_material_name($str);
            //print_r($boleh); exit();
                if (strtolower($boleh) == strtolower($str))
                {
                        $this->form_validation->set_message('unique_material_name', 'The {field} field must be unique material name in branch '. $this->session->userdata['xcellent_cabang_name']);
                        return FALSE;
                }
            $boleh = $this->M_product->Unique_product_name($str);
                if (strtolower($boleh) == strtolower($str))
                {
                        $this->form_validation->set_message('unique_material_name', 'The {field} field must be unique product name in branch '. $this->session->userdata['xcellent_cabang_name']);
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }
        }
    public function Add_material() {
        if ($this->input->post('button_addmaterial')) {

            $this->form_validation->set_rules('name_name', 'Name', 'required|callback_unique_material_name');
            $this->form_validation->set_rules('name_type', 'Type', 'required');
            $this->form_validation->set_rules('name_hpp', 'Phone', 'required');
            $this->form_validation->set_rules('name_retailprice', 'Retail Price', 'required');
            $this->form_validation->set_rules('name_bigstock', 'Stock', 'required');
            $this->form_validation->set_rules('name_amountperpack', 'Ammount Per Pack', 'required');
            $this->form_validation->set_rules('name_minimumstock', 'Minimum Stock', 'required');


            if ($this->form_validation->run() == FALSE) {
                $navigation = array(
                    "menu" => "material",
                    "submenu" => "add",
                    "stokhabis" => $this->M_material->Get_material_out_of_stock()
                );
                
                 if ($this->input->post('name_price') != null) {
                    $grossirprice = $this->input->post('name_price');
                    $minimumqty = $this->input->post('name_qty_min');
                    $maximumqty = $this->input->post('name_qty_max');
                    // redirect('Back/Material/Show_add_material');
                }
                
               // $data=array();
               // array_push($data, $grossirprice);
                //  array_push($data, $minimumqty);
                 //   array_push($data, $maximumqty);
                      
              $data['harga']= $grossirprice;
              $data['minimum']= $minimumqty;
              $data['maksimum']= $maximumqty;
             // $data['idopen'] = $this->input->post('name_hidden_idedit') ;
                $this->load->view('back/v_head_admin_back');
                $this->load->view('back/v_header_back');
                $this->load->view('back/v_navigation_back', $navigation);
                $this->load->view('back/v_add_material_back',$data);
                $this->load->view('back/v_footer_back');
            } else {

                $name = $this->input->post('name_name');
                $type = $this->input->post('name_type');
                $hpp = $this->input->post('name_hpp');
                $retailprice = $this->input->post('name_retailprice');
                $minimumstock = $this->input->post('name_minimumstock');

                $bigstock = $this->input->post('name_bigstock');
                $amountperpack = $this->input->post('name_amountperpack');
                $idbranch = $this->session->userdata['xcellent_cabang'];

                if ($this->input->post('name_price') != null) {
                    $grossirprice = $this->input->post('name_price');
                    $minimumqty = $this->input->post('name_qty_min');
                    $maximumqty = $this->input->post('name_qty_max');
                    // redirect('Back/Material/Show_add_material');
                } else {
                    redirect('Back/Admin/index');
                }


                //input material
                //  $idmaterial = $this->M_material->Add_material($name, $type, $hpp, $amountperpack);
                $this->M_material->Add_material($name, $type, $hpp, $amountperpack, $idbranch, $bigstock, $minimumstock, $grossirprice, $minimumqty, $maximumqty);

                //input detailmaterial
                //  $this->M_material->Add_detailmaterial($idmaterial->id, $amountperpack, $bigstock, $idbranch);
                //input produk n produk_material
                // $this->M_product->Add_product_material($name, $idmaterial->id);
                //input harga

                $this->session->set_flashdata('pesanform', "New Material & New Product, " . $name . " , has been added.");
                $this->session->keep_flashdata('pesanform');

                redirect('Back/Material/Show_add_material');
            }
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

    public function Json_get_detail_material_array($id) {
        $data = $this->M_material->Json_get_detail_material_array($id);
        echo json_encode($data);
    }

    public function Deactivate_material() {

        if ($this->input->post('button_deactivatematerial')) {
            $id = $this->input->post('name_deactivateid');
            $name = $this->input->post('name_deactivatename');

            $this->M_material->deactivate_material($id);
            $this->session->set_flashdata('pesanform', "Your material, " . $name . " , has been deactivated");
            $this->session->keep_flashdata('pesanform');


            redirect('Back/Material/Show_all_material');
        }
    }
     public function Activate_material() {
        if ($this->session->userdata['xcellent_tipe'] == 1) {
            if ($this->input->post('button_activatematerial')) {
                $id = $this->input->post('name_activateid');
                $name = $this->input->post('name_activatename');

                $this->M_material->Activate_material($id);
                $this->session->set_flashdata('pesanform', "Your material, " . $name . " , has been activated");
                $this->session->keep_flashdata('pesanform');


                redirect('Back/Material/Show_all_material');
            }
        } else {
            redirect('Back/Account/Log_out');
        }
    }

    public function Edit_material() {

        if ($this->input->post('button_editmaterial')) {
            if($this->input->post('name_editname')!=$this->input->post('name_editname2'))
            {
              $this->form_validation->set_rules('name_editname', 'Name', 'required|callback_unique_material_name');
            }
            $this->form_validation->set_rules('name_edittype', 'Type', 'required');
            $this->form_validation->set_rules('name_edithpp', 'Phone', 'required');
                      $this->form_validation->set_rules('name_minimumstock', 'Minimum Stock', 'required');
            
             if ($this->form_validation->run() == FALSE) {
                 $data['datamaterial'] = $this->M_material->Json_get_one_material($this->input->post('name_editid'));
        $data['datadetailmaterial'] = $this->M_material->Json_get_detail_material($this->input->post('name_editid'));

        $navigation = array(
            "menu" => "material",
            "submenu" => "all",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_edit_material_back', $data);
        $this->load->view('back/v_footer_back');
            } else {
            
            $id = $this->input->post('name_editid');
            $nama = $this->input->post('name_editname');
            $namalama = $this->input->post('name_editname2');
            $tipe = $this->input->post('name_edittype');
            $hpp = $this->input->post('name_edithpp');
            $name_minimumstock = $this->input->post('name_minimumstock');


            $this->M_material->Edit_material($id, $nama, $tipe, $hpp, $name_minimumstock,$namalama);
            $this->session->set_flashdata('pesanform', "Your Material , " . $nama . " , has been edited");
            $this->session->keep_flashdata('pesanform');


            redirect('Back/Material/Show_edit_material/' . $id);
            }
        }
    }

    public function Add_more_stock() {
        if ($this->input->post('button_addmorestock')) {
            $id = $this->input->post('name_addmorestock_idmaterial');
            $stock = $this->input->post('name_addmorestock_stock');


            // print_r($id.$nama.$tipe.$hpp);
            // exit();

            $this->M_material->Add_more_stock($id, $stock);
            $this->session->set_flashdata('pesanformaddmaterial', "Your Material's Stock  has been added");
            $this->session->keep_flashdata('pesanformaddmaterial');


            redirect('Back/Material/Show_edit_material/' . $id);
        }
    }

    public function Edit_stock_material() {
        if ($this->input->post('button_editstock')) {
            $iddetailmaterial = $this->input->post('name_detailmaterialid');
            $stock = $this->input->post('name_detailmaterialstock');

            $id = $this->input->post('name_materialid');

            $this->M_material->Edit_stock_material($iddetailmaterial, $stock);
            $this->session->set_flashdata('pesanformexisting', "Your Material's Stock  has been edited");
            $this->session->keep_flashdata('pesanformexisting');


            redirect('Back/Material/Show_edit_material/' . $id . '/#existing');
        }
    }

    public function Reduce_material_quantity() {
        $data = $this->input->post("data");

        $this->M_material->Reduce_material_quantity($data);
    }

    public function Readd_detailmaterial() {
        $data = $this->input->post("data");

        $this->M_material->Readd_detailmaterial($data);
    }

    public function Get_material_out_of_stock() {
        $datanavigasi = $this->M_material->Get_material_out_of_stock();
    }

    public function Show_material_out_of_stock() {
        $data['tablematerial'] = $this->M_material->Get_material_out_of_stock();

        $navigation = array(
            "menu" => "material",
            "submenu" => "outofstock",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_all_material_out_of_stock_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Get_used_material_temp($idnota) {

//        print_r($idnota); exit();
        $data = $this->M_material->Get_residual_material($idnota);

        echo json_encode($data);
    }

    public function Get_residu_by_detailmaterial($iddetailmaterial) {
        $data = $this->M_material->Get_all_residual_description($iddetailmaterial);
        echo json_encode($data);
    }
}

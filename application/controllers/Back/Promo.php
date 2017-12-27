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
            $this->load->model('M_material');




            $this->load->helper(array('form', 'url', 'string', 'date'));
            $this->load->library('form_validation');
        } else {
            redirect('Back/Account/Show_login');
        }
    }

    public function index() {
        $data['listproduct'] = $this->M_product->Get_all_product_active();

        $navigation=array(
            "menu" => "promo",
            "submenu" => "add",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_add_promo_back', $data);
        $this->load->view('back/v_footer_back');
        //  $this->load->view('back/v_blank');
        //  
//       
    }

    public function Show_add_promo() {
        $data['listproduct'] = $this->M_product->Get_all_product_active();

        $navigation=array(
            "menu" => "promo",
            "submenu" => "add",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_add_promo_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Show_edit_promo($id) {
        $data['listproduct'] = $this->M_product->Get_all_product_active();
        $data['datapromo'] = $this->M_promo->Get_one_promo($id);
        $data['datapromoproduct'] = $this->M_promo->Get_promo_product($id);
        $navigation=array(
            "menu" => "promo",
            "submenu" => "all",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_edit_promo_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Show_all_promo() {
        $data['tablepromo'] = $this->M_promo->Get_all_promo();
        // $data['tableprice'] = $this->M_product->Get_price();
        $navigation=array(
            "menu" => "promo",
            "submenu" => "all",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_all_promo_back', $data);
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
public function unique_promo_name($str)
        {
            $boleh = $this->M_promo->Unique_promo_name($str);
            //print_r($boleh); exit();
                if (strtolower($boleh) == strtolower($str))
                {
                        $this->form_validation->set_message('unique_promo_name', 'The {field} field must be unique promo name in branch '. $this->session->userdata['xcellent_cabang_name']);
                        
                        return FALSE;
                }
                
            
                else
                {
                        return TRUE;
                }
        }
    public function Add_Promo() {
        
        
        if ($this->input->post('button_addpromo')) {
            
            $this->form_validation->set_rules('name_name', 'Name', 'required|callback_unique_promo_name');
            $this->form_validation->set_rules('name_start', 'Start', 'required');
            $this->form_validation->set_rules('name_end', 'End', 'required');
        
if ($this->form_validation->run() == FALSE) {
                $navigation = array(
                    "menu" => "promo",
                    "submenu" => "add",
                    "stokhabis" => $this->M_material->Get_material_out_of_stock()
                );
                
                 if ($this->input->post('name_txt_id_product') != null) {
                    $idproduk = $this->input->post('name_txt_id_product');
                    $diskon = $this->input->post('name_txt_discount');
                     $namaproduk = $this->input->post('name_txt_product');
                    
                   
                }
                
              $data['idproduk']= $idproduk;
              $data['diskon']= $diskon;
               $data['namaproduk']= $namaproduk;
               $data['listproduct'] = $this->M_product->Get_all_product_active();
              
            
                $this->load->view('back/v_head_admin_back');
                $this->load->view('back/v_header_back');
                $this->load->view('back/v_navigation_back', $navigation);
                $this->load->view('back/v_add_promo_back',$data);
                $this->load->view('back/v_footer_back');
            } else {
            
            $name = $this->input->post('name_name');
            $start = $this->input->post('name_start');
            $end = $this->input->post('name_end');
            $product = $this->input->post('name_txt_id_product');
            $discount = $this->input->post('name_txt_discount');

            $this->M_promo->Add_promo($name, $start, $end, $product, $discount);
            $this->session->set_flashdata('pesanform', "New Promo has been added");
            $this->session->keep_flashdata('pesanform');

            redirect('Back/Promo/Show_add_promo');
            
            }
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
    public function Check_for_register_promo_edit() {
        $start = $this->input->post('start');
        $id = $this->input->post('id');
        $end = $this->input->post('end');
        $promo = $this->M_promo->Get_all_promo();
        $bolehtambahpromo = [];
        $bolehtambahpromo[0]=array('kode' => 1,'nama'=>'');
        foreach($promo as $item)
        {
            if($item->id!=$id)
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
            
            $this->form_validation->set_rules('name_name', 'Name', 'required|callback_unique_promo_name');
            $this->form_validation->set_rules('name_start', 'Start', 'required');
            $this->form_validation->set_rules('name_end', 'End', 'required');
        
if ($this->form_validation->run() == FALSE) {
                $navigation = array(
                    "menu" => "promo",
                    "submenu" => "add",
                    "stokhabis" => $this->M_material->Get_material_out_of_stock()
                );
                
                 if ($this->input->post('name_txt_id_product') != null) {
                    $idproduk = $this->input->post('name_txt_id_product');
                    $diskon = $this->input->post('name_txt_discount');
                     $namaproduk = $this->input->post('name_txt_product');
                    
                   
                }
                
              $data['idproduk']= $idproduk;
              $data['diskon']= $diskon;
               $data['namaproduk']= $namaproduk;
              
               
                $data['listproduct'] = $this->M_product->Get_all_product_active();
        $data['datapromo'] = $this->M_promo->Get_one_promo($this->input->post('name_editid'));
        
        //tidak mengirim apa2, makanya di -1
        $data['datapromoproduct'] =-1;
              
            //  print_r($data['datapromoproduct']); exit();
            
                $this->load->view('back/v_head_admin_back');
                $this->load->view('back/v_header_back');
                $this->load->view('back/v_navigation_back', $navigation);
                $this->load->view('back/v_edit_promo_back',$data);
                $this->load->view('back/v_footer_back');
            } else {
            $id = $this->input->post('name_editid');
            $name = $this->input->post('name_name');
            $start = $this->input->post('name_start');
            $end = $this->input->post('name_end');
            $product = $this->input->post('name_txt_id_product');
            $discount = $this->input->post('name_txt_discount');


            $this->M_promo->Edit_promo($id, $name, $start, $end, $product, $discount);
            $this->session->set_flashdata('pesanform', "Your Promo, " . $name . " , has been edited");
            $this->session->keep_flashdata('pesanform');


            redirect('Back/Promo/Show_edit_promo/' .  $this->input->post('name_editid'));
            
            }
        }
        else
        {
             redirect('Back/Promo/Show_edit_promo/' .  $this->input->post('name_editid'));
        }
    }
    
    public function Deactivate_promo() {
        if ($this->session->userdata['xcellent_tipe'] == 1) {
            if ($this->input->post('button_deactivatepromo')) {
                $id = $this->input->post('name_deactivateid');
                $name = $this->input->post('name_deactivatename');

                $this->M_promo->Deactivate_promo($id);
                $this->session->set_flashdata('pesanform', "Your promo, " . $name . " , has been deactivated");
                $this->session->keep_flashdata('pesanform');


                redirect('Back/Promo/Show_all_promo');
            }
        } else {
            redirect('Back/Account/Log_out');
        }
    }
    public function Activate_promo() {
        if ($this->session->userdata['xcellent_tipe'] == 1) {
            if ($this->input->post('button_activatepromo')) {
                $id = $this->input->post('name_activateid');
                $name = $this->input->post('name_activatename');

                $this->M_promo->Activate_promo($id);
                $this->session->set_flashdata('pesanform', "Your promo, " . $name . " , has been activated");
                $this->session->keep_flashdata('pesanform');


                redirect('Back/Promo/Show_all_promo');
            }
        } else {
            redirect('Back/Account/Log_out');
        }
    }

}

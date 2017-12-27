<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start();
class Product extends CI_Controller {

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



            $this->load->helper(array('form', 'url', 'string', 'date'));
            $this->load->library('form_validation');
        } else {
            redirect('Back/Account/Show_login');
        }
    }

    public function index() {

        $navigation=array(
            "menu" => "produk",
            "submenu" => "add",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );

        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_add_product_back');
        $this->load->view('back/v_footer_back');
        //  $this->load->view('back/v_blank');
        //  
//       
    }

    public function Show_add_product() {
        $data['listkategori'] = $this->M_kategori->Show_all_kategori_1();
        $data['listmaterial'] = $this->M_material->Get_all_material();
        $navigation=array(
            "menu" => "produk",
            "submenu" => "add",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_add_product_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Show_edit_product($id) {
        $data['listkategori'] = $this->M_kategori->Show_all_kategori_1();
        $data['listmaterial'] = $this->M_material->Get_all_material();
        $data['dataproduct'] = $this->M_product->Get_one_product($id);
        
        $data['dataproductmaterial'] = $this->M_product->Get_product_material($id);
        $data['dataharga'] = $this->M_harga->Get_harga($id);

        $navigation=array(
            "menu" => "produk",
            "submenu" => "all",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_edit_product_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Show_all_product() {
        $data['tableproduct'] = $this->M_product->Get_all_product();
         //print_r($data['tableproduct']);exit();
        // $data['tableprice'] = $this->M_product->Get_price();
        $navigation=array(
            "menu" => "produk",
            "submenu" => "all",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_all_product_back', $data);
        $this->load->view('back/v_footer_back');
    }
    public function Deactivate_product() {
        if ($this->session->userdata['xcellent_tipe'] == 1) {
            if ($this->input->post('button_deactivateproduct')) {
                $id = $this->input->post('name_deactivateid');
                $name = $this->input->post('name_deactivatename');

                $this->M_product->Deactivate_product($id);
                $this->session->set_flashdata('pesanform', "Your product, " . $name . " , has been deactivated");
                $this->session->keep_flashdata('pesanform');


                redirect('Back/Product/Show_all_product');
            }
        } else {
            redirect('Back/Account/Log_out');
        }
    }
    public function Activate_product() {
        if ($this->session->userdata['xcellent_tipe'] == 1) {
            if ($this->input->post('button_activateproduct')) {
                $id = $this->input->post('name_activateid');
                $name = $this->input->post('name_activatename');

                $this->M_product->Activate_product($id);
                $this->session->set_flashdata('pesanform', "Your product, " . $name . " , has been activated");
                $this->session->keep_flashdata('pesanform');


                redirect('Back/Product/Show_all_product');
            }
        } else {
            redirect('Back/Account/Log_out');
        }
    }
    
     public function unique_product_name($str)
        {
            $boleh = $this->M_product->Unique_product_name($str);
            //print_r($boleh); exit();
                if (strtolower($boleh) == strtolower($str))
                {
                        $this->form_validation->set_message('unique_product_name', 'The {field} field must be unique in branch '. $this->session->userdata['xcellent_cabang_name']);
                        return FALSE;
                }
                else
                {
                        return TRUE;
                }
        }

    public function Add_Product() {
        
        
        if ($this->input->post('button_addproduct')) {
          
           $this->form_validation->set_rules('name_name', 'Name', 'required|callback_unique_product_name');
           $this->form_validation->set_rules('name_category', 'Category', 'required');
           
            if ($this->form_validation->run() == FALSE) {
                $navigation = array(
                    "menu" => "produk",
                    "submenu" => "add",
                    "stokhabis" => $this->M_material->Get_material_out_of_stock()
                );
                
                 if ($this->input->post('name_price') != null) {
                    $grossirprice = $this->input->post('name_price');
                    $minimumqty = $this->input->post('name_qty_min');
                    $maximumqty = $this->input->post('name_qty_max');
                    $materialid= $this->input->post('name_txt_idmaterial');
                     $materialqty= $this->input->post('name_txt_jumlah');
                      $materialnama= $this->input->post('name_txt_material');
                }
                 
           
              $data['harga']= $grossirprice;
              $data['minimum']= $minimumqty;
              $data['maksimum']= $maximumqty;
              $data['matid']= $materialid;
              $data['matqty']= $materialqty;
              $data['matnama']= $materialnama;
              
               $data['listkategori'] = $this->M_kategori->Show_all_kategori_1();
                $data['listmaterial'] = $this->M_material->Get_all_material();
              
        
                $this->load->view('back/v_head_admin_back');
                $this->load->view('back/v_header_back');
                $this->load->view('back/v_navigation_back', $navigation);
                $this->load->view('back/v_add_product_back',$data);
                $this->load->view('back/v_footer_back');
            } else {

          
            $category = $this->input->post('name_category');
            $name = $this->input->post('name_name');
            $materialid = $this->input->post('name_txt_idmaterial');
            $materialquantity = $this->input->post('name_txt_jumlah');
            $minqty = $this->input->post('name_qty_min');
            $maxqty = $this->input->post('name_qty_max');
            $price = $this->input->post('name_price');


            $this->M_product->Add_product_real($category, $name, $materialid, $materialquantity, $minqty, $maxqty, $price);
            $this->session->set_flashdata('pesanform', "New Product has been added");
            $this->session->keep_flashdata('pesanform');
            redirect('Back/Product/Show_add_product');
            }
            
        } else {
            redirect('Back/Product/Show_add_product');
        }
    }

    public function Json_get_product_price($id) {
        $data = $this->M_product->Json_get_product_price($id);
        echo json_encode($data);
    }

    public function Json_get_material($id) {
        $data = $this->M_product->Json_get_material($id);
       
        echo json_encode($data);
    }
    public function Json_get_material_array($id) {
        $data = $this->M_product->Json_get_material_array($id);
       
        echo json_encode($data);
    }
    public function Json_get_product_in_category($id) {
        $data = $this->M_kategori->Get_product_in_category($id);
       
        echo json_encode($data);
    }

    

    public function Edit_product() {

        if ($this->input->post('button_editproduct')) {
            
            if($this->input->post('name_editname')!=$this->input->post('name_editname2'))
            {
           $this->form_validation->set_rules('name_editname', 'Name', 'required|callback_unique_product_name');
            }
           $this->form_validation->set_rules('name_editcategory', 'Category', 'required');
           
           if ($this->form_validation->run() == FALSE) {
                $navigation = array(
                    "menu" => "produk",
                    "submenu" => "add",
                    "stokhabis" => $this->M_material->Get_material_out_of_stock()
                );
                
                 if ($this->input->post('name_price') != null) {
                    $grossirprice = $this->input->post('name_price');
                    $minimumqty = $this->input->post('name_qty_min');
                    $maximumqty = $this->input->post('name_qty_max');
                    $materialid= $this->input->post('name_txt_idmaterial');
                     $materialqty= $this->input->post('name_txt_jumlah');
                      $materialnama= $this->input->post('name_txt_material');
                }
                 
           
              $data['harga']= $grossirprice;
              $data['minimum']= $minimumqty;
              $data['maksimum']= $maximumqty;
              $data['matid']= $materialid;
              $data['matqty']= $materialqty;
              $data['matnama']= $materialnama;
              
             
                
                $data['listkategori'] = $this->M_kategori->Show_all_kategori_1();
        $data['listmaterial'] = $this->M_material->Get_all_material();
        $data['dataproduct'] = $this->M_product->Get_one_product($this->input->post('name_editidproduct'));
        
        //tidak mengirim apa2. kasih -1 agar di view dia gak usah looping
        $data['dataproductmaterial'] = -1;
        $data['dataharga'] = -1;
              
        
                $this->load->view('back/v_head_admin_back');
                $this->load->view('back/v_header_back');
                $this->load->view('back/v_navigation_back', $navigation);
                $this->load->view('back/v_edit_product_back',$data);
                $this->load->view('back/v_footer_back');
            } else {

           
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

}

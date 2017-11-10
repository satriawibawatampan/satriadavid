<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start();
class Material extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        ;
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


        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back');
        $this->load->view('back/v_add_material_back');
        $this->load->view('back/v_footer_back');
        //  $this->load->view('back/v_blank');
        //  
//       
    }

    public function Show_add_material() {
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back');
        $this->load->view('back/v_add_material_back');
        $this->load->view('back/v_footer_back');
    }

    public function Show_all_material() {
        $data['tablematerial'] = $this->M_material->Show_all_material($this->session->userdata['xcellent_cabang']);
      
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back');
        $this->load->view('back/v_all_material_back', $data);
        $this->load->view('back/v_footer_back');
    }
    
     public function Show_edit_material($id) {
         $data['datamaterial'] = $this->M_material->Json_get_one_material($id);
         $data['datadetailmaterial'] = $this->M_material->Json_get_detail_material($id);
         
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back');
        $this->load->view('back/v_edit_material_back',$data);
        $this->load->view('back/v_footer_back');
    }

    public function Add_material() {
        if ($this->input->post('button_addmaterial')) {

            $this->form_validation->set_rules('name_name', 'Name', 'required');
            $this->form_validation->set_rules('name_type', 'Type', 'required');
            $this->form_validation->set_rules('name_hpp', 'Phone', 'required');
            $this->form_validation->set_rules('name_retailprice', 'Retail Price', 'required');
            $this->form_validation->set_rules('name_bigstock', 'Stock', 'required');
            $this->form_validation->set_rules('name_amountperpack', 'Ammount Per Pack', 'required');


            if ($this->form_validation->run() == FALSE) {

                $this->load->view('back/v_head_admin_back');
                $this->load->view('back/v_header_back');
                $this->load->view('back/v_navigation_back');
                $this->load->view('back/v_add_material_back');
                $this->load->view('back/v_footer_back');
            } else {

                $name = $this->input->post('name_name');
                $type = $this->input->post('name_type');
                $hpp = $this->input->post('name_hpp');
                $retailprice = $this->input->post('name_retailprice');
               
                $bigstock = $this->input->post('name_bigstock');
                $amountperpack = $this->input->post('name_amountperpack');
                $idbranch = $this->session->userdata['xcellent_cabang'];
                
                if($this->input->post('name_price')!=null)
                {
                    $grossirprice = $this->input->post('name_price');
                    $minimumqty = $this->input->post('name_qty_min');
                    $maximumqty = $this->input->post('name_qty_max');
                    // redirect('Back/Material/Show_add_material');
                }
                else
                {
                     redirect('Back/Admin/index');
                }


                //input material
              //  $idmaterial = $this->M_material->Add_material($name, $type, $hpp, $amountperpack);
               $this->M_material->Add_material($name, $type, $hpp, $amountperpack, $idbranch, $bigstock,$grossirprice,$minimumqty,$maximumqty);

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

    public function Edit_material() {

        if ($this->input->post('button_editmaterial')) {
            $id = $this->input->post('name_editid');
            $nama = $this->input->post('name_editname');
            $tipe = $this->input->post('name_edittype');
            $hpp = $this->input->post('name_edithpp');
            
           // print_r($id.$nama.$tipe.$hpp);
          // exit();

            $this->M_material->Edit_material($id, $nama, $tipe, $hpp);
            $this->session->set_flashdata('pesanform', "Your Material , " . $nama . " , has been edited");
            $this->session->keep_flashdata('pesanform');


            redirect('Back/Material/Show_edit_material/'.$id);
        }
    }
    
    public function Add_more_stock()
    {
        if ($this->input->post('button_addmorestock')) {
            $id = $this->input->post('name_addmorestock_idmaterial');
            $stock = $this->input->post('name_addmorestock_stock');
           
            
           // print_r($id.$nama.$tipe.$hpp);
          // exit();

            $this->M_material->Add_more_stock($id, $stock);
            $this->session->set_flashdata('pesanformaddmaterial', "Your Material's Stock  has been added");
            $this->session->keep_flashdata('pesanformaddmaterial');


            redirect('Back/Material/Show_edit_material/'.$id);
        }
    }
    
    public function Edit_stock_material()
    {
        if ($this->input->post('button_editstock')) {
            $iddetailmaterial = $this->input->post('name_detailmaterialid');
            $stock = $this->input->post('name_detailmaterialstock');
           
            $id=$this->input->post('name_materialid');

            $this->M_material->Edit_stock_material($iddetailmaterial, $stock);
            $this->session->set_flashdata('pesanformexisting', "Your Material's Stock  has been edited");
            $this->session->keep_flashdata('pesanformexisting');


            redirect('Back/Material/Show_edit_material/'.$id.'/#existing');
        }
    }
    
    public function Reduce_material_quantity($idproduk,$qty)
    {
         $detailmaterial = $this->M_material->Reduce_material_quantity($idproduk,$qty);
           //print_r($detailmaterial); exit();
          echo json_encode($detailmaterial);
       
    }

   
}

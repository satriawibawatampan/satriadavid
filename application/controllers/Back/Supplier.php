<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start();
class Supplier extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if (isset($this->session->userdata['xcellent_id'])) {

            $this->load->model('M_supplier');
            $this->load->model('M_material');

            $this->load->helper(array('form', 'url', 'string'));
            $this->load->library('form_validation');
        } else {
            redirect('Back/Account/Show_login');
        }

//        
    }

    public function index() {

        $data['listsupplier'] = $this->M_supplier->get_all_supplier_all();

        $navigation = array(
            "menu" => "supplier",
            "submenu" => "supplier",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_supplier_back', $data);

        $this->load->view('back/v_footer_back');
    }

    public function Add_supplier() {

        $this->form_validation->set_rules('name_company', 'Company', 'required|is_unique[supplier.perusahaan]');
        $this->form_validation->set_rules('name_name', 'Name', 'required');
        $this->form_validation->set_rules('name_address', 'Address', 'required');
        $this->form_validation->set_rules('name_phone', 'Phone Number', 'required');


        if ($this->input->post('button_submit')) {
            if ($this->form_validation->run() == FALSE) {

                $data['listsupplier'] = $this->M_supplier->get_all_supplier();

                $navigation = array(
                    "menu" => "supplier",
                    "submenu" => "supplier",
                    "stokhabis" => $this->M_material->Get_material_out_of_stock()
                );
                $this->load->view('back/v_head_admin_back');
                $this->load->view('back/v_header_back');
                $this->load->view('back/v_navigation_back', $navigation);
                $this->load->view('back/v_supplier_back', $data);
                $this->load->view('back/v_footer_back');
                //  $this->load->view('back/script/s_branch');
            } else {

                $name = $this->input->post('name_name');
                $company = $this->input->post('name_company');
                $address = $this->input->post('name_address');
                $phone = $this->input->post('name_phone');

                $this->M_supplier->Add_supplier($name, $company, $address, $phone);


                $this->session->set_flashdata('pesanform', "New supplier has been added");
                $this->session->keep_flashdata('pesanform');

                redirect('Back/Supplier/index');
            }
        }
        else
        {
            redirect('Back/Supplier/index');
        }
    }

    public function Edit_supplier() {
        if ($this->input->post('button_editsupplier')) {
            
            if($this->input->post('name_editcompany')!=$this->input->post('name_editcompany2'))
            {
               // print_r($this->input->post('name_editcompany').$this->input->post('name_editcompany2')); exit();
            $this->form_validation->set_rules('name_editcompany', 'Company', 'required|is_unique[supplier.perusahaan]');
            }
            else if($this->input->post('name_editcompany')==$this->input->post('name_editcompany2'))
            { 
                //  print_r("f"); exit();
                $this->form_validation->set_rules('name_editcompany', 'Company', 'required');
           
            }
            $this->form_validation->set_rules('name_editname', 'Name', 'required');
            $this->form_validation->set_rules('name_editaddress', 'Address', 'required');
            $this->form_validation->set_rules('name_editphone', 'Phone Number', 'required');

            if ($this->form_validation->run() == FALSE) {

                $data['listsupplier'] = $this->M_supplier->get_all_supplier();
                $data['idopen']=$this->input->post('name_editid');

                $navigation = array(
                    "menu" => "supplier",
                    "submenu" => "supplier",
                    "stokhabis" => $this->M_material->Get_material_out_of_stock()
                );
                $this->load->view('back/v_head_admin_back');
                $this->load->view('back/v_header_back');
                $this->load->view('back/v_navigation_back', $navigation);
                $this->load->view('back/v_supplier_back', $data);
                $this->load->view('back/v_footer_back');
                //  $this->load->view('back/script/s_branch');
            } else {

                $id = $this->input->post('name_editid');
                $name = $this->input->post('name_editname');
                $address = $this->input->post('name_editaddress');
                $phone = $this->input->post('name_editphone');
                $company = $this->input->post('name_editcompany');
               


                $this->M_supplier->Edit_supplier($id, $name, $address, $phone, $company);
                $this->session->set_flashdata('pesanform', "Your supplier's data (" . $company . ") has been edited");
                $this->session->keep_flashdata('pesanform');
                redirect('Back/Supplier/index');
            }
        }
        else
        {
            redirect('Back/Supplier/index');
        }
    }

    public function Deactivate_supplier() {
        if ($this->input->post('button_deactivatesupplier')) {
            $id = $this->input->post('name_deactivateid');
            $name = $this->input->post('name_deactivatename');

            $this->M_supplier->Deactivate_supplier($id);
            $this->session->set_flashdata('pesanform', "Your supplier, " . $name . " , has been deactivated");
            $this->session->keep_flashdata('pesanform');
            redirect('Back/Supplier/index');
        }
        else
        {
            redirect('Back/Supplier/index');
        }
    }

    public function Activate_supplier() {
        if ($this->session->userdata['xcellent_tipe'] == 1) {
            if ($this->input->post('button_activatesupplier')) {
                $id = $this->input->post('name_activateid');
                $name = $this->input->post('name_activatename');

                $this->M_supplier->Activate_supplier($id);
                $this->session->set_flashdata('pesanform', "Your supplier, " . $name . " , has been activated");
                $this->session->keep_flashdata('pesanform');


                redirect('Back/Supplier/index');
            }
        } else {
            redirect('Back/Account/Log_out');
        }
    }

    public function Json_get_one_supplier($id) {
        $data = $this->M_supplier->Json_get_one_supplier($id);
        echo json_encode($data);
    }

}

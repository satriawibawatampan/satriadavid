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

            $this->load->helper(array('form', 'url', 'string'));
            $this->load->library('form_validation');
        } else {
            redirect('Back/Account/Show_login');
        }

//        
    }

    public function index() {

        $data['listsupplier'] = $this->M_supplier->get_all_supplier();

        $navigation=array(
            "menu" => "supplier",
            "submenu" => "supplier"
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_supplier_back', $data);
        
        $this->load->view('back/v_footer_back');
    }

    public function Add_supplier() {

        $this->form_validation->set_rules('name_company', 'Company', 'required');
        $this->form_validation->set_rules('name_name', 'Name', 'required');
        $this->form_validation->set_rules('name_address', 'Address', 'required');
        $this->form_validation->set_rules('name_phone', 'Phone Number', 'required');


        if ($this->input->post('button_submit')) {
            if ($this->form_validation->run() == FALSE) {

                $data['listsupplier'] = $this->M_supplier->get_all_supplier();

                $navigation=array(
                    "menu" => "supplier",
                    "submenu" => "supplier"
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
    }

    public function Edit_supplier() {
        if ($this->input->post('button_editsupplier')) {

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

    public function Delete_supplier() {
        if ($this->input->post('button_deletesupplier')) {
            $id = $this->input->post('name_deleteid');
            $name = $this->input->post('name_deletename');

            $this->M_supplier->Delete_supplier($id);
            $this->session->set_flashdata('pesanform', "Your supplier, ".$name." , has been deleted");
            $this->session->keep_flashdata('pesanform');
            redirect('Back/Supplier/index');
        }
    }

    public function Json_get_one_supplier($id) {
        $data = $this->M_supplier->Json_get_one_supplier($id);
        echo json_encode($data);
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start();
class Cashflow extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if (isset($this->session->userdata['xcellent_id'])) {

            $this->load->model('M_cashflow');

            $this->load->helper(array('form', 'url', 'string'));
            $this->load->library('form_validation');
        } else {
            redirect('Back/Account/Show_login');
        }

//        
    }

    public function index() {

        $data['listsupplier'] = $this->M_supplier->Get_all_cashflow();
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

    public function Add_cashflow() {

        $this->form_validation->set_rules('name_name', 'Name', 'required');
        $this->form_validation->set_rules('name_type', 'Type', 'required');
        $this->form_validation->set_rules('name_description', 'Description', 'required');
        $this->form_validation->set_rules('name_amount', 'Amount', 'required');


        if ($this->input->post('button_addcashflow')) {
            if ($this->form_validation->run() == FALSE) {

                $data['tablecashflow'] = $this->M_cashflow->Get_all_cashflow();
                $navigation=array(
                    "menu" => "other",
                    "submenu" => "cashflow"
                );
                $this->load->view('back/v_head_admin_back');
                $this->load->view('back/v_header_back');
                $this->load->view('back/v_navigation_back', $navigation);
                $this->load->view('back/v_all_cashflow_back', $data);

                $this->load->view('back/v_footer_back');
            } else {

                $name = $this->input->post('name_name');
                $type = $this->input->post('name_type');
                $description = $this->input->post('name_description');
                $amount = $this->input->post('name_amount');

                    $this->M_cashflow->Add_cashflow($name, $type, $description, $amount);


                $this->session->set_flashdata('pesanform', "New cashflow has been added");
                $this->session->keep_flashdata('pesanform');

                redirect('Back/Cashflow/Show_all_cashflow');
            }
        }
    }

    public function Show_all_cashflow() {
        $data['tablecashflow'] = $this->M_cashflow->Get_all_cashflow();
        $navigation=array(
            "menu" => "other",
            "submenu" => "cashflow"
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_all_cashflow_back', $data);

        $this->load->view('back/v_footer_back');
    }

}

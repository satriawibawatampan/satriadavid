<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start();
class Payment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if (isset($this->session->userdata['xcellent_id'])) {
            $this->load->model('M_admin');
            $this->load->model('M_payment');
            $this->load->model('M_material');

            $this->load->helper(array('form', 'url', 'string'));
            $this->load->library('form_validation');
        } else {
            redirect('Back/Account/Show_login');
        }

//        
    }

    public function index() {

        $data['listpayment'] = $this->M_payment->Get_all_payment();

        $navigation = array(
            "menu" => "profile",
            "submenu" => "payment",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_payment_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Add_payment() {

        $this->form_validation->set_rules('name_payment', 'Name', 'required|is_unique[pembayaran.nama]');
        $this->form_validation->set_rules('name_nilai', 'Value', 'required');

        if ($this->input->post('button_addpayment')) {
            if ($this->form_validation->run() == FALSE) {

                $data['listpayment'] = $this->M_payment->Get_all_payment();

                $navigation = array(
                    "menu" => "profile",
                    "submenu" => "payment",
                    "stokhabis" => $this->M_material->Get_material_out_of_stock()
                );
                $this->load->view('back/v_head_admin_back');
                $this->load->view('back/v_header_back');
                $this->load->view('back/v_navigation_back', $navigation);
                $this->load->view('back/v_payment_back', $data);
                $this->load->view('back/v_footer_back');
            } else {

                $name = $this->input->post('name_payment');
                $nilai = $this->input->post('name_nilai');

                $this->M_payment->Add_payment($name, $nilai);


                $this->session->set_flashdata('pesanform', "New Payment method has been added");
                $this->session->keep_flashdata('pesanform');

                redirect('Back/Payment/index');
            }
        }
    }

    public function Edit_payment() {
        if ($this->input->post('name_editname') != $this->input->post('name_editname2')) {
            $this->form_validation->set_rules('name_editname', 'Name', 'required|is_unique[pembayaran.nama]');
        } else {
            $this->form_validation->set_rules('name_editname', 'Name', 'required');
        }
        $this->form_validation->set_rules('name_editnilai', 'Value', 'required');

        if ($this->input->post('button_editpayment')) {


            if ($this->form_validation->run() == FALSE) {

                $data['listpayment'] = $this->M_payment->Get_all_payment();
                $data['idopen'] = $this->input->post('name_editida');

                $navigation = array(
                    "menu" => "profile",
                    "submenu" => "payment",
                    "stokhabis" => $this->M_material->Get_material_out_of_stock()
                );
                $this->load->view('back/v_head_admin_back');
                $this->load->view('back/v_header_back');
                $this->load->view('back/v_navigation_back', $navigation);
                $this->load->view('back/v_payment_back', $data);
                $this->load->view('back/v_footer_back');
            } else {


                $idpayment = $this->input->post('name_editida');
                $name = $this->input->post('name_editname');
                $nilai = $this->input->post('name_editnilai');
//            print_r($idpayment);            exit();

                $this->M_payment->Edit_payment($idpayment, $name, $nilai);
                $this->session->set_flashdata('pesanform', "Your payment's name has been edited");
                $this->session->keep_flashdata('pesanform');
                redirect('Back/Payment/index');
            }
        }
    }

}

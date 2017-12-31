<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start();
class Email extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        

        if (isset($this->session->userdata['xcellent_id'])) {

            $this->load->library('email');
          
            $this->load->helper(array('form', 'url', 'string', 'date'));
            $this->load->library('form_validation');




            //  $this->form_validation->set_rules('name_txt_Password2', 'Ulangi Password', 'required|matches[name_txt_Password1]|min_length[8]');
        } else {
            redirect('Back/Account/Show_login');
        }
    }

    public function index() {
        
    }

    public function Send_information() {
        $this->form_validation->set_rules('name_subject', 'Subject', 'required');
        $this->form_validation->set_rules('name_content', 'Content', 'required');

        if ($this->input->post('button_submit')) {

            if ($this->form_validation->run() == FALSE) {

               
                $navigation = array(
                    "menu" => "profile",
                    "submenu" => "email",
                    "stokhabis" => $this->M_material->Get_material_out_of_stock()
                );
                $this->load->view('back/v_head_admin_back');
                $this->load->view('back/v_header_back');
                $this->load->view('back/v_navigation_back', $navigation);
                $this->load->view('back/v_email_back');
                $this->load->view('back/v_footer_back');
            } else {

                

                $this->email->from('ilove.laikebao@gmail.com', 'Printing');
                $this->email->to('ferra_chen@yahoo.com');
              

                $this->email->subject($this->input->post('name_subject'));
                $this->email->message($this->input->post('name_content'));

                $this->email->send();


                $this->session->set_flashdata('pesanform', "New category has been added");
                $this->session->keep_flashdata('pesanform');

                redirect('Back/Category/index');
            }
        }
    }

    public function Delete_kategori() {
        if ($this->input->post('name_btn_Hapus')) {
            $id = $this->input->post('name_hidden_id');

            $this->M_kategori->Delete_kategori($id);
            $this->session->set_flashdata('pesanform', "sukses");
            $this->session->keep_flashdata('pesanform');


            redirect('Back/Category/index');
        }
    }

    public function Edit_category() {

        if ($this->input->post('name_editname') == $this->input->post('name_editname2')) {
            $this->form_validation->set_rules('name_editname', 'Name', 'required');
        } else {
            $this->form_validation->set_rules('name_editname', 'Name', 'required|is_unique[kategori.nama]');
        }

        if ($this->input->post('name_btn_edit')) {

            if ($this->form_validation->run() == FALSE) {

                $data['tablekategori'] = $this->M_kategori->Show_all_category();
                $data['idopen'] = $this->input->post('name_hidden_idedit');
                $navigation = array(
                    "menu" => "category",
                    "submenu" => "category",
                    "stokhabis" => $this->M_material->Get_material_out_of_stock()
                );
                $this->load->view('back/v_head_admin_back');
                $this->load->view('back/v_header_back');
                $this->load->view('back/v_navigation_back', $navigation);
                $this->load->view('back/v_category_back', $data);
                $this->load->view('back/v_footer_back');
            } else {
                $id = $this->input->post('name_hidden_idedit');
                $namabaru = $this->input->post('name_editname');

                // print_r($id."/".$namabaru);
                // exit();

                $this->M_kategori->Edit_category($id, $namabaru);
                $this->session->set_flashdata('pesanform', "Category's name has been changed");
                $this->session->keep_flashdata('pesanform');


                redirect('Back/Category/index');
            }
        }
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start();
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        ;
        if (isset($this->session->userdata['xcellent_id'])) {


            $this->load->model('M_admin');
            $this->load->model('M_branch');
            $this->load->model('M_material');

            $this->load->helper(array('form', 'url', 'string', 'date'));
            $this->load->library('form_validation');
        } else {
            redirect('Back/Account/Show_login');
        }
    }

    public function index() {

        //INI GA ADA PAGE
        $navigation = array(
            "menu" => "admin",
            "submenu" => "main",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_main_back');
        $this->load->view('back/v_footer_back');
        //  $this->load->view('back/v_blank');
        //  
//       
    }

    public function Show_add_admin() {
        if ($this->session->userdata['xcellent_tipe'] == 1) {

            $data['listbranch'] = $this->M_branch->Get_all_branch();
            $data['listadmintype'] = $this->M_admin->Get_all_admintype();

            $navigation = array(
                "menu" => "admin",
                "submenu" => "add",
                "stokhabis" => $this->M_material->Get_material_out_of_stock()
            );
            $this->load->view('back/v_head_admin_back');
            $this->load->view('back/v_header_back');
            $this->load->view('back/v_navigation_back', $navigation);
            $this->load->view('back/v_add_admin_back', $data);
            $this->load->view('back/v_footer_back');
        } else {
            redirect('Back/Account/Log_out');
        }
    }

    public function Show_all_admin() {
        if ($this->session->userdata['xcellent_tipe'] == 1) {


            $data['listbranch'] = $this->M_branch->Get_all_branch();
            $data['listadmintype'] = $this->M_admin->Get_all_admintype();
            $data['tableadmin'] = $this->M_admin->Show_all_admin();

            $navigation = array(
                "menu" => "admin",
                "submenu" => "all",
                "stokhabis" => $this->M_material->Get_material_out_of_stock()
            );
            $this->load->view('back/v_head_admin_back');
            $this->load->view('back/v_header_back');
            $this->load->view('back/v_navigation_back', $navigation);
            $this->load->view('back/v_all_admin_back', $data);
            $this->load->view('back/v_footer_back');
        } else {
            redirect('Back/Account/Log_out');
        }
    }

    public function Add_admin() {
        if ($this->session->userdata['xcellent_tipe'] == 1) {

            if ($this->input->post('button_addadmin')) {

                $this->form_validation->set_rules('name_name', 'Name', 'required');
                $this->form_validation->set_rules('name_email', 'Email', 'required|valid_email|is_unique[admin.email]');
                $this->form_validation->set_rules('name_phone', 'Phone', 'required');
                $this->form_validation->set_rules('name_address', 'Address', 'required');
                $this->form_validation->set_rules('name_type', 'Type', 'required');
                $this->form_validation->set_rules('name_branch', 'Branch', 'required');


                if ($this->form_validation->run() == FALSE) {
                    $data['listadmintype'] = $this->M_admin->Get_all_admintype();
                    $data['listbranch'] = $this->M_branch->Get_all_branch();
                    $navigation = array(
                        "menu" => "admin",
                        "submenu" => "add",
                        "stokhabis" => $this->M_material->Get_material_out_of_stock()
                    );
                    $this->load->view('back/v_head_admin_back');
                    $this->load->view('back/v_header_back');
                    $this->load->view('back/v_navigation_back', $navigation);
                    $this->load->view('back/v_add_admin_back', $data);
                    $this->load->view('back/v_footer_back');
                } else {

                    $name = $this->input->post('name_name');
                    $email = $this->input->post('name_email');
                    $phone = $this->input->post('name_phone');
                    $address = $this->input->post('name_address');
                    $type = $this->input->post('name_type');
                    $branch = $this->input->post('name_branch');
                    $idadmin = $this->session->userdata['xcellent_id'];

                    $salt = random_string('alnum', 8);
                    $password = md5("admin123");
                    $password = $password . $salt;
                    $password = md5("$password");

                    $this->M_admin->Add_admin($name, $email, $salt, $password, $phone, $address, $type, $branch);
                    $this->session->set_flashdata('pesanform', "New admin " . $name . " has been added.");
                    $this->session->keep_flashdata('pesanform');

                    redirect('Back/Admin/Show_add_admin');
                }
            }
        } else {
            redirect('Back/Account/Log_out');
        }
    }

    public function Show_admin_type() {
        if ($this->session->userdata['xcellent_tipe'] == 1) {

            $data['listadmintype'] = $this->M_admin->Get_all_admintype();
            $navigation = array(
                "menu" => "admin",
                "submenu" => "type",
                "stokhabis" => $this->M_material->Get_material_out_of_stock()
            );
            $this->load->view('back/v_head_admin_back');
            $this->load->view('back/v_header_back');
            $this->load->view('back/v_navigation_back', $navigation);
            $this->load->view('back/v_admintype_back', $data);
            $this->load->view('back/v_footer_back');
        } else {
            redirect('Back/Account/Log_out');
        }
    }

    public function Add_admin_type() {
        if ($this->session->userdata['xcellent_tipe'] == 1) {
            if ($this->input->post('button_addadmintype')) {
                $this->form_validation->set_rules('name_namenewtype', 'Type Name', 'required|is_unique[tipeadmin.nama]');
                if ($this->form_validation->run() == FALSE) {


                    $data['listadmintype'] = $this->M_admin->Get_all_admintype();
                    $navigation = array(
                        "menu" => "admin",
                        "submenu" => "type",
                        "stokhabis" => $this->M_material->Get_material_out_of_stock()
                    );
                    $this->load->view('back/v_head_admin_back');
                    $this->load->view('back/v_header_back');
                    $this->load->view('back/v_navigation_back', $navigation);
                    $this->load->view('back/v_admintype_back', $data);
                    $this->load->view('back/v_footer_back');
                } else {
                    $name = $this->input->post('name_namenewtype');
                    $this->M_admin->Add_admin_type($name);

                    $this->session->set_flashdata('pesanform', "New admin type, " . $name . " , has been added.");
                    $this->session->keep_flashdata('pesanform');
                    redirect('Back/Admin/Show_admin_type');
                }
            }
        } else {
            redirect('Back/Account/Log_out');
        }
    }

    public function Edit_admin_type() {
        if ($this->session->userdata['xcellent_tipe'] == 1) {
            if ($this->input->post('name_btn_edit')) {

                $this->form_validation->set_rules('name_editname', 'Type Name', 'required|is_unique[tipeadmin.nama]');
              //  $this->form_validation->set_rules('name_hidden_idedit', 'Type ID', 'required');
                if ($this->form_validation->run() == FALSE) {
                  //  print_r(validation_errors()); exit();

                    $data['listadmintype'] = $this->M_admin->Get_all_admintype();
                    $data['idopen']=$this->input->post('name_hidden_idedit');
                    $navigation = array(
                        "menu" => "admin",
                        "submenu" => "type",
                        "stokhabis" => $this->M_material->Get_material_out_of_stock()
                    );
                    $this->load->view('back/v_head_admin_back');
                    $this->load->view('back/v_header_back');
                    $this->load->view('back/v_navigation_back', $navigation);
                    $this->load->view('back/v_admintype_back', $data);
                    $this->load->view('back/v_footer_back');
                    
                } else {

                    $name = $this->input->post('name_editname');
                    $id = $this->input->post('name_hidden_idedit');
                    $this->M_admin->Edit_admin_type($name, $id);
                    //print_r($id."/".$name); exit();
                    $this->session->set_flashdata('pesanform', "Admin type has been added.");
                    $this->session->keep_flashdata('pesanform');
                    redirect('Back/Admin/Show_admin_type');
                }
            }
        } else {
            redirect('Back/Account/Log_out');
        }
    }

    public function Json_get_one_admin($id) {
        $data = $this->M_admin->Json_get_one_admin($id);
        echo json_encode($data);
    }

    public function Deactivate_admin() {
        if ($this->session->userdata['xcellent_tipe'] == 1) {
            if ($this->input->post('button_deactivateadmin')) {
                $id = $this->input->post('name_deactivateid');
                $name = $this->input->post('name_deactivatename');

                $this->M_admin->Deactivate_admin($id);
                $this->session->set_flashdata('pesanform', "Your admin, " . $name . " , has been deactivated");
                $this->session->keep_flashdata('pesanform');


                redirect('Back/Admin/Show_all_admin');
            }
        } else {
            redirect('Back/Account/Log_out');
        }
    }

    public function Activate_admin() {
        if ($this->session->userdata['xcellent_tipe'] == 1) {
            if ($this->input->post('button_activateadmin')) {
                $id = $this->input->post('name_activateid');
                $name = $this->input->post('name_activatename');

                $this->M_admin->Activate_admin($id);
                $this->session->set_flashdata('pesanform', "Your admin, " . $name . " , has been activated");
                $this->session->keep_flashdata('pesanform');


                redirect('Back/Admin/Show_all_admin');
            }
        } else {
            redirect('Back/Account/Log_out');
        }
    }

    public function Edit_admin() {
        if ($this->session->userdata['xcellent_tipe'] == 1) {
            if ($this->input->post('button_editadmin')) {
                $id = $this->input->post('name_editid');
                $nama = $this->input->post('name_editname');
                $email = $this->input->post('name_editemail');
                $address = $this->input->post('name_editaddress');
                $phone = $this->input->post('name_editphone');
                $type = $this->input->post('name_edittype');
                $branch = $this->input->post('name_editbranch');

                $this->M_admin->Edit_admin($id, $nama, $email, $address, $phone, $type, $branch);
                $this->session->set_flashdata('pesanform', "Your admin, " . $nama . " , has been edited");
                $this->session->keep_flashdata('pesanform');


                redirect('Back/Admin/Show_all_admin');
            }
        } else {
            redirect('Back/Account/Log_out');
        }
    }

}

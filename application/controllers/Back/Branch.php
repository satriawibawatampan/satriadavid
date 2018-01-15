<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start();
class Branch extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if (isset($this->session->userdata['xcellent_id'])) {
            $this->load->model('M_admin');
            $this->load->model('M_branch');
            $this->load->model('M_material');
            $this->load->model('M_setting');

            $this->load->helper(array('form', 'url', 'string'));
            $this->load->library('form_validation');
        } else {
            redirect('Back/Account/Show_login');
        }
        $hakakses = $this->session->userdata['xcellent_hakakses'];
//        
    }

    public function index() {

        if (in_array(1, $hakakses)) {

            $data['listbranch'] = $this->M_branch->Get_all_branch();

            $navigation = array(
                "menu" => "profile",
                "submenu" => "branch",
                "stokhabis" => $this->M_material->Get_material_out_of_stock()
            );
            $this->load->view('back/v_head_admin_back');
            $this->load->view('back/v_header_back');
            $this->load->view('back/v_navigation_back', $navigation);
            $this->load->view('back/v_change_branch_back', $data);
            $this->load->view('back/v_footer_back');
        } else {
            redirect('Back/Account/Log_out');
        }
    }

    public function Show_change_branch() {
        if (in_array(1, $hakakses)) {

            $data['listbranch'] = $this->M_branch->Get_all_branch();
            $navigation = array(
                "menu" => "profile",
                "submenu" => "branch",
                "stokhabis" => $this->M_material->Get_material_out_of_stock()
            );
            $this->load->view('back/v_head_admin_back');
            $this->load->view('back/v_header_back');
            $this->load->view('back/v_navigation_back', $navigation);
            $this->load->view('back/v_change_branch_back', $data);
            $this->load->view('back/v_footer_back');
            //  $this->load->view('back/script/s_branch');
        } else {
            redirect('Back/Account/Log_out');
        }
    }

    public function Add_branch() {
        if (in_array(1, $hakakses)) {

            $this->form_validation->set_rules('name_branch', 'Name', 'required|is_unique[cabang.nama]');
            $this->form_validation->set_rules('name_description', 'Name', 'required');

            if ($this->input->post('button_addbranch')) {
                if ($this->form_validation->run() == FALSE) {

                    $data['listbranch'] = $this->M_branch->Get_all_branch();
                    $navigation = array(
                        "menu" => "profile",
                        "submenu" => "branch",
                        "stokhabis" => $this->M_material->Get_material_out_of_stock()
                    );
                    $this->load->view('back/v_head_admin_back');
                    $this->load->view('back/v_header_back');
                    $this->load->view('back/v_navigation_back', $navigation);
                    $this->load->view('back/v_change_branch_back', $data);
                    $this->load->view('back/v_footer_back');
                    //  $this->load->view('back/script/s_branch');
                } else {

                    $name = $this->input->post('name_branch');
                    $description = $this->input->post('name_description');

                    $this->M_branch->Add_branch($name, $description);


                    $this->session->set_flashdata('pesanform', "New branch has been added");
                    $this->session->keep_flashdata('pesanform');

                    redirect('Back/Branch/Show_change_branch');
                }
            } else {
                redirect('Back/Branch/Show_change_branch');
            }
        } else {
            redirect('Back/Account/Log_out');
        }
    }

    public function Change_branch($idadmin) {
        if (in_array(1, $hakakses)) {
            if ($this->input->post('button_changebranch')) {


                $branch = $this->input->post('name_select_branch');

                $this->M_branch->Change_branch($idadmin, $branch);
                $branchData = $this->M_branch->Get_branch_byId($branch);
                // $this->session->set_userdata('xcellent_cabang', $branch);
                $this->session->set_userdata('xcellent_cabang', $branchData['id']);
                $this->session->set_userdata('xcellent_cabang_name', $branchData['nama']);


                $this->session->set_flashdata('pesanform', "Your branch has changed");
                $this->session->keep_flashdata('pesanform');

                redirect('Back/Branch/Show_change_branch');
            } else {
                redirect('Back/Branch/Show_change_branch');
            }
        } else {
            redirect('Back/Account/Log_out');
        }
    }

    public function Edit_branch() {
        if ($this->input->post('name_editname') != $this->input->post('name_editname2')) {
            $this->form_validation->set_rules('name_editname', 'Name', 'required|is_unique[cabang.nama]');
            $this->form_validation->set_rules('name_editdescription', 'Description', 'required');
        } else {
            $this->form_validation->set_rules('name_editname', 'Name', 'required');
            $this->form_validation->set_rules('name_editdescription', 'Description', 'required');
        }
        if ($this->input->post('button_editbranch')) {

            if ($this->form_validation->run() == FALSE) {

                $data['listbranch'] = $this->M_branch->Get_all_branch();
                $data['idopen'] = $this->input->post('name_hidden_idedit');
                $navigation = array(
                    "menu" => "profile",
                    "submenu" => "branch",
                    "stokhabis" => $this->M_material->Get_material_out_of_stock()
                );
                $this->load->view('back/v_head_admin_back');
                $this->load->view('back/v_header_back');
                $this->load->view('back/v_navigation_back', $navigation);
                $this->load->view('back/v_change_branch_back', $data);
                $this->load->view('back/v_footer_back');
                //  $this->load->view('back/script/s_branch');
            } else {

                $idbranch = $this->input->post('name_hidden_idedit');
                $name = $this->input->post('name_editname');
                $description = $this->input->post('name_editdescription');


                $this->M_branch->Edit_branch($idbranch, $name, $description);
                $this->session->set_flashdata('pesanform', "Your branch's name has been edited");
                $this->session->keep_flashdata('pesanform');
                redirect('Back/Branch/Show_change_branch');
            }
        } else {
            redirect('Back/Branch/Show_change_branch');
        }
    }

}

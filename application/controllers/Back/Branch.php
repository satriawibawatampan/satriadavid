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
         
            $this->load->helper(array('form', 'url', 'string'));
            $this->load->library('form_validation');
        } else {
             redirect('Back/Account/Show_login');
        }

//        
    }

    public function index() {

        $data['listbranch'] = $this->M_branch->get_all_branch();

        $navigation=array(
            "menu" => "profile",
            "submenu" => "branch",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_change_branch_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Show_change_branch() {

        $data['listbranch'] = $this->M_branch->get_all_branch();
        $navigation=array(
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
    }

    public function Add_branch() {

        $this->form_validation->set_rules('name_branch', 'Name', 'required');

        if ($this->input->post('button_addbranch')) {
            if ($this->form_validation->run() == FALSE) {

                $data['listbranch'] = $this->M_branch->get_all_branch();
                $navigation=array(
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

                $this->M_branch->Add_branch($name);


                $this->session->set_flashdata('pesanform', "New branch has been added");
                $this->session->keep_flashdata('pesanform');

                redirect('Back/Branch/Show_change_branch');
            }
        }
    }

    public function Change_branch($idadmin) {
        if ($this->input->post('button_changebranch')) {


            $branch = $this->input->post('name_select_branch');

            $this->M_branch->Change_branch($idadmin, $branch);

            $this->session->set_userdata('xcellent_cabang', $branch);


            $this->session->set_flashdata('pesanform', "Your branch has changed");
            $this->session->keep_flashdata('pesanform');

            redirect('Back/Branch/Show_change_branch');
        }
    }

    public function Edit_branch() {
        if ($this->input->post('button_editbranch')) {

            $idbranch = $this->input->post('name_hidden_idedit');
            $name = $this->input->post('name_editname');


            $this->M_branch->Edit_branch($idbranch, $name);
            $this->session->set_flashdata('pesanform', "Your branch's name has been edited");
            $this->session->keep_flashdata('pesanform');
            redirect('Back/Branch/Show_change_branch');
        }
    }

}

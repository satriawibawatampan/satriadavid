<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start();
class Member extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        ;
        if (isset($this->session->userdata['xcellent_id'])) {


            $this->load->model('M_admin');
            $this->load->model('M_member');
             $this->load->model('M_material');


            $this->load->helper(array('form', 'url', 'string', 'date'));
            $this->load->library('form_validation');
        } else {
            redirect('Back/Account/Show_login');
        }
    }

    public function index() {

        //GA ADA PAGE
        $navigation=array(
            "menu" => "member",
            "submenu" => "all",
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

    public function Show_add_member() {
        $navigation=array(
            "menu" => "member",
            "submenu" => "add",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_add_member_back');
        $this->load->view('back/v_footer_back');
    }

    public function Show_all_member() {
        $data['tablemember'] = $this->M_member->Show_all_member();
        $navigation=array(
            "menu" => "member",
            "submenu" => "all",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_all_member_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Show_add_deposit() {
         $data['listmember'] = $this->M_member->Show_all_member();
          $navigation=array(
            "menu" => "member",
            "submenu" => "deposit",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_add_deposit_back',$data);
        $this->load->view('back/v_footer_back');
    }

    public function Add_member() {
        if ($this->input->post('button_addmember')) {

            $this->form_validation->set_rules('name_name', 'Name', 'required');
            $this->form_validation->set_rules('name_email', 'Email', 'required|valid_email|is_unique[member.email]');
            $this->form_validation->set_rules('name_phone', 'Phone', 'required');
            $this->form_validation->set_rules('name_address', 'Address', 'required');
            $this->form_validation->set_rules('name_deposit', 'Deposit', 'required');
            // $this->form_validation->set_rules('name_deposit', 'Deposit', 'required');
            $this->form_validation->set_rules('name_ttl', 'Type', 'required');
            $this->form_validation->set_rules('name_gender', 'Gender', 'required');


            if ($this->form_validation->run() == FALSE) {
                $navigation=array(
                    "menu" => "member",
                    "submenu" => "add",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
                );
                $this->load->view('back/v_head_admin_back');
                $this->load->view('back/v_header_back');
                $this->load->view('back/v_navigation_back', $navigation);
                $this->load->view('back/v_add_member_back');
                $this->load->view('back/v_footer_back');
            } else {

                $name = $this->input->post('name_name');
                $email = $this->input->post('name_email');
                $phone = $this->input->post('name_phone');
                $address = $this->input->post('name_address');
                // $deposit = $this->input->post('name_deposit');
                $ttl = $this->input->post('name_ttl');
                $gender = $this->input->post('name_gender');
                $deposit = $this->input->post('name_deposit');
                $idadmin = $this->session->userdata['xcellent_id'];

                $this->M_member->Add_member($name, $email, $phone, $address, $ttl, $gender, $idadmin, $deposit);
                $this->session->set_flashdata('pesanform', "New member " . $name . " has been added.");
                $this->session->keep_flashdata('pesanform');

                redirect('Back/Member/Show_add_member');
            }
        }
    }

    public function Json_get_one_member($id) {
        $data = $this->M_member->Json_get_one_member($id);
        echo json_encode($data);
    }

    public function Add_deposit() {
        if ($this->input->post('button_adddeposit')) {

            $this->form_validation->set_rules('name_deposit', 'Deposit', 'required');
            if ($this->form_validation->run() == FALSE) {
                 $navigation=array(
                    "menu" => "member",
                    "submenu" => "add",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
                );
                $this->load->view('back/v_head_admin_back');
                $this->load->view('back/v_header_back');
                $this->load->view('back/v_navigation_back', $navigation);
                $this->load->view('back/v_add_deposit_back');
                $this->load->view('back/v_footer_back');
            } else {
                $deposit = $this->input->post('name_deposit');
                $idmember = $this->input->post('name_member');
                $this->M_member->Add_deposit($deposit, $idmember);
                $this->session->set_flashdata('pesanform', "Deposit has been added.");
                $this->session->keep_flashdata('pesanform');
                  redirect('Back/Member/Show_add_deposit');
            }
        }
    }

    public function Delete_member() {

        if ($this->input->post('button_deletemember')) {
            $id = $this->input->post('name_deleteid');
            $name = $this->input->post('name_deletename');

            $this->M_member->delete_member($id);
            $this->session->set_flashdata('pesanform', "Your member, " . $name . " , has been deleted");
            $this->session->keep_flashdata('pesanform');


            redirect('Back/Member/Show_all_member');
        }
    }

    public function Edit_member() {

        if ($this->input->post('button_editmember')) {
            $id = $this->input->post('name_editid');
            $nama = $this->input->post('name_editname');
            // $email = $this->input->post('name_editemail');
            $address = $this->input->post('name_editaddress');
            $phone = $this->input->post('name_editphone');
            $ttl = $this->input->post('name_editttl');
            $deposit = $this->input->post('name_editdeposit');
            $gender = $this->input->post('name_editgender');

            $this->M_member->Edit_member($id, $nama, $email, $address, $phone, $ttl, $deposit, $gender);
            $this->session->set_flashdata('pesanform', "Your member, " . $nama . " , has been edited");
            $this->session->keep_flashdata('pesanform');


            redirect('Back/Member/Show_all_member');
        }
    }

}

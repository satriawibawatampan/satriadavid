<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start();
class Member extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');

        if (isset($this->session->userdata['xcellent_id'])) {


            $this->load->model('M_admin');
            $this->load->model('M_member');
            $this->load->model('M_order');
            $this->load->model('M_material');
            $this->load->model('M_setting');
            $this->load->model('M_payment');

            $this->load->helper(array('form', 'url', 'string', 'date'));
            $this->load->library('form_validation');
        } else {
            redirect('Back/Account/Show_login');
        }
        $hakakses = $this->session->userdata['xcellent_hakakses'];
    }

    public function index() {

        //GA ADA PAGE
        $navigation = array(
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


        $navigation = array(
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
        $data['datasetting'] = $this->M_setting->Get_all_setting();
        //print_r( $data['datasetting']);exit();
        $navigation = array(
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

    public function Deactivate_member() {
        if ($this->session->userdata['xcellent_tipe'] == 1) {
            if ($this->input->post('button_deactivatemember')) {
                $id = $this->input->post('name_deactivateid');
                $name = $this->input->post('name_deactivatename');

                $this->M_member->Deactivate_member($id);
                $this->session->set_flashdata('pesanform', "Your member, " . $name . " , has been deactivated");
                $this->session->keep_flashdata('pesanform');


                redirect('Back/Member/Show_all_member');
            }
        } else {
            redirect('Back/Account/Log_out');
        }
    }

    public function Activate_member() {
        if ($this->session->userdata['xcellent_tipe'] == 1) {
            if ($this->input->post('button_activatemember')) {
                $id = $this->input->post('name_activateid');
                $name = $this->input->post('name_activatename');

                $this->M_member->Activate_member($id);
                $this->session->set_flashdata('pesanform', "Your member, " . $name . " , has been activated");
                $this->session->keep_flashdata('pesanform');


                redirect('Back/Member/Show_all_member');
            }
        } else {
            redirect('Back/Account/Log_out');
        }
    }

    public function Show_add_deposit() {
        $data['listmember'] = $this->M_member->Show_all_member_active();
        $data['listpaymentmethod'] = $this->M_payment->Get_all_payment();
        $data['datasetting'] = $this->M_setting->Get_all_setting();
        $navigation = array(
            "menu" => "member",
            "submenu" => "adddeposit",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_add_deposit_back', $data);
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
                $navigation = array(
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
        } else {
            redirect('Back/Member/Show_add_member');
        }
    }

    public function Add_member_ajax() {
        $idadmin = $this->session->userdata['xcellent_id'];
        $nama = $this->input->post("nama");
        $deposit = $this->input->post("deposit");
        $bonusdeposit = $this->input->post("bonusdeposit");
        $email = $this->input->post("email");
        $bod = $this->input->post("bod");
        $phone = $this->input->post("phone");
        $gender = $this->input->post("gender");
        $alamat = $this->input->post("alamat");
        $pin = $this->input->post("pin");
        $retypepin = $this->input->post("retypepin");

        $salt = random_string('alnum', 8);
        $pin = md5($pin);
        $pin = $pin . $salt;
        $pin = md5($pin);

        echo $this->M_member->Add_member_ajax($nama, $idadmin, $deposit, $email, $bod, $phone, $gender, $alamat, $bonusdeposit, $pin, $salt);
    }

    public function Add_member_from_kasir_ajax() {
        $idadmin = $this->session->userdata['xcellent_id'];
        $nama = $this->input->post("nama");
        $deposit = $this->input->post("deposit");
        $bonusdeposit = $this->input->post("bonusdeposit");
        $email = $this->input->post("email");
        $bod = $this->input->post("bod");
        $phone = $this->input->post("phone");
        $gender = $this->input->post("gender");
        $alamat = $this->input->post("alamat");
        $idnota = $this->input->post("idnota");
        $pin = $this->input->post("pin");
        $retypepin = $this->input->post("retypepin");

        $salt = random_string('alnum', 8);
        $pin = md5($pin);
        $pin = $pin . $salt;
        $pin = md5($pin);

        echo $this->M_member->Add_member_from_kasir_ajax($nama, $idadmin, $deposit, $email, $bod, $phone, $gender, $alamat, $idnota, $bonusdeposit,$pin, $salt);
    }

    public function Cancel_add_member() {
        $idmember = $this->input->post("idmember");
        $this->M_member->Cancel_add_member($idmember);
    }

    public function Cancel_add_member_in_edit() {
        $idmember = $this->input->post("idmember");
        $idnota = $this->input->post("idnota");
        $hargamember = $this->input->post("hargamember");

        //print_r($idmember."/".$idnota."/".$hargamember);exit();
        $this->M_member->Cancel_add_member_in_edit($idmember, $idnota, $hargamember);
    }

    public function Json_get_one_member($id) {
        $data = $this->M_member->Json_get_one_member($id);
        echo json_encode($data);
    }

    public function Add_deposit_to_note() {
        if ($this->input->post('button_adddeposit')) {

            $this->form_validation->set_rules('name_deposit', 'Deposit', 'required');


            if ($this->form_validation->run() == FALSE) {
                $navigation = array(
                    "menu" => "member",
                    "submenu" => "adddeposit",
                    "stokhabis" => $this->M_material->Get_material_out_of_stock()
                );

                $data['listmember'] = $this->M_member->Show_all_member_active();
                $data['listpaymentmethod'] = $this->M_payment->Get_all_payment();
                $data['datasetting'] = $this->M_setting->Get_all_setting();

                $this->load->view('back/v_head_admin_back');
                $this->load->view('back/v_header_back');
                $this->load->view('back/v_navigation_back', $navigation);
                $this->load->view('back/v_add_deposit_back', $data);
                $this->load->view('back/v_footer_back');
            } else {
                $deposit = $this->input->post('name_deposit');
                $idmember = $this->input->post('name_member');
                $idpayment = $this->input->post('name_txt_id_paymentmethod');
                $amount = $this->input->post('name_txt_id_paymentamount');
                $bonusdeposit = $this->input->post('name_bonusdeposit');
                $this->M_order->Add_deposit_to_note($deposit, $idmember, $idpayment, $amount, $bonusdeposit);
                $this->session->set_flashdata('pesanform', "Deposit has been added to Order Note.");
                $this->session->keep_flashdata('pesanform');
                redirect('Back/Member/Show_add_deposit');
            }
        } else {
            redirect('Back/Member/Show_add_deposit');
        }
    }

    public function Add_deposit() {
        if ($this->input->post('button_adddeposit')) {

            $this->form_validation->set_rules('name_deposit', 'Deposit', 'required');
            if ($this->form_validation->run() == FALSE) {
                $navigation = array(
                    "menu" => "member",
                    "submenu" => "adddeposit",
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

                $this->M_order->Add_order_note_deposit($member, $grandtotal);
                $this->session->set_flashdata('pesanform', "Deposit has been added to Order Note.");
                $this->session->keep_flashdata('pesanform');
                redirect('Back/Member/Show_add_deposit');
            }
        } else {
            redirect('Back/Member/Show_add_deposit');
        }
    }

    public function Edit_member() {

        if ($this->input->post('button_editmember')) {
            $id = $this->input->post('name_editid');
            $nama = $this->input->post('name_editname');
            $email = $this->input->post('name_editemail');
            $address = $this->input->post('name_editaddress');
            $phone = $this->input->post('name_editphone');
            $ttl = $this->input->post('name_editttl');
            $deposit = $this->input->post('name_editdeposit');
            $gender = $this->input->post('name_editgender');

            $this->M_member->Edit_member($id, $nama, $email, $address, $phone, $ttl, $deposit, $gender);
            $this->session->set_flashdata('pesanform', "Your member, " . $nama . " , has been edited");
            $this->session->keep_flashdata('pesanform');


            redirect('Back/Member/Show_all_member');
        } else {
            redirect('Back/Member/Show_all_member');
        }
    }

    public function Exchange_point() {
        if ($this->input->post('button_exchangepoint')) {
            $id = $this->input->post('name_exchangeid');
            $name = $this->input->post('name_exchangename');
            $minimalexchange = $this->input->post('name_minimalexchange');
            $pointtodeposit = $this->input->post('name_pointtodeposit');


            $this->M_member->Exchange_point($id, $minimalexchange, $pointtodeposit);
            $this->session->set_flashdata('pesanform', "Your member, " . $name . " (ID : " . $id . ") , has exchanged points.");
            $this->session->keep_flashdata('pesanform');


            redirect('Back/Member/Show_all_member');
        } else {
            redirect('Back/Member/Show_add_deposit');
        }
    }

}

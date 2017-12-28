<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start();
class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();


        $this->load->model('M_admin');
         $this->load->model('M_material');
         $this->load->model('M_setting');
        $this->load->library('session');
        $this->load->helper(array('form', 'url', 'string'));
        $this->load->library('form_validation');

//        
    }

    public function index() {



        $this->load->view('back/v_loginhead_back');
        $this->load->view('back/v_login');
    }

    public function Show_login() {
        if (isset($this->session->userdata['xcellent_id'])) {
           if($this->session->userdata['xcellent_tipe'] == 3 ||$this->session->userdata['xcellent_tipe'] == 4)
                        redirect('Back/Order/Show_all_order_note');
                        else if($this->session->userdata['xcellent_tipe'] == 1)
                        redirect('Back/Cashflow/Show_report_cashflow');
                        else if($this->session->userdata['xcellent_tipe'] == 2)
                        redirect('Back/Order/Show_add_order_note');
        } else {
            $this->load->view('back/v_loginhead_back');
            $this->load->view('back/v_login');
        }
    }

    public function Cek_login2() {
        if (isset($this->session->userdata['xcellent_id'])) {
           if($this->session->userdata['xcellent_tipe'] == 3 ||$this->session->userdata['xcellent_tipe'] == 4)
                        redirect('Back/Order/Show_all_order_note');
                        else if($this->session->userdata['xcellent_tipe'] == 1)
                        redirect('Back/Cashflow/Show_report_cashflow');
                        else if($this->session->userdata['xcellent_tipe'] == 2)
                        redirect('Back/Order/Show_add_order_note');
        } else {

            $this->form_validation->set_rules('name_email', 'email', 'required');
            $this->form_validation->set_rules('name_password', 'password', 'required|min_length[8]');


            if ($this->input->post('button_login')) {

                //jika gagal form validation
                if ($this->form_validation->run() == FALSE) {
                    // $this->session->set_flashdata('testerror', "Form Validation Fail");
                    $this->load->view('back/v_loginhead_back');
                    $this->load->view('back/v_login');
                }
                //jika sukses form validation
                else {


                    $email = $this->input->post('name_email');
                    $pass = $this->input->post('name_password');
                    $tamp = $this->M_admin->Cek_login($email, $pass);

                    //sukses ambil data login
                    if (isset($tamp)) {
                    //    print_r($tamp); exit();
                        $this->session->set_userdata('xcellent_name', $tamp['nama']);
                        $this->session->set_userdata('xcellent_email', $tamp['email']);
                        $this->session->set_userdata('xcellent_tipe', $tamp['id_tipeadmin']);
                        $this->session->set_userdata('xcellent_id', $tamp['id']);
                        $this->session->set_userdata('xcellent_cabang',$tamp['id_cabang'] );
                        $this->session->set_userdata('xcellent_cabang_name',$tamp['nama_cabang'] );


                        if($this->session->userdata['xcellent_tipe'] == 3 ||$this->session->userdata['xcellent_tipe'] == 4)
                        redirect('Back/Order/Show_all_order_note');
                        else if($this->session->userdata['xcellent_tipe'] == 1)
                        redirect('Back/Cashflow/Show_report_cashflow');
                        else if($this->session->userdata['xcellent_tipe'] == 2)
                        redirect('Back/Order/Show_add_order_note');
                    }
                    //gagal ambil data login
                    else {
                        $this->session->set_flashdata('testerror', "Email or Password is Invalid.");


                        redirect('Back/Account/Show_login');
                    }
                }
            } else {
                redirect('Back/Account/Show_login');
            }
        }
    }

    public function Log_out() {
        $this->session->unset_userdata('xcellent_name');
        $this->session->unset_userdata('xcellent_email');
        $this->session->unset_userdata('xcellent_tipe');
        $this->session->unset_userdata('xcellent_id');
        $this->session->unset_userdata('xcellent_cabang');
        $this->session->unset_userdata('xcellent_cabang_name');
        redirect('Back/Account/Show_login');
    }

    public function Change_password() {


        $this->form_validation->set_rules('name_email2', 'email', 'required');
        $this->form_validation->set_rules('name_oldpassword', 'old password', 'required|min_length[8]');
        $this->form_validation->set_rules('name_newpassword1', 'new password', 'required|min_length[8]');
        $this->form_validation->set_rules('name_newpassword2', 'confirmation password', 'required|min_length[8]|matches[name_newpassword1]');

        if ($this->input->post('button_changepassword')) {

            //jika gagal form validation
            if ($this->form_validation->run() == FALSE) {
                $navigation=array(
                    "menu" => "profile",
                    "submenu" => "changepassword",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
                );
                $this->load->view('back/v_head_admin_back');
                $this->load->view('back/v_header_back');
                $this->load->view('back/v_navigation_back', $navigation);
                $this->load->view('back/v_change_password_back');
                $this->load->view('back/v_footer_back');
            } else {

                $email = $this->input->post('name_email2');
                $old = $this->input->post('name_oldpassword');
                $pass1 = $this->input->post('name_newpassword1');
                $pass2 = $this->input->post('name_newpassword2');

                $tamp = $this->M_admin->Cek_login($email, $old);


                //sukses ambil data login
                if (isset($tamp)) {
                    $garam = $tamp['salt'];
                    $password = md5($pass1);
                    $password = $password . $garam;
                    $password = md5($password);

                    $this->M_admin->Change_password($email, $password);
                    $this->session->set_flashdata('pesanform', "Password has been changed");
                    redirect('Back/Account/Show_change_password');
                }
                //gagal ambil data login
                else {
                    $this->session->set_flashdata('testerror', "Email or Password is Invalid.");

                    redirect('Back/Account/Show_change_password');
                }
            }
        } else {
            redirect('Back/Account/Show_login');
        }
    }

    public function Show_change_password() {

        if (isset($this->session->userdata['xcellent_id'])) {
            $navigation=array(
                    "menu" => "profile",
                    "submenu" => "changepassword",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
            );
            $this->load->view('back/v_head_admin_back');
            $this->load->view('back/v_header_back');
            $this->load->view('back/v_navigation_back', $navigation);
            $this->load->view('back/v_change_password_back');
            $this->load->view('back/v_footer_back');
        } else {
            redirect('Back/Account/Show_login');
        }
    }
    
     public function Show_setting() {

        if (isset($this->session->userdata['xcellent_id'])) {
            $navigation=array(
                    "menu" => "profile",
                    "submenu" => "setting",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
            );
            
            $data['datasetting'] = $this->M_setting->Get_all_setting();
            $this->load->view('back/v_head_admin_back');
            $this->load->view('back/v_header_back');
            $this->load->view('back/v_navigation_back', $navigation);
            $this->load->view('back/v_setting_back',$data);
            $this->load->view('back/v_footer_back');
        } else {
            redirect('Back/Account/Show_login');
        }
    }

    public function Show_forgot_password() {
        if (isset($this->session->userdata['xcellent_id'])) {
            redirect('Back/Admin/index');
        } else {

            $this->load->view('back/v_loginhead_back');
            $this->load->view('back/v_forgotpassword');
        }
    }

    public function Send_new_password() {
        if (isset($this->session->userdata['xcellent_id'])) {
            redirect('Back/Admin/index');
        } else {
            $this->form_validation->set_rules('name_emailforgotpassword', 'email', 'required');


            if ($this->input->post('button_resetpassword')) {

                //jika gagal form validation
                if ($this->form_validation->run() == FALSE) {

                    $this->load->view('back/v_loginhead_back');
                    $this->load->view('back/v_forgotpassword');
                } else {

                    $email = $this->input->post('name_emailforgotpassword');
                    $tamp = $this->M_admin->Cek_email($email);

                    if (isset($tamp)) {
                        $newpassword = random_string('alnum', 8);

                        $newpasswordandsalt = md5($newpassword);
                        $newpasswordandsalt = $newpasswordandsalt . $tamp;
                        $newpasswordandsalt = md5($newpasswordandsalt);

                        $this->M_admin->Change_password($email, $newpasswordandsalt);
                        $this->session->set_flashdata('pesanform', $newpassword);
                        $this->session->keep_flashdata('pesanform');
                        redirect('Back/Account/Show_login');
                        //sendemailhere
                    } else {
                        
                    }
                }
            } else {
                redirect('Back/Account/Show_login');
            }
        }
    }
    
  

}

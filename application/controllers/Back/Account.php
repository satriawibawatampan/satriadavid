<?php
//session_start();
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
         $this->load->library('email');


//        
    }

    public function index() {



        $this->load->view('back/v_loginhead_back');
        $this->load->view('back/v_login');
    }

    public function Show_login() {
        if (isset($this->session->userdata['xcellent_id'])) {
            if ($this->session->userdata['xcellent_tipe'] == 3 || $this->session->userdata['xcellent_tipe'] == 4)
                redirect('Back/Order/Show_all_order_note');
            else if ($this->session->userdata['xcellent_tipe'] == 1)
                redirect('Back/Cashflow/Show_report_cashflow');
            else if ($this->session->userdata['xcellent_tipe'] == 2)
                redirect('Back/Order/Show_add_order_note');
        } else {
            $this->load->view('back/v_loginhead_back');
            $this->load->view('back/v_login');
        }
    }

    public function Cek_login2() {
        if (isset($this->session->userdata['xcellent_id'])) {
            if ($this->session->userdata['xcellent_tipe'] == 3 || $this->session->userdata['xcellent_tipe'] == 4)
                redirect('Back/Order/Show_all_order_note');
            else if ($this->session->userdata['xcellent_tipe'] == 1)
                redirect('Back/Cashflow/Show_report_cashflow');
            else if ($this->session->userdata['xcellent_tipe'] == 2)
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
                        
                   
                        $hakakses = $this->M_admin->Get_access_by_id($tamp['id_tipeadmin']);
                        $this->session->sess_expiration = 5;
                        $this->session->set_userdata('xcellent_name', $tamp['nama']);
                        $this->session->set_userdata('xcellent_email', $tamp['email']);
                        $this->session->set_userdata('xcellent_tipe', $tamp['id_tipeadmin']);
                        $this->session->set_userdata('xcellent_id', $tamp['id']);
                        $this->session->set_userdata('xcellent_cabang', $tamp['id_cabang']);
                        $this->session->set_userdata('xcellent_cabang_name', $tamp['nama_cabang']);
                        $this->session->set_userdata('xcellent_hakakses', $hakakses);
                        
                       // print_r($this->session->userdata['xcellent_hakakses']); exit();

                         redirect('Back/Order/Show_all_order_note');

//                        if ($this->session->userdata['xcellent_tipe'] == 3 || $this->session->userdata['xcellent_tipe'] == 4)
//                            redirect('Back/Order/Show_all_order_note');
//                        else if ($this->session->userdata['xcellent_tipe'] == 1)
//                            redirect('Back/Cashflow/Show_report_cashflow');
//                        else if ($this->session->userdata['xcellent_tipe'] == 2)
//                            redirect('Back/Order/Show_add_order_note');
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
        $this->session->unset_userdata('xcellent_hakakses');
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
                $navigation = array(
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
            $navigation = array(
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

            if (isset($this->session->userdata['xcellent_id'])) {
                $navigation = array(
                    "menu" => "profile",
                    "submenu" => "setting",
                    "stokhabis" => $this->M_material->Get_material_out_of_stock()
                );

                $data['datasetting'] = $this->M_setting->Get_all_setting();
                $this->load->view('back/v_head_admin_back');
                $this->load->view('back/v_header_back');
                $this->load->view('back/v_navigation_back', $navigation);
                $this->load->view('back/v_setting_back', $data);
                $this->load->view('back/v_footer_back');
            } else {
                redirect('Back/Account/Show_login');
            }
        } else {
            redirect('Back/Account/Show_login');
        }
    }

    public function Change_setting() {

        if (isset($this->session->userdata['xcellent_id'])) {

            if ($this->input->post('button_changesetting')) {
                $this->form_validation->set_rules('name_depositminimal', 'Deposit Minimal', 'required');
                $this->form_validation->set_rules('name_depositbonus', 'Deposit Bonus', 'required|greater_than_equal_to[0]|less_than_equal_to[100]');
                $this->form_validation->set_rules('name_memberprice', 'Member Price', 'required');
                $this->form_validation->set_rules('name_pointprice', 'Point Price', 'required');
                if ($this->form_validation->run() == FALSE) {
                    $navigation = array(
                        "menu" => "profile",
                        "submenu" => "setting",
                        "stokhabis" => $this->M_material->Get_material_out_of_stock()
                    );
                    $data['datasetting'] = $this->M_setting->Get_all_setting();
                    $this->load->view('back/v_head_admin_back');
                    $this->load->view('back/v_header_back');
                    $this->load->view('back/v_navigation_back', $navigation);
                    $this->load->view('back/v_setting_back', $data);
                    $this->load->view('back/v_footer_back');
                } else {

                    $depositminimal = $this->input->post('name_depositminimal');
                    $depositbonus = $this->input->post('name_depositbonus');
                    $memberprice = $this->input->post('name_memberprice');
                    $pointprice = $this->input->post('name_pointprice');
                    $idnya = $this->input->post('name_idsetting');

                    $this->M_setting->Change_setting($depositminimal, $depositbonus, $memberprice, $pointprice, $idnya);
                    $this->session->set_flashdata('pesanform', "Your Setting has been changed");
                    $this->session->keep_flashdata('pesanform');


                    redirect('Back/Account/Show_setting');
                }
            } else {
                redirect('Back/Account/Show_setting');
            }
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

                        $ci = get_instance();
                        $config['protocol'] = "smtp";
                        //$config['smtp_host'] = "smtp.gmail.com";
                        $config['smtp_host'] = "ssl://mars-printing.com";
                        $config['smtp_port'] = "465";
                        $config['smtp_user'] = "info@mars-printing.com";
                        $config['smtp_pass'] = "admin123";
                        $config['charset'] = "utf-8";
                        $config['mailtype'] = "html";
                        $config['newline'] = "\r\n";
                        $config['crlf'] = "\r\n";
                        $ci->email->initialize($config);

                        
                        $ci->email->from('info@mars-printing.com', 'Mars-Printing');
                        $ci->email->to($email);
                        $ci->email->subject("Reset password");
                        $ci->email->message("Hello, here is your new password : ".$newpassword." .");
                        if ($this->email->send()) {

                            //    echo 'Email sent.';
                        } else {
                            show_error($this->email->print_debugger());
                        }
                        

                        $this->session->set_flashdata('pesanform', "New password has been sent to your email.");
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

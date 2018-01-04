<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start();
class Email extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');


        if (isset($this->session->userdata['xcellent_id'])) {



            $this->load->model('M_material');
            $this->load->model('M_member');
            $this->load->helper(array('form', 'url', 'string', 'date'));
            $this->load->library('form_validation');
            $this->load->library('email');
        } else {
            redirect('Back/Account/Show_login');
        }
    }

    public function index() {
        
    }

    public function Show_email() {
        $navigation = array(
            "menu" => "profile",
            "submenu" => "email",
            "stokhabis" => $this->M_material->Get_material_out_of_stock()
        );
        $data['listcounter'] = $this->M_member->Get_count_member_per_100()->count / 100 + 1;
        // print_r((int)$data['listcounter']);exit();
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_email_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Send_information() {

        $this->form_validation->set_rules('name_subject', 'Subject', 'required');
        $this->form_validation->set_rules('name_content', 'Content', 'required');
        $this->form_validation->set_rules('name_counter', 'Counter', 'required');

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
                $list = [];
                $arrayku = $this->M_member->Get_member_per_100($this->input->post("name_counter"));
                //8$query = $this->db->get('mytable', 10, 20);

                foreach ($arrayku as $item) {
                    array_push($list, $item['email']);
                }

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
                $ci->email->to($list);
                $ci->email->subject($this->input->post("name_subject"));
                $ci->email->message($this->input->post("name_content"));
                if ($this->email->send()) {
                    $this->session->set_flashdata('pesanform', "Your Email has been sent");
                    $this->session->keep_flashdata('pesanform');
                    redirect('Back/Email/Show_email');
                //    echo 'Email sent.';
                } else {
                    show_error($this->email->print_debugger());
                }
            }
        }
    }

}

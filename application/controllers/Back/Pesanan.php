<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//session_start();
class Pesanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        ;
        if (isset($this->session->userdata['id'])) {


            $this->load->model('M_pesanan');

            $this->load->helper(array('form', 'url', 'string', 'date'));
            $this->load->library('form_validation');
//aku tutup pas betulin modal pesananbarang
            // $this->form_validation->set_rules('name', 'Name', 'required');
            //  $this->form_validation->set_rules('name_txt_Password2', 'Ulangi Password', 'required|matches[name_txt_Password1]|min_length[8]');
        } else {
            redirect('Back/Login/index');
        }
    }

    public function index() {


        $data['tablepesanan'] = $this->M_pesanan->Show_all_pesanan();

        $navigation=array(
            "menu" => "order",
            "submenu" => "add"
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_pesanan_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Show_all_pesanan() {
        $data['tablepesanan'] = $this->M_pesanan->Show_all_pesanan();

        $navigation=array(
            "menu" => "order",
            "submenu" => "add"
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_pesanan_back', $data);
        $this->load->view('back/v_footer_back');
    }

    public function Show_one_pesanan_barang($idpesanan) {
        $data['tablepesananbarang'] = $this->M_pesanan->Show_one_pesanan_barang($idpesanan);

        $navigation=array(
            "menu" => "order",
            "submenu" => "add"
        );
        $this->load->view('back/v_head_admin_back');
        $this->load->view('back/v_header_back');
        $this->load->view('back/v_navigation_back', $navigation);
        $this->load->view('back/v_pesananbarang_back', $data);
        $this->load->view('back/v_footer_back');
    }

    

    function Show_invoice() {
        $this->load->view('back/v_head_admin_back');

        $this->load->view('back/v_invoice_back');
    }

    function Accept_order() {
        if ($this->input->post('name_btn_Accept')) {
            $id = $this->input->post('name_hidden_accept');


            $this->M_pesanan->Accept_pesanan($id);
            $this->session->set_flashdata('pesanform', "sukses");
            $this->session->keep_flashdata('pesanform');


            redirect('Back/Pesanan/index');
        }
    }

    function Send_order() {
        if ($this->input->post('name_btn_Send')) {
            $id = $this->input->post('name_hidden_send');


            $this->M_pesanan->Send_pesanan($id);
            $this->session->set_flashdata('pesanform', "sukses");
            $this->session->keep_flashdata('pesanform');


            redirect('Back/Pesanan/index');
        }
    }

    function Finish_order() {
        if ($this->input->post('name_btn_Finish')) {
            $id = $this->input->post('name_hidden_finish');


            $this->M_pesanan->Finish_pesanan($id);
            $this->session->set_flashdata('pesanform', "sukses");
            $this->session->keep_flashdata('pesanform');


            redirect('Back/Pesanan/index');
        }
    }

    function Edit_pesanan_barang() {


        if ($this->input->post('buttonSubmitEditPesanan')) {

            $idpesanan = $this->input->post('idpesanan');
            $idbarang = $this->input->post('idbarang');
            $subtotal = $this->input->post('subtotal');

            //if barang di gratiskan
            if ($this->input->post('productprice') == null) {
                $jumlah = 0;
            } else {
                $harga = $this->input->post('productprice');
            }

            //kalau quantitiy barang 0 bearti di hapuskan
            if ($this->input->post('quantity') == null || $this->input->post('quantity') == 0) {
                $jumlah = 0;
                //HAPUS pesanan_barang
                $this->M_pesanan->Hapus_pesanan_barang($this->input->post('idpesanan'), $this->input->post('idbarang'));
                $this->session->set_flashdata('pesanform', "sukses menghapus item pesanan");
            } else {
                $jumlah = $this->input->post('quantity');

                $this->M_pesanan->Edit_pesanan_barang($idpesanan, $idbarang, $jumlah, $harga, $subtotal);
                $this->session->set_flashdata('pesanform', 'sukses merubah pesanan');
            }

            redirect('Back/Pesanan/Show_one_pesanan_barang/' . $idpesanan);
        }
    }
    
    public function Hapus_pesanan_barang() {
        if ($this->input->post('name_btn_Hapus')) {
            $idpesanan = $this->input->post('name_hidden_id_delete');
            $idbarang = $this->input->post('name_hidden_barang_delete');

            $this->M_pesanan->Hapus_pesanan_barang($idpesanan,$idbarang);
            $this->session->set_flashdata('pesanform', "sukses sukses menghapus item pesanan");
            $this->session->keep_flashdata('pesanform');


            redirect('Back/Pesanan/Show_one_pesanan_barang/' . $idpesanan);
        }
    }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Login_model');
        $this->load->model('Stok_model');
        // if($this->Login_model->isNotLogin()) redirect('login');

    }

    public function index()
    {
        $data['stok'] = $this->Stok_model->total_sum('jumlah','','stok');
        // $data['suratkeluar'] = $this->Surat_model->showSuratKeluar()->num_rows();

        $this->load->view('parts/header');
        $this->load->view('parts/sidebar');
        $this->load->view('v_dashboard',$data);
        $this->load->view('parts/footer');
    }


}
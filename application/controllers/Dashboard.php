<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Login_model');
        $this->load->model('Dashboard_model');
        $this->load->model('Capaian_model');
        // if($this->Login_model->isNotLogin()) redirect('login');

    }

    public function index()
    {
        $data['stok'] = $this->Dashboard_model->total_sum('jumlah','','stok');
        $data['jum_capaian'] = $this->Dashboard_model->total_sum('capaian_vaksin','','capaian');
        $data['pengguna'] = $this->Dashboard_model->total_count('id_personel','personel');
        $data['capaian'] = $this->Capaian_model->showGrafik()->result();
        $data['capaian2'] = $this->Capaian_model->showHarian()->result();

        if($this->input->post() != null){
            $tgl1 = $this->input->post('tgl1');
            $tgl2 = $this->input->post('tgl2');

            if($tgl1 == "" || $tgl2 == ""){
                $data['tbcapaian'] = $this->Capaian_model->showDashCapaian()->result();
            }else{
                $data['tbcapaian'] = $this->Capaian_model->filterCapaian($tgl1, $tgl2)->result();
            }

            $this->load->view('parts/header');
            $this->load->view('parts/sidebar');
            $this->load->view('v_dashboard',$data);
            $this->load->view('parts/footer');
        }else{
            $data['tbcapaian'] = $this->Capaian_model->showDashCapaian()->result();

            $this->load->view('parts/header');
            $this->load->view('parts/sidebar');
            $this->load->view('v_dashboard', $data);
            $this->load->view('parts/footer');
        }
        
    }

    public function getGrafik()
    {
        $data['capaian'] = $this->Capaian_model->showGrafik()->result();

        $rows = array();
        foreach($data['capaian'] as $datacapai){
            $dt[0] = $datacapai->jenis_vaksin;
            $dt[1] = $datacapai->capaian_vaksin;
              array_push($rows, $dt);
        }

        print json_encode($rows, JSON_NUMERIC_CHECK);
    }

    public function tabelCapaian()
    {
        $data['stok'] = $this->Dashboard_model->total_sum('jumlah','','stok');
        $data['jum_capaian'] = $this->Dashboard_model->total_sum('capaian_vaksin','','capaian');
        $data['pengguna'] = $this->Dashboard_model->total_count('id_personel','personel');
        $data['capaian'] = $this->Capaian_model->showGrafik()->result();
        $data['capaian2'] = $this->Capaian_model->showHarian()->result();
        
        if($this->input->post() != null){
            $tgl1 = $this->input->post('tgl1');
            $tgl2 = $this->input->post('tgl2');

            if($tgl1 == "" || $tgl2 == ""){
                $data['tbcapaian'] = $this->Capaian_model->showDashCapaian()->result();
            }else{
                $data['tbcapaian'] = $this->Capaian_model->filterCapaian($tgl1, $tgl2)->result();
            }

            $this->load->view('parts/header');
            $this->load->view('parts/sidebar');
            $this->load->view('v_dashboard',$data);
            $this->load->view('parts/footer');
        }else{
            $data['tbcapaian'] = $this->Capaian_model->showDashCapaian()->result();

            $this->load->view('parts/header');
            $this->load->view('parts/sidebar');
            $this->load->view('v_dashboard', $data);
            $this->load->view('parts/footer');
        }
    }


}
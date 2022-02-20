<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Capaian extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Capaian_model');

    }

    public function index()
    {
        $data['capaian'] = $this->Capaian_model->showCapaian()->result();

        $this->load->view('parts/header');
        $this->load->view('parts/sidebar');
        $this->load->view('v_capaian',$data);
        $this->load->view('parts/footer');
    }

    public function edit()
    {
        $id = $this->input->post('id');

        $data = array(
            'tgl_capaian' => $this->input->post('tgl_vaksin'),
            'lokasi_vaksin' => $this->input->post('lokasi_vaksin'),
            'capaian_vaksin' => $this->input->post('capaian_vaksin'),
            'jenis_vaksin' => $this->input->post('jenis_vaksin'),
            'asal_vaksin' => $this->input->post('asal_vaksin')
        );

        $ubah = $this->Capaian_model->editCapaian($id, $data);
        if($ubah)
        {
            $this->session->set_flashdata('message2','successfull'); 
            redirect('capaian');
        }
        else
        {
            $this->session->set_flashdata('message2','error'); 
            redirect('capaian');
        }

    }

    public function create()
    {
        $data = array(
            'tgl_capaian' => $this->input->post('tgl_vaksin'),
            'lokasi_vaksin' => $this->input->post('lokasi_vaksin'),
            'capaian_vaksin' => $this->input->post('capaian_vaksin'),
            'jenis_vaksin' => $this->input->post('jenis_vaksin'),
            'asal_vaksin' => $this->input->post('asal_vaksin')
        );

        $simpan = $this->Capaian_model->createCapaian($data);
        if($simpan)
        {
            $this->session->set_flashdata('message','successfull'); 
            redirect('capaian');
        }
        else
        {
            $this->session->set_flashdata('message','error'); 
            redirect('capaian');
        }

    }

    public function delete()
    {
        $id = $this->input->post('id');
        
        $hapus = $this->Capaian_model->deleteCapaian($id);
        if($hapus)
        {
            $this->session->set_flashdata('message3','successfull');
            redirect('capaian');
        }
        else
        {
            $this->session->set_flashdata('message3','error');
            redirect('capaian');
        }
    }

}
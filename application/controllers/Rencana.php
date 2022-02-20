<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rencana extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Rencana_model');

    }

    public function index()
    {
        $data['rencana'] = $this->Rencana_model->showRencana()->result();

        $this->load->view('parts/header');
        $this->load->view('parts/sidebar');
        $this->load->view('v_rencana',$data);
        $this->load->view('parts/footer');
    }

    public function edit()
    {
        $id = $this->input->post('id');

        $data = array(
            'tgl_rencana' => $this->input->post('tgl_vaksin'),
            'lokasi_vaksin' => $this->input->post('lokasi_vaksin'),
            'rencana_vaksin' => $this->input->post('rencana_vaksin'),
            'jenis_vaksin' => $this->input->post('jenis_vaksin'),
            'asal_vaksin' => $this->input->post('asal_vaksin')
        );

        $ubah = $this->Rencana_model->editRencana($id, $data);
        if($ubah)
        {
            $this->session->set_flashdata('message2','successfull'); 
            redirect('rencana');
        }
        else
        {
            $this->session->set_flashdata('message2','error'); 
            redirect('rencana');
        }

    }

    public function create()
    {
        $data = array(
            'tgl_rencana' => $this->input->post('tgl_vaksin'),
            'lokasi_vaksin' => $this->input->post('lokasi_vaksin'),
            'rencana_vaksin' => $this->input->post('rencana_vaksin'),
            'jenis_vaksin' => $this->input->post('jenis_vaksin'),
            'asal_vaksin' => $this->input->post('asal_vaksin')
        );

        $simpan = $this->Rencana_model->createRencana($data);
        if($simpan)
        {
            $this->session->set_flashdata('message','successfull'); 
            redirect('rencana');
        }
        else
        {
            $this->session->set_flashdata('message','error'); 
            redirect('rencana');
        }

    }

    public function delete()
    {
        $id = $this->input->post('id');
        
        $hapus = $this->Rencana_model->deleteRencana($id);
        if($hapus)
        {
            $this->session->set_flashdata('message3','successfull');
            redirect('rencana');
        }
        else
        {
            $this->session->set_flashdata('message3','error');
            redirect('rencana');
        }
    }

}
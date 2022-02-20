<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Stok_model');

    }

    public function index()
    {
        $data['stok'] = $this->Stok_model->showStok()->result();

        $this->load->view('parts/header');
        $this->load->view('parts/sidebar');
        $this->load->view('v_stok',$data);
        $this->load->view('parts/footer');
    }

    public function edit()
    {
        $id = $this->input->post('id');

        $data = array(
            'jenis_vaksin' => $this->input->post('jenis_vaksin'),
            'jumlah' => $this->input->post('jumlah_vaksin'),
            'kadaluarsa' => $this->input->post('kadaluarsa_vaksin'),
            'keterangan' => $this->input->post('keterangan_vaksin')
        );

        $ubah = $this->Stok_model->editStok($id, $data);
        if($ubah)
        {
            $this->session->set_flashdata('message2','successfull'); 
            redirect('stok');
        }
        else
        {
            $this->session->set_flashdata('message2','error'); 
            redirect('stok');
        }

    }

    public function create()
    {
        $data = array(
            'jenis_vaksin' => $this->input->post('jenis_vaksin'),
            'jumlah' => $this->input->post('jumlah_vaksin'),
            'kadaluarsa' => $this->input->post('kadaluarsa_vaksin'),
            'keterangan' => $this->input->post('keterangan_vaksin')
        );

        $simpan = $this->Stok_model->createStok($data);
        if($simpan)
        {
            $this->session->set_flashdata('message','successfull'); 
            redirect('stok');
        }
        else
        {
            $this->session->set_flashdata('message','error'); 
            redirect('stok');
        }

    }

    public function delete()
    {
        $id = $this->input->post('id');
        
        $hapus = $this->Stok_model->deleteStok($id);
        if($hapus)
        {
            $this->session->set_flashdata('message3','successfull');
            redirect('stok');
        }
        else
        {
            $this->session->set_flashdata('message3','error');
            redirect('stok');
        }
    }

}
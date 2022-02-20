<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personel extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Personel_model');

    }

    public function index()
    {
        $data['personel'] = $this->Personel_model->showPersonel()->result();

        $this->load->view('parts/header');
        $this->load->view('parts/sidebar');
        $this->load->view('v_personel', $data);
        $this->load->view('parts/footer');
    }

    public function create()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'pangkat' => $this->input->post('pangkat'),
            'nrp' => $this->input->post('nrp'),
            'jabatan' => $this->input->post('jabatan'),
            'no_telpon' => $this->input->post('telp'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('nrp'), PASSWORD_BCRYPT)
        );
        $simpan = $this->Personel_model->createPersonel($data);
        if($simpan)
        {
            $this->session->set_flashdata('message','successfull'); 
            redirect('personel');
        }
        else
        {
            $this->session->set_flashdata('message','error'); 
            redirect('personel');
        }

    }

    public function edit()
    {
        $id = $this->input->post('id');

        $data = array(
            'nama' => $this->input->post('nama'),
            'pangkat' => $this->input->post('pangkat'),
            'nrp' => $this->input->post('nrp'),
            'jabatan' => $this->input->post('jabatan'),
            'no_telpon' => $this->input->post('telp'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('nrp'), PASSWORD_BCRYPT)
        );
        $ubah = $this->Personel_model->editPersonel($id, $data);
        if($ubah)
        {
            $this->session->set_flashdata('message2','successfull'); 
            redirect('personel');
        }
        else
        {
            $this->session->set_flashdata('message2','error'); 
            redirect('personel');
        }
    }

    public function delete()
    {
        $id = $this->input->post('id');
        
        $hapus = $this->Personel_model->deletePersonel($id);
        if($hapus)
        {
            $this->session->set_flashdata('message3','successfull');
            redirect('personel');
        }
        else
        {
            $this->session->set_flashdata('message3','error');
            redirect('personel');
        }
    }



    }
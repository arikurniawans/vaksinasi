<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rencana extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Rencana_model');
        $this->load->model('Stok_model');

    }

    public function index()
    {
        $data['rencana'] = $this->Rencana_model->showRencana()->result();
        $data['stok'] = $this->Stok_model->showDataStok()->result();

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
            // 'rencana_vaksin' => $this->input->post('rencana_vaksin'),
            'id_stok' => $this->input->post('jenis_vaksin'),
            'asal_vaksin' => $this->input->post('asal_vaksin')
        );
        
        $cekstok =  $this->Stok_model->detailStok($this->input->post('jenis_vaksin'))->result();

        if($this->input->post('rencana_vaksin') > $cekstok[0]->jumlah){
            $this->session->set_flashdata('message','warn');
            redirect('rencana');
        }else{
            date_default_timezone_set('Asia/Jakarta');
            $tgl = date('Y-m-d');
            $expire = strtotime($cekstok[0]->kadaluarsa);
            $today = strtotime($tgl);

            if($expire <= $today) {
                $cekrencana =  $this->Rencana_model->detailRencana()->result();

                if($this->input->post('rencana_vaksin') == $cekrencana[0]->rencana_vaksin){
                    
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
                }else{
                    $kurang = $this->Stok_model->kurangStok($this->input->post('jenis_vaksin'), $this->input->post('rencana_vaksin'));

                    $tambah = $this->Rencana_model->tambahRencana($id, $this->input->post('rencana_vaksin'));

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

            }else{ 
                $this->session->set_flashdata('message','expired');
                redirect('rencana'); 
            }
            
        }

    }

    public function create()
    {
        $data = array(
            'tgl_rencana' => $this->input->post('tgl_vaksin'),
            'lokasi_vaksin' => $this->input->post('lokasi_vaksin'),
            'rencana_vaksin' => $this->input->post('rencana_vaksin'),
            'id_stok' => $this->input->post('jenis_vaksin'),
            'asal_vaksin' => $this->input->post('asal_vaksin')
        );       

        $cekstok =  $this->Stok_model->detailStok($this->input->post('jenis_vaksin'))->result();

        if($this->input->post('rencana_vaksin') > $cekstok[0]->jumlah){
            $this->session->set_flashdata('message','warn');
            redirect('rencana');
        }else{
            date_default_timezone_set('Asia/Jakarta');
            $tgl = date('Y-m-d');
            $expire = strtotime($cekstok[0]->kadaluarsa);
            $today = strtotime($tgl);

            if($expire <= $today) { 
                $kurang = $this->Stok_model->kurangStok($this->input->post('jenis_vaksin'), $this->input->post('rencana_vaksin'));

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

            }else{ 
                $this->session->set_flashdata('message','expired');
                redirect('rencana'); 
            }
            
        }

    }

    public function delete()
    {
        $id = $this->input->post('id');

        $kembali = $this->Stok_model->kembaliStok($this->input->post('jenis'), $this->input->post('rencana'));
        
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
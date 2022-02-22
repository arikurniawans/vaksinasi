<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Capaian extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Capaian_model');
        $this->load->model('Stok_model');

    }

    public function index()
    {
        $data['capaian'] = $this->Capaian_model->showCapaian()->result();
        $data['stok'] = $this->Stok_model->showDataStok()->result();

        $this->load->view('parts/header');
        $this->load->view('parts/sidebar');
        $this->load->view('v_capaian', $data);
        $this->load->view('parts/footer');
    }

    public function edit()
    {
        $id = $this->input->post('id');

        $data = array(
            'tgl_capaian' => $this->input->post('tgl_vaksin'),
            'lokasi_vaksin' => $this->input->post('lokasi_vaksin'),
            // 'capaian_vaksin' => $this->input->post('capaian_vaksin'),
            'id_stok' => $this->input->post('jenis_vaksin'),
            'asal_vaksin' => $this->input->post('asal_vaksin')
        );

        $cekstok =  $this->Stok_model->detailStok($this->input->post('jenis_vaksin'))->result();

        if($this->input->post('capaian_vaksin') > $cekstok[0]->jumlah){
            $this->session->set_flashdata('message','warn');
            redirect('capaian');
        }else{
            date_default_timezone_set('Asia/Jakarta');
            $tgl = date('Y-m-d');
            $expire = strtotime($cekstok[0]->kadaluarsa);
            $today = strtotime($tgl);

            if($expire <= $today) {
                $cekcapaian =  $this->Capaian_model->detailCapaian()->result();

                if($this->input->post('capaian_vaksin') == $cekcapaian[0]->capaian_vaksin){
                    
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
                }else{
                    $kurang = $this->Stok_model->kurangStok($this->input->post('jenis_vaksin'), $this->input->post('capaian_vaksin'));

                    $tambah = $this->Capaian_model->tambahCapaian($id, $this->input->post('capaian_vaksin'));

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

            }else{ 
                $this->session->set_flashdata('message','expired');
                redirect('capaian'); 
            }
            
        }

    }

    public function create()
    {
        $data = array(
            'tgl_capaian' => $this->input->post('tgl_vaksin'),
            'lokasi_vaksin' => $this->input->post('lokasi_vaksin'),
            'capaian_vaksin' => $this->input->post('capaian_vaksin'),
            'id_stok' => $this->input->post('jenis_vaksin'),
            'asal_vaksin' => $this->input->post('asal_vaksin')
        );        

        $cekstok =  $this->Stok_model->detailStok($this->input->post('jenis_vaksin'))->result();

        if($this->input->post('capaian_vaksin') > $cekstok[0]->jumlah){
            $this->session->set_flashdata('message','warn');
            redirect('capaian');
        }else{
            date_default_timezone_set('Asia/Jakarta');
            $tgl = date('Y-m-d');
            $expire = strtotime($cekstok[0]->kadaluarsa);
            $today = strtotime($tgl);

            if($expire <= $today) { 
                $kurang = $this->Stok_model->kurangStok($this->input->post('jenis_vaksin'), $this->input->post('capaian_vaksin'));

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

            }else{ 
                $this->session->set_flashdata('message','expired');
                redirect('capaian'); 
            }
            
        }

    }

    public function delete()
    {
        $id = $this->input->post('id');
        
        $kembali = $this->Stok_model->kembaliStok($this->input->post('jenis'), $this->input->post('capai'));

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
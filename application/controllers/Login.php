<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->library(array('form_validation','pagination','session'));
        $this->load->model('Login_model');

    }

	public function index()
	{
        
        if($this->Login_model->logged_in()){
            //jika memang session sudah terdaftar
            redirect('dashboard');
        }else{
            $this->load->view('v_login');
        }
        
	}
	
	public function signin(){
        
		$in['username'] = $this->input->post('username');
        $in['password'] = $this->input->post('password');
        $this->Login_model->check_login($in);
       
    }
	
	public function signout(){
        $this->session->sess_destroy();
		redirect('Login');
    }
}
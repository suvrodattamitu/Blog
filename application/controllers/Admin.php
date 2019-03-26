<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('uname','User Name','required|alpha');
		$this->form_validation->set_rules('upassword','User Password','required|max_length[15]');

		if ( $this->form_validation->run() ){
			$uname     = $this->input->post('uname');
			$upassword = $this->input->post('upassword');
			$this->load->model('loginmodel');

			$res = $this->loginmodel->isvalid($uname,$upassword);
			if( $res ){
				//login now data is valid
				$this->load->library('session');
				$this->session->set_userdata('id',$res->id);
				$this->load->view('admin/dashboard');
				echo "results matched with name = ".$res->username." and email = ".$res->email;
			}else{
				//data is not valid
				echo "results not matched";
				$this->load->view('admin/login');

			}

			//echo "successfull and valid with name and Password ".$uname." ".$upassword;
		}else{
			//echo validation_errors();
			$this->load->view('admin/login');
		}

	}

}

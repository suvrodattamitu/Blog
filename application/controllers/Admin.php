<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('uname','User Name','required|alpha');
		$this->form_validation->set_rules('upassword','User Password','required|max_length[15]');

		if ( $this->form_validation->run() ){
			echo "successfull and valid";
		}else{
			//echo validation_errors();
			$this->load->view('users/article_list');
		}

	}

}

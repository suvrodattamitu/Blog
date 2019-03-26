<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$this->load->model('Authenticate');
		$data['users'] = $this->Authenticate->getdata();
		print_r($data);

		$this->load->view('welcome',$data);
	}

}

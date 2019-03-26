<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		//$this->load->helper('url');
		$this->load->view('users/article_list');
	}

	
	public function User()
	{
		$this->load->model('User');
		$data['users'] = $this->User->userdata();

		//print_r($data);

		$this->load->view('users/user',$data);
	}

}

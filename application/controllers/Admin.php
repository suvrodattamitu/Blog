<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function login()
	{
		if( $this->session->userdata('id') ){
		 	return redirect('admin/article');
		}
		

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
				return redirect('admin/article');
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

	public function register(){
		$this->load->view('admin/register');
	}

	public function check_valid(){
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','User Name','required|alpha');
		$this->form_validation->set_rules('firstname','User First Name','required|alpha');
		$this->form_validation->set_rules('lastname','User Last Name','required|alpha');
		$this->form_validation->set_rules('email','User Email','required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password1','Password','required|max_length[15]');
		$this->form_validation->set_rules('password2','Password Confirmation','required|max_length[15]');

		//Sending Mail
		if ( $this->form_validation->run() ){
			$this->load->library('email');
			$this->email->from(set_value('email'),set_value('firstname'));
			$this->email->to('suvrodatta95@gmail.com');
			$this->email->subject('Registration Greetings');
			$this->email->message('Thank you for registration');
			$this->email->set_newline("\r\n");
			$this->email->send();

			if($this->email->send()){
				echo "email send successfully";
			}else{
				show_error($this->email->print_debugger());
			}
			echo "successfull and valid with name and Password ".$uname." ".$upassword;
		}else{
			$this->load->view('admin/register');
			//echo validation_errors();	
		}

	}

	public function article(){

		if( !$this->session->userdata('id') ){

		 	return redirect('admin/login');
		}
		

		$this->load->model('loginmodel');
		$articles = $this->loginmodel->article_list();
		// echo "</pre>";
		// print_r($articles);
		// exit;
		$this->load->view('admin/dashboard',['articles'=>$articles]);

	}

	public function logout(){
		$this->session->unset_userdata('id');
		return redirect('admin/login');
	}



}

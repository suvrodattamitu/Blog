<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	public function updatearticle($id){

		if( $this->form_validation->run('add_article_rules') ){
			
			$articlepost = $this->input->post();
			$this->load->model('loginmodel');


			if( $this->loginmodel->updatearticle($id,$articlepost) ){
				//use this type or
				$this->session->set_flashdata('msg','Article Edited successfully');
				$this->session->set_flashdata('msg_class','text-success');

				//echo "inserted successfully";
			}else{
				//echo "not inserted";
				$this->session->set_flashdata('msg','Article Not Edited');
				$this->session->set_flashdata('msg_class','text-danger');

			}

			return redirect('admin/article');

		}else{
			$this->load->model('loginmodel');
			$article = $this->loginmodel->findarticle($id);
			$this->load->view('admin/edit_article',['article'=>$article]);
		}

	}

	public function editarticle($id){

		$this->load->model('loginmodel');
		$article = $this->loginmodel->findarticle($id);
		$this->load->view('admin/edit_article',['article'=>$article]);
		//echo $id;
	}

	public function deletearticle(){

		$id = $this->input->post('id');
		// echo "users";
		// print_r($id);
		// exit;

		// echo "ok";
		$this->load->model('loginmodel');
		if( $this->loginmodel->deletepost($id) ){
			//use this type or
			$this->session->set_flashdata('msg','Article Deleted successfully');
			$this->session->set_flashdata('msg_class','text-success');

			//echo "inserted successfully";
		}else{
			//echo "not inserted";
			$this->session->set_flashdata('msg','Article Not Deleted');
			$this->session->set_flashdata('msg_class','text-danger');

		}

		return redirect('admin/article');
	}

	public function addarticle(){

		return $this->load->view('admin/add_article');

	}

	public function validateaddfield(){

		if( $this->form_validation->run('add_article_rules') ){
			//you can use thise or simple code bellow to receive from post
			//$this->input->post('title');
			//$this->input->post('body');
			$articlepost = $this->input->post();
			// print_r($articlepost);
			// exit;

			// echo "ok";
			$this->load->model('loginmodel');
			if( $this->loginmodel->addpost($articlepost) ){
				//use this type or
				$this->session->set_flashdata('msg','Article inserted successfully');
				$this->session->set_flashdata('msg_class','text-success');

				//echo "inserted successfully";
			}else{
				//echo "not inserted";
				$this->session->set_flashdata('msg','Article Not Added');
				$this->session->set_flashdata('msg_class','text-danger');

			}

			return redirect('admin/article');

		}else{
			return $this->load->view('admin/add_article');
		}

	}

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
				$this->session->set_flashdata('login_fail','Invalid Username or Password');
				return redirect('admin/login');
				//echo "results not matched";
				//$this->load->view('admin/login');

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
		$this->form_validation->set_rules('password','Password','required|max_length[15]');

		//Sending Mail
		if ( $this->form_validation->run() ){

			$user = $this->input->post();
			$this->load->model('loginmodel');
			if( $this->loginmodel->adduser($user) ){
				$this->session->set_flashdata('user','User Added');
				$this->session->set_flashdata('user_class','text-success');
				//echo "inserted successfully";
				return redirect('admin/article');
			}else{
				$this->session->set_flashdata('user','User Not Added');
				$this->session->set_flashdata('user_class','text-danger');
				//echo "not inserted";
			}


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

		$config = [
			'base_url'   => base_url('admin/article'), 
			'per_page'   => 1,
			'total_rows' => count($articles),
			// 'full_tag_open'=>"<ul class='pagination'>",
	  //       'full_tag_close'=>"</ul>",
	  //       'next_tag_open' =>"<li class='page-item'>",
	  //       'next_tag_close' =>"</li>",
	  //       'prev_tag_open' =>"<li>",
	  //       'prev_tag_close' =>"</li>",
	  //       'num_tag_open' =>"<li>",
	  //       'num_tag_close' =>"<li>",
	  //       'cur_tag_open' =>"<li class='active'><a>",
	  //       'cur_tag_close' =>"</a></li>"
		];

		$config['full_tag_open'] = '<div><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div><!--pagination-->';
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		$config['anchor_class'] = 'follow_link';

		$this->pagination->initialize($config);
		$articles = $this->loginmodel->artpag($config['per_page'],$this->uri->segment(3));

		//$this->load->model('loginmodel');
		//$articles = $this->loginmodel->article_list();
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

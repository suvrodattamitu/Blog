<?php 
	
	class loginmodel extends CI_model{

		public function isvalid($username,$userpassword){

			$q = $this->db->where(['username'=>$username,'password'=>$userpassword])->from('users')->get();

			return $q->row();

			//$q = $this->db->where('id',2)->get('users');
			//return $q->result();

			//$q = $this->db->query("select * from users where name=$username and password=$userpassword");
			
			// if( $q->num_rows() ){
			// 	return true;
			// }else{
			// 	return false;
			// }

		}

		public function article_list(){

			$this->load->library('session');
			$user_id  = $this->session->userdata('id');
			$articles = $this->db->select('title')->from('articles')->where(['user_id',$user_id])->get();
			// echo("</pre>");
			// print_r($articles->result());
			// exit;
			return $articles->result();

		}

	}

?>
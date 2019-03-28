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

		//for pagination
		public function artpag($limit,$offset){
			//$this->load->library('session');
			$user_id  = $this->session->userdata('id');
			echo $user_id;
			$articles = $this->db->select()->where(['user_id'=>$user_id])->limit($limit,$offset)->get('articles');
			// echo("</pre>");
			// print_r($articles->result());
			// exit;
			return $articles->result();
		}

		public function article_list(){

			$this->load->library('session');
			$user_id  = $this->session->userdata('id');
			echo $user_id;
			$articles = $this->db->select()->where(['user_id'=>$user_id])->get('articles');
			// echo("</pre>");
			// print_r($articles->result());
			// exit;
			return $articles->result();

		}

		public function addpost($array){
			//html name field and database table key name must be same
			return $this->db->insert('articles',$array);
		}

		public function adduser($array){

			return $this->db->insert('users',$array);

		}

		public function deletepost($id){
			return $this->db->delete('articles',['id'=>$id]);
		}

		public function findarticle($id){
			$article = $this->db->select()->where('id',$id)->get('articles');
			// echo "<pre>"; 
			// print_r($article->row());
			// exit;
			return $article->row();
		}

		public function updatearticle($id,Array $article){

			//$article is an array that contain title,body.;

			return $res =  $this->db->where('id',$id)->update('articles',$article);


		}

	}

?>
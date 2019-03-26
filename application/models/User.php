<?php 
	
	class User extends CI_model{

		public function userdata(){

			$this->load->database();

			$this->db->where('id',1);

			$q = $this->db->get('users');

			$result = $q->result();

			return $result;

		}
	}

?>
<?php


class Main_mod extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}

	public function login() {
		$query = $this->db->get_where("user", array(
			"username" => $this->input->post("username"))
		);
		if($query->num_rows() > 0) {
			$row = $query->row_array();
			if($this->verify($this->input->post("password"), $row['password'])) {
				return true;
			}
			else {
				$msg = "Password salah";
				return $msg;
			}
		}
		else {
			$msg = "Akun tidak ada";
			return $msg;
		}
	}

	public function register() {
		$query = $this->db->query("SELECT * FROM `user` WHERE username='". $this->input->post("username") ."' IN ( SELECT email FROM `user` WHERE email='". $this->input->post("email") ."')");
		if($query->num_rows() < 1) {
			$pass = $this->hash($this->input->post("password"));
			$data = array(
				"username" => $this->input->post("username"),
				"email" => $this->input->post("email"),
				"password" => $pass
			);
			if($this->db->insert("user",$data)) {
				return true;
			}
			else {
				return false;
			}
		}
		else {
			$msg = "Username/Email sudah terpakai";
			return $msg;
		}
	}

	public function hash($t) {
		$hash = password_hash($t,PASSWORD_BCRYPT);
		return $hash;
	}

	public function verify($t,$hash) {
		if(password_verify($t,$hash)) {
			return true;
		}
		else {
			return false;
		}
	}

	public function getuserdata($u) {
		$query = $this->db->get_where("user",array("username" => $u));
		return $query->row_array();
	}

	public function getpost($u) {
		$query = $this->db->get_where("blogpost",array("url" => $u));
		if($query->num_rows() > 0) {
			return $query->row_array();
		}
		else {
			return false;
		}
	}

	public function getcatlist() {
		$query = $this->db->get("blogcategory");
		if($query->num_rows() > 0) {
			return $query->result_array();
		}
		else {
			return false;
		}
	}

	public function search() {
		$this->db->like(array("title" => $this->input->post("keyword")));
		$query = $this->db->get("blogpost");

		if($query->num_rows() > 0) {
			return $query->result_array();
		}
		else {
			return false;
		}
	}

	public function getpostcat($K) {
		$query = $this->db->get_where("blogpost",array("category" => $k));
		if($query->num_rows() > 0) {
			return $query->result_array();
		}
		else {
			return false;
		}
	}
}
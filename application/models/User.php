<?php
class User extends CI_Model {
	
	public function __construct() {
		$this->load->database();
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

	public function delTree($dir) {
   		$files = array_diff(scandir($dir), array('.','..'));
    	foreach ($files as $file) {
      		(is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file");
    	}
    	return rmdir($dir);
  	} 

	public function fetch($u = null) {
		if(!is_null($u)) {
			$this->db->select("username,email,rank,activated");
			$this->db->where("username", $u);
			$this->db->limit(1);
			$query = $this->db->get("user");
			if($query->num_rows() > 0) {
				return $query->result();
			}
			else {
				return false;
			}
		}
		else{
			$query = $this->db->get("user");
			return $query->result_array();
		}
	}

	public function valid() {
		$this->db->select("*");
		$this->db->where("username", $this->input->post("username"));
		$this->db->or_where("email", $this->input->post("email"));
		$query = $this->db->get("user");
		if($query->num_rows() < 1) {
			return false;
		}
		else {
			return true;
		}	
	}

	public function getuserrank($u) {
		$query = $this->db->get_where("user",array("username" => $u));
		if($query->num_rows() > 0) {
			return $query->row()->rank;
		}
		else {
			return false;
		}
	}

	public function active($username, $code) {
		$this->db->start_cache();
		$this->db->select("activated");
		$this->db->where(array(
			"username" => $username,
			"activation_code" => $code
		));
		$this->db->stop_cache();
		$query = $this->db->get("user");
		if($query->num_rows() > 0 ){
			if($query->row()->activated != "Y") {
				$this->db->update("user", array(
					"activated" => "Y"
				));
				$this->db->flush_cache();
				return true;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}

	public function login() {
		$query = $this->db->get_where("user", array(
			"username" => $this->input->post("username")
		));
		if($query->num_rows() > 0) {
			if($this->verify($this->input->post("password"),$query->row()->password)) {
				if($query->row()->activated == "Y") {
					return true;
				}
				else {
					return false;
				}
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}

	public function register($code) {
		if(is_null($this->input->post("rank"))) {
			$rank = "member";
		}
		else {
			$rank = $this->input->post("rank");
		}
		$pass = $this->hash($this->input->post("password"));
		$data = array(
			"username" => $this->input->post("username"),
			"email" => $this->input->post("email"),
			"password" => $pass,
			"rank" => $rank,
			'activation_code' => $code
		);
		if($this->db->insert("user",$data)) {
			return true;
		}
		else {
			return false;
		}
	}

	public function edit() {
		if(empty($this->input->post("password"))) {
			$data = array(
				"username" => $this->input->post("username"),
				"email" => $this->input->post("email"),
				"rank" => $this->input->post("rank"),
				"activated" => $this->input->post("activated")
			);
			if($this->db->update("user",$data,array("username" => $this->input->post("oldusername")))) {
				return true;
			}
			else {
				return false;
			}
		}
		else {
			$hash = $this->hash($this->input->post("password"));
			$data = array(
				"username" => $this->input->post("username"),
				"email" => $this->input->post("email"),
				"password" => $hash,
				"rank" => $this->input->post("rank"),
				"activated" => $this->input->post("activated")
			);
			if($this->db->update("user",$data,array("username" => $this->input->post("oldusername")))) {
				return true;
			}
			else {
				return false;
			}
		}
	}

	public function delete() {
		if(null !== $this->input->post("username")) {
			if($this->db->delete("user", array("username" => $this->input->post("username")))){
				rmdir("assets/userfiles/".$this->input->post("username"));
				return true;
			}
			else {
				return false;
			}
		}
		else if(null !== $this->input->post("id")) {
			$query = $this->db->get_where("user", array("id" => $this->input->post("id")));
			$dir = "assets/userfiles/".$query->row()->username . "/";
			if($this->db->delete("user", array("id" => $this->input->post("id")))){
				$this->delTree($dir);
				return true;
			}
			else {
				return false;
			}
		}
	}
}
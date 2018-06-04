<?php
class mc_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}

	public function register() {
		$username = $this->input->post("username");
		$password = hash("sha256",$this->input->post("password"));
		$query = $this->db->get_where("minecraft", array("username" => $username));
		if($query->num_rows() > 0) {
			return false;
		}
		else {
			if($this->db->insert("minecraft", array("username" => $username, "password" => $password))) {
				return true;
			}
			else {
				return false;
			}
		}
	}

	public function getOnline() {
		$query = $this->db->get_where("minecraft" , array("online" => "true"));
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else {
			$msg = "Tidak ada player yang online";
			return $msg;
		}
	}
}

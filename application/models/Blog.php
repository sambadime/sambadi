<?php
class Blog extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}

	public function totalrow() {
		return $this->db->count_all("blogpost");
	}

	public function fetch($url) {
		$this->db->limit(1);
		$query = $this->db->get_where("blogpost", array("url" => $url));
		if($query->num_rows() > 0) {
			return $query->result();
		}
		else {
			return false;
		}
	}

	public function fetchpage($limit, $start) {
		$this->db->limit($limit, $start);
		$this->db->order_by('date', 'DESC');
		$query = $this->db->get("blogpost");
		if($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				$data[] = $row;
			}

			return $data;
		}
		else {
			return false;
		}
	}

	public function fetchall() {
		$query = $this->db->get("blogpost");
		if($query->num_rows() > 0) {
			foreach($query->result() as $row) {
				return $query->result();
			}
		}
		else {
			return false;
		}
	}

	public function search($q,$limit,$start) {
		$this->db->limit($limit, $start);
		$this->db->order_by('date', 'DESC');
		$this->db->like("title",$q);
		$query = $this->db->get("blogpost");
		if($query->num_rows() > 1) {
			foreach($query->result() as $row) {
				$data[] = $row;
			}

			return $data;
		}
		else if($query->num_rows() == 1) {
			return $query->result();
		}
		else {
			return false;
		}
	}

	public function fetch_last_post() {
		$total = $this->totalrow();
		if($total > 5) {
			$this->db->limit(5, $total-5);
			$this->db->order_by('date', 'DESC');
			$query = $this->db->get("blogpost");
			foreach($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else if($total >= 1 && $total <= 5) {
			$this->db->order_by('date', 'DESC');
			$query = $this->db->get("blogpost");
			foreach($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else if($total == 1) {
			$query = $this->db->get("blogpost");
			return $query->result();
		}
		else {
			return false;
		}
	}

	public function fetch_random_post() {
		$this->db->limit(5);
		$this->db->order_by("id", "RANDOM");
		$query = $this->db->get("blogpost");
		if($query->num_rows() > 1) {
			foreach($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		else if($query->num_rows() == 1){
			return $query->result();
		}
		else {
			return false;
		}
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("main_mod");
		$this->load->helper(array("url","form"));
		$this->load->library(array("session","form_validation"));
	}

	public function index() {
		if($this->session->has_userdata("loggedin")) {
			$data['user'] = $this->main_mod->getuserdata($this->session->userdata("username"));
			$this->load->view("main/index",$data);
		}
		else {
			$this->load->view("main/index");
		}
	}

	private function load_view($v = "main/index", $var= null) {
		if($this->session->has_userdata("loggedin")) {
			$data['user'] = $this->main_mod->getuserdata($this->session->userdata("username"));
		}
		$data['cat'] = $this->main_mod->getcatlist();
		if($data['cat'] == false) {
			$data['cat'] = "Tidak ada kategori yang tersedia";
		}
		if($v == "main/login") {
			$this->load->view($v,$var);
		}
		else if($v == "main/register") {
			$this->load->view($v,$var);
		}
		else {
			$this->load->view("main/template/header");
			$this->load->view("main/template/nav",$data);
			if($var != null) {
				$this->load->view($v,$var);
			}
			else {
				$this->load->view($v);
			}
			$this->load->view("main/template/footer");
		}
	}


	public function logout() {
		$this->session->sess_destroy();
		redirect("");
	}

	public function login() {
		if($this->session->has_userdata("loggedin")) {
			redirect("main/index");
		}
		else {
			$this->form_validation->set_rules("username","Username","required");
			$this->form_validation->set_rules("password","Password","required");

			if($this->form_validation->run() === false) {
				$this->load_view("main/login");
			}
			else {
				$res = $this->main_mod->login();
				if($res == true && is_bool($res) == true) {
					if(!empty($_FILES)) {
						$this->uploaduserava($_FILES, $this->input->post("username"));
					}
					$data = array(
						"username" => $this->input->post("username"),
						"loggedin" => true
					);
					$this->session->set_userdata($data);
					redirect("main/index");
				}
				else {
					$data['alertmsg'] = $res;
					$this->load_view("main/login",$data);
				}
			}
		}
	}

	public function register() {
		$this->form_validation->set_rules("username","Username","required");
		$this->form_validation->set_rules("email","Email","required");
		$this->form_validation->set_rules("password","Password","required");

		if($this->form_validation->run() === false) {
			$this->load_view("main/register");
		}
		else {
			$res = $this->main_mod->register();
			if($res == true && is_bool($res) == true) {
				$data = array(
					"username" => $this->input->post("username"),
					"loggedin" => true
				);
				$this->session->set_userdata($data);
				$upload = $this->uploaduserava($this->input->post("username"));
				if($upload != true) {
					$data['alertmsg'] = $upload;
					$this->load_view("main/register",$data);
				}
				else {
					redirect("main/index");
				}
			}
			else {
				$data['alertmsg'] = $res;
				$this->load_view("main/register",$data);
			}
		}
	}

	private function uploaduserava($name) {
		$config['upload_path']          = '../../assets/img/avatars/'.$name.'/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 250;
        $config['max_width']            = 50;
        $config['max_height']           = 50;
        $this->load->library("upload",$config);
        if(!$this->upload->do_upload("userava")) {
        	$err = array('error' => $this->upload->display_errors());
        	return $err;
        }
        else {
        	$err = array('upload_data' => $this->upload->data());
        	return $err;
        }
	}

	public function read($url = "no-arg") {
		if($url == "no-arg") {
			redirect("main/index");
		}
		else {
			$url = html_escape($url);
			if($this->session->has_userdata("loggedin")) {
				$data['user'] = $this->main_mod->getuserdata($this->session->userdata("username"));
			}
			$data['post'] = $this->main_mod->getpost($url);
			if($data['post'] == false) {
				redirect("main/index");
			}
			else {
				$this->load_view("main/read",$data);
			}
		}
	}

	public function search() {
		$this->form_validation->set_rules("keyword","Keyword","required");
		
		if($this->form_validation->run() === true) {
			$res['res'] = $this->main_mod->search();
			if($res != false) {
				$this->load_view("main/search",$res);
			}
			else {
				$this->load_view("main/index");
			}
		}
	}

	public function category($k = null) {
		if($k != null) {
			$res['res'] = $this->main_mod->getpostcat($k);
			if($k != false) {
				$this->load_view("main/category",$res);
			}
			else {
				$this->load_view("main/index");
			}
		}
		else {
			$this->load_view("main/index");
		}
	}

	public function index3() {
		$this->load->view("main/index3");
	}
	public function cs() {
		$this->load->view("main/comingsoon");
	}
}

?>
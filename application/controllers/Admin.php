<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("user");
		$this->load->model("blog");
		$this->load->helper(array("url","form"));
		$this->load->library(array("session","form_validation","email"));
	}

	private function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
    	$pieces = [];
    	$max = mb_strlen($keyspace, '8bit') - 1;
    	for ($i = 0; $i < $length; ++$i) {
        	$pieces []= $keyspace[random_int(0, $max)];
    	}
    	return implode('', $pieces);
	}

	private function sendactcode($code) {
		$this->email->from("sambadigodd@gmail.com", "sambadi");
		$this->email->to($this->input->post("email"));

		$this->email->subject('Account activation');
		$this->email->message('
			<center><h1>sambadi</h1></center>
			<br /><br />
			Username = '.$this->input->post("username").'<br />
			Code = '. $code . '<br />

			You can activate your account by clicking <a href="http://localhost/active/'.$this->input->post('username').'/'. $code . '">here</a> <br />
			Or you can visit http://localhost/active/'.$this->input->post('username').'/'. $code . '
		');

		if(!$this->email->send(FALSE)) {
			return $this->email->print_debugger();
		}
		else {
			return true;
		}
	}

	public function index() {
		if($this->session->has_userdata("loggedin")) {
			redirect("admin/home");
		}
		else {
			$this->form_validation->set_rules("username","Username","required");
			$this->form_validation->set_rules("password","Password","required");

			if($this->form_validation->run() === FALSE) {
				$this->load->view("admin/index");
			}
			else {
				$res = $this->user->login();
				if($res != false) {
					if($this->user->getuserrank($this->input->post("username")) == "admin") {
						$path = glob("assets/userfiles/".$this->input->post("username")."/avatar" . ".*");
						$ext = pathinfo($path[0], PATHINFO_EXTENSION);
						$this->session->set_userdata(array(
							"username" => $this->input->post("username"),
							"loggedin" => true,
							"avatar-path" => base_url()."assets/userfiles/".$this->input->post("username")."/avatar.".$ext,
							"rank" => $this->user->getuserrank($this->input->post("username"))
						));
						$this->session->set_flashdata($error);
						redirect("admin/home");
					}
					else {
						$error = array(
							"error-type" => "danger",
							"error-msg" => "Anda tidak mempunyai izin untuk mengakses halaman ini"
						);
						$this->session->set_flashdata($error);
						redirect("admin/index");
					}
				}
				else {
					$error = array(
						"error-type" => "danger",
						"error-msg" => "Username/Password salah"
					);
					$this->session->set_flashdata($error);
					redirect("admin/index");
				}
			}
		}
		
	}

	public function home() {
		if($this->session->has_userdata("loggedin") && $this->session->userdata("rank") == "admin") {
			$data['post'] = $this->blog->fetchall();
			$this->load->view("admin/home",$data);
		}
		else {
			redirect("admin/index");
		}
	}

	public function fetch() {
		if($this->session->has_userdata("loggedin") && $this->session->userdata("rank") == "admin") {
			if(!is_null($this->input->get("u"))) {
				$res = $this->user->fetch($this->input->get("u"));
				if($res != false) {
					$data['status'] = true;
					foreach ($res as $row => $v) {
						$data['result'] = $v;
					}

					echo json_encode($data);
				}
			}
			else {
				$data['status'] = false;
				$data['result'] = array("username" => "test", "email" => "abcd");

				echo json_encode($data);
			}
		}
	}

	public function useredit() {
		if($this->session->has_userdata("loggedin") && $this->session->userdata("rank") == "admin") {
			$this->form_validation->set_rules("username","Username","required");
			$this->form_validation->set_rules("oldusername","oldUsername","required");
			$this->form_validation->set_rules("password","Password","max_length[32]");
			$this->form_validation->set_rules("email","Email","required");
			$this->form_validation->set_rules("rank","Rank","required");
			$this->form_validation->set_rules("activated","Activated","required");


			if($this->form_validation->run() === FALSE) {
				$data['user'] = $this->user->fetch();
				$this->load->view("admin/useredit",$data);
			}
			else {
				$res = $this->user->edit();
				if($res != false) {
					$error = array(
						"error-msg" => "Berhasil mengubah data user " . $this->input->post("oldusername"),
						"error-type" => "success"
					);
					$this->session->set_flashdata($error);
					redirect("admin/useredit");
				}
				else {
					$error = array(
						"error-msg" => "Telah terjadi kesalahan mohon ulangi !",
						"error-type" => "danger"
					);
					$this->session->set_flashdata($error);
					redirect("admin/useredit");
				}
			}
			
		}
		else {
			redirect("admin/index");
		}
	}

	public function userdelete() {
		if($this->session->has_userdata("loggedin") && $this->session->userdata("rank") == "admin") {
			$this->form_validation->set_rules("id","Id","required");

			if($this->form_validation->run() === FALSE) {
				redirect("admin/home");
			}
			else {
				$res = $this->user->delete();
				if($res != false) {
					$error = array(
						"error-msg" => "Berhasil menghapus user",
						"error-type" => "success"
					);
					$this->session->set_flashdata($error);
					redirect("admin/useredit");
				}
				else {
					$error = array(
						"error-msg" => "Telah terjadi kesalahan mohon ulangi !",
						"error-type" => "danger"
					);
					$this->session->set_flashdata($error);
					redirect("admin/useredit");
				}
			}
		}
		else {
			redirect("admin/index");
		}
	}

	public function useradd() {
		if($this->session->has_userdata("loggedin") && $this->session->userdata("rank") == "admin") {
			$this->form_validation->set_rules("username","Username","required");
			$this->form_validation->set_rules("email","Email","required");
			$this->form_validation->set_rules("password","Password","required");
			$this->form_validation->set_rules("rank","Rank","required");
			$this->form_validation->set_rules("activated","Activated","required");


			if($this->form_validation->run() === FALSE) {
				$this->load->view("admin/useradd");
			}
			else {
				$validate = $this->user->valid($this->input->post("username"));
				if($validate != true) {
					$dir = "assets/userfiles/".$this->input->post("username")."/";
					if(mkdir($dir)) {
						if(copy("assets/img/avatar04.png", $dir."avatar.png")) {
							$code = $this->random_str(32);
							$res = $this->user->register($code);
							if($this->input->post("activated") == "Y") {
								$this->user->active($this->input->post("username"),$code);
								$error = array(
									"error-msg" => "User " . $this->input->post("username") . "Berhasil ditambahkan",
									"error-type" => "success"
								);
								$this->session->set_flashdata($error);
								redirect("admin/useradd");
							} 
							else {
								$this->sendactcode($code);
								$error = array(
									"error-msg" => "User " . $this->input->post("username") . "Berhasil ditambahkan <br /> Mohon cek Inbox email anda",
									"error-type" => "success"
								);
								$this->session->set_flashdata($error);
								redirect("admin/useradd");
							}
						}
						else {
							$error = array(
								"error-msg" => "Code 03: Mohon hubungi admin",
								"error-type" => "danger"
							);
							$this->session->set_flashdata($error);
							redirect("admin/useradd");
						}
					}
					else {
						$error = array(
							"error-msg" => "Code 04: Mohon hubungi admin",
							"error-type" => "danger"
						);
						$this->session->set_flashdata($error);
						redirect("admin/useradd");
					}
				}
				else {
					$error = array(
						"error-msg" => "Username / Email sudah terpakai",
						"error-type" => "danger"
					);
					$this->session->set_flashdata($error);
					redirect("admin/useradd");
				}
			}
		}
		else {
			redirect("admin/index");
		}
	}
	
	public function editpost() {
		$this->form_validation->set_rules("title","Title","required");
		$this->form_validation->set_rules("desc","Description","required");
		$this->form_validation->set_rules("content","Content","required");
		
		if($this->form_validation->run() === FALSE) {
			$this->load->view("admin/editpost");
		}
		else {
			$res = $this->blog->edit();
			if($res != false) {
				$error = array(
					"error-msg" => "Berhasil mengedit post",
					"error-type" => "success"
				);
				$this->session->set_flashdata($error);
				$this->load->view("admin/editpost");
			}
			else {
				$error = array(
					"error-msg" => "Gagal mengedit post !",
					"error-type" => "danger"
				);
				$this->session->set_flashdata($error);
				$this->load->view("admin/editpost");
			}
		}
	}	
}

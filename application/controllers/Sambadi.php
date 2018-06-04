<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sambadi extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("user");
		$this->load->model("blog");
		$this->load->helper(array("url","form"));
		$this->load->library(array("session","form_validation","email","pagination"));
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
		$this->load->view("sambadi/comingsoon");
	}

	public function home() {
		if($this->session->has_userdata("loggedin")) {
			redirect("sambadi/home2");
		}
		else {
			$this->load->view("sambadi/home");
		}
	}

	public function home2() {
		if($this->session->has_userdata("loggedin")) {
			$totalrow = $this->blog->totalrow();
			$config = array(
				"base_url" => base_url()."index.php/sambadi/home2",
				"total_rows" => $totalrow,
				"per_page" => 5,
				"uri_segment" => 3,
				"next_tag_open" => "<div class='button big'>",
				"next_tag_close" => "</div>",
				"prev_tag_open" => "<div class='button big'>",
				"prev_tag_close" => "</div>",
				"first_link" => false,
				"last_link" => false,
				"next_link" => "Next",
				"prev_link" => "Previous",
				"display_pages" => false
			);
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['viewtype'] = "list";
			$data['lastpost'] = $this->blog->fetch_last_post();
			$data['randompost'] = $this->blog->fetch_random_post();
			$data['result'] = $this->blog->fetchpage(5,$page);
			$data['link'] = $this->pagination->create_links();
			$this->load->view("sambadi/home2",$data);
		}
		else {
			redirect("sambadi/home");
		}
	}

	public function search() {
		if(!isset($_GET['query'])) {
			redirect("sambadi/home");
		}
		else {
			if($this->session->has_userdata("loggedin")) {
				$totalrow = $this->blog->totalrow();
				$config = array(
					"base_url" => base_url()."index.php/sambadi/search",
					"total_rows" => $totalrow,
					"per_page" => 5,
					"uri_segment" => 3,
					"next_tag_open" => "<div class='button big'>",
					"next_tag_close" => "</div>",
					"prev_tag_open" => "<div class='button big'>",
					"prev_tag_close" => "</div>",
					"first_link" => false,
					"last_link" => false,
					"next_link" => "Next",
					"prev_link" => "Previous",
					"display_pages" => false
				);
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['lastpost'] = $this->blog->fetch_last_post();
				$data['viewtype'] = "list";
				$data['randompost'] = $this->blog->fetch_random_post();
				$data['result'] = $this->blog->search($_GET['query'],5,$page);
				$data['link'] = $this->pagination->create_links();
				$this->load->view("sambadi/home2",$data);
			}
			else {
				redirect("sambadi/home");
			}
		}
	}
	public function active($username = null, $code = null) {
		if($username == null or $code == null) {
			redirect("sambadi/home");
		}
		else {
			$res = $this->user->active($username, $code);
			if($res != false) {
				$error = array(
					"error-msg" => "Aktivasi berhasil",
					"error-type" => "success"
				);
				$this->session->set_flashdata($error);
				redirect("sambadi/home");
			}
			else {
				$error = array(
					"error-msg" => "Aktivasi gagal, mohon cek username dan kode anda!",
					"error-type" => "error"
				);
				$this->session->set_flashdata($error);
				redirect("sambadi/home");
			}
		}
	}

	public function read($url = null) {
		if($this->session->has_userdata("loggedin")) {
			if(is_null($url)) {
				redirect("sambadi/home2");
			}
			else{
				$post = $this->blog->fetch($url);
				if($post != false) {
					$data['result'] = $post;
					$data['viewtype'] = "read";
					$data['randompost'] = $this->blog->fetch_random_post();
					$data['lastpost'] = $this->blog->fetch_last_post();
					$this->load->view("sambadi/home2",$data);
				}
				else {
					echo $url;
				}
			}
		}
		else {
			redirect("sambadi/home");
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect("");
	}

	public function login() {
		$this->form_validation->set_rules("username","Username","required");
		$this->form_validation->set_rules("password","Password","required");

		if($this->form_validation->run() === FALSE) {
			redirect("sambadi/home");
		}
		else {
			$res = $this->user->login();
			if($res != false) {
				$path = glob("assets/userfiles/".$this->input->post("username")."/avatar" . ".*");
				$ext = pathinfo($path[0], PATHINFO_EXTENSION);
				$this->session->set_userdata(array(
					"username" => $this->input->post("username"),
					"loggedin" => true,
					"avatar-path" => base_url()."assets/userfiles/".$this->input->post("username")."/avatar.".$ext,
					"rank" => $this->user->getuserrank($this->input->post("username"))
				));
				$error = array(
					"error-type" => "info",
					"error-msg" => "Website ini masih dalam pengerjaan jika ada kesalahan. Mohon beritahu kami"
				);
				$this->session->set_flashdata($error);
				redirect("sambadi/home2");
			}
			else {
				$error = array(
					"error-type" => "error",
					"error-msg" => "Akun anda belum diaktifasi / Username atau password salah"
				);
				$this->session->set_flashdata($error);
				redirect("sambadi/home");
			}
		}
	}

	public function register() {
		$this->form_validation->set_rules("username","Username","required");
		$this->form_validation->set_rules("password","Password","required");
		$this->form_validation->set_rules("email","Email","required");

		if($this->form_validation->run() === FALSE) {
			redirect("sambadi/home");
		}
		else {
			
			$validate = $this->user->valid();
			if($validate != true) {
				$dir = "assets/userfiles/".$this->input->post("username")."/";
				if(!is_dir($dir)) {
					mkdir($dir,0777,true);
				}
				$config['upload_path'] = "./assets/userfiles/".$this->input->post("username")."/";
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '100';
				$config['min_width'] = '50';
				$config['min_height'] = '50';
				$config['remove_spaces'] = true;
				$config['file_name'] = "avatar";

				$this->load->library("upload",$config);
				if(!$this->upload->do_upload("userfile")) {
					$this->user->delete();
					$error = array(
						'error-msg' => $this->upload->display_errors(),
						'error-type' => 'error'
					);
					$this->session->set_flashdata($error);
					redirect("sambadi/home");
				}
				else {
					$code = $this->random_str(32);
					$res = $this->user->register($code);
					if($res != false) {
						$act = $this->sendactcode($code);
						if($act == true) {
							$error = array(
								'error-msg' => "Mohon cek email anda untuk kode aktivasi !",
								'error-type' => 'success'
							);
							$this->session->set_flashdata($error);
							redirect("sambadi/home");
						}
						else {
							$error = array(
								'error-msg' => $act,
								'error-type' => 'error'
							);
							$this->session->set_flashdata($error);
							redirect("sambadi/home");
						}
					}
					else {
						$error = array(
							'error-msg' => "Ada kesalahan teknis saat mendaftar, mohon daftar ulang!",
							'error-type' => 'error'
						);
						$this->session->set_flashdata($error);
						redirect("sambadi/home");
					}
				}
			}
			else {
				$error = array(
					'error-msg' => "Akun sudah ada!",
					'error-type' => 'error'
				);
				$this->session->set_flashdata($error);
				redirect("sambadi/home");
			}
			
		}

	}


}

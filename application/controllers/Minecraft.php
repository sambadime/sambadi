<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Minecraft extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("mc_model");
		$this->load->helper(array("url","form"));
		$this->load->library(array("form_validation"));
	}

	public function index() {
		$this->form_validation->set_rules("username","Username","required");
		$this->form_validation->set_rules("password","Password","required");

		if($this->form_validation->run() === FALSE) {
			$data['online'] = $this->mc_model->getOnline();
			$this->load->view("mcform", $data);
		}
		else {
			$res = $this->mc_model->register();
			if($res != false) {
				echo "Pendaftaran berhasil";
			}
			else {
				echo "Username telah dipakai";
			}
		}
	}
}


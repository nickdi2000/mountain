<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
						$this->load->library('session');

        }

	public function index()
	{
		if(isset($_SESSION['racer_id'])){
			header("Location: /race/start");
		}
		$this->loadStack('welcome');
	}

	public function help(){
			$this->loadStack('help');
	}

	public function about(){
		$this->loadStack('about');
	}


	public function logout() {
		$_SESSION = [];
		$this->session->sess_destroy();
		header("Location: /");

	}

	private function loadStack($page){
		$this->load->view('header');
		$this->load->view($page);
		$this->load->view('footer');
	}
}

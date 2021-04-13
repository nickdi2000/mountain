<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	 public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
						$this->load->library('session');
						$this->load->model('users_model');
						
						if(!isset($this->data['g_user_data'])){
							redirect('/');
						}
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
		//echo json_encode($this->data['g_user_data']);die();
		$data = $this->data['g_user_data'];
		$this->load->view('header', $data);
		$this->load->view('about', $data);
		$this->load->view('footer');
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

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	 public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
						$this->load->library('session');
						$this->load->model(Array('early_model', 'race_model'));
        }

	public function index()
	{
		$this->load->view('landing/header');
		$this->load->view('landing/home');
		$this->load->view('landing/footer');
	}


	public function early_signup(){

		$insert = $this->early_model->insert_early_signup($_POST['email']);
		$this->load->view('landing/header');
		$this->load->view('landing/thankyou');
		$this->load->view('landing/footer');
	}



}

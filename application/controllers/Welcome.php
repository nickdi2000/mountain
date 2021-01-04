<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	 public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
        }
        
	public function index()
	{
		$this->load->view('header');
		$this->load->view('welcome');
		$this->load->view('footer');
	}
	
	public function help(){
		$this->load->view('header');
		$this->load->view('help');
		$this->load->view('footer');
	}
}

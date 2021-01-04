<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Race extends CI_Controller {

	
	 public function __construct()
        {	
            parent::__construct();
            $this->load->helper('url');
        }
        
        
	public function start()
	{
		$this->load->view('header');
		$this->load->view('race/start');
		$this->load->view('footer');
	}
	
}

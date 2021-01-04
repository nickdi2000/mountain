<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaderboard extends CI_Controller {

	
	 public function __construct()
        {	
            parent::__construct();
            $this->load->helper('url');
        }
        
        
	public function index()
	{
		$this->load->view('header');
		$this->load->view('leaderboard/leaderboard');
		$this->load->view('footer');
	}
	
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	
	 public function __construct()
        {	
            parent::__construct();
            $this->load->helper('url');
        }
        
        
	public function index()
	{
		$this->load->view('header');
		$this->load->view('contact');
		$this->load->view('footer');
	}
	
	public function submit(){
	
		$this->load->library('email');

		$this->email->from('info@mountainclimber.ca', 'MountainClimber');
		$this->email->reply_to($_POST['email']);
		
		$this->email->to('nickdifelice@gmail.com');
		
		$msg = $_POST['email'] . PHP_EOL . "Message: " . $_POST['message'];

		$this->email->subject('MountainClimber Inquiry');
		$this->email->message($msg);
	
		$this->email->send();

		$this->load->view('header');
		$this->load->view('thanks');
		$this->load->view('footer');
	}
}

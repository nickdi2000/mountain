<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//this is the first point of access (default controller)

class Main extends MY_Controller {

	 public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
						$this->load->library('session');

        }

	public function index()
	{

			if(isset($this->data['g_user_data'])){
				$data['user_data'] = $this->data['g_user_data'];
				$this->load->view('header', $data);
				$this->load->view('welcome', $data);
			}else{
				//just send subdomain and inform user it doesn't exist yet
				$data['subdomain'] = $this->data['sub'];
				$this->load->view('header', $data);
				$this->load->view('none_found' ,$data);

			}

			$this->load->view('footer');

	}









}

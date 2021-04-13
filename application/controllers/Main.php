<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//this is the first point of access (default controller)

class Main extends CI_Controller {

	 public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
						$this->load->model('users_model');
						$this->load->library('session');

						//get subdomain
            $url = $_SERVER['HTTP_HOST'];
            $url_arr = explode('.', $url);
            $this->sub = $url_arr[0];

        }

	public function index()
	{
      $this->load->view('header');
			//get user id
		  $user = $this->users_model->get_user_id($this->sub);

			if(isset($user)){
				$data = $this->users_model->get_user_details($user->id);
				$this->load->view('welcome', $data);
			}else{
				//just send subdomain and inform user it doesn't exist yet
				$data['subdomain'] = $this->sub;
				$this->load->view('none_found' ,$data);
			}

			$this->load->view('footer');

	}









}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Race extends CI_Controller {


	 public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
						$this->load->library('session');
        }


	public function start()
	{
		$data['initials'] = isset($_SESSION['initials']) ? $_SESSION['initials'] : '';
		$data['racer_id'] = isset($_SESSION['racer_id']) ? $_SESSION['racer_id'] : 0;
		$data['status'] = isset($_SESSION['status']) ? $_SESSION['status'] : null;

		$this->load->view('header');
		$this->load->view('race/start', $data);
		$this->load->view('footer');
	}

}

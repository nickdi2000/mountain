<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	 public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
						$this->load->model('racer_model');
						$this->load->library('session');

        }

	public function index()
	{
		$data['initials'] = $_SESSION['initials'] ?: '';
		$data['racer_id'] = $_SESSION['racer_id'] ?: null;

		$this->load->view('admin/header');
		$this->load->view('admin/home', $data);
		$this->load->view('admin/admin_footer');
	}

	public function create_racer($initials){
		$racer_id =  $this->racer_model->create_racer($initials);
		if($racer_id){
			$this->session->set_userdata('racer_id', $racer_id);
			$this->session->set_userdata('initials', $initials);
			$this->session->set_userdata('status', 'ready');
			echo $racer_id;
		}else{
			echo 'errorr';
		}
	}


}

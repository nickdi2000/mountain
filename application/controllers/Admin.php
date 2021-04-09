<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	 public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
						$this->load->model(Array('racer_model', 'race_model'));
						$this->load->library('session');

						if(!isset($_SESSION['admin_id'])){
							header('Location: /login');
						}else{
							$this->load->view('admin/nav');
						}

        }

	public function index()
	{

		$data['admin_data'] = $this->race_model->get_race_data(1);


		$this->load->view('admin/header');
		$this->load->view('admin/home', $data);
		$this->load->view('admin/admin_footer');
	}

	public function save(){
			$id = $this->race_model->update_race();
			if($id != null){
				header("Location: /admin/?success");
			}
	}




}

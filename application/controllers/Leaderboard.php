<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaderboard extends CI_Controller {


	 public function __construct()
        {
            parent::__construct();
						$this->load->helper('url');
						$this->load->library('session');
						$this->load->model('racer_model');
        }


	public function index()
	{
		$race_id = 1;
		$data['records'] = $this->racer_model->get_ranks($race_id);

		$locale = 'en_US';
		$data['nf'] = new NumberFormatter($locale, NumberFormatter::ORDINAL);
		//echo $nf->format($number);

		$this->load->view('header');
		$this->load->view('leaderboard/leaderboard', $data);
		$this->load->view('footer');
	}


}

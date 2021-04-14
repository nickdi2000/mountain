<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Race extends MY_Controller {


	 public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
						$this->load->library('session');
						$this->load->model(Array('racer_model', 'race_model'));
        }


	public function start()
	{
	//	echo json_encode($_SESSION);die();
		//$data['start_time'] = isset($_SESSION['start_time']) ? $_SESSION['start_time'] : null;

		//$data['initials'] = isset($_SESSION['initials']) ? $_SESSION['initials'] : '';
		//$data['racer_id'] = isset($_SESSION['racer_id']) ? $_SESSION['racer_id'] : 0;
		//$data['status'] = isset($_SESSION['status']) ? $_SESSION['status'] : null;
		//$data['duration'] = isset($_SESSION['duration']) ? $_SESSION['duration'] : null;

		//$data['race_data'] = $this->race_model->get_race_data(1); //hardcode 1 until made into SaaS

		$this->load->view('header');
		$this->load->view('race/start');
		$this->load->view('footer');
	}


	/* for axios */

	//get the one race for the actual racing process
	public function get_race_data($race_id){
		//$race_id = 1; //hard-coded until SaaSified
		echo json_encode($data['race_data'] = $this->race_model->get_race_data($race_id));
	}

//get all races for user
	public function get_races(){
		$return = $this->get_all_races(); //parent method
		echo json_encode($return);
	}
		public function get_racer_data(){
					if(isset($_SESSION['racer_id'])){
						$data['racer_data'] = $this->racer_model->get_racer_data($_SESSION['racer_id']);

					}else{
						$data['racer_id'] = 0;
					}

					$data['duration'] = isset($_SESSION['duration']) ? $_SESSION['duration'] : null;

					echo json_encode($data);
		}

			public function create_racer($initials){

				$racer_id =  $this->racer_model->create_racer($initials);
				if($racer_id){
					$this->session->set_userdata('racer_id', $racer_id);
					//$this->session->set_userdata('initials', $initials);
					//$this->session->set_userdata('status', 'ready');
					echo $racer_id;
				}else{
					echo 'errorr';
				}
			}

	public function update_racer_status($status){
		$this->session->set_userdata('status', $status);
	 	echo $this->racer_model->update_status($status);
	}

	public function set_race($id = 0){
		echo $this->session->set_userdata('current_race_id', $id);
	}

	public function set_time_started(){
		$time = date(DATE_ISO8601);
		$this->session->set_userdata('time_began', $time);
	 	$this->racer_model->set_time_started($time);
		echo (string) $time;
	}

	public function set_time_ended(){
		$query = $this->racer_model->get_start_time();
		$start_time = $query[0]['start_time'];

		$end_time = date(DATE_ISO8601); //get current time Again
		$seconds = strtotime($end_time) - strtotime($start_time);

		$duration = gmdate("H:i:s", $seconds); //convert raw seconds (342) to time (3:23:32)
		//write data
		$this->session->set_userdata('time_ended', $end_time);
		$this->session->set_userdata('duration', $duration);
	 	$this->racer_model->set_time_ended($end_time);

		$data['duration'] =	$duration;
		$data['end_time'] = $end_time;
		echo json_encode($data);
	}


}

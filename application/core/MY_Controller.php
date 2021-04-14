<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


	 public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model(Array('users_model', 'race_model'));

            //get subdomain
            $url = $_SERVER['HTTP_HOST'];
            $url_arr = explode('.', $url);
            $this->data['sub'] = $url_arr[0];

            $this->getUser();
        }

        //get "user" data which is the main race info, title, heading, etc..
        public function getUser()
          {
              $user = $this->users_model->get_user_id($this->data['sub']);

              if(isset($user)){
                $this->data['g_user_data'] = $this->users_model->get_user_details($user->id);
              }else{
                //die();
              }

           }


				public function get_all_races(){
					$user_id = $this->data['g_user_data']['user_id'];
					$return['races'] = $this->race_model->get_races($user_id);
					$return['current_race_id'] = isset($_SESSION['current_race_id']) ? $_SESSION['current_race_id'] : $return['races'][0]['id']; //set to first race if not session-set yet
					return $return;
				}



}

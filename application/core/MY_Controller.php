<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {


	 public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('users_model');

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



}

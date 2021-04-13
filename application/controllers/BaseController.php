<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends CI_Controller {


	 public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->setUser();
        }

        public function setUser()
          {
              $this->data['cuser'] = 123454321;
           }


}

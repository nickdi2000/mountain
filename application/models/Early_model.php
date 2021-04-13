<?php


class Early_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }


    public function insert_early_signup($email){
			$data['email'] = $email;
			$data['site'] = 'timetrials';

      $this->db->insert('early_signups', $data);
			$insert_id = $this->db->insert_id();
			return $insert_id;
    }


}

<?php


class Race_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }


    public function get_race_data($id){
      //$this->db->select('start_time');
      $query = $this->db->get_where('race', array('id' => $id));
      return $query->row_array();
    }

    public function get_races($user_id){
      $query = $this->db->get_where('race', array('user_id' => $user_id));
      return $query->result_array();
    }


}

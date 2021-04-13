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


}

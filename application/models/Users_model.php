<?php


class Users_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }


    public function get_user_id($code){
      $params['code'] = strtolower($code);
      $this->db->select('id');
      $query = $this->db->get_where('users', $params);

      return $query->row();
    }

    public function get_user_details($id){
      $params['user_id'] = $id;
      $query = $this->db->get_where('user_details', $params);

      return $query->row_array();
    }

    public function get_user_details_by_code($id){
    //  $params['user_id'] = $id;
      //$query = $this->db->get_where('user_details', $params);

      return $query->row_array();
    }


}

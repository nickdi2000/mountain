<?php


class Racer_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }


    public function create_racer($initials)
    {
        $this->load->helper('url');
        $data = array(
            'initials' => $initials,
            'status' => 'ready'
        );
        $this->db->insert('racer_profile', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

		    public function get_racer_data($id){
		      $query = $this->db->get_where('racer_profile', array('id' => $id));
		      return $query->row_array();
		    }


    public function update_status($status = 'NEUTRAL'){
        $data['status'] = $status;
        $this->db->where('id', $_SESSION['racer_id']);
        echo $this->db->update('racer_profile', $data);
    }

    public function set_time_started($time){
      $data['start_time'] = $time;
      $this->db->where('id', $_SESSION['racer_id']);
      $this->db->update('racer_profile', $data);
    }

    public function set_time_ended($time){
      $data['end_time'] = $time;
      $this->db->where('id', $_SESSION['racer_id']);
      $this->db->update('racer_profile', $data);
    }

    public function get_start_time(){
      $this->db->select('start_time');
      $query = $this->db->get_where('racer_profile', array('id' => $_SESSION['racer_id']));
      return $query->result_array();
    }

    public function get_ranks(){
      $query = $this->db->query("select *, (end_time - start_time) duration from racer_profile where status = 'finished' order by duration asc;");
      return $query->result_array();
    }
}

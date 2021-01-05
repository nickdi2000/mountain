<?php


class Racer_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_news($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('racer_profile');
            return $query->result_array();
        }

        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
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

}

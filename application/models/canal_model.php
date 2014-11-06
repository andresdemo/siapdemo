<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Canal_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_canales() {
        $query = $this->db->query("select * from canal " );
        return $query->result();
    }
    
    function get_canal($id_canal) {
        $query = $this->db->query("select * from canal where id_canal = $id_canal" );
        if ($query->num_rows() > 0) {
            return $query->first_row();
        } else {
            return NULL;
        }
    }

}
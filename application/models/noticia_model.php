<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Noticia_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    // Busca los elementos paginados y filtrados por el argumento opcional 
    function search($start,$limit,$level,$text) {
        if($text) {
            $query = $this->db->query("select id_noticia,id_canal,titulo,descripcion,link,fecha,nivel from noticia where nivel <= $level and MATCH (titulo,descripcion) AGAINST (". $this->db->escape($text) .") LIMIT $start , $limit" );
        } else {
            $query = $this->db->query("select id_noticia,id_canal,titulo,descripcion,link,fecha,nivel from noticia where nivel <= $level ORDER BY fecha LIMIT $start , $limit" );
        }
        return $query->result();
    }
    
    function count($level,$text) {
        if($text) {
            $query = $this->db->query("select count(*) n from noticia where nivel <= $level and MATCH (titulo,descripcion) AGAINST (". $this->db->escape($text) .")" );
        } else {
            $query = $this->db->query("select count(*) n from noticia where nivel <= $level" );
        }
        return $query->first_row()->n;
    }
    
    function get_noticia($id_noticia) {
        $query = $this->db->query("select * from noticia where id_noticia = $id_noticia" );
        if ($query->num_rows() > 0) {
            return $query->first_row();
        } else {
            return NULL;
        }
    }
    
     function get_noticia_by_link($link) {
        $query = $this->db->query("select * from noticia where link =". $this->db->escape($link) );
        if ($query->num_rows() > 0) {
            return $query->first_row();
        } else {
            return NULL;
        }
    }
    
    // Se inserta el array que representa la noticia y se coloca la fecha automaticamente
    function insert($noticia) {
        $this->db->set('fecha', 'NOW()', FALSE);
        $this->db->insert('noticia', $noticia);
    }
    
    function delete() {
        
    }
    
    function update() {
        
    }
    
    function insert_or_update() {
        
    }
    
    
    

}
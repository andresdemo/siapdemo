<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sync extends CI_Controller {


    /**
	 * Constructor de la clase
	 * se carga la libreria session y el helper url para los templates
	 */
    public function __construct()
    {
    	parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library(array('session','rssparser'));
		$this->load->model('Noticia_model');
		$this->load->model('Canal_model');
    }

	/**
	 * Pagina principal para este controlador
	 */
	public function index()
	{
	    // Si la pagina requiere de validar entre un usuario logeado y uno anonimo
	    $id_user = $this->session->userdata('id_user');
	    
	    if($id_user) {
	        $user = array(
			    'login'=> TRUE,
			    'id_user'=> $id_user,
			    'name'=> $this->session->userdata('name'),
			    'email'=> $this->session->userdata('email'),
			    'level'=> $this->session->userdata('level'),
		    );
	    } else {
	        $user = array( 'login'=> FALSE );
	    }
	    
	    $count_news = 0;
	    $count_add = 0;
	    
		$canales = $this->Canal_model->get_canales();
		foreach($canales as $canal) {
		    $rss = $this->rssparser->set_feed_url($canal->link)->set_cache_life(30)->getFeed(50);
		    foreach($rss as $item) {
		        $count_news++;
		        $noticia = $this->Noticia_model->get_noticia_by_link($item['link']);
		        if(!$noticia) {
		            $count_add++;
		            $noticia = array(
		                'titulo' => $item['title'],
		                'descripcion' => $item['description'],
		                'link' => $item['link']
		            );
		            $this->Noticia_model->insert($noticia);
		        }
		    }
		}
         
        

        $data = array(
            'count' => $count_news,
            'add' => $count_add
         );
		
		//Se cargan los templates, tanto el template head y body son opcionales
		$this->load->view('templates/open_head',$user);
		//$this->load->view('viewname_head');
		$this->load->view('templates/head_to_body');
		$this->load->view('sync/sync_body',$data);
		$this->load->view('templates/close_body');
		
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
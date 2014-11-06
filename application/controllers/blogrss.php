<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blogrss extends CI_Controller {


    /**
	 * Constructor de la clase
	 * se carga la libreria session y el helper url para los templates
	 */
    public function __construct()
    {
    	parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Noticia_model');
    }

	/**
	 * Pagina principal para este controlador
	 */
	public function index()
	{
	    
	    // Determina el tamaño de la pagina
	    $limit = 10;

	    $page = $this->input->get('page'); // obtenemos la pagina solicitada
		if(!$page) $page =1; // Si no existe la pagina se coloca en la primera
	    
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
	    
	    
		
		$text = $this->input->get('text'); // obtenemos el texto a buscar
		if($user['login']) {
		    $level = $user['level'];
		} else {
            $level = 0;
		}
		
		$count = $this->Noticia_model->count($level,$text);
		
		if( $count >0 ) {
        	$total_pages = ceil($count/$limit);
        } else {
        	$total_pages = 0;
        }
        
        if ($page > $total_pages) $page=$total_pages;
		
		$start = $limit*$page - $limit;
		
		if($count > 0)  {
		    $news = $this->Noticia_model->search($start,$limit,$level,$text);
		} else {
		    $news = NULL;
		}

		$data = array(
            'news' => $news,
            'page' => $page,
            'total_pages' => $total_pages,
            'limit' => $limit,
            'count' => $count
         );
		
		//Se cargan los templates, tanto el template head y body son opcionales
		$this->load->view('templates/open_head',$user);
		//$this->load->view('viewname_head');
		$this->load->view('templates/head_to_body');
		$this->load->view('blogrss/items_body',$data);
		$this->load->view('templates/close_body');
		
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
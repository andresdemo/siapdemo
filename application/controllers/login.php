<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


    /**
	 * Constructor de la clase
	 * se carga la libreria session y el helper url para los templates
	 */
    public function __construct()
    {
    	parent::__construct();
		// $this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
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
		
		//Se cargan los templates, tanto el template head y body son opcionales
		$this->load->view('templates/open_head',$user);
		//$this->load->view('viewname_head');
		$this->load->view('templates/head_to_body');
		$this->load->view('login/login_body');
		$this->load->view('templates/close_body');
		
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
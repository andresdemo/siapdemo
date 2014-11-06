<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
    {
    	parent::__construct();
		$this->load->database();
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('Canal_model');
		$canal = $this->Canal_model->get_canal(1);
		
		$this->load->library('rssparser');                          // load library
		$this->rssparser->set_feed_url($canal->link);  // get feed
		$this->rssparser->set_cache_life(30);                       // Set cache life time in minutes
		$rss = $this->rssparser->getFeed(50); 
		
		$data = array(
			'rss' => $rss
		);
		
		$this->load->view('test_view',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
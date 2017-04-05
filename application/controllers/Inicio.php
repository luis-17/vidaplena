<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        // Se le asigna a la informacion a la variable $sessionVP.
        $this->sessionVP = @$this->session->userdata('sess_vp_'.substr(base_url(),-8,7));
        
    }
	public function index()
	{
		$data['active'] = array(
        	'faq'=> NULL,
        	'blog'=> NULL,
        	'contacto'=> NULL
        );
		$this->load->template('inicio',$data);
	}

}

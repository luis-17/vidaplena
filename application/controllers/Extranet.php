<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extranet extends CI_Controller { 
	public function __construct()
    {
        parent::__construct(); 
        $this->load->driver('cache');
        $this->load->helper(array('form', 'url'));
        // Se le asigna a la informacion a la variable $sessionVP.
        $this->sessionVP = @$this->session->userdata('sess_vp_'.substr(base_url(),-8,7));
        $this->load->model(array('model_usuario'));
        // var_dump($this->sessionVP); exit();
        if(!@$this->sessionVP) redirect ('login');

        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        date_default_timezone_set("America/Lima");

    }
	public function pruebas()
	{
        $data = array(); 
        $this->load->template('pruebas',$data);
	}
}

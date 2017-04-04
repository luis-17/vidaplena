<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extranet extends CI_Controller { 
	public function __construct()
    {
        parent::__construct(); 
        $this->load->driver('cache');
        $this->load->helper(array('form', 'url'));
        // Se le asigna a la informacion a la variable $user.
        $this->sessionVP = @$this->session->userdata('logged_user');
        $this->load->model(array('model_usuario'));
    }
	public function pruebas()
	{
        $data = array(); 
        $this->load->template('pruebas',$data);
	}
    public function logout()
    {
        $this->session->unset_userdata('logged_user');
        $this->cache->clean();
        redirect('/','refresh');
    }
}

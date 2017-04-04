<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model(array('model_servicio'));
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
    public function servicio($eje)
    {
        $data['active'] = array(
            'faq'=> NULL,
            'blog'=> NULL,
            'contacto'=> NULL
        );
        $lista = $this->model_servicio->m_obtener_servicios_por_eje($eje);
        // var_dump('<pre>',$lista);
        $data['servicios'] = $lista;
        $this->load->template('servicio',$data);
    }
}

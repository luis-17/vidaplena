<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
            // Your own constructor code
    }
	public function index()
	{
		$this->load->template('inicio');
	}
}

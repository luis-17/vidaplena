<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrate extends CI_Controller { 
	public function __construct()
    {
        parent::__construct();
        $this->load->model(array('model_usuario'));
        $this->load->helper(array('form', 'url','fechas_helper'));
        $this->load->driver('cache'); 
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
        $data['fAlert'] = array(
            'success'=> 'hide',
            'danger'=> 'hide'
        );
        $config = array( 
            array(
                'field' => 'nombres',
                'label' => 'Nombres',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'apellidos',
                'label' => 'Apellidos',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'fechanac',
                'label' => 'Fecha de Nacimiento',
                'rules' => 'required|trim'
                //'rules' => 'required|trim|callback_si_valid_date'
            ),
            array(
                'field' => 'correo',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email'
            ),
            array(
                'field' => 'contrasena',
                'label' => 'Clave',
                'rules' => 'required|trim|min_length[6]'
            )
        );

        $this->form_validation->set_rules($config);

        // $this->form_validation->set_rules('fechanac','Fecha de Nacimiento','si_valid_date'); 
        // $this->form_validation->set_message('rule', 'No ha llenado todos los campos obligatorios.');
        if ($this->form_validation->run() == FALSE){ 
        //if ($this->form_validation->run('reg_usuario') == FALSE){ 
            $this->load->template('registrate',$data);
        }else{ 
            $arrData = array(); 
            $arrData['nombre'] = $this->input->post('nombres');
            $arrData['apellido_paterno'] = $this->input->post('apellidos');
            $arrData['apellido_materno'] = $this->input->post('apellidos');
            $arrData['fecha_nacimiento'] = $this->input->post('fechanac');
            $arrData['fecha_nacimiento'] = darFormatoYMD($arrData['fecha_nacimiento']);
            // var_dump($arrData['fecha_nacimiento']); exit(); 
            $arrData['mail'] = $this->input->post('correo');
            $arrData['clave'] = $this->input->post('contrasena');
            if( $this->model_usuario->m_registrar($arrData) ){ 
                $msgFlash = array( 
                    'msg' => 'Se registró al usuario correctamente.',
                    'flag'=> 1 
                ); 
            }else{
                $msgFlash = array( 
                    'msg' => 'Hubo un error en la transacción.',
                    'flag'=> 2 
                ); 
            }
            $this->session->set_flashdata('msgFlash', $msgFlash); 
            redirect('/registrate'); 
        } 
	}
    function si_valid_date($fechanac)
    {
        $fechanac = explode('-', $cadena);
        if( count($fechanac) != 3 ){
            return FALSE;
        }
        $dd = $fechanac[0];
        $mm = $fechanac[1];
        $yy = $fechanac[2];
        //var_dump($dd,$mm,$yy); exit(); 
        return checkdate( $mm, $dd, $yy );
    }
}

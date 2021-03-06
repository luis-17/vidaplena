<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller { 
	public function __construct()
    {
        parent::__construct(); 
        $this->load->driver('cache');
        $this->load->helper(array('form', 'url','otros_helper'));
        // Se le asigna a la informacion a la variable $user.
        $this->sessionVP = @$this->session->userdata('sess_vp_'.substr(base_url(),-8,7));
        $this->load->model(array('model_usuario'));
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
        $data['error_login'] = FALSE;
        $config = array( 
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
        $this->form_validation->set_message('required', 'El campo %s es requerido.');
        if ($this->form_validation->run() == FALSE){ 
            $this->load->template('login',$data);
        }else{ 
            $arrData = array(
                'correo'=> $this->input->post('correo'),
                'contrasena'=> $this->input->post('contrasena')
            );
            // Obtenemos la informacion del usuario desde el modelo
            $logged_user = $this->model_usuario->m_obtener_usuario($arrData);
            // Si existe el usuario creamos la sesion y redirigimos al index.
            if($logged_user) {
                $this->session->set_userdata('sess_vp_'.substr(base_url(),-8,7), $logged_user);
                $this->sessionVP = @$this->session->userdata('sess_vp_'.substr(base_url(),-8,7)); 
                // var_dump($this->sessionVP); exit();
                $msgFlash = array( 
                    'msg' => 'Bienvenido, '.$this->sessionVP->nombre,
                    'flag'=> 1 
                );/**/
                $this->session->set_flashdata('msgFlash', $msgFlash); 
                redirect('extranet/pruebas'); 
            }else{ 
                // De lo contrario se activa el error_login.
                $data['error_login'] = TRUE;
                $this->load->template('login',$data);
            }
        } 
	}
    public function logout()
    {
        $this->session->unset_userdata('sess_vp_'.substr(base_url(),-8,7));
        $this->cache->clean();
        redirect('/','refresh');
    }
}

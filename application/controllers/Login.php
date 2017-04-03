<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller { 
	public function __construct()
    {
        parent::__construct(); 
        $this->load->driver('cache');
        $this->load->helper(array('form', 'url','otros_helper'));
        // Se le asigna a la informacion a la variable $user.
        $this->user = @$this->session->userdata('logged_user');
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
                $this->session->set_userdata('logged_user', $logged_user);
                $this->user = @$this->session->userdata('logged_user');
                redirect('extranet'); 
            }else{ 
                // De lo contrario se activa el error_login.
                $data['error_login'] = TRUE;
            }

            // $arrData = array(); 
            // $arrData['mail'] = $this->input->post('correo');
            // $arrData['clave'] = $this->input->post('contrasena');
            // if( $this->model_usuario->m_login_user($arrData) ){ 
            //     $msgFlash = array( 
            //         'msg' => 'Se registró al usuario correctamente.',
            //         'flag'=> 1 
            //     ); 
            // }else{
            //     $msgFlash = array( 
            //         'msg' => 'Hubo un error en la transacción.',
            //         'flag'=> 2 
            //     ); 
            // }
            // $this->session->set_flashdata('msgFlash', $msgFlash); 
            // redirect('/registrate'); 
        } 
	}
    public function logout()
    {
        $this->session->unset_userdata('logged_user');
        $this->cache->clean();
        redirect('/Extranet/pruebas','refresh');
    }
}

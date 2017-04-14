<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extranet extends CI_Controller { 
	public function __construct()
    {
        parent::__construct(); 
        $this->load->driver('cache');
        $this->load->helper(array('form', 'url','fechas_helper'));
        // Se le asigna a la informacion a la variable $sessionVP.
        $this->sessionVP = @$this->session->userdata('sess_vp_'.substr(base_url(),-8,7));
        $this->load->model(array('model_usuario','model_servicio','model_eje'));
        // var_dump($this->sessionVP); exit();
        if(!@$this->sessionVP) redirect ('login');

        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        date_default_timezone_set("America/Lima");

    }
	public function pruebas($eje=FALSE)
	{
        $data = array(); 
        $data['eje'] = $eje;
        if( $eje === FALSE ){
            $this->load->template('pruebas',$data);
            return;
        }
        $fEje = $this->model_eje->m_obtener_eje_por_seg_amigable($eje);
        if(empty($fEje)){
            return;
        }
        $data['fEje'] = $fEje;
        // VALIDACIÓN 
        $config = array( 
            array(
                'field' => 'peso',
                'label' => 'Peso',
                'rules' => 'required|trim|numeric'
            ),
            array(
                'field' => 'talla',
                'label' => 'Talla',
                'rules' => 'required|trim|integer'
            ),
            array(
                'field' => 'cintura',
                'label' => 'Cintura',
                'rules' => 'required|trim|integer'
            ),
            array(
                'field' => 'sexo',
                'label' => 'Sexo',
                'rules' => 'required|trim'
            )
        );
        $this->form_validation->set_rules($config); 
        if ($this->form_validation->run() == FALSE){ 
            $this->load->template('pruebas',$data);
        }else{ 
            $arrData = $this->input->post();
            $tallEnM = $arrData['talla'] / 100;
            $arrData['imagen_corazon'] = 'corazon-sano.png';
            $arrData['imagen_text'] = '¡FELICITACIONES!';
            $arrData['estado_general'] = TRUE; 
            // IMC 
            $arrData['imc'] = round( $arrData['peso'] / ($tallEnM * $tallEnM) , 2); 
            if( $arrData['imc'] < 18.5 ){
                //bajo de peso
                $arrData['imc_result'] = 'Bajo de peso'; 
                $arrData['imc_result_ok'] = FALSE; 
            }elseif ($arrData['imc'] >= 18.5 && $arrData['imc'] <= 24.9 ) { 
                //normal
                $arrData['imc_result'] = 'Normal'; 
                $arrData['imc_result_ok'] = TRUE; 
            }elseif ($arrData['imc'] > 25 && $arrData['imc'] <= 29.9 ) { 
                //sobrepeso
                $arrData['imc_result'] = 'Sobrepeso'; 
                $arrData['imc_result_ok'] = FALSE; 
            }elseif ($arrData['imc'] >= 30 ) { 
                //obesidad
                $arrData['imc_result'] = 'Obesidad'; 
                $arrData['imc_result_ok'] = FALSE; 
            }

            if( $arrData['imc_result_ok'] === FALSE){
                $arrData['imagen_corazon'] = 'corazon-enfermo.png';
                $arrData['imagen_text'] = '¡PODEMOS MEJORAR!';
                $arrData['estado_general'] = FALSE; 
            }
            // % DE GRASA CORPORAL 
            if( $arrData['sexo'] == 'M' ){ 
                $valSexo = 1;
            }
            if( $arrData['sexo'] == 'F' ){ 
                $valSexo = 0;
            }
            $arrData['edad'] = devolverEdad($this->sessionVP->fecha_nacimiento);

            $arrData['grasa_corporal'] = round(1.2 * $arrData['imc'] + 0.23 * $arrData['edad'] - 10.8 * $valSexo - 5.4 , 2); 
            if($arrData['sexo'] == 'F'){ 
                if( $arrData['grasa_corporal'] < 25 ){ 
                    $arrData['gc_result'] = 'Delgadez'; 
                    $arrData['gc_result_ok'] = FALSE; 
                }
                if( $arrData['grasa_corporal'] >= 25 && $arrData['grasa_corporal'] <= 30 ){ 
                    $arrData['gc_result'] = 'Normal'; 
                    $arrData['gc_result_ok'] = TRUE; 
                }
                if( $arrData['grasa_corporal'] > 30 ){ 
                    $arrData['gc_result'] = 'Exceso de grasa corporal'; 
                    $arrData['gc_result_ok'] = FALSE; 
                }
            }
            if($arrData['sexo'] == 'M'){ 
                if( $arrData['grasa_corporal'] < 15 ){ 
                    $arrData['gc_result'] = 'Delgadez'; 
                    $arrData['gc_result_ok'] = FALSE; 
                }
                if( $arrData['grasa_corporal'] >= 15 && $arrData['grasa_corporal'] <= 20 ){ 
                    $arrData['gc_result'] = 'Normal'; 
                    $arrData['gc_result_ok'] = TRUE; 
                }
                if( $arrData['grasa_corporal'] > 20 ){ 
                    $arrData['gc_result'] = 'Exceso de grasa corporal'; 
                    $arrData['gc_result_ok'] = FALSE; 
                }
            }
            if( $arrData['gc_result_ok'] === FALSE){ 
                $arrData['imagen_corazon'] = 'corazon-enfermo.png';
                $arrData['imagen_text'] = '¡PODEMOS MEJORAR!';
                $arrData['estado_general'] = FALSE; 
            }
            // PERÍMETRO DE CINTURA 
            if($arrData['sexo'] == 'F'){
                if( $arrData['cintura'] <= 80 ){ 
                    $arrData['cintura_result'] = 'No tienes riesgo cardiovascular'; 
                    $arrData['cintura_result_ok'] = TRUE; 
                }
                if( $arrData['cintura'] > 80 ){ 
                    $arrData['cintura_result'] = 'Presentas riesgo cardiovascular'; 
                    $arrData['cintura_result_ok'] = FALSE; 
                }
            }
            if($arrData['sexo'] == 'M'){
                if( $arrData['cintura'] <= 90 ){ 
                    $arrData['cintura_result'] = 'No tienes riesgo cardiovascular'; 
                    $arrData['cintura_result_ok'] = TRUE; 
                }
                if( $arrData['cintura'] > 90 ){ 
                    $arrData['cintura_result'] = 'Presentas riesgo cardiovascular'; 
                    $arrData['cintura_result_ok'] = FALSE; 
                }
            }
            if( $arrData['cintura_result_ok'] === FALSE){
                $arrData['imagen_corazon'] = 'corazon-enfermo.png';
                $arrData['imagen_text'] = '¡PODEMOS MEJORAR!';
                $arrData['estado_general'] = FALSE; 
            }
            // PESO IDEAL 
            $arrData['peso_ideal'] = 0.75 * ( $arrData['talla'] - 150 ) + 50; 

            // REQUERIMIENTO ENERGÉTICO (METABOLISMO BASAL)
            $arrData['metabolismoBasal'] = 0;
            if($arrData['sexo'] == 'F'){ 
                $arrData['metabolismoBasal'] = 55 + (9.6 * $arrData['peso']) + (1.8 * $arrData['talla']) - ( 4.7 * $arrData['edad'] ); 
            }
            if($arrData['sexo'] == 'M'){ 
                $arrData['metabolismoBasal'] = 66 + (13.7 * $arrData['peso']) + (5 * $arrData['talla']) - ( 6.8 * $arrData['edad'] ); 
            }

            /*if( $this->model_usuario->m_registrar($arrData) ){ 
                $msgFlash = array( 
                    'msg' => 'Se registró al usuario correctamente.',
                    'flag'=> 1 
                ); 
            }else{
                $msgFlash = array( 
                    'msg' => 'Hubo un error en la transacción.',
                    'flag'=> 2 
                ); 
            }*/
            $data['result'] = $arrData;
            $this->load->template('resultado',$data); 
        } 

        /*
            array (size=5)
              'fechanac' => string '1993-04-04' (length=10)
              'peso' => string '80' (length=2)
              'talla' => string '170' (length=3)
              'cintura' => string '100' (length=3)
              'sexo' => string 'M' (length=1)
        */
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

<?php
class MY_Form_validation extends CI_Form_validation{    
     function __construct($config = array()){
          parent::__construct($config);
     }

     /* SI UNA VARIABLE ES UNA FECHA del tipo dd-mm-YYYY  RETORNA TRUE*/
  //    function si_valid_date($fecha){ 
  //    	$fecha = explode('-', $cadena);
		// if( count($fecha) != 3 ){
		// 	return FALSE;
		// }
		// $dd = $fecha[0];
		// $mm = $fecha[1];
		// $yy = $fecha[2];
		// var_dump($dd,$mm,$yy); exit(); 
		// return true;
  //    }
}
<?php
class Model_servicio extends CI_Model {
	//public $app_db;
	public function __construct()
	{
		parent::__construct();
	}

	function m_obtener_servicios_por_eje($eje){
		$this->db->select('serv.idservicio, serv.descripcion_serv, serv.estado_serv, serv.idcatservicio');
		$this->db->select('serv.precio_actual, serv.precio_regular, imagen');
		$this->db->select('ej.ideje, ej.descripcion_ej, ej.segmento_amigable');
		$this->db->from('servicio serv');
		$this->db->join('eje ej','serv.ideje = ej.ideje');
		$this->db->where('ej.segmento_amigable', $eje);
		$this->db->where('estado_ej <>', '0');

		return $this->db->get()->result_array();
	}

}

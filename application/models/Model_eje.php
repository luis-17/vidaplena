<?php
class Model_eje extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	function m_obtener_eje_por_seg_amigable($eje){
		$this->db->select('ideje, descripcion_ej, segmento_amigable');
		$this->db->from('eje');
		$this->db->where('segmento_amigable', $eje);
		$this->db->limit(1);
		return $this->db->get()->row_array();
	}

}

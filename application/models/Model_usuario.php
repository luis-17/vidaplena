<?php
class Model_usuario extends CI_Model {
	public $app_db;
	public function __construct()
	{
		parent::__construct();
	}
 	//ACCESO AL SISTEMA 
	function m_obtener_usuario($datos){
		//DATOS DEL USUARIO
		$this->load->helper('security');
		$this->db->select('us.idusuario, us.mail, us.nombre, us.apellido_paterno, us.apellido_materno, us.fecha_nacimiento, us.clave, us.estado_us, us.promedio_global, us.suma_global, tu.idtipousuario, tu.descripcion_tu');
		$this->db->from('usuario us');
		$this->db->join('tipo_usuario tu','us.idtipousuario = tu.idtipousuario');
		$this->db->where('us.mail', $datos['correo']);
		$this->db->where('us.clave', md5($datos['contrasena']));
		$this->db->where('estado_us <>', '0');
		$this->db->limit(1);
		return $this->db->get()->row();
	}
	function m_cambiar_clave($datos)
	{
		$this->load->helper('security');
		$data = array(
			'clave' => do_hash($datos['clave'] , 'md5')
		);
		$this->db->where('nombre_usuario', $datos['nombre_usuario']);
		$this->db->where('empresa_id', $datos['empresa_id']);
		return $this->db->update('usuario', $data);
	}
	function m_registrar($datos) 
	{
		$data = array( 
			'mail' => $datos['mail'],
			'nombre' => strtoupper($datos['nombre']),
			'apellido_paterno' => strtoupper($datos['apellido_paterno']),
			'apellido_materno' => strtoupper($datos['apellido_materno']),
			'fecha_nacimiento' => $datos['fecha_nacimiento'],
			'clave' => md5($datos['clave']),
			'updatedAt' => date('Y-m-d H:i:s'),
			'createdAt' => date('Y-m-d H:i:s'),
			'idtipousuario' => 1 // VISITANTE 
		);
		return $this->db->insert('usuario', $data);
	}
}
?>
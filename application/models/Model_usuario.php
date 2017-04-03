<?php
class Model_usuario extends CI_Model {
	public $app_db;
	public function __construct()
	{
		parent::__construct();
	}
	// public function m_record_user($datos)
	// {
	// 	$data = array(
	// 		'nombres' => $datos['nombre'],
	// 		'apellidos' => $datos['apellido'],
	// 		'emailu' => $datos['email'],
	// 		'direccion' => $datos['direccion'],
	// 		'ciudad' => $datos['ciudad'],
	// 		'paisu' => $datos['pais'],
	// 		'telefono' => $datos['telefono']
	// 	);
	// 	return $this->db->insert('usuario', $data);
	// }
 //ACCESO AL SISTEMA
	function m_get_user($data){
		//DATOS DEL USUARIO
		$this->load->helper('security');
		$this->db = $this->load->database('master', true);
		$this->db->select('empresa.empresa_id,usuario_id, permiso, nombre_usuario, nombre_bd, dir_img');
		$this->db->from('usuario',' ');
		$this->db->join('empresa','usuario.empresa_id = empresa.empresa_id');
		$this->db->join('com_venta','empresa.empresa_id = com_venta.empresa_id');
		$this->db->where('nombre_usuario', $data['usuario']);
		$this->db->where('password', do_hash($data['pass'] , 'md5'));
		$this->db->where('estado_u <>', '0');
		$this->db->limit(1);
		return $this->db->get()->row();
	}
	function m_cambiar_clave_bd_admin($datos)
	{
		$this->load->helper('security');
		$data = array(
			'password' => do_hash($datos['clave'] , 'md5')
		);
		$this->db->where('nombre_usuario', $datos['nombre_usuario']);
		$this->db->where('empresa_id', $datos['empresa_id']);
		return $this->db->update('usuario', $data);
	}
	function m_registrar($datos) 
	{
		$data = array( 
			'mail' => $datos['mail'],
			'nombre' => $datos['nombre'],
			'apellido_paterno' => $datos['apellido_paterno'],
			'apellido_materno' => $datos['apellido_materno'],
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
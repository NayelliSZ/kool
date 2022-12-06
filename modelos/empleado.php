<?php
require "../config/conexion.php";

Class Empleado{
	public function _construct(){

	}

	public function insertar($nombre, $primerApellido, $segundoApellido, $email, $fechaEntrada, $fechaBaja, $tel, $pwd, $foto)
	{
		$sql= "INSERT INTO `usuario`(`idUsuario`, `nombre`, `apellidop`, `apellidom`, `email`, `telefono`, `pwd`, `foto`, `activo`, `fechaCreacion`, `fechaBaja`, `fechaActualizacion`) values ('','$nombre', '$primerApellido', '$segundoApellido', '$email',  '$tel', '$pwd', '$foto', '1', '$fechaEntrada', '$fechaBaja', current_timestamp)";
		//$sql2= "INSERT INTO usuario_tipo (idtipo)values('idTipo');
		return ejecutarConsultaRetornaID($sql);
	}

	public function editar ($idEmpleado, $nombre, $primerApellido, $segundoApellido, $email, $fechaEntrada, $fechaBaja, $tel, $pwd, $foto, $fechaActualizacion){

		$password=($pwd=="")?"":"pwd='$pwd',";

		$sql= "UPDATE usuario SET nombre='$nombre', primerApellido='$primerApellido', segundoApellido='$segundoApellido', email='$email', fechaEntrada='$fechaEntrada', fechaBaja='$fechaBaja', telefono='$tel', ".$password." foto='$foto', fechaActualizacion='$fechaActualizacion' WHERE idEmpleado='$idEmpleado'";
			return ejecutarConsulta($sql);
	}

	public function desactivar($idEmpleado)
	{
		$sql= "UPDATE usuario SET activo= '0', fechaBaja=current_timestamp(), fechaActualizacion=current_timestamp()
		WHERE idUsuario='$idEmpleado'";
		return ejecutarConsulta($sql);
	}
	public function activar($idEmpleado)
	{
		$sql= "UPDATE usuario SET activo= '1', fechaActualizacion=current_timestamp(), fechaBaja='0000-00-00 00:00:00' WHERE idUsuario='$idEmpleado'";
		return ejecutarConsulta($sql);
	}

	public function mostrar($idEmpleado)
	{
		$sql= "SELECT
			e.idUsuario,
			e.nombre,
			e.apellidop,
			e.apellidom,
			e.email,
			e.fechaCreacion,
			e.fechaBaja,
			e.telefono,
			e.pwd,
			e.foto,
			e.activo
			FROM usuario e
			WHERE idUsuario= '$idEmpleado'";
		return ejecutarConsultaSimpleFila($sql);
	}
	
	public function listar(){
		$sql= "SELECT
			e.idUsuario,
			e.nombre,
			e.apellidop,
			e.apellidom,
			e.email,
			e.fechaCreacion,
			e.fechaBaja,
			e.telefono,
			e.pwd,
			e.foto,
			e.activo,
			d.nombre_puesto,
			e.fechaActualizacion
			FROM usuario e, usuario_tipo ut, tipo d
			where ut.idTipo= d.idTipo and ut.idUsuario= e.idUsuario";
		return ejecutarConsulta($sql);
	}

	public function select(){
		$sql= "SELECT
			e.idUsuario,
			e.nombre,
			e.apellidop,
			e.apellidom,
			e.email,
			e.fechaCreacion,
			e.fechaBaja,
			e.telefono,
			e.pwd,
			e.foto,
			e.activo,
			d.nombre_puesto
			e.fechaActualizacion
			FROM usuario e
			WHERE idUsuario= '$idEmpleado'
			AND activo='1'";
		return ejecutarConsulta($sql);
	}
}

?>
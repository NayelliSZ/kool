<?php
require "../config/conexion.php";

Class Receta{
	public function _construct(){

	}

	public function insertar($nombre, $precio, $descripcion, $foto){
		$sql= "INSERT INTO `receta`(`idReceta`, `nombre`, `precio`, `descripcion`, `foto`, `activo`, `fechaCreacion`, `fechaActualizacion`) values ('','$nombre', '$precio', '$descripcion', '$foto', '1', current_timestamp, current_timestamp)";
		return ejecutarConsultaRetornaID($sql);
	}

	public function editar ($idReceta, $nombre, $precio, $descripcion, $foto){
		$sql= "UPDATE receta SET nombre='$nombre', precio='$precio', descripcion='$descripcion', foto='$foto', fechaActualizacion=current_timestamp WHERE idReceta='$idReceta'";
			return ejecutarConsulta($sql);
	}

	public function desactivar($idReceta)
	{
		$sql= "UPDATE receta SET activo= '0', fechaActualizacion=current_timestamp() WHERE idReceta='$idReceta'";
		return ejecutarConsulta($sql);
	}
	public function activar($idReceta)
	{
		$sql= "UPDATE receta SET activo= '1', fechaActualizacion=current_timestamp() WHERE idReceta='$idReceta'";
		return ejecutarConsulta($sql);
	}

	public function mostrar($idReceta)
	{
		$sql= "SELECT
			r.idReceta,
			r.nombre,
			r.precio,
			r.descripcion,
			r.foto,
			r.activo
			FROM receta r
			WHERE idReceta= '$idReceta'";
		return ejecutarConsultaSimpleFila($sql);
	}
	
	public function listar(){
		$sql= "SELECT
			r.idReceta,
			r.nombre,
			r.precio,
			r.descripcion,
			r.foto,
			r.activo
			FROM receta r";
		return ejecutarConsulta($sql);
	}

	public function select(){
		$sql= "SELECT
			r.idReceta,
			r.nombre,
			r.precio,
			r.descripcion,
			r.foto,
			r.activo
			FROM receta r
			WHERE idReceta= '$idReceta'
			AND activo='1'";
		return ejecutarConsulta($sql);
	}
}

?>
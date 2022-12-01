<?php
require "../config/conexion.php";

Class Inventario{
	public function _construct(){

	}

	public function insertar($nombre, $existencia, $costo, $orden, $foto){
		$sql= "INSERT INTO `inventario`(`idProd`, `nombre`, `existencia`, `costo`, `orden`, `foto`, `activo`, `fechaCreacion`, `fechaActualizacion`) values ('','$nombre', '$existencia', '$costo', '$orden', '$foto', '1', current_timestamp, current_timestamp)";
		return ejecutarConsultaRetornaID($sql);
	}

	public function editar ($idProd, $nombre, $existencia, $costo, $orden, $foto){
		$sql= "UPDATE inventario SET nombre='$nombre', existencia='$existencia', costo='$costo', orden='$orden', foto='$foto', fechaActualizacion=current_timestamp WHERE idProd='$idProd'";
			return ejecutarConsulta($sql);
	}

	public function desactivar($idProd)
	{
		$sql= "UPDATE inventario SET activo= '0', fechaActualizacion=current_timestamp() WHERE idProd='$idProd'";
		return ejecutarConsulta($sql);
	}
	public function activar($idProd)
	{
		$sql= "UPDATE inventario SET activo= '1', fechaActualizacion=current_timestamp() WHERE idProd='$idProd'";
		return ejecutarConsulta($sql);
	}

	public function mostrar($idProd)
	{
		$sql= "SELECT
			i.idProd,
			i.nombre,
			i.existencia,
			i.costo,
			i.orden,
			i.foto,
			i.activo
			FROM inventario i
			WHERE idProd= '$idProd'";
		return ejecutarConsultaSimpleFila($sql);
	}
	
	public function listar(){
		$sql= "SELECT
			i.idProd,
			i.nombre,
			i.existencia,
			i.costo,
			i.orden,
			i.foto,
			i.activo
			FROM inventario i";
		return ejecutarConsulta($sql);
	}

	public function select(){
		$sql= "SELECT
			i.idProd,
			i.nombre,
			i.existencia,
			i.costo,
			i.orden,
			i.foto,
			i.activo
			FROM inventario i
			WHERE idProd= '$idProd'
			AND activo='1'";
		return ejecutarConsulta($sql);
	}
}

?>
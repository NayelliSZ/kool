<?php
require "../config/conexion.php";

Class Venta{
	public function _construct(){

	}

	public function insertar($nombre_cliente, $totalp, $propina, $totalpr, $idUsuario)
	{
		$sql= "INSERT INTO `venta`(`idVenta`, `nombre_cliente`, `total_pagar`, `propina`, `total_propina`, `idUsuario`, `fechaCreacion`, `fechaActualizacion`) values ('','$nombre_cliente', '$totalp', '$propina', '$totalpr',  '$idUsuario', current_timestamp, current_timestamp)";
		return ejecutarConsultaRetornaID($sql);
	}

	public function editar ($idVenta, $nombre_cliente, $totalp, $propina, $totalpr){
		$sql= "UPDATE venta SET nombre_cliente='$nombre_cliente', total_pagar='$totalp', propina='$propina', total_propina='$totalpr', fechaActualizacion=current_timestamp WHERE idVenta='$idVenta'";
			return ejecutarConsulta($sql);
	}

	public function mostrar($idVenta)
	{
		$sql= "SELECT
			e.idVenta,
			e.nombre_cliente,
			e.total_pagar,
			e.propina,
			e.total_propina,
			e.fechaCreacion
			FROM venta e
			WHERE idVenta= '$idVenta'";
		return ejecutarConsultaSimpleFila($sql);
	}
	
	public function listar(){
		$sql= "SELECT
			e.idVenta,
			e.nombre_cliente,
			e.total_pagar,
			e.propina,
			e.total_propina,
			e.estatus,
			e.fechaCreacion
			FROM venta e";
		return ejecutarConsulta($sql);
	}

	public function select(){
		$sql= "SELECT
			e.idVenta,
			e.nombre_cliente,
			e.total_pagar,
			e.propina,
			e.total_propina,
			e.fechaCreacion,
			e.idUsuario,
			e.fechaActualizacion
			FROM venta e
			WHERE idVenta= '$idVenta'";
		return ejecutarConsulta($sql);
	}
}

?>
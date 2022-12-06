<?php
require "../config/conexion.php";

Class Ganancia{
	public function _construct(){

	}
	
	public function listar(){
		$sql= "SELECT
			e.idVenta,
			e.total_pagar,
			e.propina,
			e.total_propina,
			e.forma_pago,
			e.fechaCreacion,
			e.nada
			FROM venta e where e.estatus = 1";
		return ejecutarConsulta($sql);
	}
}

?>
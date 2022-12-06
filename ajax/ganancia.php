<?php

require_once "../modelos/ganancia.php";

$ganancia = new Ganancia();

$idVenta = isset($_POST['idVenta'])?limpiarCadenas($_POST['idVenta']):"";
$total_pagar = isset($_POST['total_pagar'])?limpiarCadenas($_POST['total_pagar']):"";
$propina = isset($_POST['propina'])?limpiarCadenas($_POST['propina']):"";
$total_propina = isset($_POST['total_propina'])?limpiarCadenas($_POST['total_propina']):"";
$forma_pago = isset($_POST['forma_pago'])?limpiarCadenas($_POST['forma_pago']):"";
$nada = isset($_POST['nada'])?limpiarCadenas($_POST['nada']):"";


$fechaActualizacion=date("Y-m-d H:i:s");

switch ($_GET["op"]) {
	case 'listar':
		$rspta = $ganancia -> listar();
		write_log(json_encode($rspta));
		$data = Array();
		while ($reg = $rspta -> fetch_object()){
			$data[] = array(
				"0"=>$reg->total_pagar,
				"1"=>$reg->propina,
				"2"=>$reg->total_propina,
				"3"=>($reg->forma_pago==0)? $reg->total_propina : (($reg->forma_pago==2)? $reg->total_pagar : (($reg->forma_pago==3)? $reg->propina :$reg->nada)),
				"4"=>($reg->forma_pago==1)? $reg->total_propina : (($reg->forma_pago==3)? $reg->total_pagar : (($reg->forma_pago==2)? $reg->propina :$reg->nada))

			);
		}
		$results=array(
			"sEcho"=>1,
			"iTotalRecords"=>count($data),
			"iTotalDisplayRecords"=>count($data),
			"aaData"=>$data);	
		echo json_encode($results);
		break;
	}
?>
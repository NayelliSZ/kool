<?php

require_once "../modelos/venta.php";

$venta = new Venta();

$idVenta = isset($_POST['idVenta'])?limpiarCadenas($_POST['idVenta']):"";
$nombre = isset($_POST['nombre'])?limpiarCadenas($_POST['nombre']):"";
$total_pagar = isset($_POST['total_pagar'])?limpiarCadenas($_POST['total_pagar']):"";
$propina = isset($_POST['propina'])?limpiarCadenas($_POST['propina']):"";
$total_propina = isset($_POST['total_propina'])?limpiarCadenas($_POST['total_propina']):"";


$fechaActualizacion=date("Y-m-d H:i:s");

switch ($_GET["op"]) {
	case 'guardaryeditar':
		if(empty($idVenta)){
			if(empty($idVenta)){
				$rspta=$venta->insertar($nombre, $total_pagar, $propina, $total_propina);
				echo $rspta!=0?"Venta registrada":"Error venta no registrada";
			}
		}else{
			$rspta=$venta->editar($idVenta, $nombre, $total_pagar, $propina, $total_propina);
			echo $rspta!=0?"Venta actualizada":"Error venta no actualizada";
		}
		break;
	case 'listar':
		$rspta = $venta -> listar();
		write_log(json_encode($rspta));
		$data = Array();
		while ($reg = $rspta -> fetch_object()){
			$data[] = array(
				"0"=>($reg -> activo)?'<button class="btn btn-warning" onClick="mostrar('.$reg->idVenta.')"><i class="far fa-edit"></i></button>'.
				'<button class="btn btn-danger" onClick="desactivar('.$reg->idVenta.')"><i class="far fa-window-close"></i></button>':'<button class="btn btn-warning" onClick="mostrar('.$reg->idVenta.')"><i class="far fa-edit"></i></button>'.
				'<button class="btn btn-primary" onClick="activar('.$reg->idVenta.')"><i class="far fa-check-square"></i></button>',
				"1"=>$reg->nombre_cliente,
				"2"=>$reg->total_pagar,
				"3"=>$reg->propina,
				"4"=>$reg->total_propina,
				"5"=>($reg->activo)?'<span class="badge badge-success">Pagado</span>':'<span class="badge badge-danger">Sin pagar</span>'
			);
		}
		$results=array(
			"sEcho"=>1,
			"iTotalRecords"=>count($data),
			"iTotalDisplayRecords"=>count($data),
			"aaData"=>$data);	
		echo json_encode($results);

		break;

	case 'mostrar':
		$rspta = $venta ->mostrar($idVenta);
		write_log("Ajax Venta Caso Mostrar");
		write_log(json_encode($rspta));

		$rspta["nombre"]=$rspta["nombre"];
		$rspta["total_pagar"]=$rspta["total_pagar"];
		$rspta["propina"]=$rspta["propina"];
		$rspta["total_propina"]=$rspta["total_propina"];
		echo json_encode($rspta);
		break;
		
	case 'desactivar':
		$rspta = $venta ->desactivar($idVenta);
		echo $rspta?"Venta desactivado":"La venta no se pudo desactivar";
		break;

	case 'activar':
		$rspta = $venta ->activar($idVenta);
		echo $rspta?"Venta activado":"La venta no se pudo activar";
		break;
	}
?>
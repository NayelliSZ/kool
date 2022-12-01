<?php

require_once "../modelos/inventario.php";

$inventario = new Inventario();

$idProd = isset($_POST['idProd'])?limpiarCadenas($_POST['idProd']):"";
$nombre = isset($_POST['nombre'])?limpiarCadenas($_POST['nombre']):"";
$existencia = isset($_POST['existencia'])?limpiarCadenas($_POST['existencia']):"";
$costo = isset($_POST['costo'])?limpiarCadenas($_POST['costo']):"";
$orden = isset($_POST['orden'])?limpiarCadenas($_POST['orden']):"";
$fotoActual = isset($_POST['fotoActual'])?limpiarCadenas($_POST['fotoActual']):"";


$fechaActualizacion=date("Y-m-d H:i:s");

switch ($_GET["op"]) {
	case 'guardaryeditar':
		if(empty($idProd)){
			if(!file_exists($_FILES['foto']['tmp_name'])||!is_uploaded_file($_FILES['foto']['tmp_name'])){
				$imagen=$fotoActual;
			}else{
				$ext=explode(".", $_FILES['foto']['name']);
				if($_FILES['foto']['type']=="image/jpg"||$_FILES['foto']['type']=="image/jpeg"||$_FILES['foto']['type']=="image/png"){
					$imagen=round(microtime(true)).'.'.end($ext);
					move_uploaded_file($_FILES['foto']['tmp_name'], '../files/img/'.$imagen);
				}
			}
			if(strlen($imagen)<1){
				$imagen='default.png';
			}
			if(empty($idProd)){
				$rspta=$inventario->insertar($nombre, $existencia, $costo, $orden, $imagen);
				echo $rspta!=0?"Inventario registrado":"Error inventario no registrado";
			}
		}else{
			$rspta=$inventario->editar($idProd, $nombre, $existencia, $costo, $orden, $fotoActual);
			echo $rspta!=0?"Inventario actualizado":"Error inventario no actualizado";
		}
		break;
	case 'listar':
		$rspta = $inventario -> listar();
		write_log(json_encode($rspta));
		$data = Array();
		while ($reg = $rspta -> fetch_object()){
			$data[] = array(
				"0"=>($reg -> activo)?'<button class="btn btn-warning" onClick="mostrar('.$reg->idProd.')"><i class="far fa-edit"></i></button>'.
				'<button class="btn btn-danger" onClick="desactivar('.$reg->idProd.')"><i class="far fa-window-close"></i></button>':'<button class="btn btn-warning" onClick="mostrar('.$reg->idProd.')"><i class="far fa-edit"></i></button>'.
				'<button class="btn btn-primary" onClick="activar('.$reg->idProd.')"><i class="far fa-check-square"></i></button>',
				"1"=>$reg->nombre,
				"2"=>$reg->existencia,
				"3"=>$reg->costo,
				"4"=>$reg->orden,
				"5"=>($reg->activo)?'<span class="badge badge-success">Activado</span>':'<span class="badge badge-danger">Desactivado</span>'
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
		$rspta = $inventario ->mostrar($idProd);
		write_log("Ajax Inventario Caso Mostrar");
		write_log(json_encode($rspta));

		$rspta["nombre"]=$rspta["nombre"];
		$rspta["existencia"]=$rspta["existencia"];
		$rspta["costo"]=$rspta["costo"];
		$rspta["orden"]=$rspta["orden"];
		echo json_encode($rspta);
		break;
		
	case 'desactivar':
		$rspta = $inventario ->desactivar($idProd);
		echo $rspta?"Inventario desactivado":"La inventario no se pudo desactivar";
		break;

	case 'activar':
		$rspta = $inventario ->activar($idProd);
		echo $rspta?"Inventario activado":"La inventario no se pudo activar";
		break;
	}
?>
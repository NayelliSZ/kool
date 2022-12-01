<?php

require_once "../modelos/receta.php";

$receta = new Receta();

$idReceta = isset($_POST['idReceta'])?limpiarCadenas($_POST['idReceta']):"";
$nombre = isset($_POST['nombre'])?limpiarCadenas($_POST['nombre']):"";
$precio = isset($_POST['precio'])?limpiarCadenas($_POST['precio']):"";
$descripcion = isset($_POST['descripcion'])?limpiarCadenas($_POST['descripcion']):"";
$fotoActual = isset($_POST['fotoActual'])?limpiarCadenas($_POST['fotoActual']):"";


$fechaActualizacion=date("Y-m-d H:i:s");

switch ($_GET["op"]) {
	case 'guardaryeditar':
		if(empty($idReceta)){
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
			if(empty($idReceta)){
				$rspta=$receta->insertar($nombre, $precio, $descripcion, $imagen);
				echo $rspta!=0?"Receta registrado":"Error receta no registrado";
			}
		}else{
			$rspta=$receta->editar($idReceta, $nombre, $precio, $descripcion, $fotoActual);
			echo $rspta!=0?"Receta actualizado":"Error receta no actualizado";
		}
		break;
	case 'listar':
		$rspta = $receta -> listar();
		write_log(json_encode($rspta));
		$data = Array();
		while ($reg = $rspta -> fetch_object()){
			$data[] = array(
				"0"=>($reg -> activo)?'<button class="btn btn-warning" onClick="mostrar('.$reg->idReceta.')"><i class="far fa-edit"></i></button>'.
				'<button class="btn btn-danger" onClick="desactivar('.$reg->idReceta.')"><i class="far fa-window-close"></i></button>':'<button class="btn btn-warning" onClick="mostrar('.$reg->idReceta.')"><i class="far fa-edit"></i></button>'.
				'<button class="btn btn-primary" onClick="activar('.$reg->idReceta.')"><i class="far fa-check-square"></i></button>',
				"1"=>$reg->nombre,
				"2"=>$reg->precio,
				"3"=>$reg->descripcion,
				"4"=>($reg->activo)?'<span class="badge badge-success">Activado</span>':'<span class="badge badge-danger">Desactivado</span>'
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
		$rspta = $receta ->mostrar($idReceta);
		write_log("Ajax Receta Caso Mostrar");
		write_log(json_encode($rspta));

		$rspta["nombre"]=$rspta["nombre"];
		$rspta["precio"]=$rspta["precio"];
		$rspta["descripcion"]=$rspta["descripcion"];
		echo json_encode($rspta);
		break;
		
	case 'desactivar':
		$rspta = $receta ->desactivar($idReceta);
		echo $rspta?"Receta desactivado":"La receta no se pudo desactivar";
		break;

	case 'activar':
		$rspta = $receta ->activar($idReceta);
		echo $rspta?"Receta activado":"La receta no se pudo activar";
		break;
	}
?>
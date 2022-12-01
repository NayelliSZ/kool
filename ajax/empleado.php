<?php

require_once "../modelos/empleado.php";

$empleado = new Empleado();

$idEmpleado = isset($_POST['idEmpleado'])?limpiarCadenas($_POST['idEmpleado']):"";
$nombre = isset($_POST['nombre'])?limpiarCadenas($_POST['nombre']):"";
$primerApellido = isset($_POST['primerApellido'])?limpiarCadenas($_POST['primerApellido']):"";
$segundoApellido = isset($_POST['segundoApellido'])?limpiarCadenas($_POST['segundoApellido']):"";
$email = isset($_POST['email'])?limpiarCadenas($_POST['email']):"";
$fechaEntrada = isset($_POST['fechaEntrada'])?limpiarCadenas($_POST['fechaEntrada']):"";
$fechaBaja = isset($_POST['fechaBaja'])?limpiarCadenas($_POST['fechaBaja']):"";
$tel = isset($_POST['tel'])?limpiarCadenas($_POST['tel']):"";
$idTipo1 = isset($_POST['1'])?limpiarCadenas($_POST['1']):"";
$idTipo2 = isset($_POST['2'])?limpiarCadenas($_POST['2']):"";
$idTipo3 = isset($_POST['3'])?limpiarCadenas($_POST['3']):"";
$idTipo4 = isset($_POST['4'])?limpiarCadenas($_POST['4']):"";
$usr = isset($_POST['tel'])?limpiarCadenas($_POST['tel']):"";
$pwd = isset($_POST['pwd'])?limpiarCadenas($_POST['pwd']):"";
$fotoActual = isset($_POST['fotoActual'])?limpiarCadenas($_POST['fotoActual']):"";


$fechaActualizacion=date("Y-m-d H:i:s");

switch ($_GET["op"]) {
	case 'guardaryeditar':
		if(empty($idEmpleado)){
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
			if(empty($idEmpleado)){
				$nombre=encryption($nombre);
				$primerApellido=encryption($primerApellido);
				$segundoApellido=encryption($segundoApellido);
				$pwd=set_pass($pwd);
				$rspta=$empleado->insertar($nombre, $primerApellido, $segundoApellido, $email, $fechaEntrada, $fechaBaja, $tel, $pwd, $imagen);
				//$rspta2=$tipo->insertar($idTipo);
				echo $rspta!=0?"Empleado registrado":"Error empleado no registrado";
			}
		}else{
			$hasValidador=hash("sha256","Contraseña no actualizada");
				//write_log("Ajax empleado - editar valor de hasValidador: $hasValidador || pwd = $pwd");
			if($pwd == $hasValidador){
				$pwd="";
				//write_log("Ajax empleado - editar iguales valor de hasValidador: $hasValidador || pwd = $pwd");
			}else{
				$pwd=set_pass($pwd);
				//write_log("Ajax empleado - editar diferentes valor de hasValidador: $hasValidador || pwd = $pwd");
			}
			$nombre=encryption($nombre);
			$primerApellido=encryption($primerApellido);
			$segundoApellido=encryption($segundoApellido);

			$rspta=$empleado->editar($idEmpleado, $nombre, $primerApellido, $segundoApellido, $email, $fechaEntrada, $fechaBaja, $idTipo, $tel, $pwd, $fotoActual, $fechaActualizacion);
			echo $rspta!=0?"Empleado actualizado":"Error empleado no actualizado";
		}
		break;
	case 'listar':
		$rspta = $empleado -> listar();
		write_log(json_encode($rspta));
		$data = Array();
		while ($reg = $rspta -> fetch_object()){
			$data[] = array(
				"0"=>($reg -> activo)?'<button class="btn btn-warning" onClick="mostrar('.$reg->idUsuario.')"><i class="far fa-edit"></i></button>'.
				'<button class="btn btn-danger" onClick="desactivar('.$reg->idUsuario.')"><i class="far fa-window-close"></i></button>':'<button class="btn btn-warning" onClick="mostrar('.$reg->idUsuario.')"><i class="far fa-edit"></i></button>'.
				'<button class="btn btn-primary" onClick="activar('.$reg->idUsuario.')"><i class="far fa-check-square"></i></button>',
				"1"=>decryption($reg->nombre),
				"2"=>decryption($reg->apellidop),
				"3"=>$reg->email,
				"4"=>$reg->telefono,
				"5"=>$reg->nombre_puesto,
				"7"=>$reg->fechaCreacion,
				"8"=>$reg->fechaBaja,
				"6"=>($reg->activo)?'<span class="badge badge-success">Activado</span>':'<span class="badge badge-danger">Desactivado</span>'
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
		$rspta = $empleado ->mostrar($idEmpleado);
		write_log("Ajax Empleado Caso Mostrar");
		write_log(json_encode($rspta));

		$rspta["nombre"]=decryption($rspta["nombre"]);
		$rspta["primerApellido"]=decryption($rspta["apellidop"]);
		$rspta["segundoApellido"]=decryption($rspta["apellidom"]);
		$rspta["tel"]=$rspta["telefono"];

		if(strlen(strtotime($rspta["fechaCreacion"]))>1){
			$rspta["fechaEntrada"]=date("Y-m-d",strtotime($rspta["fechaCreacion"]));
		}
		if(strlen(strtotime($rspta["fechaBaja"]))>1){
			$rspta["fechaBaja"]=date("Y-m-d",strtotime($rspta["fechaBaja"]));
		}

		$rspta["pwd"]=hash("sha256","Contraseña no actualizada");


		echo json_encode($rspta);
		break;
		
	case 'desactivar':
		$rspta = $empleado ->desactivar($idEmpleado,$fechaActualizacion,$idEmpActualiza);
		echo $rspta?"Empleado desactivado":"La empleado no se pudo desactivar";
		break;

	case 'activar':
		$rspta = $empleado ->activar($idEmpleado,$fechaActualizacion,$idEmpActualiza);
		echo $rspta?"Empleado activado":"La empleado no se pudo activar";
		break;
	}
?>
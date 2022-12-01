//create a global variable
var table;
function init(){
	mostrarform(false);
	listar();
	$("#formulario").on("submit", function(e){
		guardaryeditar(e);
		}
	);
}


function limpiar(){
	$("#idReceta").val("");
	$("#nombre").val("");
	$("#precio").val("");
	$("#descripcion").val("");
	$("#foto").val("");
	$("#fotoActual").val("");
	$("#imagenmuestra").attr("src", "");
}

function mostrarform(flag){

	limpiar();
	if(flag){
		$("#listadoregdata").hide();
		$("#formregdata").show();
		$("#btnagregar").hide();
		$("#btnGuardar").prop("disable",false);
	}else{
		$("#listadoregdata").show();
		$("#formregdata").hide();
		$("#btnagregar").show();
	}
}

function cancelarform(){
		limpiar();
		mostrarform(false);
}

function guardaryeditar(e){
	e.preventDefault();
	$("#btnagregar").prop("disable",true);
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/receta.php?op=guardaryeditar",
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,

		success: function (mensaje){
			valida= mensaje.indexOf('rror');
			if(valida!=-1){
				toastr["error"](mensaje);
			}else{
				toastr["success"](mensaje);
			}

			mostrarform(false);
			table.ajax.reload();
			listar();
		}
	});
	listar();
	limpiar();
}

function listar(){
	table=$('#tblistadoregdata').dataTable({
		"Processing": true, //activar procesamiento de las tablas
		"ServerSide": true, //paginación y filtros sean realizados por el servidor
		responsive: true, //activar capacidades responsivas de la tabla 
		dom: '<"top"Bfl>rt<"bottom"ip><"clear">', //definir elementos del control dataTables
												//B botones export, f filtro sencillo, l selector de filas
												//r mensaje de procesamiento, t Table como tal, i informacion
												//p paginacion
		buttons:[
			'copyHtml5',
			'excelHtml5',
			'csvHtml5',
			'pdfHtml5'
		],
		"ajax":{
			url:'../ajax/receta.php?op=listar',
			type:"get", 
			dataType: "json",
			error: function(e){
				console.log(e.responseText);
			}
		},
		"destroy": true,
		"iDisplayLength":3,
		"order": [[1,"desc"]]
	}).DataTable();
}

function mostrar(idReceta){
	$.post("../ajax/receta.php?op=mostrar", {idReceta:idReceta}, function(data){
		console.log(data);
		data=JSON.parse(data);
		mostrarform(true);
		$('#idReceta').val(data.idReceta);
		$('#nombre').val(data.nombre);
		$('#precio').val(data.precio);
		$('#descripcion').val(data.descripcion);
		$('#fotoActual').val(data.foto);
		$('#imagenmuestra').attr("src","../files/img/"+data.foto);
	});
}

function desactivar(idReceta){
	var ventanaEleccion = toastr.warning('¿Deseas desactivar el producto seleccionado?<br>'+
		'<button type="button" id="rsptaSi" class="btn btn-success">SI</button>'+
		'<button type="button" id="rsptaNo" class="btn btn-danger">NO</button>',"Alerta");
	$('#rsptaSi').click(function () {
		console.log("El usuario ha elegido desactivar el producto");
		toastr.clear(ventanaEleccion);
		$.post("../ajax/receta.php?op=desactivar", {idReceta:idReceta}, function(mensaje){
			valida= mensaje.indexOf('rror');
			if(valida!=-1){
				toastr["error"](mensaje);
			}else{
				toastr["success"](mensaje);
			}
			mostrarform(false);
			table.ajax.reload();
			//listar();
		});
	});

	$('#rsptaNo').click(function () {
		console.log("El usuario ha elegido cancelar la accion");
		toastr.clear(ventanaEleccion);
	});
}

function activar(idReceta){
	var ventanaEleccion = toastr.warning('¿Deseas activar el producto seleccionado?<br>'+
		'<button type="button" id="rsptaSi" class="btn btn-success">SI</button>'+
		'<button type="button" id="rsptaNo" class="btn btn-danger">NO</button>',"Alerta");
	$('#rsptaSi').click(function () {
		console.log("El usuario ha elegido activar el producto");
		toastr.clear(ventanaEleccion);
		$.post("../ajax/receta.php?op=activar", {idReceta:idReceta}, function(mensaje){
			valida= mensaje.indexOf('rror');
			if(valida!=-1){
				toastr["error"](mensaje);
			}else{
				toastr["success"](mensaje);
			}
			mostrarform(false);
			listar();
		});
	});

	$('#rsptaNo').click(function () {
		console.log("El usuario ha elegido cancelar la accion");
		toastr.clear(ventanaEleccion);
	});
}

init();
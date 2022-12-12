//create a global variable
var table;
function init(){
	listar();
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
			'excelHtml5',
			'pdfHtml5'
		],
		"ajax":{
			url:'../ajax/ganancia.php?op=listar',
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

init();
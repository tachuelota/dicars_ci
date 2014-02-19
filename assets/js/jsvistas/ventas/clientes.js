$(document).ready(function(){
	$("#ClienteForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	var Ubigeos = getAjaxObject($("#ClienteForm").attr("data-source"));
	cargarUbigeo(Ubigeos,"dist", "prov", "dep");

    //selector por clase 
	$(".ubigeo").change(function(){
		cargarZonas();
	});

	var cargarZonas = function(){
		var zonas=getAjaxObject($("#zonas").attr("data-source")+ $("#dist").val());
		cargarSelect(zonas.aaData,"zonas","nZona_id","cZonaDesc");
	};
	cargarZonas();

 	//-------- nombreTableAccion (..ta)
	var ClientesTA = new DTActions({
	'conf': '010',
	'idtable': 'clientes_table',
	'EditFunction': function(nRow, aData, iDisplayIndex) {
		$("#btn-reg-clientes").hide();
		$("#btn-editar-clientes").show();
		$('#modalClientes').modal('show');
		$("#nombres").val(aData.cClienteNom);	
		$("#apellidos").val(aData.cClienteApe);
		$("#dni").val(aData.cClienteDNI);	
		$("#referencia").val(aData.cClienteRef);	
		$("#direccion").val(aData.cClientecDir);	
		$("#zonas").val(aData.nZona_id);	
		$("#lineaop").val(aData.nClienteLineaOp);	
		$("#ocupacion").val(aData.cClienteOcup);		
		$("#idClientes").val(aData.nCliente_id);
		cargarZonas();
		},
	});

//----------------------
   ClientesRowCBF = function(nRow, aData, iDisplayIndex){
	ClientesTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	var UrlaDTable = $("#clientes_table").attr("data-source");
	//console.log(UrlaDTable);
	FormatoClientes = [
	{ "sWidth": "30%","mDataProp": "cClienteNom"},
	{ "sWidth": "30%","mDataProp": "cClienteApe"},
	{ "sWidth": "20%","mDataProp": "cClienteDNI"},	
	{ "sWidth": "20%","mDataProp": "nClienteLineaOp"}

	];

	ClientesTable = createDataTable('clientes_table',UrlaDTable,FormatoClientes,null,ClientesRowCBF);


	var successClientes = function(){
	$('#modalClientes').modal('hide');
	ClientesTable.fnReloadAjax()
	}


	//--funcion de los botones

	$('#modalClientes').on('hidden', function(){		
		$("#ClienteForm").reset();
		$("#btn-reg-clientes").show();
		$("#btn-editar-clientes").hide();
	});

	$("#btn-reg-clientes").click(function(event){
	event.preventDefault();
	if($("#ClienteForm").validationEngine('validate'))
	{
	enviar($("#ClienteForm").attr("action-1"),{formulario:$("#ClienteForm").serializeObject()}, successClientes, null);
	}
	});
	$("#btn-editar-clientes").click(function(event){
	event.preventDefault();
	if($("#ClienteForm").validationEngine('validate'))
	enviar($("#ClienteForm").attr("action-2"),{formulario:$("#ClienteForm").serializeObject()}, successClientes, null);
	});



	//codigo del php anterior
	$('.btn-registrar').click(function(e){
	e.preventDefault();
	$('#modalClientes').modal('show');
	});

	$("#pdfgen").click(function(){
	$("#title").val("LISTA DE CLIENTES");
	$("#exportmodal").modal('show');	
	});

	$("#pdfbutton").click(function(e){
	e.preventDefault();
	$("#CreatePDFForm").attr("action",urlExportPDF);
	$("#CreatePDFForm").submit();
	$("#exportmodal").modal('hide');
	});

	$("#xlsutton").click(function(e){
	e.preventDefault();
	$("#CreatePDFForm").attr("action",urlExportXLS);
	$("#CreatePDFForm").submit();
	$("#exportmodal").modal('hide');
	});
	  // fin
	});
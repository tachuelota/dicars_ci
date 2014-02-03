var urlExportCierreXLS = "extensiones/reportes_xls/formato_reporte_cuadrecaja.php";
var urlExportCierrePDF = "extensiones/reportes_pdf/formato_reporte_cuadrecaja.php";

$('#lanza-cierremes').click(function(e){
	e.preventDefault();
	$('#modalcierremes').modal('show');
});

$('#btn-cierremes').click(function(){
	$('#modalcierremes').modal('hide');
	var ajax = $.ajax({
		url: "{{ path('dicars_logistica_servicio_cierremes',{'idlocal':''}) }}/"+2,
		dataType: "json",
		async: false
	});
	ajax.done(function(data){
		$('#aftercierremes').modal('show');
	});
});

$('#lanza-cuadrecaja').click(function(e){
	e.preventDefault();
	$('#modalcuadrecaja').modal('show');
});

$('#pdfcuadrecaja').click(function(e){
	e.preventDefault();
	$("#FormCuadreCaja").attr("action",urlExportCierrePDF);
	$('#FormCuadreCaja').submit();
	$('#table_cuadrecaja').val('');
	$('#modalcuadrecaja').modal('hide');
});

$('#xlscuadrecaja').click(function(e){
	e.preventDefault();
	$("#FormCuadreCaja").attr("action",urlExportCierreXLS);
	$('#FormCuadreCaja').submit();
	$('#table_cuadrecaja').val('');
	$('#modalcuadrecaja').modal('hide');
});
		
var oTable;

var ReloadTableEditar;
var ReloadTableRegistrar;
var DrawCallbackClientes;
var tabla_clientes;

var CargarBotones;
var ClientesTable;
var finishUploadEditar;
var idcliente;

var urlExportXLS = "extensiones/reportes_xls/formato_reporte_clientes.php";
var urlExportPDF = "extensiones/reportes_pdf/formato_reporte_clientes.php";

$(document).ready(function(){

	finishUploadEditar = function(){
		$('#EditarClienteForm').unbind();
		$('#EditarClienteForm').submit();
	};

	$('.btn-datos').click(function(e){
		e.preventDefault();
		$('#modalVerDatos').modal('show');
	});
	$('.btn-editar').click(function(e){
		e.preventDefault();
		$('#modalEditarDatos').modal('show');
	});
	$('.btn-registrar').click(function(e){
		e.preventDefault();
		$('#modalRegistro').modal('show');
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
});
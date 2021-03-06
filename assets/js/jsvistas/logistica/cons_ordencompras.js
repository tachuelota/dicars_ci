var urlES =  "js/es_ES.txt";

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
	$(document).ready(function(){
		$("#OrdCompraForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	var OrdenCompraTA = new DTActions({
		'conf': '100',
		'idtable': 'ordcom_table',
		'ViewFunction':function(nRow, aData, iDisplayIndex){
			location.href = $("#OrdCompraForm").attr("action-2")+"/"+aData.nOrdenCom_id;
		}
	});
	OrdenCompraRowCBF = function(nRow, aData, iDisplayIndex){
		OrdenCompraTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};
	var UrlaDTable = $("#ordcom_table").attr("data-source");
	FormatoDTable = [
		              { "sWidth": "10%","mDataProp": "nOrdenCom_id"},
		              { "sWidth": "15%","mDataProp": "OrdComFecReg"},
		              { "sWidth": "20%","mDataProp": "cPersonalNom"},
		              { "sWidth": "20%","mDataProp": "cProveedorRazSocial"},
		              { "sWidth": "10%","mDataProp": "nOrdComTotal"}
		              //{ "sWidth": "10%","mDataProp": "cLocalDesc"}
		              ];

	OrdenCompraTable = createDataTable('ordcom_table',UrlaDTable,FormatoDTable,null, OrdenCompraRowCBF);

	$("#buscarfecha").click(function(event){
		date1 = new Date($("#date01").datepicker("getDates"));
		date2 = new Date($("#date02").datepicker("getDates"));
		OrdenCompraTable.fnReloadAjax($("#OrdCompraForm").attr("action-1")+"/"+fechaFormatoSQL(date1)+"/"+fechaFormatoSQL(date2))
	});

	});


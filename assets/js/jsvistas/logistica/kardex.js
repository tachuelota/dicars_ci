
	$(document).ready(function(){
		var urlExportGenXLS = base_url +"assets/extensiones/reportes_xls/formato_reporte_kargexgen.php";
		var urlExportValXLS = base_url+ "assets/extensiones/reportes_xls/formato_reporte_kargexval.php";
		//CREAMOS DATATABLE
		$("#KardexForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
			var KardexTA = new DTActions({
			'conf': '000',
			'idtable': 'kardex_table',
		});
	KardexRowCBF = function(nRow, aData, iDisplayIndex){	
	};
	var UrlaDTable = $("#kardex_table").attr("data-source");
	FormatoDTable = [
		              { "sWidth": "10%","mDataProp": "Anio"},
		              { "sWidth": "10%","mDataProp": "Mes"},
		              { "sWidth": "25%","mDataProp": "Producto"},
		              { "sWidth": "15%","mDataProp": "TipoIngreso"},
		              { "sWidth": "15%","mDataProp": "Cantidad"},
		              { "sWidth": "15%","mDataProp": "PrecUnit"},
		              { "sWidth": "15%","mDataProp": "PrecTot"}
		              ];
	KardexTable = createDataTable('kardex_table',UrlaDTable,FormatoDTable,null, KardexRowCBF);
	
	$("#buscarfecha").click(function(event){
		date1 = new Date($("#date01").datepicker("getDates"));
		KardexTable.fnReloadAjax($("#KardexForm").attr("action-1")+"/"+fechaFormatoSQL(date1))
	});

	function getUrlRangoFecha(){
	var date01 = $("#date01").val().split('/');
	var fecha = date01[2]+'-'+date01[1]+'-'+date01[0];
	Urlreturn = '{{ path("dicars_logistica_servicio_gettablakardex",{"fecha":"fecha"}) }}';
	Urlreturn = Urlreturn.replace('fecha',fecha);

	return Urlreturn;
}

function getUrlRangoFechaVal(){
	var date01 = $("#date01").val().split('/');
	var fecha = date01[2]+'-'+date01[1]+'-'+date01[0];
	Urlreturn = '{{ path("dicars_logistica_servicio_gettablakardexval",{"fecha":"fecha"}) }}';
	Urlreturn = Urlreturn.replace('fecha',fecha);

	return Urlreturn;
}

	function prepararGenDatos(){
	var tablakardex = toHTML(crearTablaToArray("tdetalle",
			['Año','Mes', 'Documento','Producto','Detalle','Tipo de Ingreso','Cantidad','Prec. Unitario s/.','Prec. Total s/.'],
			['class="prodth" ','class="prodth" ','class="prodth" ','class="prodth" ','class="prodth" ','class="prodth" ','class="prodth" ','class="prodth" ','class="prodth" '],
			['Anio','Mes','Documento','Producto','Detalle','TipoIngreso','Cantidad','PrecUnit','PrecTot'],
			['style="width: 15%;"','style="width: 15%;"','style="width: 25%;"','style="width: 15%;"','style="width: 15%;"','style="width: 15%;"'],
			KardexTable.fnGetData()));

	var titulo = "Kardex General ";
   	
	$('#table_kardexgen').val(tablakardex);
	$('#titulo').val(titulo);
}
	//BOTON REPORTE RESUMEN
	$("#xlsresumengen").click(function(e){
		e.preventDefault();
		prepararGenDatos();
		$("#CreateXLSGenForm").attr("action",urlExportGenXLS);
		$("#CreateXLSGenForm").submit();
	});
});
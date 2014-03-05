	var urlES =  "js/es_ES.txt";

		//var urlExportCierreXLS = base_url +"extensiones/reportes_xls/formato_reporte_logistica.php";
		//var urlExportCierrePDF = base_url +"extensiones/reportes_pdf/formato_reporte_logistica.php";
		var urlExportXLS = base_url +"assets/extensiones/reportes_xls/formato_reporte_saldos.php";
	$(document).ready(function(){
		//CREAMOS DATATABLE
		$("#SaldoInicialForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
			var SaldoInicialTA = new DTActions({
			'conf': '000',
			'idtable': 'saldoini_table',
		});

	SaldoInicialRowCBF = function(nRow, aData, iDisplayIndex){
	};
	var UrlaDTable = $("#saldoini_table").attr("data-source");
	FormatoDTable = [
		              { "sWidth": "10%","mDataProp": "Anio"},
		              { "sWidth": "10%","mDataProp": "Mes"},
		              { "sWidth": "25%","mDataProp": "Producto"},
		              { "sWidth": "15%","mDataProp": "Stock"},
		              { "sWidth": "15%","mDataProp": "PrecUnit"},
		              { "sWidth": "15%","mDataProp": "PrecTotal"}
		              ];

	SaldoInicialTable = createDataTable('saldoini_table',UrlaDTable,FormatoDTable,null, SaldoInicialRowCBF);
	//creamos datatable de saldo actual
	$("#SaldoActualForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
			var SaldoActualTA = new DTActions({
			'conf': '000',
			'idtable': 'saldoactual_table',
	});

	SaldoActualRowCBF = function(nRow, aData, iDisplayIndex){
	};
	var UrlaDTable = $("#saldoactual_table").attr("data-source");
	FormatoDTable = [
		              { "sWidth": "10%","mDataProp": "Anio"},
		              { "sWidth": "10%","mDataProp": "Mes"},
		              { "sWidth": "25%","mDataProp": "Producto"},
		              { "sWidth": "15%","mDataProp": "Stock"},
		              { "sWidth": "15%","mDataProp": "PrecUnit"},
		              { "sWidth": "15%","mDataProp": "PrecTot"}
		              ];

	SaldoActualTable = createDataTable('saldoactual_table',UrlaDTable,FormatoDTable,null, SaldoActualRowCBF);
	//REPOTE INICIAL
	function prepararIniDatos(){
	var tablasaldos = toHTML(crearTablaToArray("tdetalle",
			['Año','Mes', 'Producto','Cantidad','Prec. Unitario','Prec. Total'],
			['style="width: 15%;" class="prodth" ','style="width: 15%;" class="prodth" ','style="width: 25%;" class="prodth" ','style="width: 15%;" class="prodth" ','style="width: 15%;" class="prodth" ','style="width: 15%;" class="prodth" '],
			['Anio','Mes','Producto','Stock','PrecUnit','PrecTotal'],
			['style="width: 15%;"','style="width: 15%;"','style="width: 25%;"','style="width: 15%;"','style="width: 15%;"','style="width: 15%;"'],
			SaldoInicialTable.fnGetData()));

	var titulo = "Saldos Iniciales " + fechanow();

	var date01 = $("#fecSalInicial").val().split('/');
	var fecha = date01[2]+'-'+date01[1]+'-'+date01[0];
	
	$('#nombrearchivo').val('saldo_inicial_'+fecha);
	
	$('#tsaldos').val(tablasaldos);
	$('#titulo').val(titulo);
	}
	function prepararActDatos(){
	var tablasaldos = toHTML(crearTablaToArray("tdetalle",
			['Año','Mes', 'Producto','Cantidad','Prec. Unitario','Prec. Total'],
			['style="width: 15%;" class="prodth" ','style="width: 15%;" class="prodth" ','style="width: 25%;" class="prodth" ','style="width: 15%;" class="prodth" ','style="width: 15%;" class="prodth" ','style="width: 15%;" class="prodth" '],
			['Anio','Mes','Producto','Stock','PrecUnit','PrecTot'],
			['style="width: 15%;"','style="width: 15%;"','style="width: 25%;"','style="width: 15%;"','style="width: 15%;"','style="width: 15%;"'],
			SaldoActualTable.fnGetData()));

	var titulo = "Saldos Actuales " + fechanow();
	
	var date02 = $("#date02").val().split('/');
	var fecha = date02[2]+'-'+date02[1]+'-'+date02[0];
	$('#nombrearchivo').val('saldo_actual_'+fecha);
	
	$('#tsaldos').val(tablasaldos);
	$('#titulo').val(titulo);
}
		//Mandar la fecha
		$("#buscarfecha").click(function(event){
			dateSalInicial = new Date($("#fecSalInicial").datepicker("getDates"));
			SaldoInicialTable.fnReloadAjax($("#SaldoInicialForm").attr("action-1")+"/"+fechaFormatoSQL(dateSalInicial))
	});
		//Mandar la fecha
		$("#buscarfecha2").click(function(event){
			date2 = new Date($("#date02").datepicker("getDates"));
			SaldoActualTable.fnReloadAjax($("#SaldoActualForm").attr("action-1")+"/"+fechaFormatoSQL(date2))
	});
	//REPORTE DE SALDO INICIAL
	$("#xlsinigen").click(function(e){
		e.preventDefault();
		prepararIniDatos();
		$("#CreateXLSForm").attr("action",urlExportXLS);
		$("#CreateXLSForm").submit();
	});
	$("#xlsactualgen").click(function(e){
		e.preventDefault();
		prepararActDatos();
		$("#CreateXLSForm").attr("action",urlExportXLS);
		$("#CreateXLSForm").submit();
	});	

});
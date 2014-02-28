	var urlES =  "js/es_ES.txt";

		var urlExportCierreXLS = base_url +"extensiones/reportes_xls/formato_reporte_logistica.php";
		var urlExportCierrePDF = base_url +"extensiones/reportes_pdf/formato_reporte_logistica.php";
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

		//Mandar la fecha
		$("#buscarfecha").click(function(event){
		date1 = new Date($("#date01").datepicker("getDates"));
		SaldoInicialTable.fnReloadAjax($("#SaldoInicialForm").attr("action-1")+"/"+fechaFormatoSQL(date1))
	});
		//Mandar la fecha
		$("#buscarfecha2").click(function(event){
		date2 = new Date($("#date02").datepicker("getDates"));
		SaldoActualTable.fnReloadAjax($("#SaldoActualForm").attr("action-1")+"/"+fechaFormatoSQL(date2))
	});

});
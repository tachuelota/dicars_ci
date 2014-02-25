var urlExportXLS = "extensiones/reportes_xls/formato_reporte_saldos.php";

	$(document).ready(function(){
		//CREAMOS DATATABLE
		$("#SaldoInicialForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
			var SaldoInicialTA = new DTActions({
			'conf': '110',
			'idtable': 'saldoini_table',
			/*'EditFunction': function(nRow, aData, iDisplayIndex) {
				//location.href = $("#IngProductosForm").attr("action-2")+aData.nOferta_id;
				location.href = $("#SaldoInicialForm").attr("action-2")+"/"+aData.nIngProd_id;
			
			},
			'ViewFunction':function(nRow, aData, iDisplayIndex){
			location.href = $("#SaldoInicialForm").attr("action-3")+"/"+aData.nIngProd_id;
		}*/
	});

	SaldoInicialRowCBF = function(nRow, aData, iDisplayIndex){
		SaldoInicialTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};
	var UrlaDTable = $("#saldoini_table").attr("data-source");
	FormatoDTable = [
		              { "sWidth": "15%","mDataProp": "Anio"},
		              { "sWidth": "10%","mDataProp": "Mes"},
		              { "sWidth": "20%","mDataProp": "Producto"},
		              { "sWidth": "20%","mDataProp": "Stock"},
		              { "sWidth": "10%","mDataProp": "PrecUnit"},
		              { "sWidth": "10%","mDataProp": "PrecTotal"}
		              ];

	SaldoInicialTable = createDataTable('saldoini_table',UrlaDTable,FormatoDTable,null, SaldoInicialRowCBF);
	//creamos datatable de saldo actual
	$("#SaldoActualForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
			var SaldoActualTA = new DTActions({
			'conf': '110',
			'idtable': 'saldoactual_table',
			/*'EditFunction': function(nRow, aData, iDisplayIndex) {
				//location.href = $("#IngProductosForm").attr("action-2")+aData.nOferta_id;
				location.href = $("#SaldoActualForm").attr("action-2")+"/"+aData.nIngProd_id;
			
			},
			'ViewFunction':function(nRow, aData, iDisplayIndex){
			location.href = $("#SaldoActualForm").attr("action-3")+"/"+aData.nIngProd_id;
		}*/
	});

	SaldoActualRowCBF = function(nRow, aData, iDisplayIndex){
		SaldoActualTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};
	var UrlaDTable = $("#saldoactual_table").attr("data-source");
	FormatoDTable = [
		              { "sWidth": "15%","mDataProp": "Anio"},
		              { "sWidth": "10%","mDataProp": "Mes"},
		              { "sWidth": "20%","mDataProp": "Producto"},
		              { "sWidth": "20%","mDataProp": "Stock"},
		              { "sWidth": "10%","mDataProp": "PrecUnit"},
		              { "sWidth": "10%","mDataProp": "PrecTot"}
		              ];

	SaldoActualTable = createDataTable('saldoactual_table',UrlaDTable,FormatoDTable,null, SaldoActualRowCBF);

		//Mandar la fecha
		$("#buscarfecha").click(function(event){
		date1 = new Date($("#date01").datepicker("getDates"));
		//date2 = new Date($("#date02").datepicker("getDates"));
		SaldoInicialTable.fnReloadAjax($("#SaldoInicialForm").attr("action-1")+"/"+fechaFormatoSQL(date1))
	});
		//Mandar la fecha
		$("#buscarfecha2").click(function(event){
		date2 = new Date($("#date02").datepicker("getDates"));
		//date2 = new Date($("#date02").datepicker("getDates"));
		SaldoActualTable.fnReloadAjax($("#SaldoActualForm").attr("action-1")+"/"+fechaFormatoSQL(date2))
	});
		
	});
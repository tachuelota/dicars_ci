

$(document).ready(function(){
	$("#SalProductosForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	var SalidaProductosTA = new DTActions({
		'conf': '100',
		'idtable': 'ingreso_productos_table',
		//'EditFunction': function(nRow, aData, iDisplayIndex) {
			//location.href = $("#IngProductosForm").attr("action-2")+aData.nOferta_id;
			//location.href = $("#IngProductosForm").attr("action-2")+"/"+aData.nIngProd_id;
			
		//},
		'ViewFunction':function(nRow, aData, iDisplayIndex){
			location.href = $("#SalProductosForm").attr("action-2")+"/"+aData.nSalProd_id;
		}
	});
	SalidaProductosRowCBF = function(nRow, aData, iDisplayIndex){
		SalidaProductosTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};
	var UrlaDTable = $("#salida_prod_table").attr("data-source");
	FormatoDTable = [
		              { "sWidth": "15%","mDataProp": "dSalProdFecReg"},
		              { "sWidth": "10%","mDataProp": "registrador"},
		              { "sWidth": "20%","mDataProp": "solicitante"},
		              { "sWidth": "20%","mDataProp": "nSalProdMotivo"},
		              { "sWidth": "10%","mDataProp": "cSalProdObsv"},
		              { "sWidth": "10%","mDataProp": "cLocalDesc"}
		              ];

	SalidaProductosTable = createDataTable('salida_prod_table',UrlaDTable,FormatoDTable,null, SalidaProductosRowCBF);

	$("#buscarfecha").click(function(event){
		date1 = new Date($("#date01").datepicker("getDates"));
		date2 = new Date($("#date02").datepicker("getDates"));
		SalidaProductosTable.fnReloadAjax($("#SalProductosForm").attr("action-1")+"/"+fechaFormatoSQL(date1)+"/"+fechaFormatoSQL(date2))
	});
});
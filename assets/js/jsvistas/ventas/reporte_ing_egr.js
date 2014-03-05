$(document).ready(function(){
	$("#IngresosForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	var TotalIngresos =0;
	var TotalEgresos =0;
	var TotalGeneral = 0;
	var Reporte_IngOptions = {
		"aoColumns":[
				{ "sWidth": "10%","mDataProp": "Id"},
				{ "sWidth": "15%","mDataProp": "CantVendida"},
				{ "sWidth": "15%","mDataProp": "MontoFacturado"},
				{ "sWidth": "15%","mDataProp": "MontoCobrado"},
				{ "sWidth": "15%","mDataProp": "TipoVenta"},
				{ "sWidth": "15%","mDataProp": "Concepto"},	
				{ "sWidth": "15%","mDataProp": "Vendedor"},				    	  
				],

	"fnCreatedRow":function(nRow, aData, iDisplayIndex)
		{
			TotalIngresos += parseFloat(aData.MontoCobrado);			
		}
	};

	var Reporte_IngTable = createDataTable2('ingresos_table',Reporte_IngOptions);
	
	var Reporte_EgreOptions = {
		"aoColumns":[
				{ "sWidth": "15%","mDataProp": "Id"},
				{ "sWidth": "15%","mDataProp": "MontoCobrado"},
				{ "sWidth": "15%","mDataProp": "TipoVenta"}, 
				{ "sWidth": "15%","mDataProp": "Concepto"},
				{ "sWidth": "15%","mDataProp": "Vendedor"},	    	  
				],	

	"fnCreatedRow":function(nRow, aData, iDisplayIndex)
		{
			TotalIngresos += parseFloat(aData.MontoCobrado);
		}		
	};
	var Reporte_EgrTable = createDataTable2('egresos_table',Reporte_EgreOptions);
	
	$("#buscarfecha").click(function(event){
		event.preventDefault();
		//TotalIngresos =0;
		TotalEgresos =0;
		TotalGeneral = 0;
		date1 = new Date($("#date01").datepicker("getDates"));
		Reporte_IngTable.fnReloadAjax(base_url+"ventas/Servicios/get_reporteIngEgre_byfecha/1/"+fechaFormatoSQL(date1));
		Reporte_EgrTable.fnReloadAjax(base_url+"ventas/Servicios/get_reporteIngEgre_byfecha/0/"+fechaFormatoSQL(date1))
		$("#TotalIngresos").val(TotalIngresos);
		$("#TotalEgresos").text(TotalEgresos);
		$("#TotalGeneral").text(TotalIngresos - TotalEgresos);


	});

});
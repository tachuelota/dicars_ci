$(document).ready(function(){
	$("#MovimientosForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	$(".SelectAjax").SelectAjax();
	

	MovimientosOptions = {
		"aoColumns":[
		               { "sWidth": "15%","mDataProp": "dMovimientoFecReg"},
		              { "sWidth": "15%","mDataProp": "personal"},
		              { "sWidth": "15%","mDataProp": "cMovimientoConcepto"}, 
		              { "sWidth": "15%","mDataProp": "nMovimientoMonto"},
		              { "sWidth": "15%","mDataProp": "nMovimientoTip"},	    	              
		              { "sWidth": "15%","mDataProp": "nMovimientoTipPag"},
		              ],
		"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",
		
	};
	MovimientosTable = createDataTable2('movimientos_table',MovimientosOptions);

	var successMovimiento = function(){
		$('#modalMov').modal('hide');
		MovimientosTable.fnReloadAjax();
	}

	$('.btn-registrar').click(function(e){
	e.preventDefault();
	$('#modalMov').modal('show');
	});

	$("#btn-reg-movimiento").click(function(event){
		event.preventDefault();
		if($("#MovimientoForm").validationEngine('validate'))
			//console.log($("#MovimientoForm").serializeObject());
			enviar($("#MovimientoForm").attr("action-1"),{formulario:$("#MovimientoForm").serializeObject()}, successMovimiento, null)
	}); 

	//buscar pr fechas
	$("#buscarfecha").click(function(event){
		event.preventDefault();
		date1 = new Date($("#date01").datepicker("getDates"));
		date2 = new Date($("#date02").datepicker("getDates"));
		MovimientosTable.fnReloadAjax(base_url+"ventas/servicios/getMovimientos/"+fechaFormatoSQL(date1)+"/"+fechaFormatoSQL(date2))
	});


	//Reportes
	$("#pdfgen").click(function(){
		var urlExportXLS = base_url +"assets/extensiones/reportes_xls/formato_reporte_movimiento.php";
		var urlExportPDF = base_url +"assets/extensiones/reportes_pdf/formato_reporte_movimiento.php";

	    movimientostable = toHTML(crearTablaToArray("tmovimiento",
				['FECHA REGISTRO','CONCEPTO','MONTO','TIPO MOV','TIPO PAGO','PERSONAL'],
				[	'style="width: 16%;" class="head" ','style="width: 16%;" class="head" ','style="width: 16%;" class="head" ',
					'style="width: 16%;" class="head" ','style="width: 16%;" class="head" ','style="width: 16%;" class="head" '],
				['dMovimientoFecReg','cMovimientoConcepto','nMovimientoMonto','nMovimientoMonto','nMovimientoTipPag','personal'],
				[	'style="width: 16%;" ','style="width: 16%;" ','style="width: 16%;" ',
					'style="width: 16%;" ','style="width: 16%;" ','style="width: 16%;" '],
					MovimientosTable.fnGetData()));
		$("#title").val("REPORTE DE MOVIMIENTOS");
		$("#movimientos_table").val(movimientostable);
		$("#exportmodal").modal('show');

	});

	$("#pdfdet").click(function(){
		urlExportXLS = "{{ asset('extensiones/reportes_xls/formato_reporte_movimientodet.php') }}";
		urlExportPDF = "{{ asset('extensiones/reportes_pdf/formato_reporte_movimientodet.php') }}";
		PrepareData();		
		var tableingresos = toHTML(crearTablaToArray("tmovimiento",
				['FECHA','PERSONAL','CONCEPTO','FORMA DE PAGO','MONTO'],
				[	'style="width: 20%;" class="head" ','style="width: 20%;" class="head" ','style="width: 20%;" class="head" ',
					'style="width: 20%;" class="head" ','style="width: 20%;" class="head" '],
				['fecha_reg','personal','cMovimientoConcepto','tipo_pago','monto'],
				[	'style="width: 20%;" ','style="width: 20%;" ','style="width: 20%;" ',
					'style="width: 20%;" ','style="width: 20%;" '],
					TablaIngresos));

		var tablesalidas = toHTML(crearTablaToArray("tmovimiento",
				['FECHA','PERSONAL','CONCEPTO','FORMA DE PAGO','MONTO'],
				[	'style="width: 20%;" class="head" ','style="width: 20%;" class="head" ','style="width: 20%;" class="head" ',
					'style="width: 20%;" class="head" ','style="width: 20%;" class="head" '],
				['fecha_reg','personal','concepto','tipo_pago','monto'],
				[	'style="width: 20%;" ','style="width: 20%;" ','style="width: 20%;" ',
					'style="width: 20%;" ','style="width: 20%;" '],
					TablaSalidas));
		
		$("#title").val("REPORTE DE MOVIMIENTOS");
		$("#table_ingresos").val(tableingresos);
		$("#table_salidas").val(tablesalidas);
		$("#total").val(Total);
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
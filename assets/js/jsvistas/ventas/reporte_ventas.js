	$(document).ready(function(){
		var urlExportXLS = base_url + "assets/extensiones/reportes_xls/formato_reporte_ventas.php";
		var urlExportPDF = base_url +"assets/extensiones/reportes_pdf/formato_reporte_ventas.php";

		var VenTiendasOptions = {
		"aoColumns":[
				{ "sWidth": "12%","mDataProp": "FecReg"},
				{ "sWidth": "10%","mDataProp": "Tienda"},
				{ "sWidth": "13%","mDataProp": "Cliente"}, 
				{ "sWidth": "15%","mDataProp": "Producto"},
				{ "sWidth": "9%","mDataProp": "Serie"} ,
				{ "sWidth": "7%","mDataProp": "Cant"}, 
				{ "sWidth": "7%","mDataProp": "Desct"} ,
				{ "sWidth": "10%","mDataProp": "PrecioCosto"} ,
				{ "sWidth": "12%","mDataProp": "PrecioVentaContado"} ,
				{ "sWidth": "15%","mDataProp": "PrecioVentaCredito"} 
				],
		//"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",		
	};

	VenTiendaTable = createDataTable2('ventas_table',VenTiendasOptions);

	$("#buscarfecha").click(function(event){
		date1 = new Date($("#date01").datepicker("getDates"));
		date2 = new Date($("#date02").datepicker("getDates"));
		VenTiendaTable.fnReloadAjax($("#RepVentasForm").attr("action-1")+"/"+fechaFormatoSQL(date1)+"/"+fechaFormatoSQL(date2))
	});	
	/********************************************/
	var VenZonasOptions = {
		"aoColumns":[
				{ "sWidth": "12%","mDataProp": "FecReg"},
				{ "sWidth": "10%","mDataProp": "Tienda"},
				{ "sWidth": "13%","mDataProp": "Cliente"}, 
				{ "sWidth": "15%","mDataProp": "Producto"},
				{ "sWidth": "9%","mDataProp": "Serie"} ,
				{ "sWidth": "7%","mDataProp": "Cant"}, 
				{ "sWidth": "7%","mDataProp": "Desct"} ,
				{ "sWidth": "10%","mDataProp": "PrecioCosto"} ,
				{ "sWidth": "12%","mDataProp": "PrecioVentaContado"} ,
				{ "sWidth": "15%","mDataProp": "PrecioVentaCredito"} 
				],
		//"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",		
	};

	VenZonasTable = createDataTable2('ventas_table_zona',VenZonasOptions);

	$("#buscarfechazona").click(function(event){
		date1 = new Date($("#date01zona").datepicker("getDates"));
		date2 = new Date($("#date02zona").datepicker("getDates"));
		VenZonasTable.fnReloadAjax($("#RepVentasZonasForm").attr("action-1")+"/"+fechaFormatoSQL(date1)+"/"+fechaFormatoSQL(date2))
	});	
	//REPORTES
		$("#btn-rpt-tienda").click(function(){
			var table_venta = toHTML(crearTablaToArray("tventas",
			['FECHA REGISTRO','TIENDA','CLIENTE','PRODUCTO','SERIE','CANT','DESCRIPCION','P COSTO','P VENTA CONTADO','P VENTA CREDITO'],
			[	'style="width: 8%;" class="head" ','style="width: 7%;" class="head" ','style="width: 14%;" class="head" ',
			'style="width:14%;" class="head" ','style="width: 10%;" class="head" ','style="width: 6%;" class="head" ',
			'style="width: 11%;" class="head" ','style="width: 11%;" class="head" ','style="width: 9%;" class="head" ',
			'style="width: 10%;" class="head" '],
			['FecReg','Tienda','Cliente','Producto','Serie','Cant','Desct','PrecioCosto','PrecioVentaContado','PrecioVentaCredito'],
			[	'style="width: 8%;" ','style="width: 7%;" ','style="width: 14%;" ',
			'style="width: 14%;" ','style="width: 10%;" ','style="width: 6%;" ',
			'style="width: 11%;" ','style="width: 11%;" ','style="width: 9%;" ',
			'style="width: 10%;" '],
			VenTiendaTable.fnGetData()));

			$("#title").val("REPORTE DE VENTAS DE TIENDA");
			$("#table_venta").val(table_venta);
			$("#exportmodal").modal('show');	
	});

	//REPORTE ZONAS
		$("#btn-rpt-zona").click(function(){
			var table_venta = toHTML(crearTablaToArray("tventas",
			['FECHA REGISTRO','TIENDA','CLIENTE','PRODUCTO','SERIE','CANT','DESCRIPCION','P COSTO','P VENTA CONTADO','P VENTA CREDITO'],
			[	'style="width: 8%;" class="head" ','style="width: 7%;" class="head" ','style="width: 14%;" class="head" ',
			'style="width:14%;" class="head" ','style="width: 10%;" class="head" ','style="width: 6%;" class="head" ',
			'style="width: 11%;" class="head" ','style="width: 11%;" class="head" ','style="width: 9%;" class="head" ',
			'style="width: 10%;" class="head" '],
			['FecReg','Tienda','Cliente','Producto','Serie','Cant','Desct','PrecioCosto','PrecioVentaContado','PrecioVentaCredito'],
			[	'style="width: 8%;" ','style="width: 7%;" ','style="width: 14%;" ',
			'style="width: 14%;" ','style="width: 10%;" ','style="width: 6%;" ',
			'style="width: 11%;" ','style="width: 11%;" ','style="width: 9%;" ',
			'style="width: 10%;" '],
			VenZonasTable.fnGetData()));

			$("#title").val("REPORTE DE VENTAS DE ZONA");
			$("#table_venta").val(table_venta);
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
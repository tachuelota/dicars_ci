	
	$(document).ready(function(){
		var SelectTrabajadoresData = new Array();
		var SelectProductoData = new Array();
		
		var BuscarTraOptions = {
		"aoColumns":[
		              { "sWidth": "5%","mDataProp": "cPersonalNom"},
		              { "sWidth": "5%","mDataProp": "cPersonalApe"},
		              { "sWidth": "5%","mDataProp": "cPersonalDNI"},
		              { "sWidth": "5%","mDataProp": "cPersonalTelf"}
		              ],
		"fnCreatedRow":getSimpleSelectRowCallBack(SelectTrabajadoresData)
		};

		BuscarTrabajadoresTable = createDataTable2('select_trabajador_table',BuscarTraOptions);
		//datatable de productos
		var BuscarProdOptions = {
		"aoColumns":[
		              { "sWidth": "5%","mDataProp": "cProductoDesc"},
		              { "sWidth": "5%","mDataProp": "nProductoStock"},
		              { "sWidth": "5%","mDataProp": "nProductoPContado"}
		              ],
		"fnCreatedRow":getSimpleSelectRowCallBack(SelectProductoData)
		};

		BuscarProductosTable = createDataTable2('select_producto_table',BuscarProdOptions);
		//llamar al modal
		$('#btn-trabajador').click(function(e){
			e.preventDefault();
			$('#modalBuscarTrabajador').modal('show');
		});
		//llamar al modal buscar productos
		$('#btn-productos').click(function(e){
			e.preventDefault();
			$('#modalBuscarProducto').modal('show');
		});
	});
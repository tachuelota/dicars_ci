$(document).ready(function(){
	$("#IngresoProductosForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});

	var SelectProductosData = new Array();
	var DataToSend = {};
	//	Agregar a la tabla
	/*$('#agregar_producto').click(function(event){
		event.preventDefault();
		$("#ProductoForm").validationEngine('validate');
		SelectProductosData[0].nDetIngProdCant = $("#cantidad").val();
		SelectProductosData[0].nDetIngProdPrecUnt = $("#precio_uni").val();
		SelectProductosData[0].nDetIngProdTot = 	$("#cantidad").val() * $("#precio_uni").val();
		IngresoProductosTable.fnAddData(SelectProductosData);
		$("#cantidad").val("");
		$("#precio_uni").val("");
		$("#producto").val("");
		$("#idProducto").val("");
	});*/

//CREAR EL DATATABLE DE ORDEN DE PEDIDO
	var SelectOrdenPedidoData = new Array();
	var BuscarOPOptions = {
	"aoColumns":[
	              { "sWidth": "5%","mDataProp": "cProductoDesc"},
	              { "sWidth": "5%","mDataProp": "nomape"},
	              { "sWidth": "5%","mDataProp": "nDetOrdPedCant"},
	              { "sWidth": "5%","mDataProp": "nDetOrdPedCantAcept"},
	              { "sWidth": "5%","mDataProp": "CantFalta"},
	              { "sWidth": "5%","mDataProp": "dOrdPedFecReg"},
	              { "sWidth": "5%","mDataProp": "cProductoCodBarra"}	
	              ],
	"fnCreatedRow":getSimpleSelectRowCallBack(SelectOrdenPedidoData)
	};
	BuscarOrdenPedidoTable = createDataTable2('select_ordped_table',BuscarOPOptions);

	//CREAR EL DATATABLE DE PRODUCTOS
	var SelectProductosData = new Array();

	var BuscarProOptions = {
	"aoColumns":[
	              { "sWidth": "5%","mDataProp": "nProducto_id"},
	              { "sWidth": "5%","mDataProp": "cProductoDesc"},
	              { "sWidth": "5%","mDataProp": "nProductoStock"}
	              ],
	"fnCreatedRow":getSimpleSelectRowCallBack(SelectProductosData)
	};


	BuscarProductoTable = createDataTable2('select_producto_table',BuscarProOptions);
	//DATA TABLE DETALLE DE ORDEN DE COMPRAS
	var OrdenComprasActions = new DTActions({
	'conf': '001',
	'DropFunction': function(nRow, aData, iDisplayIndex) {
				var index = $(OrdenCompraTable.fnGetData()).getIndexObj(aData,'nProducto_id');
				OrdenCompraTable.fnDeleteRow(index); 
		}
	});

	BuscarOrdenPedidodOptions = {
	"aoColumns":[
		{ "sWidth": "12%","mDataProp": "nOrdPed_id"},
		{ "sWidth": "12%","mDataProp": "cProductoDesc"},
		{ "sWidth": "12%","mDataProp": "nDetIngProdCant"},
		{ "sWidth": "12%","mDataProp": "PrecioUnitario"},
		{ "sWidth": "12%","mDataProp": "nDetCompraImporte"},
		{ "sWidth": "12%","mDataProp": "dOrdPedFecReg"},			
	              ],
	//"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",
	"fnCreatedRow":OrdenComprasActions.RowCBFunction
	};
	OrdenCompraTable = createDataTable2('productos_table',BuscarOrdenPedidodOptions);

	/*******************************************/
	//llamar al modal pedido
	$('#btn-pedido').click(function(e){
		e.preventDefault();
		$('#modalBuscarOrdPed').modal('show');
	});
	//llamar al modal producto
	$('#btn-producto').click(function(e){
		e.preventDefault();
		$('#modalBuscarProducto').modal('show');
	});
	//MOSTRAR PROVEEDOR AL SELECCIONAR EN EL MODAL
	$('#select_producto').click(function(event){
		event.preventDefault();
		$("#producto_id").val(SelectProductosData[0].nProducto_id);
		$('#producto').val(SelectProductosData[0].cProductoDesc);
		$('#importe').val(SelectProductosData[0].nProductoPCosto);
		$('#modalBuscarProducto').modal('hide');
	});
	$('#select_ordped').click(function(event){
		event.preventDefault();
		//$("#producto_id").val(SelectProductosData[0].nProducto_id);
		$('#id_pedido').val(SelectOrdenPedidoData[0].nOrdPed_id);
		$('#ordped').val(SelectOrdenPedidoData[0].cOrdPedSerie+" "+SelectOrdenPedidoData[0].cOrdPedNro+" - "+SelectOrdenPedidoData[0].cProductoDesc);
		$('#cantidadd').val(SelectOrdenPedidoData[0].nDetOrdPedCant);
		$('#modalBuscarOrdPed').modal('hide');
	});

	//agregar al detalle
	//	Agregar a la tabla
	$('#agregar_producto').click(function(event){
		event.preventDefault();
		SelectProductosData[0].nOrdPed_id = 0;
		SelectProductosData[0].cProductoDesc = $("#producto").val();
		SelectProductosData[0].nDetIngProdCant = $("#cantidad").val();
		SelectProductosData[0].PrecioUnitario = 	$("#importe").val()/ $("#cantidad").val();
		SelectProductosData[0].nDetCompraImporte = $("#importe").val();
		SelectProductosData[0].dOrdPedFecReg = fechanow() ;
		OrdenCompraTable.fnAddData(SelectProductosData);
		$("#cantidad").val("");
		$("#precio_uni").val("");
		$("#producto").val("");
		$("#idProducto").val("");
		$("#importe").val("");
	});
	//	Agregar a la tabla
	$('#agregar_detalle').click(function(event){
		event.preventDefault();
		SelectOrdenPedidoData[0].nOrdPed_id = $("#id_pedido").val();
		SelectOrdenPedidoData[0].cProductoDesc = $("#ordped").val();
		SelectOrdenPedidoData[0].nDetIngProdCant = $("#cantidadd").val();
		SelectOrdenPedidoData[0].PrecioUnitario = $("#imported").val()/ $("#cantidadd").val();
		SelectOrdenPedidoData[0].nDetCompraImporte = $("#imported").val();
		
		OrdenCompraTable.fnAddData(SelectOrdenPedidoData);
	});

	var successIngresoProductos = function(){
	}

     //datos anteriores
	/*$('#select_producto').click(function(event){
		event.preventDefault();
		$("#idProducto").val(SelectProductosData[0].nProducto_id);
		$('#producto').val(SelectProductosData[0].cProductoDesc);
		$('#modalBuscarProducto').modal('hide');
	});

	//LLAMAR AL MODAL
	$('#btn-buscar-productos').click(function(e){
		e.preventDefault();
		$('#modalBuscarProducto').modal('show');
	});

	function prepararDatos(){
		DataToSend = {
			formulario:$("#ProductoForm").serializeObject(),
			productos:CopyArray(SelectProductosData,["nProducto_id"])
			
			};
	} */

	/*var BuscarProOptions = {
	"aoColumns":[
	              { "sWidth": "5%","mDataProp": "cProductoDesc"},
	              { "sWidth": "5%","mDataProp": "nProductoStock"},
	              { "sWidth": "5%","mDataProp": "nProductoPCredito"}
	              ],
	"fnCreatedRow":getSimpleSelectRowCallBack(SelectProductosData)
	};
	BuscarProductosTable = createDataTable2('select_producto_table',BuscarProOptions);*/

	////////
	var OfertaProductoActions = new DTActions({
	'conf': '001',
	'DropFunction': function(nRow, aData, iDisplayIndex) {
				var index = $(IngresoProductosTable.fnGetData()).getIndexObj(aData,'nProducto_id');
				IngresoProductosTable.fnDeleteRow(index); 
		}
	});

	var prepararDatos = function()
	{
		var datosingreso = {
			formulario:$("#IngresoProductosForm").serializeObject(),
			tabla: CopyArray(OrdenCompraTable.fnGetData(),["nDetOrdOrdPed","nDetCompraCant","nDetCompraImporte","nDetCompraPrecUnt","nProducto_id"])
		}
		return datosingreso;
	}

	BuscarIngresoProductosdOptions = {
		"aoColumns":[
			{ "sWidth": "12%","mDataProp": "cProductoCodBarra"},
			{ "sWidth": "12%","mDataProp": "cProductoDesc"},
			{ "sWidth": "12%","mDataProp": "nDetIngProdCant"},
			{ "sWidth": "12%","mDataProp": "nDetIngProdPrecUnt"}			
		              ],
		"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",
		"fnCreatedRow":OfertaProductoActions.RowCBFunction
	};
	IngresoProductosTable = createDataTable2('ingreso_productos_table',BuscarIngresoProductosdOptions);	


	var successIngresoProductos = function(){
	}
	//
	//Registrar


	$("#enviar_ingreso_producto").click(function(event){
	event.preventDefault();
	if(OrdenCompraTable.fnSettings().fnRecordsTotal() > 0){
		if($("#IngresoProductosForm").validationEngine('validate'))			
			enviar($("#IngresoProductosForm").attr("action-1"),prepararDatos(), successIngresoProductos, null);
		}
		else
			$("#agregarproductos").modal("show");
	});

	/*$("#enviar_ingreso_producto").click(function(event){
		event.preventDefault();
		if (IngresoProductosTable.fnSettings().fnRecordsTotal() > 0) {
			if($("#IngresoProductosForm").validationEngine('validate'))
				enviar($("#IngresoProductosForm").attr("action-1"),{formulario:$("#IngresoProductosForm").serializeObject(),
					tabla: CopyArray(IngresoProductosTable.fnGetData(),["nProducto_id","nDetIngProdCant","nDetIngProdPrecUnt","nDetIngProdTot"])}, successIngresoProductos, null);
		}
		else
			$("#agregarproductos").modal("show");
	});*/


});
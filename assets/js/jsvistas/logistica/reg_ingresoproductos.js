$(document).ready(function(){
	$("#IngresoProductosForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});

	var SelectProductosData = new Array();
	var DataToSend = {};
//CREAR EL DATATABLE DE ORDEN DE PEDIDO
	var SelectOrdenPedidoData = new Array();
	var BuscarDetOrCompOptions = {
	"aoColumns":[
				  { "sWidth": "5%","mDataProp": "cOrdComDocSerie"}, //serie numero
	              { "sWidth": "5%","mDataProp": "cProductoDesc"},
	              { "sWidth": "5%","mDataProp": "cPersonalNom"},
	              { "sWidth": "5%","mDataProp": "OrdComFecReg"},
	              { "sWidth": "5%","mDataProp": "nDetCompraCant"},	          
	              { "sWidth": "5%","mDataProp": "nDetCompraImporte"}	
	              ],
	"fnCreatedRow":getSimpleSelectRowCallBack(SelectOrdenPedidoData)
	};
	BuscarDetIngTable = createDataTable2('select_ordped_table',BuscarDetOrCompOptions);

	//CREAR EL DATATABLE DE PRODUCTOS
	var BuscarSelectProductosData = new Array();

	var BuscarProOptions = {
		"aoColumns":[
		              { "sWidth": "5%","mDataProp": "cProductoCodBarra"},
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
		{ "sWidth": "12%","mDataProp": "cOrdComDocSerie"},
		{ "sWidth": "12%","mDataProp": "cProductoDesc"},
		{ "sWidth": "12%","mDataProp": "nDetIngProdCant"},
		{ "sWidth": "12%","mDataProp": "nDetIngProdPrecUnt"},
		{ "sWidth": "12%","mDataProp": "nDetIngProdTot"},			
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
		$('#producto').val(SelectProductosData[0].cProductoDesc);
		$('#importe').val(SelectProductosData[0].nProductoPCosto);
		$('#modalBuscarProducto').modal('hide');
	});

	$('#select_ordped').click(function(event){
		event.preventDefault();
		$('#ordped').val(SelectOrdenPedidoData[0].cProductoDesc);
		$('#cantidadd').val(SelectOrdenPedidoData[0].nDetCompraCant);
		$('#modalBuscarOrdPed').modal('hide');
	});

	//agregar al detalle
	//	Agregar a la tabla
	$('#agregar_producto').click(function(event){
		event.preventDefault();
		SelectProductosData[0].cOrdComDocSerie = 0;
		SelectProductosData[0].nDetOrdCompra = 0;
		SelectProductosData[0].cProductoDesc = $("#producto").val();
		SelectProductosData[0].nDetIngProdCant = $("#cantidad").val();
		SelectProductosData[0].nDetIngProdPrecUnt = 	$("#importe").val()/ $("#cantidad").val();
		SelectProductosData[0].nDetIngProdTot = $("#importe").val();
		SelectProductosData[0].OrdComFecReg = fechanow() ;
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
		SelectOrdenPedidoData[0].nDetOrdCompra = SelectOrdenPedidoData[0].nDetCompra_id;
		SelectOrdenPedidoData[0].cProductoDesc = $("#ordped").val();
		SelectOrdenPedidoData[0].nDetIngProdCant = $("#cantidadd").val();
		SelectOrdenPedidoData[0].nDetIngProdPrecUnt = $("#imported").val()/ $("#cantidadd").val();
		SelectOrdenPedidoData[0].nDetIngProdTot = $("#imported").val();
		OrdenCompraTable.fnAddData(SelectOrdenPedidoData);
	});

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
			tabla: CopyArray(OrdenCompraTable.fnGetData(),["nDetOrdCompra","nDetIngProdCant","nDetIngProdTot","nDetIngProdPrecUnt","nProducto_id"])
		}
		return datosingreso;
	}

	var successIngresoProductos = function(){
	}

	$("#enviar_ingreso_producto").click(function(event){
	event.preventDefault();
	if(OrdenCompraTable.fnSettings().fnRecordsTotal() > 0){
		if($("#IngresoProductosForm").validationEngine('validate'))			
			enviar($("#IngresoProductosForm").attr("action-1"),prepararDatos(), successIngresoProductos, null);
		}
		else
			$("#agregarproductos").modal("show");
	});


});
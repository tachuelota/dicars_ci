$(document).ready(function(){
	$("#IngresoProductosForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});

	var SelectProductosData = new Array();
	var DataToSend = {};
	//	Agregar a la tabla
	$('#agregar_producto').click(function(event){
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
	});

	$('#select_producto').click(function(event){
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
	}

	var BuscarProOptions = {
	"aoColumns":[
	              { "sWidth": "5%","mDataProp": "cProductoDesc"},
	              { "sWidth": "5%","mDataProp": "nProductoStock"},
	              { "sWidth": "5%","mDataProp": "nProductoPCredito"}
	              ],
	"fnCreatedRow":getSimpleSelectRowCallBack(SelectProductosData)
	};
	BuscarProductosTable = createDataTable2('select_producto_table',BuscarProOptions);

	////////
	var OfertaProductoActions = new DTActions({
	'conf': '001',
	'DropFunction': function(nRow, aData, iDisplayIndex) {
				var index = $(IngresoProductosTable.fnGetData()).getIndexObj(aData,'nProducto_id');
				IngresoProductosTable.fnDeleteRow(index); 
		}
	});

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
		if (IngresoProductosTable.fnSettings().fnRecordsTotal() > 0) {
			if($("#IngresoProductosForm").validationEngine('validate'))
				enviar($("#IngresoProductosForm").attr("action-1"),{formulario:$("#IngresoProductosForm").serializeObject(),
					tabla: CopyArray(IngresoProductosTable.fnGetData(),["nProducto_id","nDetIngProdCant","nDetIngProdPrecUnt","nDetIngProdTot"])}, successIngresoProductos, null);
		}
		else
			$("#agregarproductos").modal("show");
	});


});
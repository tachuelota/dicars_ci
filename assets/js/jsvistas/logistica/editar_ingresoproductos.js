
$(document).ready(function(){
	var SelectProductosData = new Array();
	var DataToSend = {};
	//creamos el datable detalle
		var IngProductosDetalleActions = new DTActions({
		'conf': '001',
		'DropFunction': function(nRow, aData, iDisplayIndex) {
					var index = $(DetalleProductosTable.fnGetData()).getIndexObj(aData,'nProducto_id');
					//DetalleProductosTable.fnDeleteRow(index);
			switch (parseInt(aData.band)){
				case 0:
					DetalleProductosTable.fnUpdate('<span class="label label-success">Activo</span>',index,4);
					aData.band = 1;
					break;
				case 1:
					DetalleProductosTable.fnUpdate('<span class="label label-important">Eliminar</span>',index,4);
					aData.band = 0;
					//console.log(aData);
					break;
				case 2:
					DetalleProductosTable.fnDeleteRow(index); 
					BuscarProductosTable.fnAddData(aData);
					break;
			} 
			}
		});
		//refrescar tabla
		var successEditarOferta = function(data){
		BuscarProductosTable.fnReloadAjax();
		DetalleProductosTable.fnReloadAjax();
	};
	//para llamar al modal buscar producrtos
	$('#btn-buscar-productos').click(function(e){
			e.preventDefault();
			$('#modalBuscarProducto').modal('show');
		});

	//Creamos datatable de el modal para buscar productos
	var BuscarProOptions = {
		"aoColumns":[
		              { "sWidth": "5%","mDataProp": "cProductoDesc"},
		              { "sWidth": "5%","mDataProp": "nProductoStock"},
		              { "sWidth": "5%","mDataProp": "nProductoPContado"}
		              ],
		"fnCreatedRow":getSimpleSelectRowCallBack(SelectProductosData)
		};

		BuscarProductosTable = createDataTable2('select_producto_table',BuscarProOptions);

		//agregar a la tabla detalle
		//	Agregar a la tabla
		$('#agregar_producto').click(function(event){
			event.preventDefault();
			SelectProductosData[0].nDetIngProdCant = $("#cantidad").val();
			SelectProductosData[0].nDetIngProdPrecUnt = $("#precio_uni").val();
			SelectProductosData[0].nDetIngProdTot = $("#cantidad").val() * $("#precio_uni").val();
			$(SelectProductosData).AddAttr("estadolabel", "<span class='label label-success'>Activo</span>");
			$(SelectProductosData).AddAttr("band", 2);
			DetalleProductosTable.fnAddData(SelectProductosData);
			$("#cantidad").val("");
			$("#precio_uni").val("");
			$("#producto").val("");
			$("#idProducto").val("");
			//console.log(BuscarProductosTable.fnGetData());
		});

		//para la seleccion
		$('#select_producto').click(function(event){
			event.preventDefault();
			$("#idProducto").val(SelectProductosData[0].nProducto_id);
			$('#producto').val(SelectProductosData[0].cProductoDesc);
			$('#modalBuscarProducto').modal('hide');
		});

		

		BuscarIngresoProductosdOptions = {
		"aoColumns":[
			{ "sWidth": "12%","mDataProp": "nProducto_id"},
			{ "sWidth": "12%","mDataProp": "nDetIngProdCant"},
			{ "sWidth": "12%","mDataProp": "nDetIngProdPrecUnt"},
			{ "sWidth": "12%","mDataProp": "nDetIngProdTot"},
			{ "sWidth": "10%","mDataProp": "estadolabel"},			
		              ],
		"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",
		"fnCreatedRow":IngProductosDetalleActions.RowCBFunction
		};
		DetalleProductosTable = createDataTable2('edit_ingresoproductos_table',BuscarIngresoProductosdOptions);

		//
		var successEditarProducto = function(){
		//alert("Hola Como estas");
		//$('#modalProductos').modal('hide');
		DetalleProductosTable.fnReloadAjax()
	}

		//editar
		$("#btn_enviar_cambios").click(function(event){
		event.preventDefault();
		if($("#RegistrarIngresoForm").validationEngine('validate'))
			enviar($("#RegistrarIngresoForm").attr("action-1"),{formulario:$("#RegistrarIngresoForm").serializeObject(),
			tabla: CopyArray(DetalleProductosTable.fnGetData(),["nProducto_id","nDetIngProdCant","nDetIngProdPrecUnt","nDetIngProdTot","band","nDetIngProd_id"])}, successEditarProducto, null)
	});
});
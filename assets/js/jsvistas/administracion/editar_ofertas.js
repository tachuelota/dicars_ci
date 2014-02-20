$(document).ready(function(){
	var SelectProductoData = new Array();

	var OfertaProductoActions = new DTActions({
		'conf': '001',
		'DropFunction': function(nRow, aData, iDisplayIndex) {
			var index = $(OfertaProductoTable.fnGetData()).getIndexObj(aData,'nProducto_id');				
			switch (parseInt(aData.band)){
				case 0:
					OfertaProductoTable.fnUpdate('<span class="label label-success">Activo</span>',index,6);
					aData.band = 1;
					break;
				case 1:
					OfertaProductoTable.fnUpdate('<span class="label label-important">Eliminar</span>',index,6);
					aData.band = 0;
					//console.log(aData);
					break;
				case 2:
					OfertaProductoTable.fnDeleteRow(index); 
					BuscarProdTable.fnAddData(aData);
					break;
			}
		}
	});

	var PrepararDatosOferta = function()
	{
		DataToSendOferta = {
			formulario:$("#OfertasForm").serializeObject(),
			tabla: CopyArray(OfertaProductoTable.fnGetData(),["nProducto_id","band","nOfertaProducto_id"])
		}
		return DataToSendOferta;
	};

	var successEditarOferta = function(data){
		BuscarProdTable.fnReloadAjax();
		OfertaProductoTable.fnReloadAjax();
	};

	$('#btn-buscarproducto').click(function(event){
		event.preventDefault();
		$('#modalBuscarProducto').modal('show');
	});

	$('#btn_agregar_prod').click(function(event){
		event.preventDefault();
		$('#modalBuscarProducto').modal('hide');
		$(SelectProductoData).AddAttr("estadolabel", "<span class='label label-success'>Activo</span>");
		$(SelectProductoData).AddAttr("nOfertaProducto_id", 0);
		$(SelectProductoData).AddAttr("band", 2);
		OfertaProductoTable.fnAddData(SelectProductoData);
		SubTablaArray(BuscarProdTable,SelectProductoData,'nProducto_id');
		SelectProductoData.splice(0,SelectProductoData.length);
		UnselectRow("select_producto_table");
	});

	$('#enviar_editar').click(function(event){
		event.preventDefault();
		enviar($("#OfertasForm").attr("action-1"),PrepararDatosOferta(), successEditarOferta, null)
	});

	BuscarProdOptions = {
		"aoColumns":[
			{ "sWidth": "12%","mDataProp": "cProductoCodBarra"},
			{ "sWidth": "12%","mDataProp": "producto"},
			{ "sWidth": "12%","mDataProp": "precio"},
			{ "sWidth": "12%","mDataProp": "cMarcaDesc"},
			{ "sWidth": "12%","mDataProp": "cCategoriaNom"},
			{ "sWidth": "12%","mDataProp": "cConstanteDesc"}
		              ],
		"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",
		"fnCreatedRow":getMultipleSelectRowCallBack(SelectProductoData)
	};	
	BuscarProdTable = createDataTable2('select_producto_table',BuscarProdOptions);

	OfertaProductosOption = {
		"aoColumns":[
			{ "sWidth": "15%","mDataProp": "cProductoCodBarra"},
			{ "sWidth": "25%","mDataProp": "producto"},
			{ "sWidth": "15%","mDataProp": "precio"},
			{ "sWidth": "15%","mDataProp": "cMarcaDesc"},
			{ "sWidth": "10%","mDataProp": "cCategoriaNom"},
			{ "sWidth": "10%","mDataProp": "cConstanteDesc"},
			{ "sWidth": "10%","mDataProp": "estadolabel"}
		              ],
		"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",
		"fnCreatedRow":OfertaProductoActions.RowCBFunction
	};
	OfertaProductoTable = createDataTable2('oferta_productos_table',OfertaProductosOption);
});
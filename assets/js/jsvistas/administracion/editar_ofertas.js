$(document).ready(function(){
	var SelectProductoData = new Array();
	var DataToSendOferta = {};

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
					break;
				case 2:
					BuscarProdTable.fnAddData(aData);
					OfertaProductoTable.fnDeleteRow(index); 
			}
		}
	});

	var PrepararDatosOferta = function()
	{
		DataToSendOferta = {
			formulario:$("#EditarOfertasForm").serializeObject(),
			tabla: OfertaProductoTable.fnGetData()
		}
	};

	var successEditarOferta = function(){
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
		$(SelectProductoData).AddAttr("band", 2);
		SubTablaArray(BuscarProdTable,SelectProductoData,'nProducto_id');
		OfertaProductoTable.fnAddData(SelectProductoData);
	});

	$('#enviar_editar').click(function(event){
		event.preventDefault();
		enviar($("#EditarOfertasForm").attr("action-1"),DataToSendOferta, successEditarOferta, null)
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
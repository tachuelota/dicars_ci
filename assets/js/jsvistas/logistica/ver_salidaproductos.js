	
	$(document).ready(function(){
		BuscarSalidaProductosdOptions = {
		"aoColumns":[
			{ "sWidth": "12%","mDataProp": "cProductoDesc"},
			{ "sWidth": "12%","mDataProp": "DetSalProdCant"}
		              ],
		"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",
		//"fnCreatedRow":SalProductosDetalleActions.RowCBFunction
		};
		DetalleProductosTable = createDataTable2('salida_productos_table',BuscarSalidaProductosdOptions);
	});
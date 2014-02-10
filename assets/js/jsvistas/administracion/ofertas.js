$(document).ready(function(){
	var SelectProductoData = new Array();
	var ProducsDataToSend = new Array();
	var DataToSend = {};

	//mostrar Registrar Trabajador------------------------------------>
	$('.btn-registrar').click(function(e){
		e.preventDefault();
		$('#modalRegistro').modal('show');
	});
	//mostrar Editar Trabajador------------------------------------>
	$('#enviar_oferta_btn').click(function(event){
		event.preventDefault();
		prepararDatos();
		enviar($("#OfertasForm").attr("action-1"),DataToSend, logdata, null)
	});

	function prepararDatos(){
		DataToSend = {
			formulario:$("#OfertasForm").serializeObject(),
			productos:CopyArray(SelectProductoData,["cProductoDesc"])
		};
	}

	$("#enviar_oferta_btn")
	BuscarPOptions = {
		"sAjaxSource":$("#select_producto_table").attr("data-source"),
		"aoColumns":[
		              { "sWidth": "12%","mDataProp": "cProductoDesc"},
		              { "sWidth": "12%","mDataProp": "nProductoPContado"},
		              { "sWidth": "12%","mDataProp": "cProductoTalla"},
		              { "sWidth": "12%","mDataProp": "cMarcaDesc"},
		              { "sWidth": "12%","mDataProp": "cCategoriaNom"}
		              ],
		"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",
		"fnCreatedRow":getMultipleSelectRowCallBack(SelectProductoData)
	};
	BuscarProductosTable = createDataTable2('select_producto_table',BuscarPOptions);
	
});
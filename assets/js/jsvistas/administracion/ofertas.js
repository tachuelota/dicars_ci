$(document).ready(function(){
	var SelectProductoData = new Array();
	var DataToSend = {};

	//mostrar Registrar Trabajador------------------------------------>
	$('.btn-registrar').click(function(event){
		event.preventDefault();
		$('#OfertaModal').modal('show');
	});
	//mostrar Editar Trabajador------------------------------------>
	$('#enviar_oferta_btn').click(function(event){
		event.preventDefault();
		prepararDatos();
		enviar($("#OfertasForm").attr("action-1"),DataToSend, logdata, null)
	});

	var Actions = new DTActions({
		'conf': '010',
		'idtable': 'ofertas_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
		},
	});

	function prepararDatos(){
		DataToSend = {
			formulario:$("#OfertasForm").serializeObject(),
			productos:CopyArray(SelectProductoData,["nProducto_id"])
		};
	}

	OfertaOptions = {
		"aoColumns":[
		              { "sWidth": "12%","mDataProp": "dOfertaFecVigente"},
		              { "sWidth": "12%","mDataProp": "cOfertaDesc"},
		              { "sWidth": "12%","mDataProp": "nOfertaPorc"},
		              { "sWidth": "12%","mDataProp": "dOfertaFecVencto"},
		              { "sWidth": "12%","mDataProp": "estadolabel"}
		              ],
		"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",
		"fnCreatedRow":Actions.RowCBFunction
	};
	BuscarProductosTable = createDataTable2('ofertas_table',OfertaOptions);
	
});
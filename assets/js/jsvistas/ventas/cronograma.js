$(document).ready(function(){
	var ClientesOptions = {
		"aoColumns":[
				{ "sWidth": "15%","mDataProp": "cClienteNom"},
				{ "sWidth": "15%","mDataProp": "cClienteApe"},
				{ "sWidth": "15%","mDataProp": "cClienteDNI"}, 
				{ "sWidth": "15%","mDataProp": "nClienteLineaOp"},
				{ "sWidth": "15%","mDataProp": "boton"}   
				],
		//"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",		
	};

	ClientesTable = createDataTable2('clientes_table',ClientesOptions);

	//CLIEN EN VER CREDITOS
	$('#btn-vercreditos').click(function(event){
	
	});
});
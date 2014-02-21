
$(document).ready(function(){
	$("#ProductoForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});

	//CARGAR MARCAS EN EL COMBO BOX	
	$(".SelectAjax").SelectAjax();

	var TipoProdTA = new DTActions({
		'conf': '010',
		'idtable': 'productos_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-reg-prod").hide();
			$("#btn-editar-prod").show();
	  		$('#modalProductos').modal('show');
	  		$("#serie").val(aData.cProductoSerie);
	  		$("#talla").val(aData.cProductoTalla);
	  		$("#descripcion").val(aData.cProductoDesc);
	  		$("#preciocosto").val(aData.nProductoPCosto);
	  		$("#preciocontado").val(aData.nProductoPContado);
	  		$("#preciocredito").val(aData.nProductoPCredito);
	  		$("#stockmax").val(aData.nProductoStockMax);
	  		$("#stockmin").val(aData.nProductoStockMin);
	  		$("#codigo").val(aData.nProducto_id);
		},
	});	

	TipoProdRowCBF = function(nRow, aData, iDisplayIndex){
		TipoProdTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};
	var UrlaDTable = $("#productos_table").attr("data-source");
	FormatoDTable = [
		              { "sWidth": "15%","mDataProp": "cProductoDesc"},
		              { "sWidth": "8%","mDataProp": "cMarcaDesc"},
		              { "sWidth": "8%","mDataProp": "cConstanteDesc"},
		              { "sWidth": "12%","mDataProp": "cCategoriaNom"},
		              { "sWidth": "10%","mDataProp": "cProductoTalla"},
		              { "sWidth": "7%","mDataProp": "nProductoStock"},
		              { "sWidth": "15%","mDataProp": "nProductoPContado"},
		              { "sWidth": "15%","mDataProp": "nProductoPCredito"},
		              { "sWidth": "30%","mDataProp": "cProductoCodBarra"},
		              ];

	TipoProductoTable = createDataTable('productos_table',UrlaDTable,FormatoDTable,null, TipoProdRowCBF);	              

	var successProducto = function(){
		//alert("Hola Como estas");
		$('#modalProductos').modal('hide');
		TipoProductoTable.fnReloadAjax()
	}
	//Llamar al modal Registrar-Modal
	$('.btn-registrar').click(function(e){
	e.preventDefault();
	$('#modalProductos').modal('show');
	});
	//Registrar
	$("#btn-reg-prod").click(function(event){
		event.preventDefault();
		if($("#ProductoForm").validationEngine('validate'))
			//para vefiricar console.log($("#TipoIGV_Registrar").serializeObject());
			enviar($("#ProductoForm").attr("action-1"),{formulario:$("#ProductoForm").serializeObject()}, successProducto, null)
	});
	//Editar
	$("#btn-editar-prod").click(function(event){
		event.preventDefault();
		if($("#ProductoForm").validationEngine('validate'))
			enviar($("#ProductoForm").attr("action-2"),{formulario:$("#ProductoForm").serializeObject()}, successProducto, null)
	});

	//Modal verificar Acciones	
	$('#modalProductos').on('hidden', function(){		
		$("#ProductoForm").reset();
		$("#btn-reg-prod").show();
		$("#btn-editar-prod").hide();
	});


});
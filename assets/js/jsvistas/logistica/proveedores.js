$(document).ready(function(){
	$("#ProveedorForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
		var TipoProveedorTA = new DTActions({
		'conf': '010',
		'idtable': 'proveedores_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-reg-proveedor").hide();
			$("#btn-editar-proveedor").show();
	  		$('#modalProveedores').modal('show');
	  		$("#ruc").val(aData.cProveedorRuc);
	  		$("#razonsocial").val(aData.cProveedorRazSocial);
	  		$("#telefono").val(aData.cProveedorTel);
	  		$("#email").val(aData.cProveedorEmail);
	  		$("#paginaweb").val(aData.cProveedorSitioWeb);
	  		$("#direccion").val(aData.cProveedorDirec);
	  		$("#ccorriente").val(aData.cProveedorCCorriente);
	  		//$("#stockmin").val(aData.nProductoStockMin);

	  		$("#codigo").val(aData.nProveedor_id);
		},
	});		


		TipoProveedorRowCBF = function(nRow, aData, iDisplayIndex){
		TipoProveedorTA.RowCBFunction(nRow, aData, iDisplayIndex);	
		};

		var UrlaDTable = $("#proveedores_table").attr("data-source");
		FormatoDTable = [
		              { "sWidth": "15%","mDataProp": "cProveedorRuc"},
		              { "sWidth": "20%","mDataProp": "cProveedorRazSocial"},
		              { "sWidth": "8%","mDataProp": "cProveedorTel"},
		              { "sWidth": "12%","mDataProp": "cProveedorEmail"},
		             
		              ];
	TipoProveedorTable = createDataTable('proveedores_table',UrlaDTable,FormatoDTable,null, TipoProveedorRowCBF);
	

	var successProveedor = function(){
		//alert("Hola Como estas");
		$('#modalProveedores').modal('hide');
		TipoProveedorTable.fnReloadAjax()
	}

	$('.btn-registrar').click(function(e){
	e.preventDefault();
	$('#modalProveedores').modal('show');
	});

	//Registrar
	$("#btn-reg-proveedor").click(function(event){
		event.preventDefault();
		if($("#ProveedorForm").validationEngine('validate'))
			//para vefiricar console.log($("#TipoIGV_Registrar").serializeObject());
			enviar($("#ProveedorForm").attr("action-1"),{formulario:$("#ProveedorForm").serializeObject()}, successProveedor, null)
	});
	$("#btn-editar-proveedor").click(function(event){
		event.preventDefault();
		if($("#ProveedorForm").validationEngine('validate'))
			enviar($("#ProveedorForm").attr("action-2"),{formulario:$("#ProveedorForm").serializeObject()}, successProveedor, null)
	});

	//Modal verificar Acciones	
	$('#modalProveedores').on('hidden', function(){		
		$("#ProveedorForm").reset();
		$("#btn-reg-proveedor").show();
		$("#btn-editar-proveedor").hide();
	});


});
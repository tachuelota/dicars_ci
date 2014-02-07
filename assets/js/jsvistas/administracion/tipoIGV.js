$(document).ready(function(){
	$("#TipoIGV_Registrar").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	//Tablas
	var TipoIGVTA = new DTActions({
		'conf': '010',
		'idtable': 'tipo_igv_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-tipoigv-reg").hide();
			$("#btn-tipoigv-edi").show();
	  		$('#modalTipoIGV').modal('show');
	  		$("#tipo").val(aData.cTipoIGV);
	  		$("#porc").val(aData.nTipoIGVProc);
	  		//$("#estado").val(aData.cCargocoEst);
	  		//$("#estado").val(aData.cCargocoEst);
	  		$("#idTipoIGV").val(aData.nTipoIGV);
		},
	});	
	TipoIGVRowCBF = function(nRow, aData, iDisplayIndex){
		TipoIGVTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};
	var UrlaDTable = $("#tipo_igv_table").attr("data-source");
	FormatoDTable = [
		              { "sWidth": "20%","mDataProp": "cTipoIGV"},
		              { "sWidth": "25%","mDataProp": "nTipoIGVProc"},
		              { "sWidth": "33%","mDataProp": "dTipoIGVFecReg"},
		              { "sWidth": "20%","mDataProp": "cTipoIGVEst"},

		              ];

	TipoIGVTable = createDataTable('tipo_igv_table',UrlaDTable,FormatoDTable,null, TipoIGVRowCBF);	              
	

	var successTipoIGV = function(){
		//alert("Hola Como estas");
		$('#modalTipoIGV').modal('hide');
		TipoIGVTable.fnReloadAjax()
	}

	//Registrar-Modal
	$('.btn-registrar').click(function(e){
	e.preventDefault();
	$('#modalTipoIGV').modal('show');
	});

	$("#btn-tipoigv-reg").click(function(event){
		event.preventDefault();
		if($("#TipoIGV_Registrar").validationEngine('validate'))
			//para vefiricar console.log($("#TipoIGV_Registrar").serializeObject());
			enviar($("#TipoIGV_Registrar").attr("action-1"),{formulario:$("#TipoIGV_Registrar").serializeObject()}, successTipoIGV, null)
	});

	//Modal verificar Acciones
	
	$('#modalTipoIGV').on('hidden', function(){		
		$("#TipoIGV_Registrar").reset();
		$("#btn-tipoigv-reg").show();
		$("#btn-tipoigv-edi").hide();
	});


	$("#btn-tipoigv-edi").click(function(event){
		event.preventDefault();
		if($("#TipoIGV_Registrar").validationEngine('validate'))
			enviar($("#TipoIGV_Registrar").attr("action-2"),{formulario:$("#TipoIGV_Registrar").serializeObject()}, successTipoIGV, null)
	});

});
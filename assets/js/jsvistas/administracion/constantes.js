$(document).ready(function(){
	$("#ConstanteForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});

	//mostrar Registrar Cliente------------------------------------>
	$('#btn-registrar').click(function(e){
		e.preventDefault();
		$('#modalConstante').modal('show');
	});
	
	//enviar('RegistrarClaseForm', ReloadTableRegistrar);
	//enviar('EditarClaseForm', ReloadTableEditar);

	UrlaDTable = $("#constantes_table").attr("data-source");
	FormatoCategorias = [
		              { "sWidth": "33%","mDataProp": "nConstanteClase"},
		              { "sWidth": "33%","mDataProp": "cConstanteDesc"},
		              { "sWidth": "34%","mDataProp": "cConstanteValor"},
		              ];

	var Actions = new DTActions({
		'conf': '010',
		'idtable': 'constantes_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-reg-constante").hide();
			$("#btn-edit-constante").show();
	  		$("#modalConstante").modal('show');
	  		$("#clase").val(aData.nConstanteClase);
	  		$("#nom_clase").val(aData.cConstanteDesc);
	  		$("#valor").val(aData.cConstanteValor);
	  		$("#idConstante").val(aData.nConstante_id);
		},
	});

	RowCBFCategorias = function(nRow, aData, iDisplayIndex){
		Actions.RowCBFunction(nRow, aData, iDisplayIndex);
	};

	var successCategoria = function(){
		$('#modalConstante').modal('hide');
		TableConstante.fnReloadAjax()
	}

	$('#modalConstante').on('hidden', function(){		
		$("#ConstanteForm").reset();
		$('#modalCategoria').modal('hide');
		$("#btn-reg-constante").show();
		$("#btn-edit-constante").hide();
	});

	$("#btn-reg-constante").click(function(event){
		event.preventDefault();
		if($("#ConstanteForm").validationEngine('validate'))
			enviar($("#ConstanteForm").attr("action-1"),{formulario:$("#ConstanteForm").serializeObject()}, successCategoria, null)
	});
	$("#btn-edit-constante").click(function(event){
		event.preventDefault();
		if($("#ConstanteForm").validationEngine('validate'))
			enviar($("#ConstanteForm").attr("action-2"),{formulario:$("#ConstanteForm").serializeObject()}, successCategoria, null)
	});

	TableConstante = createDataTable("constantes_table",UrlaDTable,FormatoCategorias, null, RowCBFCategorias);
});


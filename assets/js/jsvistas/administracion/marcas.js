$(document).ready(function(){
	$("#MarcaForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});

	var MarcasTA = new DTActions({
		'conf': '010',
		'idtable': 'marcas_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-reg-marca").hide();
			$("#btn-editar-marca").show();
	  		$('#modalMarca').modal('show');
	  		$("#desc_marca").val(aData.cMarcaDesc);
	  		$("#selectEstado").val(aData.cMarcaEst);
	  		$("#idMarca").val(aData.nMarca_id);
		},
	});

	MarcasRowCBF = function(nRow, aData, iDisplayIndex){
		MarcasTA.RowCBFunction(nRow, aData, iDisplayIndex);
	};

	successMarca = function(){
		$('#modalMarca').modal('hide');
		MarcasTable.fnReloadAjax()
	}
	
	//mostrar Buscar Cliente------------------------------------>
	$('.btn-registrar').click(function(e){
		e.preventDefault();
		$('#modalMarca').modal('show');
	});

	MarcasUrl = $("#marcas_table").attr("data-source");
	FormatoMarcas = [
		              { "sWidth": "33%","mDataProp": "cMarcaDesc"},
		              { "sWidth": "33%","mDataProp": "cMarcaEst"}
		              ];

	MarcasTable = createDataTable("marcas_table",MarcasUrl,FormatoMarcas, null, MarcasRowCBF);

	$("#btn-reg-marca").click(function(event){
		event.preventDefault();
		if($("#MarcaForm").validationEngine('validate'))
			enviar($("#MarcaForm").attr("action-1"),{formulario:$("#MarcaForm").serializeObject()}, successMarca, null)
	});
	$("#btn-editar-marca").click(function(event){
		event.preventDefault();
		if($("#MarcaForm").validationEngine('validate'))
			enviar($("#MarcaForm").attr("action-2"),{formulario:$("#MarcaForm").serializeObject()}, successMarca, null)
	});
});
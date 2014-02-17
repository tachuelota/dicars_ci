
$(document).ready(function(){
	$("#CategoriaForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});

	var Actions = new DTActions({
		'conf': '010',
		'idtable': 'categorias_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-reg-categoria").hide();
			$("#btn-editar-categoria").show();
	  		$('#modalCategoria').modal('show');
	  		$("#nom_categoria").val(aData.cCategoriaNom);
	  		$("#desc_categoria").val(aData.cCategoriaDesc);
	  		$("#selectEstado").val(aData.cCategoriaEst);
	  		$("#idCategoria").val(aData.nCategoria_id);
		},
	});
	
	var UrlaDTable = $("#categorias_table").attr("data-source");
	var FormatoCategorias = [
		              { "sWidth": "33%","mDataProp": "cCategoriaNom"},
		              { "sWidth": "33%","mDataProp": "cCategoriaDesc"},
		              { "sWidth": "33%","mDataProp": "estadolabel"}
		              ];

	var successCategoria = function(){
		$('#modalCategoria').modal('hide');
		TableCategorias.fnReloadAjax()
	}

	$('#modalCategoria').on('hidden', function(){		
		$("#CategoriaForm").reset();
		$('#modalCategoria').modal('hide');
		$("#btn-reg-categoria").show();
		$("#btn-editar-categoria").hide();
	});

	RowCBFCategorias = function(nRow, aData, iDisplayIndex){
		Actions.RowCBFunction(nRow, aData, iDisplayIndex);
	};

	$('.btn-editar').click(function(e){
		e.preventDefault();
		$('#modalEditarDatos').modal('show');
	});

	//mostrar Buscar Cliente------------------------------------>
	$('.btn-registrar').click(function(e){
		e.preventDefault();
		$('#modalCategoria').modal('show');
	});

	$("#btn-reg-categoria").click(function(event){
		event.preventDefault();
		if($("#CategoriaForm").validationEngine('validate'))
			enviar($("#CategoriaForm").attr("action-1"),{formulario:$("#CategoriaForm").serializeObject()}, successCategoria, null)
	});
	$("#btn-editar-categoria").click(function(event){
		event.preventDefault();
		if($("#CategoriaForm").validationEngine('validate'))
			enviar($("#CategoriaForm").attr("action-2"),{formulario:$("#CategoriaForm").serializeObject()}, successCategoria, null)
	});

	TableCategorias = createDataTable("categorias_table",UrlaDTable,FormatoCategorias, null, RowCBFCategorias);
});
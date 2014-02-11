
	//init------------------------------------>
	$(document).ready(function(){
		$("#LocalesForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});


	var TipoLocalesTA = new DTActions({
		'conf': '010',
		'idtable': 'locales_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-reg-local").hide();
			$("#btn-editar-local").show();
	  		$('#modalLocales').modal('show');
	  		$("#nombre_tienda").val(aData.cLocalDesc);
	  		$("#direccion").val(aData.cLocalDirec);
	  		$("#telefono").val(aData.cLocalTelf);
	  		$("#estado").val(aData.nLocalEst);
	  		$("#tiprub").val(aData.nLocalTipRub);
	  		$("#idlocal").val(aData.nLocal_id);
		},
	});

	TipoLocalesRowCBF = function(nRow, aData, iDisplayIndex){
		TipoLocalesTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};
	var UrlaDTable = $("#locales_table").attr("data-source");
	FormatoDTable = [
		              { "sWidth": "15%","mDataProp": "cLocalDesc"},
		              { "sWidth": "8%","mDataProp": "nLocalEst"},
		              { "sWidth": "8%","mDataProp": "cLocalTelf"},
		              { "sWidth": "12%","mDataProp": "cLocalDirec"},
		              { "sWidth": "10%","mDataProp": "nLocalTipRub"},
		              ];

	TipoLocalTable = createDataTable('locales_table',UrlaDTable,FormatoDTable,null, TipoLocalesRowCBF);		





		//mostrar Registrar Cliente------------------------------------>
	$('.btn-registrar').click(function(e){
		e.preventDefault();
		$('#modalLocales').modal('show');
	});

	var successLocales = function(){
		//alert("Hola Como estas");
		$('#modalLocales').modal('hide');
		TipoLocalTable.fnReloadAjax()
	}

	//Registrar
	$("#btn-reg-local").click(function(event){
		event.preventDefault();
		if($("#LocalesForm").validationEngine('validate'))
			//para vefiricar console.log($("#TipoIGV_Registrar").serializeObject());
			enviar($("#LocalesForm").attr("action-1"),{formulario:$("#LocalesForm").serializeObject()}, successLocales, null)
	});

	//Editar
	$("#btn-editar-local").click(function(event){
		event.preventDefault();
		if($("#LocalesForm").validationEngine('validate'))
			enviar($("#LocalesForm").attr("action-2"),{formulario:$("#LocalesForm").serializeObject()}, successLocales, null)
	});

	//Modal verificar Acciones	
	$('#modalLocales').on('hidden', function(){		
		$("#LocalesForm").reset();
		$("#btn-reg-local").show();
		$("#btn-editar-local").hide();
	});

	});
$(document).ready(function(){
	$("#ZonasForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	var Ubigeos = getAjaxObject($("#ZonasForm").attr("data-source"));
	cargarUbigeo(Ubigeos,"dist", "prov", "dep");

		var TipoZonasTA = new DTActions({
		'conf': '010',
		'idtable': 'zonas_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-reg-zonas").hide();
			$("#btn-editar-zonas").show();
	  		$('#modalZonas').modal('show');
	  		$("#desc").val(aData.cZonaDesc);
	  		$("#selectEstado").val(aData.nZonaEst);	  		
	  		$("#idZonas").val(aData.nZona_id);
	  		cargarUbigeo(Ubigeos,"dist", "prov", "dep",aData.nUbigeo_id);
		},
	});	

	TipoZonasRowCBF = function(nRow, aData, iDisplayIndex){
	TipoZonasTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};
	
	var UrlaDTable = $("#zonas_table").attr("data-source");
	FormatoDTable = [
		              { "sWidth": "40%","mDataProp": "cZonaDesc"},
		              { "sWidth": "20%","mDataProp": "estadolabel"},
		              { "sWidth": "40%","mDataProp": "des_ubigeo"},
		              ];

	TipoZonaTable = createDataTable('zonas_table',UrlaDTable,FormatoDTable,null, TipoZonasRowCBF);


	var successZonas = function(){
		//alert("Hola Como estas");
		$('#modalZonas').modal('hide');
		TipoZonaTable.fnReloadAjax()
	}
	//Llamar al modal Registrar-Modal
	$('.btn-registrar').click(function(e){
	e.preventDefault();
	$('#modalZonas').modal('show');
	});
	//Registrar
	$("#btn-reg-zonas").click(function(event){
		event.preventDefault();
		if($("#ZonasForm").validationEngine('validate'))
			//para vefiricar console.log($("#TipoIGV_Registrar").serializeObject());
			enviar($("#ZonasForm").attr("action-1"),{formulario:$("#ZonasForm").serializeObject()}, successZonas, null)
	});

	$("#btn-editar-zonas").click(function(event){
		event.preventDefault();
		if($("#ZonasForm").validationEngine('validate'))
			enviar($("#ZonasForm").attr("action-2"),{formulario:$("#ZonasForm").serializeObject()}, successZonas, null)
	});

	//Modal verificar Acciones	
	$('#modalZonas').on('hidden', function(){		
		$("#ZonasForm").reset();
		$("#btn-reg-zonas").show();
		$("#btn-editar-zonas").hide();
	});
		
	});
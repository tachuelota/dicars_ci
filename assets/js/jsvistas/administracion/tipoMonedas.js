$(document).ready(function(){
	$("#TipoMonedaForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});

	var TipoMonedaTA = new DTActions({
		'conf': '010',
		'idtable': 'tipomoneda_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-reg-tipomoneda").hide();
			$("#btn-editar-tipomoneda").show();
	  		$('#modalTipoMoneda').modal('show');
	  		$("#desc_tipomoneda").val(aData.cTipoMonedaDesc);
	  		$("#monto").val(aData.nTipoMonedaMont);
	  		$("#selectEstado").val(aData.cTipoMonedaEst);
	  		$("#idTipoMoneda").val(aData.nTipoMoneda);
		},
	});

	TipoMonedaRowCBF = function(nRow, aData, iDisplayIndex){
		TipoMonedaTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};


    var TipoMonedaURL = $("#tipomoneda_table").attr("data-source");
	TipoMonedaFormato = [
		              { "sWidth": "25%","mDataProp": "cTipoMonedaDesc"},
		              { "sWidth": "25%","mDataProp": "nTipoMonedaMont"},
		              { "sWidth": "25%","mDataProp": "estado"},
		              ];

 	var successTipoMoneda = function(){
		$('#modalTipoMoneda').modal('hide');
		TipoMonedaTable.fnReloadAjax()
	}


	$('#modalTipoMoneda').on('hidden', function(){		
		$("#TipoMonedaForm").reset();
		$('#modalTipoMoneda').modal('hide');
		$("#btn-reg-tipomoneda").show();
		$("#btn-editar-tipomoneda").hide();
	});

	$('.btn-registrar').click(function(e){
		e.preventDefault();
		$('#modalTipoMoneda').modal('show');
	});

	$("#btn-reg-tipomoneda").click(function(event){
		event.preventDefault();
		if($("#TipoMonedaForm").validationEngine('validate'))
			enviar($("#TipoMonedaForm").attr("action-1"),{formulario:$("#TipoMonedaForm").serializeObject()}, successTipoMoneda, null)
	});
	$("#btn-editar-tipomoneda").click(function(event){
		event.preventDefault();
		if($("#TipoMonedaForm").validationEngine('validate'))
			enviar($("#TipoMonedaForm").attr("action-2"),{formulario:$("#TipoMonedaForm").serializeObject()}, successTipoMoneda, null)
	})

	TipoMonedaTable = createDataTable('tipomoneda_table',TipoMonedaURL,TipoMonedaFormato,null, TipoMonedaRowCBF);
});
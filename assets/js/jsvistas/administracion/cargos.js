$(document).ready(function(){
	$("#CargoForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
 //--------
	var CargosTA = new DTActions({
		'conf': '010',
		'idtable': 'cargos_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-reg-cargos").hide();
			$("#btn-editar-cargos").show();
	  		$('#modalCargos').modal('show');
	  		$("#nom_cargo").val(aData.nCargoDesc);
	  		$("#selectEstado").val(aData.cCargocoEst);
	  		$("#idCargo").val(aData.nCargo_id);
		},
	});
//Init------------------------------------>

	CargosRowCBF = function(nRow, aData, iDisplayIndex){
		CargosTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	//mostrar Registrar Cliente------------------------------------>
	$('.btn-registrar').click(function(e){
		e.preventDefault();
		$('#modalRegistroCargo').modal('show');
	});
	

	var UrlaDTable = $("#cargos_table").attr("data-source");
	FormatoDTable = [
		              { "sWidth": "33%","mDataProp": "nCargoDesc"},
		              { "sWidth": "33%","mDataProp": "cCargocoEst"},

		              ];


	var successCargo = function(){
		$('#modalCargos').modal('hide');
		TableCargos.fnReloadAjax()
	}

	
	CargosTable = createDataTable('cargos_table',UrlaDTable,FormatoDTable,null, CargosRowCBF);

});
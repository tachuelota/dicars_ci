$(document).ready(function(){
	$("#CargoForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});

 //--------  nombreTableAccion (..ta)
	var CargosTA = new DTActions({
		'conf': '010',
		'idtable': 'cargos_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-reg-cargo").hide();
			$("#btn-editar-cargo").show();
	  		$('#modalCargo').modal('show');
	  		$("#nom_cargo").val(aData.descripcion);
	  		$("#selectEstado").val(aData.idestado);
	  		$("#idCargo").val(aData.id);
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
	
	//1.creas tu tabla 
	var UrlaDTable = $("#cargos_table").attr("data-source");
	FormatoDTable = [
		              { "sWidth": "33%","mDataProp": "descripcion"},
		              { "sWidth": "33%","mDataProp": "estado"},

		              ];


	var successCargo = function(){
		$('#modalCargo').modal('hide');
		CargosTable.fnReloadAjax()
	}


	$('#modalCargo').on('hidden', function(){		
		$("#CargoForm").reset();
		$("#btn-reg-cargo").show();
		$("#btn-editar-cargo").hide();
	});

	 //--funcion de los botones

	$('.btn-registrar').click(function(e){
		e.preventDefault();
		$('#modalCargo').modal('show');
	});

	$("#btn-reg-cargo").click(function(event){
		event.preventDefault();
		if($("#CargoForm").validationEngine('validate'))
			// para vefiricar console.log($("#CargoForm").serializeObject());
			enviar($("#CargoForm").attr("action-1"),{formulario:$("#CargoForm").serializeObject()}, successCargo, null)
	});
	$("#btn-editar-cargo").click(function(event){
		event.preventDefault();
		if($("#CargoForm").validationEngine('validate'))
			enviar($("#CargoForm").attr("action-2"),{formulario:$("#CargoForm").serializeObject()}, successCargo, null)
	});
	
	CargosTable = createDataTable('cargos_table',UrlaDTable,FormatoDTable,null, CargosRowCBF);

});
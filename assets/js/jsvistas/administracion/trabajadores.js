$(document).ready(function(){
	$("#TrabajadoresForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	var cargos = getAjaxObject($("#cargo").attr("data-source"))
	cargarSelect(cargos.aaData,"cargo","nCargo_id","nCargoDesc")

 //--------  nombreTableAccion (..ta)
	var TrabajadoresTA = new DTActions({
		'conf': '010',
		'idtable': 'trabajadores_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-reg-trabajadores").hide();
			$("#btn-editar-trabajadores").show();
	  		$('#modalTrabajadores').modal('show');
	  		$("#nom_trabajadores").val(aData.cPersonalNom);	  				
	  		$("#apelli_trabajadores").val(aData.cPersonalApe);
	  		$("#fechanac_trabajadores").val(aData.dPersonalFec);	  		
	  		$("#edad_trabajadores").val(aData.cPersonalEdad);
	  		$("#dni_trabajadores").val(aData.cPersonalDNI);	  		
	  		$("#telefono_trabajadores").val(aData.cPersonalTelf);
	  		$("#email_trabajadores").val(aData.cPersonalEmail);
	  		$("#selectSexo").val(aData.cPersonalSexo);	  		
	  		$("#selectCargo").val(aData.nCargo_id);
	  		$("#selectEstado").val(aData.cPersonalEst);
	  		$("#idTrabajadores").val(aData.nPersonal_id);
		},
	});
//Init------------------------------------>

    TrabajadoresRowCBF = function(nRow, aData, iDisplayIndex){
		TrabajadoresTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};


	//mostrar Registrar Trabajador------------------------------------>
	$('.btn-registrar').click(function(e){
		e.preventDefault();
		$('#modalTrabajadores').modal('show');
	});

	$('.btn-datos').click(function(e){
		e.preventDefault();
		$('#modalVerDatos').modal('show');
	});
	$('.btn-editar').click(function(e){
		e.preventDefault();
		$('#modalEditarDatos').modal('show');
	});
	//----------------------------------------------------------

	var UrlaDTable = $("#trabajadores_table").attr("data-source");
	//console.log(UrlaDTable);
	FormatoTrabajador = [
		              { "sWidth": "33%","mDataProp": "cPersonalNom"},
		              { "sWidth": "33%","mDataProp": "cPersonalApe"},
		              { "sWidth": "33%","mDataProp": "cPersonalDNI"},		              
		              { "sWidth": "33%","mDataProp": "cPersonalTelf"},

		              ];

    var successTrabajador = function(){
		$('#modalTrabajadores').modal('hide');
		TrabajadoresTable.fnReloadAjax()
	}

//--funcion de los botones

	$('.btn-registrar').click(function(e){
		e.preventDefault();
		$('#modalCargo').modal('show');
	});

	$("#btn-reg-trabajadores").click(function(event){
		event.preventDefault();
		if($("#TrabajadoresForm").validationEngine('validate'))
		{
			enviar($("#TrabajadoresForm").attr("action-1"),{formulario:$("#TrabajadoresForm").serializeObject()}, successTrabajador, null);
		}
	});
	$("#btn-editar-trabajadores").click(function(event){
		event.preventDefault();
		if($("#TrabajadoresForm").validationEngine('validate'))
			enviar($("#TrabajadoresForm").attr("action-2"),{formulario:$("#TrabajadoresForm").serializeObject()}, successTrabajador, null);
	});
	
	TrabajadoresTable = createDataTable('trabajadores_table',UrlaDTable,FormatoTrabajador,null,TrabajadoresRowCBF);

});
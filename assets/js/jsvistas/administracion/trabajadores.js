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
	  		$("#nombres").val(aData.cPersonalNom);	  				
	  		$("#apellidos").val(aData.cPersonalApe);
	  		$("#fechanacimiento").val(aData.dPersonalFec);	  		
	  		$("#edad").val(aData.cPersonalEdad);
	  		$("#dni").val(aData.cPersonalDNI);	  		
	  		$("#telefono").val(aData.cPersonalTelf);
	  		$("#email").val(aData.cPersonalEmail);
	  		$("#sexo").val(aData.cPersonalSexo);	  		
	  		$("#cargo").val(aData.nCargo_id);
	  		$("#estado").val(aData.cPersonalEst);
	  		$("#idTrabajadores").val(aData.nPersonal_id);
		},
	});
//Init------------------------------------>

    TrabajadoresRowCBF = function(nRow, aData, iDisplayIndex){
		TrabajadoresTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	var UrlaDTable = $("#trabajadores_table").attr("data-source");
	//console.log(UrlaDTable);
	FormatoTrabajador = [
		              { "sWidth": "33%","mDataProp": "cPersonalNom"},
		              { "sWidth": "33%","mDataProp": "cPersonalApe"},
		              { "sWidth": "33%","mDataProp": "cPersonalDNI"},		              
		              { "sWidth": "33%","mDataProp": "cPersonalTelf"},

		              ];

    TrabajadoresTable = createDataTable('trabajadores_table',UrlaDTable,FormatoTrabajador,null,TrabajadoresRowCBF);

	//mostrar Registrar Trabajador------------------------------------>
	$('.btn-registrar').click(function(e){
		e.preventDefault();
		$('#modalTrabajadores').modal('show');
	});

	//----------------------------------------------------------
    var successTrabajador = function(){
		$('#modalTrabajadores').modal('hide');
		TrabajadoresTable.fnReloadAjax()
	}

	//--funcion de los botones

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
	


});
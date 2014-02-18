$(document).ready(function(){
$("#ClienteForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
var cargos = getAjaxObject($("#zona").attr("data-source"))
	cargarSelect(cargos.aaData,"cargo","nCargo_id","nCargoDesc")

 //--------  nombreTableAccion (..ta)
	var ClientesTA = new DTActions({
		'conf': '010',
		'idtable': 'clientes_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {		
			$("#btn-reg-clientes").hide();
			$("#btn-editar-clientes").show();
	  		$('#modalClientes').modal('show');
	  		$("#nombres").val(aData.cClienteNom);	  				
	  		$("#apellidos").val(aData.cClienteApe);
	  		$("#dni").val(aData.cClienteDNI);	  		
	  		$("#referencia").val(aData.cClienteRef);	  		
	  		$("#direccion").val(aData.cClientecDir);	  		
	  		$("#lineaop").val(aData.nClienteLineaOp);	  		
	  		$("#ocupacion").val(aData.cClienteOcup);
	  		$("#zona").val(aData.nZona_id);	 
	  		$("#idClientes").val(aData.nCliente_id);
		},
	});
//----------------------
   ClientesRowCBF = function(nRow, aData, iDisplayIndex){
		ClientesTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	var UrlaDTable = $("#clientes_table").attr("data-source");
	//console.log(UrlaDTable);
	FormatoClientes = [
		              { "sWidth": "30%","mDataProp": "cClienteNom"},
		              { "sWidth": "30%","mDataProp": "cClienteApe"},
		              { "sWidth": "20%","mDataProp": "cClienteDNI"},		              
		              { "sWidth": "20%","mDataProp": "nClienteLineaOp"}

		              ];

    ClientesTable = createDataTable('clientes_table',UrlaDTable,FormatoClientes,null,ClientesRowCBF);


    var successClientes = function(){
		$('#modalClientes').modal('hide');
		ClientesTable.fnReloadAjax()
	}

	//--funcion de los botones

	$("#btn-reg-clientes").click(function(event){
		event.preventDefault();
		if($("#ClienteForm").validationEngine('validate'))
		{
			enviar($("#ClienteForm").attr("action-1"),{formulario:$("#ClienteForm").serializeObject()}, successClientes, null);
		}
	});
	$("#btn-editar-clientes").click(function(event){
		event.preventDefault();
		if($("#ClienteForm").validationEngine('validate'))
			enviar($("#ClienteForm").attr("action-2"),{formulario:$("#ClienteForm").serializeObject()}, successClientes, null);
	});
	


//codigo del php anterior 
	$('.btn-registrar').click(function(e){
		e.preventDefault();
		$('#modalClientes').modal('show');
	});

	$("#pdfgen").click(function(){
		$("#title").val("LISTA DE CLIENTES");
		$("#exportmodal").modal('show');	
	});
	
	$("#pdfbutton").click(function(e){
		e.preventDefault();
		$("#CreatePDFForm").attr("action",urlExportPDF);
		$("#CreatePDFForm").submit();
		$("#exportmodal").modal('hide');
	});
	
	$("#xlsutton").click(function(e){
		e.preventDefault();
		$("#CreatePDFForm").attr("action",urlExportXLS);
		$("#CreatePDFForm").submit();
		$("#exportmodal").modal('hide');
	});
  // fin 
});
$(document).ready(function(){

	RowCallBackFunction = function(nRow, aData, iDisplayIndex){
	};

	//mostrar Registrar Cliente------------------------------------>
	$('.btn-registrar').click(function(e){
		e.preventDefault();
		$('#modalRegistroConstantes').modal('show');
	});
	
	//enviar('RegistrarClaseForm', ReloadTableRegistrar);
	//enviar('EditarClaseForm', ReloadTableEditar);

	UrlaDTable = '';
	FormatoDTable = [
		              { "sWidth": "25%","mDataProp": "clase"},
		              { "sWidth": "25%","mDataProp": "nom_clase"},
		              { "sWidth": "25%","mDataProp": "valor"},
		              { "sWidth": "25%","mDataProp": "edit_btn"}
		              ];
	//oTable = createDataTable('constantes_table',UrlaDTable,FormatoDTable,null, RowCallBackFunction);
});


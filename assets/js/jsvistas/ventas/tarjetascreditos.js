$(document).ready(function(){
	var SelectPersonalData = new Array();
	var SelectClienteData = new Array();
	//DATATBLE DE PERSON AL
	var BuscarPersonalOptions = {
	"aoColumns":[
	              { "sWidth": "5%","mDataProp": "cPersonalNom"},
	              { "sWidth": "5%","mDataProp": "cPersonalApe"},
	              { "sWidth": "5%","mDataProp": "cPersonalDNI"},
	              { "sWidth": "5%","mDataProp": "cPersonalTelf"}
	              ],
	"fnCreatedRow":getSimpleSelectRowCallBack(SelectPersonalData)
	};
	BuscarPersonalTable = createDataTable2('select_trabajador_table',BuscarPersonalOptions);
	//DATATABLE CLIENTES
	var BuscarClientesOptions = {
	"aoColumns":[
	              { "sWidth": "5%","mDataProp": "cClienteNom"},
	              { "sWidth": "5%","mDataProp": "cClienteApe"},
	              { "sWidth": "5%","mDataProp": "cClienteDNI"}
	              ],
	"fnCreatedRow":getSimpleSelectRowCallBack(SelectClienteData)
	};
	BuscarClienteTable = createDataTable2('select_cliente_table',BuscarClientesOptions);
	
	//LLAMAR AL MODAL
	$('#buscar-personal').click(function(event){
		event.preventDefault();	
		$('#modalBuscarPersonal').modal('show');
	});
	$('#buscar-cliente').click(function(event){
		event.preventDefault();	
		$('#modalBuscarCliente').modal('show');
	});
	//SELECCIONAR UN PERSONAL
	$('#select_trabajador').click(function(event){
			event.preventDefault();
			$('#fecha').val(fechanow());
			$("#id_personal").val(SelectPersonalData[0].nPersonal_id);
			$('#personal').val(SelectPersonalData[0].cPersonalNom);
			$('#modalBuscarPersonal').modal('hide');
	});
	$('#select_cliente').click(function(event){
			event.preventDefault();
			$("#id_cliente").val(SelectClienteData[0].nCliente_id);
			$('#cliente').val(SelectClienteData[0].cClienteNom);
			$('#modalBuscarCliente').modal('hide');
	});
	var successLineaCredito = function(){
		$("#cliente").val("");
		$("#id_cliente").val("");
		$("#fecha").val("");
		$("#id_personal").val("");
		$("#personal").val("");
		$("#monto").val("");
		}
	//registrar
	$("#btn-reg-lineacreditos").click(function(event){
		event.preventDefault();
		if($("#LineaCreditoForm").validationEngine('validate'))
			enviar($("#LineaCreditoForm").attr("action-1"),{formulario:$("#LineaCreditoForm").serializeObject()}, successLineaCredito, null)
	});

});
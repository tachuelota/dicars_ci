$(document).ready(function(){
var SelectZonaData = new Array();


		$('#btn-trabajador').click(function(e){
			e.preventDefault();
			$('#modalBuscarTrabajador').modal('show');
		});
		$('#btn-zona').click(function(e){
			e.preventDefault();
			$('#modalBuscarZona').modal('show');
		});
	

	function prepararDatos(){
		DataToSend = {
			formulario:$("#ZonapersonalForm").serializeObject(),
			zonas:CopyArray(SelectZonaData,["cZonaDesc"])
		};
	}

	var BuscarZOptions = {
		"sAjaxSource":$("#select_zona_table").attr("data-source"),
		"aoColumns":[
		              { "sWidth": "12%","mDataProp": "cZonaDesc"},
		              { "sWidth": "12%","mDataProp": "nZonaEst"},
		              { "sWidth": "12%","mDataProp": "nUbigeo_id"}
		              ],
		"fnCreatedRow":getSimpleSelectRowCallBack(SelectZonaData)
	};
	BuscarProductosTable = createDataTable2('select_producto_table',BuscarPOptions);



});
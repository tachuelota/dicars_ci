$(document).ready(function(){
var SelectZonaData = new Array();


		var TipoPerActivosTA = new DTActions({
		'conf': '000',
		'idtable': 'select_trabajador_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			/*$("#btn-reg-prod").hide();
			$("#btn-editar-prod").show();
	  		$('#modalProductos').modal('show');
	  		$("#serie").val(aData.cProductoSerie);
	  		$("#talla").val(aData.cProductoTalla);
	  		$("#descripcion").val(aData.cProductoDesc);
	  		$("#preciocosto").val(aData.nProductoPCosto);
	  		$("#preciocontado").val(aData.nProductoPContado);
	  		$("#preciocredito").val(aData.nProductoPCredito);
	  		$("#stockmax").val(aData.nProductoStockMax);
	  		$("#stockmin").val(aData.nProductoStockMin);

	  		$("#codigo").val(aData.nProducto_id);*/
		},
	});	

	TipoPerActivosRowCBF = function(nRow, aData, iDisplayIndex){
		TipoPerActivosTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};
	var UrlaDTable = $("#select_trabajador_table").attr("data-source");
	FormatoDTable = [
		              { "sWidth": "3%","mDataProp": "cPersonalNom"},
		              { "sWidth": "3%","mDataProp": "cPersonalApe"},
		              { "sWidth": "3%","mDataProp": "cPersonalDNI"},
		              { "sWidth": "3%","mDataProp": "cPersonalTelf"},
		             
		              ];

	TipoPersonalTable = createDataTable('select_trabajador_table',UrlaDTable,FormatoDTable,null, TipoPerActivosRowCBF);	              



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

	
	$(document).ready(function(){
		var SelectTrabajadoresData = new Array();
		var SelectProductoData = new Array();
		
		var BuscarTraOptions = {
		"aoColumns":[
		              { "sWidth": "5%","mDataProp": "cPersonalNom"},
		              { "sWidth": "5%","mDataProp": "cPersonalApe"},
		              { "sWidth": "5%","mDataProp": "cPersonalDNI"},
		              { "sWidth": "5%","mDataProp": "cPersonalTelf"}
		              ],
		"fnCreatedRow":getSimpleSelectRowCallBack(SelectTrabajadoresData)
		};


		BuscarTrabajadoresTable = createDataTable2('select_trabajador_table',BuscarTraOptions);
		//datatable de productos en la modal
		var BuscarProdOptions = {
		"aoColumns":[
		              { "sWidth": "5%","mDataProp": "cProductoDesc"},
		              { "sWidth": "5%","mDataProp": "nProductoStock"},
		              { "sWidth": "5%","mDataProp": "nProductoPContado"}
		              ],
		"fnCreatedRow":getSimpleSelectRowCallBack(SelectProductoData)
		};

		BuscarProductosTable = createDataTable2('select_producto_table',BuscarProdOptions);
		//datatable del detalle de productos
		var SalidaProductosActions = new DTActions({
		'conf': '001',
		'DropFunction': function(nRow, aData, iDisplayIndex) {
					var index = $(SalidaProductosTable.fnGetData()).getIndexObj(aData,'nProducto_id');
					SalidaProductosTable.fnDeleteRow(index); 
			}
		});

		SalidaProductosdOptions = {
		"aoColumns":[
			{ "sWidth": "12%","mDataProp": "nProducto_id"},
			{ "sWidth": "12%","mDataProp": "cProductoDesc"},
			{ "sWidth": "12%","mDataProp": "DetSalProdCant"}
			//{ "sWidth": "12%","mDataProp": "nDetIngProdPrecUnt"}			
		              ],
		"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",
		"fnCreatedRow":SalidaProductosActions.RowCBFunction
		};
		SalidaProductosTable = createDataTable2('salida_productos_table',SalidaProductosdOptions);	

		//llamar al modal
		$('#btn-trabajador').click(function(e){
			e.preventDefault();
			$('#modalBuscarTrabajador').modal('show');
		});
		//llamar al modal buscar productos
		$('#btn-productos').click(function(e){
			e.preventDefault();
			$('#modalBuscarProducto').modal('show');
		});

		$('#btn-buscar-trabajador').click(function(e){
			e.preventDefault();
			$('#modalBuscarTrabajador').modal('show');
		});
		//seleccionar un trabajador en el modal
		$('#select_trabajador').click(function(event){
			event.preventDefault();
			$("#solicitante_id").val(SelectTrabajadoresData[0].nPersonal_id);
			$('#solicitante').val(SelectTrabajadoresData[0].cPersonalNom+" "+SelectTrabajadoresData[0].cPersonalApe);
			$('#modalBuscarTrabajador').modal('hide');
		});

		$('#select_producto').click(function(event){
			event.preventDefault();
			$("#producto_id").val(SelectProductoData[0].nProducto_id);
			$('#producto').val(SelectProductoData[0].cProductoDesc);
			$('#modalBuscarProducto').modal('hide');
		});
		//	Agregar a la tabla
		$('#btn-agregar-detalle').click(function(event){
			event.preventDefault();			
			$("#AgregarProductoForm").validationEngine('validate');
			SelectProductoData[0].DetSalProdCant = $("#cantidad").val();
			SalidaProductosTable.fnAddData(SelectProductoData);
			$("#producto").val("");
			$("#producto_id").val("");
			$("#cantidad").val("");
		});

		//
		var successSalidaProductos = function(){
			/*$("#observaciones").val("");
			$("#solicitante").val("");
			$("#solicitante_id").val("");*/
		}

		$("#enviar_salida_producto").click(function(event){
		event.preventDefault();
		if($("#RegistrarSalidaForm").validationEngine('validate'))			
			enviar($("#RegistrarSalidaForm").attr("action-1"),{formulario:$("#RegistrarSalidaForm").serializeObject(),
				tabla: CopyArray(SalidaProductosTable.fnGetData(),["nProducto_id","DetSalProdCant"])}, successSalidaProductos, null)
	});


	});
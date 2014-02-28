var urlES =  "js/es_ES.txt";
	$("#RegistrarPedidoForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	var urlExportCierreXLS = "extensiones/reportes_xls/formato_reporte_cuadrecaja.php";
	var urlExportCierrePDF = "extensiones/reportes_pdf/formato_reporte_cuadrecaja.php";

	$('#lanza-cierremes').click(function(e){
		e.preventDefault();
		$('#modalcierremes').modal('show');
	});

	$('#btn-cierremes').click(function(){
		$('#modalcierremes').modal('hide');
		var ajax = $.ajax({
			url: "{{ path('dicars_logistica_servicio_cierremes',{'idlocal':''}) }}/"+2,
			dataType: "json",
			async: false
		});
		ajax.done(function(data){
			$('#aftercierremes').modal('show');
		});
	});
	
	$('#lanza-cuadrecaja').click(function(e){
		e.preventDefault();
		$('#modalcuadrecaja').modal('show');
	});

	$('#pdfcuadrecaja').click(function(e){
		e.preventDefault();
		$("#FormCuadreCaja").attr("action",urlExportCierrePDF);
		$('#FormCuadreCaja').submit();
		$('#table_cuadrecaja').val('');
		$('#modalcuadrecaja').modal('hide');
	});

	$('#xlscuadrecaja').click(function(e){
		e.preventDefault();
		$("#FormCuadreCaja").attr("action",urlExportCierreXLS);
		$('#FormCuadreCaja').submit();
		$('#table_cuadrecaja').val('');
		$('#modalcuadrecaja').modal('hide');
	});
	
	$('#rootwizard').bootstrapWizard({
		onNext: function(tab, navigation, index) {
			switch (index)
			{
				case 1:
					if(VentaProdTable.fnSettings().fnRecordsTotal() == 0)
					{
						$("#rquiredproducts").modal('show');
						return false;
					}
					else
						VentaUpdate();
					break;
				case 2:
					CargarTablaResumen(formapago);
					if($("#EnviarVentaForm").validationEngine("validate"))
					{
						if(formapago == "1")
						{							
							if(parseFloat($("#total").val())>$('#importe').val())
							{
								$('#importe').validationEngine(
									'showPrompt',
									'El importe debe ser mayor que el total',
									'error',
									"topLeft" ,
									true);
								return false;
							}
						}
					}
					else
						return false;
					break;
							
			}
		},
		onTabShow: function(tab, navigation, index) {
			var $total = navigation.find('li').length;
			var $current = index+1;
		
			// If it's the last tab then hide the last button and show the finish instead
			if($current >= $total) {
				$('#rootwizard').find('.pager .next').hide();
				$('#rootwizard').find('.pager .finish').show();
				$('#rootwizard').find('.pager .finish').removeClass('disabled');
			} else {
				$('#rootwizard').find('.pager .next').show();
				$('#rootwizard').find('.pager .finish').hide();
			}
		}
	});


	$(document).ready(function(){
		//DATATABLES
		var SelectProductosData = new Array();

		//creamos el datatable de proveedor
		var BuscarProOptions = {
		"aoColumns":[
		              { "sWidth": "5%","mDataProp": "cProductoDesc"},
		              { "sWidth": "5%","mDataProp": "nProductoStock"},
		              { "sWidth": "5%","mDataProp": "nProductoPCosto"}
		              //{ "sWidth": "5%","mDataProp": ""}
		              ],
		"fnCreatedRow":getSimpleSelectRowCallBack(SelectProductosData)
		};

		ProductosTable = createDataTable2('select_producto_table',BuscarProOptions);
		//DATATABLE DETALLE
		//datatable del detalle de productos
		var DetalleProductosActions = new DTActions({
		'conf': '001',
		'DropFunction': function(nRow, aData, iDisplayIndex) {
					var index = $(DetalleProductosTable.fnGetData()).getIndexObj(aData,'nProducto_id');
					DetalleProductosTable.fnDeleteRow(index); 
			}
		});

		ProductosdOptions = {
		"aoColumns":[
			{ "sWidth": "12%","mDataProp": "nProducto_id"},
			{ "sWidth": "12%","mDataProp": "cProductoDesc"},
			{ "sWidth": "12%","mDataProp": "nDetOrdPedCant"}
			//{ "sWidth": "12%","mDataProp": "nDetIngProdPrecUnt"}			
		              ],
		"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",
		"fnCreatedRow":DetalleProductosActions.RowCBFunction
		};
		DetalleProductosTable = createDataTable2('productos_table',ProductosdOptions);	

		//llamar al modal BUSCAR PRODUCTOS
		$('#btn-productos').click(function(e){
			e.preventDefault();
			$('#modalBuscarProducto').modal('show');
		});
		
	//SELECCIONAR PRODUCTO EN EL MODAL
	$('#select_producto').click(function(event){
		event.preventDefault();
		$("#idProducto").val(SelectProductosData[0].nProducto_id);
		$('#producto').val(SelectProductosData[0].cProductoDesc);
		$('#modalBuscarProducto').modal('hide');
	});

			//agregar a la tabla
	$('#agregar_producto').click(function(event){
		event.preventDefault();
		SelectProductosData[0].nProducto_id = $("#idProducto").val();
		SelectProductosData[0].cProductoDesc = $("#producto").val();
		SelectProductosData[0].nDetOrdPedCant = $("#cantidad").val();
		//SelectProductosData[0].nProducto_id = $("#idProducto").val();
		DetalleProductosTable.fnAddData(SelectProductosData);
		$("#producto").val("");
		$("#idProducto").val("");
		$("#cantidad").val("");
	});

	var successIngresoProductos = function(){

	}

	$("#btn_enviar_pedido").click(function(event){
		event.preventDefault();
		if($("#RegistrarPedidoForm").validationEngine('validate'))			
		enviar($("#RegistrarPedidoForm").attr("action-1"),{formulario:$("#RegistrarPedidoForm").serializeObject(),
		tabla: CopyArray(DetalleProductosTable.fnGetData(),["nProducto_id","nDetOrdPedCant"])}, successIngresoProductos, null)
	});


});
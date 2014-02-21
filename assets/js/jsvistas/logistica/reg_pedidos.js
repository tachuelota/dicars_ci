var urlES =  "js/es_ES.txt";

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
		

		$(document).ready(function(){

			var SelectProductosData = new Array();

			//creamos el datatable de proveedor
			var BuscarProOptions = {
			"aoColumns":[
			              { "sWidth": "5%","mDataProp": "nProveedor_id"},
			              { "sWidth": "5%","mDataProp": "cProveedorRazSocial"},
			              { "sWidth": "5%","mDataProp": "cProveedorRuc"},
			              { "sWidth": "5%","mDataProp": "cProveedorTel"}
			              ],
			"fnCreatedRow":getSimpleSelectRowCallBack(SelectProductosData)
			};

			BuscarProductos	Table = createDataTable2('select_proveedor_table',BuscarProOptions);

			//llamar al modal BUSCAR PRODUCTOS
			$('#btn-productos').click(function(e){
				e.preventDefault();
				$('#modalBuscarProducto').modal('show');
		});
		});
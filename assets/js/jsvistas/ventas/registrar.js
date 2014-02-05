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
			unlockload = function(){
				$.unblockUI({
		            onUnblock: function(){
			            $(location).attr("href","ventas_consultar.html"); 
		            } 
		        });
			};

			$('#cliente').val('ANONIMO ANONIMO');
			$('#cliente_id').val('0');

			volverConsultar = function(){
				$(location).attr("href","ventas_consultar.html");
			};

			$("#wrapper").width($("#contenedor").width());
			$("#steps").width($("#contenedor").width());
			$(".step").width($("#contenedor").width());

			$('#vercronograma').on('hidden', function(){
				$(location).attr("href","ventas_consultar.html");
			});

			$("#pdfbutton").click(function(e){
				e.preventDefault();
				$("#CreatePDFForm").attr("action",urlExportPDF);
				$("#CreatePDFForm").submit();
			});
			
			$("#xlsutton").click(function(e){
				e.preventDefault();
				$("#CreatePDFForm").attr("action",urlExportXLS);
				$("#CreatePDFForm").submit();
			});

			$("#finalizar_venta").click(function(e){
				e.preventDefault();
				$.blockUI({ 
			    	message: $('#loadingDiv'),
			    	css: { padding: '10px' }, 
					timeout: 2000,
					onBlock: function() { 
						unlockload(); 
		        	}
				});
			});

			$('.btn-buscarp').click(function(e){
				e.preventDefault();
				$('#modalBuscarProducto').modal('show');
				UnselectRow("select_producto_table");
			});

			$('.btn-buscarc').click(function(e){
				e.preventDefault();
				$('#modalBuscarCliente').modal('show');
				UnselectRow("select_cliente_table");
			});

			$("#select_producto").click(function(e){
				e.preventDefault();
				var data = SelectProductoData[0];
				$('#producto').val(data.desc);
				$('#cantidad').val("1");
				$('#modalBuscarProducto').modal('hide');
				$('#cantidad').attr('max',data.stock);
				$('#modpcontado').val(data.pcontado);
				$('#modpcontado').attr('min',data.pcosto);
				$('#modpcredito').val(data.pcredito);
				$('#modpcredito').attr('min',data.pcosto);
			});

			$("#btn-select-cliente").click(function(e){
				e.preventDefault();
				var data = SelectClienteData[0];
				$('#cliente').val(data.nombre+" "+data.apellido);
				$('#cliente_id').val(data.id);
				$('#clienteR').text(data.nombre+" "+data.apellido);
				$('#direccionR').text(data.direccion);
				$('#modalBuscarCliente').modal('hide');
				
			});
			$("#fechaR").text(fechaAhora()+" "+getHourFormato());
			
			initSlider();
			$(".step").show();
			$('#contenedor').height($('#step1').height());
		});
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
			$('.btn-buscarp').click(function(e){
				e.preventDefault();
				UnselectRow("select_producto_table");
				$('#modalBuscarProducto').modal('show');
			});

			$("#select_producto").click(function(e){
				e.preventDefault();
				$('#modalBuscarProducto').modal('hide');
			});

			$("#btn_enviar_pedido").click(function(e){
				if($('#id-checkgerencia').is(':checked'))
					$('#email').val(1);//enviado a gerencia
				else
					$('#email').val(0);//NO enviado a gerencia
				e.preventDefault();
				$.blockUI({ 
			    	message: "Registrando...",
			    	css: { padding: '15px'},
		    		timeout: 2000
				});
			});
		});
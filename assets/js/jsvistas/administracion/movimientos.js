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
			$("#date01,#date02").val(fechaAhora());
			$('.btn-registrar').click(function(e){
				e.preventDefault();
				$('#modalRegistroMov').modal('show');
			});

			$("#pdfgen").click(function(){
				urlExportXLS = "extensiones/reportes_xls/formato_reporte_movimiento.php";
				urlExportPDF = "extensiones/reportes_pdf/formato_reporte_movimiento.php";

				$("#title").val("REPORTE DE MOVIMIENTOS");
				$("#exportmodal").modal('show');
			});

			$("#pdfdet").click(function(){
				urlExportXLS = "extensiones/reportes_xls/formato_reporte_movimientodet.php";
				urlExportPDF = "extensiones/reportes_pdf/formato_reporte_movimientodet.php";
				
				$("#title").val("REPORTE DE MOVIMIENTOS");
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
		});
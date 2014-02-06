
		
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
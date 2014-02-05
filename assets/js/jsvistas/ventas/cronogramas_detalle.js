	var urlExportXLS = "extensiones/reportes_xls/formato_reporte_cronpago.php";
		var urlExportPDF = "extensiones/reportes_pdf/formato_reporte_cronpago.php";

		$('.btn-pagar').click(function(){
			$('#modalCuotas').modal('show');
		});
		$('.btn-guardar').click(function(){
			$('#modalCuotas').modal('hide');
		});

		$('.btn-cronograma').click(function(){
			$('#vercronograma').modal('show');
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
var urlExportXLS = "extensiones/reportes_xls/formato_reporte_saldos.php";

	$(document).ready(function(){
		
		$("#date01").val(fechaAhora());
		$("#date02").val(fechaAhora());

		$("#xlsinigen").click(function(e){
			e.preventDefault();
			$("#CreateXLSForm").attr("action",urlExportXLS);
			$("#CreateXLSForm").submit();
		});

		$("#xlsactualgen").click(function(e){
			e.preventDefault();
			$("#CreateXLSForm").attr("action",urlExportXLS);
			$("#CreateXLSForm").submit();
		});
		
	});
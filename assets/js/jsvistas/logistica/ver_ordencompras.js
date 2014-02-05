var urlExportXLS = "extensiones/reportes_xls/formato_reporte_logistica.php";
var urlExportPDF = "extensiones/reportes_pdf/formato_reporte_logistica.php";

$("#pdfgen").click(function(){
	$("#title").val("ORDEN DE COMPRA");
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
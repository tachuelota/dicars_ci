$(document).ready(function(){
	$("#MovimientoForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	$(".SelectAjax").SelectAjax();
			
	MovimientosRowCBF = function(nRow, aData, iDisplayIndex){
		MovimientosTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};

	var UrlaDTable = $("#mov_table").attr("data-source");
		FormatoDTable = [
			              { "sWidth": "33%","mDataProp": ""},
			              { "sWidth": "33%","mDataProp": ""},

			              ];

	

	var successMovimiento = function(){
		$('#modalMov').modal('hide');
		mov_table.fnReloadAjax()
	}

	//$("#date01,#date02").val(fechaAhora());
	$('.btn-registrar').click(function(e){
	e.preventDefault();
	$('#modalMov').modal('show');
	});

	$("#btn-reg-movimiento").click(function(event){
		event.preventDefault();
		if($("#MovimientoForm").validationEngine('validate'))
			// para vefiricar console.log($("#CargoForm").serializeObject());
		enviar($("#MovimientoForm").attr("action-1"),{formulario:$("#MovimientoForm").serializeObject()}, successMovimiento, null)
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
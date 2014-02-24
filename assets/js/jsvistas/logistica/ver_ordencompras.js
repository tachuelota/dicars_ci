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

	
	$(document).ready(function(){
		//alert("Hola");
		//creamos el datable detalle
		var IngProductosDetalleActions = new DTActions({
		'conf': '000',
		'DropFunction': function(nRow, aData, iDisplayIndex) {
					//var index = $(DetalleProductosTable.fnGetData()).getIndexObj(aData,'nProducto_id');
					//DetalleProductosTable.fnDeleteRow(index);
			/*switch (parseInt(aData.band)){
				case 0:
					DetalleProductosTable.fnUpdate('<span class="label label-success">Activo</span>',index,4);
					aData.band = 1;
					break;
				case 1:
					DetalleProductosTable.fnUpdate('<span class="label label-important">Eliminar</span>',index,4);
					aData.band = 0;
					//console.log(aData);
					break;
				case 2:
					DetalleProductosTable.fnDeleteRow(index); 
					BuscarProductosTable.fnAddData(aData);
					break;
			} */
			}
		});
		OrdenCompradOptions = {
		"aoColumns":[
			{ "sWidth": "15%","mDataProp": "cProductoDesc"},
			{ "sWidth": "15%","mDataProp": "nDetCompraCant"},
			{ "sWidth": "15%","mDataProp": "nDetCompraPrecUnt"},
			{ "sWidth": "15%","mDataProp": "nDetCompraImporte"},
			{ "sWidth": "15%","mDataProp": "nOrdenCom_id"}					
		              ],
		//"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",
		//"fnCreatedRow":OrdCompraDetalleActions.RowCBFunction
		};
		DetalleProductosTable = createDataTable2('productos_table',OrdenCompradOptions);
	});
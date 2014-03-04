$(document).ready(function(){
	var ZonaPersonalTable;
	var ClienteTable;
	
	var RowCallBackFunctionZonaPersonal;
	var tabla_clientes;

	var	urlExportXLS = base_url +"assets/extensiones/reportes_xls/formato_reporte_clientes.php";
	var	urlExportPDF = base_url +"assets/extensiones/reportes_pdf/formato_reporte_clientes.php";

	var ZonaPersonalOptions = {
		"aoColumns":[
				{ "sWidth": "15%","mDataProp": "cZonaDesc"},
				{ "sWidth": "15%","mDataProp": "persona"},
				{ "sWidth": "15%","mDataProp": "des_ubigeo"}, 
				],
		"fnCreatedRow":function(nRow,aData,iDisplayIndex){
				$(nRow).click( function(e) {
					e.preventDefault();					
					if ( $(this).hasClass('row_selected') ) {
			            $(this).removeClass('row_selected');
			        }
					else {
						$('#zonapersonal_table tr.row_selected').removeClass('row_selected');
			            $(this).addClass('row_selected');
			            ClienteTable.fnReloadAjax(base_url+"ventas/servicios/getClienteZona/"+aData.nZona_id);
			        }
				});
		}
	};

	var ZonaPersonalTable = createDataTable2('zonapersonal_table',ZonaPersonalOptions);

	var ClientesOptions = {
	"aoColumns": [
	              { "sWidth": "15%","mDataProp": "cClienteNom"},
	              { "sWidth": "15%","mDataProp": "cClienteApe"},
	              { "sWidth": "15%","mDataProp": "cClienteDNI"},
	              { "sWidth": "15%","mDataProp": "nClienteLineaOp"}
	              ]
	             };
	ClienteTable = createDataTable2('clientes_table',ClientesOptions);


	$("#pdfgen").click(function(){
			tabla_clientes = toHTML(crearTablaToArray("tclientes",
				['NOMBRE','APELLIDO','DNI','LINEA OPERATIVA'],
				[	'style="width: 25%;" class="head" ','style="width: 25%;" class="head" ','style="width: 25%;" class="head" ',
					'style="width: 25%;" class="head" '],
				['cClienteNom','cClienteApe','cClienteDNI','nClienteLineaOp'],
				[	'style="width: 25%;" ','style="width: 25%;" ','style="width: 25%;" ',
					'style="width: 25%;" '],
					ClienteTable.fnGetData()));
		$("#title").val("REPORTE ZONAS");
		$("#table_clientes").val(tabla_clientes);
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
$(document).ready(function(){

	var CreditosDetalleOptions = {
		"aoColumns":[
				{ "sWidth": "10%","mDataProp": "fechaVenta"},
				{ "sWidth": "8%","mDataProp": "montoTotal"},
				{ "sWidth": "9%","mDataProp": "montoPagado"}, 
				{ "sWidth": "8%","mDataProp": "cuotas"},
				{ "sWidth": "6%","mDataProp": "estadolabel"},
				{ "sWidth": "10%","mDataProp": "btnpagar"},
				{ "sWidth": "15%","mDataProp": "btnreporte"}    
				],	
		"fnCreatedRow":function(nRow, aData, iDisplayIndex)
		{
			$(nRow).find(".btn-pagar").click(function(e){
				e.preventDefault();
				$('#modalCuotas').modal('show');
			});
		}
	};

	CreditosDetalleTable = createDataTable2('creditos_table',CreditosDetalleOptions);

	
});
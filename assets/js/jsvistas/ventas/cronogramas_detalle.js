$(document).ready(function(){

	function CalcularPago(){
		CloneAttrTable(CuotasTable,'cmonto',3);
		AddAttr(CuotasTable.fnGetData(), 'band',0);
		var Array = CuotasTable.fnGetData();
		var Monto = parseFloat($("#monto").val());
		var total = 0;
		$(Array).each(function(index){
			var deudacuota = parseFloat(this.montoapg - this.montoapl);
			if(deudacuota != 0){
				var aplicado = 0 ;
				Monto-=deudacuota;
				if(Monto <= 0){
					aplicado = parseFloat(this.montoapl) + (Monto) + deudacuota;
					total = parseFloat(total)+(Monto) + deudacuota;
					Monto = 0;
				}
				else{
					aplicado = parseFloat(this.montoapg);
					total = total + parseFloat(this.montoapg - this.montoapl);				
				}
				CuotasTable.fnUpdate(aplicado.toFixed(2),index,3);
				this.band= 1;
			}
			return (Monto != 0);
		});
		$("#montoapg").val(total.toFixed(2));
		CopyArray(OtherDataCuotas,CuotasTable.fnGetData(),false,Attr);
	};

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
				CronoTable.fnReloadAjax(base_url + "ventas/servicios/get_cronogramabyCredito/" + aData.id_credito);
				$('#modalCuotas').modal('show');
			});
		}
	};

	CreditosDetalleTable = createDataTable2('creditos_table',CreditosDetalleOptions);


	var CronoOptions = {
		"aoColumns":[
			{ "sWidth": "15%","mDataProp": "nCronPagoFecPago"},
			{ "sWidth": "15%","mDataProp": "nCronPagoNroCuota"},
			{ "sWidth": "15%","mDataProp": "nCronPagoMonCouApg"},
			{ "sWidth": "15%","mDataProp": "nCronPagoMonCouApl"}   
				],
		
		"sDom": "<r>t<'row-fluid'>",
		"fnCreatedRow": function( nRow, aData, iDisplayIndex ) {
						aData.band = 1;
		              },
	};

	CronoTable = createDataTable2('cuotas_table',CronoOptions);
	
});
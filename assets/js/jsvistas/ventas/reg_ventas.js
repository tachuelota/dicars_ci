function VentaUpdate(){	
	var igv = parseInt($("#tipo_igv option:selected").text());
	var des = $("#descuento").val();
	var formapago = $("#forma_pago").val();
		
	var montomoneda = parseFloat($("#tipo_moneda option:selected").attr('monto'));
	var montodesc;
	var montoigv;
	var montoproductos;
	
	if($("#tipo_moneda").val()==1)
		TipoMoneda = " - s/.";
	else{
		TipoMoneda = " - s/.";
		$("#resumen_dolares").show();
	}

	if(formapago == 1){
		$("#pagocont_block").show();
		$("#cuotas_block").hide();
		$("#saldo_block").hide();
		$("#resume-credito").hide();
		montoproductos = totalcontado;
		tipoprecio = 'pcontado';
	}
	else{
		$("#importe").attr("min", "0");
		$("#saldo_block").show();
		$("#pagocont_block").hide();
		$("#resume-credito").show();
		
		if(formapago == 2){
			UnselectRow("select_producto_table");
			$("#cuotas_block").show();
			montoproductos = totalcredito;
			tipoprecio = 'pcredito';
			$("#prim_cuota").attr("required",true);
		}

		else{
			$("amortizacion").attr("required",true);
			$("#cuotas_block").hide();
			montoproductos = totalcontado;
			tipoprecio = "pcontado";
			$("#amortizacion").attr("min", "1");
		}
	}
	
	CargarTablaResumen(formapago);
	montodesc = (montoproductos*des/100).toFixed(2);
	
	$("#subtotal").val((montoproductos*(100/(igv+100))*(100-des)/100).toFixed(2));
	montoigv = ($("#subtotal").val()*igv/100).toFixed(2);
	$("#total").val(($("#subtotal").val()*(100+igv)/100).toFixed(2));
	$("#saldo").val(($("#total").val()-$("#amortizacion").val()).toFixed(2));
	$("#spandesc").text("% "+TipoMoneda+" "+montodesc);
	$("#spanigv").text("% "+TipoMoneda+" "+montoigv);
	
	$("#spanamort").text(TipoMoneda);
	montocuota = $("#saldo").val()/$("#num_cuotas").val();
	montocuota = Math.ceil(montocuota*100)/100;
	$("#montocuota").val(montocuota);
	$("#spancouota").text("x "+TipoMoneda+" "+montocuota.toFixed(2));

	$("#forma_pagoR").text($("#forma_pago option:selected").text());
	$("#montoR").text(montodesc);
	$("#descuentoR").text(des+$("#spandesc").text());
	$("#subtotalR").text($("#subtotal").val());
	$("#tipo_igvR").text(igv+$("#spanigv").text());
	$("#totalR").text($("#total").val());
	$("#totalDo").text(($("#total").val()/montomoneda).toFixed(2));
	$("#amortizacionR").text($("#amortizacion").val());
	$("#saldoR").text($("#saldo").val());
	total = parseFloat($('#total').val());
	$('#amortizacion').attr('max', total);	
	if(formapago == 1){
		$("#importeR").text($("#importe").val());
		$("#vueltoR").text($("#vuelto").val());
		$('#importe').attr('min', total);
		
		if($('#importe').val() >= total){
			$('#vuelto').val(($('#importe').val() - total).toFixed(2));
			$('#importe_help').hide();
		}
		else if($('#importe').val() == 0){
			$('#vuelto').val("0");
			$('#importe_help').hide();
		}
		else{
			$('#vuelto').val("0");
			$('#importe_help').show();
		}
	}
}

$(document).ready(function(){
	var SelectProductoData = new Array();
	var SelectClienteData = new Array();

	$(".SelectAjax").SelectAjax();

	$('#rootwizard').bootstrapWizard({
		onNext: function(tab, navigation, index) {
			if(index==1) {
				if(VentaProdTable.fnSettings().fnRecordsTotal() == 0)
				{
					$("#rquiredproducts").modal('show');
					return false;
				}
				
			}			
		},
			onTabShow: function(tab, navigation, index) {
			var $total = navigation.find('li').length;
			var $current = index+1;
			var $percent = ($current/$total) * 100;
			$('#rootwizard').find('.bar').css({width:$percent+'%'});
		}
	});

	BuscarProdOptions = {
		"aoColumns":[
			{ "mDataProp": "cProductoCodBarra"},
			{ "mDataProp": "cProductoDesc"},
			{ "mDataProp": "PrecioContado_Dscto"},			
			{ "mDataProp": "PrecioCredito_Dscto"},
			{ "mDataProp": "cMarcaDesc"},
			{ "mDataProp": "cCategoriaNom"},			
			{ "mDataProp": "DescripcionOferta"},
			{ "mDataProp": "nProductoStock"}
		              ],
		"sDom":"t<'row-fluid'<'span12'i><'span12 center'p>>",
		"fnCreatedRow":getSimpleSelectRowCallBack(SelectProductoData)
	};	
	BuscarProdTable = createDataTable2('select_producto_table',BuscarProdOptions);

	ClienteOptions = {
		"aoColumns":[
			{ "sWidth": "33%","mDataProp": "cClienteNom"},
			{ "sWidth": "33%","mDataProp": "cClienteApe"},
			{ "sWidth": "33%","mDataProp": "cClienteDNI"},		              
			{ "sWidth": "33%","mDataProp": "nClienteLineaOp"}
		],
		"fnCreatedRow":getSimpleSelectRowCallBack(SelectClienteData)
	};
	ClienteTable = createDataTable2('select_cliente_table',ClienteOptions);

	VentaProdOptions = {
		"aoColumns":[
			{ "mDataProp": "cProductoCodBarra"},
			{ "mDataProp": "cProductoDesc"},
			{ "mDataProp": "cantidad"},
			{ "mDataProp": "PrecioContado_Dscto"},			
			{ "mDataProp": "PrecioCredito_Dscto"}
		              ],
		"fnCreatedRow":null
	};
	VentaProdTable = createDataTable2('select_productos_venta',VentaProdOptions);

	unlockload = function(){
		$.unblockUI({
            onUnblock: function(){
	            $(location).attr("href","ventas_consultar.html"); 
            } 
        });
	};

	$('#cliente').val('ANONIMO ANONIMO');
	$('#cliente_id').val('0');

	volverConsultar = function(){
		$(location).attr("href","ventas_consultar.html");
	};

	$("#wrapper").width($("#contenedor").width());
	$("#steps").width($("#contenedor").width());
	$(".step").width($("#contenedor").width());

	$('#vercronograma').on('hidden', function(){
		$(location).attr("href","ventas_consultar.html");
	});

	$("#pdfbutton").click(function(event){
		event.preventDefault();
		$("#CreatePDFForm").attr("action",urlExportPDF);
		$("#CreatePDFForm").submit();
	});
	
	$("#xlsutton").click(function(event){
		event.preventDefault();
		$("#CreatePDFForm").attr("action",urlExportXLS);
		$("#CreatePDFForm").submit();
	});

	$("#finalizar_venta").click(function(event){
		event.preventDefault();
		$.blockUI({ 
	    	message: $('#loadingDiv'),
	    	css: { padding: '10px' }, 
			timeout: 2000,
			onBlock: function() { 
				unlockload(); 
        	}
		});
	});

	$('.btn-buscarp').click(function(event){
		event.preventDefault();
		$('#modalBuscarProducto').modal('show');
		UnselectRow("select_producto_table");
	});

	$('.btn-buscarc').click(function(event){
		event.preventDefault();
		$('#modalBuscarCliente').modal('show');
		UnselectRow("select_cliente_table");
	});

	$("#select_producto").click(function(event){
		event.preventDefault();
		var data = SelectProductoData[0];
		$('#producto').val(data.cProductoCodBarra);
		$('#cantidad').val("1");
		$('#modalBuscarProducto').modal('hide');
		//$('#cantidad').attr('max',data.stock);
		$('#modpcontado').val(data.PrecioContado_Dscto);
		//$('#modpcontado').attr('min',data.pcosto);
		$('#modpcredito').val(data.PrecioCredito_Dscto);
		//$('#modpcredito').attr('min',data.pcosto);
	});

	$("#agregar_producto").click(function(event){
		event.preventDefault();
		if(SelectProductoData.length > 0){
			SelectProductoData[0].cantidad = $('#cantidad').val();
			SelectProductoData[0].PrecioContado_Dscto = $('#modpcontado').val();
			SelectProductoData[0].PrecioCredito_Dscto = $('#modpcredito').val();
			SelectProductoData[0].totalcredito = SelectProductoData[0].pcredito*$('#cantidad').val();
			SelectProductoData[0].totalcontado = SelectProductoData[0].pcontado*$('#cantidad').val();
			VentaProdTable.fnAddData(SelectProductoData);
			$('#producto').val("");
			$('#cantidad').val("");
			$('#modpcontado').val("");
			$('#modpcredito').val("");
			SelectProductoData.splice(0,SelectProductoData.length);
			$("#total_contado").text(totalcontado = (sumArrayByAttr(VentaProdTable.fnGetData(),'PrecioContado_Dscto','cantidad')).toFixed(2));
			$("#total_credito").text(totalcredito = (sumArrayByAttr(VentaProdTable.fnGetData(),'PrecioCredito_Dscto','cantidad')).toFixed(2));
		}
	});

	$("#btn-select-cliente").click(function(event){
		event.preventDefault();
		var data = SelectClienteData[0];
		$('#cliente').val(data.nombre+" "+data.apellido);
		$('#cliente_id').val(data.id);
		$('#clienteR').text(data.nombre+" "+data.apellido);
		$('#direccionR').text(data.direccion);
		$('#modalBuscarCliente').modal('hide');
		
	});

	$("#EnviarVentaForm").change(function(event){
		event.preventDefault();
		VentaUpdate();
	});
});
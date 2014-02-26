$(document).ready(function(){
	var SelectProductoData = new Array();
	var SelectClienteData = new Array();
	var totalcontado = 0;
	var totalcredito = 0;
	var formapago = null;

	var  VentaUpdate = function(){	
		var des = $("#descuento").val();
		var moneda = getAjaxObject(base_url+"administracion/servicios/getTipoMonedas/"+$("#tipo_moneda").val());
		var tipoigv = getAjaxObject(base_url+"administracion/servicios/getTipoIGV/"+$("#tipo_igv").val());
		var montomoneda = parseFloat(moneda.nTipoMonedaMont);
		var igv = parseInt(tipoigv.nTipoIGVProc);
		var montodesc;
		var montoigv;
		var montoproductos;

		formapago = $("#forma_pago").val();	
		
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
	var CargarTablaResumen = function(formapago){
		ResumenProdTable.fnClearTable();
		Auxtable = VentaProdTable.fnGetData();
		CloneAttr(Auxtable,'nOfertaProductoPorc','nDetVentaDscto');
		if(formapago == 2)
			CloneAttr(Auxtable,'PrecioContado_Dscto','nDetVentaPrecUnt');
		else
			CloneAttr(Auxtable,'PrecioCredito_Dscto','nDetVentaPrecUnt');
		ResumenProdTable.fnAddData($(Auxtable).CopyArray(["nProducto_id","cProductoCodBarra","cProductoDesc","nDetVentaCant","nDetVentaPrecUnt","nDetVentaDscto"]));
	};

	var ResumenRCBF = function(nRow, aData, iDisplayIndex)
	{
		aData.nDetVentaTot = (parseFloat(aData.nDetVentaPrecUnt)*parseFloat(aData.nDetVentaCant)).toFixed(2);
	};

	var VentaProdActions = new DTActions({
		'conf': '001',
		'DropFunction': function(nRow, aData, iDisplayIndex) {
			var index = $(VentaProdTable.fnGetData()).getIndexObj(aData,'nProducto_id');				
			VentaProdTable.fnDeleteRow(index); 
		}
	});

	$('#rootwizard').bootstrapWizard({
		onNext: function(tab, navigation, index) {
			if(index==1) {
				if(VentaProdTable.fnSettings().fnRecordsTotal() == 0)
				{
					$("#rquiredproducts").modal('show');
					return false;
				}
				else
					VentaUpdate();				
			}
			if(index == 2)
			{
				CargarTablaResumen(formapago);
			}
		},
		onTabShow: function(tab, navigation, index) {
			var $total = navigation.find('li').length;
			var $current = index+1;
		
			// If it's the last tab then hide the last button and show the finish instead
			if($current >= $total) {
				$('#rootwizard').find('.pager .next').hide();
				$('#rootwizard').find('.pager .finish').show();
				$('#rootwizard').find('.pager .finish').removeClass('disabled');
			} else {
				$('#rootwizard').find('.pager .next').show();
				$('#rootwizard').find('.pager .finish').hide();
			}
		}
	});

	$(".SelectAjax").SelectAjax();

	var BuscarProdOptions = {
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
	var BuscarProdTable = createDataTable2('select_producto_table',BuscarProdOptions);

	ClienteOptions = {
		"aoColumns":[
			{ "sWidth": "25%","mDataProp": "cClienteNom"},
			{ "sWidth": "25%","mDataProp": "cClienteApe"},
			{ "sWidth": "25%","mDataProp": "cClienteDNI"},		              
			{ "sWidth": "25%","mDataProp": "nClienteLineaOp"}
		],
		"fnCreatedRow":getSimpleSelectRowCallBack(SelectClienteData)
	};
	var ClienteTable = createDataTable2('select_cliente_table',ClienteOptions);

	var VentaProdOptions = {
		"aoColumns":[
			{ "mDataProp": "cProductoCodBarra"},
			{ "mDataProp": "cProductoDesc"},
			{ "mDataProp": "nDetVentaCant"},
			{ "mDataProp": "PrecioContado_Dscto"},			
			{ "mDataProp": "PrecioCredito_Dscto"}
		              ],
		"fnCreatedRow":VentaProdActions.RowCBFunction
	};
	var VentaProdTable = createDataTable2('select_productos_venta',VentaProdOptions);

	ResumenProdOptions = {
		"aoColumns":[
			{ "sWidth": "25%","mDataProp": "cProductoCodBarra"},
			{ "sWidth": "25%","mDataProp": "cProductoDesc"},
			{ "sWidth": "25%","mDataProp": "nDetVentaCant"},
			{ "sWidth": "25%","mDataProp": "nDetVentaPrecUnt"}
			],
		"fnCreatedRow":ResumenRCBF
	};
	var ResumenProdTable = createDataTable2('tabla_resumen_productos',ResumenProdOptions);

	unlockload = function(){
		$.unblockUI({
            onUnblock: function(){
	            $(location).attr("href","ventas_consultar.html"); 
            } 
        });
	};

	$('#cliente').val('ANONIMO ANONIMO');
	$('#cliente_id').val('0');
	$("#fechaR").text(fechanow());

	var volverConsultar = function(){
		$(location).attr(base_url+"ventas/views/ventas");
	};

	var prepararDatos = function()
	{
		var datosVenta = {
			formulario:$("#EnviarVentaForm").serializeObject(),
			productos: CopyArray(ResumenProdTable.fnGetData(),["nProducto_id","nDetVentaCant","nDetVentaPrecUnt","nDetVentaDscto","nDetVentaTot"])
		}
		return datosVenta;
	}

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
		$('#modpcontado').val(data.PrecioContado_Dscto);
		$('#modpcredito').val(data.PrecioCredito_Dscto);
	});

	$("#agregar_producto").click(function(event){
		event.preventDefault();
		if(SelectProductoData.length > 0){
			SelectProductoData[0].nDetVentaCant = $('#cantidad').val();
			SelectProductoData[0].PrecioContado_Dscto = $('#modpcontado').val();
			SelectProductoData[0].PrecioCredito_Dscto = $('#modpcredito').val();
			VentaProdTable.fnAddData(SelectProductoData);
			$('#producto').val("");
			$('#cantidad').val("");
			$('#modpcontado').val("");
			$('#modpcredito').val("");
			SelectProductoData.splice(0,SelectProductoData.length);
			$("#total_contado").text(totalcontado = (sumArrayByAttr(VentaProdTable.fnGetData(),'PrecioContado_Dscto','nDetVentaCant')).toFixed(2));
			$("#total_credito").text(totalcredito = (sumArrayByAttr(VentaProdTable.fnGetData(),'PrecioCredito_Dscto','nDetVentaCant')).toFixed(2));
		}
	});

	$("#btn-select-cliente").click(function(event){
		event.preventDefault();
		var data = SelectClienteData[0];
		$('#cliente').val(data.cClienteNom+" "+data.cClienteApe);
		$('#cliente_id').val(data.nCliente_id);
		$('#clienteR').text(data.cClienteNom+" "+data.cClienteApe);
		$('#direccionR').text(data.cClientecDir);
		$('#modalBuscarCliente').modal('hide');		
	});

	$("#EnviarVentaForm").change(function(event){
		event.preventDefault();
		VentaUpdate();
	});

	$("#btn-enviar-form").click(function(event){
		event.preventDefault();
		enviar($("#EnviarVentaForm").attr("action-1"),prepararDatos(), logdata, null);
	});
});
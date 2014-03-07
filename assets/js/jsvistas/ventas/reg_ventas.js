$(document).ready(function(){
	var SelectProductoData = new Array();
	var SelectClienteData = new Array();
	var totalcontado = 0;
	var totalcredito = 0;
	var formapago = null;
	var moneda = getAjaxObject(base_url+"administracion/servicios/getTipoMonedas").aaData;
	var tipoigv = getAjaxObject(base_url+"administracion/servicios/getTipoIGVActivo").aaData;

	$("#EnviarVentaForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});
	$("#tipo_moneda").SelectAjax(moneda);
	$("#tipo_igv").SelectAjax(tipoigv);

	var  VentaUpdate = function(){	
		var des = $("#descuento").val();
		var current_moneda = $(moneda).getObjectFromIndex("nTipoMoneda", $("#tipo_moneda").val());
		var current_igv = $(tipoigv).getObjectFromIndex("nTipoIGV", $("#tipo_igv").val());
		var montomoneda = parseFloat(current_moneda.nTipoMonedaMont);
		var igv = parseInt(current_igv.nTipoIGVProc);
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
			$("#amortizacion").val(0);
			$("#saldo").val(0);
			$("#pagocont_block").show();
			$("#cuotas_block").hide();
			$("#saldo_block").hide();
			$("#resume-credito").hide();
			montoproductos = totalcontado;
		}
		else{
			$("#saldo_block").show();
			$("#pagocont_block").hide();
			$("#resume-credito").show();
			
			if(formapago == 2){
				UnselectRow("select_producto_table");
				$("#cuotas_block").show();
				montoproductos = totalcredito;
			}

			else{
				$("#cuotas_block").hide();
				montoproductos = totalcontado;
			}
		}
		
		montodesc = (montoproductos*des/100).toFixed(2);
		$("#subtotal").val((montoproductos*(100/(igv+100))*(100-des)/100).toFixed(2));
		montoigv = ($("#subtotal").val()*igv/100).toFixed(2);
		$("#total").val(($("#subtotal").val()*(100+igv)/100).toFixed(2));
		$("#saldo").val(($("#total").val() - $("#amortizacion").val()).toFixed(2));
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
		if(formapago == 1)
		{
			$("#importeR").text($("#importe").val());
			$("#vueltoR").text($("#vuelto").val());
			$("#montocuota").val(0);
			if($('#importe').val() >= total)
			{
				$('#vuelto').val(($('#importe').val() - total).toFixed(2));
				$("#amortizacion").val(total);
				$("#saldo").val(0);
			}
				
			else 
				$('#vuelto').val("0");
		}
	}

	var prepararDatos = function()
	{
		var tabladetalle = toHTML(crearTablaToArray("tdetalle",
				['Producto','Cantidad', 'Precio Credito','Total'],
				['style="width: 45%;" class="prodth" ','style="width: 15%;" class="prodth" ','style="width: 20%;" class="prodth" ','style="width: 20%;" class="prodth" '],
				['desc','cantidad','precio','importe'],
				['style="width: 45%;" class="izquierda"','style="width: 15%;"','style="width: 20%;"','style="width: 20%;"'],
				CronogramaReport.detventas));

		var tablacronograma = toHTML(crearTablaToArray("tcronograma",
				['Cuota','Fecha Vencimiento', 'Deuda','Monto Pagado','Saldo','Estado'],
				['style="width: 16%;" class="prodth" ','style="width: 18%;" class="prodth" ','style="width: 16%;" class="prodth" ','style="width: 16%;" class="prodth" ','style="width: 16%;" class="prodth" ','style="width: 18%;" class="prodth" '],
				['nrocuota','fecpago','deuda','monto','saldo','estado'],
				['style="width: 16%;" class="izquierda"','style="width: 18%;"','style="width: 16%;"','style="width: 16%;"','style="width: 16%;"','style="width: 18%;" '],
				CronogramaReport.cuotas));
		
		resumen = [	{'td1':'','td2': '','td3':'NRO CREDITO:','td4':CronogramaReport.nro,},
		           	{'td1':'CLIENTE:','td2': CronogramaReport.cliente,'td3':'','td4':'',},
		           	{'td1':'FECHA REGISTRO CREDITO:','td2': CronogramaReport.fecreg,'td3':'MONTO TOTAL DEUDA:','td4':CronogramaReport.monto,}	];

		tablaresumen = toHTML(crearTablaToArray("resume",null,null,['td1','td2','td3','td4'],['style="width: 25%;" class="impar" ','style="width:25%;" ','style="width: 25%;" class="impar" ','style="width: 25%;" '],resumen));
	   	
		$('#tdetalle').val(tabladetalle);
		$('#tcronograma').val(tablacronograma);
		$('#tresumen').val(tablaresumen);
	}

	var CargarTablaResumen = function(formapago){
		ResumenProdTable.fnClearTable();
		Auxtable = VentaProdTable.fnGetData();
		CloneAttr(Auxtable,'nOfertaProductoPorc','nDetVentaDscto');
		if(formapago == 2)
			CloneAttr(Auxtable,'PrecioContado_Dscto','nDetVentaPrecUnt');
		else
			CloneAttr(Auxtable,'PrecioCredito_Dscto','nDetVentaPrecUnt');
		ResumenProdTable.fnAddData($(Auxtable).CopyArray(["nProducto_id","cProductoCodBarra","cProductoDesc","nDetVentaCant","nDetVentaPrecUnt","nDetVentaDscto","cDetVentaDesc"]));
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
			switch (index)
			{
				case 1:
					if(VentaProdTable.fnSettings().fnRecordsTotal() == 0)
					{
						$("#rquiredproducts").modal('show');
						return false;
					}
					else
						VentaUpdate();
					break;
				case 2:
					CargarTablaResumen(formapago);
					if($("#EnviarVentaForm").validationEngine("validate"))
					{
						if(formapago == "1")
						{							
							if(parseFloat($("#total").val())>$('#importe').val())
							{
								$('#importe').validationEngine(
									'showPrompt',
									'El importe debe ser mayor que el total',
									'error',
									"topLeft" ,
									true);
								return false;
							}
						}
					}
					else
						return false;
					break;
							
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
			{ "mDataProp": "cDetVentaDesc"},
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

	var unlockload = function(){
		$("#resumen_venta").printThis({
            	importCSS: true
        });
		$.unblockUI({
            onUnblock: function(){
	            $(location).attr("href",base_url+"ventas/views/cons_ventas"); 
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
			productos: CopyArray(ResumenProdTable.fnGetData(),["nProducto_id","nDetVentaCant","nDetVentaPrecUnt","nDetVentaDscto","nDetVentaTot","cDetVentaDesc"])
		}
		return datosVenta;
	}


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
		$.blockUI({ 
			onBlock: function() { 
				enviar($("#EnviarVentaForm").attr("action-1"),prepararDatos(), unlockload, null);
				}
        	});

	});
});
$(document).ready(function(){
	var saldoT = parseFloat($("#total").text());
	var saldo = parseFloat($("#saldo").text());
	$("#pagar").click(function(e){
		e.preventDefault();
		var pago = parseFloat($("#amortizacion").val());
		var monto = 0;
		saldoT = saldo - pago;
		if(saldoT < 0)
			monto = saldo;
		else
			monto = pago;
		$("#pagofinal").val(monto);
		$("#mensaje_pago").text("Desea realizar el pago de: S/."+monto);
		$("#PagarModal").modal('show');
	});
	$("#btn_enviar").click(function(e){
		e.preventDefault();
		$.blockUI({ 
	    	message: "Registrando...",
	    	css: { padding: '10px' }, 
	    	timeout:   2000, 
			onBlock: function() {
				$("#PagarModal").modal('hide');
        	}
		});
	});

	$("#pagar").click(function(e){
		e.preventDefault();
		var pago = parseFloat($("#amortizacion").val());
		var monto = 0;
		saldoT = saldo - pago;
		if(saldoT < 0)
			monto = saldo;
		else
			monto = pago;
		$("#pagofinal").val(monto);
		$("#mensaje_pago").text("Desea realizar el pago de: S/."+monto);
		$("#PagarModal").modal('show');
	});
});
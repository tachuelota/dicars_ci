	$(document).ready(function(){

		$('#fecha').val(fechaAhora());

		//mostrar Buscar Cliente------------------------------------>
		$('.btn-solicitante').click(function(e){
			e.preventDefault();
			$('#modalBuscarTrabajador').modal('show');
		});
		//mostrar Buscar Producto------------------------------------>
		$('.btn-buscarp').click(function(e){
			e.preventDefault();
			$('#modalBuscarProducto').modal('show');
		});
		//mostrar Seleccionar Trabajador------------------------------------>
		$("#select_trabajador").click(function(e){
			e.preventDefault();
			$('#modalBuscarTrabajador').modal('hide');
		});
		$("#select_producto").click(function(e){
			e.preventDefault();
			$('#modalBuscarProducto').modal('hide');
		});

		$("#enviar_salida_producto").click(function(e){
			$.blockUI({ 
		    	message: "Registrando...",
		    	css: { padding: '15px'},
	    		timeout: 2000 
			});
			
		});
	});
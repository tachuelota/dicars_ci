
		$(document).ready(function(){

			$("#fecharegistro").val(fechaAhora());
			//mostrar Buscar Producto------------------------------------
			$('.btn-buscarp').click(function(e){
				e.preventDefault();
				$('#modalBuscarProducto').modal('show');
			});
			$("#select_producto").click(function(e){
				e.preventDefault();
				$('#modalBuscarProducto').modal('hide');
			});	
		});
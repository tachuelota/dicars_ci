
$(document).ready(function(){
	$('.btn-editar').click(function(e){
		e.preventDefault();
		$('#modalEditarDatos').modal('show');
		$('#EditarIngresoForm').unbind();			
		$('#EditarIngresoForm').submit(function(e){
			e.preventDefault();
			$('#modalEditarDatos').modal('hide');
											
		});
	});
	$('.btn-buscarp').click(function(e){
		e.preventDefault();
		$('#modalBuscarProducto').modal('show');
	});
	
	$("#select_producto").click(function(e){
		e.preventDefault();
		$('#modalBuscarProducto').modal('hide');
	});
});
$(document).ready(function(){

	//mostrar Registrar Trabajador------------------------------------>
	$('.btn-registrar').click(function(e){
		e.preventDefault();
		$('#modalRegistro').modal('show');
	});

	$('.btn-datos').click(function(e){
		e.preventDefault();
		$('#modalVerDatos').modal('show');
	});
	$('.btn-editar').click(function(e){
		e.preventDefault();
		$('#modalEditarDatos').modal('show');
	});

});
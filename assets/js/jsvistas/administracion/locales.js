
	//init------------------------------------>
	$(document).ready(function(){

		$('.btn-datos').click(function(e){
			e.preventDefault();
			$('#modalVerDatos').modal('show');
		});
		$('.btn-editar').click(function(e){
			e.preventDefault();
			$('#modalEditarLocal').modal('show');
		});		

		//mostrar Registrar Cliente------------------------------------>
		$('.btn-registrar').click(function(e){
			e.preventDefault();
			$('#modalRegistro').modal('show');
		});

	});
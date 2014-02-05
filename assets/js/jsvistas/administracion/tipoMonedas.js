

	//Init------------------------------------>
	$(document).ready(function(){

		$('.btn-editar').click(function(e){
			e.preventDefault();
			$('#modalEditarDatos').modal('show');
		});
		
		//mostrar Buscar Cliente------------------------------------>
		$('.btn-registrar').click(function(e){
			e.preventDefault();
			$('#modalRegistroTipoMoneda').modal('show');
		});
	});

	//Init------------------------------------>
	$(document).ready(function(){

		$('.btn-editar').click(function(e){
			e.preventDefault();
			$('#modalEditarDatos').modal('show');
		});
		//mostrar Registrar Cliente------------------------------------>
		$('.btn-registrar').click(function(e){
			e.preventDefault();
			$('#modalRegistroTipoIGV').modal('show');
		});
	});
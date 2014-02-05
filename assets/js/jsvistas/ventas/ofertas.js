		
	$(document).ready(function(){
		//mostrar Registrar Trabajador------------------------------------>
		$('.btn-registrar').click(function(e){
			e.preventDefault();
			$('#modalRegistro').modal('show');
		});
		//mostrar Editar Trabajador------------------------------------>
		$('.btn-editar').click(function(e){
			e.preventDefault();
			$('#modalRegistro').modal('show');
		});
		
	});
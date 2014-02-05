
		
	$(document).ready(function(){

		$('#btn-trabajador').click(function(e){
			e.preventDefault();
			$('#modalBuscarTrabajador').modal('show');
		});
		$('#btn-zona').click(function(e){
			e.preventDefault();
			$('#modalBuscarZona').modal('show');
		});
	});
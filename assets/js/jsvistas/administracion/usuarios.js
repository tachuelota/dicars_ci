
		
	$(document).ready(function(){

		//mostrar trabajadores------------------------------------>
		$('.btn-trabajador').click(function(e){
			e.preventDefault();
			$('#modalBuscarTrabajador').modal('show');
		});
		//seleccionar trabajador para agregarlo------------------->
		$("#select_trabajador").click(function(e){
			e.preventDefault();
			$('#modalBuscarTrabajador').modal('hide');
		});

		
		$( "#listalocales" ).selectable();
		
		$('.btn-datos').click(function(e){
			e.preventDefault();
			$('#modalVerDatos').modal('show');
		});
		$('.btn-editar').click(function(e){
			e.preventDefault();
			$('#modalEditarDatos').modal('show');
		});

		$('.btn-rol').click(function(e){
			e.preventDefault();
			$('#modalRoles').modal('show');
		});
	});
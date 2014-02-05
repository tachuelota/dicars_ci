
		$(document).ready(function(){

			$('.btn-datos').click(function(e){
				e.preventDefault();
				$('#modalVerDatos').modal('show');
			});
			$('.btn-editar').click(function(e){
				e.preventDefault();
				$('#modalEditarDatos').modal('show');
			});

			/*$('telefonoE').attr('pattern','|^\d{9}$|');*/

			//mostrar Registrar Cliente------------------------------------>
			$('.btn-registrar').click(function(e){
				e.preventDefault();
				$('#modalRegistroProveedores').modal('show');
			});	

		});
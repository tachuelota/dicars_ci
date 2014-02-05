
			$(document).ready(function(){	
			$("#date01,#date02").val(fechaAhora());
			$('.btn-elim').click(function(e){
				$('#modalAnular').modal('show');
			});
		});
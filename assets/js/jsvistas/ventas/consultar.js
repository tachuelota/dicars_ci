
			$(document).ready(function(){	
			$("#date01,#date02").val(fechanow());
			$('.btn-elim').click(function(e){
				$('#modalAnular').modal('show');
			});
		});
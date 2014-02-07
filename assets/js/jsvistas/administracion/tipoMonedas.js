$(document).ready(function(){
	$("#TipoMonedaForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});

 //--------  nombreTableAccion (..ta)
	var CargosTA = new DTActions({
		'conf': '010',
		'idtable': 'tipomoneda_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
			$("#btn-reg-tipomoneda").hide();
			$("#btn-editar-tipomoneda").show();
	  		$('#modalTipoMoneda').modal('show');
	  		$("#desc_tipomoneda").val(aData.cTipoMonedaDesc);
	  		$("#monto").val(aData.nTipoMonedaMont);
	  		$("#selectEstado").val(aData.cTipoMonedaEst);
	  		$("#idTpoMoneda").val(aData.nTipoMoneda);
		},
	});

	TipoMonedaRowCBF = function(nRow, aData, iDisplayIndex){
		TipoMonedaTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};


    var UrlaDTable = '{{ path("dicars_admin_servicio_gettablatipomoneda") }}';
	FormatoDTable = [
		              { "sWidth": "25%","mDataProp": "cTipoMonedaDesc"},
		              { "sWidth": "25%","mDataProp": "nTipoMonedaMont"},
		              { "sWidth": "25%","mDataProp": "cTipoMonedaEst"},
		              ];

 	var successTipoMoneda = function(){
		$('#modalTipoMoneda').modal('hide');
		TipoMonedaTable.fnReloadAjax()
	}


	$('#modalTipoMoneda').on('hidden', function(){		
		$("#TipoMonedaForm").reset();
		$('#modalTipoMoneda').modal('hide');
		$("#btn-reg-tipomoneda").show();
		$("#btn-editar-tipomoneda").hide();
	});
	//Init------------------------------------>
	

		/*$('.btn-editar').click(function(e){
			e.preventDefault();
			$('#modalEditarDatos').modal('show');
		});*/
		
		//mostrar Buscar Cliente------------------------------------>
		$('.btn-registrar').click(function(e){
			e.preventDefault();
			$('#modalTipoMoneda').modal('show');
		}); 



	TipoMonedaTable = createDataTable('tipomoneda_table',UrlaDTable,FormatoDTable,null, TipoMonedaRowCBF);



	});
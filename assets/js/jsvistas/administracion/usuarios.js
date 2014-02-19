	$(document).ready(function(){

		var SelectUsuarioData = new Array();
		var DataToSend = {};

		var SelectUsuarioData = new Array();

		$('#rootwizard').bootstrapWizard({
		onNext: function(tab, navigation, index) 
			{
			},
				onTabShow: function(tab, navigation, index) {
				var $total = navigation.find('li').length;
				var $current = index+1;
				var $percent = ($current/$total) * 100;
				$('#rootwizard').find('.bar').css({width:$percent+'%'});
				if($current >= $total) {
					$('#rootwizard').find('.pager .next').hide();
					$('#rootwizard').find('.pager .finish').show();
					$('#rootwizard').find('.pager .finish').removeClass('disabled');
				} else {
					$('#rootwizard').find('.pager .next').show();
					$('#rootwizard').find('.pager .finish').hide();
				}
			}
		});

		var UsuariosDTA = new DTActions({
			'conf': '010',
			'idtable': 'marcas_table',
			'EditFunction': function(nRow, aData, iDisplayIndex) {
				$('#tab2 input:checkbox').removeAttr('checked');
				var groups = getAjaxObject($("#tab2").attr("data-source")+aData.id);
				$(groups).each(function(index){
					$("#group"+this.id).attr("checked","checked");
					console.log("#group"+this.id);
				});
				$("input:checkbox, input:radio, input:file").not('[data-no-uniform="true"],#uniform-is-ajax').uniform();
			}
		});


		$('#select_trabajador').click(function(event){
			event.preventDefault();
			$("#trabajador").val(SelectUsuarioData[0].nPersonal_id);
			$("#email").val(SelectUsuarioData[0].cPersonalEmail);
			$('#nombre_trabajador').val(SelectUsuarioData[0].cPersonalNom+" "+SelectUsuarioData[0].cPersonalApe);
			$('#modalBuscarTrabajador').modal('hide');
		});
		//LLAMAR AL MODAL
		$('#btn-trabajador').click(function(event){
			event.preventDefault();
			$('#modalBuscarTrabajador').modal('show');
		});

		$('#btn-reg-usuario').click(function(event){
			event.preventDefault();
			enviar($("#UsuarioForm").attr("action-1"),{formulario:$("#UsuarioForm").serialize()}, logdata, null);
		});

		var BuscarUOptions = {
		"aoColumns":[
		              { "sWidth": "5%","mDataProp": "cPersonalNom"},
		              { "sWidth": "5%","mDataProp": "cPersonalApe"},
		              { "sWidth": "5%","mDataProp": "cPersonalDNI"},
		              { "sWidth": "5%","mDataProp": "cPersonalTelf"}
		              ],
		"fnCreatedRow":getSimpleSelectRowCallBack(SelectUsuarioData)
		};
		BuscarUsuariosTable = createDataTable2('select_trabajador_table',BuscarUOptions);

		var UsuarioOptions = {
		"aoColumns":[
					  { "sWidth": "20%","mDataProp": "id"},	
		              { "sWidth": "20%","mDataProp": "nomape"},		             
		              { "sWidth": "20%","mDataProp": "ultimologin"},
		               { "sWidth": "20%","mDataProp": "estadolabel"},
		              
		              ],
		"fnCreatedRow":UsuariosDTA.RowCBFunction
		};
		BuscarUsuListadoTable = createDataTable2('usuarios_table',UsuarioOptions);

		});
	
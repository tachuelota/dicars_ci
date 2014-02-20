	$(document).ready(function(){
		var SelectUsuarioData = new Array();
		var DataToSend = {};

		var SelectUsuarioData = new Array();
		var isEdit = false;
		var numTab = 1;

		$("#UsuarioForm").validationEngine('attach',{autoHidePrompt:true,autoHideDelay:3000});

		$('#rootwizard').bootstrapWizard({
		onNext: function(tab, navigation, index) 
			{
			},
				onTabShow: function(tab, navigation, index) {
				var $total = navigation.find('li').length;
				var $current = index+1;
				var $percent = ($current/$total) * 100;
				$('#rootwizard').find('.bar').css({width:$percent+'%'});
				if($current >= $total)
				{
					$('#rootwizard').find('.pager .next').hide();
					$('#rootwizard').find('.pager .cancel').show();
					$('#rootwizard').find('.pager .cancel').removeClass('disabled');
					$('#rootwizard').find('.pager .current').show();
					$('#rootwizard').find('.pager .current').removeClass('disabled');
				} 
				else 
				{
					$('#rootwizard').find('.pager .next').show();
					$('#rootwizard').find('.pager .finish').hide();
					$('#rootwizard').find('.pager .cancel').show();
				}
			}
		});

		var UsuariosDTA = new DTActions({
			'conf': '010',
			'idtable': 'marcas_table',
			'EditFunction': function(nRow, aData, iDisplayIndex) {
				$('#btn-update-usuario').addClass("current");
				$('#btn-reg-usuario').removeClass("current");
				$('#rootwizard').bootstrapWizard('show',0);
				$("#UsuarioForm").reset();
				$('#tab2 input:checkbox').removeAttr('checked');
				var groups = getAjaxObject($("#tab2").attr("data-source")+aData.id);
				$(groups).each(function(index){
					$("#group"+this.id).attr("checked","checked");					
				});
				$('#tab2 input:checkbox').uniform();
				$("#username").val(aData.username);
				$("#password").val("");
				$("#nombre_trabajador").val(aData.nomape);
				$("#user_id").val(aData.id);
			}
		});

		$("#btn_cancelar").click(function(event){
			event.preventDefault();
			console.log("hola");
			$('#rootwizard').bootstrapWizard('show',0);
			$('#btn-reg-usuario').addClass("current");
			$('#btn-update-usuario').removeClass("current");
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

		$('#btn-update-usuario').click(function(event){
			event.preventDefault();
			enviar($("#UsuarioForm").attr("action-2"),{formulario:$("#UsuarioForm").serialize()}, logdata, null);
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
					  { "sWidth": "20%","mDataProp": "username"},	
		              { "sWidth": "20%","mDataProp": "nomape"},		             
		              { "sWidth": "20%","mDataProp": "ultimologin"},
		               { "sWidth": "20%","mDataProp": "estadolabel"},
		              
		              ],
		"fnCreatedRow":UsuariosDTA.RowCBFunction
		};
		BuscarUsuListadoTable = createDataTable2('usuarios_table',UsuarioOptions);

		});
	
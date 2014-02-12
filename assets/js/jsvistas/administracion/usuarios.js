
		
	$(document).ready(function(){

		var SelectUsuarioData = new Array();
		var DataToSend = {};

		var SelectUsuarioData = new Array();

		$('#select_trabajador').click(function(event){
			event.preventDefault();
			$("#trabajador").val(SelectUsuarioData[0].nPersonal_id);
			$('#nombre_trabajador').val(SelectUsuarioData[0].cPersonalNom+" "+SelectUsuarioData[0].cPersonalApe);
			$('#modalBuscarTrabajador').modal('hide');
		});
		//LLAMAR AL MODAL
		$('#btn-trabajador').click(function(e){
			e.preventDefault();
			$('#modalBuscarTrabajador').modal('show');
		});



		function prepararDatos(){
		DataToSend = {
			formulario:$("#UsuarioForm").serializeObject(),
			usuarios:CopyArray(SelectUsuarioData,["nPersonal_id"])
			};
		}

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




		/****************************************/
		var SelectUsuTablaData = new Array();
		var DataToSend1 = {};

		function prepararDatos(){
		DataToSend1 = {
			formulario:$("#UsuarioForm").serializeObject(),
			listado:CopyArray(SelectUsuTablaData,["id"])
			};
		}

		var BuscarUsuOptions = {
		"aoColumns":[
					  { "sWidth": "20%","mDataProp": "id"},	
		              { "sWidth": "20%","mDataProp": "nomape"},		             
		              { "sWidth": "20%","mDataProp": "ultimologin"},
		               { "sWidth": "20%","mDataProp": "estadolabel"},
		              
		              ],
		"fnCreatedRow":getSimpleSelectRowCallBack(SelectUsuTablaData)
		};
		BuscarUsuListadoTable = createDataTable2('usuarios_table',BuscarUsuOptions);

		});
	
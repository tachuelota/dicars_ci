
		
	$(document).ready(function(){

		var SelectUsuarioData = new Array();
		var DataToSend = {};
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


		//mostrar trabajadores------------------------------------>
		/*$('.btn-trabajador').click(function(e){
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
			$('#modalRoles').modal('show');*/
		});
	
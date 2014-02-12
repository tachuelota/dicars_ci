$(document).ready(function(){
var SelectZonaData = new Array();
var DataToSend = {};

var SelectTrabajadorData = new Array();

//---btn de html
		$('#btn-trabajador').click(function(e){
			e.preventDefault();
			$('#modalBuscarTrabajador').modal('show');
		});

		$('#btn-zona').click(function(e){
			e.preventDefault();
			$('#modalBuscarZona').modal('show');
		});
// fin de botones	

	//Inicio de Zonas

	$('#enviar_zona_btn').click(function(event){
		event.preventDefault();
		prepararDatos();
		enviar($("#ZonapersonalForm").attr("action-1"),DataToSend, logdata, null)
	});


	var ZonasTA = new DTActions({
		'conf': '010',
		'idtable': 'select_zona_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {
		},
	});

	var TipoPerActivosTA = new DTActions({
		'conf': '000',
		'idtable': 'select_trabajador_table',
		'EditFunction': function(nRow, aData, iDisplayIndex) {		
			},
		});


	function prepararDatos(){
		DataToSend = {
			formulario:$("#ZonapersonalForm").serializeObject(),
			zonas:CopyArray(SelectZonaData,["nZona_id"])
		};
	}

	var BuscarZOptions = {
		"aoColumns":[
		              { "sWidth": "12%","mDataProp": "cZonaDesc"},
		              { "sWidth": "12%","mDataProp": "nZonaEst"},
		              { "sWidth": "12%","mDataProp": "nUbigeo_id"}
		              ],
		"fnCreatedRow":getSimpleSelectRowCallBack(SelectZonaData)
	};
	BuscarZonasTable = createDataTable2('select_zona_table',BuscarZOptions);

    //Fin de Zonas

	TipoPerActivosRowCBF = function(nRow, aData, iDisplayIndex){
		TipoPerActivosTA.RowCBFunction(nRow, aData, iDisplayIndex);	
	};
	
	var UrlaDTable = $("#select_trabajador_table").attr("data-source");
	FormatoDTable = [
		              { "sWidth": "3%","mDataProp": "cPersonalNom"},
		              { "sWidth": "3%","mDataProp": "cPersonalApe"},
		              { "sWidth": "3%","mDataProp": "cPersonalDNI"},
		              { "sWidth": "3%","mDataProp": "cPersonalTelf"},
		             
		              ];

	TipoPersonalTable = createDataTable('select_trabajador_table',UrlaDTable,FormatoDTable,null, TipoPerActivosRowCBF);	              


 
});

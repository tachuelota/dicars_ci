/*Extensiones de jQuery*/

jQuery.fn.getIndexObj = function (obj,attr){
	var objindex = null;
	this.each(function( index ) {
		  if(this[attr] == obj[attr]){
			  objindex = index;
		  }
	});
	return objindex;
};

jQuery.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

jQuery.fn.SelectAjax = function()
{
	$(this).each(function()
	{
		var data = getAjaxObject($(this).attr("data-source"))
		if(typeof data.aaData == "undefined")
			cargarSelect(data,$(this).attr("id"),$(this).attr("attrval"),$(this).attr("attrdesc"));
		else
			cargarSelect(data.aaData,$(this).attr("id"),$(this).attr("attrval"),$(this).attr("attrdesc"));
	});
};


jQuery.fn.reset = function () {
	  $(this).each (function() { this.reset(); });
	};

jQuery.fn.disable = function () {
	  $(this).find("input,select,textarea,checkbox").attr("disabled",true);
	};

jQuery.fn.enable = function () {
	  $(this).find("input,select,textarea,checkbox").attr("disabled",false);
	};

/*Fin extensiones de jQuery*/
function getActionButtons(conf){
  actions = "<p>"
  if(conf.substring(0,1)==1)
    actions += '<a class="ver_row actions-icons" data-original-title="Ver" href="#"><img alt="ver" class="icons" src="view.png"></a>';
  if(conf.substring(1,2)==1)
    actions += '<a class="edit_row actions-icons" data-original-title="Editar" href="#"><img alt="edit" class="icons" src="http://d9i0z8gxqnxp1.cloudfront.net/img/edit-icon.png"></a>';
  if(conf.substring(2,3)==1)
    actions += '<a class="delete-row actions-icons" data-original-title="Eliminar" href="#"><img alt="trash" src="http://d9i0z8gxqnxp1.cloudfront.net/img/trash-icon.png"></a>';
  actions += '</p>'
  return actions;
}

function getConfOneDay(day)
{
	var conf = "";
	for(var i = 0 ; i < 7 ; i++)
	{
		if(i===parseInt(day))
			continue;
		conf+=i
		if(i!=6)
			conf+=","
	}
	return conf;
}

function getDiaSemana(num){
  var dia;
  switch (parseInt(num)){
    case 0:
      dia = "Domingo";
      break;
    case 1:
      dia = "Lunes";
      break;
    case 2:
      dia = "Martes";
      break;
    case 3:
      dia = "Miercoles";
      break;
    case 4:
      dia = "Jueves";
      break;
    case 5:
      dia = "Viernes";
      break;
    case 6:
      dia = "Sabado";
      break;
  }
  return dia;
}

function DisplayBlockUI(idMensaje){
  $.blockUI({
    message: $('#'+idMensaje),
    css: {
      border: 'none',
      padding: '15px',
      backgroundColor: '#000',
      '-webkit-border-radius': '10px', 
      '-moz-border-radius': '10px',
      opacity: .5,
      color: '#fff'
      }
    });
}

function DisplayBlockUISingle(idMensaje){
   $.blockUI({
    message: $('#'+idMensaje),
    css: {
      border: 'none'
    }
  });
}


/*
 * logdata : muestra la data que se devuelve como response al enviar un formulario
 * con la funcion enviar
 */
var logdata = function(data){
	console.log(data);
	};

/*
 * reloadpage : recarga la pagina actual
 */
var reloadpage = function(data){
	location.reload();
	};
	
function AddAttr(Array, attr, value){
	$(Array).each(function( index ){
		this[attr] = value;
	});
}

function CloneAttr(Array, attr1, attr2){
	$(Array).each(function( index ){
		var value =this[attr1];
		this[attr2] = value;
	});
}

function CloneAttrTable(Tabla, attr, pos){
	var Array = Tabla.fnGetData();
	$(Array).each(function( index ){
		CuotasTable.fnUpdate(this[attr],index,pos);
	});
}
	
function getMultipleSelectRowCallBack(DSelected){
	var SelectRowFunction = function(nRow,aData,iDisplayIndex){
		$(nRow).click( function() {
			$(this).toggleClass('row_selected');
			if($(this).hasClass('row_selected'))
				DSelected.push(aData);
			else{
				var removeindex = $(DSelected).getIndexObj(aData,'id');
				DSelected.splice(removeindex,1);
			}
		});
	};
	
	return SelectRowFunction;
}

function UnselectRow(idTable){
	$("#"+idTable+" tr").each(function(index){
		if($(this).hasClass("row_selected"))
			$(this).toggleClass('row_selected');
	});
}

function SubTablaArray(Table, Array, attr){
	$(Array).each(function( index ){
		var indexarray = $(Table.fnGetData()).getIndexObj(this,attr);
		Table.fnDeleteRow( indexarray );
	});
}

/*
 * Nesesita tener definido el atributo cantidad
 */
function sumArrayByAttr(Array2,attr){
	var total = 0;
	$(Array2).each(function( index ){		
		total +=parseFloat(this[attr]);	
	});
	return(total);
}

function getSimpleSelectRowCallBack(DSelected){
	var SelectRowFunction = function(nRow,aData,iDisplayIndex){
		$(nRow).click( function() {
			if ( $(this).hasClass('row_selected') ) {
	            $(this).removeClass('row_selected');
	            DSelected.pop();
	        }
			else {
				$(nRow).closset('table').find('tr.row_selected').removeClass('row_selected');
	            $(this).addClass('row_selected');
	            DSelected.pop();
	            DSelected.push(aData);
	        }
		});
	};
	
	return SelectRowFunction;
}
	
/*
 * enviar : envia un formulario con los datos serializado a un controlador, los formularios deben estar presentes
 * y se debe utiliza en la funcion ready del documento
 * IdForm : es el id del formulario a enviar
 * responsefunction : es la funcion que se ejecuta cuando responde el controlador
 * otherdata: son datos adicionales que se pueden enviar al controlador
 */
function enviar(url, datos, successfunction, errorfunction){
	var Consulta = $.ajax({
		type: "POST",		
      	dataType: "JSON",
		url: url,
		data: datos
  	});


    if(typeof(successfunction)!= 'undefined' && successfunction != null)
    	Consulta.done(function(data){
    		successfunction(data);
    	});

    if(typeof(errorfunction)!= 'undefined' && errorfunction != null)
    	Consulta.fail(function(data){
    		errorfunction(data);
    	});		
}

/*
 * Crea un datatable y lo devuelve como variable
 */

function recoveryOprions(inputoptions){
	var outputoptions = {};
	if(typeof inputoptions.sAjaxSource == "undefined")
		outputoptions.sAjaxSource = "";
	else
		outputoptions.sAjaxSource = inputoptions.sAjaxSource;

	if(typeof inputoptions.aoColumns == "undefined")
		outputoptions.aoColumns = "";
	else
		outputoptions.aoColumns = inputoptions.aoColumns

	if(typeof inputoptions.iDisplayLength == "undefined")
		outputoptions.iDisplayLength = 5;
	else
		outputoptions.iDisplayLength = inputoptions.iDisplayLength;

	if(typeof inputoptions.aLengthMenu == "undefined")
		outputoptions.aLengthMenu = [[5,10, 25, 50], [5,10, 25, 50]];
	else
		outputoptions.aLengthMenu = inputoptions.aLengthMenu

	if(typeof inputoptions.sDom == "undefined")
		outputoptions.sDom = "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span12'i><'span12 center'p>>";
	else
		outputoptions.sDom = inputoptions.sDom

	if(typeof inputoptions.fnCreatedRow == "undefined")
		outputoptions.fnCreatedRow = null;
	else
		outputoptions.fnCreatedRow = inputoptions.fnCreatedRow

	if(typeof inputoptions.fnDrawCallback == "undefined")
		outputoptions.fnDrawCallback = null;
	else
		outputoptions.fnDrawCallback = inputoptions.fnDrawCallback

	if(typeof inputoptions.fnInitComplete == "undefined")
		outputoptions.fnInitComplete = null;
	else
		outputoptions.fnInitComplete = inputoptions.fnInitComplete

	return outputoptions;
}

function createDataTable2(idTable, options){
	var TOptios = recoveryOprions(options);
	var asInitVals = new Array();
	var oTable = $('#'+idTable).dataTable({
		"bProcessing": false,
		"bDestroy": true,		
        "bSort": false,
		"sAjaxSource": TOptios.sAjaxSource,
		"aoColumns": TOptios.aoColumns,	
		'iDisplayLength': TOptios.iDisplayLength,
		"aLengthMenu": [[5,10, 25, 50], [5,10, 25, 50]],			   
    	"sDom": TOptios.sDom,
    	"sPaginationType": "full_numbers",
    	"oLanguage": {
		    "sProcessing":     "Procesando...",
		    "sLengthMenu":     "Mostrar _MENU_ registros",
		    "sZeroRecords":    "No se encontraron resultados",
		    "sEmptyTable":     "Ningún dato disponible en esta tabla",
		    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
		    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Buscar:",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Cargando...",
		    "oPaginate": {
		        "sFirst":    "Primero",
		        "sLast":     "Último",
		        "sNext":     "Siguiente",
		        "sPrevious": "Anterior"
		    },
		    "oAria": {
		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		    }
		},  
	 	"fnCreatedRow": TOptios.fnCreatedRow,
		"fnInitComplete": TOptios.fnInitComplete,
	 	"fnDrawCallback": TOptios.fnDrawCallback
	});

	$("tfoot th.input input").keyup( function () {
		/* Filter on the column (the index) of this element */
		oTable.fnFilter( this.value, $("tfoot th.input input").index(this) );
	} );

	$("tfoot th.input input").each( function (i) {
		asInitVals[i] = this.value;
	} );
	
	$("tfoot th.input input").focus( function () {
		if ( this.className == "search_init" )
		{
			this.className = "";
			this.value = "";
		}
	} );
	
	$("tfoot th.input input").blur( function (i) {
		if ( this.value == "" )
		{
			this.className = "search_init";
			this.value = asInitVals[$("tfoot th.input input").index(this)];
		}
	} );

	$("tfoot th.select").each( function ( i ) {
        this.innerHTML = fnCreateSelect( oTable.fnGetColumnData(i) );
        $('select', this).change( function () {
            oTable.fnFilter( $(this).val(), i );
        } );
    } );

	return oTable;
}
function createDataTable(idTable,UrlaDTable,FormatoDTable, DrawCallBackFunction, RowCallBackFunction){
	var oTable = $('#'+idTable).dataTable({
		"bProcessing": false,
		"bDestroy": true,		
        "bSort": false,
		"sAjaxSource": UrlaDTable,
		"aoColumns": FormatoDTable,			   
    	"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span12'i><'span12 center'p>>",
    	"sPaginationType": "full_numbers",
    	"oLanguage": {
		    "sProcessing":     "Procesando...",
		    "sLengthMenu":     "Mostrar _MENU_ registros",
		    "sZeroRecords":    "No se encontraron resultados",
		    "sEmptyTable":     "Ningún dato disponible en esta tabla",
		    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
		    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Buscar:",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Cargando...",
		    "oPaginate": {
		        "sFirst":    "Primero",
		        "sLast":     "Último",
		        "sNext":     "Siguiente",
		        "sPrevious": "Anterior"
		    },
		    "oAria": {
		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		    }
		},  
	 	"fnCreatedRow": function( nRow, aData, iDisplayIndex ) {
	 		if(typeof(RowCallBackFunction)!= 'undefined' && RowCallBackFunction != null)
	 			RowCallBackFunction(nRow,aData,iDisplayIndex);
		},
	 	"fnDrawCallback": function(oSettings ){
		 	if(typeof(DrawCallBackFunction)!= 'undefined' && DrawCallBackFunction != null){
		 		setTimeout(function() {
			 		DrawCallBackFunction();
		 		});
	 		}
    }
	});
	return oTable;
}

function CopyArray(Array,attrs){
	var ArrayReturn = [];
	$(Array).each(function(index){
		var ArrayData = this;
		var data = {};
		$(attrs).each(function(index){
			data[this] = ArrayData[this];
		});
		ArrayReturn.push(data);
	});
	return ArrayReturn;
}

function getAjaxObject(url){
	var data = $.ajax({
		url: url,
		dataType: "json",
		async: false
		}).responseText;
	return jQuery.parseJSON(data);
}
function ajaxResponseData(namediv,path){
	var data = $.ajax({
        url: path,
        async: false
        }).responseText;
	$('#'+namediv).html(data);
}

function ajaxResponseDataPost(namediv,path){
	var data = $.ajax(
            {
                url: path,
                async: false,
                type: "POST",
            }).responseText;
	$('#'+namediv).html(data);
}

function ajaxTableDataPost(nametable,path)
{
        $.ajax(
            {
            url: path,
            async: false,
            type: "POST",
            }).done(function(data){
                $('#'+nametable+'> tbody:last').append(data);
            });
}
function ajaxListPost(path,select,red)
{   
    $.post(path,{dato:red},function(data){
         $('#'+select).html(data);
    });
   
}

function SelectListPost(list, valor)
{
    $('#'+list).val(valor);
}
	
function reloadTable(oTable){
	var returnfunction = function(data){
		oTable.fnReloadAjax();
		console.log(data);
		};
	return returnfunction;
}

function reloadclosemodal(idmodal,idaTable){
	var returnfunction = function(data){
		$('#'+idaTable).dataTable().fnReloadAjax();
		console.log(data);
		$('#'+idmodal).modal('hide');
		$('#'+idmodal+" form").reset();
		};
	return returnfunction;
}
	
/*Funcion para crear los formularios de forma dinamica*/
function crearElementosForm(Array){
	var $form = $("<div>");
	var $modalfooter = $("<div class='modal-footer'>");
	var $modalbody = $("<div class='modal-body'>");
	var $fielset = $("<fieldset>");
	jQuery.each(Array, function() {
		switch (this.type){
		case 'h3':
			$fielset.append('<h3>'+this.label+'</h3>');
			break;
		case 'actions':
			$modalfooter.append('<button type="reset" class="btn" data-dismiss="modal">Cancelar</button>  <button type="submit" class="btn btn-primary">Guardar</button>');
			break;
		case 'close':
			$modalfooter.append('<button type="reset" class="btn" data-dismiss="modal">Cerrar</button>');
			break;
		case 'hidden':
			$fielset.append('<input type="hidden" name="'+this.name+'" value="'+this.value+'">');
			break;
		default:
			$div_control_group = $('<div class="control-group">');
			$div_control_group.append('<label class="control-label" for="zona">'+this.label+'</label>');
			$div_control = $('<div class="controls">');
			$div_control.append(addElemento(this));
			$div_control_group.append($div_control);
			$fielset.append($div_control_group);
			$modalbody.append($fielset);
			break;
		}
	   });
	$form.append($modalbody);
	$form.append($modalfooter);
	
	return $form;
}

function addElemento(obj){
	switch (obj.type) {
	    case 'input': 
	    		$elem = $('<input class="input-xlarge focused" id="'+obj.name+'" name="'+obj.name+'" type="'+obj.typeinput+'" pattern="'+obj.pattern+'" title="'+obj.title+'" required="'+obj.req+'" maxlength="'+obj.max+'">');
	    		$elem.val(obj.value);
	    		break;
	    case 'inputnumber':
		    	$elem = $('<input class="input-xlarge focused" id="'+obj.name+'" name="'+obj.name+'" type="number" required="'+obj.req+'" step="'+obj.step+'" min="'+obj.min+'" max="'+obj.max+'">');
	    		$elem.val(obj.value);
	    		break;
	    case 'file':
	    		$elem = $('<input type="file" class="input-xlarge" name="'+obj.name+'">');
	    		break;
	    case 'textarea':
	    		$elem = $('<textarea class="input-xlarge" name="'+obj.name+'" rows="2" cols="" required="'+obj.req+'" maxlength="'+obj.max+'"></textarea>');
	    		$elem.val(obj.value);
	    		break;
	    case 'date':
	    		$elem = $('<input type="text" class="input-xlarge datepicker" id="'+obj.name+'" name="'+obj.name+'" value="'+obj.value+'">');
	    		break;
	    case 'select':
	    		$elem  = $('<select id="'+obj.name+'" name="'+obj.name+'" data-rel="chosen" >');
	    		break;
	    case 'img':
	    		$elem = $('<figure><img src="'+obj.value+'" alt="Tarjeta"></figure>');
	    		break;
	    case 'span': 
	    		$elem = $('<span class="help-inline" style="margin-top:5px;">'+obj.value+'</span>');
	    		break;
	}	
	return $elem;
}	

/*--------------------------------UBIGEO------------------------------------*/
function cargarDep(idselect, ubigeo){
	var $select = $('#'+idselect);
	var result = '';
	$(ubigeo).each(function(){
		if(this.dep == 1)
			result += '<option value="'+this.id+'">'+this.desc+'</option>';
	});
	$select.html(result); 
}

function cargarProv(idselect, ubigeo, iddepend){
	var $select = $('#'+idselect);
	var result = '';
	$(ubigeo).each(function(){
		if(this.prov == 1 && this.depend == iddepend)
			result += '<option value="'+this.id+'">'+this.desc+'</option>';
	});
	$select.html(result); 
}

function cargarDist(idselect, ubigeo, iddepend){
	var $select = $('#'+idselect);
	var result = '';
	$(ubigeo).each(function(){
		if(this.dist == 1 && this.depend == iddepend)
			result += '<option value="'+this.id+'">'+this.desc+'</option>';
	});
	$select.html(result); 
}

/* idtagdist:es el id del select que acumulara los options de los distritos
 * idtagprov:es el id del select que acumulara los options de los provincia
 * idtagdep:es el id del select que acumulara los options de los departamento
 * iddist: es el id por defecto que se le asignara al distrito
 * iddist: es el id por defecto que se le asignara a la provincia
 * iddep: es el id por defecto que se le asignara a departamento
 * */

function cargarUbigeo(idtagdist, idtagprov, idtagdep, iddist, idprov, iddep){
	
	cargarDep(idtagdep, ubigeos);

	if(typeof(iddep) != 'undefined'){
		$('#'+idtagdep).val(iddep);
	}

	cargarProv(idtagprov, ubigeos, $('#'+idtagdep).val());

	if(typeof(idprov) != 'undefined'){
		$('#'+idtagprov).val(idprov);
	}

	cargarDist(idtagdist, ubigeos, $('#'+idtagprov).val());

	if(typeof(iddist) != 'undefined'){
		$('#'+idtagdist).val(iddist);
	}
	
	$('#'+idtagdep).change(function(){
		cargarProv(idtagprov, ubigeos, $('#'+idtagdep).val());

		cargarDist(idtagdist, ubigeos, $('#'+idtagprov).val());
	});

	$('#'+idtagprov).change(function(){
		cargarDist(idtagdist, ubigeos, $('#'+idtagprov).val());
	});
}
/*--------------------------------FIN UBIGEO------------------------------------*/

/*--------------------------------SELECT!!------------------------------------*/

function cargarSelect(arreglo, idselect, attrvalue, attrdescripcion){
	var $select = $('#'+idselect);
	var result = '';
	
	$(arreglo).each(function(){
		if(typeof(this[attrvalue]) != 'undefined')
			result += '<option value="'+this[attrvalue]+'">'+this[attrdescripcion]+'</option>';		
	});
	$select.html(result);
}
/*------------------------------FECHAAAA------------------------------------------*/
function fechaAhora(){
	date = new Date();
	Fecha = paddate(date.getDate())+"/"+paddate((date.getMonth()+1))+"/"+date.getFullYear();
	return Fecha;
}

function toHTML(element){
	var div = $("<div>");
	div.append(element);
	return div.html();
}

/*-------------------------------- Crear Tabla ------------------------------------*/
function crearTablaToArray(Idtable,Head,HeadExt,Attr,AttrExt,Array){
	var table = $("<table id='"+Idtable+"'>");
	var thead = $("<thead>");
	var tbody = $("<tbody>");
	var trh = $("<tr>");
	if(Head != null){
		for (var i = 0 ; i< Head.length ; i++){
			trh.append("<td "+HeadExt[i]+" >"+Head[i]+"</td>");
		}
		thead.append(trh);
		table.append(thead);
	}
	
	$(Array).each(function(index){
		var trb = $("<tr>");
		for(var j = 0 ; j < Attr.length ; j++){
			trb.append("<td "+AttrExt[j]+" >"+this[Attr[j]]+"</td>");
		}
		tbody.append(trb);
	});
	table.append(tbody);
	return table;
}

/* Recuperar la hora y el dia */
function paddate(n){
	return n<10 ? '0'+n : n;
}

function getHourFormato(){
	date = new Date();
	Hora = (date.getUTCHours()-5)+':'
    + date.getUTCMinutes()+':'
    + date.getUTCSeconds();
	return Hora;
}
/*>>>>>>>>>>>>>>>>>>>>>>*/
function uploadFile(nameInput, url, path,nameFile,finishUpload){
	var file = new FileReader();
	var inputFile  = $("#"+nameInput);
	file = inputFile[0].files[0];
	uploadSend(file, url, path,nameFile,finishUpload);
	getExtFile(nameInput);
}

function uploadSend(file,url, path,nameFile,finishUpload) {
	var xhr = new XMLHttpRequest(),
    upload = xhr.upload;
	upload.addEventListener("progress", function (ev) {
	}, false);
	
	upload.addEventListener("load", function (ev) {
		finishUpload();
	}, false);
	upload.addEventListener("error", function (ev) {console.log(ev);}, false);
	xhr.open(
	    "POST",
	    url
	);
	xhr.setRequestHeader("Cache-Control", "no-cache");
	xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
	xhr.setRequestHeader("X-File-Name", nameFile);
	xhr.setRequestHeader("X-Path", path);
	xhr.send(file);
}

function getExtFile(nameinput) {
	var file = new FileReader();
	var inputFile  = $("#"+nameinput);
	file = inputFile[0].files[0];
    fic=file.name;
    fic = fic.split('\\');
    nom = fic[fic.length-1];
    ext = nom.substr(nom.indexOf('.'),nom.length).toLowerCase();
    return ext;
}
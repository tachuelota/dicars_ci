function DTActions(options)
{
	var divaction = $("<div class='actions'>");
	var divbubble = $("<div class='action-bubble'>");
	var divcontainer = $("<div class='action_container'>");
	var ul = $(getButtons(options.conf));

	divaction.append(divbubble);
	divbubble.append(divcontainer);
	divcontainer.html(ul);

	var count = ul.find("li").length;

	switch(count)
	{
		case 1:
			divcontainer.css("height","26px");
			divbubble.css("height","26px");
			break;
		case 2:
			divcontainer.css("height","54px");
			divbubble.css("height","54px");
			break;
		case 3:
			divcontainer.css("height","82px");
			divbubble.css("height","82px");
			break;
	}

	this.RowCBFunction = function( nRow, aData, iDisplayIndex )
	{
    	$(nRow).click( function(e)
    	{
    		e.preventDefault();
    		var tr = $(this);
    		var tabla = $(tr.closest('table'));
    		tabla.find('.btn-action').tooltip('hide');
			if ( tr.hasClass('row_selected') ) {
	            tr.removeClass('row_selected');
	            divaction.remove();	            
	            IdReservaSelected = null;
	        }
			else {
				divaction.show();
				var tds = $(this).find("td");
				$(tabla.dataTable().fnGetNodes()).removeClass('row_selected');
	            tr.addClass('row_selected');
	            $(tds[tds.length-1]).append(divaction);

				ul.find(".btn-view").click(function(e){
					e.preventDefault();
					options.ViewFunction(nRow, aData, iDisplayIndex);
					$(this).tooltip('hide');
				});
				ul.find(".btn-edit").click(function(e){
					e.preventDefault();
					options.EditFunction(nRow, aData, iDisplayIndex);					
					$(this).tooltip('hide');
				});
				ul.find(".btn-drop").click(function(e){
					e.preventDefault();
					options.DropFunction(nRow, aData, iDisplayIndex);					
					$(this).tooltip('hide');
				});
				tr.find('[data-rel="tooltip"]').tooltip({"placement":"bottom",delay: { show: 400, hide: 200 }});
        	}
		});
    };

}

function getButtons(conf){
	actions = "<ul>";
	if(conf.substring(0,1)==1)
	    actions += '<li><button class="btn btn-action btn-view" title="Ver" data-placement="top" data-rel="tooltip"><i class="icon-eye-open"></i></button></li>';
	if(conf.substring(1,2)==1)
	    actions += '<li><button class="btn btn-action btn-edit" title="Editar" data-placement="top" data-rel="tooltip"><i class="icon-edit"></i></button></li>';
	if(conf.substring(2,3)==1)
	    actions += '<li><button class="btn btn-action btn-drop" title="Deshabilitar" data-placement="top" data-rel="tooltip"><i class="icon-trash"></i></button></li>';
	actions += '<ul>';
	return actions;
}
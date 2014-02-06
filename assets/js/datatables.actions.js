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
			if ( tr.hasClass('row_selected') ) {
	            tr.removeClass('row_selected');
	            divaction.remove();	            
	            IdReservaSelected = null;
	        }
			else {
				divaction.show();
				var tds = $(this).find("td");
				$($("#"+options.idtable).dataTable().fnGetNodes()).removeClass('row_selected');
	            tr.addClass('row_selected');
	            $(tds[tds.length-1]).append(divaction);

				ul.find(".btn-view").click(function(e){
					e.preventDefault();
					options.ViewFunction(nRow, aData, iDisplayIndex);
				});
				ul.find(".btn-edit").click(function(e){
					e.preventDefault();
					options.EditFunction(nRow, aData, iDisplayIndex);
				});
				ul.find(".btn-drop").click(function(e){
					e.preventDefault();
					options.DropFunction(nRow, aData, iDisplayIndex);
				});
        	}
		});
    };

}

function getButtons(conf){
	actions = "<ul>";
	if(conf.substring(0,1)==1)
	    actions += '<li><button class="btn btn-action btn-view"><i class="icon-eye-open"></i></button></li>';
	if(conf.substring(1,2)==1)
	    actions += '<li><button class="btn btn-action btn-edit"><i class="icon-edit"></i></button></li>';
	if(conf.substring(2,3)==1)
	    actions += '<li><button class="btn btn-action btn-drop"><i class="icon-trash"></i></button></li>';
	actions += '<ul>';
	return actions;
}
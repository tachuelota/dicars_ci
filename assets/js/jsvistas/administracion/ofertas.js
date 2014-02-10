$(document).ready(function(){
	//mostrar Registrar Trabajador------------------------------------>
	$('.btn-registrar').click(function(e){
		e.preventDefault();
		$('#modalRegistro').modal('show');
	});
	//mostrar Editar Trabajador------------------------------------>
	$('.btn-editar').click(function(e){
		e.preventDefault();
		$('#modalRegistro').modal('show');
	});

	BuscarProductosURL= $("#select_producto_table").attr("data-source");
	BuscarProductosFormato = [
		              { "sWidth": "12%","mDataProp": "cProductoDesc"},
		              { "sWidth": "12%","mDataProp": "nProductoPContado"},
		              { "sWidth": "12%","mDataProp": "cProductoTalla"},
		              { "sWidth": "12%","mDataProp": "cMarcaDesc"},
		              { "sWidth": "12%","mDataProp": "cCategoriaNom"}
		              ];
	BuscarProductosTable = createDataTable('select_producto_table',BuscarProductosURL,BuscarProductosFormato,null,null);
	
});
	<noscript>
		<div class="alert alert-block span10">
			<h4 class="alert-heading">Warning!</h4>
			<p>
				Necesitas tener
				<a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
				habilitado para usar este sitio.
			</p>
		</div>
	</noscript>
	<div id="content" class="span10">
			<!-- content starts -->
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Home</a> <span class="divider">/</span>
					</li>
				</ul>
			</div>  
	</div><!--/#content.span10-->
	<!-------------REPORTEESSSS------------------>
	<div class="box span10">
		<div class="box-header well" data-original-title>
			<h2>REPORTE DE VENTAS</h2>
		</div>
	<div class="box-content">
		<ul class="nav nav-tabs" id="myTab">
			<li class="active"><a href="#tienda">Tienda</a></li>
			<li><a href="#zona">Zona</a></li>
		</ul>
	<div id="myTabContent" class="tab-content">
		<div class="tab-pane active" id="tienda">
			<h3>Ventas en Tienda</h3>
		<div class="row-fluid">
			<div class="span6">
			</div>
		<div class="span6">
			<input id="btn-rpt-tienda" type="button" value="Reporte" class="btn btn-success" style="float: right; margin: 10px 10px 0 0;"/>
		</div>
		</div>
		<div class="form-horizontal" id="RepVentasForm" method="post" action-1="<?php echo base_url();?>ventas/Servicios/reporte_ventas_bytienda">
			<fieldset>
				<div class="control-group">
					<label class="control-label">Del</label>
					<div class="controls">
						<input type="text" class="input-xlarge datepicker" id="date01" style="margin: 0 18px 0 0;">
						<label style="display:inline;">Al</label>
						<input type="text" class="input-xlarge datepicker" id="date02" style="margin: 0 18px;">
						<button id="buscarfecha" type="button" class="btn btn-info btn-buscarp" style="margin: 0 18px;"><i class="icon-search icon-white"></i>Buscar</button>
					</div>
				</div>
			</fieldset>
		</div>
		<hr>
		<table id="ventas_table" class="table table-striped table-bordered bootstrap-datatable datatable">
			<thead>
				<tr>
					<th>Fecha Registro</th>
					<th>Tienda</th>
					<th>Cliente</th>
					<th>Producto</th>
					<th>Serie</th>
					<th>Cant.</th>
					<th>Desct.</th>
					<th>Prec. Costo</th>
					<th>Prec. Contado</th>
					<th>Prec. Credito</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	<!--ZONA-->
	<div class="tab-pane" id="zona">
		<h3>Ventas en Zona</h3>
	<div class="row-fluid">
		<div class="span6">
		</div>
		<div class="span6">
			<input id="btn-rpt-zona" type="button" value="Reporte" class="btn btn-success" style="float: right; margin: 10px 10px 0 0;"/>
		</div>
	</div>
	<div class="form-horizontal" id="RepVentasZonasForm" method="post" action-1="<?php echo base_url();?>ventas/Servicios/reporte_ventas_byzona">
		<fieldset>
			<div class="control-group">
				<label class="control-label">Del</label>
				<div class="controls">
					<input type="text" class="input-xlarge datepicker" id="date01zona" style="margin: 0 18px 0 0;">
					<label style="display:inline;">Al</label>
					<input type="text" class="input-xlarge datepicker" id="date02zona" style="margin: 0 18px;">
					<button id="buscarfechazona" type="button" class="btn btn-info btn-buscarp" style="margin: 0 18px;"><i class="icon-search icon-white"></i>Buscar</button>
				</div>
			</div>
		</fieldset>
	</div>
	<hr>
		<table id="ventas_table_zona" class="table table-striped table-bordered bootstrap-datatable datatable">
			<thead>
				<tr>
					<th>Fecha Registro</th>
					<th>Tienda</th>
					<th>Cliente</th>
					<th>Producto</th>
					<th>Serie</th>
					<th>Cant.</th>
					<th>Desct.</th>
					<th>Prec. Costo</th>
					<th>Prec. Contado</th>
					<th>Prec. Credito</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
</div>
	<!--------------MODAL EXPORTAR------------------>
	<div class="modal hide fade" id="exportmodal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>EXPORTAR</h3>
		</div>
		<div class="modal-body">
			<form method="post" target="_blank" id="CreatePDFForm">
				<input type="hidden" name="title" id="title"/>
				<input type="hidden" name="table_venta" id="table_venta"/>
				<div class="sortable row-fluid ui-sortable">
					<a id="pdfbutton" data-rel="tooltip" class="well span3 top-block" style="width: 48%;" href="#" data-original-title="Exportar a PDF.">
					<span class="icon32 icon-color icon-pdf"></span>
					<div>PDF</div>
					</a>
					<a id="xlsutton" data-rel="tooltip" class="well span3 top-block" style="width: 48%;" href="#" data-original-title="Exportar a Excel.">
					<span class="icon32 icon-color icon-xls"></span>
					<div>Excel</div>
					</a>
				</div>
			</form>	
		</div>
	</div>
</div>
</div>

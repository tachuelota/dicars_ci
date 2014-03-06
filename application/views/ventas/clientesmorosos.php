
<div class="box span10">
<div class="box-header well" data-original-title>
	<h2>DEUDORES Y MOROSOS</h2>
</div>
<div class="row-fluid">
	<div class="span6">
	</div>
	<div class="span6">
		<input id="pdfgen" type="button" value="Reporte General" class="btn btn-success" style="float: right; margin: 10px 10px 0 0;"/>
		<input id="pdfdet" type="button" value="Reporte Detallado" class="btn btn-success" style="float: right; margin: 10px;"/>
	</div>
</div>
<div class="box-content">
	<table id="deudores_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>ventas/Servicios/get_clientemorosos">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombres y Apellidos</th>
				<th>DNI</th>
				<th>Zona</th>
				<th>Dirección</th>
				<th>Total Crédito S/.</th>
				<th>Total Pago Realizado S/.</th>
				<th>Saldo S/.</th>
				<th>Estado</th>
				<th>Responsable</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
	<!-----MODAL EXPORTAR------>
	<div class="modal hide fade" id="exportmodal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>EXPORTAR</h3>
		</div>
	<div class="modal-body">
			<form method="post" target="_blank" id="CreatePDFForm">
					<input type="hidden" name="nombrearchivo" id="nombrearchivo"/>
					<input type="hidden" name="title" id="title"/>
					<input type="hidden" name="table_clientes" id="table_clientes"/>
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
</div><!--/span-->

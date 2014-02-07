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
				<a href="<?php echo base_url();?>">Home</a> <span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo base_url();?>logistica/">Logística</a> <span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo base_url();?>logistica/views/cons_salidaproductos/">Salida de Productos</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>SALIDA DE PRODUCTOS: VER DATOS</h2>
			</div>
			<div class="row-fluid">
				<div class="span6"></div>
				<div class="span6">
					<input id="pdfgen" type="button" value="Reporte" class="btn btn-success" style="float: right; margin: 10px 10px 0 0;"/>
				</div>
			</div>
			<div class="box-content">
				<div id="RegistrarSalidaForm" class="form-horizontal" method="post">
					<fieldset>
						<div class="row-fluid">
							<div class="span6">
								<div class="control-group">
									<label class="control-label" for="codigo">N° Sal. Productos</label>
									<div class="controls">
										<span class="help-inline" style="margin-top:5px;">000001</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="registrador">Registrador</label>
									<div class="controls">
										<span class="help-inline" style="margin-top:5px;">Diego Molina</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="motivo">Motivo</label>
									<div class="controls">
										<span class="help-inline" style="margin-top:5px;">Traslado</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="tienda">Tienda</label>
									<div class="controls">
										<span class="help-inline" style="margin-top:5px;">Local 1</span>
									</div>
								</div>
							</div>
							<div class="span6">
								<div class="control-group">
									<label class="control-label" for="fecha">Fecha</label>
									<div class="controls">
										<span class="help-inline" style="margin-top:5px;">01/02/2013</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="solicitante">Solicitante</label>
									<div class="controls">
										<span class="help-inline" style="margin-top:5px;">Arturo Méndez</span>
									</div>
								</div>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="observaciones">Observaciones</label>
							<div class="controls">
								<span class="help-inline" style="margin-top:5px;">Para Local 2.</span>
							</div>
						</div>
					</fieldset>
				</div>
				<hr>
				<h3>Detalle Salida Productos</h3>
				<hr>
				<table id="salida_productos_table" name="salida_productos_table" class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Producto</th>
							<th>Cantidad</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Producto 2</td>
							<td>300</td>
						</tr>
					</tbody>
				</table>
				<div class="form-actions">
					<a href="logistica_cons_salidaproductos.html" class="btn btn-success"> <i class="icon icon-white icon-arrowthick-w"></i>
						Volver
					</a>
				</div>
			</div>
			<div class="modal hide fade" id="exportmodal">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h3>EXPORTAR</h3>
				</div>
				<div class="modal-body">
					<form method="post" target="_blank" id="CreatePDFForm">
						<input type="hidden" name="nombrearchivo" id="nombrearchivo"/>
						<input type="hidden" name="title" id="title"/>
						<input type="hidden" name="table_resumen" id="table_resumen"/>
						<input type="hidden" name="table_producto" id="table_producto"/>
						<input type="hidden" name="table_total" id="table_total"/>
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
	<!-- content ends -->
</div>
<!--/#content.span10-->
</div>
<!--/fluid-row-->
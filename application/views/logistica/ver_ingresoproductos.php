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
				<a href="<?php echo base_url();?>logistica/views/cons_ingresoproductos/">Ingreso de Productos</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>INGRESO DE PRODUCTOS: VER DATOS</h2>
			</div>
			<div class="box-content">
				<div id="RegistrarIngresoForm" class="form-horizontal">
					<fieldset>
						<div class="row-fluid">
							<div class="span6">
								<div class="control-group">
									<label class="control-label" for="codigo">Número Ingreso</label>
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
										<span class="help-inline" style="margin-top:5px;">Devolución</span>
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
									<label class="control-label" for="solicitante">Número Documento</label>
									<div class="controls">
										<span class="help-inline" style="margin-top:5px;">100 - 00001</span>
									</div>
								</div>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="observaciones">Observaciones</label>
							<div class="controls">
								<span class="help-inline" style="margin-top:5px;">...</span>
							</div>
						</div>
					</fieldset>
				</div>
				<hr>
				<h3>Detalle</h3>
				<hr>
				<table id="deting_productos_table" name="deting_productos_table" class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Serie Producto</th>
							<th>Cantidad</th>
							<th>Precio Unit</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>000001</td>
							<td>2</td>
							<td>20</td>
							<td>40</td>
						</tr>
					</tbody>
				</table>
				<div class="form-actions">
					<a href="logistica_cons_ingresoproductos.html" class="btn btn-success"> <i class="icon icon-white icon-arrowthick-w"></i>
						Volver
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- content ends -->
</div>
<!--/#content.span10-->
</div>
<!--/fluid-row-->
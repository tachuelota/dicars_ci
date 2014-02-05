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
				<a href="index.html">Home</a>
				<span class="divider">/</span>
			</li>
			<li>
				<a href="logistica_homepage.html">Logística</a>
				<span class="divider">/</span>
			</li>
			<li>
				<a href="logistica_orden_compra_consultar.html">Orden de Compra</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>ORDEN DE COMPRA: VER DATOS</h2>
			</div>
			<div class="row-fluid">
				<div class="span6"></div>
				<div class="span6">
					<input id="pdfgen" type="button" value="Reporte" class="btn btn-success" style="float: right; margin: 10px 10px 0 0;"/>
				</div>
			</div>
			<div class="box-content">
				<div class="form-horizontal">
					<fieldset>
						<div class="row-fluid">
							<div class="span6">
								<div class="control-group">
									<label class="control-label" for="fec_reg">Fecha de Registro</label>
									<div class="controls">
										<span class="help-inline" style="margin-top:5px;">01/01/2013</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="codigo">N° Orden Compra</label>
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
									<label class="control-label" for="proveedor">Proveedor</label>
									<div class="controls">
										<span class="help-inline" style="margin-top:5px;">Proveedor 1</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="observaciones">Observaciones</label>
									<div class="controls">
										<span class="help-inline" style="margin-top:5px;">.</span>
									</div>
								</div>
							</div>
							<div class="span6">
								<div class="control-group">
									<label class="control-label" for="subtotal">Subtotal</label>
									<div class="controls">
										<span class="help-inline" style="margin-top:5px;">S/. 1620</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="igv">IGV</label>
									<div class="controls">
										<span class="help-inline" style="margin-top:5px;">18 %</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="descuento">Descuento</label>
									<div class="controls">
										<span class="help-inline" style="margin-top:5px;">0 %</span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="total">Total</label>
									<div class="controls">
										<span class="help-inline" style="margin-top:5px;">S/. 1000</span>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
				<hr>
				<h3>Detalle Orden de Compra</h3>
				<hr>
				<table id="productos_table" class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Prec. Unitario S/.</th>
							<th>Importe S/.</th>
							<th>Orden de Pedido</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Producto 1</td>
							<td>50</td>
							<td>20</td>
							<td>1000</td>
							<td>000001</td>
						</tr>
					</tbody>
				</table>
				<div class="form-actions">
					<a href="logistica_orden_compra_consultar.html" class="btn btn-success"> <i class="icon icon-white icon-arrowthick-w"></i>
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
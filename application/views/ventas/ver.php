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
					<li>
						<a href="ventas_homepage.html">Ventas</a><span class="divider">/</span>
					</li>
					<li>
						<a href="#">Ver</a>
					</li>
				</ul>
			</div>  
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>VENTAS: VER DATOS</h2>
					</div>
					<div class="box-content">
						<div class="form-horizontal">
							<fieldset>
								<div id="resumen_venta">
								<table class="table table-bordered">
									<tr>
										<td style="width: 25%;"><strong>Cliente</strong></td>
										<td colspan="3" style="width: 75%;">José Pérez</td>
									</tr>
									<tr>
										<td style="width: 25%;"><strong>Dirección</strong></td>
										<td style="width: 25%;">Mi Casa 123</td>
										<td style="width: 25%;"><strong>Fec. Emisión</strong></td>
										<td style="width: 25%;">01/01/2013</td>
									</tr>
									<tr>
										<td><strong>Vendedor</strong></td>
										<td>Diego Molina</td>
										<td><strong>Tipo de Pago</strong></td>
										<td>Contado</td>
									</tr>
								</table>
								<table id="productos_table" class="table table-striped table-bordered bootstrap-datatable datatable">
									<thead>
										  <tr>
											  <th>Código</th>
											  <th>Producto</th>
											  <th>Cantidad</th>
											  <th>Importe</th>
										  </tr>
									</thead>   
									<tbody>
										<tr>
											<th>0000001</th>
										  	<th>Botella de Agua</th>
										  	<th>12</th>
										  	<th>120</th>
									  	</tr>
									</tbody>
								</table>
								<div class="row-fluid">
									<div class="span6">
									</div>
									<div class="span6">
										<table class="table table-bordered">
											<tr>
												<td style="width: 50%;"><strong>Subtotal</strong></td>
												<td style="width: 50%;">s/. 98.4/td>
											</tr>
											<tr>
												<td><strong>Descuento</strong></td>
												<td>0 %</td>
											</tr>
											<tr>
												<td><strong>IGV</strong></td>
												<td>18 %</td>
											</tr>
											<tr>
												<td><strong>Total</strong></td>
												<td>120</td>
											</tr>
										</table>
										<!-- div class="control-group">
											<label class="control-label" for="acuenta">A cuenta</label>
											<div class="controls">
												<span class="help-inline" style="margin-top:5px;">s/. {{ amortizado }}</span>
											</div>
										</div -->
									</div>
								</div>
								</div>
							</fieldset>
						</div>
						<div class="form-actions">
							<a href="ventas_consultar.html" class="btn btn-success"><i class="icon icon-white icon-arrowthick-w"></i> Volver</a>
							<a href="#" id="imprimir" class="btn btn-success" style="float: right;"><i class="icon icon-white icon-print"></i> Imprimir</a>
						</div>
					</div>
				</div>
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
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
						<a href="#">Editar</a>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>VENTAS: EDITAR DATOS</h2>
					</div>
					<div class="box-content">
						<div class="form-horizontal">
							<fieldset>
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
												<td style="width: 50%;">S/. 98.4</td>
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
												<td>S/. 120</td>
											</tr>
										</table>
									</div>
									<div class="row-fluid">
										<div class="span6">
											<form id="PagarForm" method="post" action='{{ path ("dicars_ventas_editarr_venta") }}'>
											<input type="hidden" name="venta_id" value="{{ id }}">
											<input type="hidden" name ="pagofinal" id="pagofinal" val="0">
											<input type="hidden" name ="numero_salida" id="numero_salida">
											<input type="hidden" name ="serie_salida" id="serie_salida">
												<div id="saldo_block" >
													<div class="control-group">
														<label class="control-label" for="amortizacion">Monto a Pagar</label>
														<div class="controls">
															<div class="input-prepend input-append">
																<input class="input-xlarge focused" style="margin: 0 0px 0 0;" name="amortizacion" id="amortizacion" type="number" step="0.01" value="0" min="0"><span id="spanamort" class="add-on">S/.</span>
															</div>
															<button id="pagar" class="btn btn-warning btn-buscarc" style="margin: 0 18px;"><i class='icon-pago'></i> Pagar</button>
														</div>
													</div>
												</div>
											</form>
										</div>
										<div class="span6">
											<div id="resume-credito">
												<table class="table table-striped table-bordered">
													<tr>
														<td style="width: 50%;"><strong>A cuenta</strong></td>
														<td id="amortizacion" style="width: 50%;">S/. 100</td>
													</tr>
													<tr>
														<td><strong>Saldo</strong></td>
														<td id="saldo">S/. 20</td>
													</tr>
												</table>
											</div>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
							<div class="modal hide fade" id="PagarModal">
								<div class="modal-header">
									<h3>Atención</h3>
								</div>
								<div class="modal-body">
									<p id="mensaje_pago"></p>
								</div>
								<div class="modal-footer">
									<a href="#" class="btn" id="btn_enviar" data-dismiss="modal">Aceptar</a>
								</div>
							</div>
						<div class="form-actions">
							<a href="ventas_consultar.html" class="btn btn-success"><i class="icon icon-white icon-arrowthick-w"></i> Volver</a>
						</div>
					</div>
				</div>
			</div>
					<!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
				
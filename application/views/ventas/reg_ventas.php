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
						<a href="<?php echo base_url();?>ventas">Ventas</a><span class="divider">/</span>
					</li>
					<li>
						<a href="<?php echo base_url();?>ventas/views/registrar_ventas">Venta de Productos</a>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid">		
				<div class="box span12" id="contenedor">
					<div id="wrapper">
			            <div id="steps">
			                <fieldset class="step" id="step1">                	
								<div class="box-header well" data-original-title>
									<h2>VENTA</h2>
								</div>
								<div class="box-content">
									<form id="AgregarProductoForm" class="form-horizontal">
										<div class="control-group">
											<label class="control-label" for="producto">Producto</label>
											<div class="controls">
												<input class="input focused" id="producto" type="text" readonly required>
											  	<button type="button" class="btn btn-info btn-buscarp" style="margin: 0 18px;"><i class="icon-search icon-white"></i></button>
												<label style="display:inline;" for="modpcontado">P. Contado</label>
												<input id="modpcontado" type="number" style="margin: 0 18px 0 0;" step="0.01" min="1" required>
												<label style="display:inline;" for="modpcredito">P. Credito</label>
												<input id="modpcredito" type="number" style="margin: 0 18px 0 0;" step="0.01" min="1" required>
												<label style="display:inline;" for="cantidad">Cantidad</label>
												<input id="cantidad" type="number" style="margin: 0 18px 0 0;" min="1" required>
												<button id="agregar_producto" type="submit" class="btn btn-primary"><i class="icon-plus icon-white"></i>Agregar</button>
											</div>
										</div>
									</form>
									<hr>
									<h4>Productos Agregados</h4>
									<hr>
										<table id="select_productos_venta" class="table table-striped table-bordered bootstrap-datatable datatable">
											<thead>
											  	<tr>
												  	<th>Código</th>
												  	<th>Descripción</th>
											  		<th>Cantidad</th>
											  		<th>Prec. Contado</th>
											  		<th>Prec. Credito</th>
												  	<th>Acciones</th>
												</tr>
										  	</thead>   
										  	<tbody>
												
											</tbody>
										</table>
										<table class="table table-striped table-bordered bootstrap-datatable datatable"> 
											<thead>
											  	<tr>
											  		<th colspan='3'></th>
												  	<th>Prec. Contado</th>
											  		<th>Prec. Credito</th>
												</tr>
										  	</thead>  
										  	<tbody>
										  	<tr>
										  		<td colspan='3'>Total</td>
										  		<td id='total_contado'>0</td>
										  		<td id='total_credito'>0</td>
										  	</tr>					
											</tbody>
										</table>
						                <a class="btn btn-success" to_position='2' id='to_detalle' href="#" style="float: right; margin-bottom: 10px;">Siguiente <i class="icon icon-white icon-arrowthick-e"></i></a>
								</div>
						</fieldset>
			            <fieldset class="step" id="step2" style="display:none;">
						<div class="box-header well" data-original-title>
							<h2>DATOS DE PAGO</h2>
						</div>
						<div class="box-content">
						<form id="EnviarVentaForm" class="form-horizontal" method="post" action="{{ path("dicars_ventas_registrar_venta") }}">
							<input type="hidden" name="serie_salida" id="serie_salida">
							<input type="hidden" name="numero_salida" id="numero_salida">
							<fieldset>
								<div class="row-fluid">
									<div class="span6">
										<div class="control-group">
											<label class="control-label" for="cliente">Cliente</label>
											<div class="controls">
												<input class="input-xlarge focused" id="cliente" name="cliente" type="text" readonly required>
												<input type="hidden" id="cliente_id" name="cliente_id">
											  	<button type="button" class="btn btn-info btn-buscarc" style="margin: 0 18px;"><i class="icon-search icon-white"></i></button>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="forma_pago">Tipo de Pago</label>
											<div class="controls">
												<select style="margin: 0 18px 0 0;" class="input-xlarge focused" name="forma_pago" id="forma_pago" >
													<option value="1">Contado</option>
													<option value="2">Crédito</option>
													<option value="3">Separar</option>
												</select>
											</div>
										</div>   
										<div class="control-group">
											<label class="control-label" for="tipo_moneda">Tipo moneda</label>
											<div class="controls">
											  	<select style="margin: 0 18px 0 0;" class="input-xlarge focused" name="tipo_moneda" id="tipo_moneda">
											  		<option value="1">Soles</option>
											  		<option value="1">Dólares</option>
											  	</select>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="descuento">Venta Descuento</label>
											<div class="controls">
												<div class="input-prepend input-append">
													<input class="input-xlarge focused " name="descuento" id="descuento" type="number" min="0" max="100" value="0" required><span id="spandesc" class="add-on">%</span>
												</div>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="subtotal">Subtotal</label>
											<div class="controls">
												<input class="input-xlarge focused" style="margin: 0 18px 0 0;" name="subtotal" id="subtotal" type="text" readonly>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="tipo_igv">IGV</label>
											<div class="controls">
												<div class="input-prepend input-append">
													<select style="margin: 0 0px 0 0;" class="input-xlarge focused" name="tipo_igv" id="tipo_igv">
														<option value="1">18%</option>
													</select><span id="spanigv" class="add-on">%</span>
											  	</div>
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="total">Total</label>
											<div class="controls">
												<input class="input-xlarge focused" style="margin: 0 18px 0 0;" name="total" id="total" type="text" readonly>
											</div>
										</div>		
									</div>
									<div class="span6">
										<div id="saldo_block" >
											<div class="control-group">
												<label class="control-label" for="amortizacion">A cuenta</label>
												<div class="controls">
													<div class="input-prepend input-append">
														<input class="input-xlarge focused" style="margin: 0 0px 0 0;" name="amortizacion" id="amortizacion" type="number" step="0.01" value="0" min="0"><span id="spanamort" class="add-on"></span>
													</div>
												</div>
											</div>
																		
											<div class="control-group">
												<label class="control-label" for="saldo">Saldo restante</label>
												<div class="controls">
													<input class="input-xlarge focused" name="saldo" id="saldo" type="text" readonly>
												</div>
											</div>
										</div>
										<div id="cuotas_block" >
											<div class="control-group">
												<label class="control-label" for="num_cuotas">N° Cuotas</label>
												<div class="controls">
													<div class="input-prepend input-append">
														<input class="input-xlarge focused " name="num_cuotas" id="num_cuotas" type="number" min="1" value="1" required><span id="spancouota" class="add-on">x 0.00 S/.</span>
													</div>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="prim_cuota">Fecha 1° Cuota</label>
												<div class="controls">
												  <input type="text" placeholder="dd/mm/aaaa" pattern="|^\d{2}/\d{2}/\d{4}$|" maxlength="10" title="Debe ingresar un formato de fecha correcto" class="input-xlarge datepicker" id="prim_cuota" name="prim_cuota">
												</div>
											</div>
										</div>
										<div id="pagocont_block">
											<div class="control-group">
												<label class="control-label" for="importe">Importe</label>
												<div class="controls">
													<input id="importe" name="importe" type="number" value="0" step="0.01">
													<span id="importe_help" style="color: red;" class="help-inline">El Importe debe ser mayor que el Total</span>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="vuelto">Vuelto</label>
												<div class="controls">
													<input name="vuelto" id="vuelto" type="text" readonly>
												</div>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="producto">Observación</label>
											<div class="controls">
												<textarea class="input-xlarge" name="observacion" rows="2" cols="" value=""></textarea>
											</div>
										</div>
									</div>
								</div>
								<div>
				                	<a class="btn btn-success" to_position='1' id='to_select_productos' href="#"><i class="icon icon-white icon-arrowthick-w"></i> Atrás</a>
				                	<input type="hidden" name="montocuota" id="montocuota">
									<button class="btn btn-success" type="submit" style="float: right;">Siguiente <i class="icon icon-white icon-arrowthick-e"></i></button>
								</div>
							</fieldset>
						</form>
						</div><!--/span-->
						</fieldset>
			                <fieldset class="step" id="step3" style="display:none;">
			               		<div class="box-header well" data-original-title>
									<h2>RESUMEN DE LA VENTA</h2>
								</div>
								<div class="box-content">
								<div class="form-horizontal">
									<fieldset>
										<div id="resumen_venta">
										<table class="table table-bordered">
											<tr>
												<td style="width: 25%;"><strong>Cliente</strong></td>
												<td id="clienteR" colspan="3" style="width: 75%;"></td>
											</tr>
											<tr>
												<td style="width: 25%;"><strong>Dirección</strong></td>
												<td id="direccionR" style="width: 25%;"></td>
												<td style="width: 25%;"><strong>Fec. Emisión</strong></td>
												<td id="fechaR" style="width: 25%;"></td>
											</tr>
											<tr>
												<td><strong>Vendedor</strong></td>
												<td id="vendedorR"></td>
												<td><strong>Tipo de Pago</strong></td>
												<td id="forma_pagoR"></td>
											</tr>
										</table>
										<!-- TABLA DE PRODUCTOS POR COMPRAR aqui -->
										<table id="tabla_resumen_productos" class="table table-striped table-bordered">
											<thead >
												  <tr>
													  <th style="width: 25%;">Código</th>
													  <th style="width: 25%;">Producto</th>
													  <th style="width: 25%;">Cantidad</th>
													  <th style="width: 25%;">Valor ó Precio</th>
												  </tr>
											</thead>
										</table>
										<!-- END TABLA DE PRODUCTOS -->
										<div class="row-fluid">
											<div class="span6">
											</div>
											<div class="span6">
												<table class="table table-bordered">
													<tr>
														<td style="width: 50%;"><strong>Subtotal</strong></td>
														<td id="subtotalR" style="width: 50%;"></td>
													</tr>
													<tr>
														<td><strong>Descuento</strong></td>
														<td id="descuentoR"></td>
													</tr>
													<tr>
														<td><strong>IGV</strong></td>
														<td id="tipo_igvR"></td>
													</tr>
													<tr>
														<td><strong>Total (S/.)</strong></td>
														<td id="totalR"></td>
													</tr>
													<tr id="resumen_dolares">
														<td><strong>Total ($.)</strong></td>
														<td id="totalDo"></td>
													</tr>
												</table>
												<br>
												<div id="resume-credito">
												<table class="table table-striped table-bordered">
													<tr>
														<td style="width: 50%;"><strong>A cuenta</strong></td>
														<td id="amortizacionR" style="width: 50%;"></td>
													</tr>
													<tr>
														<td><strong>Saldo</strong></td>
														<td id="saldoR"></td>
													</tr>
												</table>
												</div>
												<!-- div class="control-group">
													<label class="control-label">Importe</label>
													<div class="controls">
														<span class="help-inline" style="margin-top:5px;" id="importeR"></span>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Vuelto</label>
													<div class="controls">
														<span class="help-inline" style="margin-top:5px;" id="vueltoR"></span>
													</div>
												</div -->
											</div>
											<!-- div class="span6">
												<div class="control-group">
													<label class="control-label">Tipo moneda</label>
													<div class="controls">
													<span class="help-inline" style="margin-top:5px;" id="tipo_monedaR"></span>
													</div>
												</div>
												<div id="cuotas_block" class="control-group" style="display:none">
													<label class="control-label">N° Cuotas</label>
													<div class="controls">
														<div class="input-prepend input-append">
																<input class="input-xlarge focused " id="num_cuotasR"><span class="add-on">x 0.00 S/.</span>
														</div>
													</div>
												</div>
											</div -->
										</div>
										</div>
							            <div>
						                	<a to_position='2' id='back_to_detalle' href="#" class="btn btn-success"><i class="icon icon-white icon-arrowthick-w"></i> Atrás</a>
						                    <a href="#" id="finalizar_venta" class="btn btn-primary" style="float: right;"><i class="icon icon-white icon-cart"></i> Finalizar</a>
						                </div>
						        	</fieldset>
								</div>
								</div><!--/span-->
			                </fieldset>
			            </div>
			        </div>
			        <!-- Modal para buscar productos -->
			        
					<div class="modal hide fade" id="modalBuscarProducto" style="width:600px;">
						<div class="modal-header">
							<h3>Productos</h3>
						</div>
						<div class="modal-body">
							<table id="select_producto_table" class="table table-striped table-bordered bootstrap-datatable datatable">
							  <thead>
								  <tr>
									  <th>Código</th>
									  <th>Descripción</th>
									  <th>Stock</th>
									  <th>Precio Contado</th>
									  <th>Precio Credito</th>
									  <th>Descuento</th>
								  </tr>
							  </thead>   
							  <tbody>
									<tr>
									  	<th>00000001</th>
									  	<th>Botella de Agua</th>
									  	<th>130</th>
									  	<th>1</th>
									  	<th>1.3</th>
										<th>0</th>
								  	</tr>
							  </tbody>
						  </table>
						</div>
						<div class="modal-footer">
							<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
							<a  id="select_producto" href="#" class="btn btn-primary">Seleccionar</a>
						</div>
					</div>
					<!-- Fin Modal para buscar productos -->
					<div class="modal hide fade" id="modalBuscarCliente">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">x</button>
							<h3>Clientes</h3>
						</div>
						<div class="modal-body">
							<table id="select_cliente_table" class="table table-striped table-bordered bootstrap-datatable datatable">
							  <thead>
								  <tr>
									  <th>Nombres</th>
									  <th>Apellidos</th>
									  <th>DNI</th>
									  <th>Línea de Crédito</th>
								  </tr>
							  </thead>   
							  <tbody>	
							  		<tr>
									  	<th>José</th>
									  	<th>Pérez</th>
									  	<th>12345678</th>
									  	<th>1000</th>
								  	</tr>		
							  </tbody>
						  </table> 
						</div>
						<div class="modal-footer">
							<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
							<a id="btn-select-cliente" href="#" class="btn btn-primary">Seleccionar</a>
						</div>
					</div> 
					<div class="modal hide fade" id="rquiredproducts">
						<div class="modal-header">
							<h3>Atención</h3>
						</div>
						<div class="modal-body">
							<div class="alert alert-error">
							<p><i class="icon icon-alert icon-red"></i> Necesita agregar productos</p>
							</div>
							
						</div>
						<div class="modal-footer">
							<a href="#" class="btn" data-dismiss="modal">Aceptar</a>
						</div>
					</div>
					<div class="modal hide fade" id="vercronograma">
						<div class="modal-header">
							<h3>¿Desea exportar el Cronograma?</h3>
						</div>
						<div class="modal-body">
							<form method="post" target="_blank" id="CreatePDFForm">
								<input type="hidden" name="tcronograma" id="tcronograma"/>
								<input type="hidden" name="tdetalle" id="tdetalle"/>
								<input type="hidden" name="tresumen" id="tresumen"/>
								<div class="row-fluid ui-sortable">
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
						<div class="modal-footer">
							<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
						</div>
					</div>
				</div><!--/row-->
			</div>
			<div id="loadingDiv" style="display:none">
				<p>Registrando...</p>
			    <p><img src="img/ajax-loaders/ajax-loader-7.gif"></p>
			</div>
					<!-- content ends -->
			</div><!--/#content.span10-->
		</div><!--/fluid-row-->
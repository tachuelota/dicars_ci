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
				<a href="<?php echo base_url();?>">Home</a>
				<span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo base_url();?>ventas">Ventas</a>
				<span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo base_url();?>ventas/views/registrar_ventas">Venta de Productos</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid">
		<div class="box span12" id="contenedor">
			<div class="box-header well" data-original-title>
				<h2>VENTA DE PRODUCTOS</h2>
			</div>
			<div class="box-content">
				<div id="rootwizard">
					<div class="box-content">
						<ul class="nav nav-tabs">
							<li>
								<a href="#tab1" data-toggle="tab">PRODUCTOS</a>
							</li>
							<li>
								<a href="#tab2" data-toggle="tab">DETALLE</a>
							</li>
							<li>
								<a href="#tab3" data-toggle="tab">RESUMEN</a>
							</li>
						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane" id="tab1">
							<div class="form-horizontal">
								<div class="control-group">
									<label class="control-label" for="producto">Producto</label>
									<div class="controls">
										<input class="input focused" id="producto" type="text" readonly>
										<button type="button" class="btn btn-info btn-buscarp" style="margin: 0 18px;"> <i class="icon-search icon-white"></i>
										</button>
										<label style="display:inline;" for="modpcontado">P. Contado</label>
										<input id="modpcontado" type="text" style="margin: 0 18px 0 0;width: 50px;">
										<label style="display:inline;" for="modpcredito">P. Credito</label>
										<input id="modpcredito" type="text" style="margin: 0 18px 0 0;width: 50px;">
										<label style="display:inline;" for="cantidad">Cantidad</label>
										<input id="cantidad" type="text" style="margin: 0 18px 0 0;width: 50px;">
										<button id="agregar_producto" type="submit" class="btn btn-info"> <i class="icon-plus icon-white"></i>
											Agregar
										</button>
									</div>
								</div>
							</div>
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
									</tr>
								</thead>
								<tbody></tbody>
								<tfoot>
									<tr>
										<td colspan='3'>Total</td>
										<td id='total_contado'>0</td>
										<td id='total_credito'>0</td>
									</tr>
								</tfoot>
							</table>
						</div>
					<div class="tab-pane" id="tab2">
						<form id="EnviarVentaForm" class="form-horizontal" action-1="<?php echo base_url();?>ventas/ventas/registrar">
							<fieldset>
								<div class="row-fluid">
									<div class="span6">
										<div class="control-group">
											<label class="control-label" for="cliente">Cliente</label>
											<div class="controls">
												<input class="input focused" id="cliente" type="text" readonly value="<?php echo $clianonimo["cClienteNom"]." ".$clianonimo["cClienteApe"] ?>" required>
												<input type="hidden" id="cliente_id" name="cliente_id" value="<?php echo $clianonimo["nCliente_id"] ?>">
												<button type="button" class="btn btn-info btn-buscarc" style="margin: 0 18px;">
													<i class="icon-search icon-white"></i>
												</button>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="forma_pago">Tipo de Pago</label>
											<div class="controls">
												<select style="margin: 0 18px 0 0;" class="input focused SelectAjax" name="forma_pago" id="forma_pago" data-source="<?php echo base_url();?>administracion/servicios/getConstantesByClase/2" attrval="cConstanteValor" attrdesc="cConstanteDesc">
												</select>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="tipo_moneda">Tipo moneda</label>
											<div class="controls">
												<select style="margin: 0 18px 0 0;" class="input focused" name="tipo_moneda" id="tipo_moneda" data-source="<?php echo base_url();?>administracion/servicios/getTipoMonedas" attrval="nTipoMoneda" attrdesc="cTipoMonedaDesc">
												</select>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="descuento">Venta Descuento</label>
											<div class="controls">
												<div class="input-prepend input-append">
													<input class="input focused validate[required,custom[number],min[0],max[100]]" name="descuento" id="descuento" type="text" value="0">
													<span id="spandesc" class="add-on">%</span>
												</div>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="subtotal">Subtotal</label>
											<div class="controls">
												<input class="input focused" style="margin: 0 18px 0 0;" name="subtotal" id="subtotal" type="text" readonly></div>
										</div>

										<div class="control-group">
											<label class="control-label" for="tipo_igv">IGV</label>
											<div class="controls">
												<div class="input-prepend input-append">
													<select style="margin: 0 0px 0 0;" class="input focused" name="tipo_igv" id="tipo_igv" data-source="<?php echo base_url();?>administracion/servicios/getTipoIGVActivo" attrval="nTipoIGV" attrdesc="cTipoIGV">
													</select>
													<span id="spanigv" class="add-on">%</span>
												</div>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="total">Total</label>
											<div class="controls">
												<input class="input focused" style="margin: 0 18px 0 0;" name="total" id="total" type="text" readonly></div>
										</div>
									</div>
									<div class="span6">
										<div id="saldo_block" >
											<div class="control-group">
												<label class="control-label" for="amortizacion">A cuenta</label>
												<div class="controls">
													<div class="input-prepend input-append">
														<input class="input focused validate[required,custom[number],min[0]]" style="margin: 0 0px 0 0;" name="amortizacion" id="amortizacion" type="text" val="0">
														<span id="spanamort" class="add-on"></span>
													</div>
												</div>
											</div>

											<div class="control-group">
												<label class="control-label" for="saldo">Saldo restante</label>
												<div class="controls">
													<input class="input focused" name="saldo" id="saldo" type="text" readonly></div>
											</div>
										</div>
										<div id="cuotas_block" >
											<div class="control-group">
												<label class="control-label" for="num_cuotas">N° Cuotas</label>
												<div class="controls">
													<div class="input-prepend input-append">
														<input type="hidden" name="montocuota" id="montocuota">
														<input class="input focused validate[required,custom[integer],min[0]]" name="num_cuotas" id="num_cuotas" type="text">
														<span id="spancouota" class="add-on">x 0.00 S/.</span>
													</div>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="prim_cuota">Fecha 1° Cuota</label>
												<div class="controls">
													<input type="text" placeholder="dd/mm/aaaa" class="input datepicker validate[required,custom[date]]" id="prim_cuota" name="prim_cuota"></div>
											</div>
										</div>
										<div id="pagocont_block">
											<div class="control-group">
												<label class="control-label" for="importe">Importe</label>
												<div class="controls">
													<input id="importe" name="importe" type="text" class="validate[required,custom[number],min[0]]">
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="vuelto">Vuelto</label>
												<div class="controls">
													<input id="vuelto" type="text" readonly></div>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="producto">Observación</label>
											<div class="controls">
												<textarea class="input" name="observacion" rows="2" cols="" value=""></textarea>
											</div>
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="tab-pane" id="tab3">
						<div class="form-horizontal">
							<div id="resumen_venta">
								<table class="table table-bordered">
									<tr>
										<td style="width: 25%;"> <strong>Cliente</strong>
										</td>
										<td id="clienteR" colspan="3" style="width: 75%;"></td>
									</tr>
									<tr>
										<td style="width: 25%;"> <strong>Dirección</strong>
										</td>
										<td id="direccionR" style="width: 25%;"></td>
										<td style="width: 25%;">
											<strong>Fec. Emisión</strong>
										</td>
										<td id="fechaR" style="width: 25%;"><?php echo date("d/m/Y"); ?></td>
									</tr>
									<tr>
										<td>
											<strong>Vendedor</strong>
										</td>
										<td id="vendedorR"><?php echo $trabajador["cPersonalNom"]."-".$trabajador["cPersonalApe"];?></td>
										<td>
											<strong>Tipo de Pago</strong>
										</td>
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
									<div class="span6"></div>
									<div class="span6">
										<table class="table table-bordered">
											<tr>
												<td style="width: 50%;">
													<strong>Subtotal</strong>
												</td>
												<td id="subtotalR" style="width: 50%;"></td>
											</tr>
											<tr>
												<td>
													<strong>Descuento</strong>
												</td>
												<td id="descuentoR"></td>
											</tr>
											<tr>
												<td>
													<strong>IGV</strong>
												</td>
												<td id="tipo_igvR"></td>
											</tr>
											<tr>
												<td>
													<strong>Total (S/.)</strong>
												</td>
												<td id="totalR"></td>
											</tr>
											<tr id="resumen_dolares">
												<td>
													<strong>Total ($.)</strong>
												</td>
												<td id="totalDo"></td>
											</tr>
										</table>
										<br>
										<div id="resume-credito">
											<table class="table table-striped table-bordered">
												<tr>
													<td style="width: 50%;">
														<strong>A cuenta</strong>
													</td>
													<td id="amortizacionR" style="width: 50%;"></td>
												</tr>
												<tr>
													<td>
														<strong>Saldo</strong>
													</td>
													<td id="saldoR"></td>
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>							
						</div>
					</div>
					<hr>
					<ul class="pager wizard">
						<li class="previous"><a href="#">Previous</a></li>
					  	<li class="next"><a href="#">Next</a></li>
					  	<li class="next finish" id="btn-enviar-form" style="display:none;"><a class="btn-info" href="javascript:;">Registrar</a></li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Modal para buscar productos -->

		<div class="modal hide fade" id="modalBuscarProducto" style="width:750px;">
			<div class="modal-header">
				<h3>Productos</h3>
			</div>
			<div class="modal-body">
				<table id="select_producto_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>ventas/servicios/getProductosToVenta" style="max-height: 450px;">
					<thead>
						<tr>
							<th>Codigo</th>
							<th>Producto</th>
							<th>P.Cont</th>
							<th>P.Cred</th>
							<th>Marca</th>
							<th>Categoría</th>
							<th>Oferta</th>
							<th>Stock</th>
						</tr>
					</thead>
					<tbody></tbody>
					<tfoot>
						<tr>
							<th class="input">
								<input type="text" style="width: 75px" value="Codigo" class="search_init" />
							</th>
							<th class="input">
								<input type="text"style="width: 75px" value="Producto" class="search_init" />
							</th>
							<th>
							</th>
							<th>
							</th>
							<th class="input">
								<input type="text" style="width: 75px" value="Marca" class="search_init" />
							</th>
							<th class="input">
								<input type="text" style="width: 75px" value="Categoria" class="search_init" />
							</th>
							<th class="input">
								<input type="text" style="width: 75px" value="Oferta" class="search_init" />
							</th>
							<th>
							</th>
						</tr>
					</tfoot>
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
				<table id="select_cliente_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>ventas/servicios/getClientes">
					<thead>
						<tr>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>DNI</th>
							<th>Línea de Crédito</th>
						</tr>
					</thead>
					<tbody>
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
					<p>
						<i class="icon icon-alert icon-red"></i>
						Necesita agregar productos
					</p>
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Aceptar</a>
			</div>
		</div>
	</div>
</div>
</div>
<!--/fluid-row-->
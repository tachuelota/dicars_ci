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
				<a href="logistica_orden_compra_consultar.html">Orden Compra</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>ORDEN DE COMPRA: REGISTRAR</h2>
			</div>
			<div class="box-content">
				<form id="RegistrarOrdenCompraForm" class="form-horizontal" method="post" action="">
					<fieldset>
						<div class="row-fluid">
							<div class="span6">
								<div class="control-group">
									<label class="control-label" for="registrador">Registrador</label>
									<div class="controls">
										<input class="input-xlarge focused" id="registrador" name="registrador" type="text" readonly required></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="proveedor">Proveedor</label>
									<div class="controls">
										<input class="input-xlarge focused" id="proveedor" name="proveedor" type="text" readonly>
										<input id="proveedor_id" name="proveedor_id" type="hidden">
										<button type="button" class="btn btn-info btn-proveedor" style="margin: 0 18px;"> <i class="icon-search icon-white"></i>
										</button>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="observaciones">Observaciones</label>
									<div class="controls">
										<textarea id="observaciones" name="observaciones" class="input-xlarge"></textarea>
									</div>
								</div>
							</div>
							<div class="span6">
								<div class="control-group">
									<label class="control-label" for="subtotal">Subtotal</label>
									<div class="controls">
										<input class="input-xlarge" id="subtotal" name="subtotal" min="0" type="number" readonly value="0"></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="descuento">Descuento</label>
									<div class="controls">
										<div class="input-prepend input-append">
											<input class="input-xlarge" id="descuento" name="descuento" type="number" step="0.10" value="0" min="0">
											<span id="spandesc" class="add-on">%</span>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="igv">IGV</label>
									<div class="controls">
										<div class="input-prepend input-append">
											<input name="igv" id="igv" type="number" value="18.0" step="0.10" min="0">
											<span id="spanigv" class="add-on">%</span>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="total">Total</label>
									<div class="controls">
										<input class="input-xlarge" id="total" name="total" type="number" readonly value="0"></div>
								</div>
							</div>
						</div>
					</fieldset>
					<hr>
					<h3>Detalle Orden de Compra</h3>
					<hr>
					<div class="span12">
						<div class="form-horizontal">
							<div class="span6" style="margin-bottom: 20px; border-rigth: 1px solid #ddd;">
								<div class="control-group">
									<label class="control-label" for="ordped">Pedido</label>
									<div class="controls">
										<input class="input-xlarge focused" id="ordped" name="ordped" type="text" readonly>
										<button type="button" class="btn btn-info btn-ordped" style="margin: 0 18px;"> <i class="icon-search icon-white"></i>
										</button>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="selectEstado">Estado</label>
									<div class="controls">
										<select id="selectEstado" name="selectEstado">
											<option value="2">Completa</option>
											<option value="1">Parcial</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="preciod">Importe</label>
									<div class="controls">
										<input id="imported" type="number" step="0.01" min="1" style="margin: 0 18px 0 0;">
										<label style="display:inline;" for="cantidadd"> <strong>Cantidad</strong>
										</label>
										<input id="cantidadd" type="number" style="margin: 0 18px 0 0;" min="1">
										<button id="agregar_detalle" type="button" class="btn btn-primary">
											<i class="icon-plus icon-white"></i>
											Agregar
										</button>
									</div>
								</div>
							</div>
						</div>
						<div class="form-horizontal">
							<div class="span6" style="margin-bottom: 20px; border-left: 1px solid #ddd;">
								<div class="control-group">
									<label class="control-label" for="producto">Producto</label>
									<div class="controls">
										<input class="input-xlarge focused" id="producto" type="text" readonly>
										<button type="button" class="btn btn-info btn-buscarp" style="margin: 0 18px;">
											<i class="icon-search icon-white"></i>
										</button>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="precio">Importe</label>
									<div class="controls">
										<input id="importe" type="number" step="0.01" min="1" style="margin: 0 18px 0 0;" >
										<label style="display:inline;" for="cantidad"> <strong>Cantidad</strong>
										</label>
										<input id="cantidad" type="number" style="margin: 0 18px 0 0;" min="1">
										<button id="agregar_producto" type="button" class="btn btn-primary">
											<i class="icon-plus icon-white"></i>
											Agregar
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<table id="productos_table" class="table table-striped table-bordered bootstrap-datatable datatable">
						<thead>
							<tr>
								<th>Pedido</th>
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Precio S/.</th>
								<th>Importe S/.</th>
								<th>Fecha de registro</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>000001</td>
								<td>Producto 1</td>
								<td>50</td>
								<td>20</td>
								<td>1000</td>
								<td>01/02/2013</td>
								<td>
									<a class='btn btn-info btn-editar' href='#'>
										<i class='icon-edit icon-white'></i>
										Editar
									</a>
								</td>
								<td>
									<a class='btn btn-danger' href='#'>
										<i class='icon-trash icon-white'></i>
										Eliminar
									</a>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="form-actions" style="padding-left: 17px;">
						<a href="logistica_orden_compra_consultar.html" type="reset" class="btn btn-success btn-cancelar" >
							<i class="icon icon-white icon-arrowthick-w"></i>
							Volver
						</a>
						<button id="btn_enviar_ordcom" type="submit" class="btn btn-primary" style="float: right;">
							<i class="icon icon-white icon-save"></i>
							Guardar
						</button>
					</div>
					<div class="modal hide fade" id="modalBuscarProveedor">
						<div class="modal-header">
							<h3>Proveedores</h3>
						</div>
						<div class="modal-body">
							<table id="select_proveedor_table" class="table table-striped table-bordered bootstrap-datatable datatable">
								<thead>
									<tr>
										<th>Código</th>
										<th>Razón Social</th>
										<th>RUC</th>
										<th>Teléfono</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>000001</td>
										<td>Proveedor 1</td>
										<td>12345678912</td>
										<td>123456</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
							<a id="select_proveedor" href="#" class="btn btn-primary">Seleccionar</a>
						</div>
					</div>
					<div class="modal hide fade" id="modalBuscarOrdPed" style="width: 650px;">
						<div class="modal-header">
							<h3>Detalles de Pedido</h3>
						</div>
						<div class="modal-body">
							<table id="select_ordped_table" class="table table-striped table-bordered bootstrap-datatable datatable">
								<thead>
									<tr>
										<th rowspan="2">Producto</th>
										<th rowspan="2">Registrante</th>
										<th colspan="3">Cantidad</th>

										<th rowspan="2">Fecha Registro</th>
										<th rowspan="2">BarCode</th>
									</tr>
									<tr>
										<th>Ped.</th>
										<th>Acep.</th>
										<th>Faltan</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td rowspan="2">Producto 1</td>
										<td rowspan="2">Diego Molina</td>
										<td>50</td>
										<td>50</td>
										<td>0</td>
										<td rowspan="2">01/02/2013</td>
										<td rowspan="2">123456789456132</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
							<a id="select_ordped" href="#" class="btn btn-primary">Seleccionar</a>
						</div>
					</div>
					<div class="modal hide fade" id="modalBuscarProducto">
						<div class="modal-header">
							<h3>Productos</h3>
						</div>
						<div class="modal-body">
							<table id="select_producto_table" class="table table-striped table-bordered bootstrap-datatable datatable">
								<thead>
									<tr>
										<th>Código</th>
										<th>Producto</th>
										<th>Stock</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>000001</td>
										<td>Producto 2</td>
										<td>300</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
							<a  id="select_producto" href="#" class="btn btn-primary">Seleccionar</a>
						</div>
					</div>
				</form>
				<div class="modal hide fade" id="modalEditarCantidad" >
					<div class="modal-header">
						<h3>Datos del Producto</h3>
					</div>
					<div class="modal-body">
						<form id="EditarCantidadForm" class="form-horizontal">
							<div class="control-group">
								<label class="control-label" for="selectEstado">Producto</label>
								<div class="controls">
									<span class="help-inline" style="padding-top:5px;">Producto 1</span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="selectEstado">Precio</label>
								<div class="controls">
									<input id="pordcomE" type="number" step="0.01" min="1" style="margin: 0 18px 0 0;" ></div>
							</div>
							<div class="control-group">
								<label class="control-label" for="selectEstado">Cantidad</label>
								<div class="controls">
									<input id="cantidadE" type="number" step="0.01" min="1" style="margin: 0 18px 0 0;" ></div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
						<a  id="" href="#" class="btn btn-primary btn-guardar">Guardar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- content ends -->
</div>
<!--/#content.span10-->
</div>
<!--/fluid-row-->
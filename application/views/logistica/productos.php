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
					<a href="<?php echo base_url();?>logistica/">Logística</a>
					<span class="divider">/</span>
				</li>
				<li>
					<a href="<?php echo base_url();?>logistica/views/productos/">Productos</a>
				</li>
			</ul>
		</div>
		<div class="row-fluid">
			<div class="box span12">
				<div class="box-header well" data-original-title>
					<h2>PRODUCTOS</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-registrar btn-round" alt="Registrar Producto"> <i class="icon-plus"></i>
						</a>
					</div>
				</div>
				<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable" id="productos_table">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Marca</th>
								<th>Tipo</th>
								<th>Categoría</th>
								<th>Talla</th>
								<th>Stock</th>
								<th>Prec. Contado</th>
								<th>Prec. Crédito</th>
								<th>Cod. Barra</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Jean</td>
								<td>Jeansito</td>
								<td>Cadera</td>
								<td>Pantalones</td>
								<td>28</td>
								<td>1000</td>
								<td>80</td>
								<td>90</td>
								<td>123456789654312987</td>
								<td>
									<a class='btn btn-success btn-datos' href='producto_ver.html'> <i class='icon-zoom-in icon-white'></i>
										Ver Datos
									</a>
								</td>
								<td>
									<a class='btn btn-info btn-editar' href='producto_editar.html'>
										<i class='icon-edit icon-white'></i>
										Editar
									</a>
								</td>
							</tr>
						</tbody>
					</table>

					<div class="modal hide fade" id="modalVerDatos">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">x</button>
							<h3>Datos del Producto</h3>
						</div>
						<div id="VerProducto" class="form-horizontal">
							<div class="modal-body">
								<input id="codigo" name="codigo" type="hidden">
								<fieldset>
									<div class="control-group">
										<label class="control-label" for="serie">Serie</label>
										<div class="controls">
											<span class="help-inline" style="padding-top: 5px;">000001</span>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="talla">Talla</label>
										<div class="controls">
											<span class="help-inline" style="padding-top: 5px;">28</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="marca">Marca</label>
										<div class="controls">
											<span class="help-inline" style="padding-top: 5px;">Marca 1</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="categoria">Categoría</label>
										<div class="controls">
											<span class="help-inline" style="padding-top: 5px;">Categoría 1</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="tipo">Tipo</label>
										<div class="controls">
											<span class="help-inline" style="padding-top: 5px;">Tipo 1</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="descripcion">Descripción</label>
										<div class="controls">
											<span class="help-inline" style="padding-top: 5px;">Jean para mujer</span>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<figure>
												<img src="" alt=""></figure>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="preciocosto">Precio Costo</label>
										<div class="controls">
											<span class="help-inline" style="padding-top: 5px;">50</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="preciocontado">Precio Contado</label>
										<div class="controls">
											<span class="help-inline" style="padding-top: 5px;">80</span>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="preciocredito">Precio Credito</label>
										<div class="controls">
											<span class="help-inline" style="padding-top: 5px;">90</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="stockmin">Stock Min</label>
										<div class="controls">
											<span class="help-inline" style="padding-top: 5px;">10</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="stockmax">Stock Max</label>
										<div class="controls">
											<span class="help-inline" style="padding-top: 5px;">1000</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="estado">Estado</label>
										<div class="controls">
											<span class="help-inline" style="padding-top: 5px;">Habilitado</span>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn" data-dismiss="modal">Cerrar</button>
							</div>
						</div>
					</div>
					<div class="modal hide fade" id="modalEditarDatos" >
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">x</button>
							<h3>Datos del Producto</h3>
						</div>
						<form id="EditarProductoForm" class="form-horizontal" method="post" action="">
							<div class="modal-body">
								<input id="codigo" name="codigo" type="hidden">
								<fieldset>
									<div class="control-group">
										<label class="control-label" for="serie">Serie</label>
										<div class="controls">
											<input maxlength="15" id="serie" name="serie" type="text" pattern='|^[a-zA-Z0-9\-\]+$|' required value="000001"></div>
									</div>

									<div class="control-group">
										<label class="control-label" for="talla">Talla</label>
										<div class="controls">
											<input required maxlength="15" id="talla" name="talla" type="text" pattern='|^([0-9]+)$|' value="28"></div>
									</div>
									<div class="control-group">
										<label class="control-label" for="marca">Marca</label>
										<div class="controls">
											<select id="marca" name="marca">
												<option value="1">Marca 1</option>
												<option value="2">Marca 2</option>
												<option value="3">Marca 3</option>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="categoria">Categoría</label>
										<div class="controls">
											<select id="categoria" name="categoria">
												<option value="1">Categoría 1</option>
												<option value="2">Categoría 2</option>
												<option value="3">Categoría 3</option>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="tipo">Tipo</label>
										<div class="controls">
											<select id="tipprod" required name="tipprod">
												<option value="1">Tipo 1</option>
												<option value="2">Tipo 2</option>
												<option value="3">Tipo 3</option>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="descripcion">Descripción</label>
										<div class="controls">
											<textarea class="input-xlarge" required name="descripcion" maxlength="200" id="descripcion" rows="2" cols="">Jean para mujer</textarea>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="imagen">Subir Imágen</label>
										<div class="controls">
											<input type="file" class="input-xlarge" name="imagen" id="imagen">
											<input type="hidden" name="nombrearchivo" id="nombrearchivo" val=""></div>
									</div>
									<div class="control-group">
										<div class="controls">
											<figure>
												<img src="" alt=""></figure>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="preciocosto">Precio Costo</label>
										<div class="controls">
											<input required name="preciocosto" id="preciocosto" min="1" step="0.01" type="number" value="50"></div>
									</div>
									<div class="control-group">
										<label class="control-label" for="preciocontado">Precio Contado</label>
										<div class="controls">
											<input required name="preciocontado" id="preciocontado" min="1" step="0.01" type="number" value="80"></div>
									</div>

									<div class="control-group">
										<label class="control-label" for="preciocredito">Precio Credito</label>
										<div class="controls">
											<input required name="preciocredito" id="preciocredito" min="1" step="0.01" type="number" value="90"></div>
									</div>
									<div class="control-group">
										<label class="control-label" for="stockmin">Stock Min</label>
										<div class="controls">
											<input required maxlength="11" name="stockmin" id="stockmin" min="1" step="1" type="number" value="10"></div>
									</div>
									<div class="control-group">
										<label class="control-label" for="stockmax">Stock Max</label>
										<div class="controls">
											<input required maxlength="11" name="stockmax" id="stockmax" min="1" step="1" type="number" value="1000"></div>
									</div>
									<div class="control-group">
										<label class="control-label" for="estado">Estado</label>
										<div class="controls">
											<select id="estado" required name="estado" data-rel="chosen">
												<option value="1">Habilitado</option>
												<option value="0">Inhabilitado</option>
											</select>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn" data-dismiss="modal">Cancelar</button>
								<button id="reg_prod_btn" type="submit" class="btn btn-primary">Guardar</button>
							</div>
						</form>
					</div>
					<div class="modal hide fade" id="modalRegistro">
						<div class="modal-header">
							<h3>Registrar Producto</h3>
						</div>
						<form id="RegistrarProductoForm" class="form-horizontal" method="post" action="">
							<div class="modal-body">
								<input id="codigo" name="codigo" type="hidden">
								<fieldset>
									<div class="control-group">
										<label class="control-label" for="serie">Serie</label>
										<div class="controls">
											<input maxlength="15" id="serie" name="serie" type="text" pattern='|^[a-zA-Z0-9\-\]+$|' required></div>
									</div>

									<div class="control-group">
										<label class="control-label" for="talla">Talla</label>
										<div class="controls">
											<input required maxlength="15" id="talla" name="talla" type="text" pattern='|^([0-9]+)$|'></div>
									</div>
									<div class="control-group">
										<label class="control-label" for="marca">Marca</label>
										<div class="controls">
											<select id="marca" name="marca"></select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="categoria">Categoría</label>
										<div class="controls">
											<select id="categoria" name="categoria"></select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="tipo">Tipo</label>
										<div class="controls">
											<select id="tipprod" required name="tipprod"></select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="descripcion">Descripción</label>
										<div class="controls">
											<textarea class="input-xlarge" required name="descripcion" maxlength="200" id="descripcion" rows="2" cols=""></textarea>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="imagen">Subir Imágen</label>
										<div class="controls">
											<input type="file" class="input-xlarge" name="imagen" id="imagen">
											<input type="hidden" name="nombrearchivo" id="nombrearchivo" val=""></div>
									</div>
									<div class="control-group">
										<div class="controls">
											<figure>
												<img src="" alt=""></figure>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="preciocosto">Precio Costo</label>
										<div class="controls">
											<input required name="preciocosto" id="preciocosto" min="1" step="0.01" type="number"></div>
									</div>
									<div class="control-group">
										<label class="control-label" for="preciocontado">Precio Contado</label>
										<div class="controls">
											<input required name="preciocontado" id="preciocontado" min="1" step="0.01" type="number"></div>
									</div>

									<div class="control-group">
										<label class="control-label" for="preciocredito">Precio Credito</label>
										<div class="controls">
											<input required name="preciocredito" id="preciocredito" min="1" step="0.01" type="number"></div>
									</div>
									<div class="control-group">
										<label class="control-label" for="stockmin">Stock Min</label>
										<div class="controls">
											<input required maxlength="11" name="stockmin" id="stockmin" min="1" step="1" type="number"></div>
									</div>
									<div class="control-group">
										<label class="control-label" for="stockmax">Stock Max</label>
										<div class="controls">
											<input required maxlength="11" name="stockmax" id="stockmax" min="1" step="1" type="number"></div>
									</div>
									<div class="control-group">
										<label class="control-label" for="estado">Estado</label>
										<div class="controls">
											<select id="estado" required name="estado" data-rel="chosen">
												<option value="1">Habilitado</option>
												<option value="0">Inhabilitado</option>
											</select>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn btn-cancelarprov" data-dismiss="modal">Cancelar</button>
								<button id="reg_prod_btn" type="submit" class="btn btn-primary">Guardar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!--/span-->
		</div>
		<!-- content ends -->
	</div>
	<!--/#content.span10-->
</div>
<!--/fluid-row-->
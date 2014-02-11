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
					<table class="table table-striped table-bordered bootstrap-datatable datatable" id="productos_table"
					data-source = "<?php echo base_url();?>logistica/Servicios/getProductos">
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
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
								
					<div class="modal hide fade" id="modalProductos">
						<div class="modal-header">
							<h3>Registrar Producto</h3>
						</div>
						<form id="ProductoForm" class="form-horizontal" action-1="<?php echo base_url();?>logistica/Productos/registrar" action-2="<?php echo base_url();?>logistica/Productos/editar">
							<div class="modal-body">
								<input id="codigo" name="codigo" type="hidden">
								<fieldset>
									<div class="control-group">
										<label class="control-label" for="serie">Serie</label>
										<div class="controls">
											<input maxlength="15" id="serie" name="serie" type="text"></div>
									</div>

									<div class="control-group">
										<label class="control-label" for="talla">Talla</label>
										<div class="controls">
											<input required maxlength="15" id="talla" name="talla" type="text"></div>
									</div>
									<div class="control-group">
										<label class="control-label" for="marca">Marca</label>
										<div class="controls">
											<select id="marca" name="marca" data-source="<?php echo base_url();?>administracion/servicios/getMarcas"></select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="categoria">Categoría</label>
										<div class="controls">
											<select id="categoria" name="categoria" data-source="<?php echo base_url();?>administracion/servicios/getCategoria"></select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="tipo">Tipo</label>
										<div class="controls">
											<select id="tipprod" required name="tipprod" data-source="<?php echo base_url();?>administracion/servicios/getConstantes"></select>
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
								<button id="btn-reg-prod" type="button" class="btn btn-primary ">Registrar</button>
								<button id="btn-editar-prod" type="button" class="btn btn-primary " style="display:none">Editar</button>
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
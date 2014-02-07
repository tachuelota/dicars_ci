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
				<a href="<?php echo base_url();?>logistica/views/proveedores/">Proveedores</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>PROVEEDORES</h2>
				<div class="box-icon">
					<a href="#" class="btn btn-registrar btn-round" alt="Registrar Proveedor"> <i class="icon-plus"></i>
					</a>
					<!-- a href="#" class="btn btn-minimize btn-round"> <i class="icon-chevron-up"></i>
				</a>
				<a href="#" class="btn btn-close btn-round">
					<i class="icon-remove"></i>
				</a -->
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable" id="proveedores_table">
				<thead>
					<tr>
						<th>RUC</th>
						<th>Razón Social</th>
						<th>Teléfono</th>
						<th>Email</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>12345678912</td>
						<td>Proveedor 1</td>
						<td>123456</td>
						<td>proveedor1@email.com</td>
						<td>
							<a class='btn btn-success btn-datos' href='#'>
								<i class='icon-zoom-in icon-white'></i>
								Ver Datos
							</a>
						</td>
						<td>
							<a class='btn btn-info btn-editar' href='#'>
								<i class='icon-edit icon-white'></i>
								Editar
							</a>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="modal hide fade" id="modalRegistroProveedores">
				<div class="modal-header">
					<h3>Registrar Proveedor</h3>
				</div>
				<form id="RegistrarProveedorForm" class="form-horizontal" method="post" action="">
					<div class="modal-body">
						<fieldset>
							<div class="control-group">
								<label class="control-label" for="ruc">RUC</label>
								<div class="controls">
									<input class="input-xlarge focused" required pattern="|^\d{11}$|" title="El RUC debe tener 11 dígitos y debe ser sólo números" maxlength="11" id="ruc" name="ruc" type="text"></div>
							</div>
							<div class="control-group">
								<label class="control-label" for="razonsocial">Razón Social</label>
								<div class="controls">
									<input class="input-xlarge focused" type="text" required pattern="|^[a-zA-Z ñÑáéíóúüç.0-9]*$|" title="Este campo debe ser sólo letras" id="razonsocial" name="razonsocial" ></div>
							</div>
							<div class="control-group">
								<label class="control-label" for="ccorriente">Cuenta Corriente</label>
								<div class="controls">
									<input class="input-xlarge focused" pattern="|^([0-9]+\s*)+$|" id="ccorriente" name="ccorriente" type="text" maxlength="20"></div>
							</div>
							<div class="control-group">
								<label class="control-label" for="direccion">Dirección</label>
								<div class="controls">
									<input class="input-xlarge focused" required pattern="|^([a-zA-ZñÑáéíóúüç0-9]+\s*)+$" id="direccion" name="direccion" type="text"></div>
							</div>
							<div class="control-group">
								<label class="control-label" for="telefono">Teléfono</label>
								<div class="controls">
									<input class="input-xlarge focused" placeholder="999999999" required pattern="|^\d{9}$|" maxlength="9" id="telefono" name="telefono" type="text"></div>
							</div>
							<div class="control-group">
								<label class="control-label" for="email">Email</label>
								<div class="controls">
									<input class="input-xlarge focused" placeholder="example@domain.com" title="Debe ingresar un formato de email correcto" required id="email" name="email" type="email"></div>
							</div>
							<div class="control-group">
								<label class="control-label" for="paginaweb">Página Web</label>
								<div class="controls">
									<input class="input-xlarge focused" placeholder="mywebsite.com" maxlength="150" id="paginaweb" name="paginaweb" type="text"></div>
							</div>
						</fieldset>
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-cancelarprov" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary ">Guardar</button>
					</div>
				</form>
			</div>
			<div class="modal hide fade" id="modalEditarDatos">
				<div class="modal-header">
					<h3>Editar Proveedor</h3>
				</div>
				<form id="EditarProveedorForm" class="form-horizontal" method="post" action="">
					<div class="modal-body">
						<fieldset>
							<div class="control-group">
								<label class="control-label" for="ruc">RUC</label>
								<div class="controls">
									<input class="input-xlarge focused" required pattern="|^\d{11}$|" title="El RUC debe tener 11 dígitos y debe ser sólo números" maxlength="11" id="ruc" name="ruc" type="text" value="12345678912"></div>
							</div>
							<div class="control-group">
								<label class="control-label" for="razonsocial">Razón Social</label>
								<div class="controls">
									<input class="input-xlarge focused" type="text" required pattern="|^[a-zA-Z ñÑáéíóúüç.0-9]*$|" title="Este campo debe ser sólo letras" id="razonsocial" name="razonsocial" value="Proveedor 1"></div>
							</div>
							<div class="control-group">
								<label class="control-label" for="ccorriente">Cuenta Corriente</label>
								<div class="controls">
									<input class="input-xlarge focused" pattern="|^([0-9]+\s*)+$|" id="ccorriente" name="ccorriente" type="text" maxlength="20" value="1234-567891021"></div>
							</div>
							<div class="control-group">
								<label class="control-label" for="direccion">Dirección</label>
								<div class="controls">
									<input class="input-xlarge focused" required pattern="|^([a-zA-ZñÑáéíóúüç0-9]+\s*)+$" id="direccion" name="direccion" type="text" value="Mi Dirección 123"></div>
							</div>
							<div class="control-group">
								<label class="control-label" for="telefono">Teléfono</label>
								<div class="controls">
									<input class="input-xlarge focused" placeholder="999999999" required pattern="|^\d{9}$|" maxlength="9" id="telefono" name="telefono" type="text" value="123456"></div>
							</div>
							<div class="control-group">
								<label class="control-label" for="email">Email</label>
								<div class="controls">
									<input class="input-xlarge focused" placeholder="example@domain.com" title="Debe ingresar un formato de email correcto" required id="email" name="email" type="email" value="proveedor1@email.com"></div>
							</div>
							<div class="control-group">
								<label class="control-label" for="paginaweb">Página Web</label>
								<div class="controls">
									<input class="input-xlarge focused" placeholder="mywebsite.com" maxlength="150" id="paginaweb" name="paginaweb" type="text" value="proveedor1.com"></div>
							</div>
						</fieldset>
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-cancelarprov" data-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary ">Guardar</button>
					</div>
				</form>
			</div>
			<div class="modal hide fade" id="modalVerDatos">
				<div class="modal-header">
					<h3>Datos del Proveedor</h3>
				</div>
				<div id="VerProveedor" class="form-horizontal">
					<div class="modal-body">
						<fieldset>
							<div class="control-group">
								<label class="control-label" for="ruc">RUC</label>
								<div class="controls">
									<span class="help-inline" style="padding-top: 5px;">12345678912</span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="razonsocial">Razón Social</label>
								<div class="controls">
									<span class="help-inline" style="padding-top: 5px;">Proveedor 1</span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="ccorriente">Cuenta Corriente</label>
								<div class="controls">
									<span class="help-inline" style="padding-top: 5px;">1234-567891021</span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="direccion">Dirección</label>
								<div class="controls">
									<span class="help-inline" style="padding-top: 5px;">Mi Dirección 123</span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="telefono">Teléfono</label>
								<div class="controls">
									<span class="help-inline" style="padding-top: 5px;">123456</span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="email">Email</label>
								<div class="controls">
									<span class="help-inline" style="padding-top: 5px;">proveedor1@email.com</span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="paginaweb">Página Web</label>
								<div class="controls">
									<span class="help-inline" style="padding-top: 5px;">proveedor1.com</span>
								</div>
							</div>
						</fieldset>
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
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
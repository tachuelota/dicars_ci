<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>Necesitas tener <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> habilitado para usar este sitio.</p>
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
						<a href="admin_homepage">Administración</a><span class="divider">/</span>
					</li>
					<li>
						<a href="logistica_locales.html">Locales</a>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>Locales</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-registrar btn-round" alt="Registrar Local"><i class="icon-plus"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="locales_table">
						  	<thead>
								<tr>
								  	<th>Nombre</th>
								  	<th>Estado</th>
								  	<th>Teléfono</th>
								  	<th>Dirección</th>
								  	<th>Tipo de Rubro</th>
								  	<th></th>
								  	<th></th>
							  	</tr>
						  	</thead>   
							<tbody>
								<tr>
								  	<td>Local 1</td>
								  	<td>Habilitado</td>
								  	<td>258963</td>
								  	<td>Mi Local 123</td>
								  	<td>Ropa</td>
								  	<td><a class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a></td>
								  	<td><a class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a></td>
							  	</tr>
							</tbody>
						</table>
					<div class="modal hide fade" id="modalRegistro">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">x</button>
							<h3>Registrar Local</h3>
						</div>
						<form id="RegistrarLocalForm" class="form-horizontal" method="post" action="">
							<div class="modal-body">
								<fieldset>
									<div class="control-group">
										<label class="control-label" for="nombre_tienda">Nombre de la Tienda</label>
										<div class="controls">
									  		<input class="input-xlarge focused" id="nombre_tienda" name="nombre_tienda" type="text" pattern="|^[a-zA-Z0-9 ñÑáÁéÉíÍóÓúÚüÜç]+$|" maxlength="100" required>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="estado">Estado</label>
										<div class="controls">
									  		<select id="estado" name="estado">
												<option value="1">Habilitado</option>
												<option value="0">Inhabilitado</option>
											</select>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="direccion">Dirección</label>
										<div class="controls">
									  		<input class="input-xlarge focused" id="direccion" name="direccion" type="text" pattern="|^[a-zA-Z0-9 ñÑáÁéÉíÍóÓúÚüÜç]+$|" maxlength="150" required>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="telefono">Teléfono</label>
										<div class="controls">
									  		<input class="input-xlarge focused" id="telefono" name="telefono" type="text" placeholder="999999999" pattern="|^[0-9]{9}$|" title="Sólo números de 9 dígitos" maxlength="9" required>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="tiprub">Tipo de Rubro</label>
										<div class="controls">
									  		<select id="tiprub" name="tiprub">
									  			<option value="1">Ropa</option>
									  			<option value="2">Acessorios</option>
									  			<option value="3">Calzado</option>
											</select>
										</div>
								  	</div>
								  	<h4>Ubigeo</h4>
								  	<hr>
								  	<div class="control-group">
										<label class="control-label" for="dep">Departamento</label>
										<div class="controls">
									  		<select id="dep" name="dep">
									  			<option value="1">Departamento 1</option>
									  			<option value="2">Departamento 2</option>
									  			<option value="3">Departamento 3</option>
											</select>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="prov">Provincia</label>
										<div class="controls">
									  		<select id="prov" name="prov">
									  			<option value="1">Provincia 1</option>
									  			<option value="2">Provincia 2</option>
									  			<option value="3">Provincia 3</option>
											</select>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="dist">Distrito</label>
										<div class="controls">
									  		<select id="dist" name="dist">
									  			<option value="1">Distrito 1</option>
									  			<option value="2">Distrito 2</option>
									  			<option value="3">Distrito 3</option>
											</select>
										</div>
								  	</div>
								</fieldset>
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-primary">Guardar</button>
							</div>
						</form>
					</div>
					<div class="modal hide fade" id="modalEditarLocal">
						<div class="modal-header">
							<h3>Editar Local</h3>
						</div>
						<form id="EditarLocalForm" class="form-horizontal" method="post" action="">
							<div class="modal-body">
								<fieldset>
									<div class="control-group">
										<label class="control-label" for="nombre_tienda">Nombre de la Tienda</label>
										<div class="controls">
									  		<input class="input-xlarge focused" id="nombre_tienda" name="nombre_tienda" type="text" pattern="|^[a-zA-Z0-9 ñÑáÁéÉíÍóÓúÚüÜç]+$|" maxlength="100" value="Local 1" required>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="estado">Estado</label>
										<div class="controls">
									  		<select id="estado" name="estado">
												<option value="1">Habilitado</option>
												<option value="0">Inhabilitado</option>
											</select>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="direccion">Dirección</label>
										<div class="controls">
									  		<input class="input-xlarge focused" id="direccion" name="direccion" type="text" pattern="|^[a-zA-Z0-9 ñÑáÁéÉíÍóÓúÚüÜç]+$|" maxlength="150" value="Mi Local 123" required>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="telefono">Teléfono</label>
										<div class="controls">
									  		<input class="input-xlarge focused" id="telefono" name="telefono" type="text" placeholder="999999999" pattern="|^[0-9]{9}$|" value="258963" maxlength="9" required>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="tiprub">Tipo de Rubro</label>
										<div class="controls">
									  		<select id="tiprub" name="tiprub">
									  			<option value="1">Ropa</option>
									  			<option value="2">Acessorios</option>
									  			<option value="3">Calzado</option>
											</select>
										</div>
								  	</div>
								  	<h4>Ubigeo</h4>
								  	<hr>
								  	<div class="control-group">
										<label class="control-label" for="dep">Departamento</label>
										<div class="controls">
									  		<select id="dep" name="dep">
									  			<option value="1">Departamento 1</option>
									  			<option value="2">Departamento 2</option>
									  			<option value="3">Departamento 3</option>
											</select>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="prov">Provincia</label>
										<div class="controls">
									  		<select id="prov" name="prov">
									  			<option value="1">Provincia 1</option>
									  			<option value="2">Provincia 2</option>
									  			<option value="3">Provincia 3</option>
											</select>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="dist">Distrito</label>
										<div class="controls">
									  		<select id="dist" name="dist">
									  			<option value="1">Distrito 1</option>
									  			<option value="2">Distrito 2</option>
									  			<option value="3">Distrito 3</option>
											</select>
										</div>
								  	</div>
								</fieldset>
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-primary">Guardar</button>
							</div>
						</form>
					</div>
					<div class="modal hide fade" id="modalVerDatos">
						<div class="modal-header">
							<h3>Datos del Local</h3>
						</div>
						<div class="modal-body">
							<div id="VerLocal" class="form-horizontal">
								<fieldset>
									<div class="control-group">
										<label class="control-label" for="nombre_tienda">Nombre de la Tienda</label>
										<div class="controls">
											<span class="help-inline" style="padding-top:5px;">Local 1</span>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="estado">Estado</label>
										<div class="controls">
											<span class="help-inline" style="padding-top:5px;">Habilitado</span>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="direccion">Dirección</label>
										<div class="controls">
											<span class="help-inline" style="padding-top:5px;">Mi Local 123</span>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="telefono">Teléfono</label>
										<div class="controls">
											<span class="help-inline" style="padding-top:5px;">258963</span>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="tiprub">Tipo de Rubro</label>
										<div class="controls">
											<span class="help-inline" style="padding-top:5px;">Ropa</span>
										</div>
								  	</div>
								  	<h4>Ubigeo</h4>
								  	<hr>
								  	<div class="control-group">
										<label class="control-label" for="dep">Departamento</label>
										<div class="controls">
											<span class="help-inline" style="padding-top:5px;">Departamento 1</span>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="prov">Provincia</label>
										<div class="controls">
											<span class="help-inline" style="padding-top:5px;">Provincia 1</span>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="dist">Distrito</label>
										<div class="controls">
											<span class="help-inline" style="padding-top:5px;">Distrito 1</span>
										</div>
								  	</div>
								</fieldset>
							</div>
						</div>
						<div class="modal-footer">
							<button type="reset" class="btn" data-dismiss="modal">Cancelar</button>
						</div>
					</div>   
					</div>
				</div><!--/span-->
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
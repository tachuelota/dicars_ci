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
						<a href="admin_homepage.html">Administración</a><span class="divider">/</span>
					</li>
					<li>
						<a href="admin_zonas.html">Zonas</a>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>ZONAS</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-registrar btn-round" alt="Registrar Zona"><i class="icon-plus"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="zonas_table">
						  <thead>
							  <tr>
								  <th>Nombre</th>
								  <th>Estado</th>
								  <th>Ubigeo</th>
								  <th></th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<tr>
								  <th>Zona 1</th>
								  <th>Habilitada</th>
								  <th>Trujillo - Trujillo - La Libertad</th>
								  <th><a class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a></th>
							  </tr>
						</tbody>
					</table>
					<div class="modal hide fade" id="modalRegistro">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">x</button>
							<h3>Registrar Zona</h3>
						</div>
						<form id="RegistrarZonaForm" class="form-horizontal" method="post" action="">
							<div class="modal-body">
								<fieldset>
									<div class="control-group">
										<label class="control-label" for="desc">Nombre de la Zona</label>
										<div class="controls">
									  		<input class="input-xlarge focused" id="desc" name="desc" type="text" pattern="|^[a-zA-Z0-9 ñÑáÁéÉíÍóÓúÚüÜç]+$|" maxlength="100" required>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="selectEstado">Estado</label>
										<div class="controls">
									  		<select id="selectEstado" name="selectEstado">
												<option value="1">Habilitado</option>
												<option value="0">Inhabilitado</option>
											</select>
										</div>
								  	</div>
								  	<h4>Ubigeo</h4>
								  	<hr>
								  	<div class="control-group">
										<label class="control-label" for="dep">Departamento</label>
										<div class="controls">
									  		<select id="dep" name="dep">
									  			<option value="1">La Libertad</option>
									  			<option value="2">Tumbes</option>
											</select>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="prov">Provincia</label>
										<div class="controls">
									  		<select id="prov" name="prov">
									  			<option value="1">Trujillo</option>
									  			<option value="2">Tumbes</option>
									  			<option value="3">Zarumilla</option>
											</select>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="dist">Distrito</label>
										<div class="controls">
									  		<select id="dist" name="dist">
									  			<option value="1">Trujillo</option>
									  			<option value="2">Tumbes</option>
									  			<option value="3">Aguas Verdes</option>
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
					<div class="modal hide fade" id="modalEditarDatos">
						<div class="modal-header">
							<h3>Editar Zona</h3>
						</div>
						<div class="modal-body">
							<form id="EditarZonaForm" class="form-horizontal" method="post" action="">
								<div class="modal-body">
									<fieldset>
										<div class="control-group">
											<label class="control-label" for="desc">Nombre de la Zona</label>
											<div class="controls">
												<span class="help-inline" style="padding-top:5px;">Zona 1</span>
											</div>
									  	</div>
									  	<div class="control-group">
											<label class="control-label" for="selectEstado">Estado</label>
											<div class="controls">
										  		<select id="selectEstado" name="selectEstado">
													<option value="1">Habilitado</option>
													<option value="0">Inhabilitado</option>
												</select>
											</div>
									  	</div>
									  	<h4>Ubigeo</h4>
									  	<hr>
									  	<div class="control-group">
											<label class="control-label" for="dep">Departamento</label>
											<div class="controls">
										  		<select id="dep" name="dep">
										  			<option value="1">La Libertad</option>
										  			<option value="2">Tumbes</option>
												</select>
											</div>
									  	</div>
									  	<div class="control-group">
											<label class="control-label" for="prov">Provincia</label>
											<div class="controls">
										  		<select id="prov" name="prov">
										  			<option value="1">Trujillo</option>
										  			<option value="2">Tumbes</option>
										  			<option value="3">Zarumilla</option>
												</select>
											</div>
									  	</div>
									  	<div class="control-group">
											<label class="control-label" for="dist">Distrito</label>
											<div class="controls">
										  		<select id="dist" name="dist">
										  			<option value="1">Trujillo</option>
										  			<option value="2">Tumbes</option>
										  			<option value="3">Aguas Verdes</option>
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
					</div> 
					</div>
				</div><!--/span-->
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
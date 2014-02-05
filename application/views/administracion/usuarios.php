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
						<a href="admin_usuarios.html">Usuarios</a>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>USUARIOS</h2>
					</div>
					<div class="box-content">
						<form id="RegistrarUsuarioForm" class="form-horizontal" method="post" action="">
							<fieldset>
								<div class="control-group">
									<label class="control-label" for="trabajador">Trabajador</label>
									<div class="controls">
										<input class="input-xlarge" id="nombre_trabajador" type="text" readonly required>
										<input class="input-xlarge focused" id="trabajador" name="trabajador" type="hidden">
										<button class="btn btn-info btn-trabajador" style="margin-left: 15px;"><i class="icon-user icon-white"></i></button>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="usuario_id">Usuario ID</label>
									<div class="controls">
										<input class="input-xlarge focused" id="usuario_id" name="usuario_id" type="text" pattern="|^[a-zA-Z0-9]+$|" title="El usuario puede contener leras y números" maxlength="20" required>
									</div>
								</div>
			                                        
                                <div class="control-group">
                                    <label class="control-label" for="email">Email</label>
                                    <div class="controls">
                                        <input class="input-xlarge focused" id="email" name="email" type="text">
                                    </div>
                                </div>
			                                        
								<div class="control-group">
									<label class="control-label" for="contrasena">Contraseña</label>
									<div class="controls">
										<input class="input-xlarge focused" id="contrasena" name="contrasena" type="password" required>
									</div>
								</div>
								
								<div class="control-group">
								<label class="control-label" for="estado">Estado</label>
								<div class="controls">
								 <select id="estado" name="estado" data-rel="chosen" required>
										<option value="1">Habilitado</option>
										<option value="0">Inhabilitado</option>
								  </select>
								</div>
								</div>
								<div class="form-actions">
									<button id="agregar_usuario" type="submit" class="btn btn-primary">Agregar</button>
									<button type="reset" class="btn">Limpiar Campos</button>
							  	</div>
							</fieldset>
						</form>
						<div class="modal hide fade" id="modalBuscarTrabajador">
							<div class="modal-header">
								<h3>Trabajadores</h3>
							</div>
							<div class="modal-body">
								<table id="select_trabajador_table" class="table table-striped table-bordered bootstrap-datatable datatable">
									<thead>
										<tr>
											<th>Nombres</th>
											<th>Apellidos</th>
											<th>DNI</th>
											<th>Teléfono</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Arturo</td>
											<td>Méndez</td>
											<td>85236974</td>
											<td>147852369</td>
										</tr>
									</tbody>
								  </table> 
							</div>	
							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
								<a  id="select_trabajador" href="#" class="btn btn-primary">Seleccionar</a>
							</div>
						</div>
						
						<div class="modal hide fade" id="modalEditarDatos">
							<form id="EditarUsuarioForm" class="form-horizontal" method="post" action="">
								<div class="modal-header">
									<h3>Editar Trabajador</h3>
								</div>
								<div class="modal-body">
									<fieldset>
										<div class="control-group">
											<label class="control-label" for="trabajador">Trabajador</label>
											<div class="controls">
												<input class="input-xlarge" id="nombre_trabajador" type="text" readonly value="Diego Molina">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="usuario_id">Usuario ID</label>
											<div class="controls">
												<input class="input-xlarge focused" id="usuario_id" name="usuario_id" type="text" value="000012" readonly>
											</div>
										</div>
					                                        
		                                <div class="control-group">
		                                    <label class="control-label" for="email">Email</label>
		                                    <div class="controls">
		                                        <input class="input-xlarge focused" id="email" name="email" type="text" value="diegomolina@email.com">
		                                    </div>
		                                </div>
					                                        
										<div class="control-group">
											<label class="control-label" for="contrasena">Contraseña</label>
											<div class="controls">
												<input class="input-xlarge focused" id="contrasena" name="contrasena" type="password" required value="123456">
											</div>
										</div>
										
										<div class="control-group">
											<label class="control-label" for="estado">Estado</label>
											<div class="controls">
												<select id="estadoE" name="estadoE" required>
													<option value="1">Habilitado</option>
													<option value="0">Inhabilitado</option>
												</select>
											</div>
										</div>
									</fieldset>
								</div>
								<div class="modal-footer">
									<button type="reset" class="btn" data-dismiss="modal">Cerrar</button>
									<button id="agregar_usuario" type="submit" class="btn btn-primary">Agregar</button>
								</div>
							</form>
						</div>
						
						<div class="modal hide fade" id="modalRoles">
							<form type="POST" id="RolUsuarioForm" name="RolUsuarioForm" action="">
							<div class="modal-header">
								<h3>Editar Roles</h3>
							</div>
							<div class="modal-body">
			                	<input type="hidden" id="code_user" name="code_user" value="admin" >
			                	<div class="control-group">
				                	<div class="controls">
									  	<label class="checkbox inline">
											<div class="checker" id="uniform-administrador">
												<span>
													<input type="checkbox" id="administrador" name="administrador" style="opacity: 0;">
												</span>
											</div> 
											Administrador
									  	</label>
									  	<label class="checkbox inline" style="margin-left: 58px;">
											<div class="checker" id="uniform-jventas">
												<span>
													<input type="checkbox" id="jventas" name="jventas"style="opacity: 0;">
												</span>
											</div> 
											Jefe de Ventas
									  	</label>
									  	<label class="checkbox inline" style="margin-left: 40px;">
											<div class="checker" id="uniform-jlogistica">
												<span>
													<input type="checkbox" id="jlogistica" name="jlogistica" style="opacity: 0;">
												</span>
											</div> 
											Jefe de Logística
									  	</label>
									</div>
								</div>
								<div class="control-group">
				                	<div class="controls">
									  	<label class="checkbox inline">
											<div class="checker" id="uniform-jsoporte">
												<span>
													<input type="checkbox" id="jsoporte" name="jsoporte" style="opacity: 0;">
												</span>
											</div> 
											Jefe de Soporte
									  	</label>
									  	<label class="checkbox inline" style="margin-left: 46px;">
											<div class="checker" id="uniform-vendedor">
												<span>
													<input type="checkbox" id="vendedor" name="vendedor"style="opacity: 0;">
												</span>
											</div> 
											Vendedor
									  	</label>
									  	<label class="checkbox inline" style="margin-left: 73px;">
											<div class="checker" id="uniform-cobranza">
												<span>
													<input type="checkbox" id="cobranza" name="cobranza" style="opacity: 0;">
												</span>
											</div> 
											Cobranza
									  	</label>
									</div>
								</div>
								<div class="control-group">
				                	<div class="controls">
									  	<label class="checkbox inline">
											<div class="checker" id="uniform-asistalmacen">
												<span>
													<input type="checkbox" id="asistalmacen" name="asistalmacen" style="opacity: 0;">
												</span>
											</div> 
											Asistente de Almacén
									  	</label>
									  	<label class="checkbox inline">
											<div class="checker" id="uniform-asistkardex">
												<span>
													<input type="checkbox" id="asistkardex" name="asistkardex" style="opacity: 0;">
												</span>
											</div> 
											Asistente de Kardex
									  	</label>
									  	<label class="checkbox inline">
											<div class="checker" id="uniform-soporteventas">
												<span>
													<input type="checkbox" id="soporteventas" name="soporteventas" style="opacity: 0;">
												</span>
											</div> 
											Soporte de Ventas
									  	</label>
									</div>
								</div>
								<div class="control-group">
				                	<div class="controls">
									  	<label class="checkbox inline">
											<div class="checker" id="uniform-soporterh">
												<span>
													<input type="checkbox" id="soporterh" name="soporterh" style="opacity: 0;">
												</span>
											</div> 
											Soporte de R.H.
									  	</label>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn" data-dismiss="modal">Cerrar</button>
					            <input class="btn btn-primary" type="submit" name="login" title="Guardar" value="Guardar" />
							</div>
							</form>
						</div>	
						
						<div class="modal hide fade" id="modalVerDatos">
						<div class="modal-header">
							<h3>Datos del Trabajador</h3>
						</div>
						<div class="modal-body">
							<div id="VerUsuarioForm" class="form-horizontal">
								<fieldset>
									<div class="control-group">
										<label class="control-label" for="trabajador">Trabajador</label>
										<div class="controls">
											<span class="help-inline" style="padding-top:5px;">Diego Molina</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="usuario_id">Usuario ID</label>
										<div class="controls">
											<span class="help-inline" style="padding-top:5px;">000012</span>
										</div>
									</div>
				                                        
	                                <div class="control-group">
	                                    <label class="control-label" for="email">Email</label>
	                                    <div class="controls">
	                                    	<span class="help-inline" style="padding-top:5px;">diegomolina@email.com</span>
	                                    </div>
	                                </div>
				                                        
									<div class="control-group">
										<label class="control-label" for="contrasena">Contraseña</label>
										<div class="controls">
											<span class="help-inline" style="padding-top:5px;">*******</span>
										</div>
									</div>
									
									<div class="control-group">
									<label class="control-label" for="estado">Estado</label>
									<div class="controls">
										<span class="help-inline" style="padding-top:5px;">Habilitado</span>
									</div>
									</div>
								</fieldset>
							</div>
						</div>
						<div class="modal-footer">
							<button type="reset" class="btn" data-dismiss="modal">Cerrar</button>
						</div>
						</div> 
						
						<table id="usuarios_table" class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
								<tr>
									<th>Usuario ID</th>
								  	<th>Trabajador</th>
								  	<th>Estado</th>
								  	<th>Último Login</th>
								  	<th></th>
								  	<th></th>
								  	<th></th>
							  	</tr>
							</thead>
							<tbody>
								<tr>
									<td>000012</td>
								  	<td>Diego Molina</td>
								  	<td>Habilitado</td>
								  	<td>02/02/2013</td>
								  	<td><a class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a></td>
								  	<td><a class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a></td>
								  	<td><a class='btn btn-rol btn-info' href='#'><i class='icon-trash icon-white'></i>Roles</a></td>
							  	</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
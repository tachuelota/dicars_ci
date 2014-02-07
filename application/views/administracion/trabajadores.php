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
						<a href="<?php echo base_url();?>">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?php echo base_url();?>administracion">Administración/</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?php echo base_url();?>administracion/trabajadores">Trabajadores</a>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>TRABAJADORES</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-registrar btn-round" alt="Registrar Trabajador"><i class="icon-plus"></i></a>
						</div>
					</div>
					<div class="box-content">
						
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="empleados_table">
						  	<thead>
							  	<tr>
								  	<th>Nombre y Apellidos</th>
								  	<th>DNI</th>
								  	<th>Teléfono</th>
							  	</tr>
						  	</thead>
						  	<tbody>
						  	</tbody>
					  	</table> 

					<div class="modal hide fade" id="modalRegistro">
						<div class="modal-header">
							<h3>Registrar Trabajador</h3>
						</div>
						<form id="RegistrarTrabajadorForm" class="form-horizontal" method="post" action="">
							<div class="modal-body">
								<fieldset>
										  <div class="control-group">
											<label class="control-label" for="nombres">Nombres</label>
											<div class="controls">
											  <input class="input-xlarge focused" maxlength="50" pattern="|^[a-zA-Z ñÑáÁéÉíÍóÓúÚüÜç]*$|" title="Este campo debe ser sólo letras" id="nombres" name="nombres" type="text" required>
											</div>
										  </div>
										  <div class="control-group">
											<label class="control-label" for="apellidos">Apellidos</label>
											<div class="controls">
											  <input class="input-xlarge focused" maxlength="50" pattern="|^[a-zA-Z ñÑáÁéÉíÍóÓúÚüÜç]*$|" title="Este campo debe ser sólo letras" id="apellidos" name="apellidos" type="text" required>
											</div>
										  </div>
										  <div class="control-group">
											<label class="control-label" for="fechanacimiento">Fecha de Nacimiento</label>
											<div class="controls">
											  <input type="text" placeholder="dd/mm/YYYY" pattern="|^\d{2}/\d{2}/\d{4}$|" maxlength="10" title="Debe ingresar un formato de fecha correcto" class="input-xlarge datepicker" id="fechanacimiento" name="fechanacimiento" required>
											</div>
										  </div>					  
										  <div class="control-group">
											<label class="control-label" for="edad">Edad</label>
											<div class="controls">
											  <input class="input-xlarge focused" maxlength="2" pattern="|^\d{2}$|" title="Este campo sólo admite números" id="edad" name="edad" type="text" required>
											</div>
										  </div>
										  <div class="control-group">
											<label class="control-label" for="dni">DNI</label>
											<div class="controls">
											  <input class="input-xlarge focused" maxlength="8" pattern="|^\d{8}$|" title="Este campo debe tener 8 números" id="dni" name="dni" type="text" required>
											</div>
										  </div>
										  <div class="control-group">
											<label class="control-label" for="telefono">Teléfono</label>
											<div class="controls">
											  <input class="input-xlarge focused" placeholder="999999999" pattern="|^([0-9]+\s*)+$|" maxlength="12" title="Este campo sólo acepta 9 números obligatorios" id="telefono" name="telefono" type="text" required>
											</div>
										  </div>
										  <div class="control-group">
											<label class="control-label" for="email">Email</label>
											<div class="controls">
											  <input class="input-xlarge focused" maxlength="100" placeholder="example@domain.com" title="Debe ingresar un formato de email correcto" id="email" name="email" type="email" required>
											</div>
										  </div>					  
										  <div class="control-group">
											<label class="control-label" for="sexo">Sexo</label>
											<div class="controls">
											  <select id="sexo" name="sexo" required> 
												<option value="M">M</option>
												<option value="F">F</option>
											  </select>
											</div>
										  </div>	
										  <div class="control-group">
											<label class="control-label" for="cargo">Cargo</label>
											<div class="controls">
											  <select id="cargo" name="cargo" required>
											  		<option value="1">Cajero</option>
												  	<option value="2">Vendedor</option>
												  	<option value="3">Almacenero</option>
											  </select>
											</div>
										  </div>					  
										  <div class="control-group">
											<label class="control-label" for="estado">Estado</label>
											<div class="controls">
											  <select id="estado" name="estado" required>
												<option value="1">Habilitado</option>
												<option value="0">Inhabilitado</option>
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
							<h3>Editar Trabajador</h3>
						</div>
						<form id="EditarEmpleadoForm" class="form-horizontal" method="post" action="">
							<div class="modal-body">
								<fieldset>
										  <div class="control-group">
											<label class="control-label" for="nombres">Nombres</label>
											<div class="controls">
											  <input class="input-xlarge focused" maxlength="50" pattern="|^[a-zA-Z ñÑáÁéÉíÍóÓúÚüÜç]*$|" title="Este campo debe ser sólo letras" id="nombres" name="nombres" type="text" required value="Diego">
											</div>
										  </div>
										  <div class="control-group">
											<label class="control-label" for="apellidos">Apellidos</label>
											<div class="controls">
											  <input class="input-xlarge focused" maxlength="50" pattern="|^[a-zA-Z ñÑáÁéÉíÍóÓúÚüÜç]*$|" title="Este campo debe ser sólo letras" id="apellidos" name="apellidos" type="text" required value="Molina">
											</div>
										  </div>
										  <div class="control-group">
											<label class="control-label" for="fechanacimiento">Fecha de Nacimiento</label>
											<div class="controls">
											  <input type="text" class="input-xlarge datepicker" id="fechanacimientoE" name="fechanacimientoE" value="25/12/1989" required>
											</div>
										  </div>					  
										  <div class="control-group">
											<label class="control-label" for="edad">Edad</label>
											<div class="controls">
											  <input class="input-xlarge focused" maxlength="2" pattern="|^\d{2}$|" title="Este campo sólo admite números" id="edad" name="edad" type="text" required value="25">
											</div>
										  </div>
										  <div class="control-group">
											<label class="control-label" for="dni">DNI</label>
											<div class="controls">
											  <input class="input-xlarge focused" maxlength="8" pattern="|^\d{8}$|" title="Este campo debe tener 8 números" id="dni" name="dni" type="text" value="12345678" required>
											</div>
										  </div>
										  <div class="control-group">
											<label class="control-label" for="telefono">Teléfono</label>
											<div class="controls">
											  <input class="input-xlarge focused" placeholder="999999999" pattern="|^([0-9]+\s*)+$|" maxlength="12" title="Este campo sólo acepta 9 números obligatorios" id="telefono" name="telefono" type="text" value="123456" required>
											</div>
										  </div>
										  <div class="control-group">
											<label class="control-label" for="email">Email</label>
											<div class="controls">
											  <input class="input-xlarge focused" maxlength="100" placeholder="example@domain.com" title="Debe ingresar un formato de email correcto" id="email" name="email" type="email" value="diegomolina@email.com" required>
											</div>
										  </div>					  
										  <div class="control-group">
											<label class="control-label" for="sexo">Sexo</label>
											<div class="controls">
											  <select id="sexo" name="sexo" required> 
												<option value="M">M</option>
												<option value="F">F</option>
											  </select>
											</div>
										  </div>	
										  <div class="control-group">
											<label class="control-label" for="cargo">Cargo</label>
											<div class="controls">
											  <select id="cargo" name="cargo" required>
											  	<option value="1">Cajero</option>
											  	<option value="2">Vendedor</option>
											  	<option value="3">Almacenero</option>
											  </select>
											</div>
										  </div>					  
										  <div class="control-group">
											<label class="control-label" for="estado">Estado</label>
											<div class="controls">
											  <select id="estado" name="estado" required>
												<option value="1">Habilitado</option>
												<option value="0">Inhabilitado</option>
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
							<h3>Datos del Trabajador</h3>
						</div>
						<div id="VerEmpleadoForm" class="form-horizontal">
							<div class="modal-body">
								<fieldset>
									<div class="control-group">
										<label class="control-label" for="nombres">Nombres</label>
										<div class="controls">
											<span class="help-inline" style="padding-top:5px;">Diego</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="apellidos">Apellidos</label>
										<div class="controls">
											<span class="help-inline" style="padding-top:5px;">Molina</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="fechanacimiento">Fecha de Nacimiento</label>
										<div class="controls">
											<span class="help-inline" style="padding-top:5px;">25/12/1989</span>
										</div>
									</div>					  
									<div class="control-group">
										<label class="control-label" for="edad">Edad</label>
										<div class="controls">
											<span class="help-inline" style="padding-top:5px;">25</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="dni">DNI</label>
										<div class="controls">
											<span class="help-inline" style="padding-top:5px;">12345678</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="telefono">Teléfono</label>
										<div class="controls">
											<span class="help-inline" style="padding-top:5px;">123456</span>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="email">Email</label>
										<div class="controls">
											<span class="help-inline" style="padding-top:5px;">diegomolina@email.com</span>
										</div>
									</div>					  
									<div class="control-group">
										<label class="control-label" for="sexo">Sexo</label>
										<div class="controls">
											<span class="help-inline" style="padding-top:5px;">Masculino</span>
										</div>
									</div>	
									<div class="control-group">
										<label class="control-label" for="cargo">Cargo</label>
										<div class="controls">
											<span class="help-inline" style="padding-top:5px;">Cajero</span>
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
							<div class="modal-footer">
								<button type="reset" class="btn" data-dismiss="modal">Cerrar</button>
							</div>
						</div>
					</div>  
					    
					</div>
				</div><!--/span-->
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
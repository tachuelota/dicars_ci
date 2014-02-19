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
				<a href="admin_homepage.html">Administración</a>
				<span class="divider">/</span>
			</li>
			<li>
				<a href="admin_usuarios.html">Usuarios</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid">
		<div class="box span12">
			<div id="rootwizard">
				<div class="navbar">
					<div class="navbar-inner">
						<div class="container">
							<ul>
								<li>
									<a href="#tab1" data-toggle="tab">USUARIOS</a>
								</li>
								<li>
									<a href="#tab2" data-toggle="tab">PERMISOS</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div id="bar" class="progress progress-striped active">
				  <div class="bar"></div>
				</div>
				<form id="">
					<div class="tab-content">
						<div class="tab-pane box-content" id="tab1">
							<div class="form-horizontal">
								<div class="control-group">
									<label class="control-label" for="trabajador">Trabajador</label>
									<div class="controls">
										<input class="input-xlarge" id="nombre_trabajador" type="text" readonly required>
										<input id="trabajador" name="trabajador" type="hidden">
										<input id="email" name="email" type="hidden">
										<button id="btn-trabajador" name="btn-trabajador" class="btn btn-info btn-trabajador" style="margin-left: 15px;"> <i class="icon-user icon-white"></i>
										</button>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="usuario_id">Usuario ID</label>
									<div class="controls">
										<input class="input-xlarge focused" id="usuario_id" name="usuario_id" type="text" pattern="|^[a-zA-Z0-9]+$|" title="El usuario puede contener leras y números" maxlength="20" required></div>
								</div>

								<div class="control-group">
									<label class="control-label" for="contrasena">Contraseña</label>
									<div class="controls">
										<input class="input-xlarge focused" id="contrasena" name="contrasena" type="password" required></div>
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
								
							</div>
						</div>
						<div class="tab-pane" id="tab2">
							<div class="form-actions">
									<button id="agregar_usuario" type="submit" class="btn btn-primary">Agregar</button>
									<button id="btn-cancelar" class="btn">Cancelar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="box-content">
				<table id="usuarios_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>
					administracion/Servicios/get_usuarios">
					<thead>
						<tr>
							<th>Usuario ID</th>
							<th>Trabajador</th>
							<th>Último Login</th>
							<th>Estado</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
			<div class="modal hide fade" id="modalBuscarTrabajador">
				<div class="modal-header">
					<h3>Trabajadores</h3>
				</div>
				<div class="modal-body">
					<table id="select_trabajador_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source = "<?php echo base_url();?>
						administracion/Servicios/get_trabajadores_activos">
						<thead>
							<tr>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>DNI</th>
								<th>Teléfono</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
					<a  id="select_trabajador" href="#" class="btn btn-primary">Seleccionar</a>
				</div>
			</div>
		</div>
	</div>
	<!-- content ends -->
</div>
<!--/#content.span10-->
</div>
<!--/fluid-row-->
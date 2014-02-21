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
				<a href="<?php echo base_url();?>administracion">Administración</a>
				<span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo base_url();?>administracion/views/usuarios">Usuarios</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>USUARIOS</h2>
				<div class="box-icon">
					<a href="#" class="btn btn-round btn-registrar" alt="Registrar Categoría"> <i class="icon-plus"></i>
					</a>
				</div>
			</div>
			<div class="box-content">
				<div id="rootwizard">
					<div class="box-content">
						<ul class="nav nav-tabs">
							<li>
								<a href="#tab1" data-toggle="tab">DATOS</a>
							</li>
							<li>
								<a href="#tab2" data-toggle="tab">PERMISOS</a>
							</li>
						</ul>
					</div>
					<div >
						<div id="bar" class="progress progress-striped active">
						  <div class="bar"></div>
						</div>
					</div>
					<form id="UsuarioForm" action-1="<?php echo base_url();?>auth/create_user" action-2="<?php echo base_url();?>auth/edit_user">
						<div class="tab-content">
							<div class="tab-pane" id="tab1">
								<div class="form-horizontal box-content">
									<div class="control-group">
										<label class="control-label" for="trabajador">Trabajador</label>
										<div class="controls">
											<input class="input-xlarge validate[required]" id="nombre_trabajador" type="text" readonly>
											<input id="trabajador" name="nPersonal_id" type="hidden">
											<input id="user_id" name="user_id" type="hidden" >
											<input id="email" name="email" type="hidden">
											<button type="button" id="btn-trabajador" name="btn-trabajador" class="btn btn-info btn-trabajador" style="margin-left: 15px;"> <i class="icon-user icon-white"></i>
											</button>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="username">Usuario ID</label>
										<div class="controls">
											<input class="input-xlarge focused validate[required]" id="username" name="username" type="text" title="El usuario puede contener leras y números" maxlength="20"></div>
									</div>

									<div class="control-group">
										<label class="control-label" for="contrasena">Contraseña</label>
										<div class="controls">
											<input class="input-xlarge focused validate[equals[password],minSize[8]]" id="password" name="password" type="password">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="recontrasena">Re. Contraseña</label>
										<div class="controls">
											<input class="input-xlarge focused validate[equals[password]]" type="password" name="password2" id="password2">
										</div>
									</div>									
								</div>
							</div>
							<div class="tab-pane" id="tab2" data-source="<?php echo base_url();?>administracion/servicios/get_groupsbyUser/">
								<div class="form-horizontal row-fluid">
									<div class="span4 box-content">
										<h4 class="top-block">Ventas</h4>
										<?php foreach ($groups_ventas as $group):?>
											<label class="checkbox">
												<div class="checker">
													<span>
														<input class="validate[required] validate[minCheckbox[1]]" type="checkbox" id="group<?php echo $group['id'];?>" name="groups[]" value="<?php echo $group['id'];?>"name="groups[]" value="<?php echo $group['id'];?>" style="opacity: 0;">
													</span>
												</div> <?php echo $group['name'];?>					
											</label>
										<?php endforeach?>
									</div>
									<div class="span4 box-content">
										<h4 class="top-block">Logistica</h4>
										<?php foreach ($groups_logistica as $group):?>
											<label class="checkbox">
												<div class="checker">
													<span>
														<input class="validate[minCheckbox[1]]" type="checkbox" id="group<?php echo $group['id'];?>" name="groups[]" value="<?php echo $group['id'];?>" name="groups[]" value="<?php echo $group['id'];?>" style="opacity: 0;">
													</span>
												</div> <?php echo $group['name'];?>					
											</label>
										<?php endforeach?>
									</div>
									<div class="span4 box-content">
										<h4 class="top-block">Administracion</h4>
										<?php foreach ($groups_administracion as $group):?>
											<label class="checkbox">
												<div class="checker">
													<span>
														<input class="validate[minCheckbox[1]]" type="checkbox" id="group<?php echo $group['id'];?>" name="groups[]" value="<?php echo $group['id'];?>" name="groups[]" value="<?php echo $group['id'];?>" style="opacity: 0;">
													</span>
												</div> <?php echo $group['name'];?>					
											</label>
										<?php endforeach?>
									</div>
								</div>
							</div>
						</div>
						<div class="box-content">
							<ul class="pager wizard">
								<li class="previous"><a href="#">Anterior</a></li>
							  	<li class="next"><a href="#">Siguiente</a></li>
								<li ><a style="float:right" id="btn_cancelar" href="#">Cancelar</a></li>
							  	<li class="next finish current" id="btn-reg-usuario" style="display:none;"><a class="btn-info" href="javascript:;">Registrar</a></li>						  	
							  	<li class="next finish" id="btn-update-usuario" style="display:none;"><a class="btn-info" href="javascript:;">Guardar</a></li>
							</ul>
						</div>
					</form>
				</div>
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
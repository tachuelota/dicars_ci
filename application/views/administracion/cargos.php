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
						<a href="<?php echo base_url();?>administracion/">Administración</a><span class="divider">/</span>
					</li>
					<li>
						<a href="<?php echo base_url();?>administracion/views/cargos">Cargos</a>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>CARGOS</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-round btn-registrar" alt="Registrar Clase"><i class="icon-plus"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="cargos_table" data-source = "<?php echo base_url();?>administracion/servicios/getcargos">
							<thead>
								<tr>
									<th>Nombre del Cargo</th>
									<th>Estado</th>
								</tr>
							</thead>   
							<tbody>
							</tbody>
						</table>
						<div class="modal hide fade" id="modalRegistroCargo">
							<div class="modal-header">
								<h3>Registrar Cargo</h3>
							</div>
							<form id="RegistrarCargoForm" class="form-horizontal" method="post" action="">
								<div class="modal-body">
									<fieldset>
									  	<div class="control-group">
											<label class="control-label" for="nom_cargo">Nombre de Cargo</label>
											<div class="controls">
										  		<input class="input-xlarge focused" id="nom_cargo" name="nom_cargo" type="text" pattern="|^[a-zA-Z ñÑáéíóúüç.0-9]*$|" required>
											</div>
									  	</div>
									  	<div class="control-group">
											<label class="control-label" for="selectEstado">Estado</label>
											<div class="controls">
										  		<select id="selectEstado" name="selectEstado" required>
													<option value="1">Habilitado</option>
													<option value="0">Inhabilitado</option>
												</select>
											</div>
									  	</div>
									</fieldset>
								</div>
								<div class="modal-footer">
									<button type="reset" class="btn btn-cancelarprov" data-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn btn-primary ">Guardar</button>
								</div>
							</form>
						</div>
						<div class="modal hide fade" id="modalEditarDatos" >
							<div class="modal-header">
								<h3>Datos del Cargo</h3>
							</div>
							<div class="modal-body">
								<form id="EditarCargoForm" class="form-horizontal" method="post" action="">
									<fieldset>
									  	<div class="control-group">
											<label class="control-label" for="nom_cargo">Nombre de Cargo</label>
											<div class="controls">
												<span class="help-inline" style="padding-top:5px;">Administrador</span>
											</div>
									  	</div>
									  	<div class="control-group">
											<label class="control-label" for="selectEstado">Estado</label>
											<div class="controls">
										  		<select id="selectEstado" name="selectEstado" required>
													<option value="1">Habilitado</option>
													<option value="0">Inhabilitado</option>
												</select>
											</div>
									  	</div>
									</fieldset>
								</form>
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn btn-cancelarprov" data-dismiss="modal">Cerrar</button>
							</div>
						</div>
					</div>
				</div>
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
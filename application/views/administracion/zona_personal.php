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
						<h2>ZONAS ASIGNADAS</h2>
					</div>
					<div class="box-content">
						<form id="RegistrarZonapersonalForm" class="form-horizontal" method="post" action="">
							<fieldset>
								<div class="control-group">
									<label class="control-label" for="nombre_trabajador">Trabajador</label>
									<div class="controls">
										<input class="input-xlarge" id="nombre_trabajador" type="text" readonly required>
										<input id="id_trabajador" name="id_trabajador" type="hidden">
										<button class="btn btn-info" id="btn-trabajador" style="margin-left: 15px;"><i class="icon-user icon-white"></i></button>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="nombre_zona">Zona</label>
									<div class="controls">
										<input class="input-xlarge" id="nombre_zona" type="text" readonly required>
										<input id="id_zona" name="id_zona" type="hidden">
										<button class="btn btn-info" id="btn-zona" style="margin-left: 15px;"><i class="icon-user icon-white"></i></button>
									</div>
								</div>
								<div class="form-actions">
									<button id="agregar_usuario" type="submit" class="btn btn-primary">Asignar</button>
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
											  <th>Diego</th>
											  <th>Molina</th>
											  <th>12345678</th>
											  <th>147258</th>
										  </tr>
										  <tr>
											  <th>Arturo</th>
											  <th>Méndez</th>
											  <th>36925814</th>
											  <th>258369</th>
										  </tr>
									  </tbody>
								  </table> 
							</div>	
							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
								<a  id="select_trabajador" href="#" class="btn btn-primary">Seleccionar</a>
							</div>
						</div>
						<div class="modal hide fade" id="modalBuscarZona">
							<div class="modal-header">
								<h3>Zonas</h3>
							</div>
							<div class="modal-body">
							<table class="table table-striped table-bordered bootstrap-datatable datatable" id="zonas_table">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Estado</th>
										<th>Ubigeo</th>
									</tr>
								</thead>     
								<tbody>
									<tr>
										<th>Zona 1</th>
										<th>Habilitada</th>
										<th>Trujillo - Trujillo - La Libertad</th>
									</tr>
									<tr>
										<th>Zona 2</th>
										<th>Habilitada</th>
										<th>Tumbes - Tumbes - Tumbes</th>
									</tr>
								</tbody>
							</table>	
							</div>
							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
								<a  id="select_zona" href="#" class="btn btn-primary">Seleccionar</a>
							</div>
						</div>							
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="zonapersonal_table">
						  <thead>
							  <tr>
								  <th>Nombre</th>
								  <th>Encargado</th>
								  <th>Estado</th>
								  <th>Ubigeo</th>
								  <th></th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<tr>
								  <th>Zona 3</th>
								  <th>Pedro Casas</th>
								  <th>Habilitada</th>
								  <th>Aguas Verdes - Zarumilla - Tumbes</th>
								  <th><a class='btn btn-info btn-editar' href='admin_zona_edit.html'><i class='icon-edit icon-white'></i>Editar</a></th>
							  </tr>
						</tbody>
					</table>
					</div>
				</div><!--/span-->
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
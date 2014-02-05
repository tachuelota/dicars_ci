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
						<form id="EditarZonapersonalForm" class="form-horizontal" method="post" action="">
							<fieldset>
								<div class="control-group">
									<label class="control-label" for="nombre_zona">Zona</label>
									<div class="controls">
										<input class="input-xlarge" id="nombre_zona" type="text" value="Zona 3" readonly required>
										<input id="idzona" name="idzona" type="hidden">
										<button class="btn btn-info" id="btn-zona" style="margin-left: 15px;"><i class="icon-user icon-white"></i></button>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="nombre_trabajador">Trabajador</label>
									<div class="controls">
										<input class="input-xlarge" id="nombre_trabajador" type="text" value="Pedro Casas" readonly>
									</div>
								</div>
								<div class="form-actions">
									<button id="agregar_usuario" type="submit" class="btn btn-primary">Asignar</button>
									<a class="btn" href="admin_zona_personal.html">Cancelar</a>
							  	</div>
							</fieldset>
						</form>
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
				</div><!--/span-->
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
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
						<a  href="<?php echo base_url();?>administracion/views/zona_personal">Zonas Personal</a>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>ZONAS ASIGNADAS</h2>
					</div>
					<div class="box-content">
						<form id="ZonapersonalForm" class="form-horizontal" method="post" action-1="<?php echo base_url();?>administracion/Zona_Personal/registrar" data-source="<?php echo base_url();?>administracion/servicios/getUbigeo">
							<input type="hidden" id="idZonapersonal" name="idZonapersonal">
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
									<button id="btn-reg-usuario" type="button" class="btn btn-primary ">Asignar</button>
									<button type="reset" class="btn">Limpiar Campos</button>
							  	</div>
							</fieldset>
						</form>
						<div class="modal hide fade" id="modalBuscarTrabajador">
							<div class="modal-header">
								<h3>Trabajadores</h3>
							</div>
							<div class="modal-body">
								<table id="select_trabajador_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source = "<?php echo base_url();?>administracion/servicios/get_trabajadores_sinzona">
									  <thead>
										  <tr>
											  <th>Nombres</th>
											  <th>Apellidos</th>
											  <th>DNI</th>
											  <th>Teléfono</th>
										  </tr>
									  </thead>
									  <tbody>
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
							<table id="select_zona_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source= "<?php echo base_url();?>administracion/servicios/getzonas">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Estado</th>
										<th>Ubigeo</th>
									</tr>
								</thead>     
								<tbody></tbody>
							</table>	
							</div>
							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
								<a id="select_zona" href="#" class="btn btn-primary">Seleccionar</a>
							</div>								
							</div>
						</div>							
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="zonapersonal_table" data-source="<?php echo base_url();?>administracion/servicios/getZonasPersonal">
							  <thead>
								  <tr>
									  <th>Nombre</th>
									  <th>Encargado</th>
									  <th>Ubigeo</th>
								  </tr>
							  </thead>   
							  <tbody></tbody>
						</table>
					</div>
				</div><!--/span-->
			</div><!-- content ends -->
			</div><!--/#content.span10-->
			</div><!--/fluid-row-->

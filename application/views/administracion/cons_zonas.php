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
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="zonas_table" data-source = "<?php echo base_url();?>administracion/servicios/getZonas">
						  <thead>
							  <tr>
								  <th>Nombre</th>
								  <th>Estado</th>
								  <th>Ubigeo</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	<tr>
							 </tr>
						</tbody>
					</table>
					<div class="modal hide fade" id="modalZonas">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">x</button>
							<h3>Registrar Zona</h3>
						</div>
						<form id="ZonasForm" class="form-horizontal" method="post" action-1="<?php echo base_url();?>administracion/Zonas/registrar" action-2="<?php echo base_url();?>administracion/Zonas/editar">
							<input type="hidden" id="idZonas" name="idZonas">
							<div class="modal-body">
								<fieldset>
									<div class="control-group">
										<label class="control-label" for="desc">Nombre de la Zona</label>
										<div class="controls">
									  		<input class="input-xlarge focused" id="desc" name="desc" type="text" >
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
									  			<option value="1">Tumbes</option>
									  			<option value="1">Aguas Verdes</option>
											</select>
										</div>
								  	</div>
								</fieldset>
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn" data-dismiss="modal">Cancelar</button>
								<button id="btn-reg-zonas" type="button" class="btn btn-primary ">Registrar</button>
									<button id="btn-editar-zonas" type="button" class="btn btn-primary " style="display:none">Editar</button>
							</div>
						</form>
					</div>
					</div>
				</div><!--/span-->
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
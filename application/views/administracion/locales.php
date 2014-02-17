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
						<a  href="<?php echo base_url();?>administracion/views/locales">Locales</a>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>Locales</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-registrar btn-round" alt="Registrar Local"><i class="icon-plus"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="locales_table" data-source = "<?php echo base_url();?>administracion/servicios/getLocales">
						  	<thead>
								<tr>
								  	<th>Nombre</th>
								  	<th>Teléfono</th>
								  	<th>Dirección</th>
								  	<th>Tipo de Rubro</th>								  	
								  	<th>Estado</th>
							  	</tr>
						  	</thead>   
							<tbody>
							</tbody>
						</table>
					<div class="modal hide fade" id="modalLocales">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">x</button>
							<h3>Registrar Local</h3>
						</div>
						<form id="LocalesForm" class="form-horizontal" method="post"  action-1="<?php echo base_url();?>administracion/Locales/registrar" action-2="<?php echo base_url();?>administracion/Locales/editar" data-source="<?php echo base_url();?>administracion/servicios/getUbigeo">
							<input type="hidden" id="idlocal" name="idlocal">
							<div class="modal-body">
								<fieldset>
									<div class="control-group">
										<label class="control-label" for="nombre_tienda">Nombre de la Tienda</label>
										<div class="controls">
									  		<input class="input-xlarge focused" id="nombre_tienda" name="nombre_tienda" type="text">
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="estado">Estado</label>
										<div class="controls">
									  		<select id="estado" name="estado">
												<option value="1">Habilitado</option>
												<option value="0">Inhabilitado</option>
											</select>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="direccion">Dirección</label>
										<div class="controls">
									  		<input class="input-xlarge focused" id="direccion" name="direccion" type="text" pattern="|^[a-zA-Z0-9 ñÑáÁéÉíÍóÓúÚüÜç]+$|" maxlength="150" required>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="telefono">Teléfono</label>
										<div class="controls">
									  		<input class="input-xlarge focused" id="telefono" name="telefono" type="text" placeholder="999999999" pattern="|^[0-9]{9}$|" title="Sólo números de 9 dígitos" maxlength="9" required>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="tiprub">Tipo de Rubro</label>
										<div class="controls">
									  		<select id="tiprub" name="tiprub">
									  			<option value="1">Ropa</option>
									  			<option value="2">Acessorios</option>
									  			<option value="3">Calzado</option>
											</select>
										</div>
								  	</div>
								  	<h4>Ubigeo</h4>
								  	<hr>
								  	<div class="control-group">
										<label class="control-label" for="dep">Departamento</label>
										<div class="controls">
									  		<select id="dep" name="dep">
											</select>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="prov">Provincia</label>
										<div class="controls">
									  		<select id="prov" name="prov">
											</select>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="dist">Distrito</label>
										<div class="controls">
									  		<select id="dist" name="dist">
											</select>
										</div>
								  	</div>
								</fieldset>
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn" data-dismiss="modal">Cancelar</button>
								<button id="btn-reg-local" type="button" class="btn btn-primary ">Registrar</button>
								<button id="btn-editar-local" type="button" class="btn btn-primary " style="display:none">Editar</button>
							</div>
						</form>
					</div>   
					</div>
				</div><!--/span-->
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
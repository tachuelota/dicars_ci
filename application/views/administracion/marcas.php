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
						<a href="admin_marcas.html">Marcas</a>
					</li>
				</ul>
			</div>  
	       	<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>MARCAS</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-round btn-registrar" alt="Registrar Marcas"><i class="icon-plus"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="marcas_table">
							<thead>
								<tr>
									<th>Nombre</th>
								  	<th>Estado</th>
								  	<th></th>
							  	</tr>
							</thead>
							<tbody>
								<tr>
									<td>Marca 1</td>
								  	<td>Habilitada</td>
								  	<td><a class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a></td>
							  	</tr>
							</tbody>
						</table>
						<div class="modal hide fade" id="modalRegistroMarca">
							<div class="modal-header">
								<h3>Registrar Marca</h3>
							</div>
							<form id="RegistrarMarcaForm" class="form-horizontal" method="post" action="">
								<div class="modal-body">
									<fieldset>
									  	<div class="control-group">
											<label class="control-label" for="desc_marca">Nombre de Marca</label>
											<div class="controls">
										  		<input class="input-xlarge focused" id="desc_marca" name="desc_marca" type="text" pattern="|^[a-zA-Z ñÑáéíóúüç.0-9]*$|" required >
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
									<button type="reset" class="btn" data-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn btn-primary ">Guardar</button>
								</div>
							</form>
						</div>
						<div class="modal hide fade" id="modalEditarDatos">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">x</button>
								<h3>Editar Marca</h3>
							</div>
							<form id="EditarMarcaForm" class="form-horizontal" method="post" action="">
								<div class="modal-body">
									<fieldset>
									  	<div class="control-group">
											<label class="control-label" for="desc_marca">Nombre de Marca</label>
											<div class="controls">
												<span class="help-inline" style="padding-top:5px;">Marca 1</span>
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
									<button type="reset" class="btn" data-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn btn-primary ">Guardar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
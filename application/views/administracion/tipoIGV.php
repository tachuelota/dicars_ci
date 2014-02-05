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
						<a href="admin_homepage.html">Administrar</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="admin_tipo_igv.html">Tipo IGV</a>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>TIPOS DE IGV</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-registrar btn-round" alt="Registrar Oferta"><i class="icon-plus"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table id="tipo_igv_table" class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
								<tr>
									<th>Tipo</th>
									<th>Porcentaje (%)</th>
									<th>Fecha Registro</th>
									<th>Estado</th>
									<th></th>
								</tr>
							</thead>   
							<tbody>
								<tr>
									<td>IGV</td>
									<td>18</td>
									<td>10/01/2013</td>
									<td>Habilitado</td>
									<td><a class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a></td>
								</tr>
							</tbody>
						</table>		
						<div class="modal hide fade" id="modalRegistroTipoIGV" style="width: 650px;">
							<div class="modal-header">
								<h3>Registrar Tipo IGV</h3>
							</div>
							<form id="RegistrarTipoForm" class="form-horizontal" method="post" action="">
								<div class="modal-body">
									<fieldset>
										<div class="control-group">
											<label class="control-label" for="tipo">Tipo IGV</label>
											<div class="controls">
										  		<input class="input-xlarge focused" id="tipo" name="tipo" type="text" pattern="|^[a-zA-Z0-9 ñÑáÁéÉíÍóÓúÚüÜç-]+$|" maxlength="11" required>
											</div>
									  	</div>
									  	<div class="control-group">
											<label class="control-label" for="porc">Porcentaje</label>
											<div class="controls">
										  		<input id="porc" name="porc" type="number" step="0.01" min="1" max="100" required>
											</div>
									  	</div>
									  	<div class="control-group">
											<label class="control-label" for="estado">Estado</label>
											<div class="controls">
										  		<select id="estado" name="estado" data-rel="chosen">
												<option value="1">Habilitado</option>
												<option value="2">Deshabilitado</option>
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
					</div>
					
					
					<div class="modal hide fade" id="modalEditarDatos">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">x</button>
							<h3>Editar Tipo IGV</h3>
						</div>
						<div class="modal-body">
							<form id="EditarTipoIGVForm" class="form-horizontal" method="post" action="">
								<div class="modal-body">
									<fieldset>
										<div class="control-group">
											<label class="control-label" for="tipo">Tipo IGV</label>
											<div class="controls">
										  		<input class="input-xlarge focused" id="tipo" name="tipo" type="text" pattern="|^[a-zA-Z0-9 ñÑáÁéÉíÍóÓúÚüÜç-]+$|" maxlength="11" value="IGV" readonly required>
											</div>
									  	</div>
									  	<div class="control-group">
											<label class="control-label" for="porc">Porcentaje</label>
											<div class="controls">
										  		<input id="porc" name="porc" type="number" step="0.01" min="1" max="100" value="18" required>
											</div>
									  	</div>
									  	<div class="control-group">
											<label class="control-label" for="estado">Estado</label>
											<div class="controls">
										  		<select id="estadoE" name="estadoE" data-rel="chosen">
												<option value="1">Habilitado</option>
												<option value="2">Deshabilitado</option>
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
					</div>
					
				</div><!--/span-->
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
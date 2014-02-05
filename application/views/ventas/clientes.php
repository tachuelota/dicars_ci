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
						<a href="index.html">Home</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="admin_homepage.html">Administración</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="ventas_clientes.html">Clientes</a>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>CLIENTES</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-registrar btn-round" alt="Registrar Cliente"><i class="icon-plus"></i></a>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span6">
						</div>
						<div class="span6">
							<input id="pdfgen" type="button" value="Reporte General" class="btn btn-success" style="float: right; margin: 10px 10px 0 0;"/>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="clientes_table">
							<thead>
								<tr>
									<th>Nombre y Apellidos</th>
								  	<th>DNI</th>
								  	<th>Línea de Crédito</th>
								  	<th></th>
								  	<th></th>			  
							  	</tr>
						  	</thead>
						  	<tbody>
						  		<tr>
									<th>Lourdes Paredes</th>
								  	<th>85236974</th>
								  	<th>1000</th>
								  	<th><a class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a></th>
								  	<th><a class='btn btn-info btn-editar' href='#'><i class='icon-edit icon-white'></i>Editar</a></th>			  
							  	</tr>
						  	</tbody>
					  	</table>  
			  			<div class="modal hide fade" id="modalRegistro">
							<div class="modal-header">
								<h3>Registrar Cliente</h3>
							</div>
							<form id="RegistrarClienteForm" class="form-horizontal" method="post" action="">
								<div class="modal-body">
									<fieldset>
										<div class="control-group">
											<label class="control-label" for="nombres">Nombres</label>
											<div class="controls">
										 		<input class="input-xlarge focused" maxlength="50" required pattern="|^[a-zA-Z ñÑáÁéÉíÍóÓúÚüÜç]*$|" title="Este campo debe ser sólo letras" name="nombres" id="focusedInput" type="text">
											</div>
										</div>
										 <div class="control-group">
											<label class="control-label" for="apellidos">Apellidos</label>
											<div class="controls">
										  		<input class="input-xlarge focused" maxlength="50" required pattern="|^[a-zA-Z ñÑáÁéÉíÍóÓúÚüÜç]*$|" title="Este campo debe ser sólo letras" name="apellidos" id="focusedInput" type="text">
											</div>
										</div>			
										 <div class="control-group">
											<label class="control-label" for="dni">DNI</label>
											<div class="controls">
											  	<input class="input-xlarge focused" maxlength="8" required pattern="|^\d{8}$|" title="Este campo debe tener 8 números" name="dni" id="focusedInput" type="text">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="direccion">Dirección</label>
											<div class="controls">
												 <input class="input-xlarge focused" required pattern="|^([a-zA-ZñÑáÁéÉíÍóÓúÚüÜç0-9.]+\s*)+$" maxlength="200" name="direccion" id="focusedInput" type="text">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="referencia">Referencia</label>
											<div class="controls">
											  <input class="input-xlarge focused" value=" " required pattern="|^[a-zA-Z ñÑáÁéÉíÍóÓúÚüÜç0-9.]+$" maxlength="200" name="referencia" id="focusedInput" type="text">
											</div>
										</div>			
										<div class="control-group">
											<label class="control-label" for="ocupacion">Ocupación</label>
											<div class="controls"> 
											  <input class="input-xlarge focused" value=" " required pattern="|^[a-zA-Z ñÑáÁéÉíÍóÓúÚüÜç]+$|" title="Este campo debe ser sólo letras" maxlength="40" name="ocupacion" type="text">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="lineaop">Línea Operativa</label>
											<div class="controls">
											  <input class="input-xlarge focused" name="lineaop" id="lineaop" type="number" step="0.10" min="0" max="1000" required>
											</div>
										</div>
										
										<div class="control-group">
										<label class="control-label" for="zona">Zona</label>
										<div class="controls">
										  <select id="zona" name="zona">
										  </select>
										</div>
										</div>
									</fieldset>
								</div>
								<div class="modal-footer">
									<button type="reset" class="btn" data-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn btn-primary">Guardar</button>
								</div>
							</form>
						</div>
					     
						<div class="modal hide fade" id="modalEditarDatos">
							<div class="modal-header">
								<h3>Editar Cliente</h3>
							</div>
							<form id="EditarClienteForm" class="form-horizontal" method="post" action="">
								<div class="modal-body">
									<fieldset>
										<div class="control-group">
											<label class="control-label" for="nombres">Nombres</label>
											<div class="controls">
										 		<input class="input-xlarge focused" maxlength="50" required pattern="|^[a-zA-Z ñÑáÁéÉíÍóÓúÚüÜç]*$|" title="Este campo debe ser sólo letras" name="nombres" id="focusedInput" type="text" value="Lourdes">
											</div>
										</div>
										 <div class="control-group">
											<label class="control-label" for="apellidos">Apellidos</label>
											<div class="controls">
										  		<input class="input-xlarge focused" maxlength="50" required pattern="|^[a-zA-Z ñÑáÁéÉíÍóÓúÚüÜç]*$|" title="Este campo debe ser sólo letras" name="apellidos" id="focusedInput" type="text" value="Paredes">
											</div>
										</div>			
										 <div class="control-group">
											<label class="control-label" for="dni">DNI</label>
											<div class="controls">
											  	<input class="input-xlarge focused" maxlength="8" required pattern="|^\d{8}$|" title="Este campo debe tener 8 números" name="dni" id="focusedInput" type="text" value="85236974">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="direccion">Dirección</label>
											<div class="controls">
												 <input class="input-xlarge focused" required pattern="|^([a-zA-ZñÑáÁéÉíÍóÓúÚüÜç0-9.]+\s*)+$" maxlength="200" name="direccion" id="focusedInput" type="text" value="Mi Casa 456">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="referencia">Referencia</label>
											<div class="controls">
											  <input class="input-xlarge focused" required pattern="|^[a-zA-Z ñÑáÁéÉíÍóÓúÚüÜç0-9.]+$" maxlength="200" name="referencia" id="focusedInput" type="text" value="...">
											</div>
										</div>			
										<div class="control-group">
											<label class="control-label" for="ocupacion">Ocupación</label>
											<div class="controls"> 
											  <input class="input-xlarge focused" required pattern="|^[a-zA-Z ñÑáÁéÉíÍóÓúÚüÜç]+$|" title="Este campo debe ser sólo letras" maxlength="40" name="ocupacion" type="text" value="Empresaria">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="lineaop">Línea Operativa</label>
											<div class="controls">
											  <input class="input-xlarge focused" name="lineaop" id="lineaop" type="number" step="0.10" min="0" max="1000" required value="1000">
											</div>
										</div>
										
										<div class="control-group">
										<label class="control-label" for="zona">Zona</label>
										<div class="controls">
										  <select id="zona" name="zona">
										  	<option value="1">Zona 1</option>
										  	<option value="2">Zona 2</option>
										  	<option value="3">Zona 3</option>
										  </select>
										</div>
										</div>
									</fieldset>
								</div>
								<div class="modal-footer">
									<button type="reset" class="btn" data-dismiss="modal">Cancelar</button>
									<button type="submit" class="btn btn-primary">Guardar</button>
								</div>
							</form>
						</div>		
					
						<div class="modal hide fade" id="modalVerDatos">
							<div class="modal-header">
								<h3>Datos del Cliente</h3>
							</div>
							<div id="VerClienteForm" class="form-horizontal">
								<div class="modal-body">
									<fieldset>
										<div class="control-group">
											<label class="control-label" for="nombres">Nombres</label>
											<div class="controls">
												<span class="help-inline" style="padding-top:5px;">Lourdes</span>
											</div>
										</div>
										 <div class="control-group">
											<label class="control-label" for="apellidos">Apellidos</label>
											<div class="controls">
										  		<span class="help-inline" style="padding-top:5px;">Paredes</span>
											</div>
										</div>			
										 <div class="control-group">
											<label class="control-label" for="dni">DNI</label>
											<div class="controls">
											  	<span class="help-inline" style="padding-top:5px;">85236974</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="direccion">Dirección</label>
											<div class="controls">
												<span class="help-inline" style="padding-top:5px;">Mi Casa 456</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="referencia">Referencia</label>
											<div class="controls">
											  	<span class="help-inline" style="padding-top:5px;">...</span>
											</div>
										</div>			
										<div class="control-group">
											<label class="control-label" for="ocupacion">Ocupación</label>
											<div class="controls"> 
											  	<span class="help-inline" style="padding-top:5px;">Empresaria</span>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="lineaop">Línea Operativa</label>
											<div class="controls">
											  	<span class="help-inline" style="padding-top:5px;">1000</span>
											</div>
										</div>
										
										<div class="control-group">
										<label class="control-label" for="zona">Zona</label>
										<div class="controls">
										  	<span class="help-inline" style="padding-top:5px;">Zona 1</span>
										</div>
										</div>
									</fieldset>
								</div>
								<div class="modal-footer">
									<button type="reset" class="btn" data-dismiss="modal">Cerrar</button>
								</div>
							</div>
						</div>
					</div>
					<div class="modal hide fade" id="exportmodal">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">×</button>
							<h3>EXPORTAR</h3>
						</div>
						<div class="modal-body">
							<form method="post" target="_blank" id="CreatePDFForm">
								<input type="hidden" name="title" id="title"/>
								<input type="hidden" name="table_clientes" id="table_clientes"/>
								<div class="sortable row-fluid ui-sortable">
									<a id="pdfbutton" data-rel="tooltip" class="well span3 top-block" style="width: 48%;" href="#" data-original-title="Exportar a PDF.">
										<span class="icon32 icon-color icon-pdf"></span>
										<div>PDF</div>
									</a>
					
									<a id="xlsutton" data-rel="tooltip" class="well span3 top-block" style="width: 48%;" href="#" data-original-title="Exportar a Excel.">
										<span class="icon32 icon-color icon-xls"></span>
										<div>Excel</div>
									</a>
								</div>
							</form>				
						</div>
					</div>
				</div><!--/span-->
			</div><!-- content ends -->
			</div><!--/#content.span10-->
			</div><!--/fluid-row-->
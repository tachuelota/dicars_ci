<noscript>
<div class="alert alert-block span10">
	<h4 class="alert-heading">Warning!</h4>
	<p>	Necesitas tener<a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
		habilitado para usar este sitio.
	</p>
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
			<a href="<?php echo base_url();?>ventas">Ventas</a> <span class="divider">/</span>
			</li>
			<li>
			<a href="<?php echo base_url();?>ventas/views/clientes">Clientes</a>
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
					<table class="table table-striped table-bordered bootstrap-datatable datatable" id="clientes_table" data-source="<?php echo base_url();?>ventas/servicios/getclientes">
						<thead>
							<tr>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>DNI</th>
							<th>Línea de Crédito</th>	
							</tr>
						</thead>
						<tbody>
							<tr>	
							</tr>
						</tbody>
					</table>
				<div class="modal hide fade" id="modalClientes">
					<div class="modal-header">
						<h3>Registrar Cliente</h3>
					</div>
					<form id="ClienteForm" class="form-horizontal" method="post" action-1="<?php echo base_url();?>ventas/clientes/registrar" action-2="<?php echo base_url();?>ventas/clientes/editar" data-source="<?php echo base_url();?>administracion/servicios/getUbigeo">	
						<input type="hidden" id="idClientes" name="idClientes">
							<div class="modal-body">
								<fieldset>
									<div class="control-group">
										<label class="control-label" for="nombres">Nombres</label>
										<div class="controls">
											<input class="input-xlarge focused" maxlength="50" title="Este campo debe ser sólo letras" name="nombres" id="focusedInput" type="text">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="apellidos">Apellidos</label>
										<div class="controls">
											<input class="input-xlarge focused" maxlength="50" title="Este campo debe ser sólo letras" name="apellidos" id="focusedInput" type="text">
										</div>
									</div>	
									<div class="control-group">
										<label class="control-label" for="dni">DNI</label>
										<div class="controls">
											<input class="input-xlarge focused" maxlength="8" title="Este campo debe tener 8 números" name="dni" id="focusedInput" type="text">
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
									<h4>Ubigeo</h4>
									<hr>
								  	<div class="control-group">
										<label class="control-label" for="dep">Departamento</label>
										<div class="controls">
									  		<select id="dep" name="dep" class="ubigeo">
											</select>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="prov">Provincia</label>
										<div class="controls">
									  		<select id="prov" name="prov" class="ubigeo">
											</select>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="dist">Distrito</label>
										<div class="controls">
									  		<select id="dist" name="dist" class="ubigeo">
											</select>
										</div>
								  	</div>
								  	<div class="control-group">
										<label class="control-label" for="zonas">Zonas</label>
										<div class="controls">
									  		<select id="zonas" name="zonas" class="ubigeo" data-source="<?php echo base_url();?>administracion/servicios/get_ZonaByUbigeo/">
											</select>
										</div>
								  	</div>
						</fieldset>
						</div>
						<div class="modal-footer">
							<button type="reset" class="btn btn-cancelarprov" data-dismiss="modal">Cancelar</button>
							<button id="btn-reg-clientes" class="btn btn-primary ">Registrar</button>
							<button id="btn-editar-clientes" class="btn btn-primary " style="display:none">Editar</button>
						</div>
					</form>
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
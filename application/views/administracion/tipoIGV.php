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
						<table id="tipo_igv_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source = "<?php echo base_url();?>administracion/servicios/getTipoIGV">
							<thead>
								<tr>
									<th>Tipo</th>
									<th>Porcentaje (%)</th>
									<th>Fecha Registro</th>
									<th>Estado</th>									
								</tr>
							</thead>   
							<tbody>
							</tbody>
						</table>		
						<div class="modal hide fade" id="modalTipoIGV" style="width: 650px;">
							<div class="modal-header">
								<h3>Registrar Tipo IGV</h3>
							</div>
							<form id="TipoIGV_Registrar" class="form-horizontal" method="post" action-1="<?php echo base_url();?>administracion/TipoIGVs/registrar" action-2="<?php echo base_url();?>administracion/TipoIGVs/editar">
								<input type="hidden" id="idTipoIGV" name="idTipoIGV">
								<div class="modal-body">
									<fieldset>
										<div class="control-group">
											<label class="control-label" for="tipo">Tipo IGV</label>
											<div class="controls">
										  		<input class="input-xlarge focused" id="tipo" name="tipo" type="text">
											</div>
									  	</div>
									  	<div class="control-group">
											<label class="control-label" for="porc">Porcentaje</label>
											<div class="controls">
										  		<input id="porc" name="porc" type="text" >
											</div>
									  	</div>
									  	<div class="control-group">
											<label class="control-label" for="estado">Estado</label>
											<div class="controls">
										  		<select id="estado" name="estado" style="margin: 0 18px 0 0;" class="input focused">
												<option value="1">Habilitado</option>
												<option value="0">Deshabilitado</option>
											</select>
											</div>
									  	</div>
									</fieldset>
								</div>
								<div class="modal-footer">
									<button type="reset" class="btn btn-cancelarprov" data-dismiss="modal">Cancelar</button>
									<button id="btn-tipoigv-reg" type="submit" class="btn btn-primary ">Guardar</button>
									<button id="btn-tipoigv-edi" type="button" class="btn btn-primary " style="display:none">Editar</button>
								</div>
							</form>
						</div>
					</div>
					
				</div><!--/span-->
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
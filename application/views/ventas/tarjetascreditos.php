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
						<a href="<?php echo base_url();?>ventas">Ventas</a><span class="divider">/</span>
					</li>
					<li>
						<a href="<?php echo base_url();?>ventas/views/tarjetascreditos">Registrar/Imprimir Tarjetas de Crédito</a>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Asignar Linea de Credito</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal">
							<fieldset>
								<!--<div class="control-group">
									<label class="control-label" for="codigotar">Código de Tarjeta</label>
									<div class="controls">
										<input class="input-xlarge focused" id="codigotar" type="text">
									</div>
								</div>-->
								<div class="control-group">
									<label class="control-label" for="personal">Personal</label>
									<div class="controls">
										<input type="hidden" id="id_personal" name="id_personal">
										<input class="input-xlarge focused" id="personal" name="personal" readonly type="text">
										<button id="buscar-personal" name="buscar-personal" type="button" class="btn btn-info"  style="margin-left: 15px;">Buscar</button>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="cliente">Cliente</label>
									<div class="controls">
										<input type="hidden" id="id_cliente" name="id_cliente">
										<input class="input-xlarge focused" id="cliente" name="cliente" readonly type="text">
										<button id="buscar-cliente" type="button" class="btn btn-info" style="margin-left: 15px;">Buscar</button>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="monto">Monto</label>
									<div class="controls">
										<input class="input-xlarge focused" id="monto" name="monto" type="text">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="cliente">Vista Previa</label>
									<div class="controls">
										<figure>
											<img style="width:40%;" src="img/card.png" alt="Tarjeta">
										</figure>
									</div>
								</div>
								<div class="form-actions">
									<button type="submit" class="btn btn-primary">Registrar</button>
									<button class="btn" >Imprimir</button>
								</div>
							</fieldset>
						</form>
					</div>
					
				</div>
				<!----INICIO MODAL------>
					<div class="modal hide fade" id="modalBuscarPersonal">
						<div class="modal-header">
							<h3>Trabajadores</h3>
						</div>
						<div class="modal-body" >
							<table id="select_trabajador_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source = "<?php echo base_url();?>
								administracion/Servicios/get_trabajadores_bylocal">
								<thead>
									<tr>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>DNI</th>
										<th>Teléfono</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
						<div class="modal-footer">
							<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
							<a  id="select_trabajador" href="#" class="btn btn-primary">Seleccionar</a>
						</div>
					</div>
			<!--IN MODAL---------------->
			<!----INICIO MODAL------>
					<div class="modal hide fade" id="modalBuscarCliente">
						<div class="modal-header">
							<h3>Clientes</h3>
						</div>
						<div class="modal-body" >							
							<table id="select_cliente_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source = "<?php echo base_url();?>
								ventas/Servicios/getClientes">
								<thead>
									<tr>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>DNI</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
						<div class="modal-footer">
							<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
							<a  id="select_cliente" href="#" class="btn btn-primary">Seleccionar</a>
						</div>
					</div>
			<!--IN MODAL---------------->
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
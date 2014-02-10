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
						<a href="<?php echo base_url();?>ventas">Administración</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?php echo base_url();?>ventas/views/ofertas">Ofertas</a>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>OFERTAS</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-registrar btn-round" alt="Registrar Oferta"><i class="icon-plus"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table id="ofertas_table" class="table table-striped table-bordered bootstrap-datatable datatable" source-data="<?php echo base_url();?>/administracion/servicios/">
						  <thead>
							  <tr>
								  <th>Fecha Inicio</th>
								  <th>Descripción</th>
								  <th>Descuento (%)</th>
								  <th>Fecha Vencimiento</th>
								  <th>Estado</th>
								  <th>Editar</th>
							  </tr>
						  </thead>   
						  <tbody>
						  </tbody>
					  </table>  
					  <div class="modal hide fade" id="modalRegistro">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">x</button>
							<h3>Registrar Oferta</h3>
						</div>
						<form id="RegistrarOfertasForm" class="form-horizontal">
							<div  class="modal-body">
								<fieldset>
								  <div class="control-group">
									<label class="control-label" for="fecha_ini">Fecha de Inicio</label>
									<div class="controls">
									  <input type="text" class="input-xlarge datepicker" id="fecha_ini" name="fecha_ini">
									</div>
								  </div>
								  <div class="control-group">
									<label class="control-label" for="fecha_fin">Fecha de Vencimiento</label>
									<div class="controls">
									  <input type="text" class="input-xlarge datepicker" id="fecha_fin" name="fecha_fin">
									</div>
								  </div>
								  <div class="control-group">
									<label class="control-label" for="descripcion">Descripción</label>
									<div class="controls">
									  <textarea class="input-xlarge" name="descripcion" maxlength="200" id="descripcion" rows="2" cols=""></textarea>
									</div>
								  </div>
								<div class="control-group">
									<label class="control-label" for="descuento">Venta Descuento</label>
									<div class="controls">
										<div class="input-prepend input-append">
											<input class="input-xlarge focused " name="descuento" id="descuento" type="number" min="0" max="100" value="0" required><span id="spandesc" class="add-on">%</span>
										</div>
									</div>
								</div>
								<hr>
								  <table id="select_producto_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>administracion/servicios/getProductoOferta">
									  <thead>
										  <tr>
											  <th>Producto</th>
											  <th>Precio</th>
											  <th>Talla</th>
											  <th>Marca</th>
											  <th>Categoría</th>
										  </tr>
									  </thead>   
									  <tbody>
										
									</tbody>
								</table>
								</fieldset>
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn" data-dismiss="modal">Cancelar</button>
								<button id="enviar_oferta_btn" type="button" class="btn btn-primary">Guardar</button>
							</div>
						</form>
					</div> 
					<div class="modal hide fade" id="modalVerDatos">
						<div class="modal-header">
							<h3>Oferta</h3>
						</div>
						<div class="modal-body">
							<div id="VerOferta" class="form-horizontal">
							</div>
						</div>
						<!-- div class="modal-footer">
							<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
							<a href="#" class="btn btn-primary">Guardar</a>
						</div -->
					</div>       
					</div>
				</div><!--/span-->
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
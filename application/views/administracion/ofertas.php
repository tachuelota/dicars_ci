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
				<a href="<?php echo base_url();?>">Home</a>
				<span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo base_url();?>administracion">Administración</a>
				<span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo base_url();?>administracion/views/ofertas">Ofertas</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>OFERTAS</h2>
				<div class="box-icon">
					<a href="#" class="btn btn-registrar btn-round" alt="Registrar Oferta"> <i class="icon-plus"></i>
					</a>
				</div>
			</div>
			<div class="box-content">
				<table id="ofertas_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>administracion/servicios/getOfertas">
					<thead>
						<tr>
							<th>Fecha Inicio</th>
							<th>Descripción</th>
							<th>Descuento (%)</th>
							<th>Fecha Vencimiento</th>
							<th>Estado</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
				<div class="modal hide fade OfertaModal" id="OfertaModal">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">x</button>
						<h3>Registrar Oferta</h3>
					</div>
					<form id="OfertasForm" class="form-horizontal" action-1="<?php echo base_url();?>administracion/ofertas/registrar" action-2="<?php echo base_url();?>administracion/views/editar_ofertas/">
						<div  class="modal-body">
							<fieldset>
								<div class="control-group">
									<label class="control-label" for="fecha_ini">Fecha de Inicio</label>
									<div class="controls">
										<input type="text" class="input-xlarge datepicker" id="fecha_ini" name="fecha_ini"></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="fecha_fin">Fecha de Vencimiento</label>
									<div class="controls">
										<input type="text" class="input-xlarge datepicker" id="fecha_fin" name="fecha_fin"></div>
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
											<input class="input-xlarge focused " name="descuento" id="descuento" type="text">
											<span id="spandesc" class="add-on">%</span>
										</div>
									</div>
								</div>								
							</fieldset>
						</div>
						<div class="modal-footer">
							<button type="reset" class="btn" data-dismiss="modal">Cancelar</button>
							<button id="enviar_oferta_btn" type="button" class="btn btn-primary">Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--/span-->
	</div>
	<!-- content ends -->
</div>
<!--/#content.span10-->
</div>
<!--/fluid-row-->
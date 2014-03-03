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
			<<li>
				<a href="<?php echo base_url();?>">Home</a> <span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo base_url();?>logistica/">Logística</a> <span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo base_url();?>logistica/views/cons_salidaproductos/">Salida de Productos</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>SALIDA DE PRODUCTOS: REGISTRAR</h2>
			</div>
			<div class="box-content">
				<form id="RegistrarSalidaForm" class="form-horizontal" method="post" action-1="<?php echo base_url();?>logistica/SalidaProductos/registrar">
					<fieldset>
						<div class="row-fluid">
							<div class="span6">
								<div class="control-group">
									<label class="control-label" for="registrador">Registrador</label>
									<div class="controls">
<<<<<<< Updated upstream
										<input class="input-xlarge focused" id="registrador_id" name="registrador_id" type="hidden" value="<?php echo $trabajador["nPersonal_id"] ?>">
										<input class="input-xlarge focused" id="registrador" name="registrador" type="text" readonly value="<?php echo $trabajador["cPersonalNom"]." ".$trabajador["cPersonalApe"] ?>"></div>
=======
										<input class="input-xlarge focused" id="registrador" name="registrador" type="text" readonly></div>
>>>>>>> Stashed changes
								</div>
								<div class="control-group">
									<label class="control-label" for="motivo">Motivo</label>
									<div class="controls">
										<select class="input-xlarge focused validate[required]" id="motivo" name="motivo">
											<option value="1">Traslado</option>
											<option value="2">Para Tienda</option>
											<option value="3">Otros</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="tienda">Tienda</label>
									<div class="controls">
<<<<<<< Updated upstream
										<input class="input-xlarge focused" id="tienda" name="tienda" type="text" readonly value="<?php echo $local["cLocalDesc"] ?>">
										<input class="input-xlarge focused" id="tienda_id" name="tienda_id" type="hidden" value="<?php echo $local["nLocal_id"] ?>">
									</div>

=======
										<input class="input-xlarge focused" id="tienda" name="tienda" type="text" readonly></div>
>>>>>>> Stashed changes
								</div>
							</div>
							<div class="span6">
								<div class="control-group">
									<label class="control-label" for="fecha">Fecha</label>
									<div class="controls">
										<input class="input-xlarge validate[required]" id="fecha" name="fecha" type="text" readonly value="<?php echo date("d/m/y"); ?>"></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="solicitante">Solicitante</label>
									<div class="controls">
										<input class="input-xlarge focused" id="solicitante" name="solicitante" type="text" readonly>
										<input class="input-xlarge focused" id="solicitante_id" name="solicitante_id" type="hidden">
<<<<<<< Updated upstream
										<button id="btn-trabajador" name="btn-trabajador" class="btn btn-info btn-solicitante" style="margin-left: 15px;"> <i class="icon-user icon-white"></i></button>
					

=======
										<button id="btn-buscar-trabajador" name="btn-buscar-trabajador" class="btn btn-info btn-solicitante" style="margin-left: 15px;"> <i class="icon-user icon-white"></i>
										</button>
>>>>>>> Stashed changes
									</div>
								</div>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="observaciones">Observaciones</label>
							<div class="controls">
								<textarea id="observaciones" name="observaciones" class="input-xlarge"></textarea>
							</div>
						</div>
					</fieldset>
					<input id="serie" name="serie" type="hidden" class="validate[required]">
					<input id="numero" name="numero" type="hidden" class="validate[required]">
				</form>
				<hr>
				<h3>Detalle Salida Productos</h3>
				<hr>
				<form id="AgregarProductoForm" class="form-horizontal">
					<div class="control-group">
						<label class="control-label" for="producto">Producto</label>
						<div class="controls">
							<input class="input-xlarge focused validate[required]" id="producto" name="producto" type="text" readonly>
							<input class="input-xlarge focused" id="producto_id" name="producto_id" type="hidden">
							<button id="btn-productos" name="btn-productos" type="button" class="btn btn-info btn-buscarp" style="margin: 0 18px;"> <i class="icon-search icon-white"></i>
								Buscar
							</button>
							<label style="display:inline;" for="cantidad">Cantidad</label>
							<input class="validate[required,custom[onlyNumberSp]]" id="cantidad" name="cantidad" type="number" min=1 style="margin: 0 18px 0 0;" data-prompt-position="topLeft">
							<button type="submit" class="btn btn-primary" id="btn-agregar-detalle" name="btn-agregar-detalle">
								<i class="icon-plus icon-white"></i>
								Agregar
							</button>
						</div>
					</div>
				</form>
				<hr>
				<table id="salida_productos_table" name="salida_productos_table" class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Código</th>
							<th>Nombre</th>
							<th>Cantidad</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
				<hr>
				<div class="form-actions">
					<a href="logistica_cons_salidaproductos.html" class="btn btn-success">
						<i class="icon icon-white icon-arrowthick-w"></i>
						Volver
					</a>
					<button id="enviar_salida_producto" type="button" class="btn btn-primary" style="float: right;">
						<i class="icon icon-white icon-save"></i>
						Guardar
					</button>
				</div>
				<!-------MODAL PRODUCTOS---------->
				<div class="modal hide fade" id="modalBuscarProducto">
					<div class="modal-header">
						<h3>Productos</h3>
					</div>
					<div class="modal-body">
						<table id="select_producto_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>logistica/Servicios/getProductos">
							<thead>
								<tr>
									<th>Producto</th>
									<th>Stock</th>
									<th>Precio</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
						<a  id="select_producto" href="#" class="btn btn-primary">Seleccionar</a>
					</div>
				</div>
				<!------------------------Modal TRABAJADOR---------------------------------------->
				<div class="modal hide fade" id="modalBuscarTrabajador">
					<div class="modal-header">
						<h3>Trabajadores</h3>
					</div>
					<div class="modal-body">
						<table id="select_trabajador_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>logistica/Servicios/get_trabajadores_activos">
							<thead>
								<tr>
									<th>Nombres</th>
									<th>Apellidos</th>
									<th>DNI</th>
									<th>Teléfono</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
						<a  id="select_trabajador" href="#" class="btn btn-primary">Seleccionar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- content ends -->
</div>
<!--/#content.span10-->
</div>
<!--/fluid-row-->
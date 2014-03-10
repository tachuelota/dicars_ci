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
				<a href="<?php echo base_url();?>">Home</a> <span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo base_url();?>logistica/">Logística</a> <span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo base_url();?>logistica/views/cons_ingresoproductos/">Ingreso de Productos</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>INGRESO DE PRODUCTOS: REGISTRAR</h2>
			</div>
			<div class="box-content">
				<form class="form-horizontal" id="IngresoProductosForm" method="post" action-1="<?php echo base_url();?>logistica/IngresoProductos/registrar" >
					<input type="hidden" name="idRegistrado" id="idRegistrado" value="<?php echo $trabajador["nPersonal_id"] ?>">
					<input type="hidden" name="idLocal" id="idLocal" value="<?php echo $local["nLocal_id"] ?>">
					<fieldset>
						<div class="row-fluid">
							<div class="span6">
								<div class="control-group">
									<label class="control-label" for="registrador">Registrador</label>
									<div class="controls">
										<input class="input-xlarge focused" id="registrador" name="registrador" value="<?php echo $trabajador["cPersonalNom"]." ".$trabajador["cPersonalApe"] ?>" type="text" readonly></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="tienda">Tienda</label>
									<div class="controls">
										<input class="input-xlarge focused" id="tienda" name="tienda"  type="text" readonly value="<?php echo $local["cLocalDesc"] ?>"></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="tipo">Tipo</label>
									<div class="controls">
										<select id="tipo" name="tipo">
											<option value="1">Compra</option>
											<option value="2">Devolucion</option>
											<option value="3">Otros</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="observacion">Observaciones</label>
									<div class="controls">
										<textarea id="observacion" name="observacion" class="input-xlarge" value=""></textarea>
									</div>
								</div>
							</div>
							<div class="span6">
								<div class="control-group">
									<label class="control-label" for="codigo">Número Documento</label>
									<div class="controls">
										<input id="docserie" name="docserie" type="text" class="validate[required] validate[maxSize[4]]" style="width:40px;">
										-
										<input id="docnumero" name="docnumero" type="text" class="validate[required] validate[maxSize[8]]"  style="width:60px;" ></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="fecharegistro">Fecha</label>
									<div class="controls">
										<input class="input-xlarge" name="fecharegistro" id="fecharegistro" type="text" readonly value="<?php echo date("d/m/Y"); ?>"></div>
								</div>
							</div>
						</div>
					</fieldset>
				</form>

				<hr>
				<h3>Detalle de Ingreso de Productos</h3>
				<hr>
				<div class="span12">
						<div class="form-horizontal">
							<div class="span6" style="margin-bottom: 20px; border-rigth: 1px solid #ddd;">
								<div class="control-group">
									<label class="control-label" for="ordped">Pedido</label>
									<div class="controls">
										<input id="id_pedido" name="id_pedido" type="hidden">
										<input class="input-xlarge focused" id="ordped" name="ordped" type="text" readonly>
										<button id="btn-pedido" name="btn.pedido" type="button" class="btn btn-info btn-ordped" style="margin: 0 18px;"> <i class="icon-search icon-white"></i>
										</button>
									</div>
								</div>							
								<div class="control-group">
									<label class="control-label" for="preciod">Importe</label>
									<div class="controls">
										
										<input id="imported" name="imported" type="number" step="0.01" min="1" style="margin: 0 18px 0 0;">
										<label style="display:inline;" for="cantidadd"> <strong>Cantidad</strong>
										</label>
										<input id="cantidadd" name="cantidadd" type="number" style="margin: 0 18px 0 0;" min="1">
										<button id="agregar_detalle" name="agregar_detalle" type="button" class="btn btn-primary">
											<i class="icon-plus icon-white"></i>
											Agregar
										</button>
									</div>
								</div>
							</div>
						</div>
						<div class="form-horizontal">
							<div class="span6" style="margin-bottom: 20px; border-left: 1px solid #ddd;">
								<div class="control-group">
									<label class="control-label" for="producto">Producto</label>
									<div class="controls">
										<input class="input-xlarge focused" id="producto" type="text" readonly>
										<input id="producto_id" name="producto_id" type="hidden">
										<button id="btn-producto" name="btn-producto" type="button" class="btn btn-info btn-buscarp" style="margin: 0 18px;">
											<i class="icon-search icon-white"></i>
										</button>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="precio">Importe</label>
									<div class="controls">
										<input id="importe" name="importe" type="number" step="0.01" min="1" style="margin: 0 18px 0 0;" >
										<label style="display:inline;" for="cantidad"> <strong>Cantidad</strong>
										</label>
										<input id="cantidad" type="number" style="margin: 0 18px 0 0;" min="1">
										<button id="agregar_producto" name="agregar_producto" type="button" class="btn btn-primary">
											<i class="icon-plus icon-white"></i>
											Agregar
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>


				<hr>
				<!--<table id="ingreso_productos_table" name="ingreso_productos_table" class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Código</th>
							<th>Nombre</th>
							<th>Cantidad</th>
							<th>Precio</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table> -->
				<table id="productos_table" class="table table-striped table-bordered bootstrap-datatable datatable">
						<thead>
							<tr>
								<th>Codigo</th>
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Precio Unitario</th>
								<th>Importe S/.</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				<hr>
					<!--<div class="form-actions" style="padding-left: 17px;">
						<a href="<?php echo base_url();?>logistica/views/cons_ordencompra/" type="reset" class="btn btn-success btn-cancelar" >
							<i class="icon icon-white icon-arrowthick-w"></i>
							Volver
						</a>
						<button id="btn_enviar_ordcom" type="submit" class="btn btn-primary" style="float: right;">
							<i class="icon icon-white icon-save"></i>
							Guardar
						</button>
					</div>-->
				<div class="form-actions">
					<a href="<?php echo base_url();?>logistica/views/cons_ingresoproductos/" class="btn btn-success">
						<i class="icon icon-white icon-arrowthick-w"></i>
						Volver
					</a>
					<button type="button" id="enviar_ingreso_producto" class="btn btn-primary" style="float: right;">
						<i class="icon icon-white icon-save"></i>
						Guardar
					</button>
				</div>
				<!---------------------------------------------------->
				<!--<div class="modal hide fade" id="modalBuscarProducto">
					<div class="modal-header">
						<h3>Productos</h3>
					</div>
					<div class="modal-body">
						<table id="select_producto_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source = "<?php echo base_url();?>logistica/Servicios/getProductos">
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
				</div>-->
				<!-----------Modal ORDEN Pedido-------------------->
					<div class="modal hide fade" id="modalBuscarOrdPed" style="width: 650px;">
						<div class="modal-header">
							<h3>Detalles de Orden de Compra</h3>
						</div>
						<div class="modal-body">
							<table id="select_ordped_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>logistica/Servicios/get_log_ordcompras">
								<thead>
									<tr>
										<th>Codigo</th>
										<th>Producto</th>
										<th>Registrante</th>
										<th >Fecha Registro</th>
										<th>Cantidad</th>
										<th >Importe</th>								
									</tr>							
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
							<a id="select_ordped" href="#" class="btn btn-primary">Seleccionar</a>
						</div>					
					</div>
					<!--------------MODAL PRODUCTO------------------------>
					<div class="modal hide fade" id="modalBuscarProducto">
						<div class="modal-header">
							<h3>Productos</h3>
						</div>
						<div class="modal-body">
							<table id="select_producto_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>logistica/Servicios/getProductos" >
								<thead>
									<tr>
										<th>Código</th>
										<th>Producto</th>
										<th>Stock</th>
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
			</div>
		</div>
			<div class="modal hide fade" id="agregarproductos">
				<div class="modal-header">
					<h3>Atención</h3>
				</div>
				<div class="modal-body">
					<div class="alert alert-error">
						<p>
							<i class="icon icon-alert icon-red"></i>
							Necesitas agregar Productos
						</p>
					</div>

				</div>
				<div class="modal-footer">
					<a href="#" class="btn" data-dismiss="modal">Aceptar</a>
				</div>
			</div>
	</div>
	<!-- content ends -->
</div>
<!--/#content.span10-->
</div>
<!--/fluid-row-->
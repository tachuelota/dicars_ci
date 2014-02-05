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
						<a href="logistica_homepage.html">Logística</a><span class="divider">/</span>
					</li>
					<li>
						<a href="logistica_pedidos.html">Pedidos</a>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>PEDIDOS: REGISTRAR</h2>
					</div>
					<div class="box-content">
						<form id="RegistrarPedidoForm" class="form-horizontal" method="post" action="logistica_registrar_pedido.html">
							<fieldset>
								<div class="row-fluid">
									<div class="span6">
										<div class="control-group">
											<label class="control-label" for="registrador">Registrador</label>
											<div class="controls">
												<input class="input-xlarge" id="registrador" name="registrador" type="text" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="tienda">Tienda</label>
											<div class="controls">
											  	<input class="input-xlarge" id="tienda" name="tienda" type="text" readonly>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="observaciones">Observaciones</label>
											<div class="controls">
												<textarea id="observaciones" name="observaciones" class="input-xlarge"></textarea>
											</div>
										</div>
									</div>
									<div class="span6">
										<div class="control-group">
											<label class="control-label" for="fechapedido">Fecha de Pedido</label>
											<div class="controls">
												<input class="input-xlarge datepicker" id="fechapedido" name="fechapedido" type="text">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="fechaentrega">Fecha de Entrega</label>
											<div class="controls">
												<input class="input-xlarge datepicker" id="fechaentrega" name="fechaentrega" type="text">
											</div>
										</div>
										
										<div class="control-group">
											<div class="controls">
												<label class="checkbox inline">
													<input type="checkbox" id="checkgerencia">Enviar Correo a Gerencia
													<input type="hidden" id="email" name="email">
												</label>
											</div>
										</div>
									</div>
								</div>
							</fieldset>
							<input id="serie" name="serie" type="hidden" required>
							<input id="numero" name="numero" type="hidden" required>
						</form>
						<form id="AgregarProductoForm" class="form-horizontal">
							<div class="control-group">
								<label class="control-label" for="producto">Producto</label>
								<div class="controls">
									<input class="input-xlarge focused" id="producto" type="text" readonly>
								  	<button type="button" class="btn btn-info btn-buscarp" style="margin: 0 18px;"><i class="icon-search icon-white"></i>Buscar</button>
									<label style="display:inline;" for="cantidad">Cantidad</label>
									<input id="cantidad" type="number" style="margin: 0 18px 0 0;" min="1" required>
									<button id="agregar_producto" type="submit" class="btn btn-primary"><i class="icon-plus icon-white"></i>Agregar</button>
								</div>
							</div>
						</form>
						<hr>
						<h3>Detalle de Pedido</h3>
						<hr>
						<table id="productos_table" class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
								  <tr>
									  <th>Código</th>
									  <th>Nombre</th>
									  <th>Cantidad</th>
									  <th>Acciones</th>
								  </tr>
							</thead>   
							<tbody>
							</tbody>
						</table>
						<hr>
						<div class="form-actions">
							<a href="logistica_pedidos.html" type="reset" class="btn btn-success btn-cancelar" ><i class="icon icon-white icon-arrowthick-w"></i> Volver</a>
							<button id="btn_enviar_pedido" type="button" class="btn btn-primary" style="float: right;"><i class="icon icon-white icon-save"></i> Guardar</button>
						</div>
						<div class="modal hide fade" id="modalBuscarProducto">
							<div class="modal-header">
								<h3>Productos</h3>
							</div>
							<div class="modal-body">
								<table id="select_producto_table" class="table table-striped table-bordered bootstrap-datatable datatable">
								  	<thead>
										<tr>			  	
											<th>Producto</th>				  
										  	<th>Stock</th>
										  	<th>Precio</th>
									  	</tr>
								  	</thead>   
								  	<tbody>
								  		<tr>			  	
											<td>Producto 1</td>				  
										  	<td>100</td>
										  	<td>50.5</td>
									  	</tr>
									  	<tr>			  	
											<td>Producto 2</td>				  
										  	<td>500</td>
										  	<td>90</td>
									  	</tr>
									  	<tr>			  	
											<td>Producto 3</td>				  
										  	<td>50</td>
										  	<td>60</td>
									  	</tr>
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
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
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
				<a href="index.html">Home</a>
				<span class="divider">/</span>
			</li>
			<li>
				<a href="logistica_homepage.html">Logística</a>
				<span class="divider">/</span>
			</li>
			<li>
				<a href="logistica_cons_ingresoproductos.html">Ingreso de Productos</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>INGRESO DE PRODUCTOS: EDITAR</h2>
			</div>
			<div class="box-content">
				<form id="RegistrarIngresoForm" class="form-horizontal" method="post" action-1="<?php echo base_url();?>logistica/IngresoProductos/editar">
					<fieldset>
						<div class="row-fluid">
							<div class="span6">
								<div class="control-group">
									<label class="control-label" for="codigo">Número Ingreso</label>
									<div class="controls">
										<span class="help-inline" style="margin-top:5px;"><?php echo $cIngProdNro;?></span>
										<input type="hidden" id="idingprod" name="idingprod" value="<?php echo $nIngProd_id;?>"></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="registrador">Registrador</label>
									<div class="controls">
										<span class="help-inline" style="margin-top:5px;"><?php echo $nomape;?></span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="tipo">Motivo</label>
									<div class="controls">
										<select id="tipo" name="tipo">
											<option value="1">Devolución</option>
											<option value="2">Pedido Almacén</option>
											<option value="3">Otro</option>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="tienda">Tienda</label>
									<div class="controls">
										<span class="help-inline" style="margin-top:5px;"><?php echo $cLocalDesc;?></span>
									</div>
								</div>
							</div>
							<div class="span6">
								<div class="control-group">
									<label class="control-label" for="fecha">Fecha</label>
									<div class="controls">
										<span class="help-inline" style="margin-top:5px;"><?php echo $dIngProdFecReg;?></span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="solicitante">Número Documento</label>
									<div class="controls">
										<input class="input-xlarge focused validate[required]" name="edit_numdoc" id="edit_numdoc" type="text" value="<?php echo $cIngProdDocNro ?>">
									</div>
								</div>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="observaciones">Observaciones</label>
							<div class="controls">
								<textarea id="observacion" name="observacion" class="input-xlarge"><?php echo $cIngProdObsv ?></textarea>
							</div>
						</div>
					</fieldset>
				</form>
				<form id="AgregarProductoForm" class="form-horizontal">
					<div class="control-group">
						<label class="control-label" for="producto">Producto</label>
						<div class="controls">
							<input type="hidden" id="idProducto" name="idProducto">
							<input class="input-xlarge focused validate[required]" id="producto" name="producto" disabled type="text">
							<button id="btn-buscar-productos" type="button" class="btn btn-info btn-buscarp" style="margin: 0 18px;"> <i class="icon-search icon-white"></i>
								Buscar
							</button>
							<label style="display:inline;" for="cantidad">Cantidad</label>
							<input class="validate[required,custom[onlyNumberSp]]" id="cantidad" name="cantidad" type="number" min=1 style="margin: 0 18px 0 0;">
							<label style="display:inline;">Precio/Unidad</label>
							<input class="validate[required,custom[onlyNumberSp]]" id="precio_uni" name="precio_uni" type="number" min=0 style="margin: 0 18px;">
							<button id="agregar_producto" type="submit" class="btn btn-primary"> <i class="icon-plus icon-white"></i>
								Agregar
							</button>
						</div>
					</div>
				</form>
				<hr>
				<h3>Detalle de Ingreso de Productos</h3>
				<hr>
				<table id="edit_ingresoproductos_table" name="edit_ingresoproductos_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url()."logistica/Servicios/get_log_detingprod/".$nIngProd_id;?>">
					<thead>
						<tr>
							<th>Código Producto</th>
							<th>Cantidad</th>
							<th>Precio Unit</th>
							<th>Total</th>
							<th>Estado</th>
							
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
				<div class="form-actions">
					<a href="logistica_cons_ingresoproductos.html" class="btn btn-success">
						<i class="icon icon-white icon-arrowthick-w"></i>
						Volver
					</a>
					<button id="btn_enviar_cambios" type="button" class="btn btn-primary" style="float: right;">
						<i class="icon icon-white icon-save"></i>
						Guardar
					</button>
				</div>
			</div>

			<div class="modal hide fade" id="modalBuscarProducto">
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
			</div>
		</div>
	</div>
	<!-- content ends -->
</div>
<!--/#content.span10-->
</div>
<!--/fluid-row-->
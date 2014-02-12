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
				<a href="<?php echo base_url();?>ventas">Administración</a>
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
				<h2>OFERTA: EDITAR</h2>
			</div>
			<div class="box-content">
				<fieldset>
					<form id="EditarOfertasForm" class="form-horizontal" action-1="<?php echo base_url();?>administracion/ofertas/editar">

						<div class="control-group">
							<label class="control-label" for="fecha_ini">Fecha de Inicio</label>
							<div class="controls">
								<input type="text" class="input-xlarge datepicker" id="fecha_ini" value="<?php echo $dOfertaFecVigente ?>"></div>
						</div>
						<div class="control-group">
							<label class="control-label" for="fecha_fin">Fecha de Vencimiento</label>
							<div class="controls">
								<input type="text" class="input-xlarge datepicker" id="fecha_fin" name="fecha_fin" value="<?php echo $dOfertaFecVencto ?>"></div>
						</div>
						<div class="control-group">
							<label class="control-label" for="descripcion">Descripción</label>
							<div class="controls">
								<textarea class="input-xlarge" name="descripcion" maxlength="200" id="descripcion" rows="2" cols=""><?php echo $cOfertaDesc ?></textarea>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="descuento">Venta Descuento</label>
							<div class="controls">
								<div class="input-prepend input-append">
									<input class="input-xlarge focused " name="descuento" id="descuento" type="text" value="<?php echo $nOfertaPorc ?>">
									<span id="spandesc" class="add-on">%</span>
								</div>
							</div>
						</div>
						<input type="hidden" name="idoferta" value="{{ id }}">
						<div class="control-group">
							<div class="controls">
								<button type="button" id="btn-buscarproducto" class="btn btn-info btn-buscarp" style="margin: 0 0;"> <i class="icon-search icon-white"></i>
									Buscar Productos
								</button>
							</div>
						</div>
					</form>
				</fieldset>
				<hr>
				<h3>Productos de la Oferta</h3>
				<hr>
				<table id="oferta_productos_table" name="oferta_productos_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url()."administracion/servicios/getProductosByOferta/".$nOferta_id; ?>">
					<thead>
						<tr>
							<th>Codigo</th>
							<th>Producto</th>
							<th>P.Costo/P.Cont/P.Cred</th>
							<th>Marca</th>
							<th>Tipo</th>
							<th>Categoría</th>
							<th>Estado</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
				<div class="form-actions">
					<a href="" class="btn">Cancelar</a>
					<button id="enviar_editar" type="button" class="btn btn-primary" style="float: right;"> <i class="icon icon-white icon-save"></i>
						Guardar
					</button>
				</div>
			</div>

			<div class="modal hide fade" id="modalBuscarProducto" style="width:700px;">
				<div class="modal-header">
					<h3>Agregar Producto</h3>
				</div>
				<div class="form-horizontal" >
					<div  class="modal-body" style="max-height: 450px;">
						<fieldset>
							<table id="select_producto_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source="<?php echo base_url();?>administracion/servicios/getProductoSinOferta">
								<thead>
									<tr>
										<th>Codigo</th>
										<th>Producto</th>
										<th>P.Costo/P.Cont/P.Cred</th>
										<th>Marca</th>
										<th>Tipo</th>
										<th>Categoría</th>
									</tr>
								</thead>
								<tbody></tbody>
								<tfoot>
									<tr>
										<th class="input">
											<input type="text" style="width: 75px" value="Codigo" class="search_init" />
										</th>
										<th class="input">
											<input type="text"style="width: 75px" value="Producto" class="search_init" />
										</th>
										<th class="input">
											<input type="text" style="width: 75px" value="Precio" class="search_init" />
										</th>
										<th class="input">
											<input type="text" style="width: 75px" value="Marca" class="search_init" />
										</th>
										<th class="input">
											<input type="text" style="width: 75px" value="Tipo" class="search_init" />
										</th>
										<th class="input">
											<input type="text" style="width: 75px" value="Categoria" class="search_init" />
										</th>
									</tr>
								</tfoot>
							</table>
						</fieldset>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
						<input id="btn_agregar_prod" type="button" value="Agregar" class="btn btn-primary"></div>
				</div>
			</div>

		</div>
	</div>
	<!-- content ends -->
</div>
<!--/#content.span10-->
</div>
<!--/fluid-row-->
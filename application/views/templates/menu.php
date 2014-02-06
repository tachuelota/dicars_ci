<!-- left menu starts -->
<div class="span2 main-menu-span">
	<div class="well nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li class="nav-header hidden-tablet">Ventas</li>
			<li id="venta_prod">
				<a class="ajax-link" href="<?php echo base_url();?>ventas/views/cons_ventas"> <i class="icon icon-black icon-cart"></i>
					<span class="hidden-tablet">Venta de Productos</span>
				</a>
			</li>
			<li id="cron_pago">
				<a class="ajax-link" href="<?php echo base_url();?>ventas/views/cronogramas"> <i class="icon icon-black icon-document"></i>
					<span class="hidden-tablet">Cronograma de Pago</span>
				</a>
			</li>
			<!--li id="mor_deu">
				<a class="ajax-link" href="<?php echo base_url();?>ventas/views/">
					<i class="icon icon-black icon-users"></i>
					<span class="hidden-tablet">Morosos y Deudores</span>
				</a>
			</li-->
			<li id="tarj_cred">
				<a class="ajax-link" href="<?php echo base_url();?>ventas/views/tarjetascreditos">
					<i class="icon icon-black icon-profile"></i>
					<span class="hidden-tablet">Tarjeta de Crédito</span>
				</a>
			</li>
			<li id="clientes">
				<a class="ajax-link" href="<?php echo base_url();?>ventas/views/clientes">
					<i class="icon icon-black icon-users"></i>
					<span class="hidden-tablet">Clientes</span>
				</a>
			</li>
			<li id="movimientos">
				<a href="<?php echo base_url();?>ventas/views/movimientos">
					<i class="icon icon-black icon-transfer-ew"></i>
					<span class="hidden-tablet">Movimientos</span>
				</a>
			</li>
			<li id="ventas_rep">
				<a class="ajax-link" href="<?php echo base_url();?>ventas/views/reporte_zonas">
					<i class="icon icon-black icon-page"></i>
					<span class="hidden-tablet">Reporte de Ventas Tienda/Zona</span>
				</a>
			</li>
			<li id="clienteszonas_rep">
				<a class="ajax-link" href="<?php echo base_url();?>ventas/views/reporte_ventas">
					<i class="icon icon-black icon-page"></i>
					<span class="hidden-tablet">Reporte Clientes/Zona</span>
				</a>
			</li>
			<li id="cuadre_caja">
				<a class="ajax-link" href="#" id="lanza-cuadrecaja">
					<i class="icon icon-black icon-page"></i>
					<span class="hidden-tablet">Cuadre de Caja</span>
				</a>
			</li>

			<li class="nav-header hidden-tablet">Logística</li>
			<li id="admin_prod">
				<a class="ajax-link" href="<?php echo base_url();?>logistica/views/productos">
					<i class="icon icon-black icon-inbox"></i>
					<span class="hidden-tablet">Administrar Productos</span>
				</a>
			</li>
			<li id="admin_provee">
				<a class="ajax-link" href="<?php echo base_url();?>logistica/views/proveedores">
					<i class="icon icon-black icon-users"></i>
					<span class="hidden-tablet">Administrar Proveedores</span>
				</a>
			</li>
			<li id="ord_ped">
				<a class="ajax-link" href="<?php echo base_url();?>logistica/views/cons_pedidos">
					<i class="icon icon-black icon-compose"></i>
					<span class="hidden-tablet">Orden de Pedido</span>
				</a>
			</li>
			<li id="ord_com">
				<a class="ajax-link" href="<?php echo base_url();?>logistica/views/cons_ordencompra">
					<i class="icon icon-black icon-compose"></i>
					<span class="hidden-tablet">Orden de Compra</span>
				</a>
			</li>
			<li id="ing_prod">
				<a class="ajax-link" href="<?php echo base_url();?>logistica/views/cons_ingresoproductos">
					<i class="icon icon-black icon-archive"></i>
					<span class="hidden-tablet">Ingreso de Productos</span>
				</a>
			</li>
			<li id="saldos">
				<a class="ajax-link" href="<?php echo base_url();?>logistica/views/saldo_inicial">
					<i class="icon icon-black icon-document"></i>
					<span class="hidden-tablet">Saldos</span>
				</a>
			</li>
			<li id="gen_kardex">
				<a class="ajax-link" href="<?php echo base_url();?>logistica/views/kardex">
					<i class="icon icon-black icon-document"></i>
					<span class="hidden-tablet">Generar Kardex</span>
				</a>
			</li>
			<li id="sal_prod">
				<a class="ajax-link" href="<?php echo base_url();?>logistica/views/cons_salidaproductos">
					<i class="icon icon-black icon-reply"></i>
					<span class="hidden-tablet">Salida de Productos</span>
				</a>
			</li>
			<li id="rep_sal_prod">
				<a class="ajax-link" href="<?php echo base_url();?>logistica/views/cronogramas">
					<i class="icon icon-black icon-page"></i>
					<span class="hidden-tablet">Reporte Salida Productos</span>
				</a>
			</li>
			<li id="cierre_mes">
				<a class="ajax-link" href="#" id="lanza-cierremes">
					<i class="icon icon-black icon-key"></i>
					<span class="hidden-tablet">Cierre de Mes</span>
				</a>
			</li>

			<li class="nav-header hidden-tablet">Administración</li>
			<li id="panel_admin">
				<a class="ajax-link" href="<?php echo base_url();?>administracion/views">
					<i class="icon icon-black icon-user"></i>
					<span class="hidden-tablet">Panel de Administración</span>
				</a>
			</li>
		</ul>
	</div>
	<!--/.well -->
</div>
<!--/span-->
<!-- left menu ends -->
<div class="modal hide fade" id="modalcierremes">
	<div class="modal-header">
		<h3>¿Está seguro que desea cerrar el mes?</h3>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">No</a>
		<a href="#" class="btn btn-primary" id="btn-cierremes">Sí</a>
	</div>
</div>
<div class="modal hide fade" id="aftercierremes">
	<div class="modal-header">
		<h3>Cierre Exitoso!</h3>
	</div>
	<div class="modal-body">
		<p>¡El cierre de mes se ha realizado exitosamente!</p>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Cerrar</a>
	</div>
</div>

<div class="modal hide fade" id="modalcuadrecaja">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>EXPORTAR</h3>
	</div>
	<div class="modal-body">
		<form method="post" target="_blank" id="FormCuadreCaja">
			<input type="hidden" name="table_cuadrecaja" id="table_cuadrecaja"/>
			<div class="form-horizontal">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="datecuadrecaja">Fecha</label>
						<div class="controls">
							<input type="text" class="input-xlarge datepicker" id="datecuadrecaja" style="margin: 0 18px 0 0;"></div>
					</div>
				</fieldset>
			</div>
			<p>Escoga el formato en que desea exportar el Cuadre de Caja</p>
			<div class="sortable row-fluid ui-sortable">
				<a id="pdfcuadrecaja" data-rel="tooltip" class="well span3 top-block" style="width: 48%;" href="#" data-original-title="Exportar a PDF.">
					<span class="icon32 icon-color icon-pdf"></span>
					<div>PDF</div>
				</a>

				<a id="xlscuadrecaja" data-rel="tooltip" class="well span3 top-block" style="width: 48%;" href="#" data-original-title="Exportar a Excel.">
					<span class="icon32 icon-color icon-xls"></span>
					<div>Excel</div>
				</a>
			</div>
		</form>
	</div>
</div>
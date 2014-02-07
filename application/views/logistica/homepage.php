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
				<a href="<?php echo base_url();?>logistica/">Logística</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid">
		<a data-rel="tooltip" title="Ver, Agregar y editar Productos." class="well span3 top-block" href="<?php echo base_url();?>
			logistica/views/productos">
			<span class="icon32 icon-color icon-inbox"></span>
			<div>
				Administrar
				<br>Productos</div>
		</a>

		<a data-rel="tooltip" title="Ver, Agregar y editar Proveedores." class="well span3 top-block" href="<?php echo base_url();?>logistica/views/proveedores/">
			<span class="icon32 icon-color icon-users"></span>
			<div>
				Administrar
				<br>Proveedores</div>
		</a>

		<a data-rel="tooltip" title="Ver, Agregar, editar y eliminar Pedidos." class="well span3 top-block" href="<?php echo base_url();?>logistica/views/cons_pedidos/">
			<span class="icon32 icon-color icon-compose"></span>
			<div>
				Orden
				<br>de Pedido</div>
		</a>

		<a data-rel="tooltip" title="Ver, Agregar, editar y eliminar Orden Compra." class="well span3 top-block" href="<?php echo base_url();?>
			logistica/views/cons_ordencompra">
			<span class="icon32 icon-color icon-compose"></span>
			<div>
				Orden
				<br>de Compra</div>
		</a>
	</div>
	<div class="row-fluid">
		<a data-rel="tooltip" title="Ver, Agregar, editar y eliminar Ingreso Productos." class="well span3 top-block" href="<?php echo base_url();?>
			logistica/views/cons_ingresoproductos">
			<span class="icon32 icon-color icon-archive"></span>
			<div>
				Ingreso
				<br>de Productos</div>
		</a>

		<a data-rel="tooltip" title="Ver, Agregar, editar y eliminar Orden Salida." class="well span3 top-block" href="<?php echo base_url();?>
			logistica/views/cons_salidaproductos">
			<span class="icon32 icon-color icon-reply"></span>
			<div>
				Salida
				<br>de Productos</div>
		</a>
		<a data-rel="tooltip" title="Ver Saldo Inicial." class="well span3 top-block" href="<?php echo base_url();?>
			logistica/views/saldo_inicial">
			<span class="icon32 icon-color icon-document"></span>
			<div>
				Saldo
				<br>Inicial</div>
		</a>
		<a data-rel="tooltip" title="Ver Kardex." class="well span3 top-block" href="<?php echo base_url();?>
			logistica/views/kardex">
			<span class="icon32 icon-color icon-document"></span>
			<div>
				Generar
				<br>Kardex</div>
		</a>
	</div>
	<!-- content ends -->
</div>
<!--/#content.span10-->
</div>
<!--/fluid-row-->
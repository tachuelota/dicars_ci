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
				<a href="<?php echo base_url();?>ventas">Ventas</a>
				<span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo base_url();?>ventas/Views/cronogramas">Cronograma de Pago</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid" id="ClientesForm" name="ClientesForm" action-1="<?php echo base_url();?>ventas/Views/cronogramas_detalle">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>CLIENTES</h2>
			</div>
			<div class="box-content" >
				<table class="table table-striped table-bordered bootstrap-datatable datatable" id="clientes_table"
				data-source="<?php echo base_url();?>ventas/Servicios/getClientes_cronograma">
					<thead>
						<tr>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>DNI</th>
							<th>Línea de Crédito</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>

		</div>
		<!--/span-->
	</div>
	<!--/row-->
	<!-- content ends -->
</div>
<!--/#content.span10-->
</div>
<!--/fluid-row-->
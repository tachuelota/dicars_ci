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
	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>CLIENTES</h2>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable" id="clientes_table">
					<thead>
						<tr>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>DNI</th>
							<th>Línea de Crédito</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>José</td>
							<td>Pérez</td>
							<td>12345678</td>
							<td>1000</td>
							<td>
								<a class='btn btn-success btn-pagar' href='<?php echo base_url();?>ventas/views/cronogramas_detalle'> <i class='icon-zoom-in icon-white'></i>
									Ver Creditos
								</a>
							</td>
						</tr>
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
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
				<a href="logistica_cons_salidaproductos.html">Salida de Productos</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>SALIDA DE PRODUCTOS</h2>
				<div class="box-icon">
					<a href="logistica_reg_salidaproductos.html" class="btn btn-round" alt="Registrar Salida de Productos"> <i class="icon-plus"></i>
					</a>
				</div>
			</div>
			<div class="box-content">
				<div class="form-horizontal">
					<fieldset>
						<div class="control-group">
							<label class="control-label">Del</label>
							<div class="controls">
								<input type="text" class="input-xlarge datepicker" id="date01" value="02/06/2013" style="margin: 0 18px 0 0;">
								<label style="display:inline;">Al</label>
								<input type="text" class="input-xlarge datepicker" id="date02" value="02/06/2013" style="margin: 0 18px;">
								<button id="buscarfecha" type="button" class="btn btn-info btn-buscarp" style="margin: 0 18px;"> <i class="icon-search icon-white"></i>
									Buscar
								</button>
							</div>
						</div>
					</fieldset>
				</div>
				<hr>
				<table id="salida_prod_table" class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Fec. Registro</th>
							<th>N° Sal. Productos</th>
							<th>Registrante</th>
							<th>Solicitante</th>
							<th>Motivo</th>
							<th>Observación</th>
							<th>Local</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>01/02/2013</td>
							<td>000001</td>
							<td>Diego Molina</td>
							<td>Arturo Méndez</td>
							<td>Traslado</td>
							<td>Para Local 2</td>
							<td>Local 1</td>
							<td>
								<a class='btn btn-success btn-datos' href='logistica_ver_salidaproductos.html'>
									<i class='icon-zoom-in icon-white'></i>
									Ver Datos
								</a>
							</td>
							<td>
								<a class='btn btn-danger' href='#'>
									<i class='icon-trash icon-white'></i>
									Eliminar
								</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- content ends -->
</div>
<!--/#content.span10-->
</div>
<!--/fluid-row-->
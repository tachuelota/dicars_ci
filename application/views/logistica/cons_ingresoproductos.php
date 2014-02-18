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
				<h2>INGRESO DE PRODUCTOS</h2>
				<div class="box-icon">
					<a href="<?php echo base_url();?>logistica/views/reg_ingresoproductos/" class="btn btn-round" alt="Registrar Ingreso de Productos"> <i class="icon-plus"></i>
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
				<hr style="align:center; background:#ddd; border:0px; height:1px;">
				<table class="table table-striped table-bordered bootstrap-datatable datatable" id="ingreso_productos_table">
					<thead>
						<tr>
							<th>Fecha Registro</th>
							<th>N° Ingreso</th>
							<th>Personal</th>
							<th>Motivo</th>
							<th>N° Documento</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>01/02/2013</td>
							<td>000001</td>
							<td>Diego Molina</td>
							<td>Devolución</td>
							<td>100-00001</td>
							<td>
								<a class='btn btn-success btn-datos' href='#'>
									<i class='icon-zoom-in icon-white'></i>
									Ver Datos
								</a>
							</td>
							<td>
								<a class='btn btn-info btn-editar' href='#'>
									<i class='icon-edit icon-white'></i>
									Editar
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
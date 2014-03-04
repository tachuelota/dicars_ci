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
				<a href="<?php echo base_url();?>logistica/views/cons_salidaproductos/">Salida de Productos</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>SALIDA DE PRODUCTOS</h2>
				<div class="box-icon">
					<a href="<?php echo base_url();?>logistica/views/reg_salidaproductos/" class="btn btn-round" alt="Registrar Salida de Productos"> <i class="icon-plus"></i>
					</a>
				</div>
			</div>
			<div class="box-content">
				<div class="form-horizontal" id="SalProductosForm" name="SalProductosForm" action-1="<?php echo base_url();?>logistica/Servicios/get_log_salprod" action-2="<?php echo base_url();?>logistica/Views/ver_salidaproductos">
					<fieldset>
						<div class="control-group">
							<label class="control-label">Del</label>
							<div class="controls">
								<input type="text" class="input-xlarge datepicker" id="date01" style="margin: 0 18px 0 0;">
								<label style="display:inline;">Al</label>
								<input type="text" class="input-xlarge datepicker" id="date02"  style="margin: 0 18px;">
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
							<th>Documento</th>
							<th>Fec. Registro</th>
							<th>Registrante</th>
							<th>Solicitante</th>
							<th>Motivo</th>
							<th>Observación</th>
							<th>Local</th>
						</tr>
					</thead>
					<tbody>
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
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
				<a href="<?php echo base_url();?>logistica/views/kardex/">Generar Kardex</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>KARDEX</h2>
			</div>
			<div class="box-content">
				<div class="row-fluid">
					<div class="span6"></div>
					<div class="span6">
						<input id="xlsresumengen" type="button" value="Reporte Resumen" class="btn btn-success" style="float: right; margin: 10px 10px 0 0;"/>
						<input id="xlsvalorizadogen" type="button" value="Reporte Valorizado" class="btn btn-success" style="float: right; margin: 10px 10px 0 0;"/>
					</div>
				</div>
				<div class="form-horizontal">
					<fieldset>
						<div class="control-group">
							<div class="controls">
								<input type="text" class="input-xlarge datepicker" id="date01" style="margin: 0 18px 0 0;">
								<button id="buscarfecha" type="button" class="btn btn-info btn-buscarp" style="margin: 0 18px;"> <i class="icon-search icon-white"></i>
									Buscar
								</button>
							</div>
						</div>
					</fieldset>
				</div>
				<table id="kardex_table" class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Año</th>
							<th>Mes</th>
							<th>Producto</th>
							<th>Tipo Ingreso</th>
							<th>Cantidad</th>
							<th>Prec. Unitario s/.</th>
							<th>Total s/.</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>Año</th>
							<th>Mes</th>
							<th>Producto</th>
							<th>Tipo Ingreso</th>
							<th>Cantidad</th>
							<th>Prec. Unitario s/.</th>
							<th>Total s/.</th>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!--/span-->
		<form method="post" target="_blank" id="CreateXLSGenForm">
			<input type="hidden" name="titulo" id="titulo"/>
			<input type="hidden" name="table_kardexgen" id="table_kardexgen"/>
		</form>
		<form method="post" target="_blank" id="CreateXLSValForm">
			<input type="hidden" name="table_kardexgenval" id="table_kardexgenval"/>
			<input type="hidden" name="local" id="local"/>
		</form>
	</div>
	<!-- content ends -->
</div>
<!--/#content.span10-->
</div>
<!--/fluid-row-->
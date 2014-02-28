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
				<a href="<?php echo base_url();?>logistica/views/saldo_inicial/">Saldos</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>SALDOS</h2>
			</div>
			<div class="box-content">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active">
						<a href="#inicial">Saldos Iniciales</a>
					</li>
					<li>
						<a href="#actual">Saldos Actuales</a>
					</li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane active" id="inicial">
						<h3>Saldos Iniciales</h3>
						<div class="row-fluid">
							<div class="span6"></div>
							<div class="span6">
								<input id="xlsinigen" type="button" value="Reporte a Excel" class="btn btn-success" style="float: right; margin: 10px 10px 0 0;"/>
							</div>
						</div>
						<div class="form-horizontal" id="SaldoInicialForm" name="SaldoInicialForm" action-1="<?php echo base_url();?>logistica/Servicios/get_log_saldoinicial_byfecha">
							<fieldset>
								<div class="control-group">
									<div class="controls">
										<input type="text" class="input-xlarge datepicker" id="date01" name="date01">
										<button id="buscarfecha" name="buscarfecha" type="button" class="btn btn-info btn-buscarp" style="margin: 0 18px;"> <i class="icon-search icon-white"></i>
											Buscar
										</button>
									</div>
								</div>
							</fieldset>
						</div>
						<table id="saldoini_table" class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
								<tr>
									<th>Año</th>
									<th>Mes</th>
									<th>Producto</th>
									<th>Cantidad</th>
									<th>Prec. Unitario S/.</th>
									<th>Total S/.</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="actual">
						<h3>Saldos Actuales</h3>
						<div class="row-fluid">
							<div class="span6"></div>
							<div class="span6">
								<input id="xlsactualgen" name="xlsactualgen" type="button" value="Reporte a Excel" class="btn btn-success" style="float: right; margin: 10px 10px 0 0;"/>
							</div>
						</div>
						<div class="form-horizontal" id="SaldoActualForm" name="SaldoActualForm" action-1="<?php echo base_url();?>logistica/Servicios/get_saldoactual_byfecha">
							<fieldset>
								<div class="control-group">
									<div class="controls">
										<input type="text" class="input-xlarge datepicker" id="date02" style="margin: 0 18px 0 0;">
										<button id="buscarfecha2" type="button" class="btn btn-info btn-buscarp" style="margin: 0 18px;"> <i class="icon-search icon-white"></i>
											Buscar
										</button>
									</div>
								</div>
							</fieldset>
						</div>
						<table id="saldoactual_table" class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
								<tr>
									<th>Año</th>
									<th>Mes</th>
									<th>Producto</th>
									<th>Cantidad</th>
									<th>Prec. Unitario s/.</th>
									<th>Total s/.</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
		<!--/span-->
		<form method="post" target="_blank" id="CreateXLSForm">
			<input type="hidden" name="nombrearchivo" id="nombrearchivo"/>
			<input type="hidden" name="titulo" id="titulo"/>
			<input type="hidden" name="tsaldos" id="tsaldos"/>
		</form>
	</div>
	<!-- content ends -->
</div>
<!--/#content.span10-->
</div>
<!--/fluid-row-->
<noscript>
<div class="alert alert-block span10">
	<h4 class="alert-heading">Warning!</h4>
	<p>	Necesitas tener<a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
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
				</ul>
			</div>
	<div class="row-fluid sortable">	 
	<div class="box span12">
	<div class="box-header well" data-original-title>
	<h2>Reporte de Ingresos y Egresos por Día</h2>
		<div class="box-icon">
		<!-- a href="#" class="btn btn-registrar btn-round" alt="Registrar Cliente"><i class="icon-plus"></i></a>
		<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
		<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a -->
		</div>
	</div>
	<div class="box-content">
		<div class="form-horizontal">
			<fieldset>
				<div class="control-group">
				<label class="control-label" for="date01">Escoga el día</label>
				<div class="controls">
					<input type="text" class="input-xlarge datepicker" id="date01" value="03/06/2013">
				</div>
				</div>
			</fieldset>
		</div>
		<div class="form-horizontal">
			<legend>Ingresos</legend>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Cantidad</th>
					<th>Material</th>
					<th>Monto</th>
					<th>Cliente</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Jack Chris</td>
					<td class="center">2012/01/01</td>
					<td class="center">Member</td>
					<td class="center">
					<span class="label label-success">Active</span>
					</td>
				</tr>	
			</tbody>
		</table>
		<div class="form-horizontal">
			<legend>Egresos</legend>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Cantidad</th>
					<th>Material</th>
					<th>Monto</th>
					<th>Cliente</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Rizwan Habib</td>
					<td class="center">2012/01/21</td>
					<td class="center">Staff</td>
					<td class="center">
					<span class="label label-success">Active</span>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="form-horizontal">
			<legend>General</legend>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
				<th>Descripción</th>
				<th>Monto</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Ingresos</td>
					<td class="center">2012/01/01</td>
					</tr>
					<tr>
					<td>Egresos</td>
					<td class="center">2012/01/01</td>
					</tr>
					<tr>
					<td>Total</td>
					<td class="center">2012/01/01</td>
				</tr>
			</tbody>
		</table>
	</div>
	</div><!--/span-->
</div><!--/row-->
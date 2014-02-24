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
				<a href="<?php echo base_url();?>logistica/views/cons_ordencompra/">Orden Compra</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>ORDENES DE COMPRA</h2>
				<div class="box-icon">
					<a href="<?php echo base_url();?>logistica/Views/reg_ordencompra/" class="btn btn-round" alt="Registrar Orden de Compra"> <i class="icon-plus"></i>
					</a>
				</div>
			</div>
			<div class="box-content">
				<div id="OrdCompraForm" name="OrdCompraForm" class="form-horizontal" action-1="<?php echo base_url();?>logistica/Servicios/get_log_ordcompra_rangefechas" action-2="<?php echo base_url();?>logistica/Views/ver_ordencompras">
					<fieldset>
						<div class="control-group">
							<label class="control-label">Del</label>
							<div class="controls">
								<input type="text" class="input-xlarge datepicker" id="date01" name="date01">
								<label style="display:inline;">Al</label>
								<input type="text" class="input-xlarge datepicker" id="date02" name="date02">
								<button id="buscarfecha" name="buscarfecha" type="button" class="btn btn-info btn-buscarp" style="margin: 0 18px;"> <i class="icon-search icon-white"></i>
									Buscar
								</button>
							</div>
						</div>
					</fieldset>
				</div>
				<table id="ordcom_table" class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>N° Ord. Compra</th>
							<th>Fecha de Registro</th>
							<th>Registrador</th>
							<th>Proveedor</th>
							<th>Total S/.</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
		<!--/span-->
		<div class="modal hide fade" id="EliminarOrdCompraAlert" Style="whidth:">
			<form action="" method="post" id="EliminarOrdCompraForm">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h2>
						<i class="icon-alert icon-red icon32"></i>
						Eliminar
					</h2>
				</div>
				<div class="modal-body">
					<p>¿Esta seguro de que desea eliminar la Orden de Compra?</p>
					<input type="hidden" name="idordcompra" id="idordcompra"></div>
				<div class="modal-footer">
					<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
					<input type="submit" value="Eliminar" class="btn btn-primary"></div>
			</form>
		</div>
	</div>
	<!-- content ends -->
</div>
<!--/#content.span10-->
</div>
<!--/fluid-row-->
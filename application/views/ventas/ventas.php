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
						<a href="<?php echo base_url();?>ventas">Ventas</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?php echo base_url();?>ventas/views/cons_ventas">Consultar</a>
					</li>
				</ul>
			</div>  
			<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>VENTAS: CONSULTAR</h2>
						<div class="box-icon">
							<a href="<?php echo base_url();?>ventas/views/registrar_ventas" class="btn btn-round" alt="Registrar Ventas"><i class="icon-plus"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="form-horizontal">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Del</label>
									<div class="controls">
										<input type="text" class="input-xlarge datepicker" id="date01" style="margin: 0 18px 0 0;" value="<?php echo date("d/m/Y"); ?>">
										<label style="display:inline;">Al</label>
								  		<input type="text" class="input-xlarge datepicker" id="date02" style="margin: 0 18px;" value="<?php echo date("d/m/Y"); ?>">
										<button id="buscarfecha" type="button" class="btn btn-info btn-buscarp" style="margin: 0 18px;"><i class="icon-search icon-white"></i>Buscar</button>
									</div>
								</div>
								
							</fieldset>
						</div>
						<hr>
						<table id="ventas_table" class="table table-striped table-bordered bootstrap-datatable datatable" >
							<thead>
								<tr>
									<th>Fec. Registro</th>
									<th>Cliente</th>
								  	<th>Vendedor</th>
								  	<th>Tipo Pago</th>
								  	<th>Cant. Prod.</th>
								  	<th>Total S/.</th>
								  	<th>Estado</th>
							  	</tr>
						  	</thead>   
						  	<tbody>
							</tbody>
						</table>
						<div class="modal hide fade" id="modalAnular">
							<div class="modal-header">
								<h3>Anular Venta</h3>
							</div>
							<form id="AnularForm" class="form-horizontal" method="post" action="">
								<div class="modal-body">
									<input id="venta_id" name="venta_id" type="hidden" required>
									<div class="alert alert-error">
										¿Desea realmente <strong>ANULAR</strong> esta venta?
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-cancelarprov" data-dismiss="modal">Cancelar</button>
									<button id="btn-anular-venta" type="button" class="btn btn-primary ">Sí</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div><!-- content ends -->
		</div><!--/#content.span10-->
	</div><!--/fluid-row-->
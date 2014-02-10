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
				<a href="<?php echo base_url();?>logistica/views/proveedores/">Proveedores</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>PROVEEDORES</h2>
				<div class="box-icon">
					<a href="#" class="btn btn-registrar btn-round" alt="Registrar Proveedor"> <i class="icon-plus"></i>
					</a>
					<!-- a href="#" class="btn btn-minimize btn-round"> <i class="icon-chevron-up"></i>
				</a>
				<a href="#" class="btn btn-close btn-round">
					<i class="icon-remove"></i>
				</a -->
			</div>
		</div>
		<div class="box-content">
			<table class="table table-striped table-bordered bootstrap-datatable datatable" id="proveedores_table" 
			data-source = "<?php echo base_url();?>logistica/Servicios/getProveedor">
				<thead>
					<tr>
						<th>RUC</th>
						<th>Razón Social</th>
						<th>Teléfono</th>
						<th>Email</th>						
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>


			<div class="modal hide fade" id="modalProveedores">
				<div class="modal-header">
					<h3>Registrar Proveedor</h3>
				</div>
				<form id="ProveedorForm" class="form-horizontal" method="post" action-1="<?php echo base_url();?>logistica/Proveedores/registrar" action-2="<?php echo base_url();?>logistica/Proveedores/editar">
					<div class="modal-body">
						<input id="codigo" name="codigo" type="hidden">
						<fieldset>
							<div class="control-group">
								<label class="control-label" for="ruc">RUC</label>
								<div class="controls">
									<input class="input-xlarge focused" maxlength="11" id="ruc" name="ruc" type="text"></div>
							</div>
							<div class="control-group">
								<label class="control-label" for="razonsocial">Razón Social</label>
								<div class="controls">
									<input class="input-xlarge focused" type="text" id="razonsocial" name="razonsocial" ></div>
							</div>
							<div class="control-group">
								<label class="control-label" for="ccorriente">Cuenta Corriente</label>
								<div class="controls">
									<input class="input-xlarge focused" id="ccorriente" name="ccorriente" type="text" maxlength="20"></div>
							</div>
							<div class="control-group">
								<label class="control-label" for="direccion">Dirección</label>
								<div class="controls">
									<input class="input-xlarge focused" id="direccion" name="direccion" type="text"></div>
							</div>
							<div class="control-group">
								<label class="control-label" for="telefono">Teléfono</label>
								<div class="controls">
									<input class="input-xlarge focused" placeholder="999999999" maxlength="9" id="telefono" name="telefono" type="text"></div>
							</div>
							<div class="control-group">
								<label class="control-label" for="email">Email</label>
								<div class="controls">
									<input class="input-xlarge focused"  id="email" name="email" type="email"></div>
							</div>
							<div class="control-group">
								<label class="control-label" for="paginaweb">Página Web</label>
								<div class="controls">
									<input class="input-xlarge focused" id="paginaweb" name="paginaweb" type="text"></div>
							</div>
						</fieldset>
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-cancelarprov" data-dismiss="modal">Cancelar</button>
						<button id="btn-reg-proveedor" type="button" class="btn btn-primary ">Registrar</button>
						<button id="btn-editar-proveedor" type="button" class="btn btn-primary " style="display:none">Editar</button>
					</div>
				</form>
			</div>			
		</div>
	</div>
	<!--/span-->
</div>
<!-- content ends -->
</div>
<!--/#content.span10-->
</div>
<!--/fluid-row-->
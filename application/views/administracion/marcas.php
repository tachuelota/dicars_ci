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
				<a href="<?php echo base_url()?>">Home</a>
				<span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo base_url();?>administracion/">Administración</a>
				<span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo base_url();?>administracion/views/marcas">Marcas</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>MARCAS</h2>
				<div class="box-icon">
					<a href="#" class="btn btn-round btn-registrar" alt="Registrar Marcas"> <i class="icon-plus"></i>
					</a>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable" id="marcas_table" data-source = "<?php echo base_url();?>administracion/servicios/getMarcas">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Estado</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
				<div class="modal hide fade" id="modalMarca">
					<div class="modal-header">
						<h3>Registrar Marca</h3>
					</div>
					<form id="MarcaForm" class="form-horizontal" action-1="<?php echo base_url();?>administracion/marcas/registrar" action-2="<?php echo base_url();?>administracion/marcas/editar">
						<input type="hidden" id="idMarca" name="idMarca">
						<div class="modal-body">
							<fieldset>
								<div class="control-group">
									<label class="control-label" for="desc_marca">Nombre de Marca</label>
									<div class="controls">
										<input class="input-xlarge focused validate[required,custom[onlyLetterSp]]" id="desc_marca" name="desc_marca" type="text" data-prompt-position="topLeft"></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="selectEstado">Estado</label>
									<div class="controls">
										<select id="selectEstado" name="selectEstado" class="validate[required]" data-prompt-position="topLeft">
											<option value="1">Habilitado</option>
											<option value="0">Inhabilitado</option>
										</select>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="modal-footer">
							<button type="reset" class="btn" data-dismiss="modal">Cancelar</button>
							<button id="btn-reg-marca" class="btn btn-primary">Registrar</button>
							<button id="btn-editar-marca" class="btn btn-primary" style="display:none">Editar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- content ends -->
</div>
<!--/#content.span10-->
</div>
<!--/fluid-row-->
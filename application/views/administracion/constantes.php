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
				<a href="/">Home</a>
				<span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo base_url();?>administracion/">Administración</a>
				<span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo base_url();?>administracion/views/constantes">Constantes</a>
			</li>
		</ul>
		<div class="row-fluid">
			<div class="box span12">
				<div class="box-header well" data-original-title>
					<h2>CONSTANTES</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-round btn-registrar" alt="Registrar Clase"> <i class="icon-plus"></i>
						</a>
					</div>
				</div>
				<div class="box-content">
					<table id="constantes_table" class="table table-striped table-bordered bootstrap-datatable datatable" data-source = "<?php echo base_url();?>administracion/servicios/getCategoria">
						<thead>
							<tr>
								<th>Clase</th>
								<th>Nombre</th>
								<th>Valor</th>
								<th></th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
					<div class="modal hide fade" id="modalRegistroConstantes" style="width: 650px;">
						<div class="modal-header">
							<h3>Registrar Clase</h3>
						</div>
						<form id="RegistrarClaseForm" class="form-horizontal" method="post" action="{{ path('dicars_admin_registrar_constante') }}">
							<div class="modal-body">
								<fieldset>
									<div class="control-group">
										<label class="control-label" for="clase">Nro de Clase</label>
										<div class="controls">
											<input class="input-xlarge focused" id="clase" name="clase" type="text" pattern="|^[0-9]{1,11}$|" maxlength="11" required></div>
									</div>
									<div class="control-group">
										<label class="control-label" for="nom_clase">Nombre de Clase</label>
										<div class="controls">
											<input class="input-xlarge focused" id="nom_clase" name="nom_clase" type="text" pattern="|^[a-zA-Z ñÑáÁéÉíÍóÓúÚüÜç]+$|" maxlength="100" required></div>
									</div>
									<div class="control-group">
										<label class="control-label" for="valor">Valor</label>
										<div class="controls">
											<input class="input-xlarge focused" id="valor" name="valor" type="text" pattern="|^[0-9]{1,11}$|" maxlength="11" required></div>
									</div>
								</fieldset>
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn btn-cancelarprov" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-primary ">Guardar</button>
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
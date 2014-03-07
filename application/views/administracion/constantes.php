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
				<a href="<?php echo base_url();?>administracion/views/constantes">Constantes</a>
			</li>
		</ul>
		<div class="row-fluid">
			<div class="box span12">
				<div class="box-header well" data-original-title>
					<h2>CONSTANTES</h2>
					<div class="box-icon">
						<a href="#" id="btn-registrar" class="btn btn-round" alt="Registrar Clase"> <i class="icon-plus"></i>
						</a>
					</div>
				</div>
				<div class="box-content">
					<div class="form-horizontal">
						<div class="control-group">
							<label class="control-label" for="tipo">Clase</label>
							<div class="controls">
								<select id="claseconstante" class="SelectAjax" name="claseconstante" data-source="<?php echo base_url();?>administracion/servicios/getClaseConstante" attrval="nConstanteClase" attrdesc="cConstanteDesc"></select>
							</div>
						</div>
					</div>					
					<hr>
					<table id="constantes_table" class="table table-striped table-bordered bootstrap-datatable datatable">
						<thead>
							<tr>
								<th>Clase</th>
								<th>Nombre</th>
								<th>Valor</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
					<div class="modal hide fade" id="modalConstante" style="width: 650px;">
						<div class="modal-header">
							<h3>Registrar Clase</h3>
						</div>
						<form id="ConstanteForm" class="form-horizontal" action-1="<?php echo base_url();?>administracion/constantes/registrar" action-2="<?php echo base_url();?>administracion/constantes/editar">
							<input type="hidden" id="idConstante" name="idConstante">
							<div class="modal-body">
								<fieldset>
									<input id="clase" name="clase" type="hidden">
									<div class="control-group">
										<label class="control-label" for="nom_clase">Descripcion</label>
										<div class="controls">
											<input class="input-xlarge focused validate[required,custom[onlyLetterNumberSp]]" id="nom_clase" name="nom_clase" type="text" data-prompt-position="topLeft"></div>
									</div>
									<div class="control-group">
										<label class="control-label" for="valor">Valor</label>
										<div class="controls">
											<input class="input-xlarge focused validate[required,custom[onlyNumberSp]]" id="valor" name="valor" type="text" data-prompt-position="topLeft"></div>
									</div>
								</fieldset>
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn btn-cancelarprov" data-dismiss="modal">Cancelar</button>			
								<button id="btn-reg-constante" class="btn btn-primary">Registrar</button>
								<button id="btn-edit-constante" class="btn btn-primary" style="display:none">Guardar</button>
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
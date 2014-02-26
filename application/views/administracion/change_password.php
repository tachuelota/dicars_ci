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
				<a href="<?php echo base_url();?>">Home</a>
				<span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo base_url();?>logistica/">Logística</a>
				<span class="divider">/</span>
			</li>
			<li>
				<a href="<?php echo base_url();?>logistica/views/productos/">Productos</a>
			</li>
		</ul>
	</div>
	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header well" data-original-title>
				<h2>CAMBIAR CONTRASEÑA</h2>
			</div>
			<form id="ChangePasswordForm" action-1="<?php echo base_url();?>
				auth/change_password">
				<div class="form-horizontal box-content">
					<div class="control-group">
						<label class="control-label" for="oldpassword">Contraseña Actual</label>
						<div class="controls">
							<input class="input-xlarge focused" id="oldpassword" name="oldpassword" type="password"></div>
					</div>
					<div class="control-group">
						<label class="control-label" for="password">Contraseña</label>
						<div class="controls">
							<input class="input-xlarge focused validate[required] validate[minSize[8]]" id="password" name="password" type="password"></div>
					</div>
					<div class="control-group">
						<label class="control-label" for="recontrasena">Re. Contraseña</label>
						<div class="controls">
							<input class="input-xlarge focused validate[equals[password]]" type="password" name="password2" id="password2"></div>
					</div>
				</div>
				<div class="form-actions">
					<button type="reset" class="btn btn-cancelar" >Cancelar</button>
					<button id="btn-guardar" type="button" class="btn btn-primary ">Guardar</button>
				</div>
			</form>
		</div>
	</div>
	<!--/span-->
</div>
<!-- content ends -->
</div>
<!--/#content.span10-->
</div>
<!--/fluid-row-->
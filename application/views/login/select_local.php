<div class="container-fluid">
	<div class="row-fluid">		
		<div class="row-fluid">
			<div class="span12 center login-header">
				<h2>Seleccione el Local</h2>
			</div><!--/span-->
		</div><!--/row-->
		
		<div class="row-fluid">
			<div class="well span5 center login-box">
				<div class="alert alert-info">
					Por favor seleccione el local a adminsitrar.
				</div>
				<form class="form-horizontal" method="post">
					<fieldset>
						<div class="input-prepend">
							<span class="add-on"><i class="icon-home"></i></span>
							<select name="local">
								<?php foreach ($locales as $local):?>
									<option value="<?php echo $local["nLocal_id"]?>"><?php echo $local["cLocalDesc"];?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="clearfix"></div>
						<p class="center span5">
						<input type="submit" class="btn btn-primary" name="login" value="Ingresar" />
						</p>
					</fieldset>
				</form>
			</div><!--/span-->
		</div><!--/row-->
	</div><!--/fluid-row-->		
</div><!--/.fluid-container-->
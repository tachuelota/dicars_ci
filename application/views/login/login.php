	<div class="container-fluid">
		<div class="row-fluid">		
			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2>Bienvenido al Sistema</h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info">
						Por favor ingresa tu Usuario y tu Password.
					</div>
					<div id="infoMessage"><?php echo $message;?></div>
					<form class="form-horizontal" method="post">
						<fieldset>
							<div class="input-prepend" title="Usuario" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="username" id="username" type="text" placeholder="Usuario"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="password" id="password" type="password" placeholder="12345678" />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend">
							<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>
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
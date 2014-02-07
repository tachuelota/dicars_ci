<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>Necesitas tener <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> habilitado para usar este sitio.</p>
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
						<a href="<?php echo base_url();?>ventas">Ventas</a><span class="divider">/</span>
					</li>
					<li>
						<a href="<?php echo base_url();?>ventas/views/tarjetascreditos">Registrar/Imprimir Tarjetas de Crédito</a>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Clientes</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal">
							<fieldset>
								<div class="control-group">
									<label class="control-label" for="codigotar">Código de Tarjeta</label>
									<div class="controls">
										<input class="input-xlarge focused" id="codigotar" type="text">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="personal">Personal</label>
									<div class="controls">
										<input class="input-xlarge focused" id="personal" name="personal" type="text">
										<button id="buscar-personal" type="button" class="btn btn-info" style="margin-left: 15px;">Buscar</button>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="cliente">Cliente</label>
									<div class="controls">
										<input class="input-xlarge focused" id="cliente" name="cliente" type="text">
										<button id="buscar-cliente" type="button" class="btn btn-info" style="margin-left: 15px;">Buscar</button>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="monto">Monto</label>
									<div class="controls">
										<input class="input-xlarge focused" id="monto" name="monto" type="text">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="cliente">Vista Previa</label>
									<div class="controls">
										<figure>
											<img style="width:40%;" src="img/card.png" alt="Tarjeta">
										</figure>
									</div>
								</div>
								<div class="form-actions">
									<button type="submit" class="btn btn-primary">Registrar</button>
									<button class="btn" >Imprimir</button>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
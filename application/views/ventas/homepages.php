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
						<a href="<?php echo base_url();?>ventas">Ventas</a> <span class="divider">/</span>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid">
       			<?php if($this->ion_auth->in_group("ven_ven_prod")): ?>
				<a data-rel="tooltip" title="Ver, agregar y editar Ventas." class="well span3 top-block" href="<?php echo base_url();?>ventas/views/cons_ventas">
					<span class="icon32 icon-color icon-cart"></span>
					<div>Venta de<br> Productos</div>
				</a>
				<?php endif ?>
				<?php if($this->ion_auth->in_group("ven_crono")): ?>
				<a data-rel="tooltip" title="Ver Cronograma y realizar Pagos." class="well span3 top-block" href="<?php echo base_url();?>ventas/views/cronogramas">
					<span class="icon32 icon-color icon-document"></span>
					<div>Cronograma <br>de Pago</div>
				</a>
				<?php endif ?>
				<?php if($this->ion_auth->in_group("ven_deud_mor")): ?>
				<a data-rel="tooltip" title="Ver Clientes Deudores y Morosos." class="well span3 top-block" href="<?php echo base_url();?>ventas/views/">
					<span class="icon32 icon-color icon-users"></span>
					<div>Clientes Deudores <br> y Morosos</div>
				</a>
				<?php endif ?>
				<?php if($this->ion_auth->in_group("ven_tarj_cred")): ?>
				<a data-rel="tooltip" title="Asignar e imprimir Tarjetas de Crédito." class="well span3 top-block" href="<?php echo base_url();?>ventas/views/tarjetascreditos">
					<span class="icon32 icon-color icon-profile"></span>
					<div>Tarjeta <br> de Crédito</div>
				</a>				
				<?php endif ?>
				<?php if($this->ion_auth->in_group("ven_client")): ?>
				<a data-rel="tooltip" title="Ver, agregar y editar Clientes." class="well span3 top-block" href="<?php echo base_url();?>ventas/views/clientes">
					<span class="icon32 icon-color icon-users"></span>
					<div>Clientes</div>
				</a>
				<?php endif ?>
			</div>
			<div class="row-fluid">
				<a data-rel="tooltip" title="Ver y agregar Movimiento de Dinero." class="well span3 top-block" href="<?php echo base_url();?>ventas/views/movimientos">
					<span class="icon32 icon-color icon-transfer-ew"></span>
					<div>Registrar<br> Movimientos</div>
				</a>
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->

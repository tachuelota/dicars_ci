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
						<a href="<?php echo base_url();?>Ventas">Ventas</a><span class="divider">/</span>
					</li>
					<li>
						<a href="<?php echo base_url();?>ventas/views/ver_ventas">Ver</a>
					</li>
				</ul>
			</div>  
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>VENTAS: VER DATOS</h2>
					</div>
					<div class="box-content">
						<div class="form-horizontal">
							<fieldset>
								<div id="resumen_venta">
								<table class="table table-bordered">
									<tr>
										<td style="width: 25%;"><strong>Cliente</strong></td>
										<td colspan="3" style="width: 75%;"><?php echo $venta["Cliente"]; ?></td>
									</tr>
									<tr>
										<td style="width: 25%;"><strong>Dirección</strong></td>
										<td style="width: 25%;"><?php echo $venta["Cliente_direccion"];?></td>
										<td style="width: 25%;"><strong>Fec. Emisión</strong></td>
										<td style="width: 25%;"><?php echo $venta["cVentaFecReg"]; ?></td>
									</tr>
									<tr>
										<td><strong>Vendedor</strong></td>
										<td><?php echo $venta["Vendedor"]; ?></td>
										<td><strong>Tipo de Pago</strong></td>
										<td><?php echo $venta["tipo_pago"]; ?></td>
									</tr>
								</table>
								<table id="productos_table" class="table table-striped table-bordered bootstrap-datatable datatable">
									<thead>
										  <tr>
											  <th>Código</th>
											  <th>Producto</th>
											  <th>Cantidad</th>
											  <th>Importe</th>
										  </tr>
									</thead>   
									<tbody>
										<?php foreach ($dettale as $value):?>
											<tr>
												<td><?php echo $value["codBarra"]; ?></td>
												<td><?php echo $value["Producto"]; ?></td>
												<td><?php echo $value["cant_prod"]; ?></td>
												<td><?php echo $value["Total"]; ?></td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
								<div class="row-fluid">
									<div class="span6">
									</div>
									<div class="span6">
										<table class="table table-bordered">
											<tr>
												<td style="width: 50%;"><strong>Subtotal</strong></td>
												<td style="width: 50%;"><?php echo $venta["SubTotal"];?></td>
											</tr>
											<tr>
												<td><strong>Descuento</strong></td>
												<td><?php echo $venta["Descuento"];?>%</td>
											</tr>
											<tr>
												<td><strong>IGV</strong></td>
												<td><?php echo $venta["TipoIGV"];?>%</td>
											</tr>
											<tr>
												<td><strong>Total</strong></td>
												<td><?php echo $venta["Total"];?></td>
											</tr>
										</table>
									</div>
								</div>
								</div>
							</fieldset>
						</div>
						<div class="form-actions">
							<a href="<?php echo base_url() ?>ventas/views/cons_ventas" class="btn btn-success"><i class="icon icon-white icon-arrowthick-w"></i> Volver</a>
							<a href="#" id="imprimir" class="btn btn-success" style="float: right;"><i class="icon icon-white icon-print"></i> Imprimir</a>
						</div>
					</div>
				</div>
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
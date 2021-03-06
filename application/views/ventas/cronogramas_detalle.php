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
						<a href="<?php echo base_url();?>ventas">Ventas</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?php echo base_url();?>ventas/views/cronogramas_detalle">Cronograma de Pago</a>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>CRÉDITOS DE:  <?php echo $cClienteNom." ".$cClienteApe; ?></h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="creditos_table"
						data-source="<?php echo base_url().'ventas/Servicios/get_detallecronograma_bycliente/'.$nCliente_id;?>">
						  <thead>
							  <tr>
								  <th>Fecha de la Venta</th>
								  <th>Monto Total S/.</th>
								  <th>Monto Pagado S/.</th>
								  <th>Nro de Cuotas</th>
								  <th></th>
								  <th></th>	
								  <th></th>							 
							  </tr>
						  </thead>
						  	<tbody>
						  	</tbody>
					  </table>
					</div>
					<div class="modal hide fade" id="modalCuotas">
						<div class="modal-header">
							<h3>Cuotas</h3>
						</div>
						<div class="modal-body">
							<form id="PagarCuotasForm" class="form-horizontal" action-1="<?php echo base_url(); ?>ventas/cronogramas/pagarcuota">
								<div class="control-group">
									<label class="control-label" for="amortizacion">A cuenta</label>
									<div class="controls">
										<div class="input-append">
											<input class="input-xlarge focused" style="margin: 0 0px 0 0;" id="monto" type="number" step="0.1" value="0" min="0">
											<input type="hidden" name="monto" id="montoapg">
											<input type="hidden" name="nVenta_id" id="nVenta_id">	
											<span id="spanamort" class="add-on">s/.</span>
										</div>
										<input type="hidden" name="idcredito" id="idcredito">
										<button id="pagar"type="button" class="btn btn-warning btn-buscarc" style="margin: 0 18px;"><i class='icon-pago'></i> Pagar</button>
									</div>
								</div>
							</form>
							<table id="cuotas_table" class="table table-striped table-bordered bootstrap-datatable datatable">
							  	<thead>
									<tr>
									  	<th>Fecha de Pago</th>
									  	<th>Nro de Cuota</th>
									  	<th>Monto Pagar</th>
									  	<th>Monto Aplicado</th>
								  	</tr>
							  	</thead>   
							  	<tbody>		
							  	</tbody>
						  </table> 
						</div>
						<div class="modal-footer">
							<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
							<a id='guardar_pago' href="#" class="btn btn-primary btn-guardar">Guardar</a>
						</div>
					</div>
					<!----Modal-->
					<div class="form-actions">
						<a href="<?php echo base_url();?>ventas/views/cronogramas" class="btn btn-success"><i class="icon icon-white icon-arrowthick-w"></i> Volver</a>
					</div> 
				</div><!--/span-->
				<div class="modal hide fade" id="vercronograma">
					<div class="modal-header">
						<h3>¿Desea exportar el Cronograma?</h3>
					</div>
					<div class="modal-body">
						<form method="post" target="_blank" id="CreatePDFForm">
							<input type="hidden" name="nombrearchivo" id="nombrearchivo"/>
							<input type="hidden" name="tcronograma" id="tcronograma"/>
							<input type="hidden" name="tdetalle" id="tdetalle"/>
							<input type="hidden" name="tresumen" id="tresumen"/>
							<div class="row-fluid ui-sortable">
								<a id="pdfbutton" data-rel="tooltip" class="well span3 top-block" style="width: 48%;" href="#" data-original-title="Exportar a PDF.">
									<span class="icon32 icon-color icon-pdf"></span>
									<div>PDF</div>
								</a>
				
								<a id="xlsutton" data-rel="tooltip" class="well span3 top-block" style="width: 48%;" href="#" data-original-title="Exportar a Excel.">
									<span class="icon32 icon-color icon-xls"></span>
									<div>Excel</div>
								</a>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
					</div>
				</div>
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
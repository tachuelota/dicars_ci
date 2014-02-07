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
						<a href="<?php echo base_url();?>ventas/views/movimientos">Movimientos</a>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>MOVIMIENTOS</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-round btn-registrar" alt="Registrar Movimientos"><i class="icon-plus"></i></a>
						</div>
					</div>
					<div class="row-fluid">
						<div class="span6">
						</div>
						<div class="span6">
							<input id="pdfgen" type="button" value="Reporte General" class="btn btn-success" style="float: right; margin: 10px 10px 0 0;"/>
							<input id="pdfdet" type="button" value="Reporte Detallado" class="btn btn-success" style="float: right; margin: 10px 10px 0 0;"/>
						</div>
					</div>
					<div class="box-content">
					<div class="form-horizontal">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Del</label>
									<div class="controls">
										<input type="text" class="input-xlarge datepicker" id="date01" value="02/06/2013" style="margin: 0 18px 0 0;">
										<label style="display:inline;">Al</label>
								  		<input type="text" class="input-xlarge datepicker" id="date02" value="02/06/2013" style="margin: 0 18px;">
										<button id="buscarfecha" type="button" class="btn btn-info btn-buscarp" style="margin: 0 18px;"><i class="icon-search icon-white"></i>Buscar</button>
									</div>
								</div>
							</fieldset>
						</div>
						<table id="mov_table" class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
								<tr>
									<th>Fecha de Registro</th>
									<th>Concepto</th>
									<th>Monto</th>
									<th>Tipo de Movimiento</th>
									<th>Tipo de Pago</th>
									<th>Trabajador</th>
								</tr>
							</thead>   
							<tbody>
								<tr>
									<td>01/01/2013</td>
									<td>Para Gasolina</td>
									<td>100</td>
									<td>Retiro</td>
									<td>Contado</td>
									<td>Diego Molina</td>
								</tr>
								<tr>
									<td>01/01/2013</td>
									<td>Para Gasolina</td>
									<td>50</td>
									<td>Retiro</td>
									<td>Contado</td>
									<td>Diego Molina</td>
								</tr>
							</tbody>
						</table>
						<div class="modal hide fade" id="modalRegistroMov">
							<div class="modal-header">
								<h3>Registrar Movimiento</h3>
							</div>
							<form id="RegistrarMovForm" class="form-horizontal" method="post" action="{{ path('dicars_admin_registrar_mov') }}">
								<div class="modal-body">
									<fieldset>
										<div class="control-group">
											<label class="control-label" for="personal">Trabajador</label>
											<div class="controls">
										  		<input class="input-xlarge focused" id="personal" name="personal" type="text" readonly>
											</div>
									  	</div>
									  	<div class="control-group">
											<label class="control-label" for="monto">Monto</label>
											<div class="controls">
										  		<input class="input-xlarge focused" id="monto" name="monto" type="number" step="0.1" min="1" required>
											</div>
									  	</div>
									  	<div class="control-group">
											<label class="control-label" for="concepto">Concepto</label>
											<div class="controls">
										  		<textarea id="concepto" name="concepto"></textarea>
											</div>
									  	</div>
									  	<div class="control-group">
											<label class="control-label" for="selectTipoMov">Tipo de Movimiento</label>
											<div class="controls">
										  		<select id="selectTipoMov" name="selectTipoMov" required>
												</select>
											</div>
									  	</div>
									  	<div class="control-group">
											<label class="control-label" for="selectTipoPag">Tipo de Pago</label>
											<div class="controls">
										  		<select id="selectTipoPag" name="selectTipoPag" required>
												</select>
											</div>
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
					<div class="modal hide fade" id="exportmodal">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">×</button>
							<h3>EXPORTAR</h3>
						</div>
						<div class="modal-body">
							<form method="post" id="CreatePDFForm" target="_blank">
								<input type="hidden" name="title" id="title"/>
								<input type="hidden" name="table_movimiento" id="table_movimiento" value=""/>
								<input type="hidden" name="table_ingresos" id="table_ingresos" value=""/>
								<input type="hidden" name="table_salidas" id="table_salidas" value=""/>
								<input type="hidden" name="total" id="total" value=""/>
								<div class="sortable row-fluid ui-sortable">
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
					</div>
				</div>
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->
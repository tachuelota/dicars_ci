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
										<input type="text" class="input-xlarge datepicker" id="date01" name="date01">
										<label style="display:inline;">Al</label>
								  		<input type="text" class="input-xlarge datepicker" id="date02" name="date02">
										<button id="buscarfecha" type="button" class="btn btn-info btn-buscarp"><i class="icon-search icon-white"></i>Buscar</button>
									</div>
								</div>
							</fieldset>
						</div>
						<table id="movimientos_table" class="table table-striped table-bordered bootstrap-datatable datatable" >
							<thead>
								<tr>
									<th>Fecha de Registro</th>
									<th>Trabajador</th>
									<th>Concepto</th>
									<th>Monto</th>																
									<th>Tipo de Movimiento</th>									
									<th>Tipo de Pago</th>									
								</tr>
							</thead>   
							<tbody>								
							</tbody>
						</table>
						<div class="modal hide fade" id="modalMov">
							<div class="modal-header">
								<h3>Registrar Movimiento</h3>
							</div>
							<form id="MovimientoForm" class="form-horizontal" method="post" action-1="<?php echo base_url();?>ventas/movimientos/registrar/">							
								<input type="hidden" name="idRegistrado" id="idRegistrado" value="<?php echo $trabajador["nPersonal_id"] ?>">
								<input type="hidden" name="idLocal" id="idLocal" value="<?php echo $local["nLocal_id"] ?>">
								<div class="modal-body">
									<fieldset>
										<div class="control-group">
											<label class="control-label" for="personal">Trabajador</label>
											<div class="controls">
										  		<input class="input-xlarge focused" id="personal"  type="text" value="<?php echo $trabajador["cPersonalNom"]." ".$trabajador["cPersonalApe"] ?>" readonly>
											</div>
									  	</div>
									  	<div class="control-group">
											<label class="control-label" for="monto">Monto</label>
											<div class="controls">
										  		<input class="input-xlarge focused validate[required,custom[number]]" id="monto" name="monto" type="number" step="0.1" min="1">
											</div>
									  	</div>
									  	<div class="control-group">
											<label class="control-label" for="concepto">Concepto</label>
											<div class="controls">
										  		<textarea id="concepto" name="concepto" ></textarea>
											</div>
									  	</div>
									  	<div class="control-group">
											<label class="control-label" for="selectTipoMov">Tipo de Movimiento</label>
											<div class="controls">
										  		<select id="selectTipoMov" name="selectTipoMov" class="SelectAjax  validate[required]" data-source="<?php echo base_url();?>administracion/servicios/getConstantesByClase/9" attrval="cConstanteValor" attrdesc="cConstanteDesc" required>
												</select>
											</div>
									  	</div>
									  	<div class="control-group">
											<label class="control-label" for="selectTipoPag">Tipo de Pago</label>
											<div class="controls">
										  		<select id="selectTipoPag" name="selectTipoPag" class="SelectAjax  validate[required]" data-source="<?php echo base_url();?>administracion/servicios/getConstantesByClase/2" attrval="cConstanteValor" attrdesc="cConstanteDesc" required>
												</select>
											</div>
									  	</div>
									</fieldset>
								</div>
								<div class="modal-footer">
									<button type="reset" class="btn btn-cancelarprov" data-dismiss="modal">Cancelar</button>
									<button id="btn-reg-movimiento" type="button" class="btn btn-primary ">Registrar</button>
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
								<input type="hidden" name="movimientotable" id="movimientotable" value=""/>
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
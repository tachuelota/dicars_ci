<noscript>
<div class="alert alert-block span10">
	<h4 class="alert-heading">Warning!</h4>
	<p>	Necesitas tener<a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
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
				</ul>
			</div>
	<div class="row-fluid sortable">	 
	<div class="box span12">
	<div class="box-header well" data-original-title>
	<h2>Reporte de Ingresos y Egresos por Día</h2>
		<div class="box-icon">
		<!-- a href="#" class="btn btn-registrar btn-round" alt="Registrar Cliente"><i class="icon-plus"></i></a>
		<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
		<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a -->
		</div>
	</div>
	<div class="box-content">			
		<div class="form-horizontal" id="IngresosForm" name="IngresosForm">			
			<fieldset>
				<div class="control-group">			
				<label class="control-label" for="date01">Escoga el día</label>
				<div class="controls">
					<input type="text" class="input-xlarge datepicker" id="date01" name="date01">
						<button id="buscarfecha" name="buscarfecha" type="button" class="btn btn-info btn-buscarp" style="margin: 0 18px;"> <i class="icon-search icon-white"></i>Buscar</button>
				</div>
				</div>
			</fieldset>
		</div>		
		<div class="row-fluid">
				<div class="span6">
				</div>
				<div class="span6">
					<input id="pdfgen" type="button" value="Reporte General" class="btn btn-success" style="float: right; margin: 10px 10px 0 0;"/>
				</div>
		</div>	
		<div>
			<div class="form-horizontal">
				<legend>Ingresos</legend>
			</div>
			<table id="ingresos_table" class="table table-bordered">
				<thead>
					<tr>
						<th>Id</th>
						<th>Cantidad Vendida</th>
						<th>Monto Facturado</th>
						<th>Monto cobrado</th>
						<th>Tipo</th>
						<th>Concepto</th>
						<th>Vendedor</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			<div class="form-horizontal">
				<legend>Egresos</legend>
			</div>
			<table id="egresos_table" class="table table-bordered" >
				<thead>
					<tr>
						<th>Id</th>
						<th>Monto cobrado</th>
						<th>Tipo</th>
						<th>Concepto</th>
						<th>Vendedor</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			<div class="form-horizontal">
				<legend>General</legend>
			</div>
			<table class="table table-bordered">
				<thead>
					<tr>
					<th>Descripción</th>
					<th>Monto</th>
					</tr>
				</thead>
				<tbody>
				<tr>
					<td>Ingresos</td>
					<td id="TotalIngresos"></td>
				</tr>
				<tr>
					<td>Egresos</td>
					<td id="TotalEgresos"></td>
				</tr>
				<tr>
					<td>TOTAL</td>
					<td id="TotalGeneral"></td>
				</tr>
				</tbody>
			</table>			
		</div>
		<div class="modal hide fade" id="exportmodal">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">×</button>
							<h3>EXPORTAR</h3>
						</div>
						<div class="modal-body">
							<form method="post" id="CreatePDFForm" target="_blank">
								<input type="hidden" name="title" id="title"/>
								<!--<input type="hidden" name="reporteingegrtable" id="reporteingegrtable" value=""/> -->
								<input type="hidden" name="table_ingresos" id="table_ingresos" value=""/>
								<input type="hidden" name="table_egresos" id="table_egresos" value=""/>
								<input type="hidden" name="table_total" id="table_total" value=""/>
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
	</div><!--/span-->

</div><!--/row-->
</div>
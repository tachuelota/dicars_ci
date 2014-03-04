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
<div id="content" class="span10"> <!-- content starts -->			
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
				<h2>Reporte de Zonas</h2>
				<div class="box-icon">
				</div>
			</div>
				<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable" id="zonapersonal_table" data-source="<?php echo base_url();?>administracion/servicios/getZonasPersonal">
					  	<thead>
						  	<tr>
							  <th>Nombre</th>
							  <th>Encargado</th>
							  <th>Ubigeo</th>
						  	</tr>
					  	</thead>   
					    <tbody>
						</tbody>
					</table>
				</div>
			<div class="box-header well" data-original-title>
				<h2>Reporte de Clientes/Zonas</h2>
			</div>
			<div class="row-fluid">
				<div class="span6">
				</div>
				<div class="span6">
					<input id="pdfgen" type="button" value="Reporte General" class="btn btn-success" style="float: right; margin: 10px 10px 0 0;"/>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable" id="clientes_table">
					<thead>
						<tr>
							<th>Nombres</th>
						  	<th>Apellidos</th>
						  	<th>DNI</th>
						  	<th>Línea de Crédito</th>	  
					  	</tr>
				  	</thead>
			  	</table>  
			</div>
		</div><!--/span-->
		<div class="modal hide fade" id="exportmodal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>EXPORTAR</h3>
			</div>
			<div class="modal-body">
				<form method="post" target="_blank" id="CreatePDFForm">
					<input type="hidden" name="title" id="title"/>
					<input type="hidden" name="table_clientes" id="table_clientes"/>
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
	</div><!--/row-->					
</div><!--/#content.span10-->
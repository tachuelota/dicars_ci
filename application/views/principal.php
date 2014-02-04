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
				<a href="index.html">Home</a> <span class="divider">/</span>
			</li>
		</ul>
	</div>  
		<div class="row-fluid">
		<a data-rel="tooltip" class="well span3 top-block" href="ventas_homepage.html" style="width: 31.5%;">
			<span class="icon32 icon-color icon-cart"></span>
			<div>Ventas</div>
		</a>

		<a data-rel="tooltip" class="well span3 top-block" href="logistica_homepage.html" style="width: 31.5%;">
			<span class="icon32 icon-color icon-gear"></span>
			<div>Logística</div>
		</a>

		<a data-rel="tooltip" class="well span3 top-block" href="admin_homepage.html" style="width: 31.5%;">
			<span class="icon32 icon-color icon-users"></span>
			<div>Administración</div>
		</a>
	</div><!-- content ends -->
</div><!--/#content.span10-->
	</div><!--/fluid-row-->
		
<hr>

<div class="modal hide fade" id="modalcierremes">
	<div class="modal-header">
		<h3>¿Está seguro que desea cerrar el mes?</h3>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">No</a>
		<a href="#" class="btn btn-primary" id="btn-cierremes">Sí</a>
	</div>
</div>
<div class="modal hide fade" id="aftercierremes">
	<div class="modal-header">
		<h3>Cierre Exitoso!</h3>
	</div>
	<div class="modal-body">
		<p>¡El cierre de mes se ha realizado exitosamente!</p>
	</div>
	<div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">Cerrar</a>
	</div>
</div>

<div class="modal hide fade" id="modalcuadrecaja">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
		<h3>EXPORTAR</h3>
	</div>
	<div class="modal-body">
		<form method="post" target="_blank" id="FormCuadreCaja">
			<input type="hidden" name="table_cuadrecaja" id="table_cuadrecaja"/>
			<div class="form-horizontal">
				<fieldset>
					<div class="control-group">
						<label class="control-label" for="datecuadrecaja">Fecha</label>
						<div class="controls">
							<input type="text" class="input-xlarge datepicker" id="datecuadrecaja" style="margin: 0 18px 0 0;">
						</div>
					</div>
				</fieldset>
			</div>
			<p>Escoga el formato en que desea exportar el Cuadre de Caja</p>
			<div class="sortable row-fluid ui-sortable">
				<a id="pdfcuadrecaja" data-rel="tooltip" class="well span3 top-block" style="width: 48%;" href="#" data-original-title="Exportar a PDF.">
					<span class="icon32 icon-color icon-pdf"></span>
					<div>PDF</div>
				</a>

				<a id="xlscuadrecaja" data-rel="tooltip" class="well span3 top-block" style="width: 48%;" href="#" data-original-title="Exportar a Excel.">
					<span class="icon32 icon-color icon-xls"></span>
					<div>Excel</div>
				</a>
			</div>
		</form>				
	</div>
</div>
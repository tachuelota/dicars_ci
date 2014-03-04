		
		<hr>
		<footer>
			<p class="pull-left">
				&copy;
				<a href="http://clmdevelopers.com" target="_blank">CLM Developers</a>
				2013
			</p>
			<p class="pull-right">
				Powered by:
				<a href="http://clmdevelopers.com" target="_blank">CLM Developers</a>
			</p>
		</footer>
	</div>
	<!-- jQuery -->
	<script src="<?php echo base_url();?>assets/js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="<?php echo base_url();?>assets/js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="<?php echo base_url();?>assets/js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src="<?php echo base_url();?>assets/js/fullcalendar.min.js"></script>
	<!-- data table plugin -->
	<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>

	<!-- chart libraries start -->
	<script src="<?php echo base_url();?>assets/js/excanvas.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.flot.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.flot.pie.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.flot.stack.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="<?php echo base_url();?>assets/js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="<?php echo base_url();?>assets/js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="<?php echo base_url();?>assets/js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="<?php echo base_url();?>assets/js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="<?php echo base_url();?>assets/js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="<?php echo base_url();?>assets/js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="<?php echo base_url();?>assets/js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="<?php echo base_url();?>assets/js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="<?php echo base_url();?>assets/js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="<?php echo base_url();?>assets/js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="<?php echo base_url();?>assets/js/jquery.history.js"></script>

	<script src="<?php echo base_url();?>assets/js/datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url();?>assets/js/datepicker/js/locales/bootstrap-datepicker.es.js"></script>

	<!-- application script for Charisma demo -->
	<script src="<?php echo base_url();?>assets/js/charisma.js"></script>
	<script src="<?php echo base_url();?>assets/js/jqueryvalidation/languages/jquery.validationEngine-es.js"></script>
	<script src="<?php echo base_url();?>assets/js/jqueryvalidation/jquery.validationEngine.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.blockUI.js"></script>
	<script src="<?php echo base_url();?>assets/js/util/datatable_plugins.js"></script>
	<script src="<?php echo base_url();?>assets/js/util/functiongen.js"></script>
	<script src="<?php echo base_url();?>assets/js/datatables.actions.js"></script>
	<script src="<?php echo base_url();?>assets/js/prettify.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery.bootstrap.wizard.min.js"></script>

	<script type="text/javascript">
		var base_url = "<?php echo base_url();?>";
		$(document).ready(function(){
			var urlExportCierreXLS = base_url + "assets/extensiones/reportes_xls/formato_reporte_cuadrecaja.php";
			var urlExportCierrePDF = base_url + "assets/extensiones/reportes_pdf/formato_reporte_cuadrecaja.php";			
			
			$('#lanza-cierremes').click(function(e){
				e.preventDefault();
				$('#modalcierremes').modal('show');
			});

			$('#btn-cierremes').click(function(){
				$('#modalcierremes').modal('hide');
				var ajax = $.ajax({
					url: "<?php echo base_url();?>"+2,
					dataType: "json",
					async: false
				});
				ajax.done(function(data){
					$('#aftercierremes').modal('show');
				});
			});
		///CUADRE DE CAJA
		function prepararDatosCuadreCaja(){
			var date01 =fechaFormatoSQL(new Date($("#date01").datepicker("getDates")));
			tablacuadrecaja = $.ajax({
			       url: base_url + 'ventas/CuadreCaja/get_cuadrecaja/'+date01,
			       async: false
			   }).responseText;
			$('#table_cuadrecaja').val(tablacuadrecaja);
		}


			$('#lanza-cuadrecaja').click(function(e){
				e.preventDefault();
				$('#modalcuadrecaja').modal('show');
			});

			$('#pdfcuadrecaja').click(function(e){
				e.preventDefault();	
				prepararDatosCuadreCaja();			
				$("#FormCuadreCaja").attr("action",urlExportCierrePDF);
				$('#FormCuadreCaja').submit();
				$('#table_cuadrecaja').val('');	
				$('#modalcuadrecaja').modal('hide');
			});

			$('#xlscuadrecaja').click(function(e){
				e.preventDefault();
				prepararDatosCuadreCaja();
				$("#FormCuadreCaja").attr("action",urlExportCierreXLS);
				$('#FormCuadreCaja').submit();
				$('#table_cuadrecaja').val('');
				$('#modalcuadrecaja').modal('hide');
			});
			$('#<?=$active ?>').addClass('active');
		});
	</script>
	<script src="<?php echo base_url().$jsvista;?>"></script>

	</body>
</html>
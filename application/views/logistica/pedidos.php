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
						<a href="<?php echo base_url();?>logistica/">Logística</a> <span class="divider">/</span>
					</li>
					<li>
						<a href="<?php echo base_url();?>logistica/views/cons_pedidos/">Pedidos</a>
					</li>
				</ul>
			</div>  
       		<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>LISTA DE PEDIDOS</h2>
						<div class="box-icon">
							<a href="logistica_pedidos_registrar.html" class="btn btn-round" alt="Registrar Pedido"><i class="icon-plus"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table id="pedidos_table" class="table table-striped table-bordered bootstrap-datatable datatable">
						  	<thead>
							  	<tr>
									<th>Registrador</th>
								  	<th>N° Ord. Pedido</th>
								  	<th>Fecha de Registro</th>
								  	<th>Fecha de Entrega</th>
								  	<th>Local</th>
								  	<th></th>
								  	<th></th>
							  	</tr>
						  	</thead>   
						  	<tbody>
						  		<tr>
									<td>Diego Molina</td>
								  	<td>000001</td>
								  	<td>01/01/2013</td>
								  	<td>01/02/2013</td>
								  	<td>Local 1</td>
								  	<td><a class='btn btn-success btn-datos' href='#'><i class='icon-zoom-in icon-white'></i>Ver Datos</a></td>
								  	<td><a class='btn btn-danger' href='#'><i class='icon-trash icon-white'></i>Eliminar</a></td>
							  	</tr>
						  	</tbody>
					  </table>       
					</div>
				</div><!--/span-->
					<div class="modal hide fade" id="EliminarPedidoAlert">
						<form action="" method="post" id="EliminarPedidoForm">
							<div class="modal-header">
								<h2><i class="icon-alert icon-red icon32"></i> Eliminar</h2>
							</div>
							<div class="modal-body">
								<div class="alert alert-error">
									¿Esta seguro de que desea <strong>ELIMINAR</strong> el Pedido?
								</div>
								<input type="hidden" name="idpedprod" id="idpedprod">		
							</div>
							<div class="modal-footer">
								<a href="#" class="btn" data-dismiss="modal">Cancelar</a>
								<input type="submit" value="Eliminar" class="btn btn-primary">
							</div>
						</form>
					</div>
			</div><!-- content ends -->
			</div><!--/#content.span10-->
				</div><!--/fluid-row-->